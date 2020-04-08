<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=data_admin">Data Admin</a></li>
        <li>Edit Data Admin</li>
    </ol>
    <h1>Edit Data Admin</h1>

    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12">
                <?php
                $id = $_GET['id'];
                $ambil = $koneksi->query("SELECT * FROM tb_admin WHERE admin_id = $id");
                while ($pecah = $ambil->fetch_object()) {
                    ?>
                    <form method="post" role="form">
                        <div class=" row">
                            <div class="col-md-6 margin-bottom-15">
                                <label class="control-label">Username</label>
                                <input value="<?php echo $pecah->admin_id ?>" name="id" type="hidden">
                                <input value="<?php echo $pecah->admin_user ?>" name="uname" type="text" class="form-control">
                                <br>
                                <label class="control-label">Password</label>
                                <input value="<?php echo $pecah->admin_pass ?>" name="pass" type="password" class="form-control">
                                <br>
                                <label class="control-label">Nama</label>
                                <input value="<?php echo $pecah->admin_nama ?>" name="nama" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row templatemo-form-buttons">
                            <div class="col-md-12">
                                <input type="submit" name="edit" value="Edit" class="btn btn-success">
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
                <?php
                if (isset($_POST['edit'])) {
                    $id = $_POST['id'];
                    $user = $_POST['uname'];
                    $pass = $_POST['pass'];
                    $nama = $_POST['nama'];
                    $Edit = $koneksi->query("UPDATE tb_admin SET    admin_user        = '$user',
                                                                    admin_pass        = '$pass',
                                                                    admin_nama        = '$nama'
                                                                    WHERE admin_id    = '$id' ");

                    if ($Edit) {
                        echo "<script>alert('Data berhasil di Edit')</script>";
                        echo "<script>window.location='index.php?page=data_admin'</script>";
                    } else {
                        echo "<script>alert('Data gagal di Edit')</script>";
                        echo "<script>window.location='index.php?page=data_admin'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>