<?php
	
		include('include/conn.php');

		session_start();
		$email = $_SESSION['email'];
		$id = $_GET['pro_id'];

		$query = "delete from cart where pro_id = '".$id."' and u_email = '".$email."' ";

		if(mysqli_query($con,$query))
		{
					echo "<script> alert('Item deleted successfully')</script>";
					echo "<script>window.location='cart.php'</script>";
		}
		else
		{
			echo "<script> alert('error')</script>";
		}
?>