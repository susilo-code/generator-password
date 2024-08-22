<?php
  $no = 1;
  foreach ($dataSkema as $skema) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $skema->nm_dbase; ?></td>
      <td><?php echo $skema->skema; ?></td>
      <td><?php echo $skema->koneksi; ?></td>
      <td><?php echo $skema->nm_tabel; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataSkema" data-id="<?php echo $skema->id_skema; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-skema" data-id="<?php echo $skema->id_skema; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>