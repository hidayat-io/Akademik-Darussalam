// //load
$(document).ready(function()
{

    $(".select2").select2({
        dropdownParent: $('#form_lformuliryatim')
        // dropdownParent: parentElement
	});
	clearvalidate_form_lformuliryatim();
	validate_form_lformuliryatim();

});

function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

var validate_form_lformuliryatim = function () {

    var form = $('#form_lformuliryatim');
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

function clearvalidate_form_lformuliryatim() {

    $("#form_lformuliryatim div").removeClass('has-error');
	$("#form_lformuliryatim i").removeClass('fa-warning');
	$("#form_lformuliryatim div").removeClass('has-success');
	$("#form_lformuliryatim i").removeClass('fa-check');

	document.getElementById("form_lformuliryatim").reset();
}

function print_formyatim() {
    var no_registrasi = $('#no_registrasi').val();
	
    if ($("#form_lformuliryatim").valid() == true) {
		window.open(base_url + "lformuliryatim/print_formyatim/" + no_registrasi, '_blank');
	}

}



//#endregion data akademik


