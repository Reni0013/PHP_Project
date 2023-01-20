<?php
include '/xampp/htdocs/PHP_Project/comp/_dbconnect.php';
$servername = "localhost:90";


    $email = $_GET['email'];
	$sqlUserCheck = "DELETE FROM `info` WHERE email = '$email'";
	$result = mysqli_query($conn, $sqlUserCheck) or die(mysqli_error($conn));


header("location: http://" . $servername . "/PHP_Project/admin/pages/users/");

?>