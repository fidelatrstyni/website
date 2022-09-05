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
                            <button type="button" style="float: right;"
                                        onClick="location.href='<?=base_url('')?>/DataPegawai/formTambah'"
                                        class="btn btn-primary mb-2">Tambah
                                        Data</button>
                                <!-- <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                    data-target="#addModal">Add New</button> -->
                                <!--button onClick="Swal.fire()">Swal</button-->
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach($customer as $key => $value) {?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?= $value['nama']?></td>
                                        <td><?= $value['username']?></td>
                                        <td><?= $value['email']?></td>
                                        <td><?= $value['tlp']?></td>
                                        <td><?= $value['status']?></td>
                                        <td align="center">
                                            <a href="<?= base_url('DataLokasi')?>" class="btn-edit">
                                                <i class="fa fa-edit fa-fw"></i>
                                                <!--a href="#" data-id="" class="btn-delete">
                                                    <i class="fa fa-trash fa-fw btn-delete"></i-->
                                                <a href="" class="btn-hapus">
                                                    <i class="fa fa-trash fa-fw"></i>
                                        </td>
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