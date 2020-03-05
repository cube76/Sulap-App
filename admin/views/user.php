<!DOCTYPE html>
<html lang="en">

<?php
include("session.php");
include("connection.php");
$query = "SELECT * FROM user "
    or die(mysqli_error($connection));
$result = $connection->query($query);
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Users</title>

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
            <li class="nav-item">
                <a class="nav-link" href="umum.php">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Umum</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mitra.php">
                    <i class="fas fa-poll-h"></i>
                    <span>Mitra</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-users"></i>
                    <span>Users</span></a>
            </li>
        </ul>

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.php">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>


                <?php
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                if (isset($_POST['user_tambah'])) {
                    $mitra = $_POST['mitra_input'];
                    $username = $_POST['username_input'];
                    $password = $_POST['password_input'];
                    $privilege = $_POST['privilege_input'];
                    $hashAndSalt = password_hash($password, PASSWORD_BCRYPT);
                    if ($username == null || $password == null) {
                        ?>
                        <div class="alert alert-danger" role="alert">Mohon lengkapi data username dan password</div>
                    <?php
                    } else {
                        $dupesql = "SELECT * FROM user where (username = '$username')";
                        $duperaw = mysqli_query($connection, $dupesql);
                        if (mysqli_num_rows($duperaw) > 0) {
                            ?>
                            <div class="alert alert-danger" role="alert">Data username yang Anda masukkan sudah ada</div>
                        <?php
                        } else {
                            $query2 = "INSERT INTO user (name,username, password, privilege)
                        values (? ,?, ?,?)";
                            $stmt2 = $connection->prepare($query2);
                            $stmt2->bind_param("sssi", $mitra, $username, $hashAndSalt, $privilege);
                            $stmt2->execute();
                            if ($stmt2->affected_rows) {
                                // echo "tambah " . $stmt2->affected_rows . " rows";
                                ?>
                                <div class="alert alert-success" role="alert">Berhasil menambah user</div>
                                <?php
                                header("Location: user.php");
                            } else {
                                // echo "No rows matched the criteria.";
                                ?>
                                <div class="alert alert-danger" role="alert">Gagal menambah user</div>
                            <?php
                            }
                            $stmt2->close();
                        }
                    }
                }

                if (isset($_POST['user_delete'])) {
                    $key = $_POST['keyToDelete'];
                    $query = "DELETE FROM user WHERE id = ?";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("s", $key);
                    $stmt->execute();
                    if ($stmt->affected_rows) {
                        // echo "Deleted ".$stmt->affected_rows." rows";
                        ?>
                        <div class="alert alert-success" role="alert">Berhasil menghapus user</div>
                        <?php
                        header("Location: user.php");
                    } else {
                        // echo "No rows matched the criteria.";
                        ?>
                        <div class="alert alert-danger" role="alert">Gagal menghapus user</div>
                    <?php
                    }
                    $stmt->close();
                }

                if (isset($_POST['user_update'])) {
                    $id = $_POST['id_update'];
                    $mitra_update = $_POST['name_update'];
                    $username_update = $_POST['username_update'];
                    $query3 = "UPDATE user SET name = ?, username = ? WHERE id = ?";
                    $stmt3 = $connection->prepare($query3);
                    $stmt3->bind_param("sss", $mitra_update, $username_update,$id);
                    $stmt3->execute();
                    if ($stmt3->affected_rows) {
                        ?>
                        <div class="alert alert-success" role="alert">Berhasil mengubah user</div>
                        <?php
                        header("Location: user.php");
                    } else {
                        ?>
                        <div class="alert alert-danger" role="alert">Gagal mengubah user</div>
                    <?php
                    }
                    $stmt3->close();
                }
                ?>


                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <button type="button" class="btn btn-info fas fa-plus float-right" data-toggle="modal" data-target="#plusModal"> Tambah User</button>
                        <i class="fas fa-table"></i>
                        Data Pengguna</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Mitra</th>
                                        <th>Username</th>
                                        <th>Privilege</th>
                                        <th>Mengisi?</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Mitra</th>
                                        <th>Username</th>
                                        <th>Privilege</th>
                                        <th>Mengisi?</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if ($result->num_rows > 0) {
                                        foreach ($result as $row) :
                                            $id = "" . $row["id"] . "";
                                            $username = "" . $row["username"] . "";
                                            $password = "" . $row["password"] . "";
                                            $waktu = "" . $row["created_at"] . "";
                                            if ("" . $row["name"] . "" == null) {
                                                $mitra = "-";
                                            } else {
                                                $mitra = "" . $row["name"] . "";
                                            }
                                            if ("" . $row["privilege"] . "" == 1) {
                                                $privilege = "Admin";
                                                $fill = "-";
                                            } elseif ("" . $row["privilege"] . "" == 2) {
                                                $privilege = "Mitra";
                                            }
                                            if ("" . $row["fill"] . "" == 0 && "" . $row["privilege"] . "" == 2) {
                                                $fill = "Belum";
                                            } elseif ("" . $row["fill"] . "" == 1 && "" . $row["privilege"] . "" == 2) {
                                                $fill = "Sudah";
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $mitra ?></td>
                                                <td><?php echo $username ?></td>
                                                <td><?php echo $privilege ?></td>
                                                <td><?php echo $fill ?></td>
                                                <td><button type="button" class="my-1 mr-1 btn btn-danger fas fa-trash-alt user-delete" data-toggle="modal" data-target="#buttonDelete" data-id="<?php echo $id ?>"></button>
                                                    <button type="button" class="my-1 btn btn-primary fas fa-arrow-circle-right user-detail" data-toggle="modal" data-target="#buttonDetail" data-id="<?php echo $id ?>" data-name="<?php echo $username ?>" data-password="<?php echo $password ?>" data-privilege="<?php echo $privilege ?>" data-fill="<?php echo $fill ?>" data-mitra="<?php echo $mitra ?>" data-waktu="<?php echo $waktu ?>">
                                                    </button></td>
                                            </tr>
                                        <?php endforeach;
                                    }
                                    $connection->close();
                                    ?>
                                </tbody>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus User?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Jika Anda menghapus user yang sudah mengisi survey, maka survey tersebut akan terhapus pula</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form class="" action="" method="post" novalidate>
                        <input id="user-id-2" name="keyToDelete" class="" type="hidden" name="id_product" value="">
                        <button class="btn user_delete btn-primary" name="user_delete" type="submit">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambah user Modal-->
    <div class="modal fade" id="plusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="" id="insert-user-form">
                        <div class="form-group">
                            <label for="inputName">Mitra</label>
                            <input name="mitra_input" type="text" class="form-control" id="inputName" placeholder="Nama perusahaan" required />
                        </div>
                        <div class="form-group">
                            <label for="inputEmail1">Username</label>
                            <input name="username_input" type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" placeholder="Username untuk masuk" required />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1">Password</label>
                            <div class="input-group">
                                <input name="password_input" type="password" class="form-control" id="myInput" placeholder="Password untuk masuk" required />
                                <button type="button" id="default" onclick="do_default()" class="btn btn-light border btn-sm">default</button>
                            </div>
                            <input class="mt-1" type="checkbox" onclick="myFunction()"> Show Password
                        </div>
                        <div class="form-group">
                            <label for="formControlSelect1">Privilege</label>
                            <select name="privilege_input" class="form-control" id="formControlSelect1">
                                <option value="2">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-primary" type="submit" name="user_tambah" value="Tambah" />
                        </div>
                    </form>
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
                            <input value="" readonly name="id_update" type="text" class="form-control-plaintext" id="user-id" aria-describedby="emailHelp" placeholder="-" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"><b>Mitra</b></label>
                            <input value="" name="name_update" type="text" class="form-control" id="user-mitra" aria-describedby="emailHelp" placeholder="-" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"><b>Username</b></label>
                            <input value="" name="username_update" type="text" class="form-control" id="user-name" aria-describedby="emailHelp" placeholder="-" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="inputEmail"><b>Password</b></label>
                            <input value="" readonly name="password" type="text" class="form-control-plaintext" id="user-password" aria-describedby="emailHelp" placeholder="-" required>
                        </div> -->
                        <div class="form-group">
                            <label for="inputEmail"><b>Dibuat Pada</b></label>
                            <input value="" readonly name="created_at" type="text" class="form-control-plaintext" id="user-waktu" aria-describedby="emailHelp" placeholder="-" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"><b>Privilege</b></label>
                            <input value="" readonly name="privilege" type="text" class="form-control-plaintext" id="user-privilege" aria-describedby="emailHelp" placeholder="-" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"><b>Mengisi?</b></label>
                            <input value="" readonly name="fill" type="text" class="form-control-plaintext" id="user-fill" aria-describedby="emailHelp" placeholder="-" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit" name="user_update">Update</button>
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

    <script src="js/user.js"></script>
    <script src="js/password.js"></script>


</body>

</html>