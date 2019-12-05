<?php
	$query = "select * from posts";
	$result = mysqli_query($con,$query);
	//count the total record
	$total_posts = mysqli_num_rows($result);
	//using cceil funtion to divide the total records on per page
	$total_pages = ceil($total_posts / $per_page);
	//going to first page
	echo"
	<nav aria-label='Page navigation example'>
		<ul class='pagination justify-content-center'>
    <li class='page-item'><a class='page-link' href='home.php?page=1'><span aria-hidden='true'>&laquo;</span></a></li>
	";
	
	for($i=1; $i<=$total_pages; $i++){
	echo"<li class='page-item'><a class='page-link' href='home.php?page=$i'>$i</a></li>";
	}
	
	echo"
	<li class='page-item'><a class='page-link' href='home.php?page=$total_pages'><span aria-hidden='true'>&raquo;</span></a></li>
		</ul>
	</nav>
	";
	?>
	
	