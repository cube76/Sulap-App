<?php
if (!isset($_POST['username'])) {
  responJson(['success' => false, 'messege' => "'username' harus diisi"]);
  exit;
}
if (!isset($_POST['password'])) {
  responJson(['success' => false, 'messege' => "'password' harus diisi"]);
  exit;
}

//bersihkan data
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

//masukkan data ke db
$query = mysqli_query($connection, 'SELECT user.* FROM user 
WHERE username="' . $username . '"');
//cek berhasil atau tidak manggil db
$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

if (mysqli_num_rows($query) === 0) {
  responJson(['data' => ['success' => false, 'messege' =>  mysqli_error($connection)]]);
} else {
  if (password_verify($password, $row['password'])) {
    //jika ada
    $result = [$row];
    //tampilkan berulang
    while ($data = mysqli_fetch_assoc($query)) {
      array_push($result, $data);
    }
    responJson(['data' =>
    $result]);
  }else {
    responJson(['data' => ['success' => false, 'messege' =>  "password tidak sesuai"]]);
  }
}
