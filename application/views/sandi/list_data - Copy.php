
<?php
  $no = 1;
  foreach ($dataSandi as $sandi) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $sandi->unit; ?></td>
      <td><?php echo 'ND-'.$sandi->nd_minta.'/'.$sandi->kd_unit.'/'.'2022'; ?></td>
      <td><?php
          if ($sandi->id_sts==1) {
            echo "<span class='label label-success'>";
            echo $sandi->status;
            echo "</span>";
          } else if ($sandi->id_sts==2){
            echo "<span class='label label-danger'>";
            echo $sandi->status;
            echo "</span>";} else {
            echo "<span class='label label-warning'>";
            echo $sandi->status;
            echo "</span>";
            }
           ?></td>
      <td><?php echo 'ND-'.$sandi->nd_balas.'/PJ.10'.'/'.'2022'; ?></td>
      <td><?php echo $sandi->sandi; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning update-dataSandi" data-id="<?php echo $sandi->id; ?>"><i class="glyphicon glyphicon-pencil"></i> Edit</button>
          <button class="btn btn-danger konfirmasiHapus-sandi" data-id="<?php echo $sandi->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-trash"></i> Delete</button>
          
      </td>
    </tr>
    <?php
    $no++;
  }


?>

<script type="text/javascript">
        var span = document.querySelector("span");
        function copyTeks(){
            document.execCommand("copy");
            alert("data '" + span.textContent + "' berhasil di salin" )
        }
        span.addEventListener("copy", function(event) {
          event.preventDefault();
          if (event.clipboardData) {
            event.clipboardData.setData("text/plain", span.textContent);
            console.log(event.clipboardData.getData("text"))
          }
        });
    </script>