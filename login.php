<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($koneksi, "SELECT * FROM users 
        WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $row = mysqli_fetch_assoc($data);
    if ($row['hakAkses'] == 'admin') {
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $username;
        $_SESSION['hakAkses'] = 'admin';
        header("location:admin/index.php?pesan=berhasil");
    } else {
        $_SESSION['nama'] = $row['namaLengkap'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['hakAkses'] = 'user';
        header("location:index.php?pesan=berhasil");
    }
} else {
    header("location:index_login.php?cek=gagal");
}
?>