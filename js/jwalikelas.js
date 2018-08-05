// //load
$(document).ready(function()
{
	// addSantri("TMI");
	setTable();
	pilihItemmsguru()
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

	validate_add_walikelas ();

});

function OtomatisKapital(a) {
	setTimeout(function () {
		a.value = a.value.toUpperCase();
	}, 1);
}

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 1, "ASC" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"walikelas/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		 },
		 columnDefs: [
			 { width: 10, targets: 0 },
			 { width: 30, targets: 1 },
			 { width: 30, targets: 2 },
			 { width: 10, targets: 3 },
			//  { width: 10, targets: 4 },
			 {
				 targets: [4],         //action
				 orderable: false,
				 width: 10
			 }
		 ],
	 });
}

var validate_add_walikelas = function () {

	var form = $('#add_walikelas');
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

function clearvalidate_add_walikelas() {

	$("#add_walikelas div").removeClass('has-error');
	$("#add_walikelas i").removeClass('fa-warning');
	$("#add_walikelas div").removeClass('has-success');
	$("#add_walikelas i").removeClass('fa-check');

	document.getElementById("add_walikelas").reset();
}

function addwalikelas(){
    $('#save_button').text('SAVE');
	kosong();
	clearvalidate_add_walikelas();
	$('#Modal_add_walikelas').modal('show');
}

function idmsgurushow() {
	$('#hiddenidmsguru').show();
	$('#spansearchmsguru').hide();
	$('#spansearchclosemsguru').show();
}

function idmsguruhide() {
	$('#hiddenidmsguru').hide();
	$('#spansearchmsguru').show();
	$('#spansearchclosemsguru').hide();
}

function pilihItemmsguru() {

	$item = $('#hide_id_msguru').val();
	$item = $item.split('#');

	$('#id_guru').val($item[0]);
	$('#no_reg').val($item[1]);
	$('#nama_lengkap').val($item[2]);
	$('#hiddenidmsguru').hide();
	$('#spansearchmsguru').show();
	$('#spansearchclosemsguru').hide();
}

function edit(id,kode_kelas){
	clearvalidate_add_walikelas();
	var str_url = encodeURI(base_url + "walikelas/get_data_walikelas_byID/" + kode_kelas);
	$.ajax({
		
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#id').val(data['id']);
			$('#kode_kelas').val(data['kode_kelas']);
			$('#id_guru').val(data['id_guru']);
			$('#no_reg').val(data['no_reg']);
			$('#nama_lengkap').val(data['nama_lengkap']);
			
			if (data['id'] == null)
			{
				$('#save_button').text('SAVE');
			}else{
				$('#save_button').text('UPDATE');			
			}
			$('#Modal_add_walikelas').modal('show');
			
			
		}
	});
	
}

function svwalikelas() {
	if ($("#add_walikelas").valid() == true) {
		$status = $('#save_button').text();
		var iform = $('#add_walikelas')[0];
		var data = new FormData(iform);
		if ($status == 'UPDATE') {
			msg = "Update Data Berhasil"
		}
		else {
			msg = "Simpan Data Berhasil"
		}
		$.ajax({

			type: "POST",
			url: base_url + "walikelas/simpan_walikelas/" + $status,
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

						window.location = base_url + 'walikelas';
					}
				});
			}
		});
	}
}

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

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'walikelas/exportexcel/'+param;
}

