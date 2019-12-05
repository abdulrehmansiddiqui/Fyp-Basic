<?php
session_start();
if(!isset($_SESSION['admin_email'])){
	header("location: admin_login.php");
	}
else{
?>	
<html>
<head>	
	<link href="../css/bootstrap.css" rel="stylesheet" />
    <!-- Other CSS -->
    <link href="../css/style.css" rel="stylesheet" />
    <link href="styles/menu.css" rel="stylesheet" />
	<?php include("../includes/connection.php");?>
	<title>Admin Panel</title>
</head>
<body>

<div class="container">
<div class="row">
	<div class='col-md-3'>
	</div>
	<div class='col-md-9 ribbon'>
		<a href="index.php?view_users"   ><span>Users</span></a>
		<a href="index.php?view_events"  ><span>Events</span></a>
		<a href="index.php?view_posts"   ><span>Posts</span></a>
		<a href="index.php?view_comments"><span>Comments</span></a>
		<a href="index.php?view_adds"   ><span>Adds</span></a>
		<a href="index.php?view_topic"   ><span>Topic</span></a>
		<a href="admin_logout.php"       ><span>logout</span></a>
	</div>
</div>
</div>

<div class="container padding">
<div class="row">
	
	      <?php 
	  if(isset($_GET['view_users'])){
		  include("includes/view_users.php");
	  }
	  if(isset($_GET['view_events'])){
		  include("includes/view_events.php");
	  }
	  if(isset($_GET['view_posts'])){
		  include("includes/view_posts.php");
	  }
	  if(isset($_GET['view_comments'])){
		  include("includes/view_comments.php");
	  }
	  if(isset($_GET['view_adds'])){
		  include("includes/view_adds.php");
	  }
	  if(isset($_GET['view_topic'])){
		  include("includes/view_topic.php");
	  }
       ?>
</div>
</div>

</body>
</html>
<?php } ?>