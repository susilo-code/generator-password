<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Katalog Data</h3>

  <form id="form-tambah-katalog" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-volume-up"></i>
      </span>
      <input type="textarea" class="form-control" placeholder="Nama Data" name="nm_data" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <select name="schema"  class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
        <option value=" "
            placeholder="Jenis Data">
          </option>
        <?php
        foreach ($dataSchema as $schema) {
          ?>
          <option value="<?php echo $schema->id; ?>">
            <?php echo $schema->nm_schema; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-table"></i>
      </span>
      <select name="jenis"  class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
        <option value=" "
            placeholder="Jenis Data">
          </option>
        <?php
        foreach ($dataSkema as $skema) {
          ?>
          <option value="<?php echo $skema->id_skema; ?>">
            <?php echo $skema->nm_tabel; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-pencil"></i>
      </span>
      <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" aria-describedby="sizing-addon2">
    </div>
    
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>


<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>