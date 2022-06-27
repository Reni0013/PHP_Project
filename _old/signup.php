<?php
include 'comp/_dbconnect.php';

$showAlert = false;
$showError = false;
$userExists = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $cpassword = $_POST['CPassword'];

    $sqlSelect = "SELECT * FROM `info` WHERE `email` = '$email'";
    $runSelectQuery = mysqli_query($conn, $sqlSelect);
    $userExists = mysqli_num_rows($runSelectQuery);

    if ($userExists == 0) {

        if ($password == $cpassword) {
            $sql = "INSERT INTO `info` (`email`, `name`, `password`) VALUES ('$email', '$name', '$cpassword')";
            $runQuery = mysqli_query($conn, $sql);

            if ($runQuery) {
                $showAlert = true;
                $erro = "Your account is now created";
            }
        } else {
            $showError = true;
            $erro = "Password doesn't match";
        }
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<style>
    .container {
        width: 50%;
        margin: auto;
    }

    .formclass {
        margin: auto;
        width: 50%;
    }
</style>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php require 'comp/_navbar.php' ?>

    <?php
    if ($showAlert) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Success! </strong>' . $erro .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong>' . $erro .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if ($userExists > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error! </strong> Email already exsist
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <div class="heading my-3">
        <h1 class="text-center">Signup for Website</h1>
    </div>


    <div class="my-4 container">
        <form class="formclass" action="/PHP_Project/signup.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="Name" class="form-control" id="name" aria-describedby="name" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone.</div>
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" id="Password">
            </div>
            <div class="mb-3">
                <labe2 for="confirmPassword" class="form-label">Confirm Password</labe2>
                <input type="password" name="CPassword" class="form-control" id="confirmPassword">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


</body>

</html>