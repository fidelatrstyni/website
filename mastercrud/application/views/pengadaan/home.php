<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-pengadaan"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-6">
        <a href="<?php echo base_url('Production/export'); ?>" class="form-control btn btn-default"><i class="glyphicon glyphicon glyphicon-floppy-save"></i> Export Data Excel</a>
    </div>
    <!-- <div class="col-md-3">
        <button class="form-control btn btn-default" data-toggle="modal" data-target="#import-produk"><i class="glyphicon glyphicon glyphicon-floppy-open"></i> Import Data Excel</button>
    </div> -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Kode Item</th>
          <th>Permintaan Item</th>
          <th>Brand</th>
          <th>Stock</th>
          <th>Gudang</th>
          <th>Supplier</th>
          <th class="text-center">Aksi</th>
          <!--th style="text-align: center;">Aksi</th-->
        </tr>
      </thead>
      <tbody>
      <?php
          $no = 1;
          foreach ($dataPengadaan as $pengadaan) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $pengadaan->kode_item; ?></td>
              <td><?php echo $pengadaan->permintaan_item; ?></td>
              <td><?php echo $pengadaan->brand; ?></td>
              <td><?php echo $pengadaan->stock; ?></td>
              <td><?php echo $pengadaan->gudang; ?></td>
              <td><?php echo $pengadaan->supplier; ?></td>
              <td class="text-center" style="min-width:230px;">
                <button class="btn btn-warning update-dataPengadaan" data-id="<?php echo $pengadaan->id_pengadaan; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
                <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<?php echo $pengadaan->id_pengadaan; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
              </td>
            </tr>
            <?php
            $no++;
          }
        ?>
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_pengadaan; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataProduk', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Data Production';
  $data['url'] = 'Production/import';
  echo show_my_modal('modals/modal_import', 'import-produk', $data);
?>
