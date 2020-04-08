<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=data_produk">Data Produk</a></li>
        <li>Edit Data Produk</li>
    </ol>
    <h1>Edit Data Produk</h1>
    <br>
    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12">
                <?php
                $id = $_GET['id'];
                $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE produk_id = $id");
                while ($pecah = $ambil->fetch_object()) {
                    ?>
                    <form method="post" role="form" enctype="multipart/form-data">
                        <div class=" row">
                            <div class="col-md-6 margin-bottom-15">
                                <label class="control-label">Kategori</label>
                                <select class="form-control" name="kat">
                                    <option value="<?php echo $pecah->kategori_id ?>">Pilih Kategori</option>
                                    <?php
                                        $ambil = $koneksi->query("SELECT * FROM tb_kategori");
                                        while ($pecah_kat = $ambil->fetch_object()) {
                                            ?>
                                        <option value="<?php echo $pecah_kat->kategori_id ?>"><?php echo $pecah_kat->kategori_nama ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <label class="control-label">Nama Produk</label>
                                <input value="<?php echo $pecah->produk_id ?>" name="id" type="hidden" class="form-control">
                                <input value="<?php echo $pecah->produk_nama ?>" name="nama" type="text" class="form-control">
                                <br>
                                <label class="control-label">Harga</label>
                                <input value="<?php echo $pecah->produk_harga ?>" name="harga" type="number" class="form-control">
                                <br>
                                <label class="control-label">Stok</label>
                                <input value="<?php echo $pecah->produk_stok ?>" name="stok" type="number" class="form-control">
                                <br>
                                <label class="control-label">Minimal Pembelian</label>
                                <input value="<?php echo $pecah->produk_min ?>" name="min" type="number" class="form-control">
                                <br>
                                <label class="control-label">Spesifikasi</label>
                                <input value="<?php echo $pecah->produk_spek ?>" name="spek" type="text" class="form-control">
                                <br>
                                <label class="control-label">Diskon</label>
                                <input value="<?php echo $pecah->produk_diskon ?>" name="diskon" type="number" class="form-control">
                                <br>
                                <!-- <div id="gambar"></div> -->
                                <label class="control-label">Foto</label>
                                <input name="foto" value="<?php echo $pecah->produk_foto ?>" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="row templatemo-form-buttons">
                            <div class="col-md-12">
                                <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
                <?php
                if (isset($_POST['edit'])) {
                    $foto   = $_FILES['foto']['name'];
                    $lokasi = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($lokasi, "assets/foto_produk/" . $foto);

                    $nama   = $_POST['nama'];
                    $harga  = $_POST['harga'];
                    $stok   = $_POST['stok'];
                    $spek   = $_POST['spek'];
                    $min   = $_POST['min'];
                    $diskon = $_POST['diskon'];
                    $kat = $_POST['kat'];

                    $Edit = $koneksi->query("UPDATE tb_produk SET   produk_nama      = '$nama',
                                                                    kategori_id      = '$kat',
                                                                    produk_harga     = '$harga',
                                                                    produk_stok      = '$stok',
                                                                    produk_spek      = '$spek',
                                                                    produk_diskon    = '$diskon',
                                                                    produk_min       = '$min',
                                                                    produk_foto      = '$foto'
                                                                    WHERE produk_id  = '$id' ");

                    if ($Edit) {
                        echo "<script>alert('Data berhasil di Edit')</script>";
                        echo "<script>window.location='index.php?page=data_produk'</script>";
                    } else {
                        echo "<script>alert('Data gagal di Edit')</script>";
                        echo "<script>window.location='index.php?page=data_produk'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>