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

    $(".select2").select2();
    pilihItem();
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
	$( "#add_mata_pelajaran" ).validate({
		errorElement:"em",
		// errorClass:"help-block help-block-error",
			// rules:{
	    //    no_registrasi:{
	    //    minlength:2,
	    //    required:!0},
	    //    no_stambuk:{
	    //    required:!0}
			// },
			messages: {
				// no_registrasi: {
				// 	required: "(required)",
				// 	minlength: " (must be at least 3 characters)"
				// },
				email: "Email invalid"
			},

			invalidHandler: function(element, validator){
				validator.focusInvalid();
			},

			errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					$(element).closest(".form-group").addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "form-control" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}

	}); //end dari validasi form

});

function idbidshow(){
    $('#hiddenidbid').show();
    $('#spansearch').hide();
    $('#spansearchclose').show();
    
    
}

function closespan(){
    $('#hiddenidbid').hide();
    $('#spansearch').show();
    $('#spansearchclose').hide();
}

function pilihItem(){

	$item  	= $('#hide_id_bidangstudi').val();
	$item 	= $item.split('#');

    $('#id_bidangstudi').val($item[0]);
    $('#hiddenidbid').hide();
    $('#spansearch').show();
    $('#spansearchclose').hide();
}

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"mata_pelajaran/load_grid",
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
    var id_matpal 	    = $('#s_id_matpal').val();
    var nama_lengkap 	= $('#s_namalengkap').val();
	var param 			= {'id_matpal':id_matpal};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function kosong(){
		$('#id_matpal').val('');
		$('#nama_matpal').val('');
		$('#id_bidangstudi').val('');
		$('#status').val('');
}

function svmata_pelajaran(){
	if($("#add_mata_pelajaran").valid()==true){
        $id_matpal = $('#id_matpal').val();
		$status = $('#save_button').text();
		var str_url  	= encodeURI(base_url+"mata_pelajaran/get_data_mata_pelajaran/"+$id_matpal);
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
                    var iform = $('#add_mata_pelajaran')[0];
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
                        url:base_url+"mata_pelajaran/simpan_mata_pelajaran/"+$status,
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

                                    window.location = base_url+'mata_pelajaran';
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

function addmata_pelajaran(){
    // kosong();
    // $('#spansearchclose').hide();
    // $('#hiddenidbid').hide();
    // $('#save_button').text('SAVE');	
    // $('#status').val('1');
	// $('#Modal_add_mata_pelajaran').modal('show');
	bootbox.alert("Silahkan Tambahkan di Menu Bidang Studi!");
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(id_matpal){
	var str_url  	= encodeURI(base_url+"mata_pelajaran/get_data_mata_pelajaran/"+id_matpal);
    $('#save_button').text('UPDATE');
    $('#id_matpal').attr('readonly',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#id_matpal').val(data['id_matpal']);
		    $('#nama_matpal').val(data['nama_matpal']);
		    $('#id_bidangstudi').val(data['id_bidang']);
		    $('#status').val(data['status']);
            
			
			$('#Modal_add_mata_pelajaran').modal('show');
			
			
		}
	});
	
}

function hapus(id_matpal){
	var str_url  	= encodeURI(base_url+"mata_pelajaran/Delmata_pelajaran/"+id_matpal);
	bootbox.confirm("Anda yakin akan menghapus "+id_matpal+" ini ?",
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

							window.location = base_url+'mata_pelajaran';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_id_matpal').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'mata_pelajaran/exportexcel/'+param;
}

