<?php
session_start();
$get_id = $_GET['id'];
unset($_SESSION["keranjang"][$get_id]);
echo "<script>alert('Produk Telah Dihapus Dari Keranjang Belanja');</script>";
echo "<script>window.location='keranjang.php'</script>";
