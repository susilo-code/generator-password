<?php
  $no = 1;
  foreach ($dataUnit as $unit) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $unit->kd_unit; ?></td>
      <td><?php echo $unit->nm_unit; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataUnit" data-id="<?php echo $unit->kd_unit; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-unit" data-id="<?php echo $unit->kd_unit; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>