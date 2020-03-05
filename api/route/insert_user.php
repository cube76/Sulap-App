<?php
if (!isset($_POST['username'])) {
    responJson(['success' => false, 'messege' => "'username' harus diisi"]);
    exit;
}
if (!isset($_POST['password'])) {
    responJson(['success' => false, 'messege' => "'password' harus diisi"]);
    exit;
}
if (!isset($_POST['privilege'])) {
    responJson(['success' => false, 'messege' => "'privilege' harus diisi"]);
    exit;
}

// bersihkan data
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);
$privilege = mysqli_real_escape_string($connection, $_POST['privilege']);

//masukkan data ke db
$query = mysqli_query($connection, 'INSERT INTO user (username, password, privilege)
 values ("' . $username . '", "' . $password . '", "' . $privilege . '")');
//cek berhasil atau tidak dimasukkan db
if ($query) {
    responJson(['success' => true, 'messege' => 'sukses memasukkan data']);
} else if (mysqli_error($connection) == "Duplicate entry '" . $username . "' for key 'username'") {
    responJson(['success' => false, 'messege' => "Username yang Anda masukkan sudah digunakan"]);
} else {
    responJson(['success' => false, 'messege' =>  mysqli_error($connection)]);
}
