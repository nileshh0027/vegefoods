<?php
		session_start();
	
		$email = $_SESSION['email'];
		
		
		include('include/conn.php');
		
		mysqli_query($con,"delete from cart where u_email = '".$email."'");
		mysqli_query($con,"delete from wishlist where u_email = '".$email."'");
	
		
		session_unset();
	
		echo "<script>window.location='login.php'</script>";
?>
