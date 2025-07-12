<?php

include '../koneksi.php';

$iduser = $_GET['id_user'];

mysqli_query($koneksi, "DELETE from users WHERE id_user='$iduser' ");

header("location:users_index.php?pesan=berhasil");
?>