<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Admin Panel</a></li>
        <li><a href="index.php?page=data_admin">Data Admin</a></li>
        <li>Tambah Data Admin</li>
    </ol>
    <h1>Tambah Data Admin</h1>

    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12">
                <form method="post" role="form">
                    <div class=" row">
                        <div class="col-md-6 margin-bottom-15">
                            <label for="firstName" class="control-label">Username</label>
                            <input name="uname" type="text" class="form-control">
                            <br>
                            <label for="lastName" class="control-label">Password</label>
                            <input name="pass" type="password" class="form-control">
                            <br>
                            <label for="password_1">Nama</label>
                            <input name="nama" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row templatemo-form-buttons">
                        <div class="col-md-12">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['simpan'])) {
                    $user = $_POST['uname'];
                    $pass = $_POST['pass'];
                    $nama = $_POST['nama'];
                    $simpan = $koneksi->query("INSERT INTO tb_admin (admin_user,admin_pass,admin_nama) VALUES ('$user','$pass','$nama') ");

                    if ($simpan) {
                        echo "<script>alert('Data berhasil di simpan')</script>";
                        echo "<script>window.location='index.php?page=data_admin'</script>";
                    } else {
                        echo "<script>alert('Data gagal di simpan')</script>";
                        echo "<script>window.location='index.php?page=data_admin'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>