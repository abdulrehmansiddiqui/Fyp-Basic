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
				<h2>All Registered User</h2>
		</div>
		<?php
		$get_member = "select *from users";
		$run_member = mysqli_query($con,$get_member);
		
		while($row = mysqli_fetch_array($run_member)){
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_image = $row['user_image'];
		
		echo "<span class='border border-primary margin'>
        <div class='col-lg-1'>
			<a href='user_profile.php?u_id=$user_id'>
				<img src='user/user_images/$user_image' widht='70px' height='70px' title='$user_name'/>
			</a>
        </div></span>

		";
		}
		?>

    </div>
</div>
    <!-------------BODY-END------------>
<?php 
include("template/footer.php");
}
?>