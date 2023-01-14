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
    <?php
      include_once("config.php");
      if(isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $designation = mysqli_real_escape_string($connection, $_POST['designation']);
        $company_name = mysqli_real_escape_string($connection, $_POST['company_name']);
        $experience_data = mysqli_real_escape_string($connection, $_POST['experience_data']);
        $education = mysqli_real_escape_string($connection, $_POST['education']);
        $certification = mysqli_real_escape_string($connection, $_POST['certification']);
        $image = $_FILES["image"]["name"];
          $path="../images/".$image;
          move_uploaded_file($_FILES["image"]["name"],$path);
        if( empty($name) || empty($designation) || empty($company_name) || empty($experience_data) || empty($education) || empty($certification)){
          if( empty($name) ){
              echo "<font color= 'red'>Name field is empty. </font>";
          }
          if( empty($designation) ){
              echo "<font color= 'red'>designation field is empty. </font>";
          }
          if( empty($company_name) ){
              echo "<font color= 'red'>company name field is empty. </font>";
          }
          if( empty($experience_data) ){
              echo "<font color= 'red'>experience field is empty. </font>";
          }
          if( empty($education) ){
              echo "<font color= 'red'>education field is empty. </font>";
          }
          if( empty($certification) ){
              echo "<font color= 'red'>certification field is empty. </font>";
          }
        }
        else{
            mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=0");
            if(isset($_SESSION['email'])){
              $r = $_SESSION['email'];
              $company_q = "SELECT * FROM `company` WHERE email='$r'";
              $company_ex  = mysqli_query($connection, $company_q);
              while($res = mysqli_fetch_array($company_ex)) {  
                  $company_id = $res['id'];
              
              $query = "INSERT INTO `portfolio`(`name`, `image`, `designation`, `company_name`, `experience_data`, `education`, `certification`, `company_id`) VALUES ('$name', '$image', '$designation', '$company_name', '$experience_data', '$education', '$certification', '$company_id')";
              $result  = mysqli_query($connection, $query) or die ("ERROR");
              
              }
            }
            else if(isset($_SESSION['name'])){
              $r = $_SESSION['name'];
              $company_q = "SELECT id FROM `employee` WHERE name='$r' LIMIT 1";
              $company_ex  = mysqli_query($connection, $company_q);
              while($res = mysqli_fetch_array($company_ex)) {  
                  $employee_id = $res['id'];
              
              $query = "INSERT INTO `portfolio`(`name`, `image`, `designation`, `company_name`, `experience_data`, `education`, `certification`, `employee_id`) VALUES ('$name', '$image', '$designation', '$company_name', '$experience_data', '$education', '$certification', '$employee_id')";
              $result  = mysqli_query($connection, $query) or die ("ERROR");
            }
            } 
            mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=1");
            mysqli_close($connection);

            echo "<div class=\"uk-alert-primary\" uk-alert>
              <a class=\"uk-alert-close\" uk-close></a>
              <p>Portfolio post successfully!</p>
              </div>";
          }
      }
    ?>
    <div class="container">
      <h3 style="text-align: center;">Create your Portfolio</h3>
      <form action="createPortfolio.php" method="POST" name="form2" enctype="multipart/form-data">
        <div class="form-group">
          <input type="hidden" name="contact_id" class="form-control input-lg">
          <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="col">
          <div class="form-group">
            <input type="text" class="form-control" name="designation" placeholder="Designation">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <input type="text" class="form-control" name="company_name" placeholder="Company Name">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <textarea class="form-control" name="experience_data" placeholder="Experience. Please enter in list items if multiple"></textarea>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <textarea class="form-control" name="education" placeholder="Education. Please enter in list items if multiple"></textarea>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <textarea class="form-control" name="certification" placeholder="Certification. Please enter in list items if multiple"></textarea>
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <input class="form-control" name="image" type="file">
          </div>
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