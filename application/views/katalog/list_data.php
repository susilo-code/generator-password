<?php
$no = 1;
  foreach ($dataKatalog as $katalog) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $katalog->nm_data; ?></td>
      <td><?php echo $katalog->nm_skema; ?></td>
      <td><?php echo $katalog->nm_tabel; ?></td>
      <td><?php echo $katalog->keterangan; ?></td>
      <td class="text-center" style="min-width:200px;">
        <button class="btn btn-warning update-dataKatalog" data-id="<?php echo $katalog->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-katalog" data-id="<?php echo $katalog->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>