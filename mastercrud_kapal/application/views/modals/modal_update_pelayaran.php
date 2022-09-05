<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pelayaran</h3>
      <form method="POST" id="form-update-pelayaran">

        <input type="hidden" name="id_pelayaran" value="<?php echo $dataPelayaran->id_pelayaran; ?>">

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-compass" aria-hidden="true"></i>
          </span>
          <input type="text" class="form-control" placeholder="Tujuan" name="tujuan" aria-describedby="sizing-addon2" value="<?php echo $dataPelayaran->tujuan; ?>">
        </div>

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-home" aria-hidden="true"></i>
          </span>
          <input type="text" class="form-control" placeholder="asal" name="asal" aria-describedby="sizing-addon2" value="<?php echo $dataPelayaran->asal; ?>">
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
              <input type="radio" name="aktivitas" value="pengiriman" class="minimal" <?php if ($dataPelayaran->aktivitas == 'pengiriman') { echo 'checked'; }?> >
          <label for="Pengiriman">Pengiriman</label>
            </span>
            <span class="input-group-addon">
              <input type="radio" name="aktivitas" value="drop" class="minimal" <?php if ($dataPelayaran->aktivitas == 'drop') { echo 'checked'; }?> > 
          <label for="Drop">Drop</label>
            </span>
            <span class="input-group-addon">
              <input type="radio" name="aktivitas" value="entering" class="minimal" <?php if ($dataPelayaran->aktivitas == 'entering') { echo 'checked'; }?> > 
          <label for="Entering">Entering</label>
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