// //load
$(document).ready(function()
{

    $(".select2").select2({
        dropdownParent: $('#form_lap')
        // dropdownParent: parentElement
	});



	clearvalidate_form_lap();
	validate_form_lap();
	popgetguru();

});


function popgetguru(){

$.ajax({
	        type: "POST",
	        url: base_url+'lap_jadwal/get_list_guru',
	        dataType: 'json',
	        success: function(json) {
	        	
	            var $el 		= $("#opt_guru");

	            $el.empty(); // remove old options

	            $el.append($("<option></option>")
	                    .attr("value", '').text('- Semua Data Guru -'));


	            $.each(json, function(index, value) {

	                $el.append($("<option></option>")
	                        .attr("value", value['id_guru']).text(value['nama_lengkap']));
	            });
	            
	        }
	    });
}


function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

var validate_form_lap = function () {

	var form = $('#form_lap');
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

function clearvalidate_form_lap() {

	$("#form_lap div").removeClass('has-error');
	$("#form_lap i").removeClass('fa-warning');
	$("#form_lap div").removeClass('has-success');
	$("#form_lap i").removeClass('fa-check');

	document.getElementById("form_rapor").reset();
}

function getguru(){
		$('#id_kelas').attr('disabled', true);
		// $('#id_kelas').attr('selected', true);
		$("#select_kelas").attr('selected', true)

}

function print_lap_jad() {

	var id_thn_ajar 		= $('#id_thn_ajar').val();
	var semester 			= $('#semester').val();
	var id_guru 			= $('#opt_guru').val();
	
	window.open(base_url + "lap_jadwal/excel_jadwal/" + id_thn_ajar + "/" + semester + "/" + id_guru, '_blank');
}



//#endregion data akademik


