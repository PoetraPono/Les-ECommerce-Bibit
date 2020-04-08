<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Member Panel</a></li>
        <li><a href="index.php?page=data_member">Data Member</a></li>
        <li>Tambah Data Member</li>
    </ol>
    <h1>Tambah Data Member</h1>

    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12">
                <form method="post" role="form">
                    <div class=" row">
                        <div class="col-md-6 margin-bottom-15">
                            <label class="control-label">Username</label>
                            <input name="user" type="text" class="form-control">
                            <br>
                            <label class="control-label">Password</label>
                            <input name="pass" type="password" class="form-control">
                            <br>
                            <label class="control-label">Nama</label>
                            <input name="nama" type="text" class="form-control">
                            <br>
                            <label class="control-label">Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <br>
                            <label class="control-label">Tanggal Lahir</label>
                            <input name="lahir" type="date" class="form-control">
                            <br>
                            <label class="control-label">Alamat</label>
                            <input name="alamat" type="text" class="form-control">
                            <br>
                            <label class="control-label">No Hp</label>
                            <input name="nohp" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row templatemo-form-buttons">
                        <div class="col-md-12">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
                <br><br>
                <?php
                if (isset($_POST['simpan'])) {
                    $user   = $_POST['user'];
                    $pass   = $_POST['pass'];
                    $nama   = $_POST['nama'];
                    $jk     = $_POST['jk'];
                    $lahir  = $_POST['lahir'];
                    $alamat = $_POST['alamat'];
                    $nohp   = $_POST['nohp'];
                    $simpan = $koneksi->query("INSERT INTO tb_member (  member_user,
                                                                        member_pass,
                                                                        member_nama,
                                                                        member_jk,
                                                                        member_tgl_lahir,
                                                                        member_alamat,
                                                                        member_nohp,
                                                                        member_tgl_daftar) VALUES 
                                                                        ('$user',
                                                                        '$pass',
                                                                        '$nama',
                                                                        '$jk',
                                                                        '$lahir',
                                                                        '$alamat',
                                                                        '$nohp',
                                                                        NOW()) ");

                    if ($simpan) {
                        echo "<script>alert('Data berhasil di simpan')</script>";
                        echo "<script>window.location='index.php?page=data_member'</script>";
                    } else {
                        echo "<script>alert('Data gagal di simpan')</script>";
                        echo "<script>window.location='index.php?page=data_member'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>