<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Pelayaran</h3>

  <form id="form-tambah-pelayaran" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-compass" aria-hidden="true"></i>
      </span>
      <input type="text" class="form-control" placeholder="Tujuan" name="tujuan" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-home" aria-hidden="true"></i>
      </span>
      <input type="text" class="form-control" placeholder="Asal" name="asal" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-ship" aria-hidden="true"></i>
      </span>
      <select name="kode_kapal" class="form-control select2" aria-describedby="sizing-addon2">
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

    <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-truck" aria-hidden="true"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" name="aktivitas" value="pengiriman" class="minimal">
      <label for="Pengiriman">Pengiriman</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="aktivitas" value="drop" class="minimal"> 
      <label for="Drop">Drop</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="aktivitas" value="entering" class="minimal"> 
      <label for="Entering">Entering</label>
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