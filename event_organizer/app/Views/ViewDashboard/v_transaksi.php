<div class="content-wrapper" style="background-color: #ffebeb; color:#F54C7F;">

    <div class="content-header" style="background-color: #333; color:white;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboardCustomer') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Transaksi</a></li>
                        <li class="breadcrumb-item active"><?= $tittle ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12" style="margin-top:50px">

                    <div class="card" style="background-color: #333; color:white;border-color:white">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a style="background-color: #333; color:white;" class="nav-link <?= ($tittle == 'Proses' ? 'active' : '') ?>" href="<?= base_url('DataTransaksi') ?>">
                                        <i class="fa-solid fa-truck-clock"></i> Proses</a>
                                </li>
                                <li class="nav-item">
                                    <a style="background-color: #333; color:white;" class="nav-link <?= ($tittle == 'Selesai' ? 'active' : '') ?>" href="<?= base_url('DataTransaksi/selesai') ?>">Selesai</a>
                                </li>
                                <li class="nav-item">
                                    <a style="background-color: #333; color:white;" class="nav-link <?= ($tittle == 'Dibatalkan' ? 'active' : '') ?>" href="<?= base_url('DataTransaksi/dibatalkan') ?>">Dibatalkan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="container">
                            <br>

                            <?php if (!empty($proses)) { ?>

                                <?php foreach ($proses as $key => $value) { ?>

                                    <div class="card" style="background-color: #333; color:white;border-color:white;">
                                        <div class="card-header" style="border-color: white;">

                                            <span class="badge badge-danger"><?= $value['kode_transaksi'] ?></span>

                                            <?php if ($tittle == 'Proses') { ?>
                                                <span class="badge badge-warning" style="float: right;">Proses</span>
                                            <?php } else if ($tittle == 'Selesai') { ?>
                                                <span class="badge badge-success" style="float: right;">Selesai </span>
                                            <?php } else { ?>
                                                <span class="badge badge-danger" style="float: right;">Dibatalkan</span>
                                            <?php } ?>

                                        </div>
                                        <?php $subTotal = 0;
                                        $subTotal = $value['harga_paket'] + $value['harga'];

                                        ?>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nama Tempat</label>
                                                        <p><?= $value['nama'] ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jenis Kategori</label>
                                                        <p><?= $value['nama_kategori'] ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jenis Paket</label>
                                                        <?= $value['nama_paket'] ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Konsep</label>
                                                        <?= $value['konsep'] ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Pembayaran</label>
                                                        <?php if ($value['pembayaran'] == 'uang muka') { ?>
                                                            <span class="badge badge-warning">Uang Muka</span>
                                                            <P>Uang Muka yang dibayarkan : Rp.
                                                                <?= number_format($value['uang_muka']) ?></P>
                                                            <p>Yang belum terbayar : Rp.
                                                                <?= number_format($value['lunas'] - $value['uang_muka']) ?></p>

                                                        <?php } else { ?>
                                                            <?php if (!empty($value['img_pelunasan']) && !empty($value['uang_muka'])) { ?>
                                                                <span class="badge badge-success">Lunas</span>
                                                                <P>Uang Muka yang dibayarkan : Rp.
                                                                    <?= number_format($value['uang_muka']) ?></P>
                                                                <p>Pelunasan Pembayaran : Rp.
                                                                    <?= number_format($value['lunas']) ?></p>
                                                            <?php } else if (empty($value['img_pelunasan']) && !empty($value['uang_muka'])) { ?>
                                                                <span class="badge badge-warning">Uang Muka</span>
                                                                <p>Pembayaran Uang Muka : Rp.
                                                                    <?= number_format($value['lunas']) - $value['uang_muka'] ?></p>
                                                            <?php } else { ?>
                                                                <span class="badge badge-success">Lunas</span>
                                                                <p>Pembayaran Lunas : Rp.
                                                                    <?= number_format($value['lunas']) ?></p>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        <?php if (!empty($value['img_pengembalian'])) { ?>
                                                            <label for="">Pengembalian Dana : </label>
                                                            <P>
                                                                Dana Pengembalian : Rp.
                                                                <?php if (!empty($value['uang_muka']) && !empty($value['img_pelunasan'])) { ?>
                                                                    <?= number_format($value['lunas']) ?>
                                                                <?php } else if (!empty($value['uang_muka']) && empty($value['img_pelunasan'])) { ?>
                                                                    <?= number_format($value['uang_muka']) ?>
                                                                <?php } else { ?>
                                                                    <?= number_format($value['lunas']) ?>
                                                                <?php } ?>
                                                            </P>
                                                        <?php } else { ?>
                                                        <?php } ?>
                                                        <?php if (empty($value['img_pengembalian']) && $tittle == 'Dibatalkan') { ?>
                                                            <form action="<?= base_url('MyOrder/pengembalian') ?>" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="id" value="<?= $value['id'] ?>">
                                                                <label for="">Upload Bukti Pengembalian Dana</label>
                                                                <input type="file" name="img_pengembalian">
                                                                <br><br>
                                                                <button type="submit" class="btn text-center" style="background-color: black; color:white;" value="kirim">Kirim Pengembalian Dana
                                                                </button>
                                                            </form>
                                                        <?php } else { ?>
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Tanggal Awal Disewa</label>
                                                        <p><?= $value['start_event'] ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Tanggal Akhir Disewa</label>
                                                        <p><?= $value['end_event'] ?></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jenis Paket</label>
                                                        <?= $value['nama_paket'] ?>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Verifikasi Pembayaran</label>
                                                        <p><?= $value['verifikasi'] ?>
                                                            <?php if ($userProfil[0]['roles'] == '2') { ?>
                                                                <a href="<?= base_url('DataTransaksi/edit/' . $value['id']) ?>" type="button" class="btn btn-info btn-sm">Edit
                                                                    Pembayarran</a>
                                                            <? } else { ?>
                                                            <?php } ?>

                                                        </p>
                                                        <label for="">Bukti Pembayaran</label>
                                                        <p><a href="<?= base_url('upload/pembayaran/' . $value['img_pembayaran']) ?>">
                                                                <img style="width: 300px; height:200px;" src="<?= base_url('upload/pembayaran/' . $value['img_pembayaran']) ?>" alt="picture">
                                                            </a></p>
                                                        <?php if (!empty($value['img_pelunasan'])) { ?>
                                                            <label for="">Bukti Pelunasan</label>
                                                            <p><a href="<?= base_url('upload/pembayaran/' . $value['img_pelunasan']) ?>">
                                                                    <img style="width: 300px; height:200px;" src="<?= base_url('upload/pembayaran/' . $value['img_pelunasan']) ?>" alt="picture">
                                                                </a></p>
                                                        <?php } else { ?>

                                                        <?php } ?>
                                                        <?php if (!empty($value['img_pengembalian'])) { ?>
                                                            <label for="">Bukti Pengembalian Dana</label>
                                                            <p><a href="<?= base_url('upload/pembayaran/' . $value['img_pengembalian']) ?>">
                                                                    <img style="width: 300px; height:200px;" src="<?= base_url('upload/pembayaran/' . $value['img_pengembalian']) ?>" alt="picture">
                                                                </a></p>
                                                        <?php } else { ?>

                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="" style="font-size: 20px;">Total :</label>
                                                        <label for="" style="font-size: 20px;">
                                                            Rp.<?= format_number($subTotal); ?></label>
                                                    </div>


                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                <?php } ?>
                        </div>



                    <?php } else { ?>
                        <div class=" text-center">
                            <p>Empty</p>
                        </div>

                    <?php } ?>

                    </div>

                </div>

            </div>
    </section>

</div>