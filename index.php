<!DOCTYPE HTML>
<html>

<?php
include_once("index.html");?>

<head>
    <title>Home</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <style>
        .table>thead>tr>th {
            padding: 60px;
        }
    </style>


</head>

<body style="background-image:url('img/bg.jpg');">

  <div class="intro-text col-md-4 text-center bg-faded mw-100 p-4" style="background-color:#ee7600">

    <div class="container">
      <img class="img-fluid rounded about-heading-img col-md-6 mb-3 mb-lg-0" src="img/logo_putih_kementerian.png" alt="">
      <div class="about-heading-content">
      </div>
    </div>

  </div>
<!--Konten LIFF v2-->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top" style="background-color: #e3f2fd;">
    <div class="container ">
      <a class="navbar-brand" href="#">
        <span class="site-heading-upper text-dark mb-3 desktop">SURVEI KEPUASAN LAYANAN DAN PENGADUAN</span>
        <span class="site-heading-upper text-dark mb-3 mobile">SULAP</span>
        <span class="site-heading-lower" style="color:#ee7600">BLU P3GL</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <button class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </button>
          </li>
          <li class="nav-item">
            <button id="sendUmumButton" class="nav-link" href="umum.php">Umum</button>
          </li>
          <li class="nav-item">
            <button id="sendMitraButton" class="nav-link" href="mitra.php">Mitra</button>
          </li>
          <li class="nav-item">
            <button id="sendMessageButton" class="nav-link" href="about.php">Tentang</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

        <div id="liffAppContent">
            <!-- ACTION BUTTONS -->
            <div class="buttonGroup">
                <div class="buttonRow">
                    <button id="openWindowButton" class="btn btn-success btn-small">Open External Window</button>
                    <button id="closeWindowButton" class="btn btn-danger btn-small">Close LIFF App</button>
                </div>

            </div>

            <!-- LIFF DATA -->
            <div id="liffData">
                <h3 id="liffDataHeader" class="textLeft">Informasi:</h3>
                <table>
                    <tr>
                        <th>isInClient : </th>
                        <td id="isInClient" class="textLeft"></td>
                    </tr>
                    <tr>
                        <th>isLoggedIn : </th>
                        <td id="isLoggedIn" class="textLeft"></td>
                    </tr>
                </table>
            </div>
            <!-- LOGIN LOGOUT BUTTONS -->
            <div class="buttonGroup">
                <button id="liffLoginButton" class="btn btn-success btn-small">Log in</button>
                <button id="liffLogoutButton" class="btn btn-warning btn-small">Log out</button>
            </div>
            <div id="statusMessage">
                <div id="isInClientMessage"></div>
                <div id="apiReferenceMessage">
                    <p>Available LIFF methods vary depending on the browser you use to open the LIFF app.</p>
                </div>
            </div>
        </div>
        <!-- LIFF ID ERROR -->
        <div id="liffIdErrorMessage" class="hidden">
            <p>You have not assigned any value for LIFF ID.</p>
            <p>If you are running the app using Node.js, please set the LIFF ID as an environment variable in your
                Heroku account follwing the below steps: </p>
            <code id="code-block">
                <ol>
                    <li>Go to `Dashboard` in your Heroku account.</li>
                    <li>Click on the app you just created.</li>
                    <li>Click on `Settings` and toggle `Reveal Config Vars`.</li>
                    <li>Set `MY_LIFF_ID` as the key and the LIFF ID as the value.</li>
                    <li>Your app should be up and running. Enter the URL of your app in a web browser.</li>
                </ol>
            </code>
            <p>If you are using any other platform, please add your LIFF ID in the <code>index.html</code> file.</p>
            <p>For more information about how to add your LIFF ID, see <a
                    href="https://developers.line.biz/en/reference/liff/#initialize-liff-app">Initializing the LIFF
                    app</a>.</p>
        </div>
        <!-- LIFF INIT ERROR -->
        <div id="liffInitErrorMessage" class="hidden">
            <p>Something went wrong with LIFF initialization.</p>
            <p>LIFF initialization can fail if a user clicks "Cancel" on the "Grant permission" screen, or if an error occurs in the process of <code>liff.init()</code>.
        </div>
        <!-- NODE.JS LIFF ID ERROR -->
        <div id="nodeLiffIdErrorMessage" class="hidden">
            <p>Unable to receive the LIFF ID as an environment variable.</p>
        </div>

    </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <section class="page-section clearfix">
          <div class="container">
            <div class="intro-text left-0 text-center text-light p-5 rounded" style="background-color: #ee7600">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Pengaduan</span>
                <span class="section-heading-lower">Umum</span>
              </h2>
              <p class="mb-3">Jika Anda masyarakat umum dan akan mengadukan silahkan tekan tombol dibawah untuk menyampaikan aduan
                Anda.
              </p>
              <div class="intro-button mx-auto">
                <a class="btn btn-light btn-xl" style="color: #ee7600" href="umum.php">Isi Formulir di sini</a>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="col">
        <section class="page-section clearfix">
          <div class="container">
            <div class="intro-text left-0 text-center text-light p-5 rounded" style="background-color: #ee7600">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">BLU P3GL</span>
                <span class="section-heading-lower">Mitra</span>
              </h2>
              <p class="mb-3">Jika Anda sebagai Mitra P3GL silahkan tekan tombol di bawah untuk mengisi kuisioner
                yang
                telah kami siapkan. <br>

              </p>
              <div class="intro-button mx-auto">
                <a class="btn btn-light btn-xl" style="color: #ee7600" href="mitra.php">Isi Kuisoner di sini</a>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- </div>
  </div> -->
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
  <script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
  <script src="liff-starter.js" type="text/javascript"></script>

</body>

</html>