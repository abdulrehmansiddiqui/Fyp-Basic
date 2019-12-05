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

    <!-------------BODY------------->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 padding">
			<center><h2>Event</h2></center>
			<?php 
			global $con;

			if(isset($_GET['topic'])){
			$event_topic = $_GET['topic'];
			}
			$get_event = "select *from events where event_status='approve' AND event_topic='$event_topic' ORDER by 1 DESC ";
			$run_event = mysqli_query($con,$get_event);

			while($row_event=mysqli_fetch_array($run_event)){
				$event_id = $row_event['event_id'];
				$user_id = $row_event['user_id'];
				$event_title = $row_event['event_title'];
				$event_description = $row_event['event_description'];
				$event_date = $row_event['event_date'];

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
					<h3>$event_title</h3>
					<p>$event_description</p>
					<p>$event_date </p>
					<div style='position: absolute; bottom: -15px; right: 40%;'><a href='' class='btn btn-primary'>Comments</a></div>
				</div>
			</div>
			<br>
		";
			};
			?>
		</div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 padding">
            <div class="sticky">
                <h2>What Is Your Question</h2>
				<form action="home.php?id=<?php echo $user_id;?>" method="post">
					<div class="row">
						<div class="col-lg-6 paddingtop">
							<input type="text" class="form-control" name="u_title" placeholder="Title" required="required">
						</div>
						<div class="col-lg-6 paddingtop">
						<select class="form-control" name="u_topic">
							<option value="" style="display:none">Select Topic</option>
							<?php eventtopic();?>
						</select>
						</div>
						<div class="col-lg-12 paddingtop">
							<input type="text" class="form-control" name="u_msg" placeholder="Event Description" />
						</div>
						<div class="col-lg-6 paddingtop">
							<input type="date" class="form-control" name="u_date" />							
						</div>
						<div class="col-lg-6 paddingtop">
							<input type="time" class="form-control" name="u_time" />
						</div>
						<div class="col-lg-12 paddingtop">		
							<input type="file" class="form-control" name="u_file" />
						</div>
						<div class="col-lg-12 paddingtop">		
							<button name="posted" class="btn btn-primary btn-block">post</button>
						</div>
					</div>
				</form>

                <h4>Event sort by Categories</h4>
                <?php
                $get_topics = "select * from event_topic";
                $run_topics = mysqli_query($con,$get_topics);
					while($row=mysqli_fetch_array($run_topics)){
						$event_topic_id = $row['event_topic_id'];
						$event_topic = $row['event_topic'];
					echo "<a class='btn btn-outline-primary btn-block col-md-6' href='event_topic.php?topic=$event_topic_id'>$event_topic</a>";
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