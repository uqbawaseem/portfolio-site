<?php 
    session_start();
   include('config.php');
   ?>
<!doctype html>
<html class="no-js" lang="en">
   <?php include('_head.php');?>
   <body>
      <!-- Navigation Start  -->
      <?php include('_navbar.php');?>
      <!-- Navigation End  -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <section class="inner-banner" style="backend:#242c36 url(https://via.placeholder.com/1920x600)no-repeat;">
         <div class="container">
            <div class="caption">
               <h3>REGISTER YOUR COMPANY</h3>
               <p>CLICK TO <font><a href="company_registration.php" style="color: red; font-weight:bold; cursor: pointer;">REGISTER NOW</a></font></p>
            </div>
         </div>
      </section>
      <section class="jobs">
         <div class="container">
            <div class="row heading">
               <h2>Find Popular Companies</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
            </div>
            <div class="companies">
               <?php
                  $query = "SELECT *
                  FROM `company` 
                  
                  ORDER BY `name`";
                  $result = mysqli_query($connection,$query);
                  while($res = mysqli_fetch_array($result)) {  
                  
                  
                     ?>
               <div class="company-list col-md-6">
                  <div class="row">
                     <div class="col-md-3 col-sm-4">
                        <div class="company-logo">
                           <img src="img/<?php echo $res['image'];?>" class="img-responsive" alt="" />
                        </div>
                     </div>
                     <div class="col-md-12 col-sm-12">
                        <div class="company-content">
                           <p><span class="company-name" style="font-size: 24px;">
                              <i class="fa fa-briefcase">
                              </i><?php echo $res['name'];?></span>
                              <span class="company-location">
                              <i class="fa fa-map-marker">
                              </i><?php echo $res['address'];?></span>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }?>
            </div>
            <div class="row">
               <input type="button" class="btn brows-btn" value="Brows All Jobs" />
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