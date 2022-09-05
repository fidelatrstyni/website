<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Absen</h3>
      <form method="POST" id="form-update-absen">
        <input type="hidden" name="id_crew" value="<?php echo $dataAbsen->id_crew; ?>">
        <input type="hidden" name="id_absen" value="<?php echo $dataAbsen->id_absen; ?>">
        <input type="hidden" name="tanggal" value="<?php echo $dataAbsen->tanggal; ?>">

        <div class="form-group">
              <label for="inputLavel" class="col-sm-2 control-label">Absen</label>
              <div class="col-sm-10">
              <select name="absensi" class="form-control" aria-describedby="sizing-addon2">
                <option <?php if ($dataAbsen->absensi == 'hadir') { echo 'selected'; }?> value="hadir" > Hadir </option>
                <option <?php if ($dataAbsen->absensi == 'terlambat') { echo 'selected'; }?> value="terlambat" > terlambat </option>
                <option <?php if ($dataAbsen->absensi == 'cuti') { echo 'selected'; }?> value="cuti" > Cuti </option>
                <option <?php if ($dataAbsen->absensi == 'ijin') { echo 'selected'; }?> value="ijin" > Ijin </option>
                <option <?php if ($dataAbsen->absensi == 'alpha') { echo 'selected'; }?> value="alpha" > Alpha </option>
              </select>
              </div>
        </div>

        

        <div class="form-group">
          <div class="col-md-12">
              <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
          </div>
        </div>
      </form>
</div>

<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>