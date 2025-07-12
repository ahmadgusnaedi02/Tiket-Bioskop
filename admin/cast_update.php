<?php
include "../koneksi.php";

$idcast = $_POST['id_cast'];
$namaAktor = $_POST['namaAktor'];
$id_film = $_POST['id_film'];
$fotolama = $_POST['foto_lama'];

// Memeriksa apakah ada file foto yang diunggah
if ($_FILES['foto']['name']) {
    $fotoName = $_FILES['foto']['name'];
    $fotoTmpName = $_FILES['foto']['tmp_name'];

    // Menyimpan file foto ke folder yang ditentukan
    $fotoDestination = '../assets/img/cast/' . $fotoName;
    move_uploaded_file($fotoTmpName, $fotoDestination);
} else {
    // Jika tidak ada file yang diunggah, gunakan nama file lama
    $fotoName = $fotolama;
}

// Update data di database
$sql = "UPDATE cast 
        SET namaCast='$namaAktor', id_film='$id_film', foto='$fotoName'
        WHERE id_cast='$idcast'";

if (!mysqli_query($koneksi, $sql)) {
    die('Error: ' . mysqli_error($koneksi));
}

// Redirect ke halaman index setelah berhasil menyimpan data
header("Location: cast_index.php?pesan=berhasil");
exit();
?>