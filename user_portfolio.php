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
      <a class="navbar-brand"><h3>Portfolio Site</h3></a>
      <a href="#" class=" text-uppercase mr-4" data-toggle="dropdown\" style="color: #5293fa;"><?php echo $_SESSION['name']?></a>     
    </nav>

    <div class="container-fluid ml-2 mr-2">
      <div class="row">
        <div class="col-sm-4" style="background-color:lavender;border-right-color: #92a8d1;">
          <div class="container mt-1 mb-1">
            <h4>Edit Portfolio</h3>
            <?php 
            include_once("config.php");        
            if(isset($_POST['update'])) {
                $portfolio_id = $_POST['portfolio_id'];
                $name = $_POST['name'];
                $designation = $_POST['designation'];
                $company_name = $_POST['company_name'];
                $experience_data = $_POST['experience_data'];
                $education = $_POST['education'];
                $certification = $_POST['certification'];
                
                $sql = " UPDATE portfolio SET name='$name',designation='$designation',company_name='$company_name',experience_data='$experience_data',education='$education',certification='$certification' WHERE id = $portfolio_id";
                $result=mysqli_query($connection, $sql) or die ("error");
                header('location:user_portfolio.php');
                echo "<div class=\"uk-alert-primary\" uk-alert>
                  <a class=\"uk-alert-close\" uk-close></a>
                  <p>Portfolio Update successfully!</p>
                    </div>";
              }
              ?>
            <?php
            include_once("config.php");
            $r = $_SESSION['name'];
            $u_q = "SELECT * FROM `user` WHERE name='$r' LIMIT 1";
            $u_ex  = mysqli_query($connection, $u_q);
            while($res = mysqli_fetch_array($u_ex)) {  
              $employee_id = $res['user_id'];  
        
            $sql="SELECT * FROM portfolio WHERE employee_id=$employee_id LIMIT 1";
            $result1  = mysqli_query($connection, $sql);
            }
            while($p=mysqli_fetch_array($result1)){

            ?>
            <form action="user_portfolio.php" method="POST"  class="mt-4" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $p['name']; ?>" name="name">
                <input type="hidden" name="portfolio_id" value="<?php echo $p['id']; ?>" class="form-control input-lg">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Designation</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value=" <?php echo $p['designation']; ?>" name="designation">
              </div>  
              <div class="form-group">
                <label for="exampleInputPassword1">Company Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $p['company_name']; ?>" name="company_name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Experience Section</label>
                <textarea class="form-control" name="experience_data"><?php echo $p['experience_data']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Certification Section</label>
                <textarea class="form-control" name="certification"><?php echo $p['certification']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Education Section</label>
                <textarea class="form-control" name="education"><?php echo $p['education']; ?></textarea>
              </div>
              <input type="hidden" name = "user_id" value="<?php echo $p['user_id']; ?>">
              <button type="submit" class="btn btn-primary" name="update">Update</button>
            <?php }?>
            </form>
          </div>
        </div>
        <div class="col-sm-8" style="background-color:lavenderblush;">
          <div class="container">
            <?php
            include_once("config.php");
            $r = $_SESSION['name'];
            $u_q = "SELECT * FROM `user` WHERE name='$r' LIMIT 1";
            $u_ex  = mysqli_query($connection, $u_q);
            while($res = mysqli_fetch_array($u_ex)) {  
              $employee_id = $res['user_id'];  

            $sql="SELECT * FROM portfolio WHERE employee_id=$employee_id LIMIT 1";
            $result1  = mysqli_query($connection, $sql);
            }
            while($p=mysqli_fetch_array($result1)){

            ?>
              portfolio image <?php echo $p['name']; ?>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>