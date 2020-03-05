<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="" style="background-color:#d35400">

<?php
      // Include config file
      include ("connection.php");

      session_start();

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 

        $myusername = mysqli_real_escape_string($connection, $_POST['username']);
        $mypassword = mysqli_real_escape_string($connection, $_POST['password']);

        $sql = "SELECT * FROM user WHERE username = '$myusername'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // $active = $row['active'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) {
          if (password_verify($mypassword, $row['password'])) {
          $userid=$row['id'];
          $privilege=$row['privilege'];
          if($privilege != 1){
            ?>
            <div class="alert alert-danger" role="alert">Anda bukan Admin</div>
          <?php
          }else{
          $_SESSION['login_user'] = $myusername;
          $_SESSION['id_user'] = $userid;

          header("location: ../index.php");
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
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" id="myInput" name="password" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input class="btn text-white btn-block" type="submit" name="login" value="Login" style="background-color:#ee7600">
        </form>
        <a class="d-block small mt-3" href="../../" style="color:#ee7600">User page</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
