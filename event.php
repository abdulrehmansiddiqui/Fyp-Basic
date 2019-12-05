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
			<?php Eventposts();	?>
			
		</div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 padding">
            <div class="sticky">
                <h2>Post an auto show event</h2>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-lg-6 paddingtop">
							<input type="text" class="form-control" name="utitle" placeholder="Title*" required="required"/>
						</div>
						<div class="col-lg-6 paddingtop">
						<select class="form-control" name="utopic">
							<option value="" style="display:none">Select Topic*</option>
							<?php eventtopic();?>
						</select>
						</div>
						<div class="col-lg-12 paddingtop">
							<input type="text" class="form-control" name="umsg" placeholder="Event Description*" required="required" />
						</div>
						<div class="col-lg-6 paddingtop">
							<input type="date" class="form-control" name="udate" required="required"/>							
						</div>
						<div class="col-lg-6 paddingtop">
							<input type="time" class="form-control" name="utime" required="required"/>
						</div>
						<div class="col-lg-12 paddingtop">		
							<input type="file" class="form-control" name="ufile" />
						</div>
						<div class="col-lg-12 paddingtop">		
							<button name="update" class="btn btn-primary btn-block">Update</button>
						</div>
					</div>
				</form>
		<?php
			if(isset($_POST['update'])){
				$title = addslashes(mysqli_real_escape_string($con,$_POST['utitle']));
				$msg = addslashes(mysqli_real_escape_string($con,$_POST['umsg']));
				$topic = mysqli_real_escape_string($con,$_POST['utopic']);
				$date = mysqli_real_escape_string($con,$_POST['udate']);
				$time = mysqli_real_escape_string($con,$_POST['utime']);
				$file = $_FILES['ufile']['name'];
				$image_tmp = $_FILES['ufile']['tmp_name'];
			
				move_uploaded_file($image_tmp,"user/event_file/$file");
				
				$insert = "insert into events (user_id, event_title,event_description,event_topic,event_date,event_time,event_pic,event_status,event_post_date) values ('$user_id','$title','$msg','$topic','$date','$time','$file','Unverify',NOW())";
			
				$run_insert = mysqli_query($con,$insert);
					if($run_insert){
					echo "
					<div class='alert alert-success text-center' role='alert'>
						<h5> Update Successful</h5>
					</div>";
					
					}
				}
		?>
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