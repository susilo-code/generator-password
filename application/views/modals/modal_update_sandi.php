<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data</h3>

  <form id="form-update-sandi" method="POST">
    <div class="input-group form-group">
      <input type="hidden" class="form-control"  name="sandi" aria-describedby="sizing-addon2" value="<?php echo $dataSandi->sandi; ?>">
      <input type="hidden" class="form-control"  name="id" aria-describedby="sizing-addon2" value="<?php echo $dataSandi->id; ?>">
      <input type="hidden" class="form-control"  name="unit" aria-describedby="sizing-addon2" value="<?php echo strtoupper($dataSandi->kd_unit); ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-arrow-right"></i>
      </span>
      <input type="text" class="form-control"  name="minta" aria-describedby="sizing-addon2" value="<?php echo $dataSandi->nd_minta; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-send"></i>
      </span>
      <input type="text" class="form-control"  name="balas" aria-describedby="sizing-addon2" value="<?php echo $dataSandi->nd_balas; ?>">
    </div>
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
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