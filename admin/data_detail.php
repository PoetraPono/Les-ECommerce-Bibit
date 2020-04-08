<div class="templatemo-content">
    <?php
    $id = $_GET['id'];
    $ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_member ON tb_pembelian.member_id = tb_member.member_id WHERE tb_pembelian.pembelian_id=$id ");
    $detail = $ambil->fetch_object();
    ?>
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Data Detail Pembelian</li>
    </ol>
    <a href="index.php?page=data_pembelian" class="btn btn-success">Kembali</a>
    <a target="_blank" href="data_detail_cetak.php?id=<?php echo $detail->pembelian_id ?>" class="btn btn-primary"><span class="fa fa-print"></span> Cetak</a>
    <h1>Data Detail <strong><?php echo $detail->member_nama ?></strong></h1>
    <div class="templatemo-panels">
        <div class="container">

            <div class="row">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <p>
                        Tanggal : <?php echo tgl_indo($detail->pembelian_tgl) ?> <br>
                        Total yang akan di Bayar : <strong>Rp. <?php echo number_format($detail->pembelian_total) ?></strong>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pengiriman</h3>
                    Destinasi : <strong><?php echo $detail->pembelian_kota ?></strong><br>
                    Ongkos Kirim : Rp. <?php echo number_format($detail->pembelian_tarif) ?> <br>
                    Alamat Pengiriman : <?php echo $detail->pembelian_alamat ?>
                </div>
                <div class="col-md-4">
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