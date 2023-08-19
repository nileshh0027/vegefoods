<!DOCTYPE html>

<?php
		
		session_start();
		
		
		if(isset($_SESSION['email']))
		{
		
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
            
           	<div class="row">
			 <div class="col-lg-6 grid-margin stretch-card">
                <div class="">
                  <div class="card-body">
                    <h4 class="card-title">Totle Orders</h4>
                 	 <table class="table table-bordered" style="overflow-y: scroll">
                      <thead>
                        <tr>
                          <th>Order No.</th>
                          <th>User Name</th>
                          <th>Product Name</th>
                          <th>QTY</th>
                          <th>Price</th>
                          <th>State</th>
                          <th>Address</th>
                     	 <th>City</th>
                        <th>Order Status</th>
                        <th>Edit Order</th>
                        </tr>
                      </thead>
                      <tbody>
						  <?php
						  		include('../include/conn.php');
	   	
	   							$query = "Select *from user_order where order_status = ' '";
	   							$result = mysqli_query($con,$query);
	   							while($row=mysqli_fetch_assoc($result))
								{
									$pro_id = $row['pro_id'];
									$u_email = $row['u_email'];
									$fatch_name = mysqli_query($con,"select *from product where id = '".$row['pro_id']."'");
									$pro_name = mysqli_fetch_assoc($fatch_name);
						  ?>
                        <tr>
                          <td><?php echo $row['id'];?> </td>
                          <td><?php echo $row['f_name']," ",$row['l_name'];?></td>
                         <td><?php echo $pro_name['pro_name']; ?> </td>
                          <td><?php echo $row['pro_qty'],"kg"; ?> </td>
							<td><?php echo "₹",$row['pro_price'],"<br>",$row['method']; ?> </td>
                          <td><?php echo  $row['state']; ?> </td>
                         <td><?php echo $row['f_name']," ",$row['l_name']."<br>".$row['street']."<br>".$row['state']," ",$row['pincode']."<br>"."Phone - ",$row['phone'],"<br>"."email -",$row['u_email']; ?> </td>
                          <td><?php echo $row['city']; ?></td>
                          <td><label class="badge badge-danger">Pending</label></td>
                          <td>
							  <form method="post" action="">
							  <input type="submit" value="complete" name="complete" class="btn btn-success"><br>
								<input type="submit" value=" Remove " name="remove" class="btn btn-danger">		
							</form>
						</td>
                        </tr><?php }?>
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
<?php
		if(isset($_POST['complete']))
		{
			$complete_pro = "update user_order set order_status ='completed' where pro_id = '$pro_id' and u_email = '$u_email'";
				
			if(mysqli_query($con,$complete_pro))
			{
				?> 
					<meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/admin/pending_order.php" />
			
				<?php
			}
				
		
		}

?>