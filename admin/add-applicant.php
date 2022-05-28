<!DOCTYPE html>
<html lang="en">
   <?php 
      session_start();
      include('_head.php');
      ?>
   <body>
      <?php 
         include('_navbar.php');
         ?>
      <?php 
         include('_sidebar.php');
         
         
         
         
         ?>
      <div  class="sb2-2">
         <!-- side bar end -->
         <?php
            include('../config.php');
            if (isset($_POST['submit'])){
            $applicant = $_POST['applicant_id'];
             $name = $_POST['name'];
             $email = $_POST['email'];
             $password = $_POST['password'];
             $gender = $_POST['gender'];
             $contact = $_POST['contact'];
             $image = $_FILES['image']['name'];
             $path="../images/".$image;
             move_uploaded_file($_FILES["image"]["name"],$path);
             $qualification = $_POST['qualification']; 
            
                $sql="INSERT INTO `applicant`( name, email, password,gender,contact,image,qualification) VALUES ('$name','$email','$password','$gender','$contact','$image','$qualification')";
                $result=mysqli_query($connection, $sql) or die ("ERROR");
            mysqli_close($connection);
            }
            ?>
         <!--== BOTTOM FLOAT ICON ==-->
         <section class="login-wrapper">
            <div class="container">
               <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
                  <form action="add-applicant.php" method="post" enctype= "multipart/form-data">
                     <img class="img-responsive" alt="logo" src="../img/logo.png">
                     <input type="hidden" name="applicant_id">
                     <input type="text" name="name"class="form-control input-lg" placeholder="User Name">
                     <input type="email" name="email" class="form-control input-lg" placeholder="email">
                     <input type="password" name="password"class="form-control input-lg" placeholder="Password">
                     <input type="number"name="contact" class="form-control input-lg" placeholder="contact">
                     <input type="text" name="qualification" class="form-control input-lg" placeholder="qualification">
                     <input type="file" name="image"><br>
                     <input type="radio" id="male" name="gender" value="Male">
                     <label for="male">Male</label><br>
                     <input type="radio" id="female" name="gender" value="Female">
                     <label for="female">female</label><br>
                     <button type="submit" name="submit" class="btn btn-primary">Register Now</button>
                     <p>Already have an account? <a href="login.php">Login</a></p>
                  </form>
               </div>
            </div>
         </section>
      </div>
      <!--======== SCRIPT FILES =========-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/materialize.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>