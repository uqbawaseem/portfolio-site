<?php
session_start();
    include("../config.php");
    $result = mysqli_query($connection, "SELECT company.company_id, company.name, company.email, company.password, company.address, company.contact, company.website, company.image, job.job_id FROM company, job ORDER BY `company_id` DESC");

?>
<!DOCTYPE html>
<html lang="en">
<?php 
include('_head.php');
?>

<body>
<?php 
include('_navbar.php');
?>
<div class="row">
    <div class="col-md-3">
        <?php 
        include('_sidebar.php');
        ?>
        <!-- side bar end -->
        <!--== BOTTOM FLOAT ICON ==-->
        <section>
            <div class="fixed-action-btn vertical">
                <a class="btn-floating btn-large red pulse">
                    <i class="large material-icons">mode_edit</i>
                </a>
                <ul>
                    <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a>
                    </li>
                    <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a>
                    </li>
                    <li><a class="btn-floating green"><i class="material-icons">publish</i></a>
                    </li>
                    <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a>
                    </li>
                </ul>
            </div>
        </section>

    </div>
    <div class="col-md-9" style="margin-top: 160px;">
        <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">Email</th>
                            <th scope="col">PASSOWRD</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">CONTACT</th>
                            <th scope="col">WEBSITE</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            while($p = mysqli_fetch_array($result)){
                                echo "<tr><td>".$p['company_id']."</td>";
                                echo "<td>".$p['name']."</td>";
                                echo "<td>".$p['email']."</td>";
                                echo "<td>".$p['password']."</td>";
                                echo "<td>".$p['address']."</td>";
                                echo "<td>".$p['contact']."</td>";
                                echo "<td>".$p['website']."</td>";
                                echo "<td>".$p['image']."</td>";
                                echo "<td><a href=\"company_edit.php?id=$p[company_id]\" class= \"btn btn-secondary\"><i class=\"fa fa-edit\"></i></a> <br><br> <a href=\"company_delete.php?id=$p[company_id]?job_id=$p[job_id]\"  class= \"btn btn-danger\" onClick=\"return confirm('Are you sure you want to delete?')\"><i class=\"fa fa-trash\" style=\"color:red;\"></i></a></td>";		         
                             }
                            ?>
                        </tbody>
        </table>
    </div>
</div>


    

    <!--======== SCRIPT FILES =========-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>