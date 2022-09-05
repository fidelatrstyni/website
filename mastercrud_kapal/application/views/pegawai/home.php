<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
  <?php if($userdata->status == 'direktur' || $userdata->status == 'admin') {
  } else {
  ?>
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pegawai"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('Pegawai/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
  </div>
  <?php } ?>

  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Kapal</th>
          <th>Nama</th>
          <th>Jabatan</th>
          <th>Departemen</th>
          <th>Email</th>
          <?php if($userdata->status == 'direktur') {
          } else {
          ?>
          <th>Action</th>
          <?php } ?>
          <!--th style="text-align: center;">Aksi</th-->
        </tr>
      </thead>
      <tbody>
      <?php
          $no = 1;
          foreach ($dataCrew as $crew) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $crew->kode_kapal; ?></td>
              <td><?php echo $crew->nama; ?></td>
              <td><?php echo $crew->jabatan; ?></td>
              <td><?php echo $crew->departemen; ?></td>
              <td><?php echo $crew->email; ?></td>
              <?php if($userdata->status == 'direktur') {
              } else if ($userdata->status == 'admin') { ?>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $crew->id_crew; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
              </td>
              <?php } else { ?>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataPegawai" data-id="<?php echo $crew->id_crew; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $crew->id_crew; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
              </td>
              <?php } ?>
            </tr>
            <?php
            $no++;
          }
        ?>
      </tbody>

    </table>
  </div>
</div>

<?php echo $modal_tambah_pegawai; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Pegawai';
  $data['url'] = 'Pegawai/import';
  echo show_my_modal('modals/modal_import', 'import-pegawai', $data);
?>
