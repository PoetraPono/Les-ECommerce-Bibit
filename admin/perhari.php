<!-- <?php
        // session_start();
        // include('koneksi.php');
        // $hari = $_POST['hari'];
        // if (!isset($_SESSION['admin'])) {
        //     echo "<script>alert('Anda harus login');location='login.php';</script>";
        // } 
        ?>
<!DOCTYPE html>

<head>
    <title>Kebun Strawberry Organik Cemara</title>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/foto_produk/logo.png">
    <?php // include('components/head.php'); 
    ?>
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
        <h3 class="col-sm-12" align="center"><u>Laporan Data Produk <?php // echo tgl_indo($hari)  
                                                                    ?></u></h3>
        <br>
        <br>
        <br>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $bulan = $_POST['bulan'];
                            // $ambil = $koneksi->query("SELECT
                            // *
                            // FROM
                            // db_batik.tb_pembelian INNER JOIN
                            // db_batik.tb_member ON db_batik.tb_pembelian.member_id = db_batik.tb_member.member_id INNER JOIN
                            // db_batik.tb_ongkir ON db_batik.tb_pembelian.ongkir_id = db_batik.tb_ongkir.ongkir_id WHERE tb_pembelian.pembelian_tgl LIKE '$hari%'");
                            // while ($pecah = $ambil->fetch_object()) {
                            //     $ttl += $pecah->pembelian_total;
                            ?>
                                <tr>
                                    <td><?php // echo $no++ 
                                        ?></td>
                                    <td><?php // echo $pecah->member_nama 
                                        ?></td>
                                    <td><?php //  echo $pecah->member_nohp 
                                        ?></td>
                                    <td><?php // echo tgl_indo($pecah->pembelian_tgl) 
                                        ?></td>
                                    <td><?php //  echo $pecah->pembelian_kota 
                                        ?></td>
                                    <?php // echo tgl_indo() 
                                    ?>
                                    <td>Rp. <?php // echo number_format($pecah->pembelian_total) 
                                            ?></td>
                                </tr>
                            <?php // } 
                            ?>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total</td>
                                <td>Rp. <?php // echo number_format($ttl) 
                                        ?></td>
                            </tr>
                        </tfoot>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html> -->