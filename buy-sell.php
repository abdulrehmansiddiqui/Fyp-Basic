<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
else {
include("template/header.php");
include("template/footer.php");
?>

    <!-------------BODY------------->
<div class="container padding">
    <div class="row">
		<h2>Buy / Sell</h2>
        <a class="btn btn-outline-primary btn-block" href="buy-sell_form.php">Post an free ads</a>
            <?php
			$get_sell = "select *from sell where status='verify'";
			$run_event = mysqli_query($con,$get_sell);
			while($row_event=mysqli_fetch_array($run_event)){
                $user_id  = $row_event['user_id'];
                $title = $row_event['title'];
                $des = $row_event['des'];
                $number = $row_event['number'];
                $topic = $row_event['topic'];
                $date = $row_event['date'];
                $location = $row_event['location'];
                $sell_status = $row_event['status'];
                $sell_pic1 = $row_event['sell_pic1'];
echo"
        <div class='col-lg-4 border border-primary emptyall margin'>
            $title<hr>
            $des<hr>
            $date
        </div>
";
            }
            ?>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
}
?>