<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda harus login');location='login.php';</script>";
} ?>
<!DOCTYPE html>

<head>
    <title>Kebun Strawberry Organik Cemara</title>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/foto_produk/logo.png">
    <?php include('components/head.php'); ?>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col-sm-3">
                <img width="200px" height="170px" src="assets/foto_produk/logo.png">
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
            <div class="col-md-12">
                <?php
                $id = $_GET['id'];
                $ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_member ON tb_pembelian.member_id = tb_member.member_id WHERE tb_pembelian.pembelian_id=$id ");
                $detail = $ambil->fetch_object();
                ?>
                <h1>Data Detail <strong><?php echo $detail->member_nama ?></strong></h1>
                <div class="templatemo-panels">
                    <div class="container">

                        <div class="row">
                            <div class="col-sm-4">
                                <h3>Pembelian</h3>
                                <p>
                                    Tanggal : <?php echo tgl_indo($detail->pembelian_tgl) ?> <br>
                                    Total yang akan di Bayar : <strong>Rp. <?php echo number_format($detail->pembelian_total) ?></strong>
                                </p>
                            </div>
                            <div class="col-sm-4">
                                <h3>Pengiriman</h3>
                                Destinasi : <strong><?php echo $detail->pembelian_kota ?></strong><br>
                                Ongkos Kirim : Rp. <?php echo number_format($detail->pembelian_tarif) ?> <br>
                                Alamat Pengiriman : <?php echo $detail->pembelian_alamat ?>
                            </div>
                            <div class="col-sm-4">
                                <h3>Member</h3>
                                Nama Member : <strong><?php echo $detail->member_nama ?></strong><br>
                                <p>
                                    No Hp Member : <?php echo $detail->member_nohp ?> <br>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <p><strong>List Produk Yang Di Beli</strong></p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ambil = $koneksi->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.produk_id=tb_produk.produk_id WHERE tb_pembelian_produk.pembelian_id='$_GET[id]' ");
                                while ($pecah = $ambil->fetch_object()) {
                                    $total_jumlah += $pecah->produk_harga * $pecah->pembelian_produk_jumlah;
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $pecah->produk_nama ?></td>
                                        <td>Rp. <?php echo number_format($pecah->produk_harga) ?></td>
                                        <td><?php echo $pecah->pembelian_produk_jumlah ?></td>
                                        <td>Rp. <?php echo number_format($pecah->produk_harga * $pecah->pembelian_produk_jumlah) ?></td>
                                    </tr>
                                <?php } ?>
                            <tfoot>
                                <tr>
                                    <th style="text-align: right;" colspan="4">Ongkos Kirim :</th>
                                    <td>Rp. <?php echo number_format($detail->pembelian_tarif) ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: right;" colspan="4">Total :</th>
                                    <td>Rp. <?php echo number_format($detail->pembelian_total); ?></td>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>