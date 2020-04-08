<?php
session_start();
include('koneksi.php');
// mendapatkan id
$id_produk = $_GET['id'];

// jk ada produk,mk produk +1
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
    // selain itu, mk produk di anggap di beli 1
} else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

echo "<script>alert('Produk Telah Masuk Ke Keranjang Belanja');</script>";
echo "<script>window.location='keranjang.php'</script>";
