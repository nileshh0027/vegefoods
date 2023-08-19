<!DOCTYPE html>

<?php 
		session_start();
		if (isset($_SESSION['email']))
		{
		$eml = $_SESSION['email'];
		$cart_totle = 00.00;
		$disc = 00.00;
		$t = 00.00;
		$totle_disc = 0;
		
		


						include('include/conn.php');

									if(isset($_GET['id']))
									{
										$id = $_GET['id'];
										
									if(isset($_GET['qty']))
									{
										$qty = $_GET['qty'];
									}
									else
									{
										$qty = 1;
									}
									
									
									
										$q = "select *from cart where pro_id ='".$id."' and  u_email = '".$eml."'";
										$r = mysqli_query($con,$q);
										$row=mysqli_fetch_array($r);
										echo $row['pro_id'];
										
										if($row > 0)
										{

											echo "<script> alert('Item already exist in Cart')</script>";
											echo "<script>window.location='index.php'</script>";
										}
										else
										{
											$query = "insert into cart (pro_id,pro_qty,u_email) values ('$id','$qty','$eml')";

											if(mysqli_query($con,$query))
											{
												echo "<script> alert('Item added in Cart')</script>";
												echo "<script>window.location=cart.php'</script>";
													
											}
											else 
											{
												echo "error occurs";
											}

											
										}
									}
									

?>
<html lang="en">
  <head>
    <title>Vegefoods</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	  <link rel="shortcut icon" href="admin/assets/images/logo.png" />
  </head>
  <!--- include Header -->
	  <?php include ('include/header.php'); ?>
	  
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
								<th>Price in  Discount</th>
						        <th>Quantity(kg)</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
								<?php
										$q = "select *from cart where u_email = '".$eml."'";
										$r = mysqli_query($con,$q);
								
										while($row=mysqli_fetch_array($r))
										{
											$p_id = $row['pro_id'];
											$cart_qty = $row['pro_qty'];
											
											$p_query = "select *from product where id = '".$p_id."'";
											$p_result = mysqli_query($con,$p_query);
											
											while($result=mysqli_fetch_array($p_result))
											{
										
												$p_category = $result['pro_category'];
												$p_name = $result['pro_name'];
												$p_price = $result['pro_price'];
												$discount = $result['discount'];
												$p_qty = $result['pro_qty'];
												$p_details = $result['pro_details'];
												$p_image = $result['pro_image'];
												$disc = (int)($discount/100*$p_price);
												$cart_disc = $disc*$cart_qty;
										
												$f_price = $p_price - $disc;
												$totle_price = $f_price*$cart_qty;
											
											

												$cart_totle += $p_price*$cart_qty;

												$totle_disc += $disc*$cart_qty;
										
										
											
								?>
								
								<form method="post">
						      <tr class="text-center">
						        <td class="product-remove"><a href="delete_from_cart.php?pro_id=<?php echo $p_id;?>" onClick="return checkdelete()"><span class="ion-ios-close"  ></span></a><input type="number" name="id" hidden="" value="<?php echo $p_id;?>"</td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(admin/upload/<?php echo $p_image; ?>);"></div></td>
						        
						        <td class="product-name">
						        	<h3><?php echo $p_name; ?></h3>
						        	
						        </td>
						        <td>₹<?php echo $p_price ?></td>
						        <td class="price" id="price" >₹<?php echo $f_price; ?></td>
						       
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="number" name="quantity" id="qty" onKeyUp="return updateQty()" class="quantity form-control" value="<?php echo $cart_qty; ?>" min="1" max="<?php echo $p_qty;?>">
										<input type="submit" name="update" value="Update" class="btn btn-primary">
					          	</div>
					          </td>
						        </form>
						        <td class="total" id="totle">₹<?php if(!isset($totle_price)){ echo $t;} else{echo $totle_price;} ?></td>
						      </tr> <?php } }?>

		
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
						<h3>Cart Totals</h3>
    				<p class="d-flex">
    						<span>Subtotal</span>
    						<span>₹<?php echo $cart_totle; ?></span>
    					</p>
    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span id="discount">₹<?php if($disc != ''){echo $totle_disc; } else {echo "00.00";}?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery Charge </span>
		    						<span id="d_charge">₹ <?php if($cart_totle >= 500){ echo "00.00"; $dilv=0; } else { echo "50.00"; $dilv=50;} ?></span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Grand Total</span>
		    						<span id="totle" >₹<?php echo $cart_totle+$dilv-$totle_disc; ?></span>
		    					</p>   
					</div>
    				<p><a href="checkout.php?stotle=<?php echo $cart_totle ?> &disc=<?php echo $totle_disc;?>" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    				
    			</div>
    		
			</div>
		</section>

    
	<?php include ('include/footer.php'); 
		
			if(isset($_POST['update']))
			{
				$new_qty = $_POST['quantity'];
				$id = $_POST['id'];
				
				echo $new_qty;
				echo "and";
				echo $id;
				
				$update_qty_query = "update cart set pro_qty='$new_qty' where pro_id = '$id'";
				mysqli_query($con,$update_qty_query);
				
					echo "<script> alert('Updated Successfully')</script>";
				?>
					
						<meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/cart.php" />
 				<?php
					
			}
		
		?>
  
	

 <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
			
			
			
			
		    
		});
	 function checkdelete()
		{
			return confirm('Are you sure, you want to delete this item form cart?');
		}
	
	</script>
	 <?php } 
	else{
		
		echo "<script>window.location='login.php'</script>";
	}
	?>
     
  </body>
</html>