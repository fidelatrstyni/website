<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row line2">

                <h3 class="header-profil">My Address</h3>
                <h6 class="header-profil2">Manage information about where do you live, for detail before book</h6>

            </div>
            <div class="row line1">
                <form action="<?= base_url('Address/update') ?>" method="POST">
                    <?php foreach($users as $key => $value){?>

                    <div class="mb-3 row">
                        <label for="staticProvince" class="col-sm-2 col-form-label"
                            style="color: white;">Province</label>
                        <div class="col-sm-6">
                            <?//php var_dump($cariKota);die;?>
                            <select class="js-states form-control" name="provinsi" id="provinsi" required>
                                <option></option>
                                <?php foreach($provinsi as $key => $pr) {?>
                                <option value="<?= $pr['id'] ?>"
                                    <?= ($cariProvinsi[0]['id'] == $pr['id'] ? 'selected' : '')?>>
                                    <?= $pr['name']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticCity" class="col-sm-2 col-form-label" style="color: white;">City</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="kota" id="kota" required>
                                <?php if (!empty($cariKota)) { ?>
                                <option value="<?= $cariKota[0]['id'] ?>" selected><?= $cariKota[0]['name'] ?></option>
                                <?php } else { ?>
                                <option></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticDistrict" class="col-sm-2 col-form-label"
                            style="color: white;">District</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                            <?php if (!empty($cariKecamatan)) { ?>
                                <option value="<?= $cariKecamatan[0]['id'] ?>" selected><?= $cariKecamatan[0]['name'] ?></option>
                                <?php } else { ?>
                                <option></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticPostalCode" class="col-sm-2 col-form-label" style="color: white;">Kelurahan
                            Code</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="kelurahan" id="kelurahan" required>
                            <?php if (!empty($cariKelurahan)) { ?>
                                <option value="<?= $cariKelurahan[0]['id'] ?>" selected><?= $cariKelurahan[0]['name'] ?></option>
                                <?php } else { ?>
                                <option></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="staticAddress" class="col-sm-2 col-form-label" style="color: white;">Full
                            Address</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"
                                style="
                              background-color:#212428; color:white;"><?= $alamat?></textarea>
                        </div>
                    </div>

                    <?php } ?>
                    <button type="submit" class="btn-save" style="width: auto;margin-top: 50px;">Save Change</button>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>