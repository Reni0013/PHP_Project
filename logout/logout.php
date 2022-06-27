<?php
$servername = "localhost";

session_start();
session_unset();
session_destroy();

header("location: http://".$servername."/PHP_Project/login/login.php");
?>