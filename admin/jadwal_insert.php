<?php
include "../koneksi.php";

$idfilm = $_POST['id_film'];
$jamTayang = $_POST['jamTayang'];

$sql = "INSERT INTO jadwal (id_jadwal, id_film, jamTayang)
            VALUES ('','$idfilm', '$jamTayang')
            ";
$simpan = mysqli_query($koneksi, $sql);
if ($simpan) {
    header('location:jadwal_index.php?pesan=berhasil');
} else {
    echo "gagal!";
}
?>