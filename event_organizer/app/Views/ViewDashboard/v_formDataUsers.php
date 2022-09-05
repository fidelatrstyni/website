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
                        <li class="breadcrumb-item"><a href="<?= base_url('DataUsers') ?>">Data Users</a></li>
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
                    <form action="<?= base_url('DataUsers/save') ?>" method="post">
                        <div class="card">
                            <div class="card-header">
                                Tambah User
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Name">
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Username">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" class="form-control" name="tlp" placeholder="Telephone">
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label><br>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Roles</label><br>
                                            <select name="roles" class="form-control">
                                                <option value="2">Admin</option>
                                                <option value="3">Customer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6">

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" name="alamat"
                                                id="exampleFormControlTextarea1" rows="3"
                                                placeholder="Tambahkan Alamat Lengkap"
                                                style="height: 124px;"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <select class="js-states form-control" name="provinsi" id="provinsi"
                                                required>
                                                <option></option>
                                                <?php foreach($provinsi as $key => $pr) {?>
                                                <option value="<?= $pr['id'] ?>">
                                                    <?= $pr['name']?></option>
                                                <?php }?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select class="form-control" name="kota" id="kota" required>
                                                <option></option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Kecamatan</label><br>
                                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                <option></option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Kelurahan</label><br>
                                            <select class="form-control" name="kelurahan" id="kelurahan" required>
                                                <option></option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="card-footer" style=" text-align: right;">
                                <button type="button"
                                    onClick="window.location.href = '<?php echo base_url();?>/DataUsers'"
                                    class="btn">Cancel</button>
                                <button type="submit" class="btn">Save</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

    </section>

    <?php }else {?>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            Edit User
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-sm-3">
                                    <form action="<?= base_url('DataUsers/updateFotoProfil') ?>" method="post">

                                    </form>
                                    <form action="<?= base_url('DataUsers/updateFotoProfil') ?>" method="POST"
                                        enctype="multipart/form-data">

                                        <?php foreach($users as $key => $value) {?>
                                        <input type="hidden" name="id_user" value="<?= $value['id_user']?>">
                                        <div class="form-group text-center">
                                            <img style="height: 200px; width: 200px;"
                                                src=" <?= (empty($value['img_profil']) ? base_url('upload/img_profil/pngegg.png') : base_url('upload/img_profil/' . $value['img_profil']))?>"
                                                id="displayGambar2" onclick="triggerClick()">
                                            <label for="gambar2">Gambar Profil</label>
                                            <input type="file" name="gambar" onchange="displayImage(this)" id="gambar2"
                                                style="display: none;">

                                            <?php } ?>
                                        </div>
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-primary text-center"
                                                value="kirim">Update
                                                Foto
                                                Profil
                                            </button>
                                        </div>

                                    </form>
                                </div>


                                <div class="col-sm-6">

                                    <form action="<?= base_url('DataUsers/update') ?>" method="post">
                                        <?php foreach($users as $key => $value) {?>
                                        <input type="hidden" name="id_user" value="<?= $value['id_user']?>">
                                        <input type="hidden" name="roles" value="<?= $value['roles']?>">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" name="nama" placeholder="nama"
                                                value="<?= $value['nama']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="username" value="<?= $value['username']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <input type="text" class="form-control" name="tlp" placeholder="telephone"
                                                value="<?= $value['tlp']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="email"
                                                value="<?= $value['email']?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label><br>
                                            <select name="status" class="form-control">
                                                <option value="aktif">Aktif</option>
                                                <option value="tidak aktif">Tidak Aktif</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <p><button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#addModal">Edit Password</button></p>
                                        </div>

                                        <?php } ?>


                                </div>
                                <div class="col-sm-3">

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="5" cols="40"
                                            placeholder="alamat" style="height: 123px;"
                                            required><?= $alamat1?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="js-states form-control" name="provinsi" id="provinsi" required>
                                            <option></option>
                                            <?php foreach($provinsi as $key => $pr) {?>
                                            <option value="<?= $pr['id'] ?>">
                                                <?= $pr['name']?></option>
                                            <?php }?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select class="form-control" name="kota" id="kota" required>
                                            <option></option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kecamatan</label><br>
                                        <select class="form-control" name="kecamatan" id="kecamatan" required>
                                            <option></option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelurahan</label><br>
                                        <select class="form-control" name="kelurahan" id="kelurahan" required>
                                            <option></option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer" style=" text-align: right;">
                            <button type="button" onClick="window.location.href = '<?php echo base_url();?>/DataUsers'"
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

<form action="<?= base_url('DataUsers/updatePassword') ?>" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php if(empty(isset($users))){?>
                <?php } else {?>
                <?php foreach($users as $key => $value) {?>
                    <input type="hidden" name="id_user" value="<?= $value['id_user']?>">
                    <?php }?>
                <?php }?>
                    

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" />
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>