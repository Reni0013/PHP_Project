<?php
include '/xampp/htdocs/PHP_Project/comp/_dbconnect.php';

$msg = $_POST['text'];
$email = $_POST['email'];
$url = $_POST['url'];

$sql = "INSERT INTO `message` (`id`, `sender_email`, `url`, `message`, `timestamp`) VALUES (NULL, '$email', '$url', '$msg', '2022-06-26 10:21:13.000000');";
$runQuery = mysqli_query($conn,$sql);
mysqli_close($conn);


?>