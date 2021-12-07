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
        $search = "SELECT * FROM `user` WHERE `email`= '$email' and `password`= '$password' ";
        $result = mysqli_query($connection, $search);
        if (mysqli_fetch_assoc($result))
        {
          $_SESSION['email'] = $_POST['email'];
          header('location:userDashbourd.php');
        }
        else{
          echo "
        <script>alert('Please Enter correct Username and Password')</script>
              ";
        }
      }

  }

?>

<!doctype html>
<html class="no-js" lang="en">
<?php include('_head.php');?>

	
    <body>
	
		<!-- Navigation Start  -->
		<?php include('_navbar.php');?>

		<!-- Navigation End  -->
		
		<!-- login section start -->
		<section class="login-wrapper">
			<div class="container">
				<div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					<form>
						<img class="img-responsive" alt="logo" src="img/logo.png">
						<input type="text" class="form-control input-lg" placeholder="User Name">
						<input type="password" class="form-control input-lg" placeholder="Password">
						<label><a href="">Forget Password?</a></label>
						<button type="submit" class="btn btn-primary">Login</button>
						<p>Have't Any Account <a href="">Create An Account</a></p>
					</form>
				</div>
			</div>
		</section>
		<!-- login section End -->	
		
		<!-- footer start -->
		<?php include('_footer.php')?>

		 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>