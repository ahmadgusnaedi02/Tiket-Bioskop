<?php
include "../koneksi.php";

$idads = $_POST['id_ads'];
$namaAds = $_POST['namaIklan'];
$fotolama = $_POST['fotolama'];
$status = $_POST['status'];
// Memeriksa apakah ada file foto yang diunggah
if ($_FILES['foto']['name']) {
    $fotoName = $_FILES['foto']['name'];
    $fotoTmpName = $_FILES['foto']['tmp_name'];

    // Menyimpan file foto ke folder yang ditentukan
    $fotoDestination = '../assets/img/' . $fotoName;
    move_uploaded_file($fotoTmpName, $fotoDestination);
} else {
    // Jika tidak ada file yang diunggah, gunakan nama file lama
    $fotoName = $fotolama;
}

// Update data di database
$sql = "UPDATE ads 
        SET namaAds='$namaAds', fotoAds='$fotoName', status='$status'
        WHERE id_ads='$idads'";

if (!mysqli_query($koneksi, $sql)) {
    die('Error: ' . mysqli_error($koneksi));
}

// Redirect ke halaman index setelah berhasil menyimpan data
header("Location: ads_index.php?pesan=berhasil");
exit();
?>