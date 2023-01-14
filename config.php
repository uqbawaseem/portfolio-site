<?php
    $Server = 'localhost:3306';
    $UserName = 'root';
    $Password = '';
    $DatabaseName = 'portfolio_site';

  // creating connection
  $connection = mysqli_connect( $Server, $UserName, $Password, $DatabaseName );  
  // cheching connection 
  if(!$connection){
      die("CONNENCTION FAILED:". mysql_error());
  }
  echo "";
?>




