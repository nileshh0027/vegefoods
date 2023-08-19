<!DOCTYPE html>
<?php 
	session_start();
		if(isset($_SESSION['email']))
		{
		$email = $_SESSION['email'];
				include('include/conn.php');
			

									if(isset($_GET['id']))
									{
										$id = $_GET['id'];
										
										$q = "select *from wishlist where pro_id ='".$id."' and  u_email = '".$email."'";
										$r = mysqli_query($con,$q);
										$row=mysqli_fetch_array($r);
										
										
										if($row > 0)
										{

											echo "<script> alert('Item already exist in wishlist')</script>";
											echo "<script>window.location='index.php'</script>";
											
										}
										else
										{
											$query = "insert into wishlist (u_email,pro_id) values ('$email','$id')";

											if(mysqli_query($con,$query))
											{
												echo "<script> alert('Item added in wishlist')</script>";
												echo "<script>window.location='index.php'</script>";
												
													
											}
											else 
											{
												echo "error occurs";
											}

											
										}
									}
			
									if(isset($_GET['removeID']))
									{
										$id = $_GET['removeID'];
										
										mysqli_query($con,"delete from wishlist where pro_id = '$id' and u_email = '$email'");
										?>
										
										<meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/wishlist.php" />
										<?php
									}
									
		}
	else
	{
		echo "<script>window.location='login.php'</script>";
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
  <body class="goto-here">
		
	  	<!-- include Header	-->
	  		<?php include ('include/header.php'); ?>
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wishlist</span></p>
            <h1 class="mb-0 bread">My Wishlist</h1>
          </div>
        </div>
      </div>
    </div>
	  
	  <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a class="active">My Wishlist</a></li>
    					
    				</ul>
    			</div>
    		</div>
    		<div class="row">
							
				<?php
			/* Include connection file*/
				include('include/conn.php');

				$q = "select *from wishlist where u_email = '".$email."'";
				$r = mysqli_query($con,$q);
				
				while($result = mysqli_fetch_assoc($r))
				 {
						 $pro_id = $result['pro_id'];
					 	$query = "select *from product where id = '".$pro_id."'";		
						$data = mysqli_query($con,$query);

								while($row = mysqli_fetch_assoc($data))
								{
									$id = $row['id'];
									$category = $row['pro_category'];
									$name = $row['pro_name'];
									$price = $row['pro_price'];
									$qty = $row['pro_qty'];
									$details = $row['pro_details'];
									$image = $row['pro_image'];

?>
			
				
    			<div class="col-md-6 col-lg-3 ftco-animate">
    		<div class="product">
    					<a href="product-single.php?id=<?php echo $row['id']; ?>" class="img-prod"><img class="img-fluid" src="admin/upload/<?php echo $image; ?>" alt="Colorlib Template">
    						<!--<span class="status">30%</span>
    						<div class="overlay"></div>-->
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="product-single.php"><?php echo $name; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc"> ₹ <?php echo $price;  ?></span><span class="price-sale">₹ <?php echo $price; ?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="wishlist.php?removeID=<?php echo $id; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-close"></i></span>
	    							</a>
	    							<a href="cart.php?id=<?php echo $id; ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							
    							</div>
    						</div>
    					</div>
    				</div>
    			</div><?php } } ?>
    			 
    		</div>

    	</div>
    </section>

    

		
		
	  
	  <?php include ('include/footer.php'); ?>
  


  
    
  </body>
</html>