<?php

include '../koneksi.php';

$idtiket = $_GET['id_pembelian'];

mysqli_query($koneksi, "DELETE FROM pembeliantiket WHERE id_tiket='$idtiket' ");

header("location:pembelian_index.php?pesan=berhasil");
?>