<?php
   session_start();
   include('config.php');
   if (!isset($_SESSION['name'])){
      echo "<script>window.alert(\"Please Login First\");</script>";
      header("location:applicantLogin.php");

     }
   ?>
<!doctype html>
<html class="no-js" lang="en">
   <?php include('_head.php');?>
   <body>
      <!-- Navigation Start  -->
      <?php include('_navbar.php');?>
      <!-- Navigation End  -->
      <!-- Inner Banner -->
      <section class="inner-banner" style="backend:#242c36 url(https://via.placeholder.com/1920x600)no-repeat;">
         <div class="container">
            <div class="caption">
               <h2>Get your jobs</h2>
               <p>Get your Popular jobs <span>202 New job</span></p>
            </div>
         </div>
      </section>
      <section class="jobs">
         <div class="container">
            <div class="row heading">
               <h2>Search Your Job</h2>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
            </div>
            <div class="row top-pad">
               <div class="filter">
                  <div class="col-md-2 col-sm-3">
                     <p>Search By:</p>
                  </div>
                  <div class="col-md-10 col-sm-9 pull-right">
                     <ul class="filter-list">
                        <li>
                           <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox" checked="">
                           <label for="checkbox-1" class="part-time checkbox-custom-label">Part Time</label>
                        </li>
                        <li>
                           <input id="checkbox-2" class="checkbox-custom" name="checkbox-2" type="checkbox">
                           <label for="checkbox-2" class="full-time checkbox-custom-label">Full Time</label>
                        </li>
                        <li>
                           <input id="checkbox-3" class="checkbox-custom" name="checkbox-3" type="checkbox">
                           <label for="checkbox-3" class="freelancing checkbox-custom-label">Freelancing</label>
                        </li>
                        <li>
                           <input id="checkbox-4" class="checkbox-custom" name="checkbox-4" type="checkbox">
                           <label for="checkbox-4" class="internship checkbox-custom-label">Internship</label>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="companies">
               <?php
                  $query = "SELECT job.job_id, job.title, job.job_type, job.description, job.salary, job.location,
                   job.vacancy, job.category_id ,job.company_id ,job.issue_date,job.last_date ,company.name ,company.image 
                  FROM `job`,`company` 
                  WHERE job.company_id = company.company_id 
                  ORDER BY `title`";
                  $result = mysqli_query($connection,$query);
                  while($res = mysqli_fetch_array($result)) {  
                  $job_id=$res['job_id'];
                  
                    ?>
               <div class="company-list">
                  <div class="row">
                     <div class="col-md-2 col-sm-2">
                        <div class="company-logo">
                           <img src="img/<?php echo $res['image'];?>" class="img-responsive" alt="" />
                        </div>
                     </div>
                     <div class="col-md-8 col-sm-8">
                        <div class="company-content">
                           <h3> <?php echo $res['title'];?>
                              <span class="full-time"><?php echo $res['job_type'];?></span>	
                           </h3>
                           <p>
                              <span class="company-name" style="font-size: 24px;">
                              <i class="fa fa-briefcase">
                              </i><?php echo $res['name'];?></span>
                              <span class="company-location">
                              <i class="fa fa-map-marker">
                              </i><?php echo $res['location'];?></span>
                              <span class="package">
                              <i class="fa fa-money">
                              </i><?php echo $res['salary'];?></span>
                           </p>
                           <p style="text-align:center">
                              <span class="package">
                              <i class="fa fa-date">
                              </i><b>ISSUE DATE:</b> <?php echo $res['issue_date'];?></span>
                              <span class="package">
                              <i class="fa fa-date">
                              </i><b>LAST DATE:</b> <?php echo $res['last_date'];?></span>
                           </p>
                        </div>
                     </div>
                     <div class="col-md-2 col-sm-2">
                        <a href="apply.php"><button type="submit2" class="btn view-job" name="applyJob">Apply now</button></a>
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