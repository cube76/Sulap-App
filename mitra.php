<!DOCTYPE html>
<html lang="en">

<?php session_start(); session_destroy(); ?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SULAP - Mitra</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body style="background-image:url('img/bg.jpg');">

      <div class="intro-text col-md-4 text-center bg-faded mw-100 p-4" style="background-color:#ee7600">

        <div class="container">
          <img class="img-fluid rounded about-heading-img col-md-6 mb-3 mb-lg-0" src="img/logo_putih_kementerian.png" alt="">
          <div class="about-heading-content">
          </div>
        </div>
      </div>

      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light static-top" style="background-color: #e3f2fd;">
        <div class="container">
          <a class="navbar-brand" href="#">
            <span class="site-heading-upper text-dark mb-3 desktop">SURVEI KEPUASAN LAYANAN DAN PENGADUAN</span>
            <span class="site-heading-upper text-dark mb-3 mobile">SULAP</span>
          <span class="site-heading-lower" style="color:#ee7600">BLU P3GL</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="umum.php">Umum</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="mitra.php">Mitra</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Tentang</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <?php
      // Include config file
      include ("connection.php");

      session_start();

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 

        $myusername = mysqli_real_escape_string($connection, $_POST['username']);
        $mypassword = mysqli_real_escape_string($connection, $_POST['password']);
        // $hashAndSalt = password_hash($mypassword, PASSWORD_BCRYPT);

        $sql = "SELECT * FROM user WHERE username = '$myusername'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // $active = $row['active'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) {
          if (password_verify($mypassword, $row['password'])) {
          $userid=$row['id'];
          $fill=$row['fill'];
          if($fill == 1){
            ?>
            <div class="alert alert-danger" role="alert">Anda sudah mengisi survey</div>
          <?php
          }else{
          $_SESSION['login_user'] = $myusername;
          $_SESSION['id_user'] = $userid;

          header("location: mitra-kuisoner2.php");
          }
          }else {
            ?>
          <div class="alert alert-danger" role="alert">Username atau Password Anda salah</div>
        <?php
          }
        } else {
          ?>
          <div class="alert alert-danger" role="alert">Username atau Password Anda salah</div>
        <?php
          $error = "Your Login Name or Password is invalid";
        }
      }
      ?>

      <div class="container">
        <div class="col-md-5 mx-auto rounded page-section p-2 text-white" style="background-color: #ee7600;">
          <section class="page-section clearfix intro-text m-2">

            <h2 class="section-heading mb-4">
              <span class="text-center section-heading-upper">Login Sebagai Mitra</span>
            </h2>

            <form method="post" action="">
              <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="myInput" placeholder="Password">
              <input class="mt-1" type="checkbox" onclick="myFunction()"> Show Password
              </div>
              <button type="submit" name="login" class="btn btn-primary" style="color:white;">Login</button>
            </form>
        </div>
        </section>
      </div>

      <footer class="page-footer bg-dark text-white-50 pt-4">
    <div class="container-fluid text-right text-md-right">
      <div class="row">
      <div class="col">
          <div class="container text-right">
            <h6 class="text-white">Kantor Cirebon</h6>
            <ul class="list-unstyled small">
              <li>
                <a>Jl. Kalijaga No. 101 Cirebon - 45113</a>
              </li>
              <li>
                <a>Telepon : (0231) 207037</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3  mb-3">
          <div class="container text-right">
            <h6 class="text-white">Kantor Bandung</h6>
            <ul class="list-unstyled small">
              <li>
                <a>Puslitbang Geologi Kelautan (P3GL)</a>
              </li>
              <li>
                <a>Jl. Dr. Djunjunan No.236 Pasteur- Bandung</a>
              </li>
              <li>
                <a>Telp. +62-022-6032020, +62-022-6032201,</a>
              </li>
              <li>
                <a>Fax. +62-022-6017887 </a>
              </li>
              <li>
                <a>Email : sekretariat.p3gl@esdm.go.id</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3" style="background-color:#1e272e">Copyright &copy; 2019 Survei Kepuasan Layanan dan Pengaduan (SULAP) BLU P3GL
    </div>
  </footer>
  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/password.js"></script>

</body>

</html>