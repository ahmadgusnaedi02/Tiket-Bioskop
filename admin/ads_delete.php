<?php

include '../koneksi.php';

$idads = $_GET['id_ads'];

$delete = mysqli_query($koneksi, "DELETE from ads WHERE id_ads='$idads' ");
if ($delete) {
    header("location:ads_index.php?pesan=berhasil");
} else {
    echo "gagal" . mysqli_error($koneksi);
}