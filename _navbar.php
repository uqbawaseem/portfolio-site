<nav class="navbar navbar-default navbar-sticky bootsnav">

<div class="container">      
    <!-- Start Header Navigation -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
        </button>
        <h3 class="navbar-brand logo">Portfolio Site</h3>
    </div>
    <!-- End Header Navigation -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="index.php">Home</a></li> 
                <!-- <li><a href="companies.php">Companies</a></li>  -->
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse</a>
                    <ul class="dropdown-menu animated fadeOutUp" style="display: none; opacity: 1;">
                        <li class="active"><a href="browse-job.php">Browse Jobs</a></li>
                        <li><a href="company-detail.php">Job Detail</a></li>
                        <li><a href="resume.php">Resume Detail</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="browse-job.php">Jobs</a></li> -->
                <!-- <li><a href="contact.php">Contact Us</a></li> -->
                <li><a href="about.php">About Us</a></li>
                <?php
                if(empty($_SESSION['email']) && empty($_SESSION['name'])) {
                  echo "<li><a href=\"companyLogin.php\">Login</a></li>";
                }
                ?>
                <li><?php
            if(isset($_SESSION['email'])){
              echo "<li><a href=\"createPortfolio.php\">Create Your Portfolio</a></li>
                    <li class=\"dropdown\">
                     <a href=\"#\" class=\"dropdown-toggle text-uppercase\" data-toggle=\"dropdown\" style=\"color: #5293fa;\">" .$_SESSION['email']."</a>
                      <ul class=\"dropdown-menu animated fadeOutUp\" style=\"display: none; opacity: 1;\">
                        <li><a href=\"/company/index.php\">dashbourd</a></li>
                        <li><a href=\"companyLogout.php?logout\">Logout</a></li>
                      </ul>";
            }
            else if(isset($_SESSION['name'])){
              echo "<li><a href=\"createPortfolio.php\">Create Your Portfolio</a></li>
                    <li class=\"dropdown\">
                     <a href=\"#\" class=\"dropdown-toggle text-uppercase\" data-toggle=\"dropdown\" style=\"color: #5293fa;\">" .$_SESSION['name']."</a>
                      <ul class=\"dropdown-menu animated fadeOutUp\" style=\"display: none; opacity: 1;\">
                        <li class=\"active\"><a href=\"profile.php\">Profile</a></li>
                        <li><a href=\"user_portfolio.php\">My Portfolio</a></li>
                        <li><a href=\"userLogout.php?logout\">Logout</a></li>
                      </ul>";
              }
            else
            { 
              echo " ";
            }
          ?></li>
            </ul>
            
    </div><!-- /.navbar-collapse -->
</div>   
</nav>
