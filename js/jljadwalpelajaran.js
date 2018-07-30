// //load
$(document).ready(function()
{

    $(".select2").select2({
        dropdownParent: $('#form_ljadwalpelajaran')
        // dropdownParent: parentElement
	});
	clearvalidate_form_ljadwalpelajaran();
	validate_form_ljadwalpelajaran();
});

function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

var validate_form_ljadwalpelajaran = function () {

	var form = $('#form_ljadwalpelajaran');
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

function clearvalidate_form_ljadwalpelajaran() {

    $("#form_ljadwalpelajaran div").removeClass('has-error');
	$("#form_ljadwalpelajaran i").removeClass('fa-warning');
	$("#form_ljadwalpelajaran div").removeClass('has-success');
	$("#form_ljadwalpelajaran i").removeClass('fa-check');

	document.getElementById("form_ljadwalpelajaran").reset();
}


function export_skurikulum() {
	var id_thn_ajar = $('#id_thn_ajar').val();
	var santri = $('#santri').val();
	var semester = $('#semester').val();

	if ($("#form_ljadwalpelajaran").valid() == true) {

		window.location = base_url + 'ljadwalpelajaran/export_jadwal_pelajaran/' + id_thn_ajar + '/' + santri + '/' + semester;

		
	}
    

}


