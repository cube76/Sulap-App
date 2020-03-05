<?php
if (! isset($_POST['topic'])) {
    responJson(['success' => false, 'messege' => "'topic' harus diisi"]);
    exit;
}
if (! isset($_POST['feedback'])) {
    responJson(['success' => false, 'messege' => "'feedback' harus diisi"]);
    exit;
}

$file = NULL;
if (!empty($_POST['file'])) {
    $file = mysqli_real_escape_string($connection,$_POST['file']);
}

// bersihkan data
$topic = mysqli_real_escape_string($connection, $_POST['topic']);
$feedback = mysqli_real_escape_string($connection, $_POST['feedback']);

//masukkan data ke db
$query = mysqli_query($connection, 'INSERT INTO umum (topic, feedback, file)
 values ("'. $topic. '", "' .$feedback. '", "' .$file. '")');
//cek berhasil atau tidak dimasukkan db
if ($query) {
    responJson(['success' => true, 'messege' => 'sukses memasukkan data']);
} else {
    responJson(['success' => false, 'messege' =>  mysqli_error($connection)]);
}
