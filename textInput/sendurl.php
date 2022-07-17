<?php
$servername = "localhost";

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="st.css">

</head>

<body>

    <div class="container">
        <input placeholder='Paste URL Here' class='js-search' type="text" id="custom_url">
        <i class="fa fa-link"></i>
    </div>

    <div class="social">
        <a href="https://twitter.com/StefCharle" target="_blank">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/149103/twitter.svg" alt="">
        </a>
    </div>


    <script type="text/javascript">
        let txtBox = document.querySelector('#custom_url');

        txtBox.addEventListener("keypress", function(event) {
            // If the user presses the "Enter" key on the keyboard
            if (event.key === "Enter") {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                // document.getElementById("myBtn").click();
                console.log(txtBox.value)
                // httpGet(txtBox.value)
                location.href = "http://localhost/PHP_Project/home4/home.php?url=" + txtBox.value;

            }
        });

        // function httpGet(theUrl) {
        //     var xmlHttp = new XMLHttpRequest();
        //     xmlHttp.open("GET", theUrl, false); // false for synchronous request
        //     xmlHttp.send(theUrl);
        //     return xmlHttp.responseText;
        // }

        // let request = new XMLHttpRequest();
        // request.onreadystatechange = function() {
        //     if (this.readyState === 4) {
        //         if (this.status === 200) {
        //             // document.body.className = 'ok';
        //             console.log(this.responseText);
        //         } else if (this.response == null && this.status === 0) {
        //             // document.body.className = 'error offline';
        //             console.log("The computer appears to be offline.");
        //         } else {
        //             // document.body.className = 'error';
        //         }
        //     }
        // };
    </script>

</body>

</html>