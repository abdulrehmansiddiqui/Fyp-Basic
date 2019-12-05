<?php
include("includes/connection.php");
	if(isset($_POST['sign_up'])){
			$name = mysqli_real_escape_string($con,$_POST['u_name']);
			$pass = mysqli_real_escape_string($con,$_POST['u_pass']);
			$email = mysqli_real_escape_string($con,$_POST['u_email']);
			$country = mysqli_real_escape_string($con,$_POST['u_country']);
			$gender = mysqli_real_escape_string($con,$_POST['u_gender']);
			$birth = mysqli_real_escape_string($con,$_POST['u_birth']);
			$mobile = mysqli_real_escape_string($con,$_POST['u_mobile']);
			$status = "unverified";
			$posts = "no";

			$verifation_code = mt_rand();
			
			$get_email = "select * from users where user_email='$email'";
			$run_email = mysqli_query($con,$get_email);
			$check = mysqli_num_rows($run_email);
			
			if($check==1){
				echo "<script>alert('Email Is Already Registered')</script>";
				exit();
			}
			if(strlen($pass)<8){
				echo "<h2>Password Should be 8 char</h2>";
				exit();
			}
			if(strlen($mobile)<9){
				echo "<h2>Please Enter the Correct Number</h2>";
				exit();
			}
			else{
			$insert = "insert into users (user_name, user_pass, user_email, user_gender, user_mobile, user_image, registor_date, status, ver_code, posts ) values ('$name', '$pass', '$email', '$gender', '$mobile', 'defualt.jpg', NOW(), '$status', '$verifation_code', '$posts')";
			$run_insert = mysqli_query($con,$insert);
				if($run_insert){
				$_SESSION['user_email']=$email;
				echo "<h3>Hi $name, verify your account to signin</h3>";
				echo "<h4>check your $email</h4>";
				}
			}
			
		$to = $email;
		$subject = "verifation for abdul.com";
		$message = "
		Hello $name you have just create an account on abduls.com
		click here to verify you account: <a href='http://getfastdelivery.com/abdulrehman/verify.php?code=$verifation_code' class='btn bt-primary'>Verify</a><br>
		Thank You For Creating Account...
		";
			
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <info@getfastdelivery.com>' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		}
?>