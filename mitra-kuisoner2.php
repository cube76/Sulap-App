<!DOCTYPE html>
<html lang="en">

<?php
include("session.php");

$penting1 = null;
$penting2 = null;
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if (isset($_POST['submit'])) {
  $penting1 = $_POST['penting1'];
  $penting2 = $_POST['penting2'];
  $penting3 = $_POST['penting3'];
  $penting4 = $_POST['penting4'];
  $penting5 = $_POST['penting5'];
  $penting6 = $_POST['penting6'];
  $penting7 = $_POST['penting7'];
  $penting8 = $_POST['penting8'];
  $penting9 = $_POST['penting9'];
  $pentingtotal = $penting1 + $penting2 + $penting3 + $penting4 + $penting5 + $penting6 + $penting7 + $penting8 + $penting9;
  $hasilpenting = $pentingtotal / 9;
  $puas1 = $_POST['puas1'];
  $puas2 = $_POST['puas2'];
  $puas3 = $_POST['puas3'];
  $puas4 = $_POST['puas4'];
  $puas5 = $_POST['puas5'];
  $puas6 = $_POST['puas6'];
  $puas7 = $_POST['puas7'];
  $puas8 = $_POST['puas8'];
  $puas9 = $_POST['puas9'];
  $puastotal = $puas1 + $puas2 + $puas3 + $puas4 + $puas5 + $puas6 + $puas7 + $puas8 + $puas9;
  $hasilpuas = $puastotal / 9;
    
  $rows = false;
  $query = "INSERT INTO mitra (id_user, puas_1, puas_2,puas_3,puas_4,puas_5,puas_6,puas_7,puas_8,puas_9,total_puas,penting_1,penting_2,penting_3,penting_4,penting_5,penting_6,penting_7,penting_8,penting_9,total_penting)
  values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
  $stmt = $connection->prepare($query);
  if ($stmt) {
    $stmt->bind_param("idddddddddddddddddddd", $id_session, $puas1, $puas2, $puas3, $puas4, $puas5, $puas6, $puas7, $puas8, $puas9, number_format($hasilpuas, 2), $penting1, $penting2, $penting3, $penting4, $penting5, $penting6, $penting7, $penting8, $penting9, number_format($hasilpenting, 2));
    $res = $stmt->execute();
    $stmt->close();
    $_SESSION['total_penting'] = $hasilpenting;
    $_SESSION['total_puas'] = $hasilpuas;
    if ($res) {
      $sql = 'update `user` set `fill`=1 where `id`=?';
      $stmt = $connection->prepare($sql);

      if ($stmt) {
        $stmt->bind_param('i', $id_session);
        $res = $stmt->execute();
        $rows = $stmt->affected_rows;
        $stmt->close();
      }
    }
    if ($res && $rows) exit(header('Location: thanks.php'));
  }
}

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


  <div class="alert alert-danger" role="alert" style="visibility: hidden;display:none;" id="danger">Mohon lengkapi semua jawaban di semua kuisioner</div>

  <section class="page-section ">
    <form method="post" action="" id="form">

      <div class="container">
        <div class="intro-text left-0 text-left text-black p-4 rounded " style="background-color: #ffbe76">

          <div class="section-heading-upper">
            <p class="mb-3 lead">1. Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis
              pelayanannya?
            </p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto option" id="penting11">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting1" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting1" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting1" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting1" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto option" id="penting12">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas1" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas1" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas1" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas1" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="section-heading-upper">
            <p class="mb-3 lead">2. Bagaimana pemahaman Saudara tentang kemudahan prosedur di unit ini?
            </p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting21">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting2" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting2" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting2" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting2" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting22">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas2" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas2" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas2" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas2" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="section-heading-upper">
            <p class="mb-3 lead">3. Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan layanan?
            </p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting31">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting3" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting3" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting3" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting3" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting32">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas3" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas3" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas3" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas3" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="section-heading-upper">
            <p class="mb-3 lead">4. Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?
            </p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting41">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting4" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting4" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting4" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting4" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting42">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas4" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas4" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas4" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas4" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="section-heading-upper">
            <p class="mb-3 lead">5. Bagaimana pendapat Saudara tentang kesesuaian produk layanan antar yang tercantum
              dalam standar pelayanan dengan hasil yang diberikan?
            </p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting51">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting5" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting5" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting5" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting5" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting52">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas5" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas5" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas5" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas5" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="section-heading-upper">
            (khusus untuk layanan tatap muka)
            <p class="mb-3 lead"> 6.a. Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan
            </p>
            (khusus untuk layanan online)
            <p class="mb-3 lead"> 6.b. Bagaimana pendapat Saudara tentang ketersedian informasi dalam sistem online yang
              mendukung jenis layanan</p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting61">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting6" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting6" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting6" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting6" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting62">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas6" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas6" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas6" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas6" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="section-heading-upper">
            (khusus untuk layanan tatap muka)
            <p class="mb-3 lead"> 7.a. Bagaimana pendapat Saudara tentang perilaku petugas dalam pelayanan terkait
              kesopanan dalam pelayanan.</p>
            (khusus untuk layanan online)
            <p class="mb-3 lead"> 7.b. Bagaimana pendapat Saudara terkait deengan kemudahan dan kejelasan fitur sistem
              online yang mendukung jenis layanan.</p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting71">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting7" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting7" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting7" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting7" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting72">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas7" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas7" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas7" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas7" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="section-heading-upper">
            <p class="mb-3 lead">8. Bagaimana pendapat Saudara tentang kualitas sarana dan prasana
            </p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting81">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting8" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting8" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting8" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting8" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting82">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas8" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas8" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas8" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas8" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

          <hr>
          <div class="section-heading-upper">
            <p class="mb-3 lead">9. Bagaimana pendapat Saudara tentang penangann pengaduan pengguna layanan
            </p>
          </div>
          <div class="row ml-2">
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting91">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepentingan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting9" id="1penting1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting9" id="1penting2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting9" id="1penting3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Penting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="penting9" id="1penting4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Penting
                  </label>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="form-group p-1 mx-auto" id="penting92">
                <h2 class="section-heading mb-2">
                  <span class="text-center section-heading-upper">Kepuasan Layanan</span>
                </h2>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas9" id="1puas1" value="100.00" required>
                  <label class="form-check-label" for="exampleRadios1">
                    Sangat Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas9" id="1puas2" value="81.25">
                  <label class="form-check-label" for="exampleRadios2">
                    Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas9" id="1puas3" value="62.50">
                  <label class="form-check-label" for="exampleRadios3">
                    Tidak Puas
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="puas9" id="1puas4" value="43.75">
                  <label class="form-check-label" for="exampleRadios4">
                    Sangat Tidak Puas
                  </label>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- <div class="text-center mt-2">
      <input type="checkbox" name="benar" id="a-1">
      <label for="a-1" ><b>Saya mengisi formulir ini dengan sebenar-benarnya</b></label>
    </div> -->

      <div class="text-center mt-2">
        <input class="btn btn-primary btn-lg" value="Kirim Formulir" id="singlebutton" name="submit" type="submit" onclick="check()">
      </div>
    </form>
  </section>

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
  <!-- </div> -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/bootstrap/js/kuisioner.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.js"></script>

</body>

</html>