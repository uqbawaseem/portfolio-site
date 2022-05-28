<!DOCTYPE html>
<html lang="en">
   <?php 
   session_start();

      include('_head.php');
      ?>
   <?php
      //including the database connectionection file
      include_once("../config.php");
      
      
      $query="SELECT * FROM applicant";
      $result = mysqli_query($connection,$query); // using mysqli_query instead
      ?>
   <body>
      <?php 
         include('_navbar.php');
         ?>
      <?php 
         include('_sidebar.php');
         ?>
      <!-- side bar end -->
      <!--== BOTTOM FLOAT ICON ==-->
      <div class="sb2-2">
         <table  id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" >
            <thead class="bg-dark text-light">
               <tr >
                  <td>ID</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Password</td>
                  <td>Gender</td>
                  <td>Contact</td>
                  <td>Image</td>
                  <td>Qualification</td>
                  <td>Action</td>
               </tr>
            </thead>
            <?php 
               $result = mysqli_query($connection, "SELECT * FROM applicant ORDER BY `applicant_id` DESC");
                  while($p = mysqli_fetch_array($result)){
                      echo "<tr><td>".$p['applicant_id']."</td>";
                      echo "<td>".$p['name']."</td>";
                      echo "<td>".$p['email']."</td>";
                      echo "<td>".$p['password']."</td>";
                      echo "<td>".$p['gender']."</td>";
                      echo "<td>".$p['contact']."</td>";
                     
                      // echo "<td>".$p['image']."</td>";
                      echo "<td><img style=\" width:100px; height:80px;\" src=../img/".$p['image']."></td>";
                      echo "<td>".$p['qualification']."</td>";
                      echo "<td><a href=\"edit-company.php?id=$p[applicant_id]\" class= \"btn btn-secondary\"><i class=\"fa fa-edit\"></i></a> <br><br> <a href=\"applicant_delete.php?id=$p[applicant_id]\"  class= \"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fa fa-trash\" style=\"color:red;\"></i></a></td>";		         
                   }
                  ?>
            </td>
            </tr>
         </table>
      </div>
      <!--======== SCRIPT FILES =========-->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/materialize.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>