// //load
$(document).ready(function()
{
	// addSantri("TMI");
	setTable();
	setTableHD();
	$('.datepicker').datepicker(
	{
		rtl: App.isRTL(),
		orientation: "left",
		autoclose: true,
		format: 'dd-mm-yyyy'
    });
	$('.numbers-only').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
			if ((charCode >= 48 && charCode <= 57)
				|| charCode == 46
				|| charCode == 44
				|| charCode == 8)
				return true;
		return false;
	});

	validate_add_kelas();
	validate_add_kelasHD();
});

function OtomatisKapital(a) {
	setTimeout(function () {
		a.value = a.value.toUpperCase();
	}, 1);
}

//#region  kelasHD
var validate_add_kelasHD = function () {

	var form = $('#add_kelasHD');
	var error2 = $('.alert-danger', form);
	var success2 = $('.alert-success', form);

	form.validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input

		invalidHandler: function (event, validator) { //display error alert on form submit              
			success2.hide();
			error2.show();
			App.scrollTo(error2, -200);
		},

		errorPlacement: function (error, element) { // render error placement for each input type
			var icon = $(element).parent('.input-icon').children('i');
			icon.removeClass('fa-check').addClass("fa-warning");
			icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
		},

		highlight: function (element) { // hightlight error inputs
			$(element)
				.closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
		},

		unhighlight: function (element) { // revert the change done by hightlight

		},

		success: function (label, element) {
			var icon = $(element).parent('.input-icon').children('i');
			$(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
			icon.removeClass("fa-warning").addClass("fa-check");
		},

		submitHandler: function (form) {
			success2.show();
			error2.hide();
			form[0].submit(); // submit the form
		}
	});
}

function clearvalidate_add_kelasHD() {

	$("#add_kelasHD div").removeClass('has-error');
	$("#add_kelasHD i").removeClass('fa-warning');
	$("#add_kelasHD div").removeClass('has-success');
	$("#add_kelasHD i").removeClass('fa-check');

	document.getElementById("add_kelasHD").reset();
}

function setTableHD() {
	$('#tb_listHD').DataTable({
		"order": [[1, "asc"]],
		"processing": true,
		"serverSide": true,
		"bFilter": false,
		ajax: {
			'url': base_url + "kelas/load_gridHD",
			'type': 'GET',
			'data': function (d) {
				d.param = $('#hid_paramHD').val();
			}
		},
	});
}

function addkelasHD() {
	$('#save_buttonHD').text('SAVE');
	// kosong();
	clearvalidate_add_kelasHD();
	$('#id_kelas').attr('readonly', true);
	$('#Modal_add_kelasHD').modal('show');
}

function svKelasHD() {
	if ($("#add_kelasHD").valid() == true) {
		$tingkat = $('#tingkat').val();
		$tipe_kelas = $('#tipe_kelas').val();
		$status = $('#save_buttonHD').text();
		var str_url = encodeURI(base_url + "kelas/get_data_cekkelasHD/" + $tingkat + "/"+ $tipe_kelas);
		$.ajax({
			type: "POST",
			url: str_url,
			dataType: "html",
			success: function (data) {
				$data = $.parseJSON(data);
				if ($data != null ) {
					bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SUDAH ADA DI DATABASE! </div>",
						function (result) {
							if (result == true) {
							}
						}
					);

				}
				else {
					var iform = $('#add_kelasHD')[0];
					var data = new FormData(iform);
					if ($status == 'UPDATE') {
						msg = "Update Data Berhasil"
					}
					else {
						msg = "Simpan Data Berhasil"
					}
					$.ajax({

						type: "POST",
						url: base_url + "kelas/simpan_kelasHD/" + $status,
						enctype: 'multipart/form-data',
						// dataType:"JSON",
						contentType: false,
						processData: false,
						data: data,
						success: function (data) {

							bootbox.alert({
								message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;" + msg + "!!",
								size: 'small',
								callback: function () {

									window.location = base_url + 'kelas';
								}
							});
						}
					});
				}
			}
		});
	}
}

function editHD(id_kelas) {
	clearvalidate_add_kelasHD();
	var str_url = encodeURI(base_url + "kelas/get_data_kelasHD/" + id_kelas);
	$('#save_buttonHD').text('UPDATE');
	$('#id_kelas').attr('readonly', true);
	$.ajax({

		type: "POST",
		url: str_url,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			$('#id_kelas').val(data['id_kelas']);//untuk membaca kategori saat update
			$('#tingkat').val(data['tingkat']);
			$('#tipe_kelas').val(data['tipe_kelas']);

			$('#Modal_add_kelasHD').modal('show');


		}
	});

}

function hapusHD(id_kelas) {
	var str_url = encodeURI(base_url + "kelas/DelKelasHD/" + id_kelas);
	bootbox.confirm("Anda yakin akan menghapus ?",
		function (result) {
			if (result == true) {

				$.ajax({
					type: "POST",
					url: str_url,
					dataType: "html",
					success: function (data) {
						bootbox.alert({
							message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil Berhasil",
							size: 'small',
							callback: function () {

								window.location = base_url + 'kelas';
							}
						});
					}
				});
			}
		}
	);

}

function downloadExcelHD() {

	var param = $('#hid_paramHD').val();
	param = ioEncode(param);

	window.location = base_url + 'kelas/exportexcelHD/' + param;
}
//#endregion kelasHF

