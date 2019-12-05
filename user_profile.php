<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
else {
include("template/header.php");
include("template/footer.php");
?>

    <!-------------BODY------------->
<div class="container">
    <div class="row padding">
<?php
	if(isset($_GET['u_id'])){
		global $con;
		$get_id = $_GET['u_id'];
	
		$select = "select * from users where user_id='$get_id'";
		$run = mysqli_query($con,$select);
		$row = mysqli_fetch_array($run);
	
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_image = $row['user_image'];
		$user_email = $row['user_email'];
		$user_gender = $row['user_gender'];
		$user_country = $row['user_country'];
		$mobile = $row['user_mobile'];
		$registor_date = $row['registor_date'];
		$last_login = $row['last_login'];
		
		if($user_gender=='Male'){
			$msg="Send him a message";
		}
		else{
			$msg="Send her a message";
        }
		echo"
		<div class='col-lg-6'>
			<h2>Info about $user_name</h2>
			<img src='user/user_images/$user_image' width='70%;' height='auto'/>
		</div>
		<div class='col-lg-6'>
		<p>Name: <strong>$user_name</strong></p>
		<p>ID: <strong>$user_id</strong></p>
		<p>ID: <strong>$user_gender</strong></p>
		<p>Counrty: <strong>$user_country</strong></p>
		<p>Register: <strong>$registor_date</strong></p>
		<p>Last Login: <strong>$last_login</strong></p>
		<p><a href='singleuserposts.php?u_id=$user_id' class='btn btn-outline-primary btn-block'>See $user_name Posts</a></p>
		<p><a href='singleuserevents.php?u_id=$user_id' class='btn btn-outline-primary btn-block'>See $user_name Events</a></p>
		<p><a href='pro_review.php?u_id=$user_id' class='btn btn-outline-primary btn-block'>Review</a></p>
        ";
        if($user_name==$username){
        }
        else{
            echo "<p><a href='message.php?u_id=$user_id' class='btn btn-outline-primary btn-block'>$msg</a></p>";
        }
	}
		$get_member = "select *from users";
		$run_member = mysqli_query($con,$get_member);
		echo "
		<h2>Our new member</h2>";
		
		while($row = mysqli_fetch_array($run_member)){
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_image = $row['user_image'];
		
		echo "
		<a href='user_profile.php?u_id=$user_id'>
		<img src='user/user_images/$user_image' widht='50px' height='50px' title='$user_name'/></a>
		";
		}
		echo "
		</div>";

?>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
}
?>