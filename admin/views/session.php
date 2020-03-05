<?php
   include('connection.php');
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
      header("location:login.php");
      die();
   }
?>