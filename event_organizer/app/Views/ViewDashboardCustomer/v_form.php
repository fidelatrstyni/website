<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $tittleForm?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboardCustomer') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $tittleForm?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <section class="content">

        <div class="container-fluid">

            <div class="row justify-content-center">

                <section class="col-lg-8 connectedSortable">

                    <form action="<?= base_url('DashboardCustomer/saveAlamat/' . 'saveAlamat') ?>" method="post">

                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat</h5>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label>Nama Penerima</label>
                                        <input type="text" class="form-control" name="nama_penerima" placeholder="nama">
                                    </div>

                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input type="text" class="form-control" name="kota" placeholder="kota">
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="5" cols="40"
                                            placeholder="alamat"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="text" class="form-control" name="kodePos" placeholder="Kode Pos">
                                    </div>

                                    <div class="form-group">
                                        <label>No Telephone</label>
                                        <input type="text" class="form-control" name="tlp" placeholder="Telephone">
                                    </div>

                                    <div class="form-group">
                                        <label>Jadikan Alamat Utama</label><br>
                                        <input type="checkbox" data-toggle="toggle" data-onstyle="primary"
                                            data-offstyle="secondary" id="cek" @if(session("role")==0) checked @endif
                                            name="session(" role")">
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label><br>
                                        <input type="checkbox" checked data-toggle="toggle" data-size="sm"
                                            name="status">
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </section>

            </div>
            </center>
        </div>

    </section>

</div>