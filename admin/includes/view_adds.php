<h1>this page is fully construct</h1>
<h1>this page is fully construct</h1>
<h1>this page is fully construct</h1>
<h1>this page is fully construct</h1>
<h1>this page is fully construct</h1>
<?php
	$get_event = "select *from sell";
	$run_event = mysqli_query($con,$get_event);

	$i=0;
	while($row_event=mysqli_fetch_array($run_event)){
		$sell_id  = $row_event['sell_id'];
		$user_id  = $row_event['user_id'];
		$title = $row_event['title'];
		$des = $row_event['des'];
		$number = $row_event['number'];
		$topic = $row_event['topic'];
		$date = $row_event['date'];
		$location = $row_event['location'];
		$sell_status = $row_event['status'];
		$sell_pic1 = $row_event['sell_pic1'];
		$sell_pic2 = $row_event['sell_pic2'];
		$sell_pic3 = $row_event['sell_pic3'];
		$sell_pic4 = $row_event['sell_pic4'];
		$sell_pic5 = $row_event['sell_pic5'];
		$sell_pic6 = $row_event['sell_pic6'];
	$i++;

	$sel_users = "select *from users where user_id=$user_id ";
	$run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
		$user_name = $row_users['user_name'];

echo"
<div class='col-md-3 bgw card'>$user_name
  <img class='card-img-top' src='includes/3.jpg' />
	<h5 class='card-title'>$title</h5>
	<p class='card-text'>$des</p>
	<p class='btn-danger text-center'>$sell_status $date</p>
    <a href='single_add.php?add_id=$sell_id' class='btn btn-primary'>Open This Add</a>
</div>
";
}
 ?>
 