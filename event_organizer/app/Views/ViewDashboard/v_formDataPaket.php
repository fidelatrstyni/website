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
                        <li class="breadcrumb-item"><a href="<?= base_url('Paket') ?>">Data Paket</a></li>
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
                            <form action="<?= base_url('Paket/save') ?>" method="post" enctype="multipart/form-data">
                                <div class="card-header">
                                    Tambah Paket
                                </div>
                                <div class="card-body">



                                    <div class="row">

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label>Nama Paket</label>
                                                <select name="nama_paket" id="" class="form-control">
                                                    <option value="Paket A">Paket A</option>
                                                    <option value="Paket B">Paket B</option>
                                                    <option value="Paket C">Paket C</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Kategori</label>

                                                <select name="id_kategori" id="" class="form-control">
                                                    <?php foreach ($kategori as $key => $value) { ?>
                                                        <option value="<?= $value['id_kategori'] ?>">
                                                            <?= $value['nama_kategori'] ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" class="form-control" name="harga_paket" placeholder="Harga" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Kapasitas</label>
                                                <select name="kapasitas" id="" class="form-control">
                                                    <option value="500">500</option>
                                                    <option value="750">750</option>
                                                    <option value="1000">1000</option>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col-sm-6">


                                            <div class="form-group">
                                                <label>Katering</label>
                                                <select name="katering" id="" class="form-control">
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>]
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Invitation</label>
                                                <select name="invitation" id="" class="form-control">
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>]
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Foto</label>
                                                <select name="foto" id="" class="form-control">
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>]
                                                </select>
                                            </div>

                                        </div>


                                    </div>

                                </div>
                                <div class="card-footer" style="text-align: right;">
                                    <button type="button" onClick="window.location.href = '<?php echo base_url(); ?>/Paket'" class="btn">Cancel</button>
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
                                Edit Paket
                            </div>

                            <div class="row">

                                <div class="col-sm-6">
                                    <form action="<?= base_url('Paket/updatePaket') ?>" method="post">
                                        <?php foreach ($paket as $key => $pkt) { ?>
                                                <input type="hidden" name="id_paket" value="<?= $pkt['id_paket']?>">
                                            <div class="form-group">
                                                <label>Nama Paket</label>
                                                <select name="nama_paket" id="" class="form-control">
                                                    <option value="Paket A" <?= ($pkt['nama_paket'] == 'Paket A' ? 'selected' : '') ?> >Paket A</option>
                                                    <option value="Paket B" <?= ($pkt['nama_paket'] == 'Paket B' ? 'selected' : '') ?> >Paket B</option>
                                                    <option value="Paket C" <?= ($pkt['nama_paket'] == 'Paket C' ? 'selected' : '') ?> >Paket C</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Kategori</label>

                                                <select name="id_kategori" id="" class="form-control">
                                                    <?php foreach ($kategori as $key => $value) { ?>
                                                        <option value="<?= $value['id_kategori'] ?>" <?= ($value['id_kategori'] == $pkt['id_kategori'] ? 'selected' : '') ?> ><?= $value['nama_kategori'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>

                                            </div>

                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" class="form-control" name="harga_paket" placeholder="Harga" value="<?= $pkt['harga_paket']?>" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Kapasitas</label>
                                                <select name="kapasitas" id="" class="form-control">
                                                    <option value="500" <?= ($pkt['harga_paket'] == '500' ? 'selected' : '') ?> >500</option>
                                                    <option value="750" <?= ($pkt['harga_paket'] == '750' ? 'selected' : '') ?> >750</option>
                                                    <option value="1000" <?= ($pkt['harga_paket'] == '1000' ? 'selected' : '') ?> >1000</option>
                                                </select>
                                            </div>
                                        <?php } ?>
                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Katering</label>
                                        <select name="katering" id="" class="form-control">
                                            <option value="Aktif" <?= ($pkt['katering'] == 'Aktif' ? 'selected' : '') ?> >Aktif</option>
                                            <option value="Tidak Aktif" <?= ($pkt['katering'] == 'Tidak Aktif' ? 'selected' : '') ?> >Tidak Aktif</option>]
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Invitation</label>
                                        <select name="invitation" id="" class="form-control">
                                            <option value="Aktif" <?= ($pkt['invitation'] == 'Aktif' ? 'selected' : '') ?> >Aktif</option>
                                            <option value="Tidak Aktif" <?= ($pkt['invitation'] == 'Tidak Aktif' ? 'selected' : '') ?> >Tidak Aktif</option>]
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Foto</label>
                                        <select name="foto" id="" class="form-control">
                                            <option value="Aktif" <?= ($pkt['foto'] == 'Aktif' ? 'selected' : '') ?> >Aktif</option>
                                            <option value="Tidak Aktif" <?= ($pkt['foto'] == 'Tidak Aktif' ? 'selected' : '') ?> >Tidak Aktif</option>]
                                        </select>
                                    </div>

                                </div>


                            </div>
                            <div class="card-footer" style=" text-align: right;">
                                <button type="button" onClick="window.location.href = '<?php echo base_url(); ?>/Paket'" class="btn">Cancel</button>
                                <button type="submit" class="btn">Save</button>
                            </div>
                            </form>

                        </div>
                    </div>

                </div>
        </section>
    <?php } ?>


</div>