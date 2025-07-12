<?php

include '../koneksi.php';

$idcast = $_GET['id_cast'];

$delete = mysqli_query($koneksi, "DELETE from cast WHERE id_cast='$idcast' ");
if ($delete) {
    header("location:cast_index.php?pesan=berhasil");
} else {
    echo "gagal" . mysqli_error($koneksi);
}