<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data posisi</h3>

  <form id="form-tambah-absen" method="POST">
  <!--input type="hidden" name="tanggal" value="<//?php echo date("d-m-Y"); ?>"-->
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select name="id_crew" class="form-control select2" aria-describedby="sizing-addon2">
        <?php
        foreach ($dataCrew as $absen) {
          ?>
          <option value="<?php echo $absen->id_crew; ?>">
            <?php echo $absen->nama; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select name="absensi" class="form-control select2" aria-describedby="sizing-addon2">
        <option selected>Absen</option>
        <option value="hadir">Hadir</option>
        <option value="terlambat">Terlambat</option>
        <option value="cuti">Cuti</option>
        <option value="ijin">Ijin</option>
        <option value="alpha">Alpha</option>
      </select>
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>