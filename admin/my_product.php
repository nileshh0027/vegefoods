<?php $cate = $_GET['category']; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vegefoods Admin</title>
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
			 <div class="col-lg-12 grid-margin stretch-card">
                <div class="">
                  <div class="card-body">
                    <h4 class="card-title">My Products</h4>
                    <p class="card-description"> <?php echo $cate; ?></p>
					
                    <table class="table table-bordered" id="Mytable">
						<thead>
                        <th> ID </th>
							<th> Pro_Type </th>
							<th> Pro_Name </th>
							<th> Pro_Price</th>
							<th> Discount </th>
							<th> Pro_Qyt (kg) </th>
							<th> Pro_Details </th>
							<th> Pro_Image </th>
							<th>  Edit prduct </th>
                      </thead>
						<tbody>
						<?php
								
							 include('../include/conn.php'); 
							
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
				
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style='color: #292525' align='center'>
								<td>".$row['id']."</td>
								<td>".$row['pro_category']."</td>
								<td>".$row['pro_name']."</td>
								<td>₹".$row['pro_price']."</td>
								<td>".$row['discount']."%</td>
								<td>".$row['pro_qty']."kg</td>
								<td>".$row['pro_details']."</td>
								<td><img height='100' width='100' src='upload/".$row['pro_image']."'> </td>
								<td><a href='update_pro.php?id=$row[id]'>   <button type'button' class='btn btn-success btn-rounded btn-icon'>
                            <i class='mdi mdi-border-color btn-icon-prepend'></i> </button></a> <br>
								<a href=delete_pro.php?id=$row[id]>  <button type='button' onclick='return checkdelete()' class='btn btn-danger btn-rounded btn-icon'>
                            <i class='mdi mdi-delete-forever'></i>   </button></a></td></tr>";

		
							}	?>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
				
                          </button>
				
				

              
              
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
<script>
	    
		function checkdelete()
		{
			return confirm('Are you sure, you want to delete this Record ?');
		}
		
	  </script>	
</html>