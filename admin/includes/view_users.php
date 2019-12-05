<div class="col-md-12 ">
<div class="table-responsive bgw">	
	<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
    <th scope="col">User Name</th>
    <th scope="col">Email</th>
    <th scope="col">Country</th>
    <th scope="col">Gender</th>
    <th scope="col">Mobile</th>
    <th scope="col">Reg Date</th>
    <th scope="col">Last Login</th>
    <th scope="col">Status</th>
    <th scope="col">Edit</th>
    </tr>
  </thead>
  	<?php
	$sel_users = "select *from users ORDER by 1 DESC";
	$run_users = mysqli_query($con,$sel_users);
	$i=0;
	while($row_users = mysqli_fetch_array($run_users)){
		$user_id = $row_users['user_id'];
		$user_name = $row_users['user_name'];
		$user_email = $row_users['user_email'];
		$user_pass = $row_users['user_pass'];
		$user_gender = $row_users['user_gender'];
		$user_country = $row_users['user_country'];
		$mobile = $row_users['user_mobile'];
		$last_login = $row_users['last_login'];
		$registor_date = $row_users['registor_date'];
		$status = $row_users['status'];
	$i++;
	?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $user_name;?></td>
      <td><?php echo $user_email; ?></td>
      <td><?php echo $user_country; ?></td>
      <td><?php echo $user_gender; ?></td>
      <td><?php echo $mobile; ?></td>
      <td><?php echo $registor_date; ?></td>
      <td><?php echo $last_login; ?></td>
      <td><?php echo $status; ?></td>
      <td>		        
	  <p><a href="index.php?view_users&edit=<?php echo $user_id;?>"><img src="edit.png" width="15" height="15"/></a> </p>
	  <p><a href="includes/delete_users.php?user_id=<?php echo $user_id;?>"><img src="delete.png" width="15" height="15"/></a></p>
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
		

	$sel_users = "select *from users where user_id=$edit_id";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
	
		$user_id = $row_users['user_id'];
		$user_name = $row_users['user_name'];
		$user_email = $row_users['user_email'];
		$user_pass = $row_users['user_pass'];
		$user_country = $row_users['user_country'];
		$user_gender = $row_users['user_gender'];
		$mobile = $row_users['user_mobile'];
		$birth = $row_users['user_birth'];
		$user_image = $row_users['user_image'];
		$last_login = $row_users['last_login'];
		$registor_date = $row_users['registor_date'];
		$status = $row_users['status'];

		
?>
<div class="col-md-3 bgw emptyall">
	<?php echo " <h2>$user_name</h2>
	<p><img src='../user/user_images/$user_image' widht='200px' height='200px'/></p>
	<p><strong>last login: </strong>$last_login</p>
	<p><strong>Reg date: </strong>$registor_date</p>
	<p><strong>Status: </strong>$status</p>
	
	" ;?>
</div>
<div class="col-md-9 bgw emptyall">
	<h2>Edit User Profile</h2>
				<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input class="form-control" type="text" name="u_name" value="<?php echo $user_name;?>" required />
				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="u_email" value="<?php echo $user_email;?>" required />
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="u_pass" value="<?php echo $user_pass;?>" required />
				</div>
				<div class="form-group">
					<select class="form-control" name="u_country">
				</div>
				<div class="form-group">
						<option><?php echo $user_country;?></option>
						<option>Karachi</option>
						<option>Hyderabad</option>
						<option>Lahore</option>
						<option>Peshawar</option>
						<option>Islamabad</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="u_gender">
						<option><?php echo $user_gender;?></option>
						<option>Male</option>
						<option>Female</option>
					</select>
				</div>
				<div class="form-group">
					<input class="form-control" type="text" disabled value="<?php echo $birth;?>" name="u_birth"/>
				</div>
				<div class="form-group">
					<input class="form-control" type="number"  placeholder="Mobile Number" value="<?php echo $mobile;?> name="u_mobile">
				</div>

				<button name="update" class="btn btn-outline-primary btn-block">Update</button>
			</form>
</div>
<?php

	if(isset($_POST['update'])){
		$u_name = $_POST['u_name'];
		$u_pass = $_POST['u_pass'];
		$u_email = $_POST['u_email'];
		$u_mobile = $_POST['u_mobile'];
		$u_gender = $_POST['u_gender'];
		$u_country = $_POST['u_country'];
		
		$update = "update users set user_name='$u_name', user_pass='$u_pass', user_email='$u_email', user_mobile='$u_mobile', user_gender='$u_gender', user_country='$u_country' where user_id='$user_id'";
		
		$run = mysqli_query($con,$update);
		if($run){
			echo "<script>alert('You Profile Updated!')</script>";
			echo "<script>window.open('index.php?view_users&edit=$user_id' ,'_self')</script>";
		}
		
	}
		
	  }
?>

	
	
	
	
	
	

