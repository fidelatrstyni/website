<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row line2">


                <h3 class="header-profil">My Profil</h3>
                <h6 class="header-profil2">Manage information about who you are, for control, protect, and secure Your
                    account</h6>

            </div>
            <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
            <div class="row line1">
                <form action="<?= base_url('Profil/updateFotoProfil') ?>" method="POST" enctype="multipart/form-data">
                    <?php foreach($users as $key => $value) {?>

                    <div class="form-group text-center">
                        <img src=" <?= (empty($value['img_profil']) ? base_url('upload/img_profil/Profile_avatar.png') : base_url('upload/img_profil/' . $value['img_profil']))?>"
                            alt="" id="displayProfil" onclick="triggerClick()">
                        <label for="profil">Gambar Profil</label>
                        <input type="file" name="profil" onchange="displayImage(this)" id="profil"
                            style="display: none;">
                        <?php } ?>
                    </div>
                    <div style="text-align: center;">
                        <button type="submit" class="btn text-center" style="background-color: #e83e8c; color:white;"
                            value="kirim">Update
                            Foto
                            Profil
                        </button>
                    </div>
                </form>

                <form action="<?= base_url('Profil/update') ?>" method="POST">

                    <?php foreach($users as $key => $value) {?>

                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label" style="color: white;">Email</label>
                        <div class="col-sm-6">
                            <input type="text" readonly name="email" class="form-control-plaintext" id="staticEmail"
                                value="<?= $value['email']?>" style="
                              background-color:#212428; color:white;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label"
                            style="color: white;">Password</label>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#addModal">Edit Password</button>
                            <!-- <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                value="email@example.com" style="
                              background-color:#212428; color:white;"> -->
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticName" class="col-sm-2 col-form-label" style="color: white;">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="nama" class="form-control-plaintext" id="staticEmail"
                                value="<?= $value['nama']?>" style="
                              background-color:#212428; color:white; border-color:white">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticName" class="col-sm-2 col-form-label" style="color: white;">Telephone</label>
                        <div class="col-sm-6">
                            <input type="text" name="tlp" class="form-control-plaintext" id="staticEmail"
                                value="<?= $value['tlp']?>" style="
                              background-color:#212428; color:white; border-color:white">
                        </div>
                    </div>
                    <?php } ?>

                    <button type="submit" class="btn-save" style="width: auto;margin-top: 50px;">Save
                        Change</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<form action="<?= base_url('Profil/updatePassword') ?>" method="post">
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
                    <?php foreach($users as $key => $value) {?>
                    <input type="hidden" name="id_user" value="<?= $value['id_user']?>">
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