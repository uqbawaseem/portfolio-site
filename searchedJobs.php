<!DOCTYPE html>
<html lang="en">
   <?php
      include('_head.php');
      include_once('css/ui_alerts.html'); 
      ?>
   <body>
      <?php
         include('_navbar.php'); 
         ?>
      <section class="jobs">
         <div class="container">
            <?php
               include('config.php');
               if(isset($_POST['submit'])){ 
                   $title = isset($_POST['title']) ? strip_tags($_POST['title']): ' ';
                   $type = isset($_POSt['type']) ? strip_tags($_POST['type']): ' ';
                  // $title = mysqli_real_escape_string($connection, $_POST['title']);
                   $query ="SELECT * FROM `job` WHERE `title` LIKE '%$title%' AND `job_type` LIKE '%$type%'";
                   $result = mysqli_query($connection, $query);
                   $searched = mysqli_num_rows($result);
                   if($searched>0){
                       echo "<font style= \" color: #e01c34; font-size:19px;\">There are ".$searched." results!</font>";
                       echo "<div class=\"uk-alert-primary\" uk-alert>
                       <a class=\"uk-alert-close\" uk-close></a>
                       <p>Search result is ready! </p>
                   </div>";
                       while($res= mysqli_fetch_array($result)){
               ?>
            <div class="companies">
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
                              </i><?php echo $res['title'];?></span>
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
                        <button type="submit" class="btn view-job" name="View Job">View Job</button>
                     </div>
                  </div>
               </div>
               <?php
                  }
                          }
                          else
                          {
                              echo"here is no resord found";
                          }
                  
                      }?>
            </div>
         </div>
      </section>
   </body>
   <?php
      include('_footer.php'); 
      ?>
</html>