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


    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Jgn di hapus -->
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Login Member</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Username : </label>
                                <input type="text" class="form-control" name="user">
                            </div>
                            <div class="form-group">
                                <label>Password : </label>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                            <br><br>
                        </form>
                        <p>Belum daftar ? <a href="register.php">Daftar Disini</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Jgn di hapus -->
            </div>
        </div>
    </div>
    <?php
    // jk ada tombol login di tekan 
    if (isset($_POST['login'])) {
        // mk lakukan query cek akun Member di db
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $ambil = $koneksi->query("SELECT * FROM tb_member WHERE member_user='$user'AND member_pass='$pass'");

        // hitung akun yang terambil
        $cek = $ambil->num_rows;
        // jk 1 akun yg cocok mk boleh di loginkan
        if ($cek == 1) {
            // anda sudah login
            // mendapatkan akun dlm btk array
            $akun = $ambil->fetch_object();

            // Simpan di session member
            $_SESSION["member"] = $akun;

            echo "<script>alert('Anda sukses login, Silahkan berbelanja');</script>";
            echo "<script>window.location='index.php'</script>";
        } else {
            // gagal login
            echo "<script>alert('Anda gagal login, Periksa username dan password');</script>";
            echo "<script>window.location='login.php'</script>";
        }
    }
    ?>

    <?php include('components/footer.php') ?>

</body>

</html>