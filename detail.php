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
            <h1>Detail Produk</h1>
            <div class="row">
                <!-- Batas -->
                <?php
                $id_produk = $_GET['id'];
                $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE produk_id = $id_produk ");
                $pecah = $ambil->fetch_object();
                ?>
                <div class="col-md-4">
                    <img style="width:100%; height:600px;" src="admin/assets/foto_produk/<?php echo $pecah->produk_foto; ?>" alt="Gagal Load Gambar">
                </div>
                <div class="col-md-8">
                    <h2><?php echo $pecah->produk_nama; ?></h2>
                    <h4><strong>Harga : </strong>Rp. <?php echo number_format($pecah->produk_harga); ?></h4>
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah">
                            </div>
                            <br>
                            <button class="btn btn-primary" name="beli">Beli</button>
                            <a href="index.php" class="btn btn-success">Kembali</a>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['beli'])) {
                        // mendpatkan jumlah yang di inputkan
                        $jumlah = $_POST['jumlah'];
                        $_SESSION['keranjang'][$id_produk] += $jumlah;
                        echo "<script>alert('Produk Telah Masuk Ke Keranjang Belanja');</script>";
                        echo "<script>window.location='keranjang.php'</script>";
                    }
                    ?>
                    <p><strong>Deskripsi Produk : </strong> <br><?php echo $pecah->produk_spek; ?></p>

                </div>

            </div>
            <br><br><br>
        </div>
    </section>

    <?php include('components/footer.php') ?>

</body>

</html>