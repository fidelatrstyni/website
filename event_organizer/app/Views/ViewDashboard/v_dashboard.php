<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $tittle?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $tittle?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?= count($jmlUser)?></h3>
                            <p>Jumlah Users</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user"></i>
                            </i>
                        </div>
                        <a href="<?= base_url('DataUsers') ?>" class="small-box-footer">Info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <?php 
                        
                    ?>

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= count($jmlLokasi)?></h3>
                            <p>Jumlah Lokasi</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <a href="<?= base_url('DataLokasi') ?>" class="small-box-footer">Info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?= count($jmlKategori)?></h3>
                            <p>Jumlah Kategori</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="fa-solid fa-house"></i> -->
                            <i class="fa fa-box-open"></i>
                        </div>
                        <a href="<?= base_url('Kategori') ?>" class="small-box-footer">Info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= count($jmlPaket)?></h3>
                            <p>Jumlah Paket</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-list"></i>
                        </div>
                        <a href="<?= base_url('Paket') ?>" class="small-box-footer">Info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= count($trsProses)?></h3>
                            <p>Transaksi Proses</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-handshake"></i>
                        </div>
                        <a href="<?= base_url('DataTransaksi') ?>" class="small-box-footer">Info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?= count($trsSelesai)?></h3>
                            <p>Transaksi Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-handshake"></i>
                        </div>
                        <a href="<?= base_url('DataTransaksi/selesai') ?>" class="small-box-footer">Info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>


        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->