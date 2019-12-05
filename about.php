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
<div class="container padding">
    <div class="row">
        <div class='col-lg-12'>
				<h2>About Us</h2>
				<p>This is an online application that gathers information about all Sport Bike, Car and events being organized at one place. This System will provide us about all selling of sport bike, cars and spear parts and also allow us to create event for auto show and other type.</p> 

				<p>The Frantic Portal that has listings of various Cars, Bikes and event along with their features. It also consists of Cars, Bike and Event service Registration. This system allows user to buy Cars, bikes, spear parts and inventory system. System allow user to check various review submitted by user and even comment on them.</p>

				<p>User also can make the events for the auto shows and other type of the event. User must register himself for creating and event and must have to take the permission to the admin to take post it. Every user will get the update of the events on their portal</p>


		</div>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
include("template/footer.php");
}
?>