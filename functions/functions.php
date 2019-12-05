<?php 
	$con = mysqli_connect("localhost","root","","abdul_network") or die("Connection was not established");
	
	
	
	/////////////////////////////Function for Event post page
	
	function eventposts(){
			global $con;
			$get_event = "select *from events";
			$run_event = mysqli_query($con,$get_event);

			while($row_event=mysqli_fetch_array($run_event)){
				$event_id = $row_event['event_id'];
				$user_id = $row_event['user_id'];
				$event_title = $row_event['event_title'];
				$event_description = $row_event['event_description'];
				$event_date = $row_event['event_date'];
				$event_status = $row_event['event_status'];

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
				<div class='col-md-8'>
					<h3>$event_title</h3>
					<p>$event_description</p>
					<p>$event_date </p>
					<div style='position: absolute; bottom: -15px; right: 40%;'><a href='event_single.php?event_id=$event_id' class='btn btn-primary'>Open event</a></div>
				</div>
				<div class='col-md-2'>";
					if($event_status=="approve"){echo"<img src='approved.jpg'/> alt='Approved'";}
					else{echo"<img src='unapproved.jpg' alt='Unapproved'/>";}
				echo"
				</div>
			</div>
			<br>
		";
			};
	};
	


	/////////////////////////////Function for Displaying Single User POSTS 
	function user_posts(){
	global $con;
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
				</div>
				<div class='col-md-4 marginsm'>
					<a href='single.php?post_id=$post_id' class='btn btn-primary btn-block'>Comments</a>
				</div>
				<div class='col-md-4 marginsm'>
					<a href='edit_post.php?post_id=$post_id' class='btn btn-primary btn-block'>Edit</a>
				</div>
				<div class='col-md-4 marginsm'>
					<a href='functions/delete_post.php?post_id=$post_id' class='btn btn-primary btn-block'>Delete</a>
				</div>

			</div>
			<br>
			
			
		";
	}
	}
	/////////////////////////////Function for Getting the categories or topics
	function get_Cats(){
	global $con;

	if(isset($_GET['topic'])){
	$topic_id = $_GET['topic'];
	}
	
	$get_posts = "select *from posts where user_topic='$topic_id' ORDER by 1 DESC";
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
	}
	
	/////////////////////////////Function for Single POSTS
	function single_posts(){
	if(isset($_GET['post_id'])){
		global $con;
	$get_id = $_GET['post_id'];
	$get_posts = "select * from posts where post_id='$get_id'";
	$run_posts = mysqli_query($con,$get_posts);
	$row_posts = mysqli_fetch_array($run_posts);
	
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
				<div class='col-md-2 text-center '>
					<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
					<h6><a href='user_profile.php?u_id=$user_id'>$user_name</a></h6>
				</div>
				<div class='col-md-10'>
					<h3>$user_title</h3>
					<p>$user_msg</p>
					<p>$post_date </p>
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
			$get_id = $_GET['post_id'];
			$get_com = "select * from comments where post_id='$get_id' ORDER by 1 DESC";
			$run_com = mysqli_query($con,$get_com);
	
		while($row = mysqli_fetch_array($run_com)){
			$com = $row['comment'];
			$com_name = $row['comment_author'];
			$date = $row['date'];
			echo"
			<div class='border border-warning paddingsm marginsm'>
				<div class='col-md-12'>
					<h4>$com</h4>
					$date
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
			$insert = "insert into comments (post_id,user_id,comment,comment_author,date) values ('$post_id','$user_id','$comment','$user_com_name',NOW())";
			$run = mysqli_query($con,$insert);
				echo "
				<div class='alert alert-success text-center' role='alert'>
					<h5> Comment Was Added!</h5>
				</div>
				<script>window.open('single.php?post_id=$post_id','_self')</script>
				";
				}	
		}
	}
	}
	
	/////////////////////////////Function for Displaying POSTS
	function GettheallPosts(){
	global $con;
	$per_page=10;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}
	else{
	$page=1;	
	}
	$start_from = ($page-1) * $per_page;
	$get_posts = "select * from posts ORDER by 1 DESC LIMIT $start_from, $per_page";
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
	include("pagination.php");
	}
	
	/////////////////////////////Function for inserting POSTS
	function TimeLineUpdate(){
		global $con;
		global $user_id;
			if(isset($_POST['posted'])){
			$title = addslashes(mysqli_real_escape_string($con,$_POST['u_title']));
			$msg = addslashes(mysqli_real_escape_string($con,$_POST['u_msg']));
			$topic = mysqli_real_escape_string($con,$_POST['u_topic']);
			
			$insert = "insert into posts (user_id,user_title,user_msg,user_topic,post_date) values ('$user_id','$title','$msg','$topic',NOW())";
		
			$run_insert = mysqli_query($con,$insert);
				if($run_insert){
				echo "<h2>POSTED Successful</h2>
				<script>window.open('home.php','_self')</script>";
				
				$update ="update users set posts='yes' where user_id='$user_id'";
				$run_update = mysqli_query($con,$update);
				}
			}
	}

	/////////////////////////////Funtion for Event Topics
	function eventtopic(){
		global $con;
    $get_topics = "select * from event_topic";
    $run_topics = mysqli_query($con,$get_topics);
		while($row=mysqli_fetch_array($run_topics)){
			$event_topic_id = $row['event_topic_id'];
			$event_topic = $row['event_topic'];
				echo "<option value='$event_topic_id'>$event_topic</a></option>";
			}
	}
	
	/////////////////////////////Funtion for getting Topics
	function getTopics(){
		global $con;
	$get_topicss = "select * from topicss";
	$run_topicss = mysqli_query($con,$get_topicss);
		
		while($row=mysqli_fetch_array($run_topicss)){
			$topic_id = $row['topic_id'];
			$topic_title = $row['topic_title'];
		echo "<option value='$topic_id'>$topic_title</a></option>";
		}
	}
	?>

	
	
	
	
	
	
	