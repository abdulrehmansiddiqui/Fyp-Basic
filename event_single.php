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
		<!------------------------------BODY---------------------------------->
<div class="container">
    <div class="row">
	
		<div class="col-lg-12 padding">
			<div class="sticky">
			<h2>Single Posts</h2>
				<?php 
				if(isset($_GET['event_id'])){
				global $con;
				$get_id = $_GET['event_id'];
				
				$get_posts = "select * from events where event_id='$get_id'";
				$run_posts = mysqli_query($con,$get_posts);
				$row_posts = mysqli_fetch_array($run_posts);
	
				$event_id = $row_posts['event_id'];
				$user_id  = $row_posts['user_id'];
				$event_title = $row_posts['event_title'];
				$event_description = $row_posts['event_description'];
				$event_date = $row_posts['event_date'];
				$event_time = $row_posts['event_time'];
				$event_pic = $row_posts['event_pic'];
				$event_status = $row_posts['event_status'];
		
		//getting the user who has posted the thread
		$user = "select * from users where user_id='$user_id'";
		
		$run_user = mysqli_query($con,$user);
		$row_user = mysqli_fetch_array($run_user);
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];
				
		//Getting User Session
		$user_com = $_SESSION['user_email'];
		$get_com = "select *from users where user_email='$user_com'";
		$run_com = mysqli_query($con,$get_com);
		$row_com = mysqli_fetch_array($run_com);
		$user_com_id = $row_com['user_id'];
		$user_com_name = $row_com['user_name'];
		
		//now displaying all at once
		echo"
			<div class='row border border-primary paddingtop'>
				<div class='col-md-1 text-center'>
					<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
					<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
				</div>
				<div class='col-md-9'>
					<h3>$event_title</h3>
					<p>$event_description</p>
					<p>$event_date $event_time</p>
				</div>
				<div class='col-md-2 text-center'>
					<img src='$event_pic'/>
				</div>
			</div>
			<br>
		";
		
		echo "
			<form action='' method='post'>
			  <div class='form-group'>
				<input type'text' class='form-control' placeholder='Wirte your comment' name='comment' />
			  </div>
			  <div class='form-group'>
				<input class='btn btn-warning btn-block' type='Submit' name='reply' value='Post Comment'/>
			  </div>
			</form>		
		
		";
			$get_id = $_GET['event_id'];
			$get_com = "select * from event_comments where event_id='$get_id' ORDER by 1 DESC";
			$run_com = mysqli_query($con,$get_com);
	
		while($row = mysqli_fetch_array($run_com)){
			$com = $row['comment'];
			$com_name = $row['comment_author'];
			$event_date = $row['event_date'];
			echo"
			<div class='border border-warning paddingsm marginsm'>
				<div class='col-md-12'>
					<h4>$com</h4>
					$event_date
					<button type='button' class='btn btn-outline-warning btn-sm float-right'>$com_name</button>
				</div>
			</div>
			";
		}
			echo"";

	/////////////////////////////Ineserting the Comments
		global $user_id;
		if(isset($_POST['reply'])){
			$comment = $_POST['comment'];
				if($comment==''){
					echo "
				<div class='alert alert-danger text-center' role='alert'>
					<h5>Please Fill the Form first</h5>
				</div>";
				}
				else{
			$insert = "insert into event_comments (event_id,user_id,comment,comment_author,event_date) values ('$event_id','$user_id','$comment','$user_com_name',NOW())";
			$run = mysqli_query($con,$insert);
				echo "
				<div class='alert alert-success text-center' role='alert'>
					<h5> Comment Was Added!</h5>
				</div>
				<script>window.open('event_single.php?event_id=$event_id','_self')</script>
				";
				}	
		}
	}

				?>
			</div>
		</div>
    </div>
</div>

    <!-------------BODY-END------------>
<?php 
}
?>









