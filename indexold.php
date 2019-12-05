<?php
	session_start();
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
	<head>
	<?php include("template/links.php");?>
	<title>Login user</title>
	</head>

<body style="background-image: url('images/bg-01.jpg');">
<div class="container emptyall">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<h2>Login</h2>
			<form method="post" action="" id="form1" class="contact2-form validate-form">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">@</span>
						</div>
						<input class="form-control" type="email" placeholder="Email" name="email" required />
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">#</span>
						</div>
						<input class="form-control" type="password" placeholder="Password" name="pass" required />
					</div>
				</div>
				<button class="btn btn-outline-primary btn-block" name="login">Login</button>
			</form>
			<?php
			include("includes/connection.php");
			if(isset($_POST['login'])){
				$email = mysqli_real_escape_string($con,$_POST['email']);
				$pass = mysqli_real_escape_string($con,$_POST['pass']);
					
				$get_user = "select * from users where user_email='$email' AND user_pass='$pass' AND status='verified'";
				$run_user = mysqli_query($con,$get_user);
				$check = mysqli_num_rows($run_user);
					
				if($check==1){
					$_SESSION['user_email']=$email;
					echo "<script>window.open('home.php','_self')</script>";
				}
				else{
					echo "<script> alert('Sorry Enter the Worng ID PASS') </script>";
				}
			}
			?>
		</div>
		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
			<h2>Signup</h2>
			<form action="" method="post">
				<div class="form-group">
					<input class="form-control" type="text" name="u_name" placeholder="Full Name" required />
				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="u_email" placeholder="Email" required />
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="u_pass" placeholder="New password" required />
				</div>
				<div class="form-group">
					<select class="form-control" name="u_country">
				</div>
				<div class="form-group">
						<option>Karachi</option>
						<option>Hyderabad</option>
						<option>Lahore</option>
						<option>Peshawar</option>
						<option>Islamabad</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="u_gender">
						<option>Male</option>
						<option>Female</option>
					</select>
				</div>
				<div class="form-group">
					<input class="form-control" type="date" name="u_birth">
				</div>
				<div class="form-group">
					<input class="form-control" type="number" placeholder="Number" name="u_mobile">
				</div>

				<button name="sign_up" class="btn btn-outline-primary btn-block">SignUp</button>
			</form>
					<?php include("user_insert.php");?>
		</div>
	</div>
</div>


	
