<?php 
   session_start();
   include('config.php');?> 
<!doctype html>
<html class="no-js" lang="en">
  <?php include('_head.php');?>
  <body>
    <style>
        :root {
          --surface-color: #fff;
          --curve: 40;
          }

          * {
          box-sizing: border-box;
          }

          body {
          font-family: 'Noto Sans JP', sans-serif;
          overflow: hidden;
          }

          .cards {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
          gap: 2rem;
          margin: 4rem 5vw;
          padding: 0;
          list-style-type: none;
          }

          .card {
          position: relative;
          display: block;
          height: 100%;  
          border-radius: calc(var(--curve) * 1px);
          overflow: hidden;
          text-decoration: none;
          }

          .card__image {      
          width: 100%;
          height: auto;
          }

          .card__overlay {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          z-index: 1;      
          border-radius: calc(var(--curve) * 1px);    
          background-color: var(--surface-color);      
          transform: translateY(100%);
          transition: .2s ease-in-out;
          }

          .card:hover .card__overlay {
          transform: translateY(0);
          }

          .card__header {
          position: relative;
          display: flex;
          align-items: center;
          gap: 2em;
          padding: 2em;
          border-radius: calc(var(--curve) * 1px) 0 0 0;    
          background-color: var(--surface-color);
          transform: translateY(-100%);
          transition: .2s ease-in-out;
          }

          .card__arc {
          width: 80px;
          height: 80px;
          position: absolute;
          bottom: 100%;
          right: 0;      
          z-index: 1;
          }

          .card__arc path {
          fill: var(--surface-color);
          d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
          }       

          .card:hover .card__header {
          transform: translateY(0);
          }

          .card__thumb {
          flex-shrink: 0;
          width: 50px;
          height: 50px;      
          border-radius: 50%;      
          }

          .card__title {
          font-size: 1em;
          margin: 0 0 .3em;
          color: #6A515E;
          }

          .card__tagline {
          display: block;
          margin: 1em 0;
          font-family: "MockFlowFont";  
          font-size: .8em; 
          color: #C70039;  
          }

          .card__status {
          font-size: 1em;
          color: #C70039;
          }

          .card__description {
          padding: 0 2em 2em;
          margin: 0;
          color: #C70039;
          font-family: "MockFlowFont";   
          display: -webkit-box;
          -webkit-box-orient: vertical;
          -webkit-line-clamp: 3;
          overflow: hidden;
          }    
    </style>
      <!-- Navigation Start  -->
      <?php include('_navbar.php');?>
      <!-- Navigation End  -->
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <section class="main-banner" style="background:#242c36 url(img/slider-01.jpg) no-repeat">
         <div class="container">
            <div class="caption">
              <h2>Build Your Career</h2>
            </div>
         </div>
      </section>
      <section class="counter">
         <div class="container">
            <div class="col-md-4 col-sm-3">
               <div class="counter-text">
                  <span aria-hidden="true" class="icon-briefcase"></span>
                  <h3>
                     <?php							   
                        $query = "SELECT * FROM job";
                        if ($result=mysqli_query($connection, $query)) {
                        	$rowcount=mysqli_num_rows($result);
                        	echo "$rowcount"; 
                        }
                        ?>
                  </h3>
                  <p>Portfolio Posted</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-3">
               <div class="counter-text">
                  <span class="box1"><span aria-hidden="true" class="icon-expand"></span></span>
                  <h3>
                     <?php							   
                        $query = "SELECT * FROM company";
                        if ($result=mysqli_query($connection, $query)) {
                        $rowcount=mysqli_num_rows($result);
                        echo "$rowcount+"; 
                        }
                        ?>
                  </h3>
                  <p>All Companies</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-3">
               <div class="counter-text">
                  <span class="box1"><span aria-hidden="true" class="icon-profile-male"></span></span>
                  <h3>
                     <?php							   
                        $query = "SELECT * FROM applicant";
                        if ($result=mysqli_query($connection, $query)) {
                        $rowcount=mysqli_num_rows($result);
                        echo "$rowcount+"; 
                        }
                        ?>
                  </h3>
                  <p>Total Members</p>
               </div>
            </div>
         </div>
      </section>
      <section class="membercard dark">
         <div class="container">

            <ul class="cards">
               <?php
               $query = "SELECT * FROM `portfolio` LIMIT 10";
               $result = mysqli_query($connection,$query);
               while($res = mysqli_fetch_array($result)) {  
      
               ?>
               <li>
                  <a href="view_portfolio.php?id=<?php echo $res['id']?>" class="card">
                     <img src="img/<?php echo $res['image'];?>" class="card__image" alt="" />
                     <div class="card__overlay">
                     <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
                        <img class="card__thumb" src="img/<?php echo $res['image'];?>" alt="" />
                        <div class="card__header-text">
                           <h2 class="card__title"><?php echo $res['name'];?></h2>            
                           <span class="card__status"><?php echo $res['designation'];?></span>
                        </div>
                     </div>
                     <p class="card__description"><?php echo $res['experience_data'];?></p>
                     <?php 
                        if(isset($_SESSION['email'])){
                           echo "<p class=\"card__description\"><a \"add_to_company.php?port_id=$res[id]\"> Add Employee</a></p>";
                        }
                     ?>
                     </div>
                  </a>      
               </li>
               <?php }?>   
            </ul>
         </div>
      </section>
      <!-- footer start -->
      <?php include('_footer.php');?>
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/owl.carousel.min.js"></script>
      <script src="js/bootsnav.js"></script>
      <script src="js/main.js"></script>
  </body>
</html>