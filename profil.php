<?php
session_start();
include('koneksi.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Kebun Strawberry Organik Cemara</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>

    <!-- Nav bar -->
    <?php include('components/menu.php'); ?>
    <!-- Nav bar -->

    <!-- content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-9">

                <h1 class="my-4">Kebun Strawberry Organik Cemara
                    <small>Alahan Panjang</small>
                </h1>
                <!-- Blog Post -->
                <div class="card mb-4">
                    <img style="width: 845px; height: 490px;" class="card-img-top" src="admin/assets/foto_produk/Foto.jpeg" alt="Gagal load gambar">
                    <p align="center"><i>Foto Christhoper saat melakukan penelitian</i></p>
                    <div class="card-body">
                        <h2 class="card-title">Latar Belakang Perusahaan</h2>
                        <p class="card-text" style="text-align: justify;">
                            &emsp;&emsp;
                            Kebun Strawberry Organik Cemara yang terletak di Jln Lubuk Selasih, Alahan Panjang merupakan perusahaan yang bergerak di bidang penyediaan bibit dan penjualan Strawberry, usaha ini di mulai sejak 15 Maret 2016 di dirkan oleh Bapak Sutrimo.<br>
                            &emsp;&emsp;Dinamakan Kebun Strawberry organik karena tanaman Strawberry tidak menggunakan Pestisida yang tidak ramah lingkungan, akan tetapi menggunakan pupuk Kompos, sehingga buah Strawberry dapat langsung di makan pada saat pemetikan. Pemupukan di lakukan 1x sehari agar tanaman tetap subur

                        </p>
                        <br><br>
                    </div>
                    <div class="card-footer text-muted">
                        <!--  -->
                    </div>
                </div>
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-3">

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Menu</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a style="color: black" href="index.php">Home</a>
                                    </li>
                                    <li>
                                        <a style="color: black" href="keranjang.php">Keranjang</a>
                                    </li>
                                    <li>
                                        <a style="color: black" href="profil.php">Profil Perusahaan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <div class="card-body">
                        <b>Kebun Strawberry Organik Cemara</b>
                        <a style="color: black" target="_blank" href="https://www.facebook.com">On Facebook</a>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>

    <?php include('components/footer.php') ?>

</body>

</html>