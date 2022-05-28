<?php
session_start();
    include("config.php");

    $id = $_GET['id'];
    mysqli_query($connection, "DELETE FROM `applicant` WHERE `applicant_id`=$id");
    session_unset();
    session_destroy();
    header("location: index.php");

?>