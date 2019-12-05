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
        <div class="col-lg-6 padding">
            <center><h2>Discussions area</h2></center>
            <?php GettheallPosts();?>
        </div>

        <div class="col-lg-6 padding">
            <div class="sticky">
                <h2>What Is Your Question</h2>
				<form action="home.php?id=<?php echo $user_id;?>" method="post">
					<div class="row">
						<div class="col-lg-6 paddingtop">
							<input type="text" class="form-control" name="u_title" placeholder="Title" required="required">
						</div>
						<div class="col-lg-6 paddingtop">
							<input type="text" class="form-control" name="u_msg" placeholder="Description" />
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 paddingtop">
						<select class="form-control" name="u_topic">
							<option value="" style="display:none">Select Topic</option>
							<?php getTopics();?>
						</select>
						</div>
						<div class="col-lg-6 paddingtop">
							<button name="posted" class="btn btn-primary btn-block">post</button>
						</div>
					</div>
				</form>
				<?php TimeLineUpdate();?>
				
                <h4>Post sort by Categories</h4>
                <?php
                $get_topicss = "select * from topicss";
                $run_topicss = mysqli_query($con,$get_topicss);
                while($row=mysqli_fetch_array($run_topicss)){
                $topic_id = $row['topic_id'];
                $topic_title = $row['topic_title'];
                echo "<a class='btn btn-outline-primary btn-block col-md-6' href='topic.php?topic=$topic_id'>$topic_title</a>";
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