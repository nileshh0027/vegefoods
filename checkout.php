				<?php
	session_start();
	include('include/conn.php');

if (isset($_SESSION['email']))
{
	
	
	$email = $_SESSION['email'];

	
	$q = "select *from user_data where email = '".$email."'";
	$r = mysqli_query($con,$q);
	$row = mysqli_fetch_array($r);
	$disc = '';

	
	if(isset($_GET['id'],$_GET['qty']))
	{
		$id = $_GET['id'];
		$o_qty = $_GET['qty'];

		$query = "select *from product where id= '$id'";

		$data = mysqli_query($con,$query);

		$totle = mysqli_num_rows($data);

			$result = mysqli_fetch_array($data);

				$id = $result['id'];
				$category = $result['pro_category'];
				$name = $result['pro_name'];
				$price = $result['pro_price'];
				$discount = $result['discount'];
				$qty = $result['pro_qty'];
				$details = $result['pro_details'];
				$image = $result['pro_image'];
				$final_price = $price * $o_qty;
				$new_qty = $qty - $o_qty;
				$disc = (int)($discount/100*$price);
	}
	if(isset($_GET['stotle']))
	{
		$final_price = intval($_GET['stotle']);
		$disc = $_GET['disc'];	
		
	}
?>
<!DOCTYPE html>
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
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">

      	<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Totle Product Price </span>
		    						<span id="t_price">₹ <?php echo $final_price; ?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span id="discount">₹<?php if($disc != ''){echo $disc; } else {echo "00.00";}?></span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery Charge </span>
		    						<span id="d_charge">₹ <?php if($final_price >= 500){ echo "00.00"; $dilv=intval(0); } else { echo "50.00"; $dilv=intval(50);} ?></span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Grand Total</span>
		    						<span id="totle" >₹<?php echo $final_price-$disc+$dilv; ?></span>
		    					</p>
								</div>
	          	</div>
	   		 </div>
          </div> <!-- .col-md-8 -->
		  <div class="col-xl-7 ftco-animate">
		<form action="order.php" method="post" class="billing-form">
							<h3 class="mb-4 billing-heading">Billing Details</h3>
			
		<?php	if(isset($id))
				{ ?>
				<input type="text" name="id" hidden="" value="<?php echo $id; ?>">
				
				<input type="text" name="qty" hidden="" value="<?php echo $o_qty; ?>">
				<input type="text" name="totle_q" hidden="" value="<?php echo $qty; ?>">
		<?php	}?>
				<input type="text" name="totle_price" hidden="" value="<?php echo $final_price+$dilv-$disc	; ?>">
			
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Firt Name</label>
	                  <input type="text" name="f_name" class="form-control" value="<?php if($row>0){ echo $row['f_name']; } ?>" placeholder="" required >
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Last Name</label>
	                  <input type="text" name="l_name" class="form-control" value="<?php if($row>0){ echo $row['l_name']; } ?>" placeholder="" required>
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="state">State </label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="state" class="form-control">
		                  	<option  <?php 
										   		if($row['state'] == 'Gujarat')
												{
													echo "selected";
												}
										   ?>>Gujarat</option>
							  
		                    <option  <?php 
										   		if($row['state'] == 'Maharastra')
												{
													echo "selected";
												}
										   ?>>Maharastra</option>
							  
		                    <option   <?php 
										   		if($row['state'] == 'Rajasthan')
												{
													echo "selected";
												}
										   ?>>Rajasthan</option>
							  
		                    <option <?php 
										   		if($row['state'] == 'Punjab')
												{
													echo "selected";
												}
										   ?>>Punjab</option>
							  
		                    <option  <?php 
										   		if($row['state'] == 'Hariyana')
												{
													echo "selected";
												}
										   ?>>Hariyana</option>
							  
		                    <option  <?php 
										   		if($row['state'] == 'Uttar Pradesh')
												{
													echo "selected";
												}
										   ?>>Uttar Pradesh</option>
		                  </select>
		                </div>
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" name="street" class="form-control" value="<?php if($row>0){ echo $row['street']; } ?>" placeholder="House number and street name" required>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
						<label for="streetaddress">House No.</label>
	                  <input type="text" name="house_no" class="form-control" value="<?php if($row>0){ echo $row['house_no']; } ?>" placeholder="Appartment, suite, unit etc: (optional)" required>
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">City</label>
	                  <input type="text" name="city"class="form-control" value="<?php if($row>0){ echo $row['city']; } ?>" placeholder="" required>
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" name="pincode" class="form-control" value="<?php if($row>0){ echo $row['pincode']; } ?>" placeholder="" required >
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" name="phone" class="form-control" value="<?php if($row>0){ echo $row['phone']; } ?>" placeholder="" required>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" name="email" class="form-control" value="<?php if($row>0){ echo $row['email']; } ?>" placeholder="" required>
	                </div>
                </div>
              
                </div>
	            </div>
			         	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="method" value="COD" class="mr-2" required>Cash On Delivery</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value="" class="mr-2" required> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
									
									<p><input type="submit" name="submit" value="Place Order" class="btn btn-primary py-3 px-4">
								</div>
	          	</div>
	          </form><!-- END -->
			</div>
        </div>
      </div>
    </section> <!-- .section -->

	
	
	
	<?php include ('include/footer.php'); ?>
    
  



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
	</script>
    <?php } 
	else{
	
		echo "<script>window.location='login.php'</script>";
	}
	?>
  </body>
</html>