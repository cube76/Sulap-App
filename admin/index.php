<!DOCTYPE html>
<html lang="en">

<?php
include("views/connection.php");
session_start();
   
   $user_check = $_SESSION['login_user'];
   $id_check = $_SESSION['id_user'];
   
   $ses_sql = mysqli_query($connection,"select username, id from user where username = '$user_check' and id = '$id_check' ");
   if (!$ses_sql) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   $id_session = $row['id'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:views/login.php");
      die();
   }

$query = "SELECT mitra.*, user.username, user.privilege, user.name FROM mitra
INNER JOIN user ON mitra.id_user = user.id "
  or die(mysqli_error($connection));
$result = $connection->query($query);

if ($result->num_rows > 0) {
  $sangattidakpenting = 0;
  $tidakpenting = 0;
  $penting = 0;
  $sangatpenting = 0;
  $sangattidakpuas = 0;
  $tidakpuas = 0;
  $puas = 0;
  $sangatpuas = 0;
  $i = 0;
  while ($row = $result->fetch_assoc()) {
    $privilege = "" . $row["privilege"] . "";
    $total_puas = "" . $row["total_puas"] . "";
    $total_penting = "" . $row["total_penting"] . "";

    if ($privilege == 2) :
      $i++;
      if ($total_puas <= 43.75) {
        $sangattidakpuas++;
      } else if ($total_puas >= 43.76 && $total_puas <= 62.50) {
        $tidakpuas++;
      } else if ($total_puas >= 62.51 && $total_puas <= 81.25) {
        $puas++;
      } else if ($total_puas >= 81.26) {
        $sangatpuas++;
      }
      if ($total_penting <= 43.75) {
        $sangattidakpenting++;
      } else if ($total_penting >= 43.76 && $total_penting <= 62.50) {
        $tidakpenting++;
      } else if ($total_penting >= 62.51 && $total_penting <= 81.25) {
        $penting++;
      } else if ($total_penting >= 81.26) {
        $sangatpenting++;
      }
    endif;
  }
  if ($sangattidakpuas > 0) {
    $avgPuasD = $sangattidakpuas / $i * 100;
  } else $avgPuasD = 0;
  if ($tidakpuas > 0) {
    $avgPuasC = $tidakpuas / $i * 100;
  } else $avgPuasC = 0;
  if ($puas > 0) {
    $avgPuasB = $puas / $i * 100;
  } else $avgPuasB = 0;
  if ($sangatpuas > 0) {
    $avgPuasA = $sangatpuas / $i * 100;
  } else $avgPuasA = 0;

  if ($sangattidakpenting > 0) {
    $avgPentingD = $sangattidakpenting / $i * 100;
  } else $avgPentingD = 0;
  if ($tidakpenting > 0) {
    $avgPentingC = $tidakpenting / $i * 100;
  } else $avgPentingC = 0;
  if ($penting > 0) {
    $avgPentingB = $penting / $i * 100;
  } else $avgPentingB = 0;
  if ($sangatpenting > 0) {
    $avgPentingA = $sangatpenting / $i * 100;
  } else $avgPentingA = 0;
}
$connection->close();
?>
<input type="hidden" class="avg" data-avgpuas="<?php echo $avgPuas ?>" data-avgpenting="<?php echo $avgPenting ?>" data-puasd="<?php echo number_format($avgPuasD) ?>" data-puasc="<?php echo number_format($avgPuasC) ?>" data-puasb="<?php echo number_format($avgPuasB) ?>" data-puasa="<?php echo number_format($avgPuasA) ?>" data-pentingd="<?php echo number_format($avgPentingD) ?>" data-pentingc="<?php echo number_format($avgPentingC) ?>" data-pentingb="<?php echo number_format($avgPentingB) ?>" data-pentinga="<?php echo number_format($avgPentingA) ?>">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Overview</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark static-top" style="background-color:#ee7600;">

    <a class="navbar-brand mr-1" href="index.php">Admin Sulap BLU P3GL</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav" style="background-color:#d35400;">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="views/umum.php">
          <i class="fas fa-fw fa-comments"></i>
          <span>Umum</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="views/mitra.php">
          <i class="fas fa-poll-h"></i>
          <span>Mitra</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="views/user.php">
          <i class="fas fa-users"></i>
          <span>Users</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5">Masyarakat Umum!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="views/umum.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-poll-h"></i>
                </div>
                <div class="mr-5">Mitra BLU P3GL!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="views/mitra.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color:#ee7600;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-users"></i>
                </div>
                <div class="mr-5">Users!</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="views/user.php">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Grafik Kepentingan Pelayanan (Mitra) (%)</div>
              <div class="card-body">
                <canvas id="pentingPieChart" width="100%" height="100"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Grafik Kepuasan Pelayanan (Mitra) (%)</div>
              <div class="card-body">
                <canvas id="puasPieChart" width="100%" height="100"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © 2019 BLU P3GL</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" untuk keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href = "views/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/chart/kepentingan-chart.js"></script>
  <script src="js/chart/kepuasan-chart.js"></script>

</body>

</html>