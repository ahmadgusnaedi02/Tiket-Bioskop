<?php
include '../koneksi.php';

$idjadwal = $_GET['id_jadwal'];

if (!isset($idjadwal)) {
    echo "ID jadwal tidak diberikan!";
    exit;
}

$hapuskursi = mysqli_query($koneksi, "DELETE FROM kursi WHERE id_jadwal='$idjadwal'");
if ($hapuskursi) {
    $hapusjadwal = mysqli_query($koneksi, "DELETE FROM jadwal WHERE id_jadwal='$idjadwal'");
    if ($hapusjadwal) {
        header("location: jadwal_index.php?pesan=berhasil");
        exit;
    } else {
        echo "Penghapusan jadwal gagal: " . mysqli_error($koneksi);
    }
} else {
    echo "Penghapusan kursi gagal: " . mysqli_error($koneksi);
}
?>