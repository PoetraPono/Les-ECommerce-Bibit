<?php
error_reporting(0);
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
  <?php include('components/top-bar.php'); ?>
  <div class="template-page-wrapper">

    <?php include('components/side-bar.php'); ?>

    <?php include('contents.php') ?>

    <?php include('components/footer.php'); ?>
  </div>

  <?php include('components/scripts.php'); ?>

  <!-- <script type="text/javascript">
    var myImage = new Image(300, 300);
    myImage.src = 'assets/foto_produk/<?php echo $pecah->produk_foto ?>';
    x = document.getElementById("gambar");
    x.appendChild(myImage);
  </script> -->
</body>

</html>