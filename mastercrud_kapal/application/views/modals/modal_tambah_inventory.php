<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Inventory</h3>

  <form id="form-tambah-inventory" method="POST">

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-suitcase" aria-hidden="true"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Barang" input name="nama_barang" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-suitcase" aria-hidden="true"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jenis Barang" input name="jenis_barang" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-ship" aria-hidden="true"></i>
      </span>
      <select input name="kode_kapal" class="form-control select2" aria-describedby="sizing-addon2">
        <?php
        foreach ($dataKapal as $kapal) {
          ?>
          <option value="<?php echo $kapal->id_kapal; ?>">
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
      <input type="number" class="form-control" placeholder="Stock Barang" input name="stok_barang" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-truck" aria-hidden="true"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" input name="status_barang" value="ready" class="minimal">
      <label for="ready">Ready</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" input name="status_barang" value="in prosses" class="minimal"> 
      <label for="inprosses">In Prosses</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" input name="status_barang" value="on the way" class="minimal"> 
      <label for="on the way">On The Way</label>
        </span>
    </div>
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
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