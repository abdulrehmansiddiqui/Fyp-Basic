<?php
session_start();
include("../includes/connection.php");
?>

<!DOCTYPE html>
<html>
	<head>
	<title>Admin Login Panel</title>
	    <!-- Bootstrap CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet" />
    <!-- Other CSS -->
    <link href="../css/style.css" rel="stylesheet" />


	</head>
	
<body style="background-image: url('images/bg-01.jpg');">
<div class="container emptyall">
	<div class="row">
		<div class="col-lg-3">
		</div>
		<div class="col-lg-6">
		<h2>Login</h2>
			<form method="post" action="admin_login.php">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">@</span>
						</div>
						<input class="form-control" type="text" placeholder="Email" name="email" required />
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
				<button class="btn btn-outline-primary btn-block" name="login">Admin Login</button>
				<button class="btn btn-outline-primary btn-block" name="admin">Super Admin Login</button>
			</form>
		</div>
		<div class="col-lg-3">
		</div>
	</div>
</div>
</body>
</html>

<?php
	if(isset($_POST['admin'])){
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$pass = mysqli_real_escape_string($con,$_POST['pass']);
			
		$get_user = "select * from super_admin where super_user='$email' AND super_pass='$pass'";
		$run_user = mysqli_query($con,$get_user);
		$check = mysqli_num_rows($run_user);
			
		if($check==1){
			$_SESSION['super_admin_email']=$email;
			echo "<script>window.open('super_admin.php','_self')</script>";
		}
		else{
			echo "<div class='alert alert-danger text-center' role='alert'>
					<h5>Sorry ! incorrect ID Password</h5>
				</div>";
		}
	}
	
	if(isset($_POST['login'])){
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$pass = mysqli_real_escape_string($con,$_POST['pass']);
			
		$get_user = "select * from admin where admin_email='$email' AND admin_pass='$pass'";
		$run_user = mysqli_query($con,$get_user);
		$check = mysqli_num_rows($run_user);
			
		if($check==1){
			$_SESSION['admin_email']=$email;
			echo "<script>window.open('index.php','_self')</script>";
		}
		else{
			echo "<div class='alert alert-danger text-center' role='alert'>
					<h5>Sorry ! incorrect ID Password</h5>
				</div>";
		}
	}
?>