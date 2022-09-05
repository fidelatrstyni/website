<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
  <?php if($userdata->status == 'direktur' || $userdata->status == 'admin') {
  } else {
  ?>
    <div class="col-md-6" style="padding: 0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-kapal"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('Posisi/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <!-- <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-posisi"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div> -->
  </div>
  <!-- /.box-header -->
  <?php } ?>
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Id Kapal</th>
          <th>Nama</th>
          <th>Jenis</th>
          <th>Status</th>
          <?php if($userdata->status == 'direktur' || $userdata->status == 'admin') {
          } else {
          ?>
          <th style="text-align: center;">Aksi</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
      <?php
  $no = 1;
  foreach ($dataKapal as $kapal) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kapal->id_kapal; ?></td>
      <td><?php echo $kapal->nama; ?></td>
      <td><?php echo $kapal->jenis; ?></td>
      <td><?php echo $kapal->status; ?></td>
      <?php if($userdata->status == 'direktur' || $userdata->status == 'admin') {?>
      <?php } else { ?>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataKapal" data-id="<?php echo $kapal->id_kapal; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-kapal" data-id="<?php echo $kapal->id_kapal; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
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

<?php echo $modal_tambah_kapal; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataKapal', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Posisi';
  $data['url'] = 'Posisi/import';
  echo show_my_modal('modals/modal_import', 'import-posisi', $data);
?>
