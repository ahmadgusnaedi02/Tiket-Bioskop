<?php
// Ambil informasi dari URL menggunakan metode GET
$order_id = $_GET['order_id'];
$payment_method = isset($_GET['payment_method']) ? $_GET['payment_method'] : ''; // Tambahkan penanganan jika parameter tidak ada
$status_code = $_GET['status_code'];
$transaction_status = $_GET['transaction_status'];

// Validasi data yang diterima dari URL
if (empty($order_id) || empty($status_code) || empty($transaction_status)) {
    // Data tidak lengkap, mungkin ada upaya penyalahgunaan
    die("Invalid request. Missing parameters.");
}

include "koneksi.php"; // Pastikan ini di-include untuk koneksi ke database

// Proses data pembayaran berdasarkan status transaksi
if ($transaction_status == 'settlement') {
    include "koneksi.php";
    mysqli_query($koneksi, "UPDATE pembeliantiket SET status='sudah bayar' WHERE id_tiket='$order_id'");
    header("location:pesanan.php");
} else if ($transaction_status == 'pending') {
    include "koneksi.php";
    mysqli_query($koneksi, "UPDATE pembeliantiket SET status='pending' WHERE id_tiket='$order_id'");
    header("location:pesanan.php");
} else if ($transaction_status == 'deny') {
    include "koneksi.php";
    mysqli_query($koneksi, "UPDATE pembeliantiket SET status='ditolak' WHERE id_tiket='$order_id'");
    header("location:pesanan.php");
} else if ($transaction_status == 'expire') {
    include "koneksi.php";
    mysqli_query($koneksi, "UPDATE pembeliantiket SET status='expire' WHERE id_tiket='$order_id'");
    header("location:pesanan.php");
} else if ($transaction_status == 'cancel') {
    include "koneksi.php";
    mysqli_query($koneksi, "UPDATE pembeliantiket SET status='Batal' WHERE id_tiket='$order_id'");
    header("location:pesanan.php");
}

?>