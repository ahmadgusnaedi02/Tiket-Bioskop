<?php
include "../koneksi.php";
$namaIklan = $_POST['namaIklan'];
$nfoto = $_FILES['foto']['name'];
$jfoto = $_FILES['foto']['tmp_name'];
$dir = "../assets/img/";
$status = "tidak aktif";
$sql = "INSERT INTO ads VALUES(
            '',
            '$namaIklan',
            '$nfoto',
            '$status'
            )";
$upload = $dir . $nfoto;
move_uploaded_file($jfoto, $upload);

$simpan = mysqli_query($koneksi, $sql);
if ($simpan) {
    header('location:ads_index.php?pesan=berhasil');
} else {
    echo "gagal!" . mysqli_error($koneksi);

}

?>