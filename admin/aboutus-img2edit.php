<?php
// including the database connection file
include_once("../config.php");

// $result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");

if(isset($_POST['update']))
{	
    

	$id =  $_POST['id'];
    $image = $_FILES['image'];
    // $old_image_post =  $_FILES['image1'];

	// $file_name_old = $_FILES['image1']['name'];


	$file_name = $_FILES['image']['name'];
	$file_type = $_FILES['image']['type'];
	$file_size = $_FILES['image']['size'];
	$file_tmpname = $_FILES['image']['tmp_name'];


	$filename_explode = explode(".",$file_name);
	$to_lower = strtolower(end($filename_explode));

	$file_array = array ('jpg','jpeg','png');
	if(in_array($to_lower, $file_array)){
	
	$file_destination = 'picture/'.$file_name;
	move_uploaded_file($file_tmpname,$file_destination);
	// unlink($file_name_old);
	
	
	
		//updating the table
		$result2 = mysqli_query($mysqli, " UPDATE uploading_1 SET image='$file_destination' WHERE id=$id");
		//redirectig to the display page. In our case, it is index.php
		header("Location:aboutus-image.php");
	
}
}
?>
<?php
//getting id from url

$id = $_GET['id'];
$result2 = mysqli_query($mysqli, "SELECT * FROM uploading_1 WHERE id=$id");

//selecting data associated with this particular id


while($res = mysqli_fetch_array($result2))
{
	$id=$res['id'];
	
    $old_image = $res['image'];
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="aboutus-imgedit.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="aboutus-img2edit.php" enctype="multipart/form-data">
		<table border="0">
			<tr> 
				<td>image</td>
				<td><img src="<?php echo $old_image;?>" alt="page" height="100px" widtd="100px" name="image1"></td>
			</tr>

			<tr>
				<td><input type="text" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="file" name="image"></td>


				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
