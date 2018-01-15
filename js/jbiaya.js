// //load
$(document).ready(function()
{
	setTable();
	
	$('#BPEdit').show();
	$('#BPCancel').hide();
	$('#BPSave').hide();
	$('#potongan').attr('readonly', true);
	$('input[id^="b_nominal_"]').maskMoney({ precision: 0 });
	$('input[id^="s_nominal_"]').maskMoney({ precision: 0 });


});

//#region ms_biaya
	function setTable() {
		$('#tb_list').DataTable({
			"processing": true,
			"serverSide": true,
			"bFilter": false,
			"bSort": false,
			"paging": false,
			"info": false,
			ajax: {
				'url': base_url + "biaya/load_grid",
				'type': 'GET',
				'data': function (d) {
					d.param = $('#hid_param').val();
				}
			},
			columnDefs: [
				{ width: 10, targets: 0 },
				{ width: 30, targets: 1 },
				{
					targets: [2],         //action
					orderable: false,
					width: 10
				}
			],
		});
	}

	function clearvalidate_add_biaya() {

		$("#add_biaya div").removeClass('has-error');
		$("#add_biaya i").removeClass('fa-warning');
		$("#add_biaya div").removeClass('has-success');
		$("#add_biaya i").removeClass('fa-check');

		document.getElementById("add_biaya").reset();
	}

	function edit(tipe) {
		clearvalidate_add_biaya();
		if (tipe == 'B') {
			$('#save_button').text('UPDATE_BULANAN');

			$("#nav_tab_semester").removeClass("active");
			$("#nav_tab_bulanan").addClass("active");

			$("#nav_tab_semester").addClass("hidden");
			$("#nav_tab_bulanan").removeClass("hidden");

			$("#tab_semester").removeClass("active");
			$("#tab_bulanan").addClass("active");
		}
		else {
			$('#save_button').text('UPDATE_SEMESTER');

			$("#nav_tab_bulanan").removeClass("active");
			$("#nav_tab_semester").addClass("active");

			$("#nav_tab_semester").removeClass("hidden");
			$("#nav_tab_bulanan").addClass("hidden");

			$("#tab_bulanan").removeClass("active");
			$("#tab_semester").addClass("active");
		}
		$('#Modal_add_biaya').modal('show');

	}

	function SaveData() {
		$status = $('#save_button').text();
		var iform = $('#add_biaya')[0];
		var data = new FormData(iform);
		if ($status == 'UPDATE_BULANAN') {
			msg = "Update Data Biaya Bulanan Berhasil"
		}
		else {
			msg = "Update Data Biaya Semester Berhasil"
		}
		$.ajax({

			type: "POST",
			url: base_url + "biaya/simpan_biaya/" + $status,
			enctype: 'multipart/form-data',
			contentType: false,
			processData: false,
			data: data,
			success: function (data) {

				bootbox.alert({
					message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;" + msg + "!!",
					size: 'small',
					callback: function () {

						window.location = base_url + 'biaya';
					}
				});
			}
		});
	}	
//#endregion ms_biaya

//#region potongan
function EditDataPotongan() {
	$('#BPEdit').hide();
	$('#BPCancel').show();
	$('#BPSave').show();
	$('#potongan').attr('readonly',false);

}

function CanceleDataPotongan(potongan) {
	$potongan_awal	= $('#potongan').val();
	$('#BPEdit').show();
	$('#BPCancel').hide();
	$('#BPSave').hide();

	if (potongan != ''){
		$('#potongan').val(potongan);
	}
	else{
		$('#potongan').val('0');
	}
	$('#potongan').attr('readonly',true);

}

function SaveDataPotongan(potongan) {
	var iform = $('#add_potongan')[0];
	var data = new FormData(iform);
	$.ajax({

		type: "POST",
		url: base_url + "biaya/simpan_potongan/",
		enctype: 'multipart/form-data',
		contentType: false,
		processData: false,
		data: data,
		success: function (data) {

			bootbox.alert({
				message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp UPDATE POTONGAN BERHASIL!!",
				size: 'small',
				callback: function () {

					window.location = base_url + 'biaya';
				}
			});
		}
	});
	$('#BPEdit').show();
	$('#BPCancel').hide();
	$('#BPSave').hide();
	$('#potongan').attr('readonly',true);

}
//#endregion potongan
