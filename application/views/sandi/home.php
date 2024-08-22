<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-sandi"><i class="glyphicon glyphicon-plus-sign"></i> Create Password</button>
    </div>
    <div class="col-md-3">
        <a  data-target="#tambah-unit" data-toggle="modal" class="form-control btn btn-default"><i class="fa fa-cogs"></i> Setting Unit</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Asal ND</th>
          <th>ND Permintaan</th>
          <th>Status</th>
          <th>ND Balasan</th>
          <th>Password</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-sandi">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_sandi; ?>
<?php echo $modal_tambah_unit; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSandi', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Sandi';
  $data['url'] = 'Sandi/import';
  echo show_my_modal('modals/modal_import', 'import-sandi', $data);
?>