<?php
if (! isset($_POST['id'])) {
  responJson(['messege' => "'id' harus diisi"]);
  exit;
}

$id = mysqli_real_escape_string($connection, $_POST['id']);

$query = mysqli_query($connection, "DELETE FROM umum WHERE id=". $id);

if ($query) {
  responJson(['messege' => "sukses delete"]);
} else {
  responJson(['messege' => "error!!" . mysqli_error($connection)]);
}
 ?>
