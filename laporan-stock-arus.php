<?php
include '_header.php';
include '_nav.php';
include '_sidebar.php';
?>

<?php
if ($levelLogin === "kurir" || $levelLogin === "kasir") {
    echo "
      <script>
        document.location.href = 'bo';
      </script>
    ";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Arus Stok</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="bo">Home</a></li>
                        <li class="breadcrumb-item active">Laporan Arus Stok</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Laporan Arus Stok Keseluruhan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-auto">
                            <!-- Filter Form -->
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input type="date" name="tgl_awal" class="form-control" value="<?= date('Y-m-01'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input type="date" name="tgl_akhir" class="form-control" value="<?= date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Kategori Produk</label>
                                            <select name="kategori" class="form-control select2">
                                                <option value="">-- Semua Kategori --</option>
                                                <?php
                                                $kategoriData = query("SELECT * FROM kategori ORDER BY kategori_id ASC");
                                                foreach ($kategoriData as $kt) :
                                                ?>
                                                    <option value="<?= $kt['kategori_id']; ?>"><?= $kt['kategori_nama']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Jenis Transaksi</label>
                                            <select name="jenis_transaksi" class="form-control">
                                                <option value="">-- Semua Transaksi --</option>
                                                <option value="masuk">Stok Masuk</option>
                                                <option value="keluar">Stok Keluar</option>
                                                <option value="transfer">Transfer Stok</option>
                                                <option value="penyesuaian">Penyesuaian Stok</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" name="filter" class="btn btn-primary">
                                                <i class="fa fa-search"></i> Filter Data
                                            </button>
                                            <a href="laporan-arus-stok-cetak" target="_blank" class="btn btn-success">
                                                <i class="fa fa-print"></i> Cetak Laporan
                                            </a>
                                            <a href="laporan-arus-stok-export" class="btn btn-info">
                                                <i class="fa fa-file-excel-o"></i> Export Excel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- End Filter Form -->

                            <?php
                            // Set Default Dates if not filtered
                            $tgl_awal = date('Y-m-01');
                            $tgl_akhir = date('Y-m-d');
                            $kategori = "";
                            $jenis_transaksi = "";

                            // Check if form is submitted
                            if (isset($_POST['filter'])) {
                                $tgl_awal = $_POST['tgl_awal'];
                                $tgl_akhir = $_POST['tgl_akhir'];
                                $kategori = $_POST['kategori'];
                                $jenis_transaksi = $_POST['jenis_transaksi'];
                            }

                            // Build query based on filters
                            $queryFilter = "";

                            if (!empty($kategori)) {
                                $queryFilter .= " AND barang_kategori = $kategori";
                            }

                            if (!empty($jenis_transaksi)) {
                                if ($jenis_transaksi == "masuk") {
                                    $queryFilter .= " AND stok_tipe = 'masuk'";
                                } else if ($jenis_transaksi == "keluar") {
                                    $queryFilter .= " AND stok_tipe = 'keluar'";
                                } else if ($jenis_transaksi == "transfer") {
                                    $queryFilter .= " AND stok_tipe = 'transfer'";
                                } else if ($jenis_transaksi == "penyesuaian") {
                                    $queryFilter .= " AND stok_tipe = 'penyesuaian'";
                                }
                            }

                            // Main query
                            $data = query("SELECT 
                                  a.*,
                                  b.barang_kode,
                                  b.barang_nama,
                                  b.barang_kategori,
                                  c.kategori_nama
                                FROM 
                                  stok_history a
                                LEFT JOIN 
                                  barang b ON a.history_barang_id = b.barang_id
                                LEFT JOIN 
                                  kategori c ON b.barang_kategori = c.kategori_id
                                WHERE 
                                  a.history_date BETWEEN '$tgl_awal' AND '$tgl_akhir' 
                                  AND a.history_cabang = $sessionCabang
                                  $queryFilter
                                ORDER BY 
                                  a.history_id DESC");
                            ?>

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kategori</th>
                                        <th>Tipe</th>
                                        <th style="text-align: center;">Jumlah</th>
                                        <th>No. Referensi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1; ?>
                                    <?php foreach ($data as $row) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= tanggal_indo($row['history_date']); ?></td>
                                            <td><?= $row['barang_kode']; ?></td>
                                            <td><?= $row['barang_nama']; ?></td>
                                            <td><?= $row['kategori_nama']; ?></td>
                                            <td>
                                                <?php
                                                if ($row['stok_tipe'] == "masuk") {
                                                    echo "<span class='badge badge-success'>Masuk</span>";
                                                } elseif ($row['stok_tipe'] == "keluar") {
                                                    echo "<span class='badge badge-danger'>Keluar</span>";
                                                } elseif ($row['stok_tipe'] == "transfer") {
                                                    echo "<span class='badge badge-info'>Transfer</span>";
                                                } else {
                                                    echo "<span class='badge badge-warning'>Penyesuaian</span>";
                                                }
                                                ?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?= number_format($row['history_jumlah'], 0, ',', '.'); ?>
                                            </td>
                                            <td><?= $row['history_ref']; ?></td>
                                            <td><?= $row['history_keterangan']; ?></td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</div>

<?php include '_footer.php'; ?>

<script>
    $(function() {
        $("#example1").DataTable();
        $('.select2').select2();
    });
</script>
</body>

</html>