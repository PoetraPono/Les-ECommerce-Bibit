<div class="templatemo-content">
    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Data Penjualan</li>
    </ol>
    <h1>Data Penjualan</h1>

    <div class="templatemo-panels">
        <div class="row">
            <!-- <div class="col-md-4">
                <form action="perhari.php" method="post" target="_blank">
                    <div class="form-group">
                        <label>Laporan Penjualan Per-Hari</label>
                        <input class="form-control" type="date" name="hari" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Print</button>
                    </div>
                </form>
            </div> -->
            <div class="col-md-4">
                <form action="perbulan.php" target="_blank" method="post">
                    <div class="form-group">
                        <label>Laporan Penjualan Per-Bulan</label>
                        <input class="form-control" type="month" name="bulan" value="<?php echo date('Y-m'); ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Print</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form action="pertahun.php" method="post" target="_blank">
                    <div class="form-group">
                        <label>Laporan Penjualan Per-Tahun</label>
                        <input class="form-control" type="number" min="2013" max="2023" name="tahun" value="<?php echo date('Y'); ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>