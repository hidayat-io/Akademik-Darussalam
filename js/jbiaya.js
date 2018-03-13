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
