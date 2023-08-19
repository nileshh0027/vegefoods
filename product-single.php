<?php 

include('include/conn.php');

	$id = $_GET['id'];

	$query = "select *from product where id= '$id'";

	$data = mysqli_query($con,$query);

	$totle = mysqli_num_rows($data);

		$result = mysqli_fetch_array($data);

			$disc = (int) ($result['discount']/100*$result['pro_price']);
			$final_price = $result['pro_price'] - $disc;
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
  <body class="goto-here">

	  <!-- include Header -->
	  	<?php include ('include/header.php'); ?>
	  
	  
    
		
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="admin/upload/<?php echo $result['pro_image'];?>" class="image-popup"><img src="admin/upload/<?php echo $result['pro_image'];?>" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3><?php echo $result['pro_name'];?></h3>
					
					<div class="rating d-flex">
							
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;"><span style="color: #bbb;"><?php if ($result['pro_qty'] > 0) {echo "In Stock";} else{echo "Out of Stock";} ?></span></a>
							</p>
							
						</div>
    				
    				<p class="price"><span>₹ <?php echo number_format((int) $final_price, 2,'.',''); ?></span></p>
    				<p>
						<?php echo $result['pro_details'];?>
						</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <!--<div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>-->
	                </div>
		            </div>
					</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span> 
	             <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="<?php echo $result['pro_qty']; ?>">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span> 
	          	</div> 
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;"><?php echo $result['pro_qty'];?> kg available</p>
				</div>
					<div class="row">
						<?php if($result['pro_qty'] > 0)
						{	
					echo "<p><a href='' onClick='return CartQuantity()' id='cart' class='btn btn-black py-3 px-5'>Add to Cart</a></p>
					<p><a href='' onClick='return Quantity()'' id='bynow' class='btn btn-black py-3 px-5'>Buy now</a></p>"; } 
						else{
							echo "OUT OF STOCK";
						}?>
					</div>
          	</div>
          		
    			</div>
    		</div>
    	</div>
    </section>

	<section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Other Products</h2>
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
				
				
				
				<?php
	/* Include connection file*/
include('include/conn.php');

$query = "select *from product";

$result = mysqli_query($con,$query);

 		while($row = mysqli_fetch_array($result))
		{
			$pro_id = $row['id'];
			$category = $row['pro_category'];
			$name = $row['pro_name'];
			$price = $row['pro_price'];
			$discount = $row['discount'];
			$qty = $row['pro_qty'];
			$details = $row['pro_details'];
			$image = $row['pro_image'];
			$disc = (int)($discount/100*$price);
			$final_price = $price - $disc;
		
		
?>
				
				
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="product-single.php?id=<?php echo $row['id']; ?>" class="img-prod"><img class="img-fluid" src="admin/upload/<?php echo $image; ?>" alt="Colorlib Template">
    						<?php if($discount != '0')
							{ echo "<span class='status'>".$discount."%</span>
    						<div class='overlay'></div>";
							} ?>
							
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="product-single.php"><?php echo $name; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc"><?php echo $price;  ?></span><span class="price-sale"><?php echo number_format((int) $final_price, 2,'.',''); ?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="product-single.php?id=<?php echo $id; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div> <?php } ?>
    		</div>
    </section>
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
	  
	  function Quantity()
	  {
		  var o_qty = document.getElementById('quantity').value;
		  
		  var myElement = document.getElementById('bynow');
		  
		 myElement.href="checkout.php?id=<?php echo $id; ?> &qty="+o_qty;
		  
		  
	  }
	  function CartQuantity()
	  {
		  var o_qty = document.getElementById('quantity').value;
		  
		  var myElement = document.getElementById('cart');
		  
		 myElement.href="cart.php?id=<?php echo $id;?> &qty="+o_qty;
		  
		  
	  }
	</script>
    
  </body>
</html>