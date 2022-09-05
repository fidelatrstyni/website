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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <!-- <div class="swal" data-swal="<?= session()->get('message'); ?>"></div> -->

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <div class="col-md-2">
                                <?php if($userProfil[0]['roles'] == '2') {?>
                                <button type="button" style="float: right;"
                                    onClick="location.href='<?=base_url('')?>/DataLokasi/formTambah'"
                                    class="btn btn-primary mb-2">Tambah
                                    Data</button>
                                <? } else {?>
                                <?php }?>

                                <!-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                    data-target="#addModal">Add New</button> -->
                                <!--button onClick="Swal.fire()">Swal</button-->
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Tempat</th>
                                        <th>Kota</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Kapasitas</th>
                                        <th>Jaringan</th>
                                        <th>Map</th>
                                        <?php if($userProfil[0]['roles'] == '2') {?>
                                        <th>Aksi</th>
                                        <? } else {?>
                                        <?php }?>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach($lokasi as $key => $value) {?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?= $value['nama']?></td>
                                        <td><?= $value['kota']?></td>
                                        <td><img style="height: 200px; width: 200px;"
                                                src=" <?= (empty($value['gambar']) ? base_url('uploads/profil/placeholderprofil.png') : base_url('upload/imgLokasi/' . $value['gambar'])) ?>"
                                                ></td>
                                        <td><?= $value['harga']?></td>
                                        <td><?= $value['kapasitas']?></td>
                                        <td><?= $value['jaringan']?></td>
                                        <td><iframe src="<?= $value['map']?>" width="100" height="100" style="border:0;"
                                                allowfullscreen="" loading="lazy"
                                                referrerpolicy="no-referrer-when-downgrade">
                                            </iframe></td>
                                        <?php if($userProfil[0]['roles'] == '2') {?>
                                        <td align="center">
                                            <a href="<?= base_url('DataLokasi/edit/' . $value['id_tempat'])?>"
                                                class="btn-edit">
                                                <i class="fa fa-edit fa-fw"></i>
                                                <!--a href="#" data-id="" class="btn-delete">
                                                    <i class="fa fa-trash fa-fw btn-delete"></i-->
                                                <a href="<?= base_url('DataLokasi/hapus/' . $value['id_tempat'])?>"
                                                    class="btn-hapus">
                                                    <i class="fa fa-trash fa-fw"></i>
                                        </td>
                                        <? } else {?>
                                        <?php }?>

                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
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

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->