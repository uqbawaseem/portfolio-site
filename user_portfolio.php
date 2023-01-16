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
    <style>   
      * {
        box-sizing: border-box;
        transition: 0.35s ease;
      }
      .rela-block {
        display: block;
        position: relative;
        margin: auto;
        top: ;
        left: ;
        right: ;
        bottom: ;
      }
      .rela-inline {
        display: inline-block;
        position: relative;
        margin: auto;
        top: ;
        left: ;
        right: ;
        bottom: ;
      }
      .floated {
        display: inline-block;
        position: relative;
        margin: false;
        top: ;
        left: ;
        right: ;
        bottom: ;
        float: left;
      }
      .abs-center {
        display: false;
        position: absolute;
        margin: false;
        top: 50%;
        left: 50%;
        right: false;
        bottom: false;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 88%;
      }
      body {
        font-family: 'Open Sans';
        font-size: 18px;
        letter-spacing: 0px;
        font-weight: 400;
        line-height: 15px;
        background: url("http://kingofwallpapers.com/leaves/leaves-016.jpg") right no-repeat;
        background-size: cover;
      }
      body:before {
        content: "";
        display: false;
        position: fixed;
        margin: 0;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255,255,255,0.92);
      }
      .caps {
        text-transform: uppercase;
      }
      .justified {
        text-align: justify;
      }
      p.light {
        color: #777;
      }
      h2 {
        font-family: 'Open Sans';
        font-size: 30px;
        letter-spacing: 5px;
        font-weight: 600;
        line-height: 40px;
        color: #000;
      }
      h3 {
        font-family: 'Open Sans';
        font-size: 21px;
        letter-spacing: 1px;
        font-weight: 600;
        line-height: 28px;
        color: #000;
      }
      .page {
        width: 90%;
        max-width: 1200px;
        margin: 80px auto;
        background-color: #fff;
        box-shadow: 6px 10px 28px 0px rgba(0,0,0,0.4);
      }
      .top-bar {
        height: 220px;
        background-color: #848484;
        color: #fff;
      }
      .name {
        display: false;
        position: absolute;
        margin: false;
        top: false;
        left: calc(350px + 5%);
        right: 0;
        bottom: 0;
        height: 120px;
        text-align: center;
        font-family: 'Raleway';
        font-size: 40px;
        letter-spacing: 8px;
        font-weight: 100;
        line-height: 60px;
      }
      .name div {
        width: 94%;
      }
      .side-bar {
        display: false;
        position: absolute;
        margin: false;
        top: 60px;
        left: 5%;
        right: false;
        bottom: 0;
        width: 350px;
        background-color: #f7e0c1;
        padding: 320px 30px 50px;
      }
      .mugshot {
        display: false;
        position: absolute;
        margin: false;
        top: 50px;
        left: 70px;
        right: false;
        bottom: false;
        height: 210px;
        width: 210px;
      }
      .mugshot .logo {
        margin: -23px;
      }
      .logo {
        display: false;
        position: absolute;
        margin: false;
        top: 0;
        left: 0;
        right: false;
        bottom: false;
        z-index: 100;
        margin: 0;
        color: #000;
        height: 250px;
        width: 250px;
      }
      .logo .logo-svg {
        height: 100%;
        width: 100%;
        stroke: #000;
        cursor: pointer;
      }
      .logo .logo-text {
        display: false;
        position: absolute;
        margin: false;
        top: 58%;
        left: ;
        right: 16%;
        bottom: ;
        cursor: pointer;
        font-family: "Montserrat";
        font-size: 15px;
        letter-spacing: 0px;
        font-weight: 400;
        line-height: 58.333333333333336px;
      }
      .social {
        padding-left: 60px;
        margin-bottom: 20px;
        cursor: pointer;
      }
      .social:before {
        content: "";
        display: false;
        position: absolute;
        margin: false;
        top: -4px;
        left: 10px;
        right: false;
        bottom: false;
        height: 35px;
        width: 35px;
        background-size: cover !important;
      }
      .social.twitter:before {
        background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Twitter-07-128.png") center no-repeat;
      }
      .social.pinterest:before {
        background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_Pinterest-23-128.png") center no-repeat;
      }
      .social.linked-in:before {
        background: url("https://cdn3.iconfinder.com/data/icons/social-media-2026/60/Socialmedia_icons_LinkedIn-128.png") center no-repeat;
      }
      .side-header {
        font-family: 'Open Sans';
        font-size: 18px;
        letter-spacing: 4px;
        font-weight: 600;
        line-height: 28px;
        margin: 60px auto 10px;
        padding-bottom: 5px;
        border-bottom: 1px solid #888;
      }
      .list-thing {
        padding-left: 25px;
        margin-bottom: 10px;
      }
      .content-container {
        margin-right: 0;
        width: calc(95% - 350px);
        padding: 25px 40px 50px;
      }
      .content-container > * {
        margin: 0 auto 25px;
      }
      .content-container > h3 {
        margin: 0 auto 5px;
      }
      .content-container > p.long-margin {
        margin: 0 auto 50px;
      }
      .title {
        width: 80%;
        text-align: center;
      }
      .separator {
        width: 240px;
        height: 2px;
        background-color: #999;
      }
      .greyed {
        background-color: #ddd;
        width: 100%;
        max-width: 580px;
        text-align: center;
        font-family: 'Open Sans';
        font-size: 18px;
        letter-spacing: 6px;
        font-weight: 600;
        line-height: 28px;
      }
      @media screen and (max-width: 1150px) {
        .name {
          color: #fff;
          font-family: 'Raleway';
          font-size: 38px;
          letter-spacing: 6px;
          font-weight: 100;
          line-height: 48px;
        }
      }
    </style>
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
              <!-- FONTS -->
              <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
              <link href='https://fonts.googleapis.com/css?family=Raleway:100' rel='stylesheet' type='text/css'>
              <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

              <!-- PAGE STUFF -->
              <div class="rela-block page">
                <div class="rela-block top-bar">
                    <div class="caps name"><div class="abs-center"><?php echo $p['name']; ?></div></div>
                </div>
                <div class="side-bar">
                  <div class="mugshot">
                    <div class="logo">
                      <img class="rela-block logo-svg" src="img/<?php echo $p['image'];?>" />
                    </div>
                  </div>
                  <p>Address: 123 st# house, 23 erq.new town</p>
                  <p>Astoria, New York 11105</p>
                  <p>123-098-1234</p>
                  <p><?php echo $p['name'].'@gmail.com'; ?></p><br>
                  <p class="rela-block social twitter"><?php echo $p['name'].'.Twitter'; ?></p>
                  <p class="rela-block social pinterest"><?php echo $p['name'].'.pintrest'; ?></p>
                  <p class="rela-block social linked-in"><?php echo $p['name'].'.linkin'; ?></p>
                  <p class="rela-block caps side-header">Certification</p>
                  <p class="rela-block list-thing"><?php echo $p['certification']; ?></p>
                  <p class="rela-block caps side-header">Education</p>
                  <p class="rela-block list-thing"><?php echo $p['education']; ?></p>
                </div>
                <div class="rela-block content-container">
                  <h2 class="rela-block caps title"><?php echo $p['designation']; ?></h2>
                  <div class="rela-block separator"></div>
                  <div class="rela-block caps greyed">Profile</div>
                  <p class="long-margin">Retro DIY quinoa, mixtape williamsburg master cleanse bushwick tumblr chillwave dreamcatcher hella wolf paleo. Knausgaard semiotics truffaut cornhole hoodie, YOLO meggings gochujang tofu. Locavore ugh kale chips iPhone biodiesel typewriter freegan, kinfolk brooklyn kitsch man bun. Austin neutra etsy, lumbersexual paleo cornhole sriracha kinfolk meggings kickstarter. </p>
                  <div class="rela-block caps greyed">Experience</div>

                  <h3>Job #1</h3>
                  <p class="light">First job description</p>
                  <p class="justified"><?php echo $p['experience_data']; ?>. </p>
                  </div>
                </div>
              </div>
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