<?php
		session_start();
		$s_email = $_SESSION['email'];

		if(isset($_POST['submit']))
		{
			include('include/conn.php');
			
			$f_name = $_POST['f_name'];
			$l_name = $_POST['l_name'];
			$state = $_POST['state'];
			$street = $_POST['street'];
			$house_no = $_POST['house_no'];
			$house_no = $_POST['house_no'];
			$city = $_POST['city'];
			$pincode = $_POST['pincode'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$price = $_POST['totle_price'];
			$payment_method = $_POST['method'];
		
			if(isset($_POST['id']))
			{
			$id = $_POST['id'];
			$o_qty = $_POST['qty'];
			$qty = $_POST['totle_q'];
	
			$new_qty = $qty - $o_qty;
			
				
			
		
				
				$insert_query = "insert into user_order(pro_id,pro_qty,pro_price,method,u_email,f_name,l_name,state,street,house_no,city,pincode,phone) values('$id','$o_qty','$price','$payment_method','$email','$f_name','$l_name','$state','$street','$house_no','$city','$pincode','$phone')";
			
			if(mysqli_query($con,$insert_query))
			{
					$update_product_query = "update product set pro_qty='$new_qty' where id = '$id'";
				mysqli_query($con,$update_product_query);
				
					echo "<script> alert('order Placed')</script>";
				
					echo "<script>window.location='index.php'</script>";
					
			}
			else
			{
					echo 'Error';
			}
			
				
			}
	
		


		else
		{
			$cart = mysqli_query($con,"select *from cart where u_email = '$s_email'");
			while($r = mysqli_fetch_array($cart))
			{
				$o_qty = $r['pro_qty'];
				$id = $r['pro_id'];
				
				$insert_query = "insert into user_order(pro_id,pro_qty,pro_price,u_email,f_name,l_name,state,street,house_no,city,pincode,phone) values('$id','$o_qty','$price','$email','$f_name','$l_name','$state','$street','$house_no','$city','$pincode','$phone')";
			
			if(mysqli_query($con,$insert_query))
			{
				$quantity = mysqli_query($con,"select *from product where id ='$id'");
				while($result = mysqli_fetch_array($quantity))
				
				$new_qty = $result['pro_qty'] - $o_qty;
				
				$update_product_query = "update product set pro_qty='$new_qty' where id = '$id'";
				
				mysqli_query($con,$update_product_query);
				mysqli_query($con,"delete from cart where u_email = '$s_email' and pro_id = '$id'");
				
				
					echo "<script> alert('order Placed')</script>";
					echo "<script>window.location='index.php'</script>";
					
			}
			else
			{
					echo 'Error';
			}
			

			
		}
			
		}
		}
?>