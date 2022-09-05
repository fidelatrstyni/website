<?php
  $no = 1;
  foreach ($dataKapal as $kapal) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $kapal->id_kapal; ?></td>
      <td><?php echo $kapal->nama; ?></td>
      <td><?php echo $kapal->jenis; ?></td>
      <td><?php echo $kapal->status; ?></td>
      <?php if($userdata->status == 'direktur') {
      } else {
      ?>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataKapal" data-id="<?php echo $kapal->id_kapal; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-kapal" data-id="<?php echo $kapal->id_kapal; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
      <?php } ?>
    </tr>
    <?php
    $no++;
  }
?>