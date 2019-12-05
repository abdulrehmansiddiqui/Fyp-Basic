
    <!-------------Footer------------>
    <div class="fixed d-none d-lg-block">
        <div class="container">
            <div class="row paddingtop">
			<?php
		$user = $_SESSION['user_email'];
		$get_user = "select *from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);
		
		$user_id = $row['user_id'];
		$username = $row['user_name'];
		$user_image = $row['user_image'];
		$user_pass = $row['user_pass'];
		$user_birth = $row['user_birth'];
		$user_email = $row['user_email'];
		$user_gender = $row['user_gender'];
		$user_country = $row['user_country'];
		$mobile = $row['user_mobile'];
		$registor_date = $row['registor_date'];
		$last_login = $row['last_login'];
		
		$get_posts = "select * from posts where user_id='$user_id'";
		$run_posts = mysqli_query($con,$get_posts);
		$posts = mysqli_num_rows($run_posts);
		
		$get_msgs = "select * from inbox where user_id='$user_id' || sender_id='$user_id'";
		$run_msgs = mysqli_query($con,$get_msgs);
		$msgs = mysqli_num_rows($run_msgs);
		
		echo "
		
                <div class='col-lg-1'>
					<img class='rounded-circle' src='user/user_images/$user_image' width='70' height='70'>
                </div>
                <div class='col-lg-3'>
                    <strong>$username</strong><br>
                    <strong>$user_email	</strong><br>
                    <strong>$user_country</strong><br>
                    <strong>$mobile</strong>
                </div>
                <div class='col-lg-2'>
                    ID: <strong>$user_id	</strong><br>
                    Reg: <strong>$registor_date</strong><br>
                    Last: <strong>$last_login</strong>
                </div>

                <div class='col-lg-2'>
                    <a class='btn btn-outline-primary btn-block' href='my_posts.php?u_id=$user_id'>My Post $posts</a>
                </div>

                <div class='col-lg-2'>
                    <a class='btn btn-outline-primary btn-block' href='inbox.php?user_id=$user_id'>My Message $msgs</a>
                </div>

                <div class='col-lg-2'>
                    <a class='btn btn-outline-primary btn-block' href='edit_profile.php?u_id=$user_id'>Edit my account</a>
                </div>
			";
		?>
            </div>
        </div>
    </div>
    <!-------------Footer-END------------>
    <!--JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- java for Menu -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
