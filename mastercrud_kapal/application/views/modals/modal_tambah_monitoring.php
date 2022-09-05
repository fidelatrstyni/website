<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Monitoring Kapal</h3>

  <form id="form-tambah-monitoring" method="POST">
  <input type="hidden" class="form-control" placeholder="Waktu" name="waktu" aria-describedby="sizing-addon2">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-ship" aria-hidden="true"></i>
      </span>
      <select name="code_kapal" class="form-control select2" aria-describedby="sizing-addon2">
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
      <i class="fa fa-clock-o" aria-hidden="true"></i>
      </span>
      <input type="text" class="form-control" placeholder="RPM" name="rpm" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-clock-o" aria-hidden="true"></i>
      </span>
      <input type="number" class="form-control" placeholder="Flowmeter" name="flowmeter" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-pushpin"></i>
      </span>
      <input type="text" class="form-control" placeholder="Temperatur" name="temperatur" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-tachometer" aria-hidden="true"></i>
      </span>
      <input type="text" class="form-control" placeholder="Pressure" name="pressurre" aria-describedby="sizing-addon2">
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
