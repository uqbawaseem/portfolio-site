<?php
session_start();
include('config.php');

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
     if(empty($_POST['name']) || empty($_POST['password']))
      {
        echo "
        <script>alert('Please fill all fields')</script>
              ";
      }
      else
      {
        $search = "SELECT * FROM `user` WHERE `name`= '$name' and `password`= '$password' ";
        $result = mysqli_query($connection, $search);
        if (mysqli_fetch_assoc($result))
        {
          $_SESSION['name'] = $_POST['name'];
          header('location:index.php');
        }
        else{
          echo "
          <div class=\"uk-alert-danger\" uk-alert>
          <a class=\"uk-alert-close\" uk-close></a>
          <p>Please enter correct email and password. </p>
      </div>";
        }
      }

  }
  if(isset($_POST['c_submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
     if(empty($_POST['email']) || empty($_POST['password']))
      {
        echo "
        <script>alert('Please fill all fields')</script>
              ";
      }
      else
      {
        $search = "SELECT * FROM `company` WHERE `email`= '$email' and `password`= '$password' ";
        $result = mysqli_query($connection, $search);
        if (mysqli_fetch_assoc($result))
        {
          $_SESSION['email'] = $_POST['email'];
          header('location:index.php');
        }
        else{
          echo "
          <div class=\"uk-alert-danger\" uk-alert>
          <a class=\"uk-alert-close\" uk-close></a>
          <p>Please enter correct email and password. </p>
      </div>";
        }
      }

  }

?>

<!doctype html>
<html class="no-js" lang="en">
<?php include('_head.php');
     include('css/ui_alerts.html');

?>

	
    <body>
    <style>
      .myDiv{
        display:none;
          padding:10px;
          margin-top:20px;
      }  
      #showuserLogin{
          /* border:1px ; */
      }
      #showcompanyLogin{
          /* border:1px solid grey; */
      }
      .box {
        margin-top: 2%;
        margin-left: 34%;
        align: center;
        padding: 5px;
        width: 420px;
        height: 40px;
        border: 1px solid #999;
        font-size: 18px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;
      }
    </style> 
	
		<!-- Navigation Start  -->
		<?php include('_navbar.php');?>

		<!-- Navigation End  -->
		
		<!-- login section start -->
    <select id="myselection" class="box">
      <option>Select Option</option>
      <option value="userLogin">User Account</option>
      <option value="companyLogin">Company Account</option>
    </select>
    <div id="showuserLogin" class="myDiv">
      <section class="login-wrapper">
        <div class="container">
          <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
            <form action="companyLogin.php" method="post" enctype="multipart/form-data">
              <!-- <img class="img-responsive" alt="logo" src="img/logo.png"> -->
              <h2 class="img-responsive">Login</h2>
              <input type="text" class="form-control input-lg" placeholder="Name" name="name">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password">
              <button type="submit" class="btn btn-primary" name="submit">Login</button>
              <p>Have't Any Account <a href="user_registration.php">Create An Account</a></p>
            </form>
          </div>
        </div>
      </section>
      You have selected option <strong>"One"</strong>.
    </div>
    <div id="showcompanyLogin" class="myDiv">
      <section class="login-wrapper">
        <div class="container">
          <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
            <form action="companyLogin.php" method="post" enctype="multipart/form-data">
              <!-- <img class="img-responsive" alt="logo" src="img/logo.png"> -->
              <h2 class="img-responsive">Company Login</h2>
              <input type="email" class="form-control input-lg" placeholder="Email" name="email">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password">
              <button type="submit" class="btn btn-primary" name="c_submit">Login</button>
              <p>Have't Any Account <a href="company_registration.php">Create An Account</a></p>
            </form>
          </div>
        </div>
      </section>
    </div>
		
		<!-- login section End -->	
		
		<!-- footer start -->
		<?php include("_footer.php")?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>      

    <script>
    $(document).ready(function(){
        $('#myselection').on('change', function(){
          var demovalue = $(this).val(); 
            $("div.myDiv").hide();
            $("#show"+demovalue).show();
        });
    });
    </script> 
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script src="js/bootsnav.js"></script>
		<script src="js/main.js"></script>
    </body>
</html>