//#region kelasDT
function setTable() {
	$('#tb_list').DataTable({
		"order": [[0, "asc"]],
		"processing": true,
		"serverSide": true,
		"bFilter": false,
		ajax: {
			'url': base_url + "kelas/load_grid",
			'type': 'GET',
			'data': function (d) {
				d.param = $('#hid_param').val();
			}
		},
	});
}

function kosong() {
	$('#kode_kelas').val('');
	$('#tingkat').val('');
	$('#nama').val('');
	$('#kapasitas').val('');
	$('#tipe_kelas').val('');
}

var validate_add_kelas = function () {

	var form = $('#add_kelas');
	var error2 = $('.alert-danger', form);
	var success2 = $('.alert-success', form);

	form.validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input

		invalidHandler: function (event, validator) { //display error alert on form submit              
			success2.hide();
			error2.show();
			App.scrollTo(error2, -200);
		},

		errorPlacement: function (error, element) { // render error placement for each input type
			var icon = $(element).parent('.input-icon').children('i');
			icon.removeClass('fa-check').addClass("fa-warning");
			icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
		},

		highlight: function (element) { // hightlight error inputs
			$(element)
				.closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
		},

		unhighlight: function (element) { // revert the change done by hightlight

		},

		success: function (label, element) {
			var icon = $(element).parent('.input-icon').children('i');
			$(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
			icon.removeClass("fa-warning").addClass("fa-check");
		},

		submitHandler: function (form) {
			success2.show();
			error2.hide();
			form[0].submit(); // submit the form
		}
	});
}

function clearvalidate_add_kelas() {

	$("#add_kelas div").removeClass('has-error');
	$("#add_kelas i").removeClass('fa-warning');
	$("#add_kelas div").removeClass('has-success');
	$("#add_kelas i").removeClass('fa-check');

	document.getElementById("add_kelas").reset();
}

function svKelas() {
	if ($("#add_kelas").valid() == true) {
		$kode_kelas = $('#kode_kelas').val();
		$status = $('#save_button').text();
		var str_url = encodeURI(base_url + "kelas/get_data_kelas/" + $kode_kelas);
		$.ajax({
			type: "POST",
			url: str_url,
			dataType: "html",
			success: function (data) {
				$data = $.parseJSON(data);
				if ($data != null & $status == 'SAVE') {
					bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SUDAH ADA DI DATABASE! </div>",
						function (result) {
							if (result == true) {
							}
						}
					);

				}
				else {
					var iform = $('#add_kelas')[0];
					var data = new FormData(iform);
					if ($status == 'UPDATE') {
						msg = "Update Data Berhasil"
					}
					else {
						msg = "Simpan Data Berhasil"
					}
					$.ajax({

						type: "POST",
						url: base_url + "kelas/simpan_kelas/" + $status,
						enctype: 'multipart/form-data',
						// dataType:"JSON",
						contentType: false,
						processData: false,
						data: data,
						success: function (data) {

							bootbox.alert({
								message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;" + msg + "!!",
								size: 'small',
								callback: function () {

									window.location = base_url + 'kelas';
								}
							});
						}
					});
				}
			}
		});
	}
}

function addkelas() {
	$('#save_button').text('SAVE');
	// kosong();
	clearvalidate_add_kelas();
	$('#kode_kelas').attr('readonly', false);
	$('#Modal_add_kelas').modal('show');
}

function edit(kode_kelas) {
	clearvalidate_add_kelas();
	var str_url = encodeURI(base_url + "kelas/get_data_kelas/" + kode_kelas);
	$('#save_button').text('UPDATE');
	$('#kode_kelas').attr('readonly', true);
	$.ajax({

		type: "POST",
		url: str_url,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			$('#kode_kelas').val(data['kode_kelas']);//untuk membaca kategori saat update
			$('#select_tingkat').val(data['id_kelas']);
			$('#nama').val(data['nama']);
			$('#kapasitas').val(data['kapasitas']);

			$('#Modal_add_kelas').modal('show');


		}
	});

}

function hapus(kode_kelas) {
	var str_url = encodeURI(base_url + "kelas/DelKelas/" + kode_kelas);
	bootbox.confirm("Anda yakin akan menghapus " + kode_kelas + " ini ?",
		function (result) {
			if (result == true) {

				$.ajax({
					type: "POST",
					url: str_url,
					dataType: "html",
					success: function (data) {
						bootbox.alert({
							message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil Berhasil",
							size: 'small',
							callback: function () {

								window.location = base_url + 'kelas';
							}
						});
					}
				});
			}
		}
	);

}

function downloadExcel() {

	var param = $('#hid_param').val();
	param = ioEncode(param);

	window.location = base_url + 'kelas/exportexcel/' + param;
}
//#endregion kelasDT

//#region cari
function clearformcari() {
	$('#s_kodekelas').val('');
	// $('#s_namalengkap').val('');
}

function Modalcari() {
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction() {
	var kode_kelas = $('#s_kodekelas').val();
	var nama_lengkap = $('#s_namalengkap').val();
	var param = { 'kode_kelas': kode_kelas };
	param = JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload(null, false);
	table.draw();

	$('#Modal_cari').modal('toggle');
}
//#endregion cari


function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}