<?php
include "koneksi.php";


$nama = $_POST['nama'];
$email = $_POST['email'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$jk = $_POST['jk'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$hakAkses = "user";

$insertQuery = "INSERT INTO users (namaLengkap, email, provinsi, kota, jk, tLahir, username, password, hakAkses) VALUES ('$nama', '$email', '$provinsi', '$kota', '$jk', '$tanggal_lahir', '$username', '$password','$hakAkses')";

$result = mysqli_query($koneksi, $insertQuery);

if ($result) {
    header("location: index_login.php?pesan=berhasil");
    exit();
} else {
    header("location:index_register?cek=gagal");
}



?>