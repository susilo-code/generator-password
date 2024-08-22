<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-6">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-skema"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data</button>
    </div>
    <div class="col-md-3">
        <a  data-toggle="modal" data-target="#tambah-koneksi" class="form-control btn btn-default"><i class="fa fa-cogs"></i> Set Nama Koneksi</a>
    </div>
    <div class="col-md-3">
        <a  data-toggle="modal" data-target="#tambah-schema" class="form-control btn btn-default"><i class="fa fa-cogs"></i> Set Skema</a>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Database</th>
          <th>Skema</th>
          <th>Koneksi</th>
          <th>Nama Tabel</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-skema">
      
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_skema; ?>
<?php echo $modal_tambah_schema; ?>
<?php echo $modal_tambah_koneksi; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSkema', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Skema';
  $data['url'] = 'Skema/import';
  echo show_my_modal('modals/modal_import', 'import-skema', $data);
?>