// //load
$(document).ready(function()
{
	// addSantri("TMI");
	setTable();
	// setTable_listsantri();
    $(".select2").select2();
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

	validate_add_nilai ();
	validate_add_penilaian();

});

function OtomatisKapital(a) {
	setTimeout(function () {
		a.value = a.value.toUpperCase();
	}, 1);
}

//#region loadpage
	function setTable(){
		$('#tb_list').DataTable( {
			"order": [[ 2, "ASC" ]],
			"bPaginate": false,
			"searching": false,
			"processing": true,
			"serverSide": true,
			"bFilter":false,
			ajax: {
				'url':base_url+"nilai/load_grid",
				'type':'GET',
				'data': function ( d ) {
					d.param = $('#hid_param').val();
				}
			},
			columnDefs: [
				{ width: 2, targets: 0 },
				{ width: 1, targets: 1 },
				{ width: 1, targets: 2 },
				{ width: 10, targets: 3 },
				{ width: 10, targets: 4 },
				{ width: 10, targets: 5 },
				{ width: 20, targets: 6 },
				{ width: 20, targets: 7 },
				{ width: 10, targets: 8 },
				{ width: 10, targets: 9 },
				//  { width: 10, targets: 4 },
				{
					targets: [10],         //action
					orderable: false,
					width: 1
				}
			],
		});
	}

