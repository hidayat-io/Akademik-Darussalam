// //load
$(document).ready(function()
{
	// addSantri("TMI");
	setTable();
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

	//validasi form modal add_kecakapan_khusus
	validate_add_pendidikan();
});


function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		ajax: {
			'url':base_url+"Pendidikan/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
    } );
}

function Modalcari(){
	clearformcari();
	$('#Modal_cari').modal('show');
}


function kosong(){
		$('#id_pendidikan').val('');
		$('#pendidikan').val('');
}

var validate_add_pendidikan = function () {

	var form = $('#add_pendidikan');
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

function clearvalidate_add_pendidikan() {

	$("#add_pendidikan div").removeClass('has-error');
	$("#add_pendidikan i").removeClass('fa-warning');
	$("#add_pendidikan div").removeClass('has-success');
	$("#add_pendidikan i").removeClass('fa-check');

	document.getElementById("add_pendidikan").reset();
}


function svpendidikan(){


	 $jj_pendidikan = $('#jj_pendidikan').val();

	 $("#add_pendidikan").ajaxSubmit({

	 	url:base_url+"pendidikan/save_data",
		type: 'post',
		success:function(data){
			var table = $('#tb-list').DataTable();
			table.ajax.reload( null, false );
			table.draw();
			
			clearvalidate_add_pendidikan();
			//$('#Modal_add_pendidikan').modal('toggle');

			bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Simpan/Update  Berhasil",
						size: 'small',
						callback: function () {

							window.location = base_url+'pendidikan';
						}
					});	
		}

			});

}

function OtomatisKapital(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

function addpendidikan(){
	clearvalidate_add_pendidikan();
    $('#save_button').text('SAVE');
	// kosong();
	$('#Modal_add_pendidikan').modal('show');
}

function edit(id_pendidikan){
	clearvalidate_add_pendidikan();
	var str_url  	= encodeURI(base_url+"pendidikan/get_edit_pendidikan/"+id_pendidikan);
    $('#save_button').text('UPDATE');
    $('#id_pendidikan').attr('readonly',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);

			$('#id_Pendidikan').val(data['id_pendidikan']);
			$('#jj_pendidikan').val(data['pendidikan']);
			
			$('#Modal_add_pendidikan').modal('show');
			
			
		}
	});
	
}

function hapus(id_pendidikan,pendidikan){
	var str_url  	= encodeURI(base_url+"pendidikan/Delpendidikan/"+id_pendidikan);
	bootbox.confirm("Anda yakin akan menghapus "+pendidikan+" ?",
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

							window.location = base_url+'pendidikan';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_namadonatur').val('');
}


function SearchAction(){

    var pendidikan		= $('#s_pendidikan').val();
	var param 			= {'pendidikan':pendidikan};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}


function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'pendidikan/exportexcel/'+param;
}

