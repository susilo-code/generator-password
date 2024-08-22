<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Generate Password</h3>

  <form id="form-tambah-sandi" method="POST">
    <div class="input-group form-group">
      <input type="hidden" class="form-control" value="<?php echo $userdata->id; ?>" name="autor" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-map-marker"></i>
      </span>
      <select name="unit"  class="form-control select2" aria-describedby="sizing-addon2" style="width: 100%">
        <option value="" placeholder="Jenis Data"  ></option>
        <?php
        foreach ($dataUnit as $unit) {
          ?>
          <option value="<?php echo $unit->kd_unit; ?>">
            <?php echo $unit->nm_unit; ?>
          </option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-arrow-right"></i>
      </span>
      <input type="text" class="form-control" placeholder="ND Permintaan Data : Nomornya aja ya" name="asal" aria-describedby="sizing-addon2">
    </div>
    
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-send"></i>
      </span>
      <input type="text" class="form-control" placeholder="ND Balasan DIP : Nomornya aja ya " name="balas" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group" style="display: inline-block;">
      <span class="input-group-addon" id="sizing-addon2">
      <i class="glyphicon glyphicon-tag"></i>
      </span>
      <span class="input-group-addon">
          <input type="radio" name="status" value="1" id="internal" class="minimal">
      <label for="internal">DITERIMA</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="status" value="2" id="eksternal" class="minimal"> 
      <label for="eksternal">DITOLAK</label>
        </span>
        <span class="input-group-addon">
          <input type="radio" name="status" value="3" id="eksternal" class="minimal"> 
      <label for="eksternal">DATA TDK ADA</label>
        </span>
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Generate Password</button>
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