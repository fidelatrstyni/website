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
                        <form action="<?= base_url('DataLokasi/save') ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-header">
                                Tambah Lokasi
                            </div>
                            <div class="card-body">



                                <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Lokasi"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select name="kota" id="" class="form-control">
                                                <option value="Malang">Malang</option>
                                                <option value="Sidoarjo">Sidoarjo</option>
                                                <option value="Surabaya">Surabaya</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" class="form-control" name="harga" placeholder="Harga"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label>Kapasitas</label>
                                            <input type="number" class="form-control" name="kapasitas"
                                                placeholder="Kapasitas" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jaringan Internet</label>
                                            <select name="jaringan" id="" class="form-control">
                                                <option value="Pay Wifi">Pay Wifi</option>
                                                <option value="Free Wifi">Free Wifi</option>
                                                <option value="No Wifi">No Wifi</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label>Link Map</label>
                                        <textarea name="map" class="form-control" id="" cols="30"
                                            rows="10"></textarea>
                                        </div>

                                        <div class="form-group text-center">
                                        
                                        <img style="height: 200px; width: 200px;"
                                                src=" <?= base_url('Uploads/profil/placeholderprofil.png') ?>" alt=""
                                                id="displayGambar2" onclick="triggerClick()">
                                            <label for="gambar2">Gambar Lokasi</label>
                                            <input type="file" name="gambar" onchange="displayImage(this)"
                                                id="gambar2" style="display: none;">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer" style="text-align: right;">
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

    <?php } else { ?>
    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <div class="card">

                        <div class="card-header">
                            Edit Lokasi
                        </div>
                        <div class="card-body">


                            <div class="row">

                                <div class="col-sm-3">
                                    <form action="<?= base_url('DataLokasi/updateGambarLokasi') ?>" method="POST"
                                        enctype="multipart/form-data">

                                        <?php foreach ($tempat as $key => $value) { ?>
                                        <input type="hidden" name="id_tempat" value="<?= $value['id_tempat'] ?>">
                                        <div class="form-group text-center">
                                            <img style="height: 200px; width: 200px;"
                                                src=" <?= (empty($value['gambar']) ? base_url('uploads/profil/placeholderprofil.png') : base_url('upload/imgLokasi/' . $value['gambar'])) ?>"
                                                id="displayGambar2" onclick="triggerClick()">
                                            <label for="gambar2">Gambar Lokasi</label>
                                            <input type="file" name="gambar" onchange="displayImage(this)"
                                                id="gambar2" style="display: none;">
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
                                    <form action="<?= base_url('DataLokasi/updateLokasi') ?>" method="post">
                                        <?php foreach ($tempat as $key => $value) { ?>
                                        <input type="hidden" name="id_tempat" value="<?= $value['id_tempat'] ?>">

                                        <div class="form-group">
                                            <label>Nama Lokasi</label>
                                            <input type="text" class="form-control" name="nama" placeholder="Lokasi"
                                                value="<?= $value['nama'] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Kota</label>
                                            <select name="kota" id="" class="form-control">
                                                <option value="Malang" <?= $value['kota'] == 'Malang' ? 'selected':''  ?>>Malang</option>
                                                <option value="Sidoarjo" <?= $value['kota'] == 'Sidoarjp' ? 'selected':''  ?>>Sidoarjo</option>
                                                <option value="Surabaya" <?= $value['kota'] == 'Surabaya' ? 'selected':''  ?>>Surabaya</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" class="form-control" name="harga" placeholder="Harga"
                                                value="<?= $value['harga'] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Kapasitas</label>
                                            <input type="number" class="form-control" name="kapasitas"
                                                value="<?= $value['kapasitas'] ?>" placeholder="Kapasitas" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jaringan Internet</label>
                                            <select name="jaringan" id="" class="form-control">
                                                <option value="Pay Wifi" <?= $value['jaringan'] == 'Pay Wifi' ? 'selected':''  ?>>Pay Wifi</option>
                                                <option value="Free Wifi" <?= $value['jaringan'] == 'Free Wifi' ? 'selected':''  ?>>Free Wifi</option>
                                                <option value="No Wifi" <?= $value['jaringan'] == 'No Wifi' ? 'selected':''  ?>>No Wifi</option>
                                            </select>
                                        </div>


                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Link Map</label>
                                        <textarea name="map" class="form-control" id="" cols="30"
                                            rows="10"><?= $value['map'] ?></textarea>
                                    </div>

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