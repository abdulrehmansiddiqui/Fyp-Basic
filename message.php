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
		<?php
			if(isset($_GET['u_id'])){
			$u_id = $_GET['u_id'];
			
			$sel = "select * from users where user_id='$u_id'";
			$run = mysqli_query($con,$sel);
			$row=mysqli_fetch_array($run);
			
			$user_name2 = $row['user_name'];
			$user_image = $row['user_image'];
			$reg_date = $row['registor_date'];
			}
			echo "<h2>Send A Message to $user_name2</h2>";
		?>
		<form action="message.php?u_id=<?php echo $u_id;?>" method="post"  >
			<input type="text" name="msg_title" placeholder="" required="required"/><br><br>
			<input type="submit" name="new" value="Send Msg" class="btn btn-info"/><br>
		</form>
		

<?php
if(isset($_POST['new'])){

	$msg_title = $_POST['msg_title'];
	$insert = "insert into messages (reciver_id,reciver_name,sender_id,sender_name,sender_msg,reply,status,msg_date,checker,checker1) values ('$u_id','$user_name2','$user_id','$username','$msg_title','no_reply','unread',NOW(),'2$u_id$user_id','2$user_id$u_id')";
	$run_insert = mysqli_query($con,$insert);
	if($run_insert){
		echo "<h2> Your message was sent!</h2>";
	}

	$inbox = "select * from inbox where checker='2$u_id$user_id' || checker='2$user_id$u_id' || checker1='2$user_id$u_id' || checker1='2$u_id$user_id' ";
	$run_inbox = mysqli_query($con,$inbox);
	$check = mysqli_num_rows($run_inbox);
		if($check==0){
			$inbox = "insert into inbox (user_id,reciver_name,sender_id,sender_name,status,date,checker,checker1) values ('$u_id','$user_name2','$user_id','$username','unread',NOW(),'2$u_id$user_id','2$user_id$u_id')";
			$run_inbox = mysqli_query($con,$inbox);
			echo "<h2> New Inbox Update!</h2>";
			echo "<script>window.open('inbox.php?user_id=$$user_id','_self')</script>";
		}
		else{
			echo "<h2> Inbox Already Exist!</h2>";
			echo "<script>window.open('inbox.php?user_id=$$user_id','_self')</script>";
		}

}
?>
		<p>
			<img src="user/user_images/<?php echo $user_image;?>" width="auto" height="100px" />
			<?php echo $username;?> is member of since: <?php echo "$reg_date";?>
		</p>
        </div>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
}
?>
