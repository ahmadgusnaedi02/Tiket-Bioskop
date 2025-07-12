<?php
include "../koneksi.php";

$nama = $_POST['namaLengkap'];
$email = $_POST['email'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$jk = $_POST['jk'];
$tLahir = $_POST['tLahir'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$hakAkses = $_POST['hakAkses'];



$sql = "INSERT INTO users (id_user, namaLengkap, email, provinsi, kota, jk, tLahir, username, password, hakAkses)
            VALUES ('','$nama', '$email', '$provinsi', '$kota', '$jk', '$tLahir', '$username', '$password', '$hakAkses')
            ";
$simpan = mysqli_query($koneksi, $sql);
if ($simpan) {
    header('location:users_index.php?pesan=berhasil');
} else {
    echo "gagal!";
}
?>