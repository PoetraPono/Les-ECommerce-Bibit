<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Data Member</li>
    </ol>
    <h1>Data Member</h1>
    <div class="templatemo-panels">
        <div class="row">
            <div class="col-md-12 col-sm-12 margin-bottom-30">
                <div class="table-responsive">
                    <a href="index.php?page=aksi_member/tambah" class="btn btn-primary">Tambah Data</a>
                    <br><br>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>No Hp</th>
                                <th>Tanggal Daftar</th>
                                <th width="140px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM tb_member");
                            while ($pecah = $ambil->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $pecah->member_user ?></td>
                                    <td><?php echo $pecah->member_pass ?></td>
                                    <td><?php echo $pecah->member_nama ?></td>
                                    <td><?php echo $pecah->member_jk ?></td>
                                    <td><?php echo $pecah->member_tgl_lahir ?></td>
                                    <td><?php echo $pecah->member_alamat ?></td>
                                    <td><?php echo $pecah->member_nohp ?></td>
                                    <td><?php echo $pecah->member_tgl_daftar ?></td>
                                    <td>
                                        <a href="index.php?page=aksi_member/edit&id=<?php echo $pecah->member_id ?>" class="btn btn-warning">Edit</a>
                                        <a href="index.php?page=aksi_member/hapus&id=<?php echo $pecah->member_id ?>" class="btn btn-danger">Delete</a>
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