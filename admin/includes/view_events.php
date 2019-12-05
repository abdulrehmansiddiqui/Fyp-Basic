<div class="col-md-12">
<div class="table-responsive bgw">	
	<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
    <th scope="col">User Name</th>
    <th scope="col">User ID</th>
    <th scope="col">Title</th>
    <th scope="col">Message</th>
    <th scope="col">Date</th>
    <th scope="col">Status</th>
    <th scope="col">Status</th>
    <th scope="col">Delete</th>
    </tr>
  </thead>
  	<?php
	$get_event = "select *from events";
	$run_event = mysqli_query($con,$get_event);

	$i=0;
	while($row_event=mysqli_fetch_array($run_event)){
		$event_id = $row_event['event_id'];
		$user_id = $row_event['user_id'];
		$event_title = $row_event['event_title'];
		$event_description = $row_event['event_description'];
		$event_date = $row_event['event_date'];
		$event_status = $row_event['event_status'];
		$event_pic = $row_event['event_pic'];
	$i++;

	$sel_users = "select *from users where user_id=$user_id ";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
		$user_name = $row_users['user_name'];

	?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $user_name;?></td>
      <td><?php echo $user_id;?></td>
      <td><?php echo $event_title; ?></td>
      <td><?php echo $event_description; ?></td>
      <td><?php echo $event_date; ?></td>
      <td><?php echo $event_status;?></td>
      <td>
        <p><a href="includes/update_event_approve.php?event_id=<?php echo $event_id;?>" class="btn btn-danger" >Approve</a></p>
        <p><a href="includes/update_event_decline.php?event_id=<?php echo $event_id;?>" class="btn btn-danger" >Decline</a></p>
	  </td>
      <td>
		<p><a href="index.php?view_events&edit=<?php echo $event_id;?>"><img src="add.png" width="15" height="15"/></a> </p>
		<a href="includes/update_event_delete.php?event_id=<?php echo $event_id;?>"><img src="delete.png" width="15" height="15"/></a>   
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
</div>
</div>
<?php 
	  if(isset($_GET['edit'])){
		$edit_id = $_GET['edit'];
		

	$sel_users = "select *from events where event_id=$edit_id";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
	
		$user_id = $row_users['user_id'];
		$event_title = $row_users['event_title'];
		$event_description = $row_users['event_description'];
		$event_topic = $row_users['event_topic'];
		$event_date = $row_users['event_date'];
		$event_time = $row_users['event_time'];
		$event_pic = $row_users['event_pic'];
		$event_status = $row_users['event_status'];
		$event_post_date = $row_users['event_post_date'];

?>
<div class="col-md-4 bgw emptyall">
	<?php echo " <h2>$event_title</h2>
	<p><img src='../user/user_images/$event_pic' widht='200px' height='200px'/></p>
	<p><strong>Timing: </strong>$event_time</p>
	<p><strong>Date: </strong>$event_date</p>
	<p><strong>Status: </strong>$event_status</p>
	<p><strong>Status: </strong>$event_post_date</p>
	
	" ;?>
</div>
<div class="col-md-8 bgw emptyall">
	<p><strong>Description: </strong><?php echo "$event_description";?></p>
</div>

 <?php }?>