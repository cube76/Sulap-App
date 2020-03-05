<?php
if (!isset($_POST['id_user'])) {
    responJson(['success' => false, 'messege' => "'id_user' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_1'])) {
    responJson(['success' => false, 'messege' => "'puas_1' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_2'])) {
    responJson(['success' => false, 'messege' => "'puas_2' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_3'])) {
    responJson(['success' => false, 'messege' => "'puas_3' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_4'])) {
    responJson(['success' => false, 'messege' => "'puas_4' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_5'])) {
    responJson(['success' => false, 'messege' => "'puas_5' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_6'])) {
    responJson(['success' => false, 'messege' => "'puas_6' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_7'])) {
    responJson(['success' => false, 'messege' => "'puas_7' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_8'])) {
    responJson(['success' => false, 'messege' => "'puas_8' harus diisi"]);
    exit;
}
if (!isset($_POST['puas_9'])) {
    responJson(['success' => false, 'messege' => "'puas_9' harus diisi"]);
    exit;
}
if (!isset($_POST['total_puas'])) {
    responJson(['success' => false, 'messege' => "'total_puas' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_1'])) {
    responJson(['success' => false, 'messege' => "'penting_1' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_2'])) {
    responJson(['success' => false, 'messege' => "'penting_2' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_3'])) {
    responJson(['success' => false, 'messege' => "'penting_3' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_4'])) {
    responJson(['success' => false, 'messege' => "'penting_4' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_5'])) {
    responJson(['success' => false, 'messege' => "'penting_5' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_6'])) {
    responJson(['success' => false, 'messege' => "'penting_6' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_7'])) {
    responJson(['success' => false, 'messege' => "'penting_7' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_8'])) {
    responJson(['success' => false, 'messege' => "'penting_8' harus diisi"]);
    exit;
}
if (!isset($_POST['penting_9'])) {
    responJson(['success' => false, 'messege' => "'penting_9' harus diisi"]);
    exit;
}
if (!isset($_POST['total_penting'])) {
    responJson(['success' => false, 'messege' => "'total_penting' harus diisi"]);
    exit;
}

// bersihkan data
$id_user = mysqli_real_escape_string($connection, $_POST['id_user']);
$puas_1 = mysqli_real_escape_string($connection, $_POST['puas_1']);
$puas_2 = mysqli_real_escape_string($connection, $_POST['puas_2']);
$puas_3 = mysqli_real_escape_string($connection, $_POST['puas_3']);
$puas_4 = mysqli_real_escape_string($connection, $_POST['puas_4']);
$puas_5 = mysqli_real_escape_string($connection, $_POST['puas_5']);
$puas_6 = mysqli_real_escape_string($connection, $_POST['puas_6']);
$puas_7 = mysqli_real_escape_string($connection, $_POST['puas_7']);
$puas_8 = mysqli_real_escape_string($connection, $_POST['puas_8']);
$puas_9 = mysqli_real_escape_string($connection, $_POST['puas_9']);
$total_puas = mysqli_real_escape_string($connection, $_POST['total_puas']);
$penting_1 = mysqli_real_escape_string($connection, $_POST['penting_1']);
$penting_2 = mysqli_real_escape_string($connection, $_POST['penting_2']);
$penting_3 = mysqli_real_escape_string($connection, $_POST['penting_3']);
$penting_4 = mysqli_real_escape_string($connection, $_POST['penting_4']);
$penting_5 = mysqli_real_escape_string($connection, $_POST['penting_5']);
$penting_6 = mysqli_real_escape_string($connection, $_POST['penting_6']);
$penting_7 = mysqli_real_escape_string($connection, $_POST['penting_7']);
$penting_8 = mysqli_real_escape_string($connection, $_POST['penting_8']);
$penting_9 = mysqli_real_escape_string($connection, $_POST['penting_9']);
$total_penting = mysqli_real_escape_string($connection, $_POST['total_penting']);

//masukkan data ke db
$query = mysqli_query($connection, 'INSERT INTO mitra (id_user, puas_1, puas_2,puas_3,puas_4,puas_5,puas_6,puas_7,puas_8,puas_9,total_puas,penting_1,penting_2,penting_3,penting_4,penting_5,penting_6,penting_7,penting_8,penting_9,total_penting)
 values ("' . $id_user . '", "' . $puas_1 . '", "' . $puas_2 . '", "' . $puas_3 . '", "' . $puas_4 . '", "' . $puas_5 . '", "' . $puas_6 . '", "' . $puas_7 . '", "' . $puas_8 . '", "' . $puas_9 . '", "' . $total_puas . '", "' . $penting_1 . '", "' . $penting_2 . '", "' . $penting_3 . '", "' . $penting_4 . '", "' . $penting_5 . '", "' . $penting_6 . '", "' . $penting_7 . '", "' . $penting_8 . '", "' . $penting_9 . '", "' . $total_penting . '")');
//cek berhasil atau tidak dimasukkan db
if ($query) {
    responJson(['success' => true, 'messege' => 'sukses memasukkan data']);
}else if (mysqli_error($connection) == "Duplicate entry '" . $id_user . "' for key 'id_user'") {
    responJson(['success' => false, 'messege' => "Anda telah mengisi survey ini"]);
} else {
    responJson(['success' => false, 'messege' =>  mysqli_error($connection)]);
}
