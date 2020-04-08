<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Data Pembelian</li>
    </ol>
    <h1>Data Pembelian</h1>

    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12 col-sm-12 margin-bottom-30">
                <div class="table-responsive">
                    <br>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Member</th>
                                <th>No Hp</th>
                                <th>Tanggal Pembelian</th>
                                <th>Tujuan Pengiriman</th>
                                <th>Total Pembelian</th>
                                <th width="65px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ambil = $koneksi->query("SELECT
                            *
                            FROM
                            db_batik.tb_pembelian INNER JOIN
                            db_batik.tb_member ON db_batik.tb_pembelian.member_id = db_batik.tb_member.member_id INNER JOIN
                            db_batik.tb_ongkir ON db_batik.tb_pembelian.ongkir_id = db_batik.tb_ongkir.ongkir_id");
                            while ($pecah = $ambil->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $pecah->member_nama ?></td>
                                    <td><?php echo $pecah->member_nohp ?></td>
                                    <td><?php echo tgl_indo($pecah->pembelian_tgl) ?></td>
                                    <td><?php echo $pecah->pembelian_kota ?></td>
                                    <td>Rp. <?php echo number_format($pecah->pembelian_total) ?></td>
                                    <td>
                                        <a href="index.php?page=data_detail&id=<?php echo $pecah->pembelian_id ?>" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>