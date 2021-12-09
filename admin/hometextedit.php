<?php
// including the database connection file
include_once("../config.php");
$id = $_GET['id'];
$result1 = mysqli_query($mysqli, "SELECT * FROM hometext WHERE id=$id");
// $result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $text = mysqli_real_escape_string($mysqli, $_POST['text']);
    
	
	
	// checking empty fields
	if( empty($text) ) {	
			
		
        if(empty($text)) {
			echo "<font color='red'>Text field is empty.</font><br/>";
		}
		
			
	} else {	
		//updating the table
		$result1 = mysqli_query($mysqli, "UPDATE hometext SET text='$text' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location:home-headingtext.php");
	}
}
?>
<?php
//getting id from url



//selecting data associated with this particular id


while($res = mysqli_fetch_array($result1))
{
	$id=$res['id'];
	
    $text = $res['text'];
	
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="hometextedit.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="hometextedit.php">
		<table border="0">
			<tr> 
				<td>Text</td>
				<td><input type="text" name="text" value="<?php echo $text;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
