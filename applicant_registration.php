<?php
   include('config.php');
   ?>
<?php
   if (isset($_POST['submit'])){
   $company = $_POST['applicant_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $qualification = $_POST['qualification'];
    $image = $_FILES['image'];
   $file_name=$_FILES['image']['name'];
   $file_tempName=$_FILES['image']['tmp_name'];
   $file_destination='../img/'.$file_name;
   move_uploaded_file($file_tempName,$file_destination);
   
    if( empty($name) || empty($email) || empty($password) || empty($contact) || empty($qualification)){
       if( empty($name) ){
         echo "<div class=\"uk-alert-primary\" uk-alert>
         <a class=\"uk-alert-close\" uk-close></a>
         <p>Name field in Empty!</p>
     </div>";       }
       if( empty($email) ){
         echo "<div class=\"uk-alert-primary\" uk-alert>
         <a class=\"uk-alert-close\" uk-close></a>
         <p>Email feild is Empty!</p>
     </div>";       }
       if( empty($password) ){
         echo "<div class=\"uk-alert-primary\" uk-alert>
         <a class=\"uk-alert-close\" uk-close></a>
         <p>Password feild is Empty!</p>
     </div>";       }
       if( empty($gender) ){
         echo "<div class=\"uk-alert-primary\" uk-alert>
         <a class=\"uk-alert-close\" uk-close></a>
         <p>Gender feild is Empty!</p>
     </div>";       }
       if( empty($contact) ){
         echo "<div class=\"uk-alert-primary\" uk-alert>
         <a class=\"uk-alert-close\" uk-close></a>
         <p>Contact feild is Empty!</p>
     </div>";       }
       if( empty($qualification) ){
         echo "<div class=\"uk-alert-primary\" uk-alert>
         <a class=\"uk-alert-close\" uk-close></a>
         <p>Qualification feild is Empty!</p>
     </div>";       }
      
       
   }
   else
       {
           $query = "INSERT INTO `applicant`(`name`, `email`, `password`, `gender`, `contact`, `qualification`, `image`) VALUES ('$name','$email','$password','$gender','$contact','$qualification','$image')";
           $result  = mysqli_query($connection, $query);
           echo "<div class=\"uk-alert-primary\" uk-alert>
         <a class=\"uk-alert-close\" uk-close></a>
         <p>Applicant Register successfully!</p>
          </div>";
            header("Location:applicantLogin.php");
   
                                  
       }
   
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
               <form action="applicant_registration.php" method="post" enctype= "multipart/form-data">
                  <img class="img-responsive" alt="logo" src="img/logo.png">
                  <input type="hidden" name="applicant_id" class="form-control input-lg" placeholder="">
                  <input type="text" name="name" class="form-control input-lg" placeholder=" name">
                  <input type="email"name="email" class="form-control input-lg" placeholder="email">
                  <input type="password"name="password" class="form-control input-lg" placeholder="Password">
                  <span>Gender:&nbsp;  </span>
                  <input type="radio" name="gender" value="Male" > Male 

                  <input type="radio" name="gender" value="Female"> Female                  
                  <input type="text"name="contact" class="form-control input-lg" placeholder="contact">
                  <input type="file" name="image">
                  <input type="text"name="qualification" class="form-control input-lg" placeholder="qualification">
                  <button type="submit" name="submit" class="btn btn-primary">Register Now</button>
                  <p>Already have an account? <a href="applicantLogin.php">Login</a></p>
               </form>
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