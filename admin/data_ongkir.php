<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Data Ongkos Kirim</li>
    </ol>
    <h1>Data Ongkos Kirim</h1>

    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12 col-sm-12 margin-bottom-30">
                <div class="table-responsive">
                    <a href="index.php?page=aksi_ongkir/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Nama Kota</th>
                                <th>Tarif</th>
                                <th width="140px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM tb_ongkir");
                            while ($pecah = $ambil->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $pecah->ongkir_nama ?></td>
                                    <td><?php echo $pecah->ongkir_tarif ?></td>
                                    <td>
                                        <a href="index.php?page=aksi_ongkir/edit&id=<?php echo $pecah->ongkir_id ?>" class="btn btn-warning">Edit</a>
                                        <a href="index.php?page=aksi_ongkir/hapus&id=<?php echo $pecah->ongkir_id ?>" class="btn btn-danger">Delete</a>
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