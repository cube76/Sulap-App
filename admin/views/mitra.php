<!DOCTYPE html>
<html lang="en">

<?php
include("session.php");
include("connection.php");
$query = "SELECT mitra.*, user.username, user.privilege, user.name FROM mitra
INNER JOIN user ON mitra.id_user = user.id "
    or die(mysqli_error($connection));
$result = $connection->query($query);
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Mitra</title>

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
            <li class="nav-item active">
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
                if (isset($_POST['mitra_delete'])) {
                    $key = $_POST['keyToDelete'];
                    $query = "DELETE FROM mitra WHERE id = ?";
                    $stmt = $connection->prepare($query);
                    $stmt->bind_param("s", $key);
                    $stmt->execute();

                    $keyUpdate = $_POST['keyToUpdate'];
                    $query = "UPDATE user SET fill = '0' WHERE id = ?";
                    $stmt2 = $connection->prepare($query);
                    $stmt2->bind_param("s", $keyUpdate);
                    $stmt2->execute();

                    if ($stmt->affected_rows && $stmt2->affected_rows) {
                        echo "Deleted " . $stmt->affected_rows . " rows";
                        ?>
                        <div class="alert alert-success" role="alert">Berhasil menghapus survey</div>
                        <?php
                        header("Location: mitra.php");
                    } else {
                        echo "No rows matched the criteria.";
                        ?>
                        <div class="alert alert-danger" role="alert">Gagal menghapus survey</div>
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
                    <li class="breadcrumb-item active">Mitra</li>
                </ol>

                <div class="row">
                    <div class="col-xs-9 col-md-7">
                        <!-- DataTables Example -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <button type="button" class="btn btn-info fas fa-info-circle float-right" data-toggle="modal" data-target="#infoModal"> IKM Info</button>
                                <i class="fas fa-table"></i>
                                Data Skor Survei</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="datamitra" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Mitra</th>
                                                <th>Skor Kepentingan</th>
                                                <th>Skor Kepuasan</th>
                                                <th>Dibuat Pada</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Mitra</th>
                                                <th>Skor Kepentingan</th>
                                                <th>Skor Kepuasan</th>
                                                <th>Dibuat Pada</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php if ($result->num_rows > 0) {
                                                $totalPuas = 0;
                                                $totalPenting = 0;
                                                $sangattidakpuas = 0;
                                                $tidakpuas = 0;
                                                $puas = 0;
                                                $sangatpuas = 0;
                                                $sangattidakpuas1 = 0;
                                                $tidakpuas1 = 0;
                                                $puas1P = 0;
                                                $sangatpuas1 = 0;
                                                $sangattidakpuas2 = 0;
                                                $tidakpuas2 = 0;
                                                $puas2P = 0;
                                                $sangatpuas2 = 0;
                                                $sangattidakpuas3 = 0;
                                                $tidakpuas3 = 0;
                                                $puas3P = 0;
                                                $sangatpuas3 = 0;
                                                $sangattidakpuas4 = 0;
                                                $tidakpuas4 = 0;
                                                $puas4P = 0;
                                                $sangatpuas4 = 0;
                                                $sangattidakpuas5 = 0;
                                                $tidakpuas5 = 0;
                                                $puas5P = 0;
                                                $sangatpuas5 = 0;
                                                $sangattidakpuas6 = 0;
                                                $tidakpuas6 = 0;
                                                $puas6P = 0;
                                                $sangatpuas6 = 0;
                                                $sangattidakpuas7 = 0;
                                                $tidakpuas7 = 0;
                                                $puas7P = 0;
                                                $sangatpuas7 = 0;
                                                $sangattidakpuas8 = 0;
                                                $tidakpuas8 = 0;
                                                $puas8P = 0;
                                                $sangatpuas8 = 0;
                                                $sangattidakpuas9 = 0;
                                                $tidakpuas9 = 0;
                                                $puas9P = 0;
                                                $sangatpuas9 = 0;
                                                $totalPuasD = 0;
                                                $totalPuasC = 0;
                                                $totalPuasB = 0;
                                                $totalPuasA = 0;
                                                $puas1A = 0;
                                                $puas1B = 0;
                                                $puas1C = 0;
                                                $puas1D = 0;
                                                $puas2A = 0;
                                                $puas2B = 0;
                                                $puas2C = 0;
                                                $puas2D = 0;
                                                $puas3A = 0;
                                                $puas3B = 0;
                                                $puas3C = 0;
                                                $puas3D = 0;
                                                $puas4A = 0;
                                                $puas4B = 0;
                                                $puas4C = 0;
                                                $puas4D = 0;
                                                $puas5A = 0;
                                                $puas5B = 0;
                                                $puas5C = 0;
                                                $puas5D = 0;
                                                $puas6A = 0;
                                                $puas6B = 0;
                                                $puas6C = 0;
                                                $puas6D = 0;
                                                $puas7A = 0;
                                                $puas7B = 0;
                                                $puas7C = 0;
                                                $puas7D = 0;
                                                $puas8A = 0;
                                                $puas8B = 0;
                                                $puas8C = 0;
                                                $puas8D = 0;
                                                $puas9A = 0;
                                                $puas9B = 0;
                                                $puas9C = 0;
                                                $puas9D = 0;
                                                $penting1A = 0;
                                                $penting1B = 0;
                                                $penting1C = 0;
                                                $penting1D = 0;
                                                $penting2A = 0;
                                                $penting2B = 0;
                                                $penting2C = 0;
                                                $penting2D = 0;
                                                $penting3A = 0;
                                                $penting3B = 0;
                                                $penting3C = 0;
                                                $penting3D = 0;
                                                $penting4A = 0;
                                                $penting4B = 0;
                                                $penting4C = 0;
                                                $penting4D = 0;
                                                $penting5A = 0;
                                                $penting5B = 0;
                                                $penting5C = 0;
                                                $penting5D = 0;
                                                $penting6A = 0;
                                                $penting6B = 0;
                                                $penting6C = 0;
                                                $penting6D = 0;
                                                $penting7A = 0;
                                                $penting7B = 0;
                                                $penting7C = 0;
                                                $penting7D = 0;
                                                $penting8A = 0;
                                                $penting8B = 0;
                                                $penting8C = 0;
                                                $penting8D = 0;
                                                $penting9A = 0;
                                                $penting9B = 0;
                                                $penting9C = 0;
                                                $penting9D = 0;
                                                $sangattidakpenting1 = 0;
                                                $tidakpenting1 = 0;
                                                $penting1P = 0;
                                                $sangatpenting1 = 0;
                                                $sangattidakpenting2 = 0;
                                                $tidakpenting2 = 0;
                                                $penting2P = 0;
                                                $sangatpenting2 = 0;
                                                $sangattidakpenting3 = 0;
                                                $tidakpenting3 = 0;
                                                $penting3P = 0;
                                                $sangatpenting3 = 0;
                                                $sangattidakpenting4 = 0;
                                                $tidakpenting4 = 0;
                                                $penting4P = 0;
                                                $sangatpenting4 = 0;
                                                $sangattidakpenting5 = 0;
                                                $tidakpenting5 = 0;
                                                $penting5P = 0;
                                                $sangatpenting5 = 0;
                                                $sangattidakpenting6 = 0;
                                                $tidakpenting6 = 0;
                                                $penting6P = 0;
                                                $sangatpenting6 = 0;
                                                $sangattidakpenting7 = 0;
                                                $tidakpenting7 = 0;
                                                $penting7P = 0;
                                                $sangatpenting7 = 0;
                                                $sangattidakpenting8 = 0;
                                                $tidakpenting8 = 0;
                                                $penting8P = 0;
                                                $sangatpenting8 = 0;
                                                $sangattidakpenting9 = 0;
                                                $tidakpenting9 = 0;
                                                $penting9P = 0;
                                                $sangatpenting9 = 0;
                                                $sangattidakpenting = 0;
                                                $tidakpenting = 0;
                                                $penting = 0;
                                                $sangatpenting = 0;
                                                $totalPentingD = 0;
                                                $totalPentingC = 0;
                                                $totalPentingB = 0;
                                                $totalPentingA = 0;
                                                $avgPuas = 0;
                                                $avgPenting = 0;
                                                $totalpuas1 = 0;
                                                $totalpuas2 = 0;
                                                $totalpuas3 = 0;
                                                $totalpuas4 = 0;
                                                $totalpuas5 = 0;
                                                $totalpuas6 = 0;
                                                $totalpuas7 = 0;
                                                $totalpuas8 = 0;
                                                $totalpuas9 = 0;
                                                $totalpenting1 = 0;
                                                $totalpenting2 = 0;
                                                $totalpenting3 = 0;
                                                $totalpenting4 = 0;
                                                $totalpenting5 = 0;
                                                $totalpenting6 = 0;
                                                $totalpenting7 = 0;
                                                $totalpenting8 = 0;
                                                $totalpenting9 = 0;
                                                $i = 0; //total user
                                                while ($row = $result->fetch_assoc()) {
                                                    $id = "" . $row["id"] . "";
                                                    $id_user = "" . $row["id_user"] . "";
                                                    $waktu = "" . $row["created_at"] . "";
                                                    $username = "" . $row["username"] . "";
                                                    $privilege = "" . $row["privilege"] . "";
                                                    if ("" . $row["name"] . "" == null) {
                                                        $mitra = "-";
                                                    } else {
                                                        $mitra = "" . $row["name"] . "";
                                                    }
                                                    $puas1 = "" . $row["puas_1"] . "";
                                                    $puas2 = "" . $row["puas_2"] . "";
                                                    $puas3 = "" . $row["puas_3"] . "";
                                                    $puas4 = "" . $row["puas_4"] . "";
                                                    $puas5 = "" . $row["puas_5"] . "";
                                                    $puas6 = "" . $row["puas_6"] . "";
                                                    $puas7 = "" . $row["puas_7"] . "";
                                                    $puas8 = "" . $row["puas_8"] . "";
                                                    $puas9 = "" . $row["puas_9"] . "";
                                                    $total_puas = "" . $row["total_puas"] . "";
                                                    $penting1 = "" . $row["penting_1"] . "";
                                                    $penting2 = "" . $row["penting_2"] . "";
                                                    $penting3 = "" . $row["penting_3"] . "";
                                                    $penting4 = "" . $row["penting_4"] . "";
                                                    $penting5 = "" . $row["penting_5"] . "";
                                                    $penting6 = "" . $row["penting_6"] . "";
                                                    $penting7 = "" . $row["penting_7"] . "";
                                                    $penting8 = "" . $row["penting_8"] . "";
                                                    $penting9 = "" . $row["penting_9"] . "";
                                                    $total_penting = "" . $row["total_penting"] . "";

                                                    if ($privilege == 2) :
                                                        $totalPuas += $total_puas;
                                                        $totalPenting += $total_penting;
                                                        $i++;
                                                        ?>
                                                        <tr>
                                                            <td></td>
                                                            <td><?php echo $mitra ?></td>
                                                            <td><?php echo $total_penting ?></td>
                                                            <td><?php echo $total_puas ?></td>
                                                            <td><?php echo $waktu ?></td>
                                                            <td>
                                                                <input type="hidden" class="avg" data-totalpuas="<?php $total_puas ?>" data-totalpenting="<?php $total_penting ?>">
                                                                <button type="button" class="my-1 mr-1 btn btn-danger fas fa-trash-alt mitra-delete" data-toggle="modal" data-target="#buttonDelete" data-id="<?php echo $id ?>" data-user="<?php echo $id_user ?>"></button>
                                                                <button type="button" class="my-1 btn btn-primary fas fa-arrow-circle-right mitra-detail" data-toggle="modal" data-target="#buttonDetail" data-mitra="<?php echo $mitra ?>" data-nama="<?php echo $username ?>" data-waktu="<?php echo $waktu ?>" data-id="<?php echo $id ?>" data-puas1="<?php echo $puas1 ?>" data-puas2="<?php echo $puas2 ?>" data-puas3="<?php echo $puas3 ?>" data-puas4="<?php echo $puas4 ?>" data-puas5="<?php echo $puas5 ?>" data-puas6="<?php echo $puas6 ?>" data-puas7="<?php echo $puas7 ?>" data-puas8="<?php echo $puas8 ?>" data-puas9="<?php echo $puas9 ?>" data-totalPuas="<?php echo $total_puas ?>" data-penting1="<?php echo $penting1 ?>" data-penting2="<?php echo $penting2 ?>" data-penting3="<?php echo $penting3 ?>" data-penting4="<?php echo $penting4 ?>" data-penting5="<?php echo $penting5 ?>" data-penting6="<?php echo $penting6 ?>" data-penting7="<?php echo $penting7 ?>" data-penting8="<?php echo $penting8 ?>" data-penting9="<?php echo $penting9 ?>" data-totalPenting="<?php echo $total_penting ?>">
                                                                </button></td>
                                                        </tr>
                                                        <?php
                                                        if ($total_puas <= 43.75) {
                                                            $totalPuasD += $total_puas;
                                                            $sangattidakpuas++;
                                                        } else if ($total_puas >= 43.76 && $total_puas <= 62.50) {
                                                            $totalPuasC += $total_puas;
                                                            $tidakpuas++;
                                                        } else if ($total_puas >= 62.51 && $total_puas <= 81.25) {
                                                            $totalPuasB += $total_puas;
                                                            $puas++;
                                                        } else if ($total_puas >= 81.26) {
                                                            $totalPuasA += $total_puas;
                                                            $sangatpuas++;
                                                        }
                                                        if ($total_penting <= 43.75) {
                                                            $totalPentingD += $total_penting;
                                                            $sangattidakpenting++;
                                                        } else if ($total_penting >= 43.76 && $total_penting <= 62.50) {
                                                            $totalPentingC += $total_penting;
                                                            $tidakpenting++;
                                                        } else if ($total_penting >= 62.51 && $total_penting <= 81.25) {
                                                            $totalPentingB += $total_penting;
                                                            $penting++;
                                                        } else if ($total_penting >= 81.26) {
                                                            $totalPentingA += $total_penting;
                                                            $sangatpenting++;
                                                        }

                                                        if ($puas1 <= 43.75) {
                                                            $puas1D += $puas1;
                                                            $sangattidakpuas1++;
                                                        } else if ($puas1 >= 43.76 && $puas1 <= 62.50) {
                                                            $puas1C += $puas1;
                                                            $tidakpuas1++;
                                                        } else if ($puas1 >= 62.51 && $puas1 <= 81.25) {
                                                            $puas1B += $puas1;
                                                            $puas1P++;
                                                        } else if ($puas1 >= 81.26) {
                                                            $puas1A += $puas1;
                                                            $sangatpuas1++;
                                                        }
                                                        if ($puas2 <= 43.75) {
                                                            $puas2D += $puas2;
                                                            $sangattidakpuas2++;
                                                        } else if ($puas2 >= 43.76 && $puas2 <= 62.50) {
                                                            $puas2C += $puas2;
                                                            $tidakpuas2++;
                                                        } else if ($puas2 >= 62.51 && $puas2 <= 81.25) {
                                                            $puas2B += $puas2;
                                                            $puas2P++;
                                                        } else if ($puas2 >= 81.26) {
                                                            $puas2A += $puas2;
                                                            $sangatpuas2++;
                                                        }
                                                        if ($puas3 <= 43.75) {
                                                            $puas3D += $puas3;
                                                            $sangattidakpuas3++;
                                                        } else if ($puas3 >= 43.76 && $puas3 <= 62.50) {
                                                            $puas3C += $puas3;
                                                            $tidakpuas3++;
                                                        } else if ($puas3 >= 62.51 && $puas3 <= 81.25) {
                                                            $puas3B += $puas3;
                                                            $puas3P++;
                                                        } else if ($puas3 >= 81.26) {
                                                            $puas3A += $puas3;
                                                            $sangatpuas3++;
                                                        }
                                                        if ($puas4 <= 43.75) {
                                                            $puas4D += $puas4;
                                                            $sangattidakpuas2++;
                                                        } else if ($puas4 >= 43.76 && $puas4 <= 62.50) {
                                                            $puas4C += $puas4;
                                                            $tidakpuas4++;
                                                        } else if ($puas4 >= 62.51 && $puas4 <= 81.25) {
                                                            $puas4B += $puas4;
                                                            $puas4P++;
                                                        } else if ($puas4 >= 81.26) {
                                                            $puas4A += $puas4;
                                                            $sangatpuas4++;
                                                        }
                                                        if ($puas5 <= 43.75) {
                                                            $puas5D += $puas5;
                                                            $sangattidakpuas5++;
                                                        } else if ($puas5 >= 43.76 && $puas5 <= 62.50) {
                                                            $puas5C += $puas5;
                                                            $tidakpuas5++;
                                                        } else if ($puas5 >= 62.51 && $puas5 <= 81.25) {
                                                            $puas5B += $puas5;
                                                            $puas5P++;
                                                        } else if ($puas5 >= 81.26) {
                                                            $puas5A += $puas5;
                                                            $sangatpuas5++;
                                                        }
                                                        if ($puas6 <= 43.75) {
                                                            $puas6D += $puas6;
                                                            $sangattidakpuas6++;
                                                        } else if ($puas6 >= 43.76 && $puas6 <= 62.50) {
                                                            $puas6C += $puas6;
                                                            $tidakpuas6++;
                                                        } else if ($puas6 >= 62.51 && $puas6 <= 81.25) {
                                                            $puas6B += $puas6;
                                                            $puas6P++;
                                                        } else if ($puas6 >= 81.26) {
                                                            $puas6A += $puas6;
                                                            $sangatpuas6++;
                                                        }
                                                        if ($puas7 <= 43.75) {
                                                            $puas7D += $puas7;
                                                            $sangattidakpuas7++;
                                                        } else if ($puas7 >= 43.76 && $puas7 <= 62.50) {
                                                            $puas7C += $puas7;
                                                            $tidakpuas7++;
                                                        } else if ($puas7 >= 62.51 && $puas7 <= 81.25) {
                                                            $puas7B += $puas7;
                                                            $puas7P++;
                                                        } else if ($puas7 >= 81.26) {
                                                            $puas7A += $puas7;
                                                            $sangatpuas7++;
                                                        }
                                                        if ($puas8 <= 43.75) {
                                                            $puas8D += $puas8;
                                                            $sangattidakpuas8++;
                                                        } else if ($puas8 >= 43.76 && $puas8 <= 62.50) {
                                                            $puas8C += $puas8;
                                                            $tidakpuas8++;
                                                        } else if ($puas8 >= 62.51 && $puas8 <= 81.25) {
                                                            $puas8B += $puas8;
                                                            $puas8P++;
                                                        } else if ($puas8 >= 81.26) {
                                                            $puas8A += $puas8;
                                                            $sangatpuas8++;
                                                        }
                                                        if ($puas9 <= 43.75) {
                                                            $puas9D += $puas9;
                                                            $sangattidakpuas9++;
                                                        } else if ($puas9 >= 43.76 && $puas9 <= 62.50) {
                                                            $puas9C += $puas9;
                                                            $tidakpuas9++;
                                                        } else if ($puas9 >= 62.51 && $puas9 <= 81.25) {
                                                            $puas9B += $puas9;
                                                            $puas9P++;
                                                        } else if ($puas9 >= 81.26) {
                                                            $puas9A += $puas9;
                                                            $sangatpuas9++;
                                                        }

                                                        if ($penting1 <= 43.75) {
                                                            $penting1D += $penting1;
                                                            $sangattidakpenting1++;
                                                        } else if ($penting1 >= 43.76 && $penting1 <= 62.50) {
                                                            $penting1C += $penting1;
                                                            $tidakpuas1++;
                                                        } else if ($penting1 >= 62.51 && $penting1 <= 81.25) {
                                                            $penting1B += $penting1;
                                                            $penting1P++;
                                                        } else if ($penting1 >= 81.26) {
                                                            $penting1A += $penting1;
                                                            $sangatpenting1++;
                                                        }

                                                        if ($penting2 <= 43.75) {
                                                            $penting2D += $penting2;
                                                            $sangattidakpenting2++;
                                                        } else if ($penting2 >= 43.76 && $penting2 <= 62.50) {
                                                            $penting2C += $penting2;
                                                            $tidakpenting2++;
                                                        } else if ($penting2 >= 62.51 && $penting2 <= 81.25) {
                                                            $penting2B += $penting2;
                                                            $penting2P++;
                                                        } else if ($penting2 >= 81.26) {
                                                            $penting2A += $penting2;
                                                            $sangatpenting2++;
                                                        }

                                                        if ($penting3 <= 43.75) {
                                                            $penting3D += $penting3;
                                                            $sangattidakpenting3++;
                                                        } else if ($penting3 >= 43.76 && $penting3 <= 62.50) {
                                                            $penting3C += $penting3;
                                                            $tidakpenting3++;
                                                        } else if ($penting3 >= 62.51 && $penting3 <= 81.25) {
                                                            $penting3B += $penting3;
                                                            $penting3P++;
                                                        } else if ($penting3 >= 81.26) {
                                                            $penting3A += $penting3;
                                                            $sangatpenting3++;
                                                        }

                                                        if ($penting4 <= 43.75) {
                                                            $penting4D += $penting4;
                                                            $sangattidakpenting4++;
                                                        } else if ($penting4 >= 43.76 && $penting4 <= 62.50) {
                                                            $penting4C += $penting4;
                                                            $tidakpenting4++;
                                                        } else if ($penting4 >= 62.51 && $penting4 <= 81.25) {
                                                            $penting4B += $penting4;
                                                            $penting4P++;
                                                        } else if ($penting4 >= 81.26) {
                                                            $penting4A += $penting4;
                                                            $sangatpenting4++;
                                                        }

                                                        if ($penting5 <= 43.75) {
                                                            $penting5D += $penting5;
                                                            $sangattidakpenting5++;
                                                        } else if ($penting5 >= 43.76 && $penting5 <= 62.50) {
                                                            $penting5C += $penting5;
                                                            $tidakpenting5++;
                                                        } else if ($penting5 >= 62.51 && $penting5 <= 81.25) {
                                                            $penting5B += $penting5;
                                                            $penting5P++;
                                                        } else if ($penting5 >= 81.26) {
                                                            $penting5A += $penting5;
                                                            $sangatpenting5++;
                                                        }

                                                        if ($penting6 <= 43.75) {
                                                            $penting6D += $penting6;
                                                            $sangattidakpenting6++;
                                                        } else if ($penting6 >= 43.76 && $penting6 <= 62.50) {
                                                            $penting6C += $penting6;
                                                            $tidakpenting6++;
                                                        } else if ($penting6 >= 62.51 && $penting6 <= 81.25) {
                                                            $penting6B += $penting6;
                                                            $penting6P++;
                                                        } else if ($penting6 >= 81.26) {
                                                            $penting6A += $penting6;
                                                            $sangatpenting6++;
                                                        }

                                                        if ($penting7 <= 43.75) {
                                                            $penting7D += $penting7;
                                                            $sangattidakpenting7++;
                                                        } else if ($penting7 >= 43.76 && $penting7 <= 62.50) {
                                                            $penting7C += $penting7;
                                                            $tidakpenting7++;
                                                        } else if ($penting7 >= 62.51 && $penting7 <= 81.25) {
                                                            $penting7B += $penting7;
                                                            $penting7P++;
                                                        } else if ($penting7 >= 81.26) {
                                                            $penting7A += $penting7;
                                                            $sangatpenting7++;
                                                        }

                                                        if ($penting8 <= 43.75) {
                                                            $penting8D += $penting8;
                                                            $sangattidakpenting8++;
                                                        } else if ($penting8 >= 43.76 && $penting8 <= 62.50) {
                                                            $penting8C += $penting8;
                                                            $tidakpenting8++;
                                                        } else if ($penting8 >= 62.51 && $penting8 <= 81.25) {
                                                            $penting8B += $penting8;
                                                            $penting8P++;
                                                        } else if ($penting8 >= 81.26) {
                                                            $penting8A += $penting8;
                                                            $sangatpenting8++;
                                                        }

                                                        if ($penting9 <= 43.75) {
                                                            $penting9D += $penting9;
                                                            $sangattidakpenting9++;
                                                        } else if ($penting9 >= 43.76 && $penting9 <= 62.50) {
                                                            $penting9C += $penting9;
                                                            $tidakpenting9++;
                                                        } else if ($penting9 >= 62.51 && $penting9 <= 81.25) {
                                                            $penting9B += $penting9;
                                                            $penting9P++;
                                                        } else if ($penting9 >= 81.26) {
                                                            $penting9A += $penting9;
                                                            $sangatpenting9++;
                                                        }
                                                        $totalpenting1 += $penting1;
                                                        $totalpenting2 += $penting2;
                                                        $totalpenting3 += $penting3;
                                                        $totalpenting4 += $penting4;
                                                        $totalpenting5 += $penting5;
                                                        $totalpenting6 += $penting6;
                                                        $totalpenting7 += $penting7;
                                                        $totalpenting8 += $penting8;
                                                        $totalpenting9 += $penting9;
                                                        $totalpuas1 += $puas1;
                                                        $totalpuas2 += $puas2;
                                                        $totalpuas3 += $puas3;
                                                        $totalpuas4 += $puas4;
                                                        $totalpuas5 += $puas5;
                                                        $totalpuas6 += $puas6;
                                                        $totalpuas7 += $puas7;
                                                        $totalpuas8 += $puas8;
                                                        $totalpuas9 += $puas9;
                                                    endif;
                                                }

                                                //Perhitungan CSI (custemer satisfaction Index)
                                                //MIS
                                                $mispenting1 = $totalpenting1 / $i;
                                                $mispenting2 = $totalpenting2 / $i;
                                                $mispenting3 = $totalpenting3 / $i;
                                                $mispenting4 = $totalpenting4 / $i;
                                                $mispenting5 = $totalpenting5 / $i;
                                                $mispenting6 = $totalpenting6 / $i;
                                                $mispenting7 = $totalpenting7 / $i;
                                                $mispenting8 = $totalpenting8 / $i;
                                                $mispenting9 = $totalpenting9 / $i;
                                                //total mis
                                                $totalmis = $mispenting1 + $mispenting2 + $mispenting3 + $mispenting4 + $mispenting5 + $mispenting6 + $mispenting7 + $mispenting8 + $mispenting9;

                                                //WF (weight factor)
                                                $wf1 = $mispenting1 / $totalmis * 100;
                                                $wf2 = $mispenting2 / $totalmis * 100;
                                                $wf3 = $mispenting3 / $totalmis * 100;
                                                $wf4 = $mispenting4 / $totalmis * 100;
                                                $wf5 = $mispenting5 / $totalmis * 100;
                                                $wf6 = $mispenting6 / $totalmis * 100;
                                                $wf7 = $mispenting7 / $totalmis * 100;
                                                $wf8 = $mispenting8 / $totalmis * 100;
                                                $wf9 = $mispenting9 / $totalmis * 100;

                                                //MSS
                                                $msspuas1 = $totalpuas1 / $i;
                                                $msspuas2 = $totalpuas2 / $i;
                                                $msspuas3 = $totalpuas3 / $i;
                                                $msspuas4 = $totalpuas4 / $i;
                                                $msspuas5 = $totalpuas5 / $i;
                                                $msspuas6 = $totalpuas6 / $i;
                                                $msspuas7 = $totalpuas7 / $i;
                                                $msspuas8 = $totalpuas8 / $i;
                                                $msspuas9 = $totalpuas9 / $i;

                                                //WS (weight score)
                                                $ws1 = $wf1 * $msspuas1;
                                                $ws2 = $wf2 * $msspuas2;
                                                $ws3 = $wf3 * $msspuas3;
                                                $ws4 = $wf4 * $msspuas4;
                                                $ws5 = $wf5 * $msspuas5;
                                                $ws6 = $wf6 * $msspuas6;
                                                $ws7 = $wf7 * $msspuas7;
                                                $ws8 = $wf8 * $msspuas8;
                                                $ws9 = $wf9 * $msspuas9;

                                                //WT (weight total)
                                                $wt = $ws1 + $ws2 + $ws3 + $ws4 + $ws5 + $ws6 + $ws7 + $ws8 + $ws9;

                                                //CSI
                                                $csi = $wt / 4;
                                                //konversi ke 25-100
                                                $csiKon = $csi / 25;

                                                if ($csiKon <= 43.75) {
                                                    $kebaikan = "Tidak Baik";
                                                } else if ($csiKon >= 43.76 && $csiKon <= 62.50) {
                                                    $kebaikan = "Kurang Baik";
                                                } else if ($csiKon >= 62.51 && $csiKon <= 81.25) {
                                                    $kebaikan = "Baik";
                                                } else if ($csiKon >= 81.26) {
                                                    $kebaikan = "Sangat Baik";
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

                                                if ($sangattidakpuas1 > 0) {
                                                    $avgPuas1D = $sangattidakpuas1 / $i * 100;
                                                } else $avgPuas1D = 0;
                                                if ($tidakpuas1 > 0) {
                                                    $avgPuas1C = $tidakpuas1 / $i * 100;
                                                } else $avgPuas1C = 0;
                                                if ($puas1P > 0) {
                                                    $avgPuas1B = $puas1P / $i * 100;
                                                } else $avgPuas1B = 0;
                                                if ($sangatpuas1 > 0) {
                                                    $avgPuas1A = $sangatpuas1 / $i * 100;
                                                } else $avgPuas1A = 0;

                                                if ($sangattidakpuas2 > 0) {
                                                    $avgPuas2D = $sangattidakpuas2 / $i * 100;
                                                } else $avgPuas2D = 0;
                                                if ($tidakpuas2 > 0) {
                                                    $avgPuas2C = $tidakpuas2 / $i * 100;
                                                } else $avgPuas2C = 0;
                                                if ($puas2P > 0) {
                                                    $avgPuas2B = $puas2P / $i * 100;
                                                } else $avgPuas2B = 0;
                                                if ($sangatpuas2 > 0) {
                                                    $avgPuas2A = $sangatpuas2 / $i * 100;
                                                } else $avgPuas2A = 0;

                                                if ($sangattidakpuas3 > 0) {
                                                    $avgPuas3D = $sangattidakpuas3 / $i * 100;
                                                } else $avgPuas3D = 0;
                                                if ($tidakpuas3 > 0) {
                                                    $avgPuas3C = $tidakpuas3 / $i * 100;
                                                } else $avgPuas3C = 0;
                                                if ($puas3P > 0) {
                                                    $avgPuas3B = $puas3P / $i * 100;
                                                } else $avgPuas3B = 0;
                                                if ($sangatpuas3 > 0) {
                                                    $avgPuas3A = $sangatpuas3 / $i * 100;
                                                } else $avgPuas3A = 0;

                                                if ($sangattidakpuas4 > 0) {
                                                    $avgPuas4D = $sangattidakpuas4 / $i * 100;
                                                } else $avgPuas4D = 0;
                                                if ($tidakpuas4 > 0) {
                                                    $avgPuas4C = $tidakpuas4 / $i * 100;
                                                } else $avgPuas4C = 0;
                                                if ($puas4P > 0) {
                                                    $avgPuas4B = $puas4P / $i * 100;
                                                } else $avgPuas4B = 0;
                                                if ($sangatpuas4 > 0) {
                                                    $avgPuas4A = $sangatpuas4 / $i * 100;
                                                } else $avgPuas4A = 0;

                                                if ($sangattidakpuas5 > 0) {
                                                    $avgPuas5D = $sangattidakpuas5 / $i * 100;
                                                } else $avgPuas5D = 0;
                                                if ($tidakpuas5 > 0) {
                                                    $avgPuas5C = $tidakpuas5 / $i * 100;
                                                } else $avgPuas5C = 0;
                                                if ($puas5P > 0) {
                                                    $avgPuas5B = $puas5P / $i * 100;
                                                } else $avgPuas5B = 0;
                                                if ($sangatpuas5 > 0) {
                                                    $avgPuas5A = $sangatpuas5 / $i * 100;
                                                } else $avgPuas5A = 0;

                                                if ($sangattidakpuas6 > 0) {
                                                    $avgPuas6D = $sangattidakpuas6 / $i * 100;
                                                } else $avgPuas6D = 0;
                                                if ($tidakpuas6 > 0) {
                                                    $avgPuas6C = $tidakpuas6 / $i * 100;
                                                } else $avgPuas6C = 0;
                                                if ($puas6P > 0) {
                                                    $avgPuas6B = $puas6P / $i * 100;
                                                } else $avgPuas6B = 0;
                                                if ($sangatpuas6 > 0) {
                                                    $avgPuas6A = $sangatpuas6 / $i * 100;
                                                } else $avgPuas6A = 0;

                                                if ($sangattidakpuas7 > 0) {
                                                    $avgPuas7D = $sangattidakpuas7 / $i * 100;
                                                } else $avgPuas7D = 0;
                                                if ($tidakpuas7 > 0) {
                                                    $avgPuas7C = $tidakpuas7 / $i * 100;
                                                } else $avgPuas7C = 0;
                                                if ($puas7P > 0) {
                                                    $avgPuas7B = $puas7P / $i * 100;
                                                } else $avgPuas7B = 0;
                                                if ($sangatpuas7 > 0) {
                                                    $avgPuas7A = $sangatpuas7 / $i * 100;
                                                } else $avgPuas7A = 0;

                                                if ($sangattidakpuas8 > 0) {
                                                    $avgPuas8D = $sangattidakpuas8 / $i * 100;
                                                } else $avgPuas8D = 0;
                                                if ($tidakpuas8 > 0) {
                                                    $avgPuas8C = $tidakpuas8 / $i * 100;
                                                } else $avgPuas8C = 0;
                                                if ($puas8P > 0) {
                                                    $avgPuas8B = $puas8P / $i * 100;
                                                } else $avgPuas8B = 0;
                                                if ($sangatpuas8 > 0) {
                                                    $avgPuas8A = $sangatpuas8 / $i * 100;
                                                } else $avgPuas8A = 0;

                                                if ($sangattidakpuas9 > 0) {
                                                    $avgPuas9D = $sangattidakpuas9 / $i * 100;
                                                } else $avgPuas9D = 0;
                                                if ($tidakpuas9 > 0) {
                                                    $avgPuas9C = $tidakpuas9 / $i * 100;
                                                } else $avgPuas9C = 0;
                                                if ($puas9P > 0) {
                                                    $avgPuas9B = $puas9P / $i * 100;
                                                } else $avgPuas9B = 0;
                                                if ($sangatpuas9 > 0) {
                                                    $avgPuas9A = $sangatpuas9 / $i * 100;
                                                } else $avgPuas9A = 0;

                                                if ($sangattidakpenting1 > 0) {
                                                    $avgPenting1D = $sangattidakpenting1 / $i * 100;
                                                } else $avgPenting1D = 0;
                                                if ($tidakpenting1 > 0) {
                                                    $avgPenting1C = $tidakpenting1 / $i * 100;
                                                } else $avgPenting1C = 0;
                                                if ($penting1P > 0) {
                                                    $avgPenting1B = $penting1P / $i * 100;
                                                } else $avgPenting1B = 0;
                                                if ($sangatpenting1 > 0) {
                                                    $avgPenting1A = $sangatpenting1 / $i * 100;
                                                } else $avgPenting1A = 0;

                                                if ($sangattidakpenting2 > 0) {
                                                    $avgPenting2D = $sangattidakpenting2 / $i * 100;
                                                } else $avgPenting2D = 0;
                                                if ($tidakpenting2 > 0) {
                                                    $avgPenting2C = $tidakpenting2 / $i * 100;
                                                } else $avgPenting2C = 0;
                                                if ($penting2P > 0) {
                                                    $avgPenting2B = $penting2P / $i * 100;
                                                } else $avgPenting2B = 0;
                                                if ($sangatpenting2 > 0) {
                                                    $avgPenting2A = $sangatpenting2 / $i * 100;
                                                } else $avgPenting2A = 0;

                                                if ($sangattidakpenting3 > 0) {
                                                    $avgPenting3D = $sangattidakpenting3 / $i * 100;
                                                } else $avgPenting3D = 0;
                                                if ($tidakpenting3 > 0) {
                                                    $avgPenting3C = $tidakpenting3 / $i * 100;
                                                } else $avgPenting3C = 0;
                                                if ($penting3P > 0) {
                                                    $avgPenting3B = $penting3P / $i * 100;
                                                } else $avgPenting3B = 0;
                                                if ($sangatpenting3 > 0) {
                                                    $avgPenting3A = $sangatpenting3 / $i * 100;
                                                } else $avgPenting3A = 0;

                                                if ($sangattidakpenting4 > 0) {
                                                    $avgPenting4D = $sangattidakpenting4 / $i * 100;
                                                } else $avgPenting4D = 0;
                                                if ($tidakpenting4 > 0) {
                                                    $avgPenting4C = $tidakpenting4 / $i * 100;
                                                } else $avgPenting4C = 0;
                                                if ($penting4P > 0) {
                                                    $avgPenting4B = $penting4P / $i * 100;
                                                } else $avgPenting4B = 0;
                                                if ($sangatpenting4 > 0) {
                                                    $avgPenting4A = $sangatpenting4 / $i * 100;
                                                } else $avgPenting4A = 0;

                                                if ($sangattidakpenting5 > 0) {
                                                    $avgPenting5D = $sangattidakpenting5 / $i * 100;
                                                } else $avgPenting5D = 0;
                                                if ($tidakpenting5 > 0) {
                                                    $avgPenting5C = $tidakpenting5 / $i * 100;
                                                } else $avgPenting5C = 0;
                                                if ($penting5P > 0) {
                                                    $avgPenting5B = $penting5P / $i * 100;
                                                } else $avgPenting5B = 0;
                                                if ($sangatpenting5 > 0) {
                                                    $avgPenting5A = $sangatpenting5 / $i * 100;
                                                } else $avgPenting5A = 0;

                                                if ($sangattidakpenting6 > 0) {
                                                    $avgPenting6D = $sangattidakpenting6 / $i * 100;
                                                } else $avgPenting6D = 0;
                                                if ($tidakpenting6 > 0) {
                                                    $avgPenting6C = $tidakpenting6 / $i * 100;
                                                } else $avgPenting6C = 0;
                                                if ($penting6P > 0) {
                                                    $avgPenting6B = $penting6P / $i * 100;
                                                } else $avgPenting6B = 0;
                                                if ($sangatpenting6 > 0) {
                                                    $avgPenting6A = $sangatpenting6 / $i * 100;
                                                } else $avgPenting6A = 0;

                                                if ($sangattidakpenting7 > 0) {
                                                    $avgPenting7D = $sangattidakpenting7 / $i * 100;
                                                } else $avgPenting7D = 0;
                                                if ($tidakpenting7 > 0) {
                                                    $avgPenting7C = $tidakpenting7 / $i * 100;
                                                } else $avgPenting7C = 0;
                                                if ($penting7P > 0) {
                                                    $avgPenting7B = $penting7P / $i * 100;
                                                } else $avgPenting7B = 0;
                                                if ($sangatpenting7 > 0) {
                                                    $avgPenting7A = $sangatpenting7 / $i * 100;
                                                } else $avgPenting7A = 0;

                                                if ($sangattidakpenting8 > 0) {
                                                    $avgPenting8D = $sangattidakpenting8 / $i * 100;
                                                } else $avgPenting8D = 0;
                                                if ($tidakpenting8 > 0) {
                                                    $avgPenting8C = $tidakpenting8 / $i * 100;
                                                } else $avgPenting8C = 0;
                                                if ($penting8P > 0) {
                                                    $avgPenting8B = $penting8P / $i * 100;
                                                } else $avgPenting8B = 0;
                                                if ($sangatpenting8 > 0) {
                                                    $avgPenting8A = $sangatpenting8 / $i * 100;
                                                } else $avgPenting8A = 0;

                                                if ($sangattidakpenting9 > 0) {
                                                    $avgPenting9D = $sangattidakpenting9 / $i * 100;
                                                } else $avgPenting9D = 0;
                                                if ($tidakpenting9 > 0) {
                                                    $avgPenting9C = $tidakpenting9 / $i * 100;
                                                } else $avgPenting9C = 0;
                                                if ($penting9P > 0) {
                                                    $avgPenting9B = $penting9P / $i * 100;
                                                } else $avgPenting9B = 0;
                                                if ($sangatpenting9 > 0) {
                                                    $avgPenting9A = $sangatpenting9 / $i * 100;
                                                } else $avgPenting9A = 0;

                                                $avgPuas = $totalPuas / $i;
                                                $avgPenting = $totalPenting / $i;
                                            }
                                            $connection->close();
                                            ?>
                                            <input type="hidden" class="avg" data-avgpuas="<?php echo $avgPuas ?>" data-avgpenting="<?php echo $avgPenting ?>" data-puasd="<?php echo number_format($avgPuasD, 2, '.', '') ?>" data-puasc="<?php echo number_format($avgPuasC, 2, '.', '') ?>" data-puasb="<?php echo number_format($avgPuasB, 2, '.', '') ?>" data-puasa="<?php echo number_format($avgPuasA, 2, '.', '') ?>" data-pentingd="<?php echo number_format($avgPentingD, 2, '.', '') ?>" data-pentingc="<?php echo number_format($avgPentingC, 2, '.', '') ?>" data-pentingb="<?php echo number_format($avgPentingB, 2, '.', '') ?>" data-pentinga="<?php echo number_format($avgPentingA, 2, '.', '') ?>" data-puassatud="<?php echo number_format($avgPuas1D, 2, '.', '') ?>" data-puassatuc="<?php echo number_format($avgPuas1C, 2, '.', '') ?>" data-puassatub="<?php echo number_format($avgPuas1B, 2, '.', '') ?>" data-puassatua="<?php echo number_format($avgPuas1A, 2, '.', '') ?>" data-puas2d="<?php echo number_format($avgPuas2D, 2, '.', '') ?>" data-puas2c="<?php echo number_format($avgPuas2C, 2, '.', '') ?>" data-puas2b="<?php echo number_format($avgPuas2B, 2, '.', '') ?>" data-puas2a="<?php echo number_format($avgPuas2A, 2, '.', '') ?>" data-puas3d="<?php echo number_format($avgPuas3D, 2, '.', '') ?>" data-puas3c="<?php echo number_format($avgPuas3C, 2, '.', '') ?>" data-puas3b="<?php echo number_format($avgPuas3B, 2, '.', '') ?>" data-puas3a="<?php echo number_format($avgPuas3A, 2, '.', '') ?>" data-puas4d="<?php echo number_format($avgPuas4D, 2, '.', '') ?>" data-puas4c="<?php echo number_format($avgPuas4C, 2, '.', '') ?>" data-puas4b="<?php echo number_format($avgPuas4B, 2, '.', '') ?>" data-puas4a="<?php echo number_format($avgPuas4A, 2, '.', '') ?>" data-puas5d="<?php echo number_format($avgPuas5D, 2, '.', '') ?>" data-puas5c="<?php echo number_format($avgPuas5C, 2, '.', '') ?>" data-puas5b="<?php echo number_format($avgPuas5B, 2, '.', '') ?>" data-puas5a="<?php echo number_format($avgPuas5A, 2, '.', '') ?>" data-puas6d="<?php echo number_format($avgPuas6D, 2, '.', '') ?>" data-puas6c="<?php echo number_format($avgPuas6C, 2, '.', '') ?>" data-puas6b="<?php echo number_format($avgPuas6B, 2, '.', '') ?>" data-puas6a="<?php echo number_format($avgPuas6A, 2, '.', '') ?>" data-puas7d="<?php echo number_format($avgPuas7D, 2, '.', '') ?>" data-puas7c="<?php echo number_format($avgPuas7C, 2, '.', '') ?>" data-puas7b="<?php echo number_format($avgPuas7B, 2, '.', '') ?>" data-puas7a="<?php echo number_format($avgPuas7A, 2, '.', '') ?>" data-puas8d="<?php echo number_format($avgPuas8D, 2, '.', '') ?>" data-puas8c="<?php echo number_format($avgPuas8C, 2, '.', '') ?>" data-puas8b="<?php echo number_format($avgPuas8B, 2, '.', '') ?>" data-puas8a="<?php echo number_format($avgPuas8A, 2, '.', '') ?>" data-puas9d="<?php echo number_format($avgPuas9D, 2, '.', '') ?>" data-puas9c="<?php echo number_format($avgPuas9C, 2, '.', '') ?>" data-puas9b="<?php echo number_format($avgPuas9B, 2, '.', '') ?>" data-puas9a="<?php echo number_format($avgPuas9A, 2, '.', '') ?>" data-penting1d="<?php echo number_format($avgPenting1D, 2, '.', '') ?>" data-penting1c="<?php echo number_format($avgPenting1C, 2, '.', '') ?>" data-penting1b="<?php echo number_format($avgPenting1B, 2, '.', '') ?>" data-penting1a="<?php echo number_format($avgPenting1A, 2, '.', '') ?>" data-penting2d="<?php echo number_format($avgPenting2D, 2, '.', '') ?>" data-penting2c="<?php echo number_format($avgPenting2C, 2, '.', '') ?>" data-penting2b="<?php echo number_format($avgPenting2B, 2, '.', '') ?>" data-penting2a="<?php echo number_format($avgPenting2A, 2, '.', '') ?>" data-penting3d="<?php echo number_format($avgPenting3D, 2, '.', '') ?>" data-penting3c="<?php echo number_format($avgPenting3C, 2, '.', '') ?>" data-penting3b="<?php echo number_format($avgPenting3B, 2, '.', '') ?>" data-penting3a="<?php echo number_format($avgPenting3A, 2, '.', '') ?>" data-penting4d="<?php echo number_format($avgPenting4D, 2, '.', '') ?>" data-penting4c="<?php echo number_format($avgPenting4C, 2, '.', '') ?>" data-penting4b="<?php echo number_format($avgPenting4B, 2, '.', '') ?>" data-penting4a="<?php echo number_format($avgPenting4A, 2, '.', '') ?>" data-penting5d="<?php echo number_format($avgPenting5D, 2, '.', '') ?>" data-penting5c="<?php echo number_format($avgPenting5C, 2, '.', '') ?>" data-penting5b="<?php echo number_format($avgPenting5B, 2, '.', '') ?>" data-penting5a="<?php echo number_format($avgPenting5A, 2, '.', '') ?>" data-penting6d="<?php echo number_format($avgPenting6D, 2, '.', '') ?>" data-penting6c="<?php echo number_format($avgPenting6C, 2, '.', '') ?>" data-penting6b="<?php echo number_format($avgPenting6B, 2, '.', '') ?>" data-penting6a="<?php echo number_format($avgPenting6A, 2, '.', '') ?>" data-penting7d="<?php echo number_format($avgPenting7D, 2, '.', '') ?>" data-penting7c="<?php echo number_format($avgPenting7C, 2, '.', '') ?>" data-penting7b="<?php echo number_format($avgPenting7B, 2, '.', '') ?>" data-penting7a="<?php echo number_format($avgPenting7A, 2, '.', '') ?>" data-penting8d="<?php echo number_format($avgPenting8D, 2, '.', '') ?>" data-penting8c="<?php echo number_format($avgPenting8C, 2, '.', '') ?>" data-penting8b="<?php echo number_format($avgPenting8B, 2, '.', '') ?>" data-penting8a="<?php echo number_format($avgPenting8A, 2, '.', '') ?>" data-penting9d="<?php echo number_format($avgPenting9D, 2, '.', '') ?>" data-penting9c="<?php echo number_format($avgPenting9C, 2, '.', '') ?>" data-penting9b="<?php echo number_format($avgPenting9B, 2, '.', '') ?>" data-penting9a="<?php echo number_format($avgPenting9A, 2, '.', '') ?>">
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-md-5">
                        <div class="col-lg-10">
                            <p>Pelayanan keseluruhan <b>Indeks Kepuasan Mitra (IKM)</b> dari survei adalah <b><?php echo $kebaikan ?></b> dengan nilai <b><?php echo number_format($csiKon, 2, '.', '') ?></b>, menurut perhitungan dari grafik kepentingan dan kepuasan layanan dibawah:</p>
                            <hr>
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie"></i>
                                    Grafik Kepentingan (%)</div>
                                <div class="card-body">
                                    <canvas id="pentingPieChart" width="100%" height="100"></canvas>
                                </div>
                                <a class="card-footer text-black clearfix small z-1" href="" data-toggle="modal" data-target="#detailPentingModal">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie"></i>
                                    Grafik Kepuasan (%)</div>
                                <div class="card-body">
                                    <canvas id="puasPieChart" width="100%" height="100"></canvas>
                                </div>
                                <a class="card-footer text-black clearfix small z-1" href="" data-toggle="modal" data-target="#detailPuasModal">
                                    <span class="float-left">View Details</span>
                                    <span class="float-right">
                                        <i class="fas fa-angle-right"></i>
                                    </span>
                                </a>
                            </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Jawaban?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Jika Anda menghapus data survey ini, maka user secara otomatis akan menjadi belum mengisi survey</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form class="" action="" method="post">
                        <input id="mitra-id" name="keyToDelete" class="" type="hidden" value="">
                        <input id="mitra-id-user" name="keyToUpdate" class="" type="hidden" value="">
                        <button class="btn btn-primary" name="mitra_delete">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Modal-->
    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">IKM Info</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nilai Persepsi</th>
                                            <th>Nilai Interval IKM</th>
                                            <th>Nilai Interval Konversi IKM</th>
                                            <th>Mutu Pelayanan</th>
                                            <th>Kinerja Unit Pelayanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1.00 - 1.75</td>
                                            <td>25 - 43.75</td>
                                            <td>D</td>
                                            <td>Tidak Baik</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>1.76 - 2.50</td>
                                            <td>43.76 - 62.50</td>
                                            <td>C</td>
                                            <td>Kurang Baik</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>2.51 - 3.25</td>
                                            <td>62.51 - 81.25</td>
                                            <td>B</td>
                                            <td>Baik</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>3.26 - 4.00</td>
                                            <td>81.26 - 100.00</td>
                                            <td>A</td>
                                            <td>Sangat Baik</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Modal-->
    <div class="modal fade" id="buttonDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                            <label for="inputEmail"><b>Mitra</b></label>
                            <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="mitra-name" aria-describedby="emailHelp" placeholder="-" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"><b>Dibuat Pada</b></label>
                            <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="mitra-waktu" aria-describedby="emailHelp" placeholder="-" required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="inputEmail">1.) Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-1" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-1" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">2.) Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-2" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-2" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">3.) Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-3" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-3" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">4.) Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-4" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-4" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">5.) Bagaimana Pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-5" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-5" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">6.) a. Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan. (Khusus untuk layanan tatap muka)<br>b. Bagaimana pendapat Saudara tentang ketersediaan informasi dalam sistem online yang mendukung jenis layanan. (Khusus untuk layanan online)</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-6" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-6" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">7.) a. Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan (Khusus untuk layanan tatap muka)<br>
                                b. Bagaimana pendapat Saudara terkait dengan kemudahan dan kejelasan fitur sistem online yang mendukung jenis layanan. (Khusus untuk layanan online)</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-7" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-7" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">8.) Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-8" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-8" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">9.) Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan</label>
                            <div class="row">
                                <div class="col">
                                    <b>Kepuasan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="puas-9" aria-describedby="emailHelp" placeholder="" required>
                                </div>
                                <div class="col">
                                    <b>Kepentingan:</b>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="penting-9" aria-describedby="emailHelp" placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputEmail"><b>Total Puas</b></label>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="total-puas" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputEmail"><b>Total Penting</b></label>
                                    <input value="" readonly name="update_price" type="text" class="form-control-plaintext" id="total-penting" aria-describedby="emailHelp" placeholder="-" required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Detail Penting Modal-->
    <div class="modal fade" id="detailPentingModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Grafik Kepentingan Pelayanan per Pertanyaan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            1.) Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya</div>
                                        <div class="card-body">
                                            <canvas id="penting1PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            2.) Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini</div>
                                        <div class="card-body">
                                            <canvas id="penting2PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            3.) Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan</div>
                                        <div class="card-body">
                                            <canvas id="penting3PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            4.) Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan</div>
                                        <div class="card-body">
                                            <canvas id="penting4PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            5.) Bagaimana Pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan</div>
                                        <div class="card-body">
                                            <canvas id="penting5PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            6.) a. Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan. (Khusus untuk layanan tatap muka) <br>
                                            b. Bagaimana pendapat Saudara tentang ketersediaan informasi dalam sistem online yang mendukung jenis layanan. (Khusus untuk layanan online)</div>
                                        <div class="card-body">
                                            <canvas id="penting6PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">7.)
                                            a. Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan (Khusus untuk layanan tatap muka)<br>
                                            b. Bagaimana pendapat Saudara terkait dengan kemudahan dan kejelasan fitur sistem online yang mendukung jenis layanan. (Khusus untuk layanan online)</div>
                                        <div class="card-body">
                                            <canvas id="penting7PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            8.) Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana</div>
                                        <div class="card-body">
                                            <canvas id="penting8PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            9.) Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan</div>
                                        <div class="card-body">
                                            <canvas id="penting9PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-10">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Puas Modal-->
    <div class="modal fade" id="detailPuasModal" tabindex="-1" role="dialog" aria-labelledby="LargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Grafik Kepuasan Pelayanan per Pertanyaan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            1.) Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya</div>
                                        <div class="card-body">
                                            <canvas id="puas1PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            2.) Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini</div>
                                        <div class="card-body">
                                            <canvas id="puas2PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            3.) Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan</div>
                                        <div class="card-body">
                                            <canvas id="puas3PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            4.) Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan</div>
                                        <div class="card-body">
                                            <canvas id="puas4PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            5.) Bagaimana Pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan</div>
                                        <div class="card-body">
                                            <canvas id="puas5PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">6.)
                                            a. Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan. (Khusus untuk layanan tatap muka)<br>
                                            b. Bagaimana pendapat Saudara tentang ketersediaan informasi dalam sistem online yang mendukung jenis layanan. (Khusus untuk layanan online)</div>
                                        <div class="card-body">
                                            <canvas id="puas6PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">7.)
                                            a. Bagaimana pendapat Saudara perilaku petugas dalam pelayanan terkait kesopanan dan keramahan (Khusus untuk layanan tatap muka)<br>
                                            b. Bagaimana pendapat Saudara terkait dengan kemudahan dan kejelasan fitur sistem online yang mendukung jenis layanan. (Khusus untuk layanan online)</div>
                                        <div class="card-body">
                                            <canvas id="puas7PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            8.) Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana</div>
                                        <div class="card-body">
                                            <canvas id="puas8PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="col-lg-12">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            9.) Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan</div>
                                        <div class="card-body">
                                            <canvas id="puas9PieChart" width="100%" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="col-lg-10">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div> -->
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
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../js/demo/datatables-demo.js"></script>

    <script src="../js/chart/kepentingan-chart.js"></script>
    <script src="../js/chart/kepuasan-chart.js"></script>
    <script src="../js/chart/puas1-chart.js"></script>
    <script src="../js/chart/puas2-chart.js"></script>
    <script src="../js/chart/puas3-chart.js"></script>
    <script src="../js/chart/puas4-chart.js"></script>
    <script src="../js/chart/puas5-chart.js"></script>
    <script src="../js/chart/puas6-chart.js"></script>
    <script src="../js/chart/puas7-chart.js"></script>
    <script src="../js/chart/puas8-chart.js"></script>
    <script src="../js/chart/puas9-chart.js"></script>
    <script src="../js/chart/penting1-chart.js"></script>
    <script src="../js/chart/penting2-chart.js"></script>
    <script src="../js/chart/penting3-chart.js"></script>
    <script src="../js/chart/penting4-chart.js"></script>
    <script src="../js/chart/penting5-chart.js"></script>
    <script src="../js/chart/penting6-chart.js"></script>
    <script src="../js/chart/penting7-chart.js"></script>
    <script src="../js/chart/penting8-chart.js"></script>
    <script src="../js/chart/penting9-chart.js"></script>
    <script src="js/mitra.js"></script>

</body>

</html>