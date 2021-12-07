<?php include('config.php');?>

<!doctype html>
<html class="no-js" lang="en">
<?php include('_head.php');?>

	
    <body>
	
		<!-- Navigation Start  -->
	<?php include('_navbar.php');?>
		<!-- Navigation End  -->
		
		<!-- Main jumbotron for a primary marketing message or call to action -->
		<section class="main-banner" style="background:#242c36 url(img/slider-01.jpg) no-repeat">
			<div class="container">
				<div class="caption">
					<h2>Build Your Career</h2>
					<form>
						<fieldset>
							<div class="col-md-4 col-sm-4 no-pad">
								<input type="text" class="form-control border-right" placeholder="Job Title" />
							</div>
							<div class="col-md-3 col-sm-3 no-pad">
								<select class="selectpicker border-right">
								  <option>Job Type</option>
								  <option>0 Year</option>
								  <option>1 Year</option>
								  <option>2 Year</option>
								  <option>3 Year</option>
								  <option>4 Year</option>
								  <option>5 Year</option>
								  <option>6 Year</option>
								  <option>7 Year</option>
								  <option>8 Year</option>
								  <option>9 Year</option>
								 <option>10 Year</option>
								</select>
							</div>
							<div class="col-md-3 col-sm-3 no-pad">
								<select class="selectpicker">
								  <option>Location</option>
								  <option>Accounf & Finance</option>
								  <option>Information & Technology</option>
								  <option>Marketing</option>
								  <option>Food & Restaurent</option>
								</select>
							</div>
							<div class="col-md-2 col-sm-2 no-pad">
								<input type="submit" class="btn seub-btn" value="submit" />
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</section>
		
		
		<section class="counter">
			<div class="container">
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span aria-hidden="true" class="icon-briefcase"></span>
						<h3>1000</h3>
						<p>Jobs Posted</p>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span class="box1"><span aria-hidden="true" class="icon-expand"></span></span>
						<h3>207</h3>
						<p>All Companies</p>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
						<span class="box1"><span aria-hidden="true" class="icon-profile-male"></span></span>
						<h3>700+</h3>
						<p>Total Members</p>
					</div>
				</div>
				
				<div class="col-md-3 col-sm-3">
					<div class="counter-text">
					<span class="box1"><span aria-hidden="true" class="icon-sad"></span></span>
						<h3>802+</h3>
						<p>Happy Members</p>
					</div>
				</div>
			</div>
		</section>
		
		<section class="jobs">
			<?php
				$query = "SELECT job.job_id, job.title, job.description, job.job_type, job.salary, job.location, job.vacancy, job.category_id ,job.company_id ,job.issue_date,job.last_date ,company.name ,company.image FROM `job`,`company` WHERE job.company_id = company.company_id and salary>2000;";
				$result = mysqli_query($connection,$query);
				while($res = mysqli_fetch_array($result)) {  
				$job_id=$res['job_id'];
			
			?>
				<div class="container">
				<div class="row heading">
					<h2>Find Popular Jobs</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
				</div>
				<div class="companies">
					<div class="company-list">
						<div class="row">
							<div class="col-md-2 col-sm-2">
								<div class="company-logo">
									<img src="img/<?php echo $res['image'];?>" class="img-responsive" alt="" />
								</div>
							</div>
							<div class="col-md-10 col-sm-10">
								<div class="company-content">
									<h3><?php echo $res['title'];?><span class="full-time"><?php echo $res['job_type'];?></span></h3>
									<p>
										<span class="company-name">
											<i class="fa fa-briefcase">

											</i><?php echo $res['name'];?></span>

										<span class="company-location">
											<i class="fa fa-map-marker">

											</i><?php echo $res['location'];?></span>

										<span class="package">
											<i class="fa fa-money">

											</i><?php echo $res['salary'];?>RS</span>
									   	
									</p>
									<p style="text-align:center">
									<span class="package">
										   <i class="fa fa-date">

										   </i>ISSUE DATE: <?php echo $res['issue_date'];?></span>

										<span class="package">
										   <i class="fa fa-date">

										   </i>LAST DATE: <?php echo $res['last_date'];?></span>
									</p>
								</div>
							</div>
						</div>
					</div>
			</div>
			<?php }?>

		</section>

		
		<section class="testimonials dark">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div id="testimonial-slider" class="owl-carousel">
							<div class="testimonial">
								<div class="pic">
									<img src="img/client-1.jpg" alt="">
								</div>
								<p class="description">
									" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum? "
								</p>
								<h3 class="testimonial-title">williamson</h3>
								<span class="post">Web Developer</span>
							</div>

							<div class="testimonial">
								<div class="pic">
									<img src="img/client-2.jpg" alt="">
								</div>
								<p class="description">
									" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum? "
								</p>
								<h3 class="testimonial-title">kristiana</h3>
								<span class="post">Web Designer</span>
							</div>
							
							<div class="testimonial">
								<div class="pic">
									<img src="img/client-3.jpg" alt="">
								</div>
								<p class="description">
									" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum? "
								</p>
								<h3 class="testimonial-title">kristiana</h3>
								<span class="post">Web Designer</span>
							</div>
							
							<div class="testimonial">
								<div class="pic">
									<img src="img/client-4.jpg" alt="">
								</div>
								<p class="description">
									" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem commodi eligendi facilis itaque minus non odio, quaerat ullam unde voluptatum? "
								</p>
								<h3 class="testimonial-title">kristiana</h3>
								<span class="post">Web Designer</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		
		<section class="membercard dark">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="left-widget-sidebar">
							<div class="card-widget bg-white user-card">
								<div class="u-img img-cover" style="background-image: url(img/bg-1.jpg);background-size:cover;"></div>
								<div class="u-content">
									<div class="avatar box-80">
										<img class="img-responsive img-circle img-70 shadow-white" src="img/avatar3.jpg" alt="">
										<i class="fa fa-circle-o fa-green"></i>
									</div>
									<h5>Sazzel Shi</h5>
									<p class="text-muted">UX/ Designer</p>
								</div>
								<div class="user-social-profile">
									<ul>
										<li><a href=""><i class="fa fa-facebook"></i></a></li>
										<li><a href=""><i class="fa fa-google-plus"></i></a></li>
										<li><a href=""><i class="fa fa-twitter"></i></a></li>
										<li><a href=""><i class="fa fa-instagram"></i></a></li>
										<li><a href=""><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="left-widget-sidebar">
							<div class="card-widget bg-white user-card">
								<div class="u-img img-cover" style="background-image: url(img/bg-2.jpg);background-size:cover;"></div>
								<div class="u-content">
									<div class="avatar box-80">
										<img class="img-responsive img-circle img-70 shadow-white" src="img/avatar2.jpg" alt="">
										<i class="fa fa-circle-o fa-green"></i>
									</div>
									<h5>Daniel Dezox</h5>
									<p class="text-muted">CEO Founder</p>
								</div>
								<div class="user-social-profile">
									<ul>
										<li><a href=""><i class="fa fa-facebook"></i></a></li>
										<li><a href=""><i class="fa fa-google-plus"></i></a></li>
										<li><a href=""><i class="fa fa-twitter"></i></a></li>
										<li><a href=""><i class="fa fa-instagram"></i></a></li>
										<li><a href=""><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-4">
						<div class="left-widget-sidebar">
							<div class="card-widget bg-white user-card">
								<div class="u-img img-cover" style="background-image: url(img/bg-3.jpg);background-size:cover;"></div>
								<div class="u-content">
									<div class="avatar box-80">
										<img class="img-responsive img-circle img-70 shadow-white" src="img/avatar1.jpg" alt="">
										<i class="fa fa-circle-o fa-green"></i>
									</div>
									<h5>Silp Sizzer</h5>
									<p class="text-muted">Human Resource</p>
								</div>
								<div class="user-social-profile">
									<ul>
										<li><a href=""><i class="fa fa-facebook"></i></a></li>
										<li><a href=""><i class="fa fa-google-plus"></i></a></li>
										<li><a href=""><i class="fa fa-twitter"></i></a></li>
										<li><a href=""><i class="fa fa-instagram"></i></a></li>
										<li><a href=""><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
					<h2>Want More Job & Latest Job? </h2>
					<p>Subscribe to our mailing list to receive an update when new Job arrive!</p>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Type Your Email Address...">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default">subscribe!</button>
						</span>
					</div>
					</div>
				</div>
			</div>
		</section>
			
		<!-- footer start -->
		<?php include('_footer.php');?>

		 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>
