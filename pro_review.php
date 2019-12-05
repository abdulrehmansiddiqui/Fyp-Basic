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
<div class="container">
    <div class="row padding">
<?php
	if(isset($_GET['u_id'])){
		global $con;
		$get_id = $_GET['u_id'];
	
		$select = "select * from users where user_id='$get_id'";
		$run = mysqli_query($con,$select);
		$row = mysqli_fetch_array($run);
	
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_image = $row['user_image'];
		$user_email = $row['user_email'];
		$user_gender = $row['user_gender'];
		$user_country = $row['user_country'];
		$mobile = $row['user_mobile'];
		$registor_date = $row['registor_date'];
		$last_login = $row['last_login'];
		
		if($user_gender=='Male'){
			$msg="Send him a message";
		}
		else{
			$msg="Send her a message";
        }
		echo"
		<div class='col-lg-6'>
			<h2>Review of $user_name</h2>
        ";            
			// if(isset($_GET['u_id']))
            // $u_id = $_GET['u_id'];
            
            $review = "select * from review where user_id='$user_id' ORDER by 1 DESC";
			$run_rev = mysqli_query($con,$review);

		while($rev = mysqli_fetch_array($run_rev)){
            $review = $rev['review'];
            $rev_name = $rev['review_author'];
            $rev_author_id = $rev['rev_author_id'];
            $review_date = $rev['date'];
			echo"
			<div class='border border-info paddingsm marginsm'>
				<div class='col-md-12'>
					<h4>$review</h4>
					$review_date
					<a href='user_profile.php?u_id=$rev_author_id' class='btn btn-outline-info btn-sm float-right'>$rev_name </a>
				</div>
			</div>
			";
        }
    
        echo"
		</div>
		<div class='col-lg-6'>
            <div class='row' >
            <div class='col-lg-6'>
            <img src='user/user_images/$user_image' width='70%;' height='auto' style='float: right;'/>
            </div>
            <div class='col-lg-6'>
                Name: <strong>$user_name</strong>
                <br>ID: <strong>$user_id</strong>
                <br>ID: <strong>$user_gender</strong>
                <br>Counrty: <strong>$user_country</stroZng>
                <br>Register: <strong>$registor_date</strong>
                <br>Last Login: <strong>$last_login</strong>
            </div>
            </div>
        ";
    
    }
	    if($user_name==$username){
        }
        else{
			echo"<h4>Give Your Review about $user_name</h4>
        <form action='' method='post'>
          <div class='form-group'>
            <input type'text' class='form-control' placeholder='Wirte your comment' name='review' required />
          </div>
          <div class='form-group'>
            <input class='btn btn-primary btn-block' type='Submit' name='reply' value='Post Review'/>
          </div>
        </form>	";
        }
		if(isset($_POST['reply'])){
			$review = $_POST['review'];
			$insert = "insert into review (review_id,user_id,review,review_author,rev_author_id,date) values ('$review_id','$user_id','$review','$username','$userid',NOW())";
			$run = mysqli_query($con,$insert);
				echo "
				<div class='alert alert-success text-center' role='alert'>
					<h5> review Was Added!</h5>
				</div>
				<script>window.open('pro_review.php?u_id=$user_id','_self')</script>
				";
				
		}

		$get_member = "select *from users";
		$run_member = mysqli_query($con,$get_member);
		echo "
		<h2>Our new member</h2>";
		
		while($row = mysqli_fetch_array($run_member)){
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_image = $row['user_image'];
		
		echo "
		<a href='user_profile.php?u_id=$user_id'>
		<img src='user/user_images/$user_image' widht='50px' height='50px' title='$user_name'/></a>
		";
		}
		echo "
		</div>";

?>
    </div>
</div>
    <!-------------BODY-END------------>
<?php 
}
?>