<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "select":true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilData();
		tampilKatalog();
		tampilUnit();
		tampilSandi();
		tampilSkema();
		tampilSchema();
		tampilKoneksi();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}


	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-kota').modal('show');
		})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kota").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kota', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Data
	function tampilData() {
		$.get('<?php echo base_url('Data/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-data').html(data);
			refresh();
		});
	}

	var id_data;
	$(document).on("click", ".konfirmasiHapus-data", function() {
		id_data = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataData", function() {
		var id = id_data;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Data/delete'); ?>",
			data: "id_data=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilData();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$('#form-tambah-data').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Data/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilData();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-data").reset();
				$('#tambah-data').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});
		$('#tambah-data').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	//Katalog
	
	function tampilKatalog() {
		$.get('<?php echo base_url('Katalog/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-katalog').html(data);
			refresh();
		});
	}

	var id_katalog;
	$(document).on("click", ".konfirmasiHapus-katalog", function() {
		id_katalog = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKatalog", function() {
		var id = id_katalog;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Katalog/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKatalog();
			$('.msg').html(data);
			effect_msg();
		})
	})


	$('#form-tambah-katalog').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Katalog/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKatalog();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-katalog").reset();
				$('#tambah-katalog').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

		$('#tambah-katalog').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Unit
	function tampilUnit() {
		$.get('<?php echo base_url('Unit/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-unit').html(data);
			refresh();
		});
	}

	var id_unit;
	$(document).on("click", ".konfirmasiHapus-unit", function() {
		id_unit = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataUnit", function() {
		var id = id_unit;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Unit/delete'); ?>",
			data: "kd_unit=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilUnit();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataUnit", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Unit/update'); ?>",
			data: "kd_unit=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-unit').modal('show');
		})
	})

	$(document).on("click", ".detail-dataUnit", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Unit/detail'); ?>",
			data: "kd_unit=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-unit').modal('show');
		})
	})

	$('#form-tambah-unit').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sandi/prosesTambahunit'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilUnit();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-unit").reset();
				$('#tambah-unit').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-unit', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Unit/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilUnit();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-unit").reset();
				$('#update-unit').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-unit').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-unit').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	//Sandi
	function tampilSandi() {
		$.get('<?php echo base_url('Sandi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-sandi').html(data);
			refresh();
		});
	}

	var id_sandi;
	$(document).on("click", ".konfirmasiHapus-sandi", function() {
		id_sandi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSandi", function() {
		var id = id_sandi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sandi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSandi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSandi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sandi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-sandi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataSandi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sandi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-unit').modal('show');
		})
	})

	$('#form-tambah-sandi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sandi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSandi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-sandi").reset();
				$('#tambah-sandi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-sandi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sandi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSandi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-sandi").reset();
				$('#update-sandi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-sandi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-sandi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Skema

	function tampilSkema() {
		$.get('<?php echo base_url('Skema/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-skema').html(data);
			refresh();
		});
	}

	var id_skema;
	$(document).on("click", ".konfirmasiHapus-skema", function() {
		id_skema = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSkema", function() {
		var id = id_skema;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Skema/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSkema();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSkema", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Skema/update'); ?>",
			data: "id_skema=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-Skema').modal('show');
		})
	})

	$(document).on("click", ".detail-dataSkema", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Skema/detail'); ?>",
			data: "id_skema=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-skema').modal('show');
		})
	})

	$('#form-tambah-skema').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Skema/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSkema();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-skema").reset();
				$('#tambah-skema').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-skema', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Skema/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSkema();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-skema").reset();
				$('#update-skema').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-skema').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-skema').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Schema

	function tampilSchema() {
		$.get('<?php echo base_url('Schema/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-schema').html(data);
			refresh();
		});
	}

	var id_skema;
	$(document).on("click", ".konfirmasiHapus-schema", function() {
		id_skema = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSchema", function() {
		var id = id_skema;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Schema/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSchema();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSchema", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Schema/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-Schema').modal('show');
		})
	})

	$(document).on("click", ".detail-dataSchema", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Schema/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-schema').modal('show');
		})
	})

	$('#form-tambah-schema').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Skema/prosesTambahschema'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSchema();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-schema").reset();
				$('#tambah-schema').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-skema', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Skema/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSkema();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-skema").reset();
				$('#update-skema').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-schema').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-skema').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Koneksi

	function tampilKoneksi() {
		$.get('<?php echo base_url('Koneksi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-koneksi').html(data);
			refresh();
		});
	}

	var id_koneksi;
	$(document).on("click", ".konfirmasiHapus-koneksi", function() {
		id_koneksi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKoneksi", function() {
		var id = id_koneksi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Koneksik/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKoneksi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKoneksi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Koneksi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-Koneksi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKoneksi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Koneksi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-koneksi').modal('show');
		})
	})

	$('#form-tambah-koneksi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Skema/prosesTambahkoneksi'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKoneksi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-koneksi").reset();
				$('#tambah-koneksi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-skema', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Skema/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSkema();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-skema").reset();
				$('#update-skema').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-koneksi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-skema').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>