<?php
session_start();
include('koneksi.php');
// jk tdk ada session member. mk di larikan ke login
if (!isset($_SESSION["member"])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
    echo "<script>window.location='login.php'</script>";
}
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Berbelanja Dahulu');</script>";
    echo "<script>window.location='index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kebun Strawberry Organik Cemara</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>

<body>
    <!-- Nav bar -->
    <?php include('components/menu.php'); ?>
    <!-- Nav bar -->

    <section>
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width='10px'>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Diskon</th>
                        <th>Sub Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <!-- Menampilkan produk di session -->
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori ON tb_produk.kategori_id=tb_kategori.kategori_id WHERE tb_produk.produk_id = $id_produk");
                        $pecah = $ambil->fetch_object();

                        // echo "<pre>";
                        // print_r($pecah);
                        // echo "</pre>";
                        $subharga = $pecah->produk_harga * $jumlah;

                        if ($jumlah >= $pecah->produk_min) {
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
                            <td>Rp. <?php echo number_format($pecah->produk_harga); ?></td>
                            <td><?php echo $jumlah . " $pecah->kategori_sat"  ?></td>
                            <td>
                                <?php
                                if ($jumlah >= $pecah->produk_min) {
                                    echo "Rp. " . number_format($diskon);
                                } else {
                                    echo "Rp. 0";
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo "Rp. " . number_format($ttlsub); ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">Total Belanja :</th>
                        <th>Rp. <?php echo number_format($total); ?></th>
                    </tr>
                </tfoot>
            </table>
            <form method="post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Pembelian Atas Nama : </label>
                            <input type="text" class="form-control" readonly value="<?php echo $_SESSION['member']->member_nama; ?>">
                        </div>
                        <div class="col-md-4">
                            <label>No. Hp : </label>
                            <input type="text" class="form-control" readonly value="<?php echo $_SESSION['member']->member_nohp; ?>">
                        </div>
                        <div class="col-md-4">
                            <label>Alamat Tujuan : </label>
                            <select class="form-control" name="ongkir">
                                <option selected>Pilih</option>
                                <?php
                                $ambil_ongkir = $koneksi->query("SELECT * FROM tb_ongkir");
                                while ($pecah_ongkir = $ambil_ongkir->fetch_object()) {
                                ?>
                                    <option class="form-control" value="<?php echo $pecah_ongkir->ongkir_id ?>"><?php echo $pecah_ongkir->ongkir_nama ?> - Rp. <?php echo number_format($pecah_ongkir->ongkir_tarif); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Alamat Lengkap Pengiriman</label>
                        <textarea class="form-control" name="alamat_pengiriman" cols="30" rows="3" placeholder="Masukan alamat lengkap pengiriman (Termasuk kode pos)"></textarea>
                    </div>
                    <br>
                    <a href="keranjang.php"><span class="btn btn-success">Keranjang Belanja</span></a>
                    <button name="checkout" class=" btn btn-primary">Checkout</button>
                </div>
            </form>
            <?php
            if (isset($_POST['checkout'])) {
                $id_member            = $_SESSION['member']->member_id;
                $id_ongkir            = $_POST['ongkir'];
                $tgl                  = date("Y-m-d");
                $alamat_pengiriman    = $_POST['alamat_pengiriman'];
                $ambil_data_ongkir    = $koneksi->query("SELECT * FROM tb_ongkir WHERE ongkir_id = '$id_ongkir'");
                $pecah_tarif          = $ambil_data_ongkir->fetch_object();
                $tarif                = $pecah_tarif->ongkir_tarif;
                $nama_kota            = $pecah_tarif->ongkir_nama;

                $total_belanja        = $total + $tarif;

                // Menyimpan data ke tb_pembelian
                $koneksi->query("INSERT INTO tb_pembelian ( member_id,ongkir_id,
                                                            pembelian_tgl,
                                                            pembelian_total,
                                                            pembelian_kota,
                                                            pembelian_tarif,
                                                            pembelian_alamat) 
                                                            VALUES 
                                                        (   '$id_member',
                                                            '$id_ongkir',
                                                            '$tgl',
                                                            '$total_belanja',
                                                            '$nama_kota',
                                                            '$tarif',
                                                            '$alamat_pengiriman')");

                // mendapatkan id pembelian barusan
                $id_pembelian_barusan = $koneksi->insert_id;
                foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                    // Update stok
                    $ambil_produk = $koneksi->query("SELECT * FROM tb_produk WHERE produk_id=$id_produk");
                    while ($pecah_produk = $ambil_produk->fetch_object()) {
                        $update_stok = $pecah_produk->produk_stok - $jumlah;
                        $koneksi->query("UPDATE `tb_produk` SET `produk_stok`='$update_stok' WHERE `produk_id`='$id_produk'");
                    }

                    $koneksi->query("INSERT INTO tb_pembelian_produk    (pembelian_id,
                                                                        produk_id,
                                                                        pembelian_produk_jumlah) VALUES ('$id_pembelian_barusan',
                                                                        '$id_produk',
                                                                        '$jumlah')");
                }
                //mengkosongkan keranjang belanja 
                unset($_SESSION['keranjang']);
                // tampilan di alihkan ke halaman nota
                echo "<script>alert('Pembelian Sukses');</script>";
                echo "<script>window.location='nota.php?id=$id_pembelian_barusan';</script>";
            } ?>
        </div>
    </section>

    <?php include('components/footer.php') ?>
</body>

</html>