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
    <div class="row">
        <div class="col-lg-6 padding">
            <center><h2>Discussions area</h2></center>
<?php
if(isset($_GET['u_id'])){
	$u_id = $_GET['u_id'];
	}
	
	$get_posts = "select * from posts where user_id='$u_id' ORDER by 1 DESC";
	$run_posts = mysqli_query($con,$get_posts);
	
	while($row_posts=mysqli_fetch_array($run_posts)){
		$post_id = $row_posts['post_id'];
		$user_id  = $row_posts['user_id'];
		$user_title  = $row_posts['user_title'];
		$user_msg  = $row_posts['user_msg'];
		$post_date  = $row_posts['post_date'];

		//getting the user who has posted the thread
		$user = "select * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		//now displaying all at once
		echo"
			<div class='row border border-primary paddingtop'>
				<div class='col-md-2 text-center '>
					<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
					<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
				</div>
				<div class='col-md-10'>
					<h3>$user_title</h3>
					<p>$user_msg</p>
					<p>$post_date </p>
					<div style='position: absolute; bottom: -15px; right: 40%;'><a href='single.php?post_id=$post_id' class='btn btn-primary'>Comments</a></div>
				</div>
			</div>
			<br>
		";
	}
?>
        </div>

        <div class="col-lg-6 padding">
            <div class="sticky">

			
			
			
			
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
			<h2>Info about $user_name</h2>
	<div class='row'>
		<div class='col-lg-6'>
			<img src='user/user_images/$user_image' width='70%;' height='auto'/>
		</div>
		<div class='col-lg-6'>
			<p>Name: <strong>$user_name</strong></p>
			<p>ID: <strong>$user_id</strong></p>
			<p>Gender: <strong>$user_gender</strong></p>
			<p>Counrty: <strong>$user_country</strong></p>
			<p>Register: <strong>$registor_date</strong></p>
			<p>Last Login: <strong>$last_login</strong></p>
		</div>				
		<div class='col-lg-12'>
			<p><a href='singleuserposts.php?u_id=$user_id' class='btn btn-outline-primary btn-block'>See $user_name Posts</a></p>
			<p><a href='singleuserevents.php?u_id=$user_id' class='btn btn-outline-primary btn-block'>See $user_name Events</a></p>
			<p><a href='pro_review.php?u_id=$user_id' class='btn btn-outline-primary btn-block'>Review</a></p>
		</div>
	</div>
        ";
        if($user_name==$username){
        }
        else{
            echo "<p><a href='message.php?u_id=$user_id' class='btn btn-outline-primary btn-block'>$msg</a></p>";
        }
        echo"";
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
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
}
?>