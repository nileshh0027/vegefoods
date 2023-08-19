<!DOCTYPE html>
<?php 
	session_start();
	if(isset($_SESSION['email']))
	{
include('include/conn.php');

	$cate = $_GET['category']; 
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

	  <!-- Include Header -->
	  <?php include ('include/header.php'); ?>
	  	
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="shop.php?category=all"<?php if($cate=="all"){echo "class='active'";}?>>All</a></li>
    					<li><a href="shop.php?category=Vagetable"<?php if($cate=="Vagetable"){echo "class='active'";}?>>Vegetables</a></li>
    					<li><a href="shop.php?category=Fruit"<?php if($cate=="Fruit"){echo "class='active'";}?>>Fruits</a></li>
    					<li><a href="shop.php?category=Dried"<?php if($cate=="Dried"){echo "class='active'";}?>>Dried</a></li>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
							
				<?php
	/* Include connection file*/
include('include/conn.php');

	$query = "";		
				if($cate == "Vagetable")
				{
					$query = "Select *from product where pro_category = 'Vagetable'";
				}
				elseif($cate == "Fruit")
				{
					$query = "Select *from product where pro_category = 'Fruit'";
				}
				elseif($cate == "Dried")
				{
					$query = "Select *from product where pro_category = 'Dried Fruit'";
				
				}
				elseif($cate=="all")
				{
					$query = "Select *from product";
				}

$result = mysqli_query($con,$query);

 		while($row = mysqli_fetch_assoc($result))
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
	    							<a href="product-single.php?<?php echo $id; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
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
    			</div><?php } ?>
    			 
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>

		
    
	  <?php include ('include/footer.php'); ?>
  

  </body>
</html>