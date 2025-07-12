<?php
include "../koneksi.php";

$id = $_POST['id']; // Ambil ID film dari form

// Ambil data yang dikirimkan dari form
$judulFilm = $_POST['judulFilm'];
$durasi = $_POST['durasi'];
$tahun = $_POST['tahun'];
$producer = $_POST['producer'];
$genre = $_POST['genre'];
$batasUmur = $_POST['batasUmur'];
$statusFilm = $_POST['statusFilm'];
$deskripsi = $_POST['deskripsi'];
$link = $_POST['link'];

// Jika ada file poster yang diunggah
if ($_FILES['poster']['name']) {
    $posterName = $_FILES['poster']['name'];
    $posterTmpName = $_FILES['poster']['tmp_name'];
    $posterDestination = '../assets/img/' . $posterName;

    // Pindahkan file poster ke lokasi penyimpanan
    move_uploaded_file($posterTmpName, $posterDestination);
} else {
    // Jika tidak ada pengunggahan baru, gunakan poster lama
    $posterName = $_POST['posterLama'];
}

// Update informasi film di basis data
$sql = "UPDATE film 
        SET judulFilm='$judulFilm', 
            durasi='$durasi', 
            tahun='$tahun', 
            producer='$producer', 
            genre='$genre', 
            batasUmur='$batasUmur', 
            statusFilm='$statusFilm', 
            deskripsi='$deskripsi', 
            poster='$posterName',
            trailerFilm = '$link'
        WHERE id_film='$id'";

mysqli_query($koneksi, $sql);

// Redirect ke halaman index setelah berhasil menyimpan data
header("Location: film_index.php?pesan=berhasil");
exit();
?>