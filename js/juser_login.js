// //load
$(document).ready(function()
{
    setTable();
    pilihItemmskaryawan();
    pilihItemmsgroup();
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
	validate_add_user_login();
});

function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

function idmskaryawanshow() {
    $('#hiddenidmskaryawan').show();
    $('#spansearchmskaryawan').hide();
    $('#spansearchclosemskaryawan').show();
}

function idmskaryawanhide() {
    $('#hiddenidmskaryawan').hide();
    $('#spansearchmskaryawan').show();
    $('#spansearchclosemskaryawan').hide();
}

function pilihItemmskaryawan() {

    $item = $('#hide_id_mskaryawan').val();
    $item = $item.split('#');

    $('#user_id').val($item[0]);
    $('#nama_user_login').val($item[1]);
    $('#hiddenidmskaryawan').hide();
    $('#spansearchmskaryawan').show();
    $('#spansearchclosemskaryawan').hide();
}

function idmsgroupshow() {
    $('#hiddenidmsgroup').show();
    $('#spansearchmsgroup').hide();
    $('#spansearchclosemsgroup').show();
}

function idmsgrouphide() {
    $('#hiddenidmsgroup').hide();
    $('#spansearchmsgroup').show();
    $('#spansearchclosemsgroup').hide();
}

function pilihItemmsgroup() {

    $item = $('#hide_id_msgroup').val();
    $item = $item.split('#');

    $('#id_group').val($item[0]);
    $('#group_name').val($item[1]);
    $('#hiddenidmsgroup').hide();
    $('#spansearchmsgroup').show();
    $('#spansearchclosemsgroup').hide();
}

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"search": false,
		ajax: {
			'url':base_url+"user_login/load_grid",
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
    // var id_user_login 	    = $('#s_kodeuser_login').val();
    var nama_user_login	= $('#s_namauser_login').val();
	var param 			= {'nama_user_login':nama_user_login};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

var validate_add_user_login = function () {

	var form = $('#add_user_login');
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

function clearvalidate_add_user_login() {

	$("#add_user_login div").removeClass('has-error');
	$("#add_user_login i").removeClass('fa-warning');
	$("#add_user_login div").removeClass('has-success');
	$("#add_user_login i").removeClass('fa-check');

	document.getElementById("add_user_login").reset();
}


function svuser_login(){
	if($("#add_user_login").valid()==true){
        $nama_user_login = $('#nama_user_login').val();
		$status = $('#save_button').text();
		var str_url  	= encodeURI(base_url+"user_login/get_data_user_login/"+$nama_user_login);
       $.ajax({
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){	
            $data = $.parseJSON(data);
                if( $data != null & $status =='SAVE'){
                        bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>"+$nama_user_login+" SUDAH ADA DI DATABASE! </div>",
                            function(result){
                                if(result==true){
                                }
                            }
                        );
                    
                }
                else{
                    var iform = $('#add_user_login')[0];
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
                        url:base_url+"user_login/simpan_user_login/"+$status,
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

                                    window.location = base_url+'user_login';
                                }
                            });
                        }
                    });
                }
            }
        });
	}
}

function adduser_login(){
	clearvalidate_add_user_login();
    $('#save_button').text('SAVE');
	// kosong();
	$('#Modal_add_user_login').modal('show');
}

function edit(id_user_login){
	clearvalidate_add_user_login();
	var str_url  	= encodeURI(base_url+"user_login/get_edit_user_login/"+id_user_login);
    $('#save_button').text('UPDATE');
    $('#id_user_login').attr('readonly',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#id_user_login').val(data['id_user_login']);//untuk membaca kategori saat update
			$('#nama_user_login').val(data['nama_user_login']);
			$('#lembaga').val(data['lembaga']);
			$('#alamat').val(data['alamat']);
			$('#telpon').val(data['telpon']);
			$('#kategori').val(data['kategori']);
			
			$('#Modal_add_user_login').modal('show');
			
			
		}
	});
	
}

function hapus(id_user_login,nama_user_login){
	var str_url  	= encodeURI(base_url+"user_login/Deluser_login/"+id_user_login);
	bootbox.confirm("Anda yakin akan menghapus "+nama_user_login+" ?",
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

							window.location = base_url+'user_login';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_namauser_login').val('');
}


