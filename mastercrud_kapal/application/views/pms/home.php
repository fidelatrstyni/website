<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
  <?php if($userdata->status == 'direktur') {
  } else {
  ?>
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pms"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('Finance/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <!-- <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-finance"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div> -->
  </div>
  <!-- /.box-header -->
  <?php } ?>
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Item</th>
          <th>Kode Kapal</th>
          <th>Nama Kapal</th>
          <th>Jenis Kapal</th>
          <th>Pemeliharaan</th>
          <th>Tanggal</th>
          <th>Status Kapal</th>
          <th>Aktor</th>
          <?php if($userdata->status == 'direktur') {
          } else {
          ?>
          <th style="text-align: center;">Aksi</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody id="list-data2">
      <?php
          $no = 1;
          foreach ($dataPms as $pms) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pms->id_pms; ?></td>
              <td><?php echo $pms->kode_kapal; ?></td>
              <td><?php echo $pms->nama; ?></td>
              <td><?php echo $pms->jenis; ?></td>
              <td><?php echo $pms->pemeliharaan; ?></td>
              <td><?php echo $pms->tanggal; ?></td>
              <td><?php echo $pms->status; ?></td>
              <td><?php echo $pms->aktor; ?></td>
              <?php if($userdata->status == 'direktur') {
              } else {
              ?>
              <td class="text-center" style="min-width:230px;">
                <!--button class="btn btn-warning update-dataPms" data-id="<//?php echo $pms->id_pms; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button-->
                <button class="btn btn-danger konfirmasiHapus-pms" data-id="<?php echo $pms->id_pms; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
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

<?php echo $modal_tambah_pms; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataPms', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Pegawai';
  $data['url'] = 'Pegawai/import';
  echo show_my_modal('modals/modal_import', 'import-pegawai', $data);
?>
