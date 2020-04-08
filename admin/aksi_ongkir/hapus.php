<?php
$id = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM tb_ongkir WHERE ongkir_id = $id ");

if ($hapus) {
    echo "<script>alert('Data berhasil di hapus')</script>";
    echo "<script>window.location='index.php?page=data_ongkir'</script>";
} else {
    echo "<script>alert('Data gagal di hapus')</script>";
    echo "<script>window.location='index.php?page=data_ongkir'</script>";
}
