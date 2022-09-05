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
                        <li class="breadcrumb-item"><a href="<?= base_url('Electre/kriteria') ?>">Electre</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Electre/kriteria') ?>">Kriteria</a></li>
                        <li class="breadcrumb-item active"><?= $tittle?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php if($status == 'tambah') {?>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <form action="<?= base_url('Electre/saveKriteria') ?>" method="post">
                            <div class="card-header" >
                                Tambah Kriteria
                            </div>
                            <div class="card-body">



                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <input type="text" class="form-control" name="nama_kriteria"
                                                placeholder="Kriteria" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Bobot</label>
                                            <input type="number" class="form-control" name="bobot" placeholder="Bobot"
                                                required>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="card-footer" style="text-align: right;">
                                <button type="button" onClick="window.location.href = '<?php echo base_url();?>/Electre/kriteria'"
                                    class="btn">Cancel</button>
                                <button type="submit" class="btn"
                                >Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>

    <?php }else {?>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <form action="<?= base_url('Electre/updateKriteria') ?>" method="post">
                            <div class="card-header" >
                                Edit Kategori
                            </div>
                            <div class="card-body" >



                                <div class="row">

                                    <div class="col-sm-6">

                                        <?php foreach($kriteria as $key => $value) {?>
                                        <input type="hidden" class="form-control" name="id_kriteria" placeholder="id"
                                            value="<?= $value['id_kriteria']?>" required>

                                        <div class="form-group">
                                            <label>Nama Kriteria</label>
                                            <input type="text" class="form-control" name="kriteria"
                                                value="<?= $value['nama_kriteria']?>" placeholder="Kriteria" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Bobot</label>
                                            <input type="number" class="form-control" name="bobot" placeholder="Bobot"
                                                value="<?= $value['bobot']?>" required>
                                        </div>

                                        <?php }?>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer" style=" text-align: right;">
                                <button type="button" onClick="window.location.href = '<?php echo base_url();?>/Electre/kriteria'"
                                    class="btn" >Cancel</button>
                                <button type="submit" class="btn"
                                    >Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>
    <?php } ?>


</div>