<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $tittle ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $tittle ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="col-md-12">
                                <form action="<?= base_url('Laporan/cari') ?>" method="post">
                                    <label>Cari Laporan</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dari</label>
                                                <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" name="dari">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sampai</label>
                                                <input type="date" value="<?= date('Y-m-d'); ?>" class="form-control" name="sampai">
                                            </div>
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" style="float: left;">
                                        <i class="fa fa-search"></i> Cari
                                    </button>

                                    <a href="<?= base_url('Laporan') ?>" class="btn btn-success">
                                        <i class="fa fa-refresh"></i> Refresh</a>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <table id="tblLaporan" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Tempat</th>
                                        <th>Harga Tempat</th>
                                        <th>Nama Kategori</th>
                                        <th>Nama Paket</th>
                                        <th>Harga Paket</th>
                                        <th>Total</th>
                                        <th>Tanggal Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $jumlahHarga = 0;
                                    $jumlaHargaPaket = 0;
                                    $jumlahTotal = 0;
                                    foreach ($laporan as $key => $value) {
                                        $jumlahHarga += $value['harga'];
                                        $jumlaHargaPaket += $value['harga_paket'];
                                        $hasil = $value['harga'] + $value['harga_paket'];
                                        $jumlahTotal += $hasil;
                                    }

                                    $no = 1;
                                    foreach ($laporan as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $value['kode_transaksi'] ?></td>
                                            <td><?= $value['nama'] ?></td>
                                            <td>Rp. <?= number_format($value['harga']) ?></td>
                                            <td><?= $value['nama_kategori'] ?></td>
                                            <td><?= $value['nama_paket'] ?></td>
                                            <td>Rp. <?= number_format($value['harga_paket']) ?></td>
                                            <td>
                                                <?php
                                                $hasil = $value['harga'] + $value['harga_paket']
                                                ?>
                                                <?= number_format($hasil) ?></td>

                                            <td><?= $value['start_event'] ?></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">Total Terjual</td>
                                        <th><?php echo number_format($jumlahHarga); ?></td>
                                        <th colspan="2">
                                            </td>
                                        <th>Rp.<?php echo number_format($jumlaHargaPaket); ?>,-</th>
                                        <th style="background:#0bb365;color:#fff;">Pendapatan</th>
                                        <th style="background:#0bb365;color:#fff;">
                                            Rp.<?php echo number_format($jumlahTotal); ?>,-</th>
                                    </tr>
                                </tfoot>
                            </table>

                            
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->