<?php include('koneksi.php'); ?>
<!doctype html>
<html>

<head>
    <title>Kebun Strawberry Organik Cemara</title>
    <?php include('components/head.php'); ?>
</head>

<body>
    <div class="normal-table-area">
        <div class="container">
            <br>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <img width="200px" height="170px" src="assets/foto_produk/logo.jpg">
                </div>
                <div class="col-sm-9">
                    <h1>Kebun Strawberry Organik Cemara</h1>
                    <h5>Jln. Lubuk Selasih, Alahan Panjang, Kec. Gunung Talang, Sumatera Barat 27573</h5>
                    <h5>No Tlp. : 0812 7513 7378</h5>
                    <hr style="display: block; height: 1px;border: 0; border-top: 1px solid #ccc;margin: 1em 0; padding: 0;">
                </div>
            </div>
            <br>
            <h3 class="col-sm-12" align="center"><u>Laporan Data Produk</u></h3>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-sm-12">
                    <div class="normal-table-list">
                        <br>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="10px">No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Diskon</th>
                                    <th>Tanggal Post</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ambil = $koneksi->query("SELECT * FROM tb_produk");
                                while ($pecah = $ambil->fetch_object()) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $pecah->produk_nama ?></td>
                                        <td>Rp. <?php echo number_format($pecah->produk_harga) ?></td>
                                        <td><?php echo $pecah->produk_stok ?></td>
                                        <td><?php echo $pecah->produk_diskon ?>%</td>
                                        <td><?php echo $pecah->produk_tgl_post ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <script>
        window.print();
    </script>
</body>

</html>