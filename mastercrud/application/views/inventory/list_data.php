<?php

  foreach ($dataInventory as $inventory) {
    echo var_dump($dataInventory);
    ?>
    <tr>
      <!--td style="min-width:230px;"><//?php echo $inventory->inventory; ?></td-->
      <td><?php echo $inventory->kode_kapal; ?></td>
      <td><?php echo $inventory->nama_barang; ?></td>
      <td><?php echo $inventory->jenis_barang; ?></td>
      <td><?php echo $inventory->stok_barang; ?></td>
      <td><?php echo $inventory->status_barang; ?></td>
      <!--td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataPegawai" data-id="<//?php echo $pegawai->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-pegawai" data-id="<//?php echo $pegawai->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td-->
    </tr>
    <?php
  }
?>