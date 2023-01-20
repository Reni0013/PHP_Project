<?php
include '/xampp/htdocs/PHP_Project/comp/_dbconnect.php';
$servername = "localhost:90";

$showBanWordsQuery = "SELECT * FROM `banned_words`";
$queryRun = mysqli_query($conn, $showBanWordsQuery);
$chatExists = mysqli_num_rows($queryRun);

if($_SERVER['REQUEST_METHOD']=='POST'){
  $word = $_POST['exampleInputUsername1'];

  $sqlSelect = "SELECT * FROM `banned_words` WHERE `words` = '$word'";
  $runSelectQuery = mysqli_query($conn, $sqlSelect);
  $wordExists = mysqli_num_rows($runSelectQuery);

  if ($wordExists == 0) {

          $sql = "INSERT INTO `banned_words` (`words`) VALUES ('$word')";
          $runQuery = mysqli_query($conn, $sql);

          if ($runQuery) {
              $showAlert = true;
          }

          header("location: http://" . $servername . "/PHP_Project/admin/pages/forms/basic_elements.php");

  }
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css"> -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <?php include '../../partials/_navbar.php';  ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        <!-- partial:../../partials/_sidebar.html -->
        <?php include '../_sidebar.php';  ?>
        <!-- partial -->
        
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Banned Word List </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add</h4>
                    <form method="POST" class="forms-sample"> 
                      <div class="form-group">
                        <label for="exampleInputUsername1">Word</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" name="exampleInputUsername1" placeholder="Banned Word">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2" href="http://localhost:90/PHP_Project/admin/pages/forms/basic_elements.php">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>      
            </div>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Manage URLChat </h3>
                    </div>
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> ID </th>
                                                <th> Words </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                while ($row = mysqli_fetch_array($queryRun)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['words'] . "</td>";
                                                    echo "<td>";
                                                    echo "<a class='btn btn-gradient-danger btn-fw' href='delete.php?id=".$row['id']."'>Delete</a>";  
                                                    echo "</td>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Renison 2022</span>
              <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">WebChat Client</a> from Christ College Rajkot</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>