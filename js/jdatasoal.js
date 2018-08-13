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

	validate_add_datasoal ();

});


function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"datasoal/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		 },
		 columnDefs: [
			 { width: 20, targets: 0 },
			 { width: 20, targets: 1 },
			 { width: 100, targets:2 },
			 {
				 targets: [3],         //action
				 orderable: false,
				 width: 10
			 }
		 ],
	 });
}

function Modalcari(){
	clearformcari();
	$('#Modal_cari').modal('show');
}

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

function kosong(){
	$('#id_matpal').attr('disabled', false);
	$('#tingkat').attr('disabled', false);
	$('#kode_datasoal').val('');
	$('#id_matpal').val('');
	$('#tingkat').val('');
	$('#soal').val('');
	$('#jawaban_a').val('');
	$('#jawaban_b').val('');
	$('#jawaban_c').val('');
	$('#jawaban_d').val('');
	$('#jawab_benar').val('');
}

var validate_add_datasoal = function () {

	var form = $('#add_datasoal');
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

function clearvalidate_add_datasoal() {

	$("#add_datasoal div").removeClass('has-error');
	$("#add_datasoal i").removeClass('fa-warning');
	$("#add_datasoal div").removeClass('has-success');
	$("#add_datasoal i").removeClass('fa-check');

	document.getElementById("add_datasoal").reset();
}

function svdatasoal(){
	if($("#add_datasoal").valid()==true){
	// 	$id_matpal = $('#id_matpal').val();
	// 	$tingkat = $('#tingkat').val();
		$status = $('#save_button').text();
	// 	var str_url  	= encodeURI(base_url+"datasoal/get_data_datasoal/");
    //    $.ajax({
	// 	type:"POST",
	// 	url:str_url,
	// 	dataType:"html",
	// 	success:function(data){	
    //         $data = $.parseJSON(data);
    //             if( $data != null & $status =='SAVE'){
    //                     bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SUDAH ADA DI DATABASE! </div>",
    //                         function(result){
    //                             if(result==true){
    //                             }
    //                         }
    //                     );
                    
    //             }
    //             else{
					$('#id_matpal').attr('disabled', false);
					$('#tingkat').attr('disabled', false);
                    var iform = $('#add_datasoal')[0];
                    var data = new FormData(iform);
                    if ($status == 'UPDATE')
                        {
                            msg="Update Data Berhasil"
                        }
                        else
                        {
                            msg="Simpan Data Berhasil"
                        }
                    $.ajax({

                        type:"POST",
                        url:base_url+"datasoal/simpan_datasoal/"+$status,
                        enctype: 'multipart/form-data',
                        // dataType:"JSON",
                        contentType: false,
                        processData: false,
                        data:data,
                        success:function(data){

                            bootbox.alert({
                                message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;"+msg+"!!",
                                size: 'small',
                                callback: function () {

                                    window.location = base_url+'datasoal';
                                }
                            });
                        }
                    });
                // }
            // }
        // });
	}
}

function OtomatisKapital(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

function adddatasoal(){
    $('#save_button').text('SAVE');
	kosong();
	clearvalidate_add_datasoal();
	$('#Modal_add_datasoal').modal('show');
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(id_soal){
	var str_url  	= encodeURI(base_url+"datasoal/get_data_datasoal_byid/"+id_soal);
    $('#save_button').text('UPDATE');
    // $('#kode_datasoal').attr('',true);
	$('#id_matpal').attr('disabled',true);
    $('#tingkat').attr('disabled',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#kode_datasoal').val(data['id_soal']);//untuk membaca kategori saat update
			$('#id_matpal').val(data['id_matpal']);
			$('#tingkat').val(data['tingkat']);
			$('#jawaban_a').val(data['jwb_a']);
			$('#soal').val(data['soal']);
			$('#jawaban_b').val(data['jwb_b']);
			$('#jawaban_c').val(data['jwb_c']);
			$('#jawaban_d').val(data['jwb_d']);
			$('#jawaban_d').val(data['jwb_d']);
			$('#jawab_benar').val(data['jwb_benar']);
			
			$('#Modal_add_datasoal').modal('show');
			
			
		}
	});
	
}

function hapus(kode_datasoal){
	var str_url  	= encodeURI(base_url+"datasoal/Deldatasoal/"+kode_datasoal);
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

							window.location = base_url+'datasoal';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_kodedatasoal').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'datasoal/exportexcel/'+param;
}

