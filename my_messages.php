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
        <?php        
		if(isset($_GET['s_id']))
        $s_id = $_GET['s_id'];
        
        $select = "select * from messages where checker='2$s_id' || checker1='2$s_id' ";
		$run = mysqli_query($con,$select);
        while($row=mysqli_fetch_array($run)){

        $reciver_id = $row['reciver_id'];
        $sender_id = $row['sender_id'];
        $sender_name = $row['sender_name'];
        $sender_msg = $row['sender_msg'];
        $status = $row['status'];
        $msg_date = $row['msg_date'];

        echo"
        <div class='col-lg-7 padding'>
        <p><strong>$sender_name</strong></p> $sender_msg <Br>
        </div>
        ";
        }
        ?>
	</div>

<?php
	if($user_id == $reciver_id){
		echo"<a href='message.php?u_id=$sender_id' class='btn btn-info'>Reply</a>";
	}
	else{
		echo"<a href='message.php?u_id=$reciver_id' class='btn btn-info'>Reply</a>";
	}
?>


</div>

    <!-------------BODY-END------------>
<?php 
}
?>

