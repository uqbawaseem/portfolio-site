<?php
session_start();
   include('config.php');
   ?>
<!doctype html>
<html class="no-js" lang="en">
   <?php
      include('_head.php');
      
      ?>	
   <style>
      fieldset {
      background-color: #eeeeee;
      }
      legend {
      background-color: #242c36;
      color: white;
      text-align: left;
      padding: 5px 10px;
      }
      input {
      margin: 5px;
      }
   </style>
   <body>
      <?php
         include('_navbar.php');
      ?>
         
      <?php
                
                include_once("config.php");
                if(isset($_POST['submit'])) {
                    $name = mysqli_real_escape_string($connection, $_POST['name']);
                    $email = mysqli_real_escape_string($connection, $_POST['email']);
                    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
                    $qualification = mysqli_real_escape_string($connection, $_POST['qualification']);
                    $experience = mysqli_real_escape_string($connection, $_POST['cv_experience']);
                    $city = mysqli_real_escape_string($connection, $_POST['city']);
                    $cv_name = mysqli_real_escape_string($connection, $_POST['cv_name']);
                    $cv_email = mysqli_real_escape_string($connection, $_POST['cv_email']);
                    $cv_address = mysqli_real_escape_string($connection, $_POST['cv_address']);
                    $cv_qualification = mysqli_real_escape_string($connection, $_POST['cv_qualification']);
                    $image = $_FILES['cv'];
                   $file_name=$_FILES['cv']['name'];
                   $file_tempName=$_FILES['cv']['tmp_name'];
                   $file_destination='../img/'.$file_name;
                   move_uploaded_file($file_tempName,$file_destination);
                    $date = mysqli_real_escape_string($connection, $_POST['date']);




                    
                    if( empty($name) || empty($email) || empty($contact) || empty($qualification) || empty($city) || empty($file) || empty($date) || empty($experience)){
                        if( empty($name) ){
                            echo "<div class=\"uk-alert-primary\" uk-alert>
                                   <a class=\"uk-alert-close\" uk-close></a>
                                   <p>Name field is Empty!</p>
                                 </div>";
                        }
                        if( empty($email) ){
                           echo "<div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>Email field is Empty!</p>
                         </div>";                        }
                        if( empty($contact) ){
                           echo "<div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>Contact field is Empty!</p>
                         </div>";                        }
                         if( empty($qualification) ){
                           echo "<div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>Qualification field is Empty!</p>
                         </div>";                        }
                         if( empty($city) ){
                           echo "<div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>City field is Empty!</p>
                         </div>";                        }
                         if( empty($file) ){
                           echo "<div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>File field is Empty!</p>
                         </div>";                        }
                         if( empty($date) ){
                           echo "<div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>Date field is Empty!</p>
                         </div>";                        }
                         if( empty($experience) ){
                           echo "<div class=\"uk-alert-primary\" uk-alert>
                           <a class=\"uk-alert-close\" uk-close></a>
                           <p>Experience field is Empty!</p>
                         </div>";                        }
                    }
                    else
                        {   mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=0");
                            $query = "INSERT INTO `apply`(`applicant_name`, `applicant_email`, `applicant_contact`, `applicant_city`, `cv_name`, `cv_email`, `cv_address`, `cv_qualification`, `cv_experience`, `file`, `apply_date`) VALUES ('$name','$email','$contact','$city','$cv_name','$cv_email','$cv_address','$cv_qualification','$experience','$file_destination','$date')";
                            mysqli_query($connection, "SET FOREIGN_KEY_CHECKS=1");
                            $result  = mysqli_query($connection, $query);

                            echo "<div class=\"uk-alert-primary\" uk-alert>
                            <a class=\"uk-alert-close\" uk-close></a>
                            <p>apply added successfully!</p>
                        </div>";
                                                   
                        }

                }
      ?>     
         <?php
             $name = $_SESSION['name'];
             
             $query = "SELECT * from `applicant` WHERE name ='$name'";
             $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

             while($a = mysqli_fetch_array($result)){
         ?> 
      <div class="container">
         <h3 style="text-align:center; margin-top:1%;">APPLICATION FORM</h3>
         <form action="apply.php" method="POST" name="form2" enctype="multipart/form-data">
            <fieldset>
               <legend>BIO:</legend>
               <div class="form-group">
                  <input type="hidden" name="contact_id" class="form-control input-lg">
                  <input type="text" class="form-control" name="name" placeholder="NAME" value="<?php echo $a['name'];?>">
               </div>
               <div class="col">
                  <div class="form-group">
                     <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $a['email'];?>">
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <input type="text" class="form-control" name="contact" placeholder="CONTACT" value="<?php echo $a['contact'];?>">
                  </div>
               </div>
               
               <div class="col">
                  <div class="form-group">
                     <input type="text" class="form-control" name="qualification" placeholder="qualification" value="<?php echo $a['qualification'];?>">
                  </div>
               </div>
               <?php }?>
               <div class="col">
                  <div class="form-group">
                     <input type="text" class="form-control" name="city" placeholder="city">
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <input type="text" class="form-control"  name="cv_experience" placeholder="experience">
                  </div>
               </div>
            </fieldset>
            <fieldset>
               <legend>CV:</legend>
               <div class="col">
                  <a style="text-align: center;" class="form-control"  name="createCv" onclick="showAndHide();"> Create New CV</a>
               </div>
               <div class="col" id="cv" style="display:none;">
                  <div class="form-group">                            
                     <input type="text" class="form-control"  name="cv_name" placeholder="Enter your name">
                     <input type="text" class="form-control"  name="cv_email" placeholder="Email">
                     <input type="text" class="form-control"  name="cv_address" placeholder="Address">
                     <input type="text" class="form-control"  name="cv_qualification" placeholder="Qualification">
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <labal>DROP YOUR CV </labal>
                     <input type="file" class="form-control"  name="cv" placeholder="cv" required>
                  </div>
               </div>
            </fieldset>
            <input type="DATE" name="date" id="datePicker"  class="form-control input-lg" placeholder="Date">
            <p style="text-align: justify color:gray">By pressing apply: 1) you agree to our Terms, Cookie & Privacy Policies; 2) 
               you consent to your application being transmitted to the Company (Jober Desk does not guarantee receipt), & processed & analyzed in accordance with its & Jober Desk's terms & privacy policies; & 3) you acknowledge that when you apply to jobs outside your country
               it may involve you sending your personal data to countries with lower levels of data protection.
            </p>
            <div class="form-group">
               <button style="text-align: center" type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
         </form>
      </div>
      <?php
         include('_footer.php');
           ?>
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script src="js/bootsnav.js"></script>
      <script src="js/main.js"></script>
      <SCRIPT>
         function showAndHide() {
         var x = document.getElementById('cv');
             
         if (x.style.display == 'none') {
             x.style.display = 'block';
         } else {
             x.style.display = 'none';
         }
        }
         function todaydate() {
             $(document).ready( function() {
         $('#datePicker').val(new Date().toDateInputValue());
         });
         }
         
      </SCRIPT>
   </body>
</html>