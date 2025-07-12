<?php
session_start();
include "koneksi.php";
$id_jadwal = $_POST['id_jadwal'];
$kursi = $_POST['kursi'];
$jumlahTiket = count($kursi);
$id_user = $_SESSION['id_user'];
$status = "belum bayar";
$seat = '';
foreach ($kursi as $chk1) {
    $seat .= $chk1 . " ";

}
$tanggal = date('Y-m-d');

foreach ($kursi as $chk1) {
    $update_kursi = mysqli_query($koneksi, "UPDATE kursi SET status='disabled' WHERE namaKursi='$chk1' AND id_jadwal='$id_jadwal' ");
}

$harga = 40000;
$totalHarga = $harga * $jumlahTiket;

$simpan = mysqli_query($koneksi, "INSERT INTO pembeliantiket(id_tiket,tanggal, harga, jumlahTiket, tempat, totalHarga, id_user, id_jadwal, status)
VALUES ('','$tanggal', '$harga', '$jumlahTiket', '$seat', '$totalHarga', '$id_user', '$id_jadwal', '$status') ");

if ($simpan) {
    $idPembelian = mysqli_insert_id($koneksi);
    header("location: pesanan.php");

} else {
    echo "Terjadi kesalahan: " . mysqli_error($koneksi);
}



?>