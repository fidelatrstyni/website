
<?php foreach ($detailData as $data) { ?>

<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/img/<?php echo $data->foto; ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $data->nama; ?></h3>

        <p class="text-muted text-center">Admin Akses</p>

        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Username</b> <a class="pull-right"><?php echo $data->username; ?></a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
        <li><a href="#password" data-toggle="tab">Ubah Password</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="settings">
          <form class="form-horizontal" action="<?php echo base_url('Profile/update') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="inputUsername" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id= placeholder="Username" name="username" value="<?php echo $data->username; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputNama" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Name" name="nama" value="<?php echo $data->nama; ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputLavel" class="col-sm-2 control-label">Level</label>
              <div class="col-sm-10">
              <select name="level" class="form-control" aria-describedby="sizing-addon2">
                <option  <?php if ($data->level == 1) { echo 'selected'; }?> value="1" > 1 </option>
                <option <?php if ($data->level == 2) { echo 'selected'; }?> value="2" > 2 </option>
                <option <?php if ($data->level == 3) { echo 'selected'; }?> value="3" > 3 </option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputStatus" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
              <select name="status" class="form-control" aria-describedby="sizing-addon2">
                <option  <?php if ($data->status == 'superadmin' && $data->level == 1) { echo 'selected'; }?> value="superadmin" > Superadmin </option>
                <option <?php if ($data->status == 'admin' && $data->level == 2) { echo 'selected'; }?> value="admin" > Admin </option>
                <option <?php if ($data->status == 'direktur' && $data->level == 3) { echo 'selected'; }?> value="direktur" > Direktur </option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputFoto" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" placeholder="Foto" name="foto">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <div class="tab-pane" id="password">
          <form class="form-horizontal" action="<?php echo base_url('Profile/ubah_password') ?>" method="POST">
            <div class="form-group">
              <label for="passLama" class="col-sm-2 control-label">Password Lama</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password Lama" name="passLama">
              </div>
            </div>
            <div class="form-group">
              <label for="passBaru" class="col-sm-2 control-label">Password Baru</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password Baru" name="passBaru">
              </div>
            </div>
            <div class="form-group">
              <label for="passKonf" class="col-sm-2 control-label">Konfirmasi Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Konfirmasi Password" name="passKonf">
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="msg" style="display:none;">
      <?php echo $this->session->flashdata('msg'); ?>
    </div>
  </div>
</div>
<?php } ?>
