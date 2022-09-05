<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Kapal</h3>
  
      <form method="POST" id="form-update-kapal">

        <input type="hidden" name="id_kapal" value="<?php echo $dataKapal[0]["id_kapal"]; ?>">

        <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-user"></i>
          </span>
          <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2" value="<?php echo $dataKapal[0]['nama']; ?>">
        </div>

        <div class="form-group">
              <label for="inputLavel" class="col-sm-2 control-label">Kapal</label>
              <div class="col-sm-10">
              <select name="jenis" class="form-control" aria-describedby="sizing-addon2">
                <option <?php if ($dataKapal[0]['jenis'] == 'Container Vessels') { echo 'selected'; }?> value="Container Vessels" > Container Vessels </option>
                <option <?php if ($dataKapal[0]['jenis'] == 'Breakbulk Vessels') { echo 'selected'; }?> value="Breakbulk Vessels" > Breakbulk Vessels</option>
                <option <?php if ($dataKapal[0]['jenis'] == 'Ro-Ro Vessels') { echo 'selected'; }?> value="Ro-Ro Vessels" > Ro-Ro Vessels </option>
                <option <?php if ($dataKapal[0]['jenis'] == 'Multi-purpose Vessels') { echo 'selected'; }?> value="Multi-purpose Vessels" > Multi-purpose Vessels </option>
                <option <?php if ($dataKapal[0]['jenis'] == 'Tanker Vessels') { echo 'selected'; }?> value="Tanker Vessels" > Tanker Vessels </option>
                <option <?php if ($dataKapal[0]['jenis'] == 'LNG Carriers') { echo 'selected'; }?> value="LNG Carriers" > LNG Carriers </option>
                <option <?php if ($dataKapal[0]['jenis'] == 'Crude Carriers') { echo 'selected'; }?> value="Crude Carriers" > Crude Carriers </option>
                <option <?php if ($dataKapal[0]['jenis'] == 'Crude Carriers') { echo 'selected'; }?> value="Crude Carriers" > Crude Carriers </option>
              </select>
              </div>
        </div>

        <div class="input-group form-group" style="display: inline-block;">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-tag"></i>
          </span>
          <span class="input-group-addon">
              <input type="radio" name="status" value="aktif" class="minimal" <?php if ($dataKapal[0]['status'] == 'aktif') { echo 'checked'; }?> >
          <label for="aktif">Aktif</label>
            </span>
            <span class="input-group-addon">
              <input type="radio" name="status" value="tidak aktif" class="minimal" <?php if ($dataKapal[0]['status'] == 'tidak aktif') { echo 'checked'; }?> > 
          <label for="tidak aktif">Tidak Aktif</label>
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