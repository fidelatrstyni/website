<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Pengadaan</h3>

  <form id="form-update-pengadaan" method="POST">
    <input type="hidden" name="id_pengadaan" value="<?php echo $dataPengadaan->id_pengadaan; ?>">
    <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
            <i class="glyphicon glyphicon-home"></i>
          </span>
          <select name="kode_item" class="form-control select2" aria-describedby="sizing-addon2">
            <?php
            foreach ($dataPms as $pms) {
              ?>
              <option <?php if ($pms->id_pms == $dataPengadaan->kode_item) { echo 'selected'; }?> value="<?php echo $pms->id_pms; ?>">
                <?php echo $pms->id_pms; ?>
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
      <input type="text" class="form-control" placeholder="Permintaan Item" name="permintaan_item" aria-describedby="sizing-addon2" value="<?php echo $dataPengadaan->permintaan_item; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-tag"></i>
      </span>
      <input type="text" class="form-control" placeholder="Brand" name="brand" aria-describedby="sizing-addon2" value="<?php echo $dataPengadaan->brand; ?>">
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-oil"></i>
      </span>
      <input type="number" class="form-control" placeholder="Stock" name="stock" aria-describedby="sizing-addon2" value="<?php echo $dataPengadaan->stock; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-home"></i>
      </span>
      <input type="text" class="form-control" placeholder="Gudang" name="gudang" aria-describedby="sizing-addon2" value="<?php echo $dataPengadaan->gudang; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Supplier" name="supplier" aria-describedby="sizing-addon2" value="<?php echo $dataPengadaan->supplier; ?>">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
