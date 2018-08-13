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
	validate_add_donatur();
});


function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		ajax: {
			'url':base_url+"donatur/load_grid",
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

function SearchAction(){
    // var id_donatur 	    = $('#s_kodedonatur').val();
    var nama_donatur	= $('#s_namadonatur').val();
	var param 			= {'nama_donatur':nama_donatur};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function kosong(){
		$('#id_donatur').val('');
		$('#nama_donatur').val('');
		$('#alamat').val('');
		$('#telpon').val('');
		$('#kategori').val('');
}

var validate_add_donatur = function () {

	var form = $('#add_donatur');
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

function clearvalidate_add_donatur() {

	$("#add_donatur div").removeClass('has-error');
	$("#add_donatur i").removeClass('fa-warning');
	$("#add_donatur div").removeClass('has-success');
	$("#add_donatur i").removeClass('fa-check');

	document.getElementById("add_donatur").reset();
}


function svdonatur(){
	if($("#add_donatur").valid()==true){
        $nama_donatur = $('#nama_donatur').val();
		$status = $('#save_button').text();
		var str_url  	= encodeURI(base_url+"donatur/get_data_donatur/"+$nama_donatur);
       $.ajax({
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){	
            $data = $.parseJSON(data);
                if( $data != null & $status =='SAVE'){
                        bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>"+$nama_donatur+" SUDAH ADA DI DATABASE! </div>",
                            function(result){
                                if(result==true){
                                }
                            }
                        );
                    
                }
                else{
                    var iform = $('#add_donatur')[0];
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
                        url:base_url+"donatur/simpan_donatur/"+$status,
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

                                    window.location = base_url+'donatur';
                                }
                            });
                        }
                    });
                }
            }
        });
	}
}

function OtomatisKapital(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

function adddonatur(){
	clearvalidate_add_donatur();
    $('#save_button').text('SAVE');
	// kosong();
	$('#Modal_add_donatur').modal('show');
}

function edit(id_donatur){
	clearvalidate_add_donatur();
	var str_url  	= encodeURI(base_url+"donatur/get_edit_donatur/"+id_donatur);
    $('#save_button').text('UPDATE');
    $('#id_donatur').attr('readonly',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#id_donatur').val(data['id_donatur']);//untuk membaca kategori saat update
			$('#nama_donatur').val(data['nama_donatur']);
			$('#lembaga').val(data['lembaga']);
			$('#alamat').val(data['alamat']);
			$('#telpon').val(data['telpon']);
			$('#kategori').val(data['kategori']);
			
			$('#Modal_add_donatur').modal('show');
			
			
		}
	});
	
}

function hapus(id_donatur,nama_donatur){
	var str_url  	= encodeURI(base_url+"donatur/Deldonatur/"+id_donatur);
	bootbox.confirm("Anda yakin akan menghapus "+nama_donatur+" ?",
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

							window.location = base_url+'donatur';
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

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'donatur/exportexcel/'+param;
}

