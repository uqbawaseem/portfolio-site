<?php
    include("../config.php");

    $id = $_GET['id'];
    $job_id = $_GET['job_id'];

    mysqli_query($connection, "DELETE FROM company WHERE company_id= $id and job_id = $id");

    header("location: all-companies.php");

?>