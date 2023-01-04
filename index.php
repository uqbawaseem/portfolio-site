<?php 
   // session_start();
   include('config.php');?> 
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
            </div>
         </div>
      </section>
      <section class="counter">
         <div class="container">
            <div class="col-md-4 col-sm-3">
               <div class="counter-text">
                  <span aria-hidden="true" class="icon-briefcase"></span>
                  <h3>
                     <?php							   
                        $query = "SELECT * FROM job";
                        if ($result=mysqli_query($connection, $query)) {
                        	$rowcount=mysqli_num_rows($result);
                        	echo "$rowcount"; 
                        }
                        ?>
                  </h3>
                  <p>Portfolio Posted</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-3">
               <div class="counter-text">
                  <span class="box1"><span aria-hidden="true" class="icon-expand"></span></span>
                  <h3>
                     <?php							   
                        $query = "SELECT * FROM company";
                        if ($result=mysqli_query($connection, $query)) {
                        $rowcount=mysqli_num_rows($result);
                        echo "$rowcount+"; 
                        }
                        ?>
                  </h3>
                  <p>All Companies</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-3">
               <div class="counter-text">
                  <span class="box1"><span aria-hidden="true" class="icon-profile-male"></span></span>
                  <h3>
                     <?php							   
                        $query = "SELECT * FROM applicant";
                        if ($result=mysqli_query($connection, $query)) {
                        $rowcount=mysqli_num_rows($result);
                        echo "$rowcount+"; 
                        }
                        ?>
                  </h3>
                  <p>Total Members</p>
               </div>
            </div>
         </div>
      </section>
      <section class="jobs">
         <div class="container">
         <div class="row heading">
            <h2>Find Popular Portfolio</h2>
            <p>Your introduction should be a brief summary of your work, not a detailed explanation of everything you've accomplish</p>
         </div>
         <?php
            $query = "SELECT job.job_id, job.title, job.description, job.job_type, job.salary, job.location, job.vacancy, job.category_id ,job.company_id ,job.issue_date,job.last_date ,company.name ,company.image FROM `job`,`company` WHERE job.company_id = company.id and salary>=150000;";
            $result = mysqli_query($connection,$query);
            while($res = mysqli_fetch_array($result)) {  
            $job_id=$res['job_id'];
            
            ?>
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
            <?php }?>	
         </div>
      </section>
      <section class="membercard dark">
         <div class="container">
            <div class="row">
               <?php
                  $query = "SELECT * FROM `applicant` ORDER BY applicant_id DESC LIMIT 3";
                  $result = mysqli_query($connection,$query);
                  while($res = mysqli_fetch_array($result)) {  
                  $applicant_id=$res['applicant_id'];
                  
                  ?>
               <div class="col-md-4 col-sm-4">
                  <div class="left-widget-sidebar">
                     <div class="card-widget bg-white user-card">
                        <div class="u-img img-cover" style="background-image: url(img/bg-1.jpg);background-size:cover;"></div>
                        <div class="u-content">
                           <div class="avatar box-80">
                              <img class="img-responsive img-circle img-70 shadow-white" src="img/<?php echo $res['image'];?>" alt="">
                              <i class="fa fa-circle-o fa-green"></i>
                           </div>
                           <h5 style="margin-top: 70px;"><?php echo $res['name'];?></h5>
                           <!-- <p class="text-muted">UX/ Designer</p> -->
                        </div>
                        <div class="user-social-profile">
                           <ul>
                              <li><a href="www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="<?php echo $res['email'];?>"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end php -->
               <?php }?>
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