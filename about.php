

<?php
session_start();
include('config.php');
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
        <div class="container" style="margin-top:5em">
            <div class="row p-4">
				<div class="col-md-4 col-sm-6 ">
					<h4>Featured Job</h4>
					<ul>
                    <img src="img/client-1.jpg" alt="Avatar" style="width:200px;   border-radius: 50%; ">
						<li><a href="#">Browse Jobs</a></li>
						<li><a href="#">Microsoft</a></li>
						<li><a href="#">Aglie soft</a></li>
						<li><a href="#">UET</a></li>
						<li><a href="adminLogin.php">ADMIN</a></li>
						
					</ul>
				</div>
				
				<div class="col-md-4 col-sm-6">
					<h4>Latest Job</h4>
					<ul>
                    <img src="img/client-2.jpg" alt="Avatar" style="width:200px;   border-radius: 50%; ">
						<li><a href="#">Browse Jobs</a></li>
						<li><a href="#">Access Database</a></li>
						<li><a href="#">Report a Problem</a></li>
						<li><a href="#">Mobile Site</a></li>
						<li><a href="#">Web Site</a></li>
                        <li><a href="#">Jobs by Skill</a></li>
					</ul>
				</div>
				
				<div class="col-md-4 col-sm-6">
					<h4>Reach Us</h4>
					<address>
					<ul>
                    <img src="img/client-3.jpg" alt="Avatar" style="width:200px;   border-radius: 50%; ">
					<li>Al-Khuwarizmi Institute of Computer Science(KICS)<br>
					Lahore Pakistan</li>
					<li>Email: ranateams@gmail.com</li>
					<li>Call: 0300 00 00 001</li>
					<li>Skype: ranateams@skype</li>
					
					</ul>
					</address>
				</div>
               </div>
             </div>
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