<?php
$servername = "localhost:90";

session_start();
session_unset();
session_destroy();

header("location: http://".$servername."/PHP_Project/login/index.php");
?>