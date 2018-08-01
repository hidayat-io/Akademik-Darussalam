// //load
$(document).ready(function()
{

    $(".select2").select2({
        dropdownParent: $('#form_lsuratpermohonan')
        // dropdownParent: parentElement
	});
	clearvalidate_form_lsuratpermohonan();
	validate_form_lsuratpermohonan();

});

function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

var validate_form_lsuratpermohonan = function () {

    var form = $('#form_lsuratpermohonan');
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

function clearvalidate_form_lsuratpermohonan() {

    $("#form_lsuratpermohonan div").removeClass('has-error');
	$("#form_lsuratpermohonan i").removeClass('fa-warning');
	$("#form_lsuratpermohonan div").removeClass('has-success');
	$("#form_lsuratpermohonan i").removeClass('fa-check');

	document.getElementById("form_lsuratpermohonan").reset();
}

function print_SPKAFALAH() {
    var no_registrasi = $('#no_registrasi').val();
	
    if ($("#form_lsuratpermohonan").valid() == true) {
		window.open(base_url + "lsuratpermohonan/print_spkafalah/" + no_registrasi, '_blank');
	}

}



//#endregion data akademik


