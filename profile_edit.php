<?php 
include('config.php');
if (!isset($_SESSION)) { session_start(); }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> Admin Panel </title>
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
<?php         
    if(isset($_POST['update'])) {
        $applicant_id = $_POST['applicant_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        
            $image=$_FILES['image']['name'];
            $file_tempName=$_FILES['image']['tmp_name'];
            $file_destination='../img/'.$image;
            move_uploaded_file($file_tempName,$file_destination);
        $qualification = $_POST['qualification'];
        
            $sql = " UPDATE applicant SET name='$name',email='$email',password='$password', gender='$gender',contact='$contact',image='$image',qualification='$qualification'  WHERE applicant_id = $applicant_id";
            header('location:profile.php'); 
            $result=mysqli_query($connection, $sql) or die ("error");
            
        
    }
?>
<?php     
 $name = $_SESSION['name'];
?>

 <nav class="navbar navbar-light bg-light justify-content-between">
   <a class="navbar-brand"><img src="img/logo.png" alt="" width= "170px"/></a>
    <a href="#" class=" text-uppercase mr-4" data-toggle="dropdown\" style="color: #5293fa;"><?php echo $_SESSION['name']?></a>     
 </nav>
 <?php
            //getting id from url
         $id=isset($_GET['id']) ? $_GET['id'] : die("");
           
    
         $sql="SELECT * FROM applicant WHERE applicant_id = $id";
         $result1=mysqli_query($connection, $sql) or die ("errrrrrrr"); 
        while($p=mysqli_fetch_array($result1)){
  
?> 
<div class="container">
<h3>EDIT Profile</h3>
        <form action="profile_edit.php" method="POST"  class="mt-4" enctype="multipart/form-data">
            <div class="form-group">
            
                <label for="name">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $p['name']; ?>" name="name">
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value=" <?php echo $p['email']; ?>" name="email">
            </div>  
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $p['password']; ?>" name="password">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $p['gender']; ?>" name="gender">
                
            </div>

            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $p['contact']; ?>" name="contact">
            </div>
            <div class="form-group">
                  <label for="contact">Image</label>
                  <input type="file" class="form-control" id="image" value="<?php echo $image?>" name="image">
                  <img class="form-control" id="image" style="height:200px; width:200px;" src="../img/<?php echo $p['image']?>" name="image">
               </div>

            <div class="form-group">
                <label for="qualification">Qualification</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $p['qualification']; ?>" name="qualification">
                
            </div>

            <input type="hidden" name = "applicant_id" value="<?php echo $p['applicant_id']; ?>">
            <button type="submit" class="btn btn-primary" name="update" onclick="history.back();">Update</button>
        </form>
</div>
<?php }?>
    
    

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>