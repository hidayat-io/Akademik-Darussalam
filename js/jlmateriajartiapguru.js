// //load
$(document).ready(function()
{

    $(".select2").select2({
        dropdownParent: $('#form_lmateriajartiapguru')
        // dropdownParent: parentElement
	});
	// $('#id_guru').attr('disabled', true);
	clearvalidate_form_lmateriajartiapguru();
	validate_form_lmateriajartiapguru();

});

function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

var validate_form_lmateriajartiapguru = function () {

	var form = $('#form_lmateriajartiapguru');
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

function clearvalidate_form_lmateriajartiapguru() {

	$("#form_lmateriajartiapguru div").removeClass('has-error');
	$("#form_lmateriajartiapguru i").removeClass('fa-warning');
	$("#form_lmateriajartiapguru div").removeClass('has-success');
	$("#form_lmateriajartiapguru i").removeClass('fa-check');

	document.getElementById("form_lmateriajartiapguru").reset();
}

function add_tohide(){
	$id_thn_ajar = $('#id_thn_ajar').val();
	$('#hide_Kurikulum').val($id_thn_ajar);
}
function rbtn_lmateriajartiapguru_action(){
	if (document.getElementById('r_all').checked) {
		$('#id_guru').attr('disabled', true);
		$('#id_guru').val('');
	} else if (document.getElementById('r_idguru').checked){
		$('#id_guru').attr('disabled', false);
		$("#select_kelas").attr('selected', true)

	}
}

function print_lmateriajartiapguru() {
	var id_thn_ajar 		= $('#hide_Kurikulum').val();
	var semester 			= $('#semester').val();


	if (document.getElementById('r_all').checked) {
		var action = 'semua';
        var id_guru = '0';
        // bootbox.alert("ONPROSES");
        // return false;
	} else if (document.getElementById('r_idguru').checked) {
		var action = 'byidguru';
		var id_guru = $('#id_guru').val();

	}
	
	if ($("#form_lmateriajartiapguru").valid() == true) {
		$('#id_guru').attr('disabled', false);
		window.open(base_url + "lmateriajartiapguru/print_lmateriajartiapguru/" + action + "/" + id_thn_ajar + "/" + semester + "/" + id_guru, '_blank');
	}

	rbtn_lmateriajartiapguru_action();
	// clearvalidate_form_lmateriajartiapguru();
}



//#endregion data akademik


