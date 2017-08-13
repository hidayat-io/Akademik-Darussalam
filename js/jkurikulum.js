// //load
$(document).ready(function()
{
	// addSantri("TMI");
	setTable();
	// setTableKurikulum();
	$('.datepicker').datepicker(
	{
		rtl: App.isRTL(),
		orientation: "left",
		autoclose: true,
		format: 'dd-mm-yyyy'
    });

    $(".select2").select2();
    pilihItemkode_kelas();
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
	$( "#add_kurikulum" ).validate({
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

function kode_kelasshow(){
    $('#hiddenkode_kelas').show();
    $('#spansearchkode_kelas').hide();
    $('#spansearchclosekode_kelas').show();
    
    
}

function kode_kelasclosespan(){
    $('#hiddenkode_kelas').hide();
    $('#spansearchkode_kelas').show();
    $('#spansearchclosekode_kelas').hide();
}

function pilihItemkode_kelas(){

	$item  	= $('#hide_kode_kelas').val();
	$item 	= $item.split('#');

    $('#kode_kelas').val($item[0]);
    $('#hiddenkode_kelas').hide();
    $('#spansearchkode_kelas').show();
    $('#spansearchclosekode_kelas').hide();
}

function id_mapelshow(){
    $('#hiddenid_mapel').show();
    $('#spansearchid_mapel').hide();
    $('#spansearchcloseid_mapel').show();
    
    
}

function id_mapelclosespan(){
    $('#hiddenid_mapel').hide();
    $('#spansearchid_mapel').show();
    $('#spansearchcloseid_mapel').hide();
}

function pilihItemid_mapel(){

	$item  	= $('#hide_id_mapel').val();
	$item 	= $item.split('#');

    $('#id_mapel').val($item[0]);
    $('#hiddenid_mapel').hide();
    $('#spansearchid_mapel').show();
    $('#spansearchcloseid_mapel').hide();
}

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		ajax: {
			'url':base_url+"kurikulum/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
    } );
}

// function setTableKurikulum(){
// 	 $('#tb_list_kurikulum').DataTable( {
// 		// "order": [[ 0, "desc" ]],
//         "processing": true,
// 		"serverSide": true,
// 		"paging": false,
// 		"searching": false,
// 		 "bInfo" : false,
// 		  "ordering": false,
// 		ajax: {
// 			'url':base_url+"kurikulum/AddKurikulum",
// 			'type':'GET',
// 			'data': function ( d ) {
//                 d.param = $('#hid_param_kurikulum').val();
//             }
// 		},
//     } );
// }

function Modalcari(){
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction(){
    var id_thn_ajar 	    = $('#s_id_thn_ajar').val();
    var nama_lengkap 	= $('#s_namalengkap').val();
	var param 			= {'id_thn_ajar':id_thn_ajar};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function kosong(){
		$('#id_thn_ajar').val('');
		$('#kode_kelas').val('');
		$('#id_mapel').val('');
		$('#sm_1').val('');
		$('#sm_2').val('');
}

function svkurikulum(){
	if($("#add_kurikulum").valid()==true){
        $id_thn_ajar = $('#id_thn_ajar').val();
		$status = $('#save_button').text();
		var str_url  	= encodeURI(base_url+"kurikulum/get_data_kurikulum/"+$id_thn_ajar);
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
                    var iform = $('#add_kurikulum')[0];
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
                        url:base_url+"kurikulum/simpan_kurikulum/"+$status,
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

                                    window.location = base_url+'kurikulum';
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

function addkurikulum(){
	// setTableKurikulum();
    kosong();
    kode_kelasclosespan();
    id_mapelclosespan();
    $('#save_button').text('SAVE');	
    $('#id_thn_ajar').attr('readonly',false);
	$('#Modal_add_kurikulum').modal('show');
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(id_thn_ajar){
    kode_kelasclosespan();
    id_mapelclosespan();
	var str_url  	= encodeURI(base_url+"kurikulum/get_data_kurikulum/"+id_thn_ajar);
    $('#save_button').text('UPDATE');
    $('#id_thn_ajar').attr('readonly',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#id_thn_ajar').val(data['id_thn_ajar']);
		    $('#kode_kelas').val(data['kode_kelas']);
		    $('#id_mapel').val(data['id_mapel']);
		    $('#sm_1').val(data['sm_1']);
		    $('#sm_2').val(data['sm_2']);
            
			
			$('#Modal_add_kurikulum').modal('show');
			
			
		}
	});
	
}

function hapus(id_thn_ajar){
	var str_url  	= encodeURI(base_url+"kurikulum/Delkurikulum/"+id_thn_ajar);
	bootbox.confirm("Anda yakin akan menghapus "+id_thn_ajar+" ini ?",
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

							window.location = base_url+'kurikulum';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_id_thn_ajar').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'kurikulum/exportexcel/'+param;
}

function jmlkpsm1(sm1,JMLKSM1)
{	
	var sm_1 = sm1;
	var JMLKSM1 = JMLKSM1;
	if ($('#sm_1').val() != null | $('#sm_1').val() != 0)
		{
			$('#JMLKSM1').val('99');
		}
}

function jmlkpsm2()
{
	
}