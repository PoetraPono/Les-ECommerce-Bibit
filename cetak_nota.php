<?php
session_start();
include('koneksi.php')
?>
<html>

<head>
    <title>Kebun Strawberry Organik Cemara</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body style='font-family:tahoma; font-size:8pt;'>
    <center>
        <div>
            <?php
            $id = $_GET['id'];
            $ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_member ON tb_pembelian.member_id = tb_member.member_id WHERE tb_pembelian.pembelian_id=$id ");
            $detail = $ambil->fetch_object();
            ?>
            <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
                <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
                    <span style='font-size:12pt'><b>Kebun Strawberry Organik Cemara</b></span></br>Jln. Lubuk Selasih, Alahan Panjang, Kec. Gunung Talang, Sumatera Barat 27573</br>Telp : 0812 7513 7378
                </td>
                <td style='vertical-align:top' width='30%' align='left'>
                    <b><span style='font-size:12pt'>NOTA Pembelian</span></b></br>
                    Nama Member : <?php echo $detail->member_nama ?></br>
                    Tanggal : <?php echo $detail->pembelian_tgl ?></br>

                </td>
            </table>
            <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border='0'>
                <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>

                </td>
                <td style='vertical-align:top' width='30%' align='left'>
                    No Hp : <?php echo $detail->member_nohp ?>
                    <br>
                    Alamat Pengiriman : <?php echo $detail->pembelian_alamat ?> | <?php echo $detail->pembelian_kota ?>
                </td>
            </table>
            <table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>

                <tr align='center'>
                    <td width='20%'>Nama Barang</td>
                    <td width='15%'>Harga</td>
                    <td width='10%'>Jumlah</td>
                    <td width='10%'>Diskon</td>
                    <td width='13%'>Total Harga</td>
                </tr>
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
                <tr>
                    <td colspan='4'>
                        <div style='text-align:right'>Ongkos Kirim : </div>
                    </td>
                    <td style='text-align:left'>Rp. <?php echo number_format($detail->pembelian_tarif); ?></td>
                </tr>
                <tr>
                    <td colspan='4'>
                        <div style='text-align:right'>Total Yang Harus di Bayarkan : </div>
                    </td>
                    <td style='text-align:right'>Rp. <?php echo number_format($detail->pembelian_total); ?></td>
                </tr>
            </table>
            <table style='width:650; font-size:7pt;' cellspacing='2'>
                <tr>
                    <td align='center'>Tanda Terima,</br></br><u>(<?php echo $detail->member_nama ?>)</u></td>
                    <td></td>
                    <td align='center'>Hormat Kami</u></td>
                </tr>
            </table>

        </div>
    </center>
    <script>
        window.print();
    </script>
</body>

</html>