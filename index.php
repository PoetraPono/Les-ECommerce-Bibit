<?php
error_reporting(0);
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
      <h1>List Produk</h1>
      <div class="row">

        <!-- Batas -->
        <?php
        $ambil = $koneksi->query("SELECT * FROM tb_produk");
        while ($pecah = $ambil->fetch_object()) {
          ?>
          <div class="col-md-4">
            <div class="thumbnail">
              <img style="width:100%; height:200px;" src="admin/assets/foto_produk/<?php echo $pecah->produk_foto; ?>" alt="Gagal Load Gambar">
              <div class="caption">
                <h3><?php echo $pecah->produk_nama; ?></h3>
                <h5>Rp. <?php echo number_format($pecah->produk_harga); ?></h5>
                <!-- <h5>Stok <?php // echo $pecah->produk_stok; 
                                ?></h5> -->
                <h5>Diskon : <?php echo $pecah->produk_diskon; ?>% Min. Beli <?php echo $pecah->produk_min ?></h5>
                <a class="btn btn-primary" href="beli.php?id=<?php echo $pecah->produk_id ?>">Beli</a>
                <a class="btn btn-success" href="detail.php?id=<?php echo $pecah->produk_id ?>">Detail</a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <br><br><br>
  <?php include('components/footer.php') ?>

</body>

</html>