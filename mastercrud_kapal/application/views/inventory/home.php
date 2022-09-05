<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
  <?php if($userdata->status == 'direktur') {
  } else {
  ?>
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-inventory"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('Pegawai/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-pegawai"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div>
  </div>
  <!-- /.box-header -->
  <?php } ?>
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Kapal</th>
          <th>Nama Barang</th>
          <th>Jenis Barang</th>
          <th>Stok Barang</th>
          <th>Status Barang</th>
          <?php if($userdata->status == 'direktur') {
          } else {
          ?>
          <th style="text-align: center;">Aksi</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
      <?php
          $no = 1;
          foreach ($dataInventory as $inventory) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $inventory->kode_kapal; ?></td>
              <td><?php echo $inventory->nama_barang; ?></td>
              <td><?php echo $inventory->jenis_barang; ?></td>
              <td><?php echo $inventory->stok_barang; ?></td>
              <td><?php echo $inventory->status_barang; ?></td>
              <?php if($userdata->status == 'direktur') {
              } else {
              ?>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataInventory" data-id="<?php echo $inventory->id_inventory; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-inventory" data-id="<?php echo $inventory->id_inventory; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
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

<?php echo $modal_tambah_inventory; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataInventory', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Pegawai';
  $data['url'] = 'Pegawai/import';
  echo show_my_modal('modals/modal_import', 'import-pegawai', $data);
?>