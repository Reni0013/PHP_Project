<?php
include '/xampp/htdocs/PHP_Project/comp/_dbconnect.php';
$servername = "localhost";


    $id = $_GET['id'];
	$sqlUserCheck = "DELETE FROM banned_words WHERE id = {$id}";
	$result = mysqli_query($conn, $sqlUserCheck) or die(mysqli_error($conn));


header("location: http://" . $servername . "/PHP_Project/admin/pages/forms/basic_elements.php");

?>