<?php

include '../koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE from film WHERE id_film='$id' ");

header("location:film_index.php?pesan=berhasil");
?>