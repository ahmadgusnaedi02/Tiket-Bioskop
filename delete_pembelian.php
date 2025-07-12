<?php
include "koneksi.php";
$idtiket = $_GET['id'];

// Ambil informasi pembelian tiket
$pembeliantiket = mysqli_query($koneksi, "SELECT * FROM pembeliantiket WHERE id_tiket='$idtiket'");
$p = mysqli_fetch_assoc($pembeliantiket);

if ($p) {
    // Ambil informasi kursi
    $id_jadwal = $p['id_jadwal'];
    $namaKursiArray = explode(' ', $p['tempat']); // Membaca data namaKursi dan memisahkannya menjadi array

    // Hapus data dari pembeliantiket
    $hapus = mysqli_query($koneksi, "DELETE FROM pembeliantiket WHERE id_tiket='$idtiket' ");

    if ($hapus) {
        // Ubah status kursi
        foreach ($namaKursiArray as $namaKursi) {
            mysqli_query($koneksi, "UPDATE kursi SET status='' WHERE id_jadwal='$id_jadwal' AND namaKursi='$namaKursi'");
        }
        header("location: pesanan.php?pesan=berhasil");
        exit();
    } else {
        echo "Gagal menghapus pembelian tiket: " . mysqli_error($koneksi);
    }
}

header("location: pesanan.php?pesan=gagal");
?>