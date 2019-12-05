<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
else {
include("template/header.php");
?>

    <!-------------BODY------------->
<div class="container">
    <div class="row">
        <div class="col-lg-12 padding">
				<?php user_posts();?>
        </div>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
include("template/footer.php");
}
?>