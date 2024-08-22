<?php
  $no = 1;
  foreach ($dataData as $data) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php if ($data->id_ktgr_data ==1) {
        echo "Internal"; } else {
          echo "Eksternal" ;
        } ?></td>
      <td><?php echo $data->jns_data; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataData" data-id="<?php echo $data->id_data; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-data" data-id="<?php echo $data->id_data; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>