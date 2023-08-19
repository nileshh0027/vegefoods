<!DOCTYPE html>

<?php
		
		session_start();
		
		
		if(isset($_SESSION['email']))
		{
				include('../include/conn.php');
			
			   $result = mysqli_query($con,"select *from user_order");
				$totle_order = mysqli_num_rows($result);
				
				$result = mysqli_query($con,"select *from user_order where order_status = ''");
				$pending_order = mysqli_num_rows($result);
				
				$completed_order = $totle_order - $pending_order;
				
		}

		
			
			
		
else 
{
	echo "<script>window.location='../login.php'</script>";
}

	
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
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
           <div class="d-xl-flex justify-content-between align-items-start">
              <h2 class="text-dark font-weight-bold mb-2"> Overview dashboard </h2>
              
            </div>
            <div class="row">
              <div class="col-md-12">
          		<div class="tab-content tab-transparent-content">
                  <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
						  <a href="order_details.php">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Totle Orders</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $totle_order; ?></h2>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-lightbulb icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">Completed</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark"><?php echo $completed_order; ?></h3></a>
                          </div>
                        </div>
                      </div>
						
                      <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
						  <a href="pending_order.php">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Pending Orders</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"><?php echo $pending_order; ?></h2>
                            <div class="dashboard-progress dashboard-progress-2 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-bookmark-check icon-md absolute-center text-dark"></i></div>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
						  <a href="feedback.php">
                        <div class="card">
                          <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">User Feedback</h5>
                            <h2 class="mb-4 text-dark font-weight-bold"> 00 </h2>
                            <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-eye icon-md absolute-center text-dark"></i></div>
                           </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
           <?php include ('include/footer.php')?>
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
</html>