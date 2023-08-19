<!DOCTYPE html>
<?php
		session_start();
	if(isset($_SESSION['email']))
	{
		
	$email = $_SESSION['email'];
	include('include/conn.php');
	
	$q = "select *from user_data where email = '".$email."'";
	$r = mysqli_query($con,$q);
	$row = mysqli_fetch_array($r);
	$id = $row['id'];
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
<!--- include Header -->
	  <?php include ('include/header.php'); ?>
	  
   
	
 	<section class="ftco-section">
	 <div class="container">
     <div class="row justify-content-center">
	<div class="col-xl-7 ftco-animate">
		<form action="" method="post" class="billing-form">
							<h3 class="mb-4 billing-heading">My Details</h3>
			
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
					<?php if($row == 0) {
              		echo "<p><input type='submit' name='save' value='Save Details' class='btn btn-primary py-3 px-4'>"; 
					}
					else{
					
						echo "<p><input type='submit' name='edit' value='Edit Details' class='btn btn-primary py-3 px-4'>";
						}?>
                </div>
	            </div>
		   </form><!-- END -->
		</div>
        </div>
      </div>
    </section> <!-- .section -->

  

 
	<?php include ('include/footer.php'); ?>
    
  


    
  </body>
</html>

<?php
			if(isset($_POST['save']))
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
				
				$query = "insert into user_data(email,f_name,l_name,state,street,house_no,city,pincode,phone) values('$email','$f_name','$l_name','$state','$street','$house_no','$city','$pincode','$phone')";
				
				if(mysqli_query($con,$query))
				{
					echo  "<script> alert('Details Saved')</script>";
				}
			}
	
		if(isset($_POST['edit']))
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
				

				$update_query = "update user_data set f_name='$f_name',l_name='$l_name',state='$state',street='$street',house_no='$house_no',city='$city',pincode='$pincode',phone='$phone' where email = '$email'";
				
				if(mysqli_query($con,$update_query))
				{
					echo  "<script> alert('Details Updated')</script>";
					?>
								<meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/myinfo.php" />
					<?php
				}
			}
?>