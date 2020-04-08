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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Registrasi Member</h3>
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username : </label>
                                <input autofocus type="text" class="form-control" name="user">
                            </div>
                            <div class="form-group">
                                <label>Password : </label>
                                <input type="password" class="form-control" name="pass">
                            </div>
                            <div class="form-group">
                                <label>Nama : </label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label>No Hp : </label>
                                <input type="text" class="form-control" name="nohp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kelamin : </label>
                                <select class="form-control" name="jk">
                                    <option value="" selected>Pilih</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir : </label>
                                <input type="date" class="form-control" name="tgl_lahir">
                            </div>
                            <div class="form-group">
                                <label>Alamat : </label>
                                <textarea class="form-control" name="alamat" cols="30" rows="5"></textarea>
                            </div>
                            <button class="btn btn-primary" name="daftar">Daftar</button>
                            <br>
                    </form>
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
    if (isset($_POST['daftar'])) {
        // mk lakukan query cek akun pelanggan di db
        $user         = $_POST['user'];
        $pass         = $_POST['pass'];
        $nama         = $_POST['nama'];
        $nohp         = $_POST['nohp'];
        $jk           = $_POST['jk'];
        $tgl_lahir    = $_POST['tgl_lahir'];
        $alamat       = $_POST['alamat'];
        $tgl_dftr     = date('Y-d-m');

        $simpan = $koneksi->query("INSERT INTO tb_member (  `member_user`, 
                                                            `member_pass`, 
                                                            `member_nama`, 
                                                            `member_jk`, 
                                                            `member_tgl_lahir`, 
                                                            `member_alamat`, 
                                                            `member_nohp`, 
                                                            `member_tgl_daftar`) VALUES (
                                                                '$user',
                                                                '$pass',
                                                                '$nama',
                                                                '$jk',
                                                                '$tgl_lahir',
                                                                '$alamat',
                                                                '$nohp',
                                                                '$tgl_dftr'
                                                            )");

        if ($simpan) {
            echo "<script>alert('Anda telah menjadi member, Silahkan berbelanja');</script>";
            echo "<script>window.location='login.php'</script>";
        } else {
            // gagal login
            echo "<script>alert('Anda gagal mendaftar, Isi data dengan benar');</script>";
            echo "<script>window.location='register.php'</script>";
        }
    }
    ?>

    <?php include('components/footer.php') ?>

</body>

</html>