<?php
session_start();
include('koneksi.php');

// jk kosong keranjang belanja,mk larikan ke index
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Berbelanja Dahulu');</script>";
    echo "<script>window.location='index.php'</script>";
}
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
                        <th width="62px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) :
                        print_r($jumlah);
                        ?>
                        <!-- Menampilkan produk di session -->
                        <?php
                            $ambil = $koneksi->query("SELECT * FROM tb_produk JOIN tb_kategori ON tb_produk.kategori_id=tb_kategori.kategori_id WHERE tb_produk.produk_id = $id_produk");
                            $pecah = $ambil->fetch_object();
                            // Mencari subharga
                            $subharga = $pecah->produk_harga * $jumlah;

                            ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $pecah->produk_nama ?></td>
                            <td>Rp. <?php echo number_format($pecah->produk_harga); ?></td>
                            <td><?php echo $jumlah . " $pecah->kategori_sat" ?> </td>
                            <td>
                                <?php
                                    if ($jumlah >= $pecah->produk_min) {
                                        echo $pecah->produk_diskon . " %";
                                    } else {
                                        echo 0 . " %";
                                    }
                                    ?>
                            </td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td>
                                <a href="hapuskeranjang.php?id=<?php echo $pecah->produk_id ?>" class="btn btn-danger btn-xs">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-success">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>
    </section>

    <?php include('components/footer.php') ?>

</body>

</html>