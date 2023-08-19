
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vegedoos Admin</title>
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
                    <h4 class="card-title">Feedback</h4>
                    <p class="card-description"></p>
					
                    <table class="table table-bordered" id="Mytable">
						<thead>
                       		 <th> ID </th>
							<th> User Name </th>
							<th> Email </th>
							<th> Subject </th>
							<th> Message </th>
							
                      </thead>
						<tbody>
						<?php
								
							 include('../include/conn.php'); 
							
				$query = "select *from user_feedback";		

								$result = mysqli_query($con,$query);
				
							while($row=mysqli_fetch_array($result))
							{
								echo "<tr style='color: #292525' align='center'>
								<td>".$row['id']."</td>
								<td>".$row['u_name']."</td>
								<td>".$row['u_email']."</td>
								<td>".$row['subject']."</td>
								<td>".$row['message']."</td>
								</tr>";

		
							}	?>
                       
                      </tbody>
                    </table>
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

</html>