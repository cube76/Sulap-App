<!DOCTYPE html>
<html lang="en">

<?php session_start();
session_destroy(); ?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SULAP - Umum</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/business-casual.min.css" rel="stylesheet">

</head>

<body style="background-image:url('img/bg.jpg');">

  <div class="intro-text col-md-4 text-center bg-faded mw-100 p-4 " style="background-color:#ee7600">

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
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="umum.php">Umum</a>
              <span class="sr-only">(current)</span>
          </li>
          <li class="nav-item">
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
  include("connection.php");
  // mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  if (isset($_POST['upload_feedback'])) {
    $topic = $_POST['topic'];
    $feedback = $_POST['feedback'];
    $image = NULL;
    $maxsize = 16777215;
    if (($_FILES['my_picture']['size'] >= $maxsize) || ($_FILES["my_picture"]["size"] == 0)) {
      ?>
      <div class="alert alert-danger" role="alert">File terlalu besar. File harus kurang dari 16 MB</div>
    <?php
    }
    if (!empty($_FILES['my_picture']['tmp_name']) && file_exists($_FILES['my_picture']['tmp_name'])) {
      $image = addslashes($_FILES['my_picture']['tmp_name']);
      $image = mysqli_real_escape_string($connection, $image);
      $name  = addslashes($_FILES['my_picture']['tmp_name']);
      $image = file_get_contents($image);
      $image = base64_encode($image);
    }
    if ($topic == null || $feedback == null) {
      ?>
      <div class="alert alert-danger" role="alert">Mohon lengkapi data topik dan feedback</div>
    <?php
    } else {
      $query = "INSERT INTO umum (topic,feedback,file)
          values (?,?,?)";

      $stmt = $connection->prepare($query);
      $stmt->bind_param("sss", $topic, $feedback, $image);

      $stmt->execute();
      if ($stmt->affected_rows) {
        // echo "Uploaded " . $stmt->affected_rows . " rows";
        ?>
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Laporan berhasil dikirim!</h4>
          <p>Terima kasih atas laporan yang Anda berikan. Kami akan segera menindaklanjuti laporan Anda.</p>
        </div>
      <?php
        // header("Location: umum.php");
      } else {
        // echo "No rows matched the criteria.";
        ?>
        <div class="alert alert-danger" role="alert">Gagal memberi feedback</div>
      <?php
      }
      $stmt->close();
    }
  }
  ?>

  <div class="container">
    <div class="col-md-5 mx-auto rounded page-section p-2 text-white" style="background-color: #ee7600;">
      <section class="page-section clearfix intro-text m-2">

        <h2 class="section-heading mb-4">
          <span class="text-center section-heading-upper">form laporan whistleblowing</span>
        </h2>

        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            </label>
            <label for="exampleFormControlTextarea1">Topik</label>
            <input type="text" class="form-control" id="topik" name="topic" required="" placeholder="Tuliskan topik laporan Anda disini" oninvalid="this.setCustomValidity('Topik harus diisi terlebih dahulu')" oninput="setCustomValidity('')">
            <label class="form-text text-dark"><small>*Identitas anda akan dirahasiakan</small></label>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Uraian Pengaduan</label>
            <textarea class="form-control" id="feedback" placeholder="Tuliskan aduan Anda disini" name="feedback" rows="3" required oninvalid="this.setCustomValidity('Tuliskan feedback Anda')" oninput="setCustomValidity('')"></textarea>

            <label class="form-text">Isikan urain pengaduan sesuai kriteria 4w+1h <a href="#" class="info" data-toggle="modal" data-target="#infoModal">disini</a></label>
          </div>
          <div class="custom-file">
            <input type="file" accept="image/*" name="my_picture" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Pilih gambar</label>
          </div>
          <div class="g-recaptcha g-recaptcha-response mt-2" data-sitekey="6LfNya4UAAAAAKNdIiuLC-5hKvKGOTtvtwCfWgzb"></div>
          <input type="submit" value="Kirim" name="upload_feedback" class="btn btn-primary mt-1" style="color:white;">
        </form>
      </section>
    </div>
  </div>

  <!-- modal -->
  <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kriteria Pengaduan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="paddedContainer bgdefault m-3" style="margin-right:0">
          <p>Pengaduan Anda akan mudah ditindaklanjuti apabila memenuhi unsur sebagai berikut:</p>
          <table class="sleek" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td class="labelSpace"><b>What</b></td>
                <td>:</td>
                <td>Perbuatan berindikasi pelanggaran yang diketahui</td>
              </tr>
              <tr>
                <td class="labelSpace"><b>Where</b></td>
                <td>:</td>
                <td>Dimana perbuatan tersebut dilakukan</td>
              </tr>
              <tr>
                <td class="labelSpace"><b>When</b></td>
                <td>:</td>
                <td>Kapan perbuatan tersebut dilakukan</td>
              </tr>
              <tr>
                <td class="labelSpace"><b>Who</b></td>
                <td>:</td>
                <td>Siapa saja yang terlibat dalam perbuatan tersebut</td>
              </tr>
              <tr>
                <td class="labelSpace"><b>How</b></td>
                <td>:</td>
                <td>Bagaimana perbuatan tersebut dilakukan (modus, cara, dsb.)</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
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
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script>
    window.onload = function() {
      var $recaptcha = document.querySelector('#g-recaptcha-response');

      if ($recaptcha) {
        $recaptcha.setAttribute("required", "required");
      }
    };
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>


</body>

</html>