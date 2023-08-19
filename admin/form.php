<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connect Plus</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php include ('include/navbar.php')?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
         <?php include ('include/sidebar.php')?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="row">
              
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    
                    <form class="forms-sample" method="post" action="" enctype="multipart/form-data" onsubmit="return formValidation()">
                      <div class="form-group">
						  <div class="form-group">
                       		 <label for="pro_category">Product Category</label>
                       			 <select class="form-control" name="pro_cat" id="pro_cat">
                       			<option>Please Select</option>   
								<option>Vagetable</option>
                        		  <option>Fruit</option>
                        		  <option> Dried Fruit</option>
                       			 </select>
							  <span id="cate" class="text-danger font-weight-bold"> </span>
                    	  </div>
                      
                        <label for="pro_name">Product Name</label>
                        <input type="text" class="form-control" name="pro_nm" id="pro_nm" placeholder="Name">
						  <span id="name" class="text-danger font-weight-bold"> </span>
                      </div>
						
					<div class="form-group">
                        <label for="pro_price">Product Price</label>
                        <input type="number" class="form-control" name="pro_price" placeholder="Price" id="pro_price">
						<span id="price" class="text-danger font-weight-bold"> </span>
                     </div>
                 
                      <div class="form-group">
                        <label for="pro_qty">Product Qty</label>
                        <input type="number" class="form-control" name="pro_qty" placeholder="qty" id="pro_qty">
						  <span id="qty" class="text-danger font-weight-bold"> </span>
                      </div>
                      <div class="form-group">
                        <label for="pro_details">Product Details</label>
                        <textarea class="form-control" name="pro_det" rows="4" id="pro_det"></textarea>
						  <span id="details" class="text-danger font-weight-bold"> </span>
                      </div>
						
						 <div class="form-group">
                        <label>Product image</label>
                       
                       	<div class="input-group col-xs-12">
                         
                          <span class="input-group-append">
							 <br><label>Product Image : </label></br>
                              <input type="file" name="img" id="img">
							</span>
							 <span id="image" class="text-danger font-weight-bold"> </span>
                        </div>
                      </div>
                     
						  
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
			    <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include('include/footer.php'); ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
<script type="text/javascript">
			
	
			function formValidation()
			{
				var pronm = document.getElementById('pro_nm').value;
				var procat = document.getElementById('pro_cat').value;
				var proprice = document.getElementById('pro_price').value;
				var proqty = document.getElementById('pro_qty').value;
				var prodet = document.getElementById('pro_det').value;
				var proimg = document.getElementById('img').value;
				
				if(procat == "Please Select")
					{
						document.getElementById('cate').innerHTML = "**Please Select the category";
					return false;
					}
				
				
				if(pronm == "")
					{
						document.getElementById('name').innerHTML = "**Please fill the Field";
					return false;
					}
				if(!isNaN(pronm))
							{
								document.getElementById('name').innerHTML = "**Product name not be in numbers";
							return false;
							}
						
				
				if(proprice == "")
					{
						document.getElementById('price').innerHTML = "**Please fill the Field";
					return false;
					}
				
				
				
				if(proqty == "")
					{
						document.getElementById('qty').innerHTML = "**Please fill the Field";
					return false;
					}	
			
				if(prodet == "")
					{
						document.getElementById('details').innerHTML = "**Please fill the Field";
					return false;
					}
				
				
				if(proimg == "")
					{
						document.getElementById('image').innerHTML = "**Please select an image";
					return false;
					}
				
			}
</script>




  <?php  

				if(isset($_POST['submit']))
				{
				include('../include/conn.php');

  				$pro_cate = $_POST['pro_cat'];
				$pro_nm = $_POST['pro_nm'];
				$pro_price = $_POST['pro_price'];
				$pro_qty =$_POST['pro_qty'];
				$pro_det =$_POST['pro_det'];
				$imges = $_FILES['img']['name'];
					
				$tmp=$_FILES['img']['tmp_name'];
					move_uploaded_file($tmp, "upload/$imges");
				 
				
				$insert_product_query = "insert into product(pro_category,pro_name,pro_price,pro_qty,pro_details,pro_image) values('$pro_cate','$pro_nm','$pro_price','$pro_qty','$pro_det','$imges')";
				
				//$result_insert_query = mysqli_query($con,$insert_product_query);
				
				
					
				if(mysqli_query($con,$insert_product_query))
				{ 
					echo "<script> alert('Product Added successfully')</script>";
					?>

						<meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/admin/form.php" />
 				
					
				 	<?php
				}
				else
				{	
					echo "<script> alert('Product Added successfully')</script>";
				}
				}
?>	

</html>