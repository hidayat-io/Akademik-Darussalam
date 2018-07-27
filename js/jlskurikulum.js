// //load
$(document).ready(function()
{

    $(".select2").select2({
        dropdownParent: $('#form_lskurikulum')
        // dropdownParent: parentElement
	});
	clearvalidate_form_lskurikulum();
	validate_form_lskurikulum();
	$('#chk_bytingkat').prop('disabled', true);
	$('#id_kelas').attr("disabled", true);
	
	$('#chk_pertingkat').click(function () {
		if ($('#chk_pertingkat').prop("checked") == true) {

			$('#chk_bytingkat').prop('disabled', false);
		} else {
			$('#chk_bytingkat').prop("checked", false);
			$('#chk_bytingkat').prop('disabled', true);
			$('#id_kelas').attr("disabled", true);
		}
	});

	$('#chk_bytingkat').click(function () {
		if ($('#chk_bytingkat').prop("checked") == true) {

			$('#id_kelas').attr("disabled", false);
		} else {
			$('#id_kelas').attr("disabled", true);
		}
	});
});

function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

var validate_form_lskurikulum = function () {

	var form = $('#form_lskurikulum');
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

function clearvalidate_form_lskurikulum() {

    $("#form_lskurikulum div").removeClass('has-error');
	$("#form_lskurikulum i").removeClass('fa-warning');
	$("#form_lskurikulum div").removeClass('has-success');
	$("#form_lskurikulum i").removeClass('fa-check');

	document.getElementById("form_lskurikulum").reset();
}


function export_skurikulum() {

	if ($("#form_lskurikulum").valid() == true) {

		var id_thn_ajar = $('#id_thn_ajar').val();
		
		
		if ($('#r_utama').prop("checked") == true) {
			var kategori = "UTAMA";
		}else{
			var kategori = "SORE";
		}
	
		if ($('#chk_bytingkat').prop("checked") == true) {
			var tingkat = $('#id_kelas').val();
		}else{
			var tingkat = 0;
		}
	
		if ($('#chk_pertingkat').prop("checked") == false) {
			window.location = base_url + 'lskurikulum/cprint_skurikulum_nontingkat/' + id_thn_ajar +'/' +kategori+'/'+tingkat;

		}else{

			// window.location = base_url + 'lskurikulum/cprint_skurikulum_pertingkat/' + id_thn_ajar + '/' + kategori + '/' + tingkat;
			alert('ON PROSES !');
		}
	}
    

}


