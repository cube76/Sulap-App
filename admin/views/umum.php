<!DOCTYPE html>
<html lang="en">

<?php
include("session.php");
include("connection.php");
$query = "SELECT * FROM umum "
  or die(mysqli_error($connection));
$result = $connection->query($query);
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Umum</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark static-top" style="background-color:#ee7600;">

    <a class="navbar-brand mr-1" href="../index.php">Admin Sulap BLU P3GL</a>

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
      <li class="nav-item">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="umum.php">
          <i class="fas fa-fw fa-comments"></i>
          <span>Umum</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mitra.php">
          <i class="fas fa-poll-h"></i>
          <span>Mitra</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php">
          <i class="fas fa-users"></i>
          <span>Users</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <?php
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        if (isset($_POST['umum_delete'])) {
          $key = $_POST['keyToDelete'];
          $query = "DELETE FROM umum WHERE id = ?";
          $stmt = $connection->prepare($query);
          $stmt->bind_param("s", $key);
          $stmt->execute();
          if ($stmt->affected_rows) {
            // echo "Deleted ".$stmt->affected_rows." rows";
            ?>
            <div class="alert alert-success" role="alert">Berhasil menghapus user</div>
            <?php
            header("Location: umum.php");
          } else {
            // echo "No rows matched the criteria.";
            ?>
            <div class="alert alert-danger" role="alert">Gagal menghapus user</div>
          <?php
          }
          $stmt->close();
        }
        ?>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Umum</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Whistleblowing</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataumum" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Topik</th>
                    <th>Dibuat Pada</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Topik</th>
                    <th>Dibuat Pada</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if ($result->num_rows > 0) {
                    foreach ($result as $row) :
                      $id = "" . $row["id"] . "";
                      $topic = "" . $row["topic"] . "";
                      $waktu = "" . $row["created_at"] . "";
                      $feedback = "" . $row["feedback"] . "";
                      $file = "" . $row["file"] . "";
                      ?>
                      <tr>
                        <td></td>
                        <td scope="row"><?php echo $id ?></td>
                        <td><?php echo $topic ?></td>
                        <td><?php echo $waktu ?></td>
                        <td><button type="button" class="my-1 mr-1 btn btn-danger fas fa-trash-alt umum-delete" data-toggle="modal" data-target="#buttonDelete" data-id="<?php echo $id ?>"></button>
                          <button type="button" class="my-1 btn btn-primary fas fa-arrow-circle-right umum-detail" data-toggle="modal" data-target="#buttonDetail" data-id="<?php echo $id ?>" data-topic="<?php echo $topic ?>" data-feedback="<?php echo $feedback ?>" data-waktu="<?php echo $waktu ?>" data-img="data:image;base64,<?php echo $file?>">
                          </button></td>
                      </tr>
                      </td>
                      </tr>
                    <?php endforeach;
                  }
                  $connection->close();
                  ?>

                  </tr>
              </table>
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
        <div class="modal-body">Pilih "Logout" untuk keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Hapus Modal-->
  <div class="modal fade" id="buttonDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Laporan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah Anda yakin akan menghapus laporan ini?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form class="" action="" method="post">
            <input id="umum-id-2" name="keyToDelete" class="" type="hidden" name="id_product" value="">
            <button class="btn btn-primary umum_delete2" name="umum_delete">Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Detail Modal-->
  <div class="modal fade" id="buttonDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="inputEmail"><b>Id</b></label>
              <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="umum-id" aria-describedby="emailHelp" placeholder="update email" required>
            </div>
            <div class="form-group">
              <label for="inputEmail"><b>Topik</b></label>
              <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="umum-topic" aria-describedby="emailHelp" placeholder="update email" required>
            </div>
            <div class="form-group">
              <label for="inputEmail"><b>Pelaporan</b></label>
              <textarea value="" readonly name="update_price" type="text" class="form-control" style="background-color:white" rows="3" id="umum-desc" aria-describedby="emailHelp" placeholder="update email" required></textarea>
            </div>
            <div class="form-group">
              <label class="row ml-1" for="inputEmail"><b>Gambar</b></label>
              <img id="umum-img" height="auto" width="auto" src="" data-enlargable style="max-width: 400px; cursor: zoom-in;">
            </div>
            <div class="form-group">
              <label for="inputEmail"><b>Waktu</b></label>
              <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="umum-waktu" aria-describedby="emailHelp" placeholder="update email" required>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

  <script src="js/umum.js"></script>


</body>

</html>