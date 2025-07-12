<?php
include "../koneksi.php";

$nama = $_POST['namaLengkap'];
$email = $_POST['email'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$jk = $_POST['jk'];
$tLahir = $_POST['tLahir'];
$username = $_POST['username'];
$hakAkses = $_POST['hakAkses'];
$iduser = $_POST['id_user'];

// Periksa apakah password diisi
if (!empty($_POST['password'])) {
    // Jika password diisi, hash password baru
    $password = md5($_POST['password']);
    $sql = "UPDATE users 
            SET namaLengkap='$nama', 
                email='$email', 
                provinsi='$provinsi', 
                kota='$kota', 
                jk='$jk', 
                tLahir='$tLahir', 
                username='$username', 
                password='$password', 
                hakAkses='$hakAkses'
            WHERE id_user='$iduser'
            ";
} else {
    // Jika password tidak diisi, gunakan password yang sudah ada
    $sql = "UPDATE users 
            SET namaLengkap='$nama', 
                email='$email', 
                provinsi='$provinsi', 
                kota='$kota', 
                jk='$jk', 
                tLahir='$tLahir', 
                username='$username', 
                hakAkses='$hakAkses'
            WHERE id_user='$iduser'
            ";
}

$simpan = mysqli_query($koneksi, $sql);
if ($simpan) {
    header('location:pengaturan_akun_index.php?pesan=berhasil');
} else {
    echo "gagal!";
}
?>