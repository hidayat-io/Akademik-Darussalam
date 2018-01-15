// //load
$(document).ready(function()
{
	// addSantri("TMI");
    setTable();
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

	validate_add_datasoalujian ();

});

//#region loadform
function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"datasoalujian/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		 },
		 columnDefs: [
			 { width: 50, targets: 0 },
			 { width: 10, targets: 1 },
			 { width: 5, targets: 2 },
			 { width: 10, targets: 3 },
			 { width: 5, targets: 4 },
			 { width: 10, targets: 5 },
			 {
				 targets: [6],         //action
				 orderable: false,
				 width: 10
			 }
		 ],
		 dom: "<'row'<'col-sm-12'tr>>" +
			 "<'row'<'col-sm-5'l><'col-sm-7'pi>>"
	 });
}

function hapus(kode_datasoalujian){
	var str_url  	= encodeURI(base_url+"datasoalujian/Deldatasoalujian/"+kode_datasoalujian);
	bootbox.confirm("Anda yakin akan menghapus ini ?",
		function(result){
			if(result==true){
				
			$.ajax({
			type:"POST",
			url:str_url,
			dataType:"html",
			success:function(data){
					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil Berhasil",
						size: 'small',
						callback: function () {

							window.location = base_url+'datasoalujian';
						}
					});
				}
			});
			}
		}
	);
	
}

function PrintSoal(id) {
	window.open(base_url + "datasoalujian/PrintSoal/" + id, '_blank');
}

var validate_add_datasoalujian = function () {

	var form = $('#add_datasoalujian');
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

function clearvalidate_add_datasoalujian() {

	$("#add_datasoalujian div").removeClass('has-error');
	$("#add_datasoalujian i").removeClass('fa-warning');
	$("#add_datasoalujian div").removeClass('has-success');
	$("#add_datasoalujian i").removeClass('fa-check');

	document.getElementById("add_datasoalujian").reset();
}

function OtomatisKapital(a){
	setTimeout(function(){
		a.value = a.value.toUpperCase();
	}, 1);
}

function adddatasoalujian(){
	$('#save_button').text('SAVE');
	clearvalidate_add_datasoalujian();
	$('#Modal_add_datasoalujian').modal('show');
}

function Modalcari(){
	clearformcari();
	$('#Modal_cari').modal('show');
}
//#endregion load form

//#region modal search
function SearchAction(){
	var id_matpal 		= $('#s_idmatpal').val();
	var param 			= {'id_matpal':id_matpal};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function clearformcari(){
	$('#s_kodedatasoalujian').val('');
}
//#endregion modal search

//#region modal bank soal
function queryParamBankSoal() {

	// var sidthnajar = $('#id_thn_ajar').val();
	// var ssemester = $('#semester').val();
	var sid_matpal = $('#id_matpal').val();
	var stingkat = $('#tingkat').val();

	return {
		// sidthnajar: sidthnajar,
		// ssemester: ssemester,
		sid_matpal: sid_matpal,
		stingkat: stingkat
	}
}

function SearchBankSoal() {
	$('#tb_datasoal').bootstrapTable('refresh');
}

function svdatasoalujian() {
	if ($("#add_datasoalujian").valid() == true) {
		var DataUjiandiPilih = $('#tb_datasoal').bootstrapTable('getSelections');
		if (DataUjiandiPilih.length < 1) {

			var str_message = "Belum ada data soal yang dipilih.";
			var title = "<span class='fa fa-exclamation-triangle text-danger'></span>&nbsp;Invalid Data";

			showMessage(title, str_message);
		}
		else {
			$status = $('#save_button').text();
			if ($status == 'UPDATE') {
				msg = "Update Data Berhasil"
			}
			else {
				msg = "Simpan Data Berhasil"
			}
			var str_list_soal_ujian = JSON.stringify(DataUjiandiPilih);

			$('#hid_data_soal_ujian').val(str_list_soal_ujian);

			$("#add_datasoalujian").ajaxSubmit({
				url: base_url + "datasoalujian/save_data",
				type: 'post',
				success: function () {

					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;" + msg + "!!",
						size: 'small',
						callback: function () {

							window.location = base_url + 'datasoalujian';
						}
					});
				}
			});
		}

	}
}


//#endregion bank soal

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function showMessage(title, str_message) {

	bootbox.alert({
		size: 'small',
		title: title,
		message: str_message,
		buttons: {
			ok: {
				label: 'OK',
				className: 'btn-danger'
			}
		}
	});
}