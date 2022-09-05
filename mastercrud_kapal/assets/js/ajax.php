<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilPegawai();
		tampilAbsen();
		tampilKota();
		tampilProduk();
		tampilFinance();
		tampilPms();
		tampilPengadaan();
		tampilPelayaran();
		tampilInventory();
		tampilKapal();
		tampilMonitoring();
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
	function tampilProduk() {
		$.get('<?php echo base_url('Production/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-produk').html(data);
			refresh();
		});
	}

	function tampilFinance() {
		$.get('<?php echo base_url('Finance/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-finance').html(data);
			refresh();
		});
	}

	function tampilPegawai() {
		$.get('<?php echo base_url('Pegawai/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pegawai').html(data);
			refresh();
		});
	}

	function tampilPelayaran() {
		$.get('<?php echo base_url('Pelayaran/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pelayaran').html(data);
			refresh();
		});
	}

	function tampilPms() {
		$.get('<?php echo base_url('Pms/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pms').html(data);
			refresh();
		});
	}

	function tampilInventory() {
		$.get('<?php echo base_url('Inventory/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-inventory').html(data);
			refresh();
		});
	}

	function tampilPengadaan() {
		$.get('<?php echo base_url('Inventory/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pengadaan').html(data);
			refresh();
		});
	}

	function tampilMonitoring() {
		$.get('<?php echo base_url('Monitoring/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-monitoring').html(data);
			refresh();
		});
	}

	function tampilKapal() {
		$.get('<?php echo base_url('Kapal/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kapal').html(data);
			refresh();
		});
	}

	var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPegawai", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pegawai').modal('show');
		})
	})

	$('#form-tambah-pegawai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pegawai").reset();
				$('#tambah-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pegawai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pegawai").reset();
				$('#update-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pegawai').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})


	//Produk

	$('#form-tambah-produk').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Production/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProduk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-produk").reset();
				$('#tambah-produk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	var id_produk;
	$(document).on("click", ".konfirmasiHapus-production", function() {
		id_produk = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataProduk", function() {
		var id = id_produk;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Production/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilProduk();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataProduction", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Production/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			// console.log(data);
			$('#tempat-modal').html(data);
			$('#update-produk').modal('show');
		})
	})

	$(document).on('submit', '#form-update-produk', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Production/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProduk();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-produk").reset();
				$('#update-produk').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-produk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-produk').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//PMS

	/*$('#form-tambah-pms').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<//?php echo base_url('Pms/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPms();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pms").reset();
				$('#form-tambah-pms').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});*/

	/*var id_pms;
	$(document).on("click", ".konfirmasiHapus-pms", function() {
		id_pms = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPms", function() {
		var id = id_pms;

		$.ajax({
			method: "POST",
			url: "<//?php echo base_url('PMS/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPms();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPms", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<//?php echo base_url('PMS/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			// console.log(data);
			$('#tempat-modal').html(data);
			$('#update-pms').modal('show');
		})
	})

	$(document).on('submit', '#form-update-pms', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<//?php echo base_url('PMS/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPms();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pms").reset();
				$('#update-pms').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});*/

	//$('#tambah-pms').on('hidden.bs.modal', function () {
	  //$('.form-msg').html('');
	//})

	//$('#update-pms').on('hidden.bs.modal', function () {
	  //$('.form-msg').html('');
	//})


	//PMS

	$('#form-tambah-pms').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pms/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			// console.log(data)
			var out = jQuery.parseJSON(data);

			tampilPms();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pms").reset();
				$('#tambah-pms').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	var id_pms;
	$(document).on("click", ".konfirmasiHapus-pms", function() {
		id_pms = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPms", function() {
		var id = id_pms;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pms/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			window.location.reload();
			tampilPms();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on('submit', '#form-update-pms', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pms/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPms();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pms").reset();
				$('#update-pms').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.location.reload();
			}
		})

		e.preventDefault();
	});


	$(document).on("click", ".update-dataPms", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pms/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			// console.log(data)
			$('#tempat-modal').html(data);
			$('#update-pms').modal('show');

			// $('#update-kota').modal('show');
		})
	})

	$('#tambah-pms').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pms').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//---------------------------------------------------------------------------------

	//Pengadaan

	$('#form-tambah-pengadaan').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pengadaan/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			// console.log(data)
			var out = jQuery.parseJSON(data);

			tampilPengadaan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pengadaan").reset();
				$('#tambah-pengadaan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	var id_pengadaan;
	$(document).on("click", ".konfirmasiHapus-pengadaan", function() {
		id_pengadaan = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPengadaan", function() {
		var id = id_pengadaan;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengadaan/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			window.location.reload();
			tampilPengadaan();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on('submit', '#form-update-pengadaan', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pengadaan/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPengadaan();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pengadaan").reset();
				$('#update-pengadaan').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
				window.location.reload();
			}
		})

		e.preventDefault();
	});


	$(document).on("click", ".update-dataPengadaan", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pengadaan/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			// console.log(data)
			$('#tempat-modal').html(data);
			$('#update-pengadaan').modal('show');
		})
	})

	$('#tambah-pengadaan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pengadaan').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//---------------------------------------------------------------------------------


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

	//absen
	function tampilAbsen() {
		$.get('<?php echo base_url('Absen/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-absen').html(data);
			refresh();
		});
	}

	var id_absen;
	$(document).on("click", ".konfirmasiHapus-absen", function() {
		id_absen = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataAbsen", function() {
		var id = id_absen;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Absen/delete'); ?>",
			data: "id=" + id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilAbsen();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataAbsen", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('absen/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-absen').modal('show');
		})
	})

	$(document).on("click", ".detail-dataabsen", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('absen/detail'); ?>",
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
			$('#detail-absen').modal('show');
		})
	})

	$('#form-tambah-absen').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Absen/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAbsen();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-absen").reset();
				$('#tambah-absen').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-absen', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Absen/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAbsen();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-absen").reset();
				$('#update-absen').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-absen').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-absen').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//--------------------------------------------------------------------------

	//PELAYARAN

	var id_pelayaran;
	$(document).on("click", ".konfirmasiHapus-pelayaran", function() {
		id_pelayaran = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPelayaran", function() {
		var id = id_pelayaran;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pelayaran/delete'); ?>",
			data: "id=" + id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPelayaran();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPelayaran", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pelayaran/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pelayaran').modal('show');
		})
	})


	$('#form-tambah-pelayaran').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pelayaran/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPelayaran();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pelayaran").reset();
				$('#tambah-pelayaran').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pelayaran', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pelayaran/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilAbsen();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pelayaran").reset();
				$('#update-pelayaran').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-pelayaran').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-pelayaran').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//------------------------------------------------------------------

	//Inventory

	var id_inventory;
	$(document).on("click", ".konfirmasiHapus-inventory", function() {
		id_inventory = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataInventory", function() {
		var id = id_inventory;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Inventory/delete'); ?>",
			data: "id=" + id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilInventory();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataInventory", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Inventory/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-inventory').modal('show');
		})
	})


	$('#form-tambah-inventory').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Inventory/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilInventory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-inventory").reset();
				$('#tambah-inventory').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-inventory', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Inventory/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilInventory();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-inventory").reset();
				$('#update-inventory').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-inventory').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-inventory').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//-------------------------------------------------------------------------------

