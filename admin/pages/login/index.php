<?php
include '/xampp/htdocs/PHP_Project/comp/_dbconnect.php';
$server = "localhost:90";
$isLogin = false;

session_start();
if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	header("location:http://" . $server . "/PHP_Project/admin/admin.php");
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$email = $_POST['exampleInputEmail1'];
	$password = $_POST['exampleInputPassword1'];

	$sqlUserCheck = "SELECT * FROM `admin_login` WHERE `email` = '$email' AND `password` = '$password'";
	$queryRun = mysqli_query($conn, $sqlUserCheck);
	$userExists = mysqli_num_rows($queryRun);

	if ($userExists == 1) {
		$isLogin = true;

		$_SESSION['loggedin'] = true;
		$_SESSION['email'] = $email;

		// echo '<script type="text/javascript">
		// location.reload();
		// </script>';
		// if(strlen($_GET["url"]) == 0){
		// 	echo "url unset";
		// }
		header("location:http://localhost:90/PHP_Project/admin/admin.php");
	} else {
		echo '<div class="alert alert-danger alert-dismissible fade show custombg" role="alert">
					<strong>Error! </strong> Credentials does not match
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo.svg">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form method="POST" class="pt-3">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="exampleInputEmail1" id="exampleInputEmail1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                  </div>

                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
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
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>