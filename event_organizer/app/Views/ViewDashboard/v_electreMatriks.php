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
                        <li class="breadcrumb-item active">Matriks</li>
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
                <div class="col-md-12">
                    <div id="flash-data"
                        data-type="<?= isset($_SESSION['notif']['status']) ? $_SESSION['notif']['status']:''; ?>"
                        data-message="<?= isset($_SESSION['notif']['message']) ? $_SESSION['notif']['message']:''; ?>">
                    </div>
                    <!-- card header -->
                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('Electre/kriteria') ?>">Kriteria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('Electre/alternatif') ?>">Alternatif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url('Electre/matriks') ?>">Nilai
                                        Matriks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('Electre') ?>">Hasil Electre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('Electre/form') ?>">Hasil Electre Form</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if($userProfil[0]['roles'] == '2') {?>
                                    <button type="button" style="float: right;"
                                        onClick="location.href='<?=base_url('')?>/Electre/formTambahMatriks'"
                                        class="btn btn-primary mb-2">Tambah
                                        Data</button>
                                    <? } else {?>
                                    <?php }?>

                                </div>
                            </div>
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Alternatif</th>
                                        <th>Nama Kriteria</th>
                                        <th>Skor</th>
                                        <?php if($userProfil[0]['roles'] == '2') {?>
                                        <th>Aksi</th>
                                        <? } else {?>
                                        <?php }?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach ($alternatif as $key => $value){ ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['nama_kriteria'] ?></td>
                                        <td><?= $value['skor'] ?></td>
                                        <?php if($userProfil[0]['roles'] == '2') {?>
                                        <td align="center">
                                            <a
                                                href="<?= base_url('Electre/formEditMatriks/' . $value['id_alternatif'])?>">
                                                <i class="fa fa-edit fa-fw"></i>
                                                <a href=<?= base_url('Electre/deleteMatriks/' . $value['id_alternatif'] )?>
                                                    class="btn-hapus">
                                                    <i class="fa fa-trash fa-fw"></i>
                                        </td>
                                        <? } else {?>
                                        <?php }?>

                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->