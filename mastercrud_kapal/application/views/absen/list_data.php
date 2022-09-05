<?php
  $no = 1;
  foreach ($dataAbsen as $absen) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $absen->nama; ?></td>
      <td><?php echo $absen->tanggal; ?></td>
      <td><?php echo $absen->absensi; ?></td>
      <?php if($userdata->status == 'direktur') {
      } else {
      ?>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataAbsen" data-id="<?php echo $absen->id_absen; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-absen" data-id="<?php echo $absen->id_absen; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
      <?php } ?>
    </tr>
    <?php
    $no++;
  }
?>