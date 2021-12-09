<?php
include_once('config1.php');

session_start();
session_unset();
session_destroy();

header("location:{$hostname}/jober/index.php")
?>