//KAPAL

var id_kapal;
	$(document).on("click", ".konfirmasiHapus-kapal", function() {
		id_kapal = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKapal", function() {
		var id = id_kapal;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kapal/delete'); ?>",
			data: "id=" + id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKapal();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKapal", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kapal/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kapal').modal('show');
		})
	})


	$('#form-tambah-kapal').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kapal/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKapal();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kapal").reset();
				$('#tambah-kapal').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kapal', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kapal/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKapal();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kapal").reset();
				$('#update-kapal').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-kapal').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-kapal').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

//-------------------------------------------------------------------------------

//MONITORING

var id_monitoring;
	$(document).on("click", ".konfirmasiHapus-monitoring", function() {
		id_monitoring = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataMonitoring", function() {
		var id = id_monitoring;

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Monitoring/delete'); ?>",
			data: "id=" + id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilMonitoring();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataMonitoring", function() {
		var id = $(this).attr("data-id");

		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Monitoring/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-monitoring').modal('show');
		})
	})


	$('#form-tambah-monitoring').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Monitoring/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilMonitoring();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-monitoring").reset();
				$('#tambah-monitoring').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$(document).on('submit', '#form-update-monitoring', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Monitoring/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilMonitoring();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-monitoring").reset();
				$('#update-monitoring').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})

		e.preventDefault();
	});

	$('#tambah-monitoring').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-monitoring').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	
</script>
