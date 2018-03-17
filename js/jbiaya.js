// //load
$(document).ready(function()
{
	setTable();
	setTablePotongan();
	
	$('.numbers-only').keypress(function (event) {
		var charCode = (event.which) ? event.which : event.keyCode;
		if ((charCode >= 48 && charCode <= 57)
			|| charCode == 46
			|| charCode == 44
			|| charCode == 8)
			return true;
		return false;
	});
	$('input[id^="b_nominal_"]').maskMoney({ precision: 0 });
	$('input[id^="s_nominal_"]').maskMoney({ precision: 0 });
	$('#nominal_potongan').maskMoney({ precision: 0 });

	validate_add_potongan();
	validate_add_biaya();

	$("#save_button_komponen").click(function () {
		// getValueUsingClass();
		Tambahkomponen();
	});


});

function upperCaseF(a) {
	setTimeout(function () {
		a.value = a.value.toUpperCase();
	}, 1);
}
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

	function add_biaya(tipe) {
		clearvalidate_add_biaya();
		if (tipe == 'B') {
			$('#save_button').text('SIMPAN_BULANAN');
			$('#hid_tipekomponen').val('B');
			$("#nav_tab_semester").removeClass("active");
			$("#nav_tab_bulanan").addClass("active");

			$("#nav_tab_semester").addClass("hidden");
			$("#nav_tab_bulanan").removeClass("hidden");

			$("#tab_semester").removeClass("active");
			$("#tab_bulanan").addClass("active");
		}
		else {
			$('#save_button').text('SIMPAN_SEMESTER');
			$('#hid_tipekomponen').val('S');
			$("#nav_tab_bulanan").removeClass("active");
			$("#nav_tab_semester").addClass("active");

			$("#nav_tab_semester").removeClass("hidden");
			$("#nav_tab_bulanan").addClass("hidden");

			$("#tab_bulanan").removeClass("active");
			$("#tab_semester").addClass("active");
		}
		$('#Modal_add_biaya').modal('show');

	}

	function addKomponen_modal(tipe) {
		// clearvalidate_add_komponen();
		$('input:checkbox').removeAttr('checked');
		if (tipe == 'B') {
			$('#save_button_komponen').text('Tambah Komponen Bulanan');
			

			$("#nav_tab_semester_komponen").removeClass("active");
			$("#nav_tab_bulanan_komponen").addClass("active");

			$("#nav_tab_semester_komponen").addClass("hidden");
			$("#nav_tab_bulanan_komponen").removeClass("hidden");

			$("#tab_semester_komponen").removeClass("active");
			$("#tab_bulanan_komponen").addClass("active");
		}
		else {
			$('#save_button_komponen').text('Tambah Komponen Semester');
			

			$("#nav_tab_bulanan_komponen").removeClass("active");
			$("#nav_tab_semester_komponen").addClass("active");

			$("#nav_tab_semester_komponen").removeClass("hidden");
			$("#nav_tab_bulanan_komponen").addClass("hidden");

			$("#tab_bulanan_komponen").removeClass("active");
			$("#tab_semester_komponen").addClass("active");
		}
		$('#Modal_add_komponen').modal('show');

	}

	var validate_add_biaya = function () {

		var form = $('#add_biaya');
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

	function clearvalidate_add_biaya() {

		$("#add_biaya div").removeClass('has-error');
		$("#add_biaya i").removeClass('fa-warning');
		$("#add_biaya div").removeClass('has-success');
		$("#add_biaya i").removeClass('fa-check');

		document.getElementById("add_biaya").reset();
	}

	function SaveData() {
		if ($("#add_biaya").valid() == true) {
		
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
	}	

	//#region modal komponen
		function getValueUsingClass() {
			/* declare an checkbox array */
			var chkArray = [];

			/* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
			$(".chk:checked").each(function () {
				chkArray.push($(this).val());
			});

			/* we join the array separated by the comma */
			var selected;
			selected = chkArray.join(',');

			/* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
			if (selected.length > 0) {
				alert("You have selected " + selected);
			} else {
				alert("Please at least check one of the checkbox");
			}
		}

		function Tambahkomponen() {
			if ($("#add_komponen").valid() == true) {
				var semester = $('#txt_semester').val()
				var tipe = $('#hid_tipekomponen').val()
				if(tipe == 'B'){
					var hid_jumlah_item = $('hid_jumlah_item_bulanan').val()
				}
				else
				{
					var hid_jumlah_item = $('hid_jumlah_item_semester').val()
				}
				
				if (cekItemkomponen() == true) {

													var bln = { '1': 'Januari', '2': 'Februari', '3': 'Maret', '4': 'April', '5': 'Mei', '6': 'Juni', '7': 'Juli', '8': 'Agustus', '9': 'September', '10': 'Oktober', '11': 'November', '12': 'Desember' };
								var komponenH = bln[komponen];
								var row_count = $('#tb_list_komponen tr.tb-detail').length;
								var content_data = '<tr class="tb-detail" id="row' + komponen + '">';
								content_data += "<td>" + (row_count + 1) + "</td>";
								content_data += "<td class='hidden'>" + komponen + "</td>";
								content_data += "<td>" + komponenH + "</td>";
								content_data += '<td><button type="button" class="btn btn-danger btn-xs" ';
								content_data += ' onclick="hapusItemkomponen(\'' + komponen + '\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
								content_data += "</tr>";

								if (row_count < 1) {

									$('#tb_list_komponen tbody').html(content_data);
								}
								else {

									$('#tb_list_komponen tbody').append(content_data);
								}

								$("#hid_jumlah_item_komponen").val(row_count + 1);
								urutkanNomorkomponen();

								$('#Modal_add_komponen').modal('hide');
				}
				else {

					bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;komponen di semester " + semester + " sudah ada atau komponen tidak urut");
				}
			}
		}

		function urutkanNomorkomponen() {
			var tipe = $('#hid_tipekomponen').val()
			if (tipe == 'B') {
				var oTable = document.getElementById('tb_list_bulanan');
			}
			else {
				var oTable = document.getElementById('tb_list_semester');
			}			

			//hitung table row
			var rowLength = oTable.rows.length;
			rowLength = rowLength - 1;

			//urutkan nomor per row
			for (i = 1; i <= rowLength; i++) {

				oTable.rows.item(i).cells[0].innerHTML = i;
			}
		}

		function cekItemkomponen() {
			var tipe = $('#hid_tipekomponen').val()
			if (tipe == 'B') {
				var oTable = document.getElementById('tb_list_bulanan');
				var itemcount = $("#hid_jumlah_item_bulanan").val();
			}
			else {
				var oTable = document.getElementById('tb_list_semester');
				var itemcount = $("#hid_jumlah_item_semester").val();
			}
			
			var rowLength = oTable.rows.length;
			
			rowLength = rowLength - 1;
			var nextkomponen = parseInt(oTable.rows.item(itemcount).cells[1].innerHTML) + 1;

			if (itemcount == "0") { //jika item kosong

				return true;
			}
			else {

				for (i = 1; i <= rowLength; i++) {
					var komponen = oTable.rows.item(i).cells[1].innerHTML;
					// print(kode_kategori);
					if (komponen == i_komponen) {

						return false;
					}
				}
				if (nextkomponen != i_komponen) {
					return false;
				}
				return true;
			}
		}

		function hapusItemkomponen(komponen) {

			bootbox.confirm("Anda yakin akan menghapus item ini ?",
				function (result) {
					if (result == true) {

						$('#row' + komponen).remove();
						urutkanNomorkomponen();

						var row_count = $('#tb_list_komponen tr.tb-detail').length;

						$("#hid_jumlah_item_komponen").val(row_count); //simpan jumlah item


						if (row_count < 1) {

							var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
							$('#tb_list_komponen tbody').append(content_data);
						}
					}
				}
			);
		}	
	//#endregion modal komponen
//#endregion ms_biaya

//#region potongan
	function setTablePotongan() {
		$('#tb_potongan').DataTable({
			"processing": true,
			"serverSide": true,
			"bFilter": false,
			"bSort": false,
			"paging": false,
			"info": false,
			ajax: {
				'url': base_url + "biaya/load_grid_potongan",
				'type': 'GET',
				'data': function (d) {
					d.param = $('#hid_param_potongan').val();
				}
			},
			// columnDefs: [
			// 	{ width: 10, targets: 0 },
			// 	{ width: 30, targets: 1 },
			// 	{
			// 		targets: [2],         //action
			// 		orderable: false,
			// 		width: 10
			// 	}
			// ],
		});
	}

	var validate_add_potongan = function () {

		var form = $('#add_potongan');
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

	function clearvalidate_add_potongan() {

		$("#add_potongan div").removeClass('has-error');
		$("#add_potongan i").removeClass('fa-warning');
		$("#add_potongan div").removeClass('has-success');
		$("#add_potongan i").removeClass('fa-check');

		document.getElementById("add_potongan").reset();
	}

	function addpotongan() {
		clearvalidate_add_potongan();
		$('#Modal_add_potongan').modal('show');
		$('#save_button_potongan').show();
		$('#load_save').hide();

	}

	function edit_potongan(id_potongan) {
		var str_url = encodeURI(base_url + "biaya/get_data_potongan/" + id_potongan);
			$('#save_button_potongan').text('UPDATE');
			$.ajax({

				type: "POST",
				url: str_url,
				dataType: "html",
				success: function (data) {

					var data = $.parseJSON(data);
					$('#id_potongan').val(data['id_potongan']);
					$('#nama_potongan').val(data['nama_potongan']);
					$('#persen').val(data['persen']);
					$('#nominal_potongan').val(data['nominal']);

					$('#Modal_add_potongan').modal('show');


				}
			});
	}
	
	function SaveDataPotongan() {
		if ($("#add_potongan").valid() == true) {
			$status = $('#save_button_potongan').text();
			$('#save_button_potongan').hide();
			$('#load_save').show();
			var iform = $('#add_potongan')[0];
			var data = new FormData(iform);
			if ($status == 'UPDATE') {
				msg = "Update Data Berhasil"
			}
			else {
				msg = "Simpan Data Berhasil"
			}
				$.ajax({

					type: "POST",
					url: base_url + "biaya/simpan_potongan/" + $status,
					enctype: 'multipart/form-data',
					contentType: false,
					processData: false,
					data: data,
					success: function (data) {

						bootbox.alert({
							message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp."+msg+" !!",
							size: 'small',
							callback: function () {

								window.location = base_url + 'biaya';
							}
						});
					},
					error: function () {

						$('#save_button_potongan').show();
						$('#load_save').hide();
					}
					
				});
		}

	}

	function hapus_potongan (id_potongan) {
		var str_url = encodeURI(base_url + "biaya/hapus_potongan/" + id_potongan);
		bootbox.confirm("Anda yakin akan menghapus ini ?",
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

									window.location = base_url + 'biaya';
								}
							});
						}
					});
				}
			}
		);
	}
//#endregion potongan
