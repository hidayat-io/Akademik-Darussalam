// //load
$(document).ready(function()
{

    $(".select2").select2({
        dropdownParent: $('#form_rapor')
        // dropdownParent: parentElement
	});
	clearvalidate_form_rapor();
	validate_form_rapor();

});

function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

var validate_form_rapor = function () {

	var form = $('#form_rapor');
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

function clearvalidate_form_rapor() {

	$("#form_rapor div").removeClass('has-error');
	$("#form_rapor i").removeClass('fa-warning');
	$("#form_rapor div").removeClass('has-success');
	$("#form_rapor i").removeClass('fa-check');

	document.getElementById("form_rapor").reset();
}

function add_tohide(){
	$id_thn_ajar = $('#id_thn_ajar').val();
	$('#hide_Kurikulum').val($id_thn_ajar);
}
function rbtn_rapor_action(){
	if (document.getElementById('r_perkelas').checked) {
		$('#id_kelas').attr('disabled', false);
		$('#no_registrasi').attr('disabled', true);
		$('#no_registrasi').val('');
	} else if (document.getElementById('r_pernoregister').checked){
		$('#no_registrasi').attr('disabled', false);
		$('#id_kelas').attr('disabled', true);
		// $('#id_kelas').attr('selected', true);
		$("#select_kelas").attr('selected', true)

	}
}

function print_rapor() {
	var id_thn_ajar 		= $('#hide_Kurikulum').val();
	var semester 			= $('#semester').val();
	var id_kelas 			= $('#id_kelas').val();
	var no_registrasi 		= $('#no_registrasi').val();

	if (document.getElementById('r_perkelas').checked) {
		var action = 'perkelas';
	} else if (document.getElementById('r_pernoregister').checked) {
		var action = 'pernoregister';

	}
	
	if ($("#form_rapor").valid() == true) {
		$('#id_kelas').attr('disabled', false);
		$('#no_registrasi').attr('disabled', false);
		window.open(base_url + "rapor/print_rapor/" + action + "/" + id_thn_ajar + "/" + semester + "/" + id_kelas + "/" + no_registrasi, '_blank');
	}

	rbtn_rapor_action();
	// clearvalidate_form_rapor();
}



//#endregion data akademik


