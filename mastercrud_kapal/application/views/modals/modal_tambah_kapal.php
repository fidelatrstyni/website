<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Kapal</h3>

  <form id="form-tambah-kapal" method="POST">

  <input type="hidden" name="id_kapal" required="required" readonly value="<?= $kodeKapal; ?>" >

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama" name="nama" aria-describedby="sizing-addon2">
    </div>

    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="fa fa-ship"></i>
      </span>
      <select name="jenis" class="form-control select2" aria-describedby="sizing-addon2">
        <option selected>Pilih jenis kapal</option>
        <option value="Container Vessels">Container Vessels</option>
        <option value="Breakbulk Vessels">Breakbulk Vessels</option>
        <option value="Ro-Ro Vessels">Ro-Ro Vessels</option>
        <option value="Multi-purpose Vessels">Multi-purpose Vessels</option>
        <option value="Tanker Vessels">Tanker Vessels</option>
        <option value="LNG Carriers">LNG Carriers</option>
        <option value="Crude Carriers">Crude Carriers</option>
        <option value="Reefer Vessels">Reefer Vessels</option>
      </select>
    </div>

    <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-tag"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" name="status" value="aktif" class="minimal">
      <label for="aktif">Aktif</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="status" value="tidak aktif" class="minimal"> 
      <label for="tidak aktif">Tidak Aktif</label>
        </span>
    </div>

    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>