<?php
            include('../include/conn.php'); 

            $id = $_GET['id'];
            $u_email = $_GET['eml'];

if(isset($_GET['remove']))
{
            
            $query = "Delete from user_order where pro_id = '$id' and u_email = '$u_email'";
	
	if(mysqli_query($con,$query))
	{
		echo "<script> alert('order Deleted')</script>";
		?>
		<meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/admin/order_details.php" />
		<?php 
	}
	else
	{
		echo "<script> alert('order not deleted')</script>";
	}
}

else
{
        $complete_order = "update user_order set order_status ='completed' where pro_id = '$id' and u_email = '$u_email'";
				
			if(mysqli_query($con,$complete_order))
            {
		        echo "<script> alert('order Completed')</script>";
		        ?>
		            <meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/admin/order_details.php" />
		        <?php 
	        }
	        else
	        {
		        echo "<script> alert('order not Completed')</script>";
	        }

}
        

?>