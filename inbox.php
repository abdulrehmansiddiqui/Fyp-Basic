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
        <div class="col-lg-12 padding">
			<h2>Inbox Of <?php echo "$username"; ?></h2>
        </div>
        <?php
        $select = "select * from inbox where sender_id='$user_id'";
		$run = mysqli_query($con,$select);
        while($row=mysqli_fetch_array($run)){

        $sender_id = $row['sender_id'];
        $sender_name = $row['sender_name'];
        $reciver_name = $row['reciver_name'];
        $u_id = $row['user_id'];
        $status = $row['status'];

        echo"
        <div class='col-lg-12 padding'>
        <a class='btn btn-outline-primary btn-block' href='my_messages.php?s_id=$u_id$user_id'>$reciver_name  $u_id$user_id </a>
        </div>
        ";
        }
        ?>
        
        <?php
        $select = "select * from inbox where user_id='$user_id'";
		$run = mysqli_query($con,$select);
        while($row=mysqli_fetch_array($run)){

        $sender_id = $row['sender_id'];
        $sender_name = $row['sender_name'];
        $status = $row['status'];

        echo"
        <div class='col-lg-12 padding'>
        <a class='btn btn-outline-primary btn-block' href='my_messages.php?s_id=$sender_id$user_id'>$sender_name</a>
        </div>
        ";
        }
        ?>
        

        
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
}
?>

