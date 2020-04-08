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
    <section>
        <div class="container">
            <?php
            $id = $_GET['id'];
            $ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_member ON tb_pembelian.member_id = tb_member.member_id WHERE tb_pembelian.pembelian_id=$id ");
            $detail = $ambil->fetch_object();
            ?>
            <h2>Nota Pembelian</h2>
            <a href="cetak_nota.php?id=<?php echo $id ?>" class="btn btn-success" target="_blank">Cetak</a>
            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <p>
                        Tanggal : <?php echo $detail->pembelian_tgl ?> <br>
                        Total yang akan di Bayar : <strong>Rp. <?php echo number_format($detail->pembelian_total) ?></strong>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Member</h3>
                    Nama Member : <strong><?php echo $detail->member_nama ?></strong><br>
                    <p>
                        No Hp Member : <?php echo $detail->member_nohp ?> <br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    Destinasi : <strong><?php echo $detail->pembelian_kota ?></strong><br>
                    Ongkos Kirim : Rp. <?php echo number_format($detail->pembelian_tarif) ?> <br>
                    Alamat Pengiriman : <?php echo $detail->pembelian_alamat ?>
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
                        <th>Diskon</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.produk_id=tb_produk.produk_id JOIN tb_kategori ON tb_produk.kategori_id=tb_kategori.kategori_id WHERE tb_pembelian_produk.pembelian_id='$_GET[id]' ");
                    while ($pecah = $ambil->fetch_object()) {
                        $subharga = $pecah->produk_harga * $pecah->pembelian_produk_jumlah;

                        if ($pecah->pembelian_produk_jumlah >= $pecah->produk_min) {
                            $diskon = $subharga * ($pecah->produk_diskon / 100);
                            $ttlsub = $subharga - $diskon;
                        } else {
                            $ttlsub = $subharga;
                        }

                        $total += $ttlsub;

                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $pecah->produk_nama ?></td>
                            <td>Rp. <?php echo number_format($pecah->produk_harga) ?></td>
                            <td><?php echo $pecah->pembelian_produk_jumlah . " $pecah->kategori_sat" ?></td>
                            <td>
                                <?php
                                    if ($pecah->pembelian_produk_jumlah >= $pecah->produk_min) {
                                        echo "Rp. " . number_format($diskon);
                                    } else {
                                        echo "Rp. 0";
                                    }
                                    ?>
                            </td>
                            <td><?php echo "Rp. " . number_format($subharga); ?></td>
                        </tr>
                    <?php } ?>
                <tfoot>
                    <tr>
                        <th style="text-align: right;" colspan="5">Ongkos Kirim :</th>
                        <td>Rp. <?php echo number_format($detail->pembelian_tarif) ?></td>
                    </tr>
                    <tr>
                        <th style="text-align: right;" colspan="5">Total :</th>
                        <td>Rp. <?php echo number_format($detail->pembelian_total); ?></td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-info">
                        <p>
                            Metode pembayaran Cash On Delivery (COD), Pembayaran di berikan kepada Kurir yang bertugas. <br>
                            Total uang yang harus di bayarkan adalah : Rp. <?php echo number_format($detail->pembelian_total) ?><br>
                            Kami akan menghubungi Anda via telephone. <br>
                            Terima kasih sudah berbelanja !
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </section>

    <?php include('components/footer.php') ?>

</body>

</html>