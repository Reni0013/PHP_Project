<?php
$servername = "localhost";

session_start();
if ((!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)) {
    header("location: http://" . $servername . "/PHP_Project/login/login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="script.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Chat</title>
</head>
<style>
    html {
        height: 100%;
    }

    body {
        min-height: 100%;
    }
</style>


<body>
    <section class="chatbox">
        <section class="chat-window">

        <article class="msg-container msg-remote" id="msg-0">
                <div class="msg-box">
                    <img class="user-img" id="user-0" src="//gravatar.com/avatar/00034587632094500000000000000000?d=retro" />
                    <div class="flr">
                        <div class="messages">
                            <p class="msg" id="msg-0">
                                Loading..
                            </p>
                        </div>
                        <span class="timestamp"><span class="username">Name</span>&bull;<span class="posttime">3 minutes ago</span></span>
                    </div>
                </div>
            </article>

            <article class="msg-container msg-self" id="msg-0">
                <div class="msg-box">
                    <div class="flr">
                        <div class="messages">
                            <p class="msg" id="msg-1">
                            Loading..
                            </p>
                        </div>
                        <span class="timestamp"><span class="username">Name</span>&bull;<span class="posttime">Now</span></span>
                    </div>
                    <img class="user-img" id="user-0" src="//gravatar.com/avatar/56234674574535734573000000000001?d=retro" />
                </div>
            </article>


        </section>
        <form class="chat-input" onsubmit="return false;">
            <input type="text" autocomplete="off" id="msgTextBox" name="msgTextBox" placeholder="Type a message" />
            <button class="chat-input" id="submitMsg" name="submitMsg">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                    <path fill="rgba(0,0,0,.38)" d="M17,12L12,17V14H8V10H12V7L17,12M21,16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V7.5C3,7.12 3.21,6.79 3.53,6.62L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.79,6.79 21,7.12 21,7.5V16.5M12,4.15L5,8.09V15.91L12,19.85L19,15.91V8.09L12,4.15Z" />
                </svg>
            </button>
        </form>
    </section>
    <style>
        .enable.btn {
            float: right;
            outline: 0 none;
            border: none;
            background: rgba(38, 113, 255);
            height: 40px;
            width: 40px;
            border-radius: 50%;
            padding: 2px 0 0 0;
            margin: 10px;
            transition: all 0.15s ease-in-out;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>

        setInterval(messageCheck, 1000);
        function messageCheck() {
            $.post("http://localhost/PHP_Project/dispmsg.php", {
                    url: "www.google.com"
                },
                function(data, status) {
                    document.getElementsByClassName('chat-window')[0].innerHTML = data;
                }
            )
        }





        $(document).ready(function() {
            // .on Change,Keyup, Paste event of Msg.Textbox  (Multiple-Event-Biding)
            $("#msgTextBox").on('change keyup paste', function() {

                // IF text value is empty...
                if (!$.trim($('#msgTextBox').val())) {
                    $("#submitMsg").css("background", "rgba(255,255,255,.25)");
                    // Else text value is not empty...
                } else {
                    $("#submitMsg").css("background", "rgba(38,113,255)");
                }
            });

            $("#submitMsg").click(function() {
                var clientmsg = $("#msgTextBox").val();
                $.post("http://localhost/PHP_Project/send.php", {
                        text: clientmsg,
                        email: "<?php echo $_SESSION['email'] ?>"
                    },
                    function(data, status) {
                        document.getElementsByClassName('chat-window')[0].innerHTML = data;
                    }
                );
                $("#msgTextBox").val("");
                return false;

            });

            // $('#sendmsg').click(function() {
            //     if (!$.trim($('#sendtxt').val())) {
            //         alert("textbox value can't be empty");
            //     } else {
            //         $("#sendmsg").css("background", "rgba(38,113,255)");
            //     }
            // });
        });
    </script>
</body>

</html>