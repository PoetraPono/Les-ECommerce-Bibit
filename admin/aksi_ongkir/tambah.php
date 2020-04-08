<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=data_ongkir">Data Ongkos Kirim</a></li>
        <li>Tambah Data Ongkos Kirim</li>
    </ol>
    <h1>Tambah Data Ongkos Kirim</h1>

    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12">
                <form method="post" role="form">
                    <div class=" row">
                        <div class="col-md-6 margin-bottom-15">
                            <label for="firstName" class="control-label">Nama kota</label>
                            <input name="nama" type="text" class="form-control">
                            <br>
                            <label for="lastName" class="control-label">Tarif</label>
                            <input name="tarif" type="text" class="form-control">
                            <br>
                        </div>
                    </div>
                    <div class="row templatemo-form-buttons">
                        <div class="col-md-12">
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
                <br>
                <?php
                if (isset($_POST['simpan'])) {
                    $nama   = $_POST['nama'];
                    $tarif  = $_POST['tarif'];
                    $simpan = $koneksi->query("INSERT INTO tb_ongkir (ongkir_nama,ongkir_tarif) VALUES ('$nama','$tarif') ");

                    if ($simpan) {
                        echo "<script>alert('Data berhasil di simpan')</script>";
                        echo "<script>window.location='index.php?page=data_ongkir'</script>";
                    } else {
                        echo "<script>alert('Data gagal di simpan')</script>";
                        echo "<script>window.location='index.php?page=data_ongkir'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>