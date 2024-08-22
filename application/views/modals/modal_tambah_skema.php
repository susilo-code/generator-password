<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Referensi Tabel</h3>

  <form id="form-tambah-skema" method="POST">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-database"></i>
      </span>
      <select name="dbase"  class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
        <option value=" "
            placeholder="Jenis Data">
          </option>
        <?php
        foreach ($dataDbase as $data) {
          ?>
          <option value="<?php echo $data->id; ?>">
            <?php echo $data->nm_dbase; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-user"></i>
      </span>
      <select name="skema"  class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
        <option value=" "
            placeholder="Jenis Data">
          </option>
        <?php
        foreach ($dataSchema as $data) {
          ?>
          <option value="<?php echo $data->id; ?>">
            <?php echo $data->nm_schema; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-link"></i>
      </span>
      <select name="koneksi"  class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
        <option value=" "
            placeholder="Jenis Data">
          </option>
        <?php
        foreach ($dataKoneksi as $data) {
          ?>
          <option value="<?php echo $data->id; ?>">
            <?php echo $data->nm_koneksi; ?>
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
      <input type="text" class="form-control" placeholder="Nama Tabel" name="tabel" aria-describedby="sizing-addon2">
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