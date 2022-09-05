<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $tittle ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Kategori') ?>">Data Kategori</a></li>
                        <li class="breadcrumb-item active"><?= $tittle ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php if ($status == 'tambah') { ?>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <form action="<?= base_url('Kategori/save') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                Tambah Kategori
                            </div>
                            <div class="card-body">



                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <input type="text" class="form-control" name="nama_kategori"
                                                placeholder="Kategori" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" placeholder="Kategori"
                                                required></textarea>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">

                                        <div class="form-group text-center">

                                            <img style="height: 200px; width: 200px;"
                                                src=" <?= base_url('Uploads/profil/placeholderprofil.png') ?>" alt=""
                                                id="displayGambar2" onclick="triggerClick()">
                                            <label for="gambar2">Gambar Kategori</label>
                                            <input type="file" name="gambar" onchange="displayImage(this)" id="gambar2"
                                                style="display: none;">
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="card-footer" style="text-align: right;">
                                <button type="button"
                                    onClick="window.location.href = '<?php echo base_url(); ?>/Kategori'"
                                    class="btn">Cancel</button>
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>

    <?php } else { ?>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            Edit Kategori
                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                                <form action="<?= base_url('Kategori/updateGambarKategori') ?>" method="POST"
                                    enctype="multipart/form-data">

                                    <?php foreach ($kategori as $key => $value) { ?>
                                    <input type="hidden" name="id_kategori" value="<?= $value['id_kategori'] ?>">
                                    <div class="form-group text-center">

                                        <img style="height: 200px; width: 200px;"
                                            src=" <?= (empty($value['gambar']) ? base_url('uploads/profil/placeholderprofil.png') : base_url('upload/imgKategori/' . $value['gambar'])) ?>"
                                            alt="" id="displayGambar2" onclick="triggerClick()">
                                        <label for="gambar2">Gambar Kategori</label>
                                        <input type="file" name="gambar" onchange="displayImage(this)" id="gambar2"
                                            style="display: none;">

                                    </div>

                                    <div style="text-align: center;">
                                        <button type="submit" class="btn text-center"
                                            style="background-color: #e83e8c; color:white;" value="kirim">Update
                                            Gambar
                                        </button>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>

                            <div class="col-sm-5">
                                <form action="<?= base_url('Kategori/updateKategori') ?>" method="post">
                                    <?php foreach ($kategori as $key => $value) { ?>
                                    <input type="hidden" name="id_kategori" value="<?= $value['id_kategori'] ?>">

                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" class="form-control" name="nama_kategori"
                                            placeholder="Kategori" value="<?= $value['nama_kategori'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="" cols="30"
                                            rows="10"><?= $value['deskripsi'] ?></textarea>
                                    </div>
                                    <?php } ?>
                            </div>



                        </div>
                        <div class="card-footer" style=" text-align: right;">
                            <button type="button"
                                onClick="window.location.href = '<?php echo base_url(); ?>/DataLokasi'"
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