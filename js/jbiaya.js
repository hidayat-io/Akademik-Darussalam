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
	
	$('#nominal_potongan').maskMoney({ precision: 0 });

	validate_add_potongan();
	validate_add_biaya();

	$("#save_button_komponen").click(function () {
		// getValueUsingClass();
		Tambahkomponen();
	});


});

function initMaskMoney() {
	$('input[id^="nominalkomponen"]').maskMoney({ precision: 0 });
}

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

	function add_biaya(tipe) {
		clearvalidate_add_biaya();
		$('#save_button').text('SIMPAN');
		if (tipe == 'B') {
			
			$('#hid_tipekomponen').val('B');
			$("#nav_tab_semester").removeClass("active");
			$("#nav_tab_bulanan").addClass("active");

			$("#nav_tab_semester").addClass("hidden");
			$("#nav_tab_bulanan").removeClass("hidden");

			$("#tab_semester").removeClass("active");
			$("#tab_bulanan").addClass("active");
		}
		else {
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
		if ($("#add_biaya").valid() == true) { //cek validasi data yg kosong
				
			$status = $('#save_button').text();
			$('#id_thn_ajar').attr('disabled', false);
			var tipe = $('#hid_tipekomponen').val()
			var id_thn_ajar = $('#id_thn_ajar').val()
			if (tipe == 'B') {
				var item_data_tb_list_komponen = "";
				var oTable = document.getElementById('tb_list_bulanan');
				var rowLength = oTable.rows.length;
				var data_komponenONtable = $('#hid_jumlah_item_bulanan').val();
				var hid_table_item_komponen= '#hid_table_item_bulanan';
			}
			else {
				var item_data_tb_list_komponen = "";
				var oTable = document.getElementById('tb_list_semester');
				var rowLength = oTable.rows.length;
				var data_komponenONtable = $('#hid_jumlah_item_semester').val();
				var hid_table_item_komponen = '#hid_table_item_semester';
			}
			var str_url = encodeURI(base_url + "biaya/get_data_biaya/" + id_thn_ajar + "/" +tipe);
			$.ajax({
				type: "POST",
				url: str_url,
				dataType: "html",
				success: function (data) {
					$data = $.parseJSON(data);
					if ($data != null & $status == 'SIMPAN') {
						bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Data sudah ada!, Silahkan Edit data </div>",
							function (result) {
								if (result == true) {
								}
							}
						);

					}
					else {//OK tidak ada data sebelumnya
						if (data_komponenONtable == '0') {
							bootbox.alert("input komponen dulu!!");

						}
						else {
							if (data_komponenONtable == 0) {
								rowLength = rowLength - 2;
							} else {
								rowLength = rowLength - 1;
							}


							for (i = 1; i <= rowLength; i++) {

								var irow = oTable.rows.item(i);
								// var rowIDkomponen = irow.cells[1].innerHTML;
								// var rowID = 'nominalkomponen' + rowIDkomponen;
								var nominal = document.getElementById('nominalkomponen' + irow.cells[1].innerHTML).value;
								item_data_tb_list_komponen += irow.cells[1].innerHTML + "#"; //IDKomponen
								item_data_tb_list_komponen += nominal + "#"; //nominal
								item_data_tb_list_komponen += ';';

							}

							$(hid_table_item_komponen).val(item_data_tb_list_komponen);
							var iform = $('#add_biaya')[0];
							var data = new FormData(iform);
							if ($status == 'SIMPAN') {
								msg = "Simpan Berhasil"
							}
							else {
								msg = "Update Berhasil"
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
				}
			});
			

			
		}
	}

	function edit(id, tipe) {
		var str_url = encodeURI(base_url + "biaya/kurikulum_aktif/");
		$.ajax({

			type: "POST",
			url: str_url,
			dataType: "html",
			success: function (data) {

				var data = $.parseJSON(data);
				var isys_param = data.split('#');
				var id_thn_ajar = isys_param[0];

				if (id_thn_ajar >= id) {
					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Tidak bisa edit ",
						size: 'small',
						callback: function () {

							// window.location = base_url + 'biaya';
						}
					});
				}
				else {
					clearvalidate_add_biaya();
					$('#save_button').text('UPDATE');
					$('#id_thn_ajar').attr('disabled', true);
					$('#id_thn_ajar').val(id);
					$('#hid_tipekomponen').val(tipe);
					if (tipe == 'B') {

						$("#nav_tab_semester").removeClass("active");
						$("#nav_tab_bulanan").addClass("active");

						$("#nav_tab_semester").addClass("hidden");
						$("#nav_tab_bulanan").removeClass("hidden");

						$("#tab_semester").removeClass("active");
						$("#tab_bulanan").addClass("active");
						var tb_list_data = '#tb_list_bulanan tbody';
						var hide_jml_item = '#hid_jumlah_item_bulanan';
						var tb_list_data_detail = '#tb_list_bulanan tr.tb-detail';
					}
					else {

						$("#nav_tab_bulanan").removeClass("active");
						$("#nav_tab_semester").addClass("active");

						$("#nav_tab_semester").removeClass("hidden");
						$("#nav_tab_bulanan").addClass("hidden");

						$("#tab_bulanan").removeClass("active");
						$("#tab_semester").addClass("active");
						var tb_list_data = '#tb_list_semester tbody';
						var hide_jml_item = '#hid_jumlah_item_semester';
						var tb_list_data_detail = '#tb_list_semester tr.tb-detail';
					}

					$(tb_list_data).html('');
					$.ajax({

						type: "POST",
						url: base_url + "biaya/get_data_biaya_edit/" + id + "/" + tipe,
						dataType: "html",
						success: function (data) {

							var data = $.parseJSON(data);

							$.each(data, function (index, value) {

								var row_count = $(tb_list_data_detail).length;
								var content_data = '<tr class="tb-detail" id="row' + value['nama_item'] + '">';
								content_data += "<td>" + (row_count + 1) + "</td>";
								content_data += "<td class='hidden'>" + value['nama_item'] + "</td>";
								content_data += "<td>" + value['nama_komponen'] + "</td>";
								content_data += '<td> <input type="text" id="nominalkomponen' + value['nama_item'] + '" name="nominalkomponen' + value['nama_item'] + '" value="' + value['nominal'] + '" /> </td>';
								content_data += '<td><button type="button" class="btn btn-danger btn-xs" ';
								content_data += ' onclick="hapusItemkomponen(\'' + value['nama_item'] + '\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
								content_data += "</tr>";

								if (row_count < 1) {

									$(tb_list_data).html(content_data);
								}
								else {

									$(tb_list_data).append(content_data);
								}

								$(hide_jml_item).val(row_count + 1);
								urutkanNomorkomponen();
								initMaskMoney();
							});
						}
					});

					$('#Modal_add_biaya').modal('show');
				}
			}
		});
	}

	function delete_biaya(id,tipe) {
		// var hasilcek	= cek_thn_smster_aktif(id);
		// if (hasilcek != 'valid') { //cek validasi data yg kosong
		var str_url = encodeURI(base_url + "biaya/kurikulum_aktif/");
		$.ajax({

			type: "POST",
			url: str_url,
			dataType: "html",
			success: function (data) {

				var data = $.parseJSON(data);
				var isys_param = data.split('#');
				var id_thn_ajar = isys_param[0];

				if (id_thn_ajar >= id) {
					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Tidak bisa dihapus ",
						size: 'small',
						callback: function () {

							// window.location = base_url + 'biaya';
						}
					});
				}
				else{
					var str_url = encodeURI(base_url + "biaya/delete_biaya/" + id + "/" + tipe);
					bootbox.confirm("Anda yakin akan menghapus ?",
						function (result) {
							if (result == true) {

								$.ajax({
									type: "POST",
									url: str_url,
									dataType: "html",
									success: function (data) {
										bootbox.alert({
											message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil ",
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
			}
		});
	}


	//#region modal komponen

		function Tambahkomponen() {
			if ($("#add_komponen").valid() == true) {
				
				var chkArray = [];

				$(".chk:checked").each(function () {
					chkArray.push($(this).val());
				});

				if (chkArray.length > 0) {

					for (ci = 0; ci < chkArray.length; ci++) {
						
						var tipe = $('#hid_tipekomponen').val()
						if (tipe == 'B') {
							var row_count = $('#tb_list_bulanan tr.tb-detail').length;
							var tb_list = 'bulanan';
							var hid_jumlah_item = '#hid_jumlah_item_bulanan';
						}
						else {
							var row_count = $('#tb_list_semester tr.tb-detail').length;
							var tb_list = 'semester';
							var hid_jumlah_item = '#hid_jumlah_item_semester';
						}	
						
						var data_checklist = chkArray[ci];
						var data_checklist = data_checklist.split('#');
						var id_komponen = data_checklist[0];
						var nama_komponen = data_checklist[1];

						//cek apakah kompnen sudah ada dilist master biaya
						if (cekItemkomponen(id_komponen) == true) {

							
							var content_data = '<tr class="tb-detail" id="row' + id_komponen + '">';
							content_data += "<td>" + (row_count + 1) + "</td>";
							content_data += "<td class='hidden'>" + id_komponen + "</td>";
							content_data += "<td>" + nama_komponen + "</td>";
							content_data += '<td> <input type="text" id="nominalkomponen' + id_komponen +'" name="nominalkomponen'+id_komponen+'" /> </td>';
							content_data += '<td><button type="button" class="btn btn-danger btn-xs" ';
							content_data += ' onclick="hapusItemkomponen(\'' + id_komponen + '\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
							content_data += "</tr>";

							if (row_count < 1) {

								$('#tb_list_' + tb_list + ' tbody').html(content_data);
							}
							else {

								$('#tb_list_' + tb_list + ' tbody').append(content_data);
							}

							$(hid_jumlah_item).val(row_count + 1);
							urutkanNomorkomponen();
							initMaskMoney();
						}

						

						
					}
					$('#Modal_add_komponen').modal('hide'); 
					

				} else {
					bootbox.alert("tidak ada data");
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

		function cekItemkomponen(i_id_komponen) {
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
			// var nextid_komponen = parseInt(oTable.rows.item(itemcount).cells[1].innerHTML) + 1;

			if (itemcount == "0") { //jika item kosong

				return true;
			}
			else {

				for (i = 1; i <= rowLength; i++) {
					var id_komponen = oTable.rows.item(i).cells[1].innerHTML;
					// print(kode_kategori);
					if (id_komponen == i_id_komponen) {

						return false;
					}
				}
				// if (nextid_komponen != i_id_komponen) {
				// 	return false;
				// }
				return true;
			}
		}

		function hapusItemkomponen(komponen) {

			bootbox.confirm("Anda yakin akan menghapus item ini ?",
				function (result) {
					if (result == true) {
						var tipe = $('#hid_tipekomponen').val()
						if (tipe == 'B') {
							var row_count = $('#tb_list_bulanan tr.tb-detail').length;
							var tb_list = 'bulanan';
							var hid_jumlah_item = '#hid_jumlah_item_bulanan';
						}
						else {
							var row_count = $('#tb_list_semester tr.tb-detail').length;
							var tb_list = 'semester';
							var hid_jumlah_item = '#hid_jumlah_item_semester';
						}	

						$('#row' + komponen).remove();
						urutkanNomorkomponen();

						// var row_count = $('#tb_list_komponen tr.tb-detail').length;

						$(hid_jumlah_item).val(row_count - 1); //simpan jumlah item


						if (row_count < 1) {

							var content_data = "<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>";
							$('#tb_list_' + tb_list + ' tbody').append(content_data);
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
		$('#save_button_potongan').text('SAVE');

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
