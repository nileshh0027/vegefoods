<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php include('../include/conn.php'); 

	

	$id = $_GET['id'];
	
	$query = "Delete from product Where id = '$id'";
	
	if(mysqli_query($con,$query))
	{
		echo "<script> alert('Record Deleted')</script>";
		?>
		<meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/admin/my_product.php?category=all" />
		<?php 
	}
	else
	{
		echo "<script> alert('Record not deleted')</script>";
	}
	

	

?>
	
</body>
</html>