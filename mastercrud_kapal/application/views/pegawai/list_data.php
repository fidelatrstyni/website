<?php

  foreach ($dataCrew as $crew) {
    ?>
    <tr>
      <!--td style="min-width:230px;"><//?php echo $crew->crew; ?></td-->
      <td><?php echo $crew->kode_kapal; ?></td>
      <td><?php echo $crew->nama; ?></td>
      <td><?php echo $crew->jabatan; ?></td>
      <td><?php echo $crew->departemen; ?></td>
      <td><?php echo $crew->email; ?></td>
      <!--td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<//?php echo $crew->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<//?php echo $crew->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button-->
      <!--/td-->
    </tr>
    <?php
  }
?>