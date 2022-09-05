<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Monitoring</h3>

  <form id="form-update-monitoring" method="POST">
    <input type="hidden" name="id_monitoring" value="<?php echo $dataMonitoring->id_monitoring; ?>">
    <input type="hidden" name="waktu" value="<?php echo $dataMonitoring->waktu; ?>">
    <div class="input-group form-group">
          <span class="input-group-addon" id="sizing-addon2">
          <i class="fa fa-ship" aria-hidden="true"></i>
          </span>
          <select name="code_kapal" class="form-control select2" aria-describedby="sizing-addon2">
            <?php
            foreach ($dataKapal as $kapal) {
              ?>
              <option <?php if ($kapal->id_kapal == $dataMonitoring->code_kapal) { echo 'selected'; }?> value="<?php echo $kapal->id_kapal; ?>">
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
      <input type="text" class="form-control" placeholder="RPM" name="rpm" aria-describedby="sizing-addon2" value="<?php echo $dataMonitoring->rpm; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
      </span>
      <input type="text" class="form-control" placeholder="Flowmeter" name="flowmeter" aria-describedby="sizing-addon2" value="<?php echo $dataMonitoring->flowmeter; ?>">
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-pushpin"></i>
      </span>
      <input type="text" class="form-control" placeholder="Temperatur" name="temperatur" aria-describedby="sizing-addon2" value="<?php echo $dataMonitoring->temperatur; ?>">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-tachometer" aria-hidden="true"></i>
      </span>
      <input type="text" class="form-control" placeholder="Pressurre" name="pressurre" aria-describedby="sizing-addon2" value="<?php echo $dataMonitoring->pressurre; ?>">
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>
