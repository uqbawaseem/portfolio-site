<?php
    $Server = 'localhost:3308';
    $UserName = 'root';
    $Password = '';
    $DatabaseName = 'jobPortal';

  // creating connection
  $connection = mysqli_connect( $Server, $UserName, $Password, $DatabaseName );  
  // cheching connection 
  if(!$connection){
      die("CONNENCTION FAILED:". mysql_error());
  }
  echo "CONNECTED SUCCESSFULLY";
?>




