<?php
include "../koneksi.php";
$namaAktor = $_POST['namaAktor'];
$id_film = $_POST['id_film'];
$nfoto = $_FILES['foto']['name'];
$jfoto = $_FILES['foto']['tmp_name'];
$dir = "../assets/img/cast/";

$sql = "INSERT INTO cast VALUES('',
            '$namaAktor',
            '$nfoto',
            '$id_film'
            )";
$upload = $dir . $nfoto;
move_uploaded_file($jfoto, $upload);

$simpan = mysqli_query($koneksi, $sql);
if ($simpan) {
    header('location:cast_index.php?pesan=berhasil');
} else {
    echo "gagal!" . mysqli_error($koneksi);

}

?>