<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Data Produk</li>
    </ol>
    <h1>Data Produk</h1>
    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12 col-sm-12 margin-bottom-30">
                <div class="table-responsive">
                    <a href="index.php?page=aksi_produk/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Spesifikasi</th>
                                <th>Diskon</th>
                                <th>Foto</th>
                                <th>Tanggal Post</th>
                                <th width="140px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM tb_produk");
                            while ($pecah = $ambil->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $pecah->produk_nama ?></td>
                                    <td><?php echo $pecah->produk_harga ?></td>
                                    <td><?php echo $pecah->produk_stok ?></td>
                                    <td><?php echo $pecah->produk_spek ?></td>
                                    <td><?php echo $pecah->produk_diskon ?></td>
                                    <td><img width="100" src="assets/foto_produk/<?php echo $pecah->produk_foto ?>" alt=""></td>
                                    <td><?php echo $pecah->produk_tgl_post ?></td>
                                    <td>
                                        <a href="index.php?page=aksi_produk/edit&id=<?php echo $pecah->produk_id ?>" class="btn btn-warning">Edit</a>
                                        <a href="index.php?page=aksi_produk/hapus&id=<?php echo $pecah->produk_id ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>