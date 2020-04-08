<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=data_member">Data Member</a></li>
        <li>Edit Data Member</li>
    </ol>
    <h1>Edit Data Member</h1>

    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12">
                <?php
                $id = $_GET['id'];
                $ambil = $koneksi->query("SELECT * FROM tb_member WHERE member_id = $id");
                while ($pecah = $ambil->fetch_object()) {
                    ?>
                    <form method="post" role="form">
                        <div class=" row">
                            <div class="col-md-6 margin-bottom-15">
                                <label class="control-label">Username</label>
                                <input value="<?php echo $pecah->member_id ?>" name="id" type="hidden">
                                <input value="<?php echo $pecah->member_user ?>" name="user" type="text" class="form-control">
                                <br>
                                <label class="control-label">Password</label>
                                <input value="<?php echo $pecah->member_pass ?>" name="pass" type="password" class="form-control">
                                <br>
                                <label class="control-label">Nama</label>
                                <input value="<?php echo $pecah->member_nama ?>" name="nama" type="text" class="form-control">
                                <br>
                                <label class="control-label">Jenis Kelamin</label>
                                <select name="jk" class="form-control">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <br>
                                <label class="control-label">Tanggal Lahir</label>
                                <input value="<?php echo $pecah->member_tgl_lahir ?>" name="lahir" type="date" class="form-control">
                                <br>
                                <label class="control-label">Alamat</label>
                                <input value="<?php echo $pecah->member_alamat ?>" name="alamat" type="text" class="form-control">
                                <br>
                                <label class="control-label">No Hp</label>
                                <input value="<?php echo $pecah->member_nohp ?>" name="nohp" type="text" class="form-control">
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
                    $id       = $_POST['id'];
                    $user     = $_POST['user'];
                    $pass     = $_POST['pass'];
                    $nama     = $_POST['nama'];
                    $jk       = $_POST['jk'];
                    $lahir    = $_POST['lahir'];
                    $alamat   = $_POST['alamat'];
                    $nohp     = $_POST['nohp'];
                    $Edit = $koneksi->query("UPDATE tb_member SET   member_user         = '$user',
                                                                    member_pass         = '$pass',
                                                                    member_nama         = '$nama',
                                                                    member_jk           = '$jk',
                                                                    member_tgl_lahir    = '$lahir',
                                                                    member_alamat       = '$alamat',
                                                                    member_nohp         = '$nohp'
                                                                    WHERE member_id     = '$id' ");

                    if ($Edit) {
                        echo "<script>alert('Data berhasil di Edit')</script>";
                        echo "<script>window.location='index.php?page=data_member'</script>";
                    } else {
                        echo "<script>alert('Data gagal di Edit')</script>";
                        echo "<script>window.location='index.php?page=data_member'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>