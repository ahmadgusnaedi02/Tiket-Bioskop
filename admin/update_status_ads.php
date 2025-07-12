<?php
include "../koneksi.php";
$idads = $_GET['id_ads'];
$cek = mysqli_query($koneksi, "SELECT * FROM ads WHERE id_ads='$idads' ");
$c = mysqli_fetch_assoc($cek);
$aktif = "aktif";
$tidakAktif = "tidak aktif";
if ($c['status'] == "aktif") {
    $update = mysqli_query($koneksi, "UPDATE ads SET status='$tidakAktif' WHERE id_ads='$idads' ");
    header('location:ads_index.php');
} else {
    $update = mysqli_query($koneksi, "UPDATE ads SET status='$aktif' WHERE id_ads='$idads' ");
    header('location:ads_index.php');
}
?>