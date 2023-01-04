<?php
session_start();
include('config.php');
if (isset($_POST['submit'])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $message = $_POST['message'];
 



    $sql="INSERT INTO `contact`(name, email, message) VALUES ('$name','$email','$message')";
    $result=mysqli_query($connection, $sql) or die ("ERROR");
	header("Location: http://localhost/jobportal/contact.php");
	mysqli_close($connection);
	}
?>


<!doctype html>
<html class="no-js" lang="en">
<?php
    include('_head.php');
    ?>	
	
    <body>
	
	<?php
		include('_navbar.php');

	?>


    
		<!-- login section start -->
		<section class="login-wrapper">
			<div class="container">
            <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
					<form action="contact.php" method="post" enctype= "multipart/form-data">
						<img class="img-responsive" alt="logo" src="img/logo.png">
                        <input type="hidden" name="contact_id" class="form-control input-lg">
						<input type="text" name="name" class="form-control input-lg" placeholder="Your Name">
						<input type="email" name="email" class="form-control input-lg" placeholder="email">
                        <textarea class="form-control" name="message" placeholder="Message"></textarea>
						<button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
						
					</form>
				</div>
				 
					

                    
              
                </div>
				</div>
			</div>
		</section>
		<!-- login section End -->	
		
		<?php
	        include('_footer.php');
           ?>
		 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>