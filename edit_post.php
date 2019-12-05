<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
else {
include("template/header.php");
include("template/footer.php");
?>
		<?php
			if(isset($_GET['post_id'])){
				$get_id = $_GET['post_id'];
				$get_posts = "select * from posts where post_id='$get_id'";
				$run_posts = mysqli_query($con,$get_posts);
				$row_posts = mysqli_fetch_array($run_posts);
		
			$user_id  = $row_posts['user_id'];
			$user_title  = $row_posts['user_title'];
			$user_msg  = $row_posts['user_msg'];
			$post_date  = $row_posts['post_date'];
			}
		?>
    <!-------------BODY------------->
<div class="container">
    <div class="row">
        <div class="col-lg-12 padding">
		<div class='row border border-primary paddingtop'>
			<div class='col-md-2 text-center '>
			<?php
			echo"
				<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
				<h6><a href='user_profile.php?u_id=$user_id'>$username</a></h6>";
			?>
			</div>
			<div class='col-md-10'>
				<form action="" method="post">
					<div class="form-group">
					<input class="form-control" type="text" name="u_title" value="<?php echo"$user_title"?>"/>
					</div>
					<div class="form-group">
					<input class="form-control" type="text" name="u_msg" value="<?php echo"$user_msg"?>" />
					</div>
					<select class="form-control" name="u_topic">
						<?php getTopics();?>
					</select>
			</div>
			<div class='col-md-12 marginsm'>
					<button name="update" class="btn btn-primary btn-block">Update</button>
				</form>		
			<?php
	if(isset($_POST['update'])){
		$utitle = $_POST['u_title'];
		$umsg = $_POST['u_msg'];
		$utopic = $_POST['u_topic'];
			
		$update = "update posts set user_title='$utitle', user_msg='$umsg', user_topic='$utopic' where post_id='$get_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Post is Updated!')</script>";
			// echo "<script>window.open('my_posts.php?u_id=$user_id','_self')</script>";
		}
		else{
			echo "<h3>Error!</h3>";
		}
	}
?>
			</div>
		</div>
        </div>
    </div>
</div>
				
    <!-------------BODY-END------------>
<?php 
}
?>







