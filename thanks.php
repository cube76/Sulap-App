<!DOCTYPE html>
<html lang="en">

<?php
include('session.php');
$totalpenting = $_SESSION['total_penting'];
$totalpuas = $_SESSION['total_puas'];
?>

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

<body>

<!-- <div id="wrap"> -->
    <div id="main" class="">
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

            <!-- <?php
                    $a = 43.75;
                    $b = 62.50;
                    $c = 81.25;
                    $d = 100.00;

                    if ($totalpuas <= $a) {
                        $puas = "Sangat Tidak Puas";
                        $img = "img/cry.png";
                    } else if ($totalpuas <= $b) {
                        $puas = "Tidak Puas";
                        $img = "img/sad.png";
                    } else if ($totalpuas <= $c) {
                        $puas = "Puas";
                        $img = "img/smile.png";
                    } else if ($totalpuas <= $d) {
                        $puas = "Sangat Puas";
                        $img = "img/laugh.png";
                    }
                    if ($totalpenting <= $a) {
                        $penting = "Sangat Tidak Penting";
                    } else if ($totalpenting <= $b) {
                        $penting = "Tidak Penting";
                    } else if ($totalpenting <= $c) {
                        $penting = "Penting";
                    } else if ($totalpenting <= $d) {
                        $penting = "Sangat Penting";
                    }
                    ?> -->

            <div class="text-center mt-5">
                <img src="img/smile.png">
                <div class="mt-5 mb-5">
                    <h2>Terima kasih telah berpartisipasi dalam kuisioner ini.</h2>
                    <h4>Kami akan selalu berkomitmen untuk memperbaiki layanan.</h4>
                </div>
            </div>

            <!-- </div> -->
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

</body>

</html>