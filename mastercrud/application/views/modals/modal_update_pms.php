<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data PMS</h3>

  <form id="form-update-pms" method="POST">
    <?php var_dump($dataPms);?>
    <?php var_dump($dataCek);?>
    <input type="hidden" name="id_pms" value="<?php echo $dataPms->id_pms; ?>">
    <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-home"></i>
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

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Pemeliharaan" name="pemeliharaan" aria-describedby="sizing-addon2" value="<?php echo $dataPms->pemeliharaan; ?>">
    </div>
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
