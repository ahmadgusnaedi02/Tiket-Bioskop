<?php
include "../koneksi.php";

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

// Ambil informasi file gambar poster
$posterName = $_FILES['poster']['name'];
$posterTmpName = $_FILES['poster']['tmp_name'];
$posterSize = $_FILES['poster']['size'];
$posterError = $_FILES['poster']['error'];
$posterType = $_FILES['poster']['type'];

// Dapatkan ekstensi file poster
$posterExt = explode('.', $posterName);
$posterActualExt = strtolower(end($posterExt));

// Ekstensi file yang diizinkan untuk poster
$allowed = array('jpg', 'jpeg', 'png', 'gif');

// Cek apakah ekstensi file poster diizinkan
if (in_array($posterActualExt, $allowed)) {
    // Cek apakah terdapat error saat upload poster
    if ($posterError === 0) {
        // Tentukan lokasi penyimpanan file
        $posterDestination = '../assets/img/' . $posterName;
        $postersave = $posterName . $posterTmpName;

        // Pindahkan file poster ke lokasi penyimpanan
        move_uploaded_file($posterTmpName, $posterDestination);

        // Query untuk menyimpan data film ke dalam database
        $sql = "INSERT INTO film (id_film, judulFilm, durasi, tahun, producer, genre, batasUmur, poster,trailerFilm, statusFilm, deskripsi)
            VALUES ('', '$judulFilm', '$durasi', '$tahun', '$producer', '$genre', '$batasUmur', '$posterName','$link', '$statusFilm', '$deskripsi')";

        // Jalankan query
        mysqli_query($koneksi, $sql);

        // Redirect ke halaman index atau halaman lain setelah berhasil menyimpan data
        header("Location: film_index.php?pesan=berhasil");
        exit();
    } else {
        echo "Error saat upload file poster.";
    }
} else {
    echo "Ekstensi file poster tidak diizinkan.";
}

?>