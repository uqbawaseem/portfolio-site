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
    <!-- side bar end -->

    <!--== BOTTOM FLOAT ICON ==-->
    <div class="sb2-2">
    <table  id="dtDynamicVerticalScrollExample"
     class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th scope="col">ID</th>
                           <th scope="col">NAME</th>
                           <th scope="col">EMAIL</th>
                           <th scope="col">MESSAGE</th>
                           <th scope="col">ACTION</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php 
                     $query="SELECT * FROM contact";
                     $result=mysqli_query($connection,$query) or die(mysqli_error($connection));
                           while($contact = mysqli_fetch_array($result)){
                              echo "<tr><td>".$contact['contact_id']."</td>";
                              echo "<td>".$contact['name']."</td>";
                              echo "<td>".$contact['email']."</td>";
                              echo "<td>".$contact['message']."</td>";
                             
                              echo "<td><a href=\"edit-message.php?id=$contact[contact_id]\" class= \"btn btn-secondary\"><i class=\"fa fa-edit\"></i></a><br><br>
                               <a href=\"delete-contact.php?id=$contact[contact_id]\"  class= \"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fa fa-trash\" style=\"color:red;\"></i></a></td>";		         
                                 }
                           ?>




                     </tbody>
                  </table>
                                </div>

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>