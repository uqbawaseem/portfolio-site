<?php
   include('config.php');
   ?>
<?php
   if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $image = $_FILES["image"]["name"];
           $path="../images/".$image;
            move_uploaded_file($_FILES["image"]["name"],$path);
   
    if( empty($name) || empty($email) || empty($password) || empty($contact) || empty($address)){
       if( empty($name) ){
           echo "<font color= 'red'>Name field is empty. </font>";
       }
       if( empty($email) ){
           echo "<font color= 'red'>Email field is empty. </font>";
       }
       if( empty($password) ){
           echo "<font color= 'red'>Password field is empty. </font>";
       }
       if( empty($address) ){
           echo "<font color= 'red'>Address field is empty. </font>";
       }
       if( empty($contact) ){
           echo "<font color= 'red'>Contact field is empty. </font>";
       }
       
      
       
   }
   else
       {
           $query = "INSERT INTO `company`(`name`, `email`, `password`, `address`, `contact`, `image`) VALUES ('$name','$email','$password','$address','$contact','$image')";
           $result  = mysqli_query($connection, $query);
           echo "<font color='red'>company added seccessfully.</font>";
           header("refresh:2;url=companyLogin.php");
           
   
                                  
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
               <form action="company_registration.php" method="post" enctype= "multipart/form-data">
                  <h3 class="img-responsive">Portfolio Site</h3>
                  <input type="hidden" name="company_id" class="form-control input-lg" placeholder="">
                  <input type="text" name="name" class="form-control input-lg" placeholder=" name">
                  <input type="email"name="email" class="form-control input-lg" placeholder="email">
                  <input type="password"name="password" class="form-control input-lg" placeholder="Password">
                  <input type="address"name="address" class="form-control input-lg" placeholder="address">
                  <input type="text"name="contact" class="form-control input-lg" placeholder="contact">
                  <input type="file" name="image">
                  <button type="submit" name="submit" class="btn btn-primary">Register Now</button>
                  <p>Already have an account? <a href="companyLogin.php">Login</a></p>
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