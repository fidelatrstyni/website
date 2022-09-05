<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
  <?php if($userdata->status == 'direktur') {
  } else {
  ?>
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-monitoring"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('Production/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <!-- <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-produk"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div> -->
  </div>
  <!-- /.box-header -->
  <?php } ?>
  
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Kapal</th>
          <th>Waktu</th>
          <th>RPM</th>
          <th>Flowmeter</th>
          <th>Temperatur</th>
          <th>Pressurre</th>
          <?php if($userdata->status == 'direktur') {
          } else {
          ?>
          <th class="text-center">Aksi</th>
          <!--th style="text-align: center;">Aksi</th-->
          <?php } ?>
        </tr>
      </thead>
      <tbody>
      <?php
          $no = 1;
          foreach ($dataMonitoring as $monitoring_kapal) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $monitoring_kapal->code_kapal; ?></td>
              <td><?php echo $monitoring_kapal->waktu; ?></td>
              <td><?php echo $monitoring_kapal->rpm; ?></td>
              <td><?php echo $monitoring_kapal->flowmeter; ?></td>
              <td><?php echo $monitoring_kapal->temperatur; ?></td>
              <td><?php echo $monitoring_kapal->pressurre; ?></td>
              <?php if($userdata->status == 'direktur') {
              } else {
              ?>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataMonitoring" data-id="<?php echo $monitoring_kapal->id_monitoring; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-monitoring" data-id="<?php echo $monitoring_kapal->id_monitoring; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
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

<?php echo $modal_tambah_monitoring; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataMonitoring', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Data Production';
  $data['url'] = 'Production/import';
  echo show_my_modal('modals/modal_import', 'import-produk', $data);
?>