//#endregion loadpage
//#region modal listsantri
	function clearvalidate_add_nilai() {

		$("#add_nilai div").removeClass('has-error');
		$("#add_nilai i").removeClass('fa-warning');
		$("#add_nilai div").removeClass('has-success');
		$("#add_nilai i").removeClass('fa-check');

		document.getElementById("add_nilai").reset();
	}

	function edit(id_thn_ajar, deskripsi, semester, santri, kode_kelas, nama, id_guru, nama_lengkap, id_mapel, nama_matpal) {
		clearvalidate_add_nilai();
		$('#id_thn_ajar').val(id_thn_ajar);
		$('#deskripsi').val(deskripsi);
		$('#semester').val(semester);
		$('#santri').val(santri);
		$('#kode_kelas').val(kode_kelas + '#' + nama);
		$('#id_guru').val(id_guru + '#' + nama_lengkap);
		$('#id_mapel').val(id_mapel + '#' + nama_matpal);

		setTable_listsantri();
		$('#Modal_add_nilai').modal('show');

	}

	function setTable_listsantri() {
		var kode_kelas = $('#kode_kelas').val();
		kode_kelas = kode_kelas.split('#');
		kode_kelas = kode_kelas[0];

		if (kode_kelas != '') {

			$('#tb_list_listsantri').DataTable({
				"bDestroy": true,
				"order": [[1, "ASC"]],
				"bPaginate": false,
				"bsearching": false,
				"processing": true,
				"serverSide": true,
				"bFilter": false,
				ajax: {
					'url': base_url + "nilai/load_grid_listsantri/" + kode_kelas,
					'type': 'GET',
					'data': function (d) {
						d.param_listsantri = $('#hid_param_listsantri').val();
					}
				},
				columnDefs: [
					{ width: 2, targets: 0 },
					{ width: 1, targets: 1 },
					{ width: 1, targets: 2 },
					//  { width: 10, targets: 4 },
					{
						targets: [3],         //action
						orderable: false,
						width: 5
					}
				],
			});
		}
	}

	var validate_add_nilai = function () {

		var form = $('#add_nilai');
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

	function addnilai() {
		$('#save_button').text('SAVE');
		kosong();
		clearvalidate_add_nilai();
		$('#Modal_add_nilai').modal('show');
	}
//#endregion Modal listsantri
//#region Modal ListNilai
	function clearvalidate_add_nilai_santri() {
		$('#tb_list_Penilaian > tbody').html('"<tr><td colspan=\"5\" align=\"center\">Belum Ada Data.</td></tr>"');

		$("#add_nilai_santri div").removeClass('has-error');
		$("#add_nilai_santri i").removeClass('fa-warning');
		$("#add_nilai_santri div").removeClass('has-success');
		$("#add_nilai_santri i").removeClass('fa-check');

		document.getElementById("add_nilai_santri").reset();
	}

	function edit_santri(no_registrasi) {
		clearvalidate_add_nilai_santri();

		$('#id_thn_ajar_nilai_santri').val($('#id_thn_ajar').val());
		$('#deskripsi_nilai_santri').val($('#deskripsi').val());
		$('#semester_nilai_santri').val($('#semester').val());
		$('#santri_nilai_santri').val($('#santri').val());
		$('#kode_kelas_nilai_santri').val($('#kode_kelas').val());
		$('#id_guru_nilai_santri').val($('#id_guru').val());
		$('#id_mapel_nilai_santri').val($('#id_mapel').val());
		var id_thn_ajar = $('#id_thn_ajar').val();
		var semester = $('#semester').val();
		var kode_kelas = $('#kode_kelas').val();
			kode_kelas = kode_kelas.split('#');
			kode_kelas = kode_kelas[0];
		var id_guru = $('#id_guru').val();
			id_guru = id_guru.split('#');
			id_guru = id_guru[0];
		var id_mapel = $('#id_mapel').val();
			id_mapel = id_mapel.split('#');
			id_mapel = id_mapel[0];

		var str_url = encodeURI(base_url + "nilai/get_data_nilai_by_noregistrasi/" + no_registrasi + "/" + id_thn_ajar + "/" + semester + "/" + kode_kelas + "/" + id_guru + "/" + id_mapel);
		$.ajax({

			type: "POST",
			url: str_url,
			dataType: "html",
			success: function (data) {
				$('#Modal_add_nilai_santri').modal('show');
				var data = $.parseJSON(data);
				$('#no_registrasi').val(data[0].no_registrasi);
				$('#nama_lengkap').val(data[0].nama_lengkap);

				if (data[0].id != null) {
					//create html lst data
					var status_btn = 'UPDATE';
					$('#id_trans_nilai').val(data[0].id);
					$.each(data, function (index, value) {
						// var IdPenilaan = value['kategori'] + '_' + value['nama_penilaian'];
						var IdPenilaan = makeid();
						var row_count = $('#tb_list_Penilaian tr.tb-detail').length;
						var content_data = '<tr class="tb-detail" id="row' + IdPenilaan + '">';
						content_data += "<td>" + (row_count + 1) + "</td>";
						content_data += "<td class='hidden'>" + IdPenilaan + "</td>";
						content_data += "<td>" + value['kategori'] + "</td>";
						content_data += "<td>" + value['nama_penilaian'] + "</td>";
						content_data += "<td>" + value['nilai'] + "</td>";
						content_data += '<td><button type="button" class="btn btn-danger btn-xs" ';
						content_data += ' onclick="hapusItemPenilaian(\'' + IdPenilaan + '\')"><i class="fa fa-fw fa-trash"></i></button></td>';
						content_data += "</tr>";
						
						if (row_count < 1) {
							
							$('#tb_list_Penilaian tbody').html(content_data);
						}
						else {
							
							$('#tb_list_Penilaian tbody').append(content_data);
						}
						
						$("#hid_jumlah_item_Penilaian").val(row_count + 1);
						urutkanNomorPenilaian();
					});
					
				}
				else{
					var status_btn = 'SAVE';
					
				}
				$('#save_button').text(status_btn);
				// $('#Modal_add_nilai_santri').modal('show');

			}
		});

	}
//#endregion Modal ListNilai
//#region Modal AddNilai
	var validate_add_penilaian = function () {

		var form = $('#add_Penilaian');
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

	function clearvalidate_add_penilaian() {

		$("#add_Penilaian div").removeClass('has-error');
		$("#add_Penilaian i").removeClass('fa-warning');
		$("#add_Penilaian div").removeClass('has-success');
		$("#add_Penilaian i").removeClass('fa-check');

		document.getElementById("add_Penilaian").reset();
	}

	function addPenilaian(no_registrasi) {
		clearvalidate_add_penilaian();
		$('#Modal_add_Penilaian').modal('show');

	}

	function TambahPenilaian() {
		if ($("#add_Penilaian").valid() == true) {
			var kategori = $('#kategori').val()
			var nama_penilaian = $('#nama_penilaian').val()
			var nilai = $('#nilai').val()
			var hid_jumlah_item = $('hid_jumlah_item_Penilaian').val()
			// var IdPenilaan = kategori + '_' + nama_penilaian;
			var IdPEN = kategori + '_' + nama_penilaian;
			var IdPenilaan = makeid();

			if (cekItemPenilaian(IdPEN) == true) {

				var row_count = $('#tb_list_Penilaian tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + IdPenilaan + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td class='hidden'>" + IdPenilaan + "</td>";
				content_data += "<td>" + kategori + "</td>";
				content_data += "<td>" + nama_penilaian + "</td>";
				content_data += "<td>" + nilai + "</td>";
				content_data += '<td><button type="button" class="btn btn-danger btn-xs" ';
				content_data += ' onclick="hapusItemPenilaian(\'' + IdPenilaan + '\')"><i class="fa fa-fw fa-trash"></i></button></td>';
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_Penilaian tbody').html(content_data);
				}
				else {

					$('#tb_list_Penilaian tbody').append(content_data);
				}

				$("#hid_jumlah_item_Penilaian").val(row_count + 1);
				urutkanNomorPenilaian();

				$('#Modal_add_Penilaian').modal('hide');
				
			}
			else {

				bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;Sudah Ada");
			}
		}
	}

	function urutkanNomorPenilaian() {

		var oTable = document.getElementById('tb_list_Penilaian');

		//hitung table row
		var rowLength = oTable.rows.length;
		rowLength = rowLength - 1;

		//urutkan nomor per row
		for (i = 1; i <= rowLength; i++) {

			oTable.rows.item(i).cells[0].innerHTML = i;
		}
	}

	function cekItemPenilaian(i_IdPEN) {
		var oTable = document.getElementById('tb_list_Penilaian');
		var rowLength = oTable.rows.length;
		var itemcount = $("#hid_jumlah_item_Penilaian").val();
		rowLength = rowLength - 1;

		if (itemcount == "0") { //jika item kosong

			return true;
		}
		else {

			for (i = 1; i <= rowLength; i++) {
				var KAT = oTable.rows.item(i).cells[2].innerHTML;
				var NP = oTable.rows.item(i).cells[3].innerHTML;
				var Penilaian = KAT + '_' + NP;
				// print(kode_kategori);
				if (Penilaian == i_IdPEN) {

					return false;
				}
			}
			return true;
		}
	}

	function hapusItemPenilaian(Penilaian) {

		bootbox.confirm("Anda yakin akan menghapus item ini ?",
			function (result) {
				if (result == true) {

					$('#row' + Penilaian).remove();
					urutkanNomorPenilaian();

					var row_count = $('#tb_list_Penilaian tr.tb-detail').length;

					$("#hid_jumlah_item_Penilaian").val(row_count); //simpan jumlah item


					if (row_count < 1) {

						var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
						$('#tb_list_Penilaian tbody').append(content_data);
					}
				}
			}
		);
	}

	function svnilai() {
		$status = $('#save_button').text();
		var item_data_tb_list_Penilaian = "";
		var oTable = document.getElementById('tb_list_Penilaian');
		var rowLength = oTable.rows.length;
		var isitablePenilaian = $('#hid_jumlah_item_Penilaian').val();
		if (isitablePenilaian == 0) {
				rowLength = rowLength - 2;
			} else {
				rowLength = rowLength - 1;
			}

		if (rowLength != 0) {	

			for (i = 1; i <= rowLength; i++) {

				var irow = oTable.rows.item(i);

				item_data_tb_list_Penilaian += irow.cells[2].innerHTML + "#"; //Penilaian
				item_data_tb_list_Penilaian += irow.cells[3].innerHTML + "#"; //Penilaian
				item_data_tb_list_Penilaian += irow.cells[4].innerHTML + "#"; //Penilaian


				item_data_tb_list_Penilaian += ';';

			}

			$('#hid_table_item_Penilaian').val(item_data_tb_list_Penilaian);
			var iform = $('#add_nilai_santri')[0];
			var data = new FormData(iform);
			if ($status == 'UPDATE') {
				msg = "Update Data Berhasil"
			}
			else {
				msg = "Simpan Data Berhasil"
			}
			$.ajax({

				type: "POST",
				url: base_url + "nilai/simpan_nilai/" + $status,
				enctype: 'multipart/form-data',
				contentType: false,
				processData: false,
				data: data,
				success: function (data) {

					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;" + msg + "!!",
						size: 'small',
						callback: function () {

							// window.location = base_url + 'nilai';
							$('#Modal_add_nilai_santri').modal('hide');
						}
					});
				}
			});
		}
		else{
			bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;Data nilai tidak boleh kosong");
		}
	}
//#endregion Add Nilai
//#region modal cari
function Modalcari() {
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction() {
	var kode_kelas = $('#s_kode_kelas').val();
	var param = { 'kode_kelas': kode_kelas };
	param = JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload(null, false);
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function clearformcari(){
	$('#s_kode_kelas').val('');
}

//#endregion modal cari



