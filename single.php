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
		<!------------------------------BODY---------------------------------->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 padding">
            <center><h2>Discussions area</h2></center>
            <?php GettheallPosts();?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 padding">
			<div class="sticky">
			<h2>Single Posts</h2>
				<?php single_posts();?>
			</div>
		</div>
    </div>
</div>

    <!-------------BODY-END------------>
<?php 
include("template/footer.php");
}
?>