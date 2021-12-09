<html>
<head>
	<title>Add Data</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>
<body>
<?php


include_once('../config.php');


if(isset($_POST['submit']))
{


 $text = $_POST['text'];
  

// checking empty fields
if(empty($text)) {
				
    if(empty($text)) {
        echo "<font color='red'>Name field is empty.</font><br/>";
    }
    
  
    
    //link to the previous page

    echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";

    // echo " <a href=\"delete.php?id=$res[msg]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
} else { 


    $result1 = mysqli_query($mysqli, "INSERT INTO  hometext(text) VALUES('$text')");

		
	 
		 header("location:home-headingtext.php?message=data added");

		
}



}
?>