<?php 
if (!isset($_SESSION['name'])) { session_start(); }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Profile </title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Quicksand:300,400,500" rel="stylesheet">
    <!-- FONT-AWESOME ICON CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <!-- Bootraps Css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/admin/css/all.min.css">
    <link rel="stylesheet" href="/admin/css/all.css">
    <link rel="stylesheet" href="css/mob.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/materialize.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    
    <!-- UIkit CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/css/uikit.min.css" />

   <!-- UIkit JS -->
   <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

 <nav class="navbar navbar-light bg-light justify-content-between">
   <a class="navbar-brand"><img src="img/logo.png" alt="" width= "170px"/></a>
    <a href="#" class=" text-uppercase mr-4" data-toggle="dropdown\" style="color: #5293fa;"><?php echo $_SESSION['name']?></a>     
 </nav>

<div class="container">
   <h3 style="text-align:center;">User profile</h3>
   <?php
include('config.php');
$query="SELECT * FROM user";
$result=mysqli_query($connection,$query) or die(mysqli_error($connection));
while($j=mysqli_fetch_array($result)){
?>    
<table  id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%" >
            <thead class="bg-dark text-light">
               <tr >
                  <td>ID</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Action</td>
               </tr>
            </thead>
            <?php
            $name = $_SESSION['name'];

               $result = mysqli_query($connection, "SELECT * FROM user WHERE `name`='$name' LIMIT 1");
                  while($p = mysqli_fetch_array($result)){
                     echo "<tr><td>".$p['user_id']."</td>";
                     echo "<td>".$p['name']."</td>";
                     echo "<td>".$p['email']."</td>";
                     echo "<td><a href=\"profile_edit.php?id=$p[user_id]\" class= \"btn btn-secondary\"><i class=\"fa fa-edit\"></i></a> <br><br> <a href=\"profile_delete.php?id=$p[user_id]\"  class= \"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fa fa-trash\" style=\"color:red;\"></i></a></td>";		         
                  }
                  ?>
            </td>
            </tr>
</table>
<?php }?>
<a href="index.php">
            <button type="button" class="btn btn-dark float-right mr-5 mb-4">
            BACK
            </button> 
            </a>
</div>
    
    

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>