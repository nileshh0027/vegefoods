
  <head>
	  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Regester User</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/logo.png" />
  </head>
	<?php include('include/header.php'); ?>
<body>
	
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
             		 <a class="navbar-brand" href="">Vegefoods</a>
                <p class="font-weight-light">Signing up is easy. It only takes a few steps</p>
                <form class="pt-3" action="" method="post" onSubmit="return validation()">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="user_nm" id="user_nm" placeholder="Username"> <span id="user" class="text-danger font-weight-bold"> </span>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="user_eml" id="user_eml" placeholder="Email">
					  <span id="useremail" class="text-danger font-weight-bold"> </span>
                  </div>
                  <div class="form-group">
                    <input type="tel" class="form-control form-control-lg" name="user_no" id="user_no" placeholder="Contect No." >
					  <span id="userno" class="text-danger font-weight-bold"> </span>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="user_pass" id="user_pass" placeholder="Password" >
					  <span id="userpass" class="text-danger font-weight-bold"> </span>
                  </div>
					<div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="user_conpass" id="user_conpass" placeholder="Confirm Password" >
					  <span id="conpass" class="text-danger font-weight-bold"> </span>
                  </div>
               		
               		 <div class="mt-3">
                   <input type="submit" name="register" value="SIGN UP" class="btn btn-success btn-rounded btn-fw" ></button>
                  </div>
                  
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <!-- endinject -->
</body>
</html>

		<script type="text/javascript">
					function validation()
					{
						var user = document.getElementById('user_nm').value;
						var userEml = document.getElementById('user_eml').value;
						var userNo = document.getElementById('user_no').value;
						var userPass = document.getElementById('user_pass').value;
						var userConPass = document.getElementById('user_conpass').value;
						
						if(user == "")
							{
								document.getElementById('user').innerHTML = "**Please fill the UserName Field";
							return false;
							}
						if(user.length <= 2 || user.length > 20)
							{
								document.getElementById('user').innerHTML = "**please enter a valid username ";
							return false;
							}
						if(!isNaN(user))
							{
								document.getElementById('user').innerHTML = "**User name not be just Number";
							return false;
							}
						
						
						
						if(userEml == "")
							{
								document.getElementById('useremail').innerHTML = "**Please fill the Email Field";
							return false;
							}
						if(userEml.indexOf('@') <= 0)
							{
								document.getElementById('useremail').innerHTML = "**Please enter valid Email";
							return false;
							}
						if((userEml.charAt(userEml.length-4)!='.') && (userEml.charAt(userEml.length-3)!='.'))
							{
								document.getElementById('useremail').innerHTML = "**Please enter valid Email";
							return false;
							}
						
						
						if(userNo == "")
							{
								document.getElementById('userno').innerHTML = "**Please fill the Contect Field";
							return false;
							}
						if(isNaN(userNo))
							{
								document.getElementById('userno').innerHTML = "**Numbers Only";
							return false;
							}
						if(userNo.length != 10)
							{
								document.getElementById('userno').innerHTML = "**Mobile No. Must be 10 digit";
							return false;
							}
						
						
						if(userPass == "")
							{
								document.getElementById('userpass').innerHTML = "**Please fill the Password Field";
							return false;
							}
						
						if(userPass.length <= 6 || userPass.length > 20)
							{
								document.getElementById('userpass').innerHTML = "**Password must be between 6 to 20";
							return false;
							}
					
						
						if(userConPass == "")
							{
								document.getElementById('conpass').innerHTML = "**Please fill the Confirm Password Field";
							return false;
							}
						if(userPass != userConPass)
							{
								document.getElementById('conpass').innerHTML = "**Password not match";
							return false;
							}
					
						
					}
		</script>
	<?php

	 include('include/conn.php'); 
	


	if(isset($_POST['register']))
	{
	
	include 'include/conn.php';

			$nm = $_POST['user_nm'];
			$eml = $_POST['user_eml'];
			$nmbr = $_POST['user_no'];
			$pswd = $_POST['user_pass'];

			$sql = "insert into user(username,email,contact,password) values('$nm','$eml','$nmbr','$pswd')";

			if(mysqli_query($con,$sql))
			{
    			echo "<script> alert('User Regestration successfully')</script>";
					?>

						<meta http-equiv="Refresh" content="0; url = http://localhost/vegefoods/login.php" />
 				
					
				 	<?php
			}
			else
			{
					echo "<script> alert('Regestration Eroor')</script>";
			}
	}
	
?>