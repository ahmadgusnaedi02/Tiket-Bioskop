<?php
include "../koneksi.php";

$idfilm = $_POST['id_film'];
$jamTayang = $_POST['jamTayang'];
$idjadwal = $_POST['id_jadwal'];

$sql = "UPDATE jadwal
        SET id_film='$idfilm',
            jamTayang='$jamTayang'
        WHERE id_jadwal='$idjadwal'
        ";
$update = mysqli_query($koneksi, $sql);
if ($update) {
    header('location:jadwal_index.php?pesan=berhasil');
} else {
    echo "gagal!";
}
?>