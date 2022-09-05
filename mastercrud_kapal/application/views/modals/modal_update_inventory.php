<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Inventory</h3>
      <form method="POST" id="form-update-inventory">

        <input type="hidden" name="id_inventory" value="<?php echo $dataInventory->id_inventory; ?>">

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-suitcase" aria-hidden="true"></i>
          </span>
          <input type="text" class="form-control" placeholder="Nama Barang" name="nama_barang" aria-describedby="sizing-addon2" value="<?php echo $dataInventory->nama_barang; ?>">
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-suitcase" aria-hidden="true"></i>
          </span>
          <input type="text" class="form-control" placeholder="Jenis Barang" name="jenis_barang" aria-describedby="sizing-addon2" value="<?php echo $dataInventory->jenis_barang; ?>">
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-ship" aria-hidden="true"></i>
          </span>
          <select name="kode_kapal" class="form-control select2" aria-describedby="sizing-addon2">
            <?php
            foreach ($dataKapal as $kapal) {
              ?>
              <option <?php if ($kapal->id_kapal == $dataInventory->kode_kapal) { echo 'selected'; }?> value="<?php echo $kapal->id_kapal; ?>">
                <?php echo $kapal->id_kapal; ?>
              </option>
              <?php
            }
            ?>
          </select>
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-clipboard"></i>
          </span>
          <input type="number" class="form-control" placeholder="Stok Barang" name="stok_barang" aria-describedby="sizing-addon2" value="<?php echo $dataInventory->stok_barang; ?>">
        </div>

        <div class="input-group form-group" style="display: inline-block;">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-truck" aria-hidden="true"></i>
          </span>
          <span class="input-group-addon">
              <input type="radio" name="status_barang" value="ready" class="minimal" <?php if ($dataInventory->status_barang == 'ready') { echo 'checked'; }?> >
          <label for="Ready">Ready</label>
            </span>
            <span class="input-group-addon">
              <input type="radio" name="status_barang" value="in prosses" class="minimal" <?php if ($dataInventory->status_barang == 'in prosses') { echo 'checked'; }?> > 
          <label for="In Prosses">In Prosses</label>
            </span>
            <span class="input-group-addon">
              <input type="radio" name="status_barang" value="on the way" class="minimal" <?php if ($dataInventory->status_barang == 'on the way') { echo 'checked'; }?> > 
          <label for="On the Way">On the Way</label>
            </span>
        </div>
        
        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>

<!--script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script-->