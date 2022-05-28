<?php
session_start();
include('config.php');

  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
     if(empty($_POST['email']) || empty($_POST['password']))
      {
        echo "
        <script>alert('Please fill all fields')</script>
              ";
      }
      else
      {
        $search = "SELECT * FROM `company` WHERE `email`= '$email' and `password`= '$password' ";
        $result = mysqli_query($connection, $search);
        if (mysqli_fetch_assoc($result))
        {
          $_SESSION['email'] = $_POST['email'];
          header('location:index.php');
        }
        else{
          echo "
          <div class=\"uk-alert-danger\" uk-alert>
          <a class=\"uk-alert-close\" uk-close></a>
          <p>Please enter correct email and password. </p>
      </div>";
        }
      }

  }

?>

<!doctype html>
<html class="no-js" lang="en">
<?php include('_head.php');
     include('css/ui_alerts.html');

?>

	
    <body>
	
		<!-- Navigation Start  -->
		<?php include('_navbar.php');?>

		<!-- Navigation End  -->
		
		<!-- login section start -->
		<section class="login-wrapper">
			<div class="container">
				<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					<form action="companyLogin.php" method="post" enctype="multipart/form-data">
						<img class="img-responsive" alt="logo" src="img/logo.png">
						<input type="email" class="form-control input-lg" placeholder="Email" name="email">
						<input type="password" class="form-control input-lg" placeholder="Password" name="password">
						<button type="submit" class="btn btn-primary" name="submit">Login</button>
						<p>Have't Any Account <a href="company_registration.php">Create An Account</a></p>
					</form>
				</div>
			</div>
		</section>
		<!-- login section End -->	
		
		<!-- footer start -->
		<?php include("_footer.php")?>

		 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>