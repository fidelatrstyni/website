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
                        <li class="breadcrumb-item"><a href="<?= base_url('DataTransaksi') ?>">Transaksi</a></li>
                        <li class="breadcrumb-item active"><?= $tittle?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <form action="<?= base_url('DataTransaksi/update') ?>" method="post">
                            <div class="card-header">
                                Edit Transaksi
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <?php foreach($hasil as $key => $value){?>
                                        <input type="hidden" name="id" value="<?= $value['id']?>">
                                        <div class="form-group">
                                            <label>Verififikasi</label>
                                            <select name="verifikasi" class="form-control" id="">
                                                <option value="diajukan"
                                                    <?= (($value['verifikasi']) == 'diajukan' ? 'selected' : '')?>>
                                                    Diajukan</option>
                                                <option value="ditolak"
                                                    <?= (($value['verifikasi']) == 'ditolak' ? 'selected' : '')?>>
                                                    Ditolak</option>
                                                <option value="diterima"
                                                    <?= (($value['verifikasi']) == 'diterima' ? 'selected' : '')?>>
                                                    Diterima</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="Proses"
                                                    <?= (($value['status']) == 'Proses' ? 'selected' : '')?>>Proses
                                                </option>
                                                <option value="Selesai"
                                                    <?= (($value['status']) == 'Selesai' ? 'selected' : '')?>>Selesai
                                                </option>
                                            </select>
                                        </div>

                                        <?php }?>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer" style="text-align: right;">
                                <button type="button"
                                    onClick="window.location.href = '<?php echo base_url();?>/DataTransaksi'"
                                    class="btn">Cancel</button>
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>


</div>