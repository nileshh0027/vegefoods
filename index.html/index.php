<?php 

		session_start();
		include('include/conn.php');
		
		if(isset($_POST['login']))
		{
		
			
			$email = $_POST['email'];
			$ps = $_POST['pass'];
			
			$q =  "select *from user where email = '".$email."' and password = '".$ps."'";
			$data = mysqli_query($con,$q);
			$r = mysqli_fetch_array($data);
			
			
			
			
			
			if(mysqli_num_rows($data) > 0)
			{
				if($email == $r['email'] && $ps == $r['password'] && $r['utype'] == "admin")
				{
					$_SESSION['email'] = $email;
					echo "<script>window.location='admin/index.php'</script>";
				}
				
				else if($email == $r['email'] && $ps == $r['password'] && $r['utype'] == "")
				{
					$_SESSION['email'] = $email;
					//echo "<script>window.location='index.php'</script>";
				}
				
				else
				{
						echo "<script> alert('Invalid Username or Password')</script>";
						echo "<script>window.location='login.php'</script>";
						
				}
			}
			else
			{
				echo "<script> alert('User does not exist')</script>";
				echo "<script>window.location='login.php'</script>";
			}
		
			$email = $_SESSION['email'];
	
				if($email == true)
				{
						
				}
				else
				{
					echo "<script>window.location='login.php'</script>";
				}

			
		
		}
		elseif(isset($_SESSION['email']))
			{

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
  
	<body>
		
		
		
			<!-- include Header File -->
			<?php include ('include/header.php'); ?>
		
		
		
    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Vegetables &amp; Fruits</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="about.php" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="#" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over 500</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-6 order-md-last align-items-stretch d-flex">
								<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(images/category.jpg);">
									<div class="text text-center">
										<h2>Vegetables</h2>
										<p>Protect the health of every home</p>
										<p><a href="shop.php?category=all" class="btn btn-primary">Shop now</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-2.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="shop.php?category=Fruit">Fruits</a></h2>
									</div>
								</div>
								<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/bg_1.jpg);">
									<div class="text px-3 py-1">
										<h2 class="mb-0"><a href="shop.php?category=Vagetable">Vegetable</a></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
					<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(images/category-3.jpg);"> 
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="#">Juices</a></h2>
							</div>		
						</div>
						
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(images/category-4.jpg);" >
				
				
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="shop.php?category=Dried">Dried</a></h2>
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
          	<span class="subheading">Featured Products</span>
            <h2 class="mb-4">Our Products</h2>
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
			$id = $row['id'];
			$category = $row['pro_category'];
			$name = $row['pro_name'];
			$price = $row['pro_price'];
			$discount = $row['discount'];
			$qty = $row['pro_qty'];
			$details = $row['pro_details'];
			$image = $row['pro_image'];
			$disc = $discount/100*$price;
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
		    						<p class="price"><span class="mr-2 price-dc"> ₹ <?php echo $price;  ?></span><span class="price-sale">₹ <?php echo number_format((float) $final_price, 2,'.',''); ?></span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="product-single.php?id=<?php echo $id; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="cart.php?id=<?php echo $id; ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="wishlist.php?id=<?php echo $id; ?>" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div> <?php } ?>
    		</div>
    </section>
		
	

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4">Our satisfied customer says</h2>
            
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel">
				
				<?php 
						$feedback = mysqli_query($con,"select *from user_feedback");
						while($fb = mysqli_fetch_assoc($feedback))
						{
				?>
				
             <div class="item">
                <div class="testimony-wrap p-4 pb-5">
					
					
                  <div class="user-img mb-5" style="background-image: url(admin/upload/no-user-image-icon-25.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text text-center">
                    <p class="mb-5 pl-4 line"><?php echo $fb['message']; ?></p>
                    <p class="name"><?php echo $fb['u_name']; ?></p>
                    <span class="position">Customer</span>
                  </div>
                </div>
              </div>
				<?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>

  

		

		
   	
	<?php include ('include/footer.php'); ?>
  

  
    
  </body>
</html>
	<?php 
		
?>
