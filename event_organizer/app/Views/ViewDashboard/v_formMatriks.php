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
                        <li class="breadcrumb-item"><a href="<?= base_url('Electre/matriks') ?>">Electre</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Electre/matriks') ?>">Matriks</a></li>
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
                        <form action="<?= base_url('Electre/saveMatriks') ?>" method="post">
                            <div class="card-header">
                                Tambah Matriks
                            </div>
                            <div class="card-body">



                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nama Alternatif</label>
                                            <select name="tempat" id="tempat" class="form-control" required>
                                                <option value="">Pilih Alternatif</option>
                                                <?php foreach($tempat as $key => $value){ ?>
                                                <option value="<?= $value['id_tempat']?>">
                                                    <?= $value['nama']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <?php foreach($kriteria as $key => $value){ ?>
                                        <div class="form-group">
                                            <label><?= $value['nama_kriteria']?></label>
                                            <input type="number" class="form-control" name="kriteria[]"
                                                placeholder="<?= $value['nama_kriteria']?>" required>
                                        </div>
                                        <?php } ?>

                                    </div>

                                </div>

                            </div>
                            <div class="card-footer" style="text-align: right;">
                                <button type="button"
                                    onClick="window.location.href = '<?php echo base_url();?>/Electre/matriks'"
                                    class="btn">Cancel</button>
                                <button type="submit" class="btn">Save</button>
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
                        <form action="<?= base_url('Electre/updateMatriks') ?>" method="post">
                            <input type="hidden" class="form-control" name="id_alternatif" placeholder="id"
                                value="<?= $alternatif[0]['id_alternatif']?>" required>
                            <input type="hidden" class="form-control" name="id_kriteria" placeholder="id"
                                value="<?= $alternatif[0]['id_kriteria']?>" required>
                            <div class="card-header">
                                Edit Matriks
                            </div>
                            <div class="card-body">



                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nama Alternatif</label>
                                            <select name="id_tempat" id="alternatif" class="form-control" required>
                                                <option value="">Pilih Alternatif</option>
                                                <?php foreach($tempat as $key => $value){ ?>
                                                <option value="<?= $value['id_tempat']?>"
                                                    <?= ($alternatif[0]['id_tempat'] == $value['id_tempat'] ? 'selected' : '' )?>>
                                                    <?= $value['nama']?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                        <?php foreach($kriteria as $key => $value){ ?>
                                            <label
                                                <?= ($alternatif[0]['id_kriteria'] == $value['id_kriteria'] ? '' : 'hidden' )?>><?= $value['nama_kriteria']?></label>
                                                <?php } ?>
                                                <input type="number" value="<?= $alternatif[0]['skor']?>" class="form-control" name="skor"
                                                placeholder="skor">   
                                        </div>
                                        
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer" style="text-align: right;">
                                <button type="button"
                                    onClick="window.location.href = '<?php echo base_url();?>/Electre/matriks'"
                                    class="btn">Cancel</button>
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>
    <?php } ?>


</div>