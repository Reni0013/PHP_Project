<?php
include '/xampp/htdocs/PHP_Project/comp/_dbconnect.php';
$server = "localhost";
$isLogin = false;
$showError = false;
// $url = $_GET["url"];  // $_GET["url"] ( Url should assign via Google/Firefox extension )
if(isset($_GET['url'])){
	$url = $_GET['url']; 
}else{
	// $url is not set
}



session_start();
if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	header("location:http://" . $server . "/PHP_Project/home4/home.php?url=" . $url);
	exit;
}

// if (!(is_null($url) || strlen($url)==0)){
//     header("location: http://" . $servername . "/PHP_Project/textInput/sendurl.php");
// }

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sqlUserCheck = "SELECT * FROM `info` WHERE `email` = '$email' AND `password` = '$password'";
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
		header("location:http://localhost/PHP_Project/steps.html");  //Put url of introduction page
	} else {
		echo '<div class="alert alert-danger alert-dismissible fade show custombg" role="alert">
					<strong>Error! </strong> Credentials does not match
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
	}
}
?>



<!doctype html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<style>
	a:link {
		text-decoration: none;
	}

	a {
		color: #8d448b;
	}
</style>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-3">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">
							<a href="http://localhost/PHP_Project/signup/signup.php">Don't have an account?</a>
						</h3>
						<form action="login.php" class="login-form" method="POST" autocomplete="off">
							<div class="form-group">
								<input type="email" name="email" class="form-control rounded-left" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="new-password" placeholder="Email" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" name="password" class="form-control rounded-left" placeholder="Password" autocomplete="new-password" autocomplete="off" required>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Get Started</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>