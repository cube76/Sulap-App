<?php
if (! isset($_POST['fill'])) {
    responJson(['success' => false, 'messege' => "'fill' harus diisi"]);
    exit;
}
if (! isset($_POST['id'])) {
    responJson(['success' => false, 'messege' => "'id' harus diisi"]);
    exit;
}

//bersihkan data
$fill = mysqli_real_escape_string($connection, $_POST['fill']);
$id = mysqli_real_escape_string($connection, $_POST['id']);

//masukkan data ke db
$query = mysqli_query($connection, 'UPDATE user
  SET fill = "'.$fill.'"
  WHERE id = ' . $id);
//cek berhasil atau tidak dimasukkan db
if ($query) {
    responJson(['success' => true, 'messege' => 'sukses update data']);
} else {
    responJson(['success' => false, 'messege' =>  mysqli_error($connection)]);
}