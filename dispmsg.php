<?php
include '/xampp/htdocs/PHP_Project/comp/_dbconnect.php';
session_start();
$url = $_POST['url'];
$username = $_SESSION['email'];

$sql = "SELECT * FROM `message` WHERE `url` = '$url'";

$res = '';
$runQuery = mysqli_query($conn,$sql);

if(mysqli_num_rows($runQuery) > 0)
{
    while($row = mysqli_fetch_assoc($runQuery)){

        if($username == $row['sender_email'])
        {
            $res = $res. '<article class="msg-container msg-self" id="msg-0"> <div class="msg-box"> <div class="flr"> <div class="messages"> <p class="msg" id="msg-1">';
            $res = $res. $row['message'];
            $res = $res. '</p></div>';
            $res = $res. '<span class="timestamp"><span class="username">';
            $res = $res. $row['sender_email'];
            $res = $res. '</span>&bull;<span class="posttime">Now</span></span>';
            $res = $res. '</div><img class="user-img" id="user-0" src="//gravatar.com/avatar/56234674574535734573000000000001?d=retro" /></div></article>';
        }
        else{
            $res = $res. '<article class="msg-container msg-remote" id="msg-0"> <div class="msg-box">';
            $res = $res. '<img class="user-img" id="user-0" src="//gravatar.com/avatar/00034587632094500000000000000000?d=retro" />';
            $res = $res. '<div class="flr"> <div class="messages"> <p class="msg text-light" id="msg-0">';
            $res = $res. $row['message'];
            $res = $res. '</p> </div> <span class="timestamp"><span class="username text-warning">';
            $res = $res. $row['sender_email'];
            $res = $res. '</span>&bull;<span class="posttime text-info">3 minutes ago</span></span>';
            $res = $res. '</div> </div> </article>';
        }





    }
}

echo $res;


?>