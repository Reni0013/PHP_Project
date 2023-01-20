<?php
include '/xampp/htdocs/PHP_Project/comp/_dbconnect.php';
$servername = "localhost";

if(isset($_GET['url']))
{

if($_GET['val'] == "activate")
{
    $blockUrl=$_GET['url'];
	$sqlUserCheck = "UPDATE `url_master` SET `status` = 'Activated' WHERE `url` = '$blockUrl'";
	$queryRun = mysqli_query($conn, $sqlUserCheck);
} 
if($_GET['val'] == "block")
{
    $blockUrl=$_GET['url'];
	$sqlUserCheck = "UPDATE `url_master` SET `status` = 'Block' WHERE `url` = '$blockUrl'";
	$queryRun = mysqli_query($conn, $sqlUserCheck);
}

}

// echo $blockUrl;
// echo $_GET['val'];
header("location: http://" . $servername . "/PHP_Project/admin/pages/tables/baisc-table.php");

?>