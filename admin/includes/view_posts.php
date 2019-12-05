<div class="col-md-12 ">
<div class="table-responsive bgw">	
	<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
    <th scope="col">User Name</th>
    <th scope="col">Title</th>
    <th scope="col">Message</th>
    <th scope="col">Date</th>
    <th scope="col">Delete</th>
    </tr>
  </thead>
  	<?php
	$sel_posts = "select *from posts ORDER by 1 DESC";
	$run_posts = mysqli_query($con,$sel_posts);
	$i=0;
	while($row_posts = mysqli_fetch_array($run_posts)){
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$user_title = $row_posts['user_title'];
		$user_msg = $row_posts['user_msg'];
		$post_date = $row_posts['post_date'];
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
      <td><?php echo $user_title; ?></td>
      <td><?php echo $user_msg; ?></td>
      <td><?php echo $post_date; ?></td>
      <td>		        
	  <center>     
	  <a href="includes/delete_post.php?post_id=<?php echo $post_id;?>"><img src="delete.png" width="15" height="15"/></a>   
	  </center>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
</div>


</div>