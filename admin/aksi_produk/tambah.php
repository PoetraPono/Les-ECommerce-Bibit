<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Produk Panel</a></li>
        <li><a href="index.php?page=data_produk">Data Produk</a></li>
        <li>Tambah Data Produk</li>
    </ol>
    <h1>Tambah Data Produk</h1>

    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12">
                <form method="post" role="form" enctype="multipart/form-data">
                    <div class=" row">
                        <div class="col-md-6 margin-bottom-15">
                            <label class="control-label">Nama Produk</label>
                            <input name="nama" type="text" class="form-control">
                            <br>
                            <label class="control-label">Kategori</label>
                            <select name="kat" class="form-control">
                                <?php
                                $ambil_kategori = $koneksi->query("SELECT * FROM tb_kategori");
                                while ($pecah_kategori = $ambil_kategori->fetch_object()) {
                                    ?>
                                    <option value="<?php echo $pecah_kategori->kategori_id ?>"><?php echo $pecah_kategori->kategori_nama ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <label class="control-label">Harga</label>
                            <input name="harga" type="number" class="form-control">
                            <br>
                            <label class="control-label">Stok</label>
                            <input name="stok" type="number" class="form-control">
                            <br>
                            <label class="control-label">Spesifikasi</label>
                            <input name="spek" type="text" class="form-control">
                            <br>
                            <label class="control-label">Diskon</label>
                            <input name="diskon" type="number" class="form-control">
                            <br>
                            <label class="control-label">Minimal Pembalian Untuk Mendapatkan Diskon</label>
                            <input name="min" type="number" class="form-control">
                            <br>
                            <label class="control-label">Foto</label>
                            <input name="foto" type="file" class="form-control">
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

                    $foto   = $_FILES['foto']['name'];
                    $lokasi = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($lokasi, "assets/foto_produk/" . $foto);

                    $nama   = $_POST['nama'];
                    $kat    = $_POST['kat'];
                    $harga  = $_POST['harga'];
                    $stok   = $_POST['stok'];
                    $spek   = $_POST['spek'];
                    $diskon = $_POST['diskon'];
                    $min    = $_POST['min'];

                    $simpan = $koneksi->query("INSERT INTO tb_produk (  produk_nama,
                                                                        kategori_id,
                                                                        produk_harga,
                                                                        produk_stok,
                                                                        produk_spek,
                                                                        produk_diskon,
                                                                        produk_min,
                                                                        produk_foto,
                                                                        produk_tgl_post) VALUES 
                                                                        ('$nama',
                                                                        '$kat',
                                                                        '$harga',
                                                                        '$stok',
                                                                        '$spek',
                                                                        '$diskon',
                                                                        '$min',
                                                                        '$foto',
                                                                        NOW()) ");

                    if ($simpan) {
                        echo "<script>alert('Data berhasil di simpan')</script>";
                        echo "<script>window.location='index.php?page=data_produk'</script>";
                    } else {
                        echo "<script>alert('Data gagal di simpan')</script>";
                        echo "<script>window.location='index.php?page=data_produk'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>