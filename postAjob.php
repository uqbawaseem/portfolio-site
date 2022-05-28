<?php
   session_start();
   include('config.php');
   if (!isset($_SESSION['email'])){
      echo "<script>window.alert(\"Please Login First\");</script>";
      header("location:companyLogin.php");
   
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
    <?php
                
                include_once("config.php");
                if(isset($_POST['submit'])) {
                    $title = mysqli_real_escape_string($connection, $_POST['title']);
                    $job_type = mysqli_real_escape_string($connection, $_POST['job_type']);
                    $description = mysqli_real_escape_string($connection, $_POST['description']);
                    $salary = mysqli_real_escape_string($connection, $_POST['salary']);
                    $location = mysqli_real_escape_string($connection, $_POST['location']);
                    $vacancy = mysqli_real_escape_string($connection, $_POST['vacancy']);
                    $category_name = mysqli_real_escape_string($connection, $_POST['category_name']);
                    $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
                 $issue_date = mysqli_real_escape_string($connection, $_POST['issue_date']);
                    $last_date = mysqli_real_escape_string($connection, $_POST['last_date']);
                    if( empty($title) || empty($job_type) || empty($description) || empty($salary) || empty($location) || empty($vacancy)|| empty($category_name)||
                     empty($company_name) || empty($issue_date)|| empty($last_date)){
                        if( empty($title) ){
                            echo "<font color= 'red'>Name field is empty. </font>";
                        }
                        if( empty($job_type) ){
                            echo "<font color= 'red'>TYPE field is empty. </font>";
                        }
                        if( empty($description) ){
                            echo "<font color= 'red'>description field is empty. </font>";
                        }
                        if( empty($salary) ){
                            echo "<font color= 'red'>salary field is empty. </font>";
                        }
                        if( empty($location) ){
                            echo "<font color= 'red'>location field is empty. </font>";
                        }
                        if( empty($vacancy) ){
                            echo "<font color= 'red'>vacancy field is empty. </font>";
                        }
                        if( empty($category_name) ){
                            echo "<font color= 'red'>category name field is empty. </font>";
                        }
                        if( empty($company_name) ){
                            echo "<font color= 'red'>company name field is empty. </font>";
                        }
                        if( empty($issue_date) ){
                            echo "<font color= 'red'>issue  date field is empty. </font>";
                        }
                        if( empty($last_date) ){
                            echo "<font color= 'red'>last date field is empty. </font>";
                        }
                       
                        
                    }
                    else
                        {
                            mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=0");
                            $query = "INSERT INTO `job`(`title`, `job_type`, `description`, `salary`, `location`, `vacancy`, `category_name`, `company_name`, `issue_date`, `last_date`)
                             VALUES ('$title','$job_type','$description','$salary','$location','$vacancy','$category_name','$company_name','$issue_date','$last_date')";
                            $result  = mysqli_query($connection, $query) or die ("ERROR");
                           
                            mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=1");
                            mysqli_close($connection);

                            echo "<div class=\"uk-alert-primary\" uk-alert>
                     <a class=\"uk-alert-close\" uk-close></a>
                     <p>Job post successfully!</p>
                      </div>";
                                                   
                        }

                }
?>
      <div class="container">
         <h3 style="text-align: center;"> Book A  Trip Now</h3>
         <form action="bookAtrip.php" method="POST" name="form2" enctype="multipart/form-data">
            <div class="form-group">
               <input type="hidden" name="contact_id" class="form-control input-lg">
               <input type="text" class="form-control" name="city" placeholder="City">
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="text" class="form-control" name="job_type" placeholder="JOB Type">
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="text" class="form-control" name="description" placeholder="DESCRIPITION">
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="number" class="form-control" name="salary" placeholder="SALARY">
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="text" class="form-control" name="location" placeholder="LOCATION">
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <input type="text" class="form-control"  name="vacancy" placeholder="vacancy">
               </div>
            </div>
            <div class="col">
               <select  id="company_name" name="company_name" required>
                  <option value="">select you company</option>
                  <?php
                     include("../config.php");
                     $query=mysqli_query($connection,"SELECT name FROM company ORDER BY name ASC") or die(mysqli_error());
                     while($c=mysqli_fetch_array($query)){
                     ?>
                  <option value="<?php echo $c['name'];?>"><?php echo $c['name'];?></option>
                  <?php }?>
               </select>
            </div>
            <div class="col">
               <select  id="catogery_name" name="category_name" required>
                  <option value="">select job category</option>
                  <?php
                     include("../config.php");
                     $query=mysqli_query($connection,"SELECT name FROM category ORDER BY name ASC") or die(mysqli_error());
                     while($c=mysqli_fetch_array($query)){
                     ?>
                  <option value="<?php echo $c['name'];?>"><?php echo $c['name'];?></option>
                  <?php }?>
               </select>
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
         </form>
      </div>
    <!-- footer -->
    <?php include('_footer.php');?>
   </body>
</html>