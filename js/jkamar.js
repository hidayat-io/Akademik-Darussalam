// //load
$(document).ready(function()
{
	// addSantri("TMI");
	setTable();
	pilihItemGedung();
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
	validate_add_kamar();
});


function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"kamar/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
    } );
}

function idgedungshow() {
	$('#hiddenidgedung').show();
	$('#spansearchgedung').hide();
	$('#spansearchclosegedung').show();
}

function idgedunghide() {
	$('#hiddenidgedung').hide();
	$('#spansearchgedung').show();
	$('#spansearchclosegedung').hide();
}

function pilihItemGedung() {

	$item = $('#hide_id_gedung').val();
	$item = $item.split('#');

	$('#rayon').val($item[0]);
	$('#nama_asrama').val($item[1]);
	$('#hiddenidgedung').hide();
	$('#spansearchgedung').show();
	$('#spansearchclosegedung').hide();
}

var validate_add_kamar = function () {

	var form = $('#add_kamar');
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

function clearvalidate_add_kamar() {

	$("#add_kamar div").removeClass('has-error');
	$("#add_kamar i").removeClass('fa-warning');
	$("#add_kamar div").removeClass('has-success');
	$("#add_kamar i").removeClass('fa-check');

	document.getElementById("add_kamar").reset();
}


function Modalcari(){
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction(){
    var kode_kamar 	    = $('#s_kodekamar').val();
    var nama_lengkap 	= $('#s_namalengkap').val();
	var param 			= {'kode_kamar':kode_kamar};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function svkamar(){
	if($("#add_kamar").valid()==true){
        $kode_kamar = $('#kode_kamar').val();
		$status = $('#save_button').text();
		var str_url  	= encodeURI(base_url+"kamar/get_data_kamar/"+$kode_kamar);
       $.ajax({
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){	
            $data = $.parseJSON(data);
                if( $data != null & $status =='SAVE'){
                        bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SUDAH ADA DI DATABASE! </div>",
                            function(result){
                                if(result==true){
                                }
                            }
                        );
                    
                }
                else{
                    var iform = $('#add_kamar')[0];
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
                        url:base_url+"kamar/simpan_kamar/"+$status,
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

                                    window.location = base_url+'kamar';
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

function addkamar(){
	clearvalidate_add_kamar()
	$('#save_button').text('SAVE');
	$('#kode_kamar').attr('readonly',false);
	$('#Modal_add_kamar').modal('show');
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(kode_kamar){
	clearvalidate_add_kamar()
    $('#save_button').text('UPDATE');
	$('#kode_kamar').attr('readonly',true);
	var str_url  	= encodeURI(base_url+"kamar/get_data_kamar/"+kode_kamar);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#kode_kamar').val(data['kode_kamar']);//untuk membaca kategori saat update
			$('#nama').val(data['nama']);
			$('#kapasitas').val(data['kapasitas']);
			$('#rayon').val(data['kode_gedung']);
			$('#nama_asrama').val(data['nama_gedung']);
			if (data['iskelas'] ==1){
				$('#iskelas').prop("checked",true);
			}
			else{
				$('#iskelas').prop("checked",false);

			}
			
			$('#Modal_add_kamar').modal('show');
			
			
		}
	});
	
}

function hapus(kode_kamar){
	var str_url  	= encodeURI(base_url+"kamar/Delkamar/"+kode_kamar);
	bootbox.confirm("Anda yakin akan menghapus "+kode_kamar+" ini ?",
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

							window.location = base_url+'kamar';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_kodekamar').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'kamar/exportexcel/'+param;
}


