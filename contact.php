<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
else {
include("template/header.php");
?>

    <!-------------BODY------------->
<div class="container padding">
    <div class="row">
        <div class='col-lg-12'>
			<h2>Contact Us</h2>
			<form method="post" action="" id="form1" class="contact2-form validate-form">
				<div class="form-group">
					<input class="form-control" type="text" name="u_name" placeholder="Full Name" required />
				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="u_email" placeholder="Email" required />
				</div>
				<div class="form-group">
					<textarea class="form-control" type="text" name="u_email" placeholder="Your Msg" required ></textarea>
				</div>
				<button class="btn btn-outline-primary btn-block" name="login">Login</button>
			</form>
		</div>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
include("template/footer.php");
}
?>