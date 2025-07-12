<?php
$koneksi = mysqli_connect("localhost", "root", "", "bioskop");
if (mysqli_connect_errno()) {
    echo "Gagal :" . mysqli_connect_error();
}

?>