<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Login Administrator</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="assets/css/templatemo_main.css">

</head>

<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo">
          <h1>Login Administrator</h1>
        </div>
      </div>
    </div>
    <div class="template-page-wrapper">
      <form class="form-horizontal templatemo-signin-form" role="form" action="" method="POST">
        <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="user" placeholder="Username">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
          </div>
        </div>
      </form>
      <?php
      session_start();
      include 'koneksi.php';

      if (isset($_POST['login'])) {

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $ambil = $koneksi->query("SELECT * FROM tb_admin WHERE admin_user='$user' AND admin_pass='$pass'");
        $akun = $ambil->fetch_object();
        $cek = mysqli_num_rows($ambil);

        if ($cek == 1) {
          $_SESSION['admin'] = $akun->admin_nama;

          echo "<script>alert('Anda Berhasil Login');
                  window.location='index.php';
                  </script>";
        } else {
          echo "<script>alert('Anda Gagal Login');window.location='login.php';</script>";
        }
      }
      ?>
    </div>
  </div>
</body>

</html>