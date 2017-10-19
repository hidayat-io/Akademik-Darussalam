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
    // pilihItemtingkat();
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
					
			},
				
			highlight: function ( element, errorClass, validClass ) {
				$(element).closest(".form-group").addClass( "has-error" ).removeClass( "has-success" );
			},
			unhighlight: function ( element, errorClass, validClass ) {
				$(element).closest(".form-group").addClass( "has-success" ).removeClass( "has-error" );
			}

	}); //end dari validasi form

});

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"kurikulum/load_grid",
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

function svkurikulum(){
	if($("#add_kurikulum").valid()==true){
        $id_thn_ajar = $('#hide_id_thn_ajar').val();
		$status = $('#save_button').text();
		var str_url  	= encodeURI(base_url+"kurikulum/get_data_kurikulum_byid/"+$id_thn_ajar);
       $.ajax({
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){	
            $data = $.parseJSON(data);
                if( $data != null & $status =='SAVE'){
                        bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span> TAHUN AJARAN SUDAH ADA!! </div>",
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
    $('#save_button').text('SAVE');	
    $('#id_thn_ajar').attr('disabled',false);
    $('#id_thn_ajar').val('');
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

function add_tohide()
{
	$id_thn_ajar = $('#id_thn_ajar').val();
	$('#hide_id_thn_ajar').val($id_thn_ajar);
}

function edit(id_thn_ajar){
	var str_url  	= encodeURI(base_url+"kurikulum/get_data_kurikulum/"+id_thn_ajar);
    $('#save_button').text('UPDATE');
    $('#id_thn_ajar').attr('disabled',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#id_thn_ajar').val(data[0].id_thn_ajar);
			$('#hide_id_thn_ajar').val(data[0].id_thn_ajar);
			var jml_kisos =0;
			var ilength = data.length;
			for(i=0;i<ilength;i++){
				var sm1 = 'SM1_'+data[i].id_mapel+'_'+data[i].tingkat+'_'+data[i].tipe_kelas;
				var sm2 = 'SM2_'+data[i].id_mapel+'_'+data[i].tingkat+'_'+data[i].tipe_kelas;
				$('#'+sm1).val(data[i].sm_1);
				$('#'+sm2).val(data[i].sm_2);

				//menampilkan jumlah kisos semester1
				var txt_kisoss_m1 		= 'JK_SM1_'+data[i].tingkat+'_'+data[i].tipe_kelas;
				var total_kisos_m1		= $('#'+txt_kisoss_m1).val();
				$('#'+txt_kisoss_m1).val(parseInt(total_kisos_m1)+parseInt(data[i].sm_1));

				//menampilkan jumlah kisos semester2
				var txt_kisoss_m2 		= 'JK_SM2_'+data[i].tingkat+'_'+data[i].tipe_kelas;
				var total_kisos_m2		= $('#'+txt_kisoss_m2).val();
				$('#'+txt_kisoss_m2).val(parseInt(total_kisos_m2)+parseInt(data[i].sm_2));

				// menampilkan jumlah matpal semester1
				var txt_matpal_m1 		= 'JP_SM1_'+data[i].tingkat+'_'+data[i].tipe_kelas;
				var total_matpal_m1		= $('#'+txt_matpal_m1).val();
				if((data[i].sm_1) >0)
					{
						$('#'+txt_matpal_m1).val(parseInt(total_matpal_m1)+1);
					}

				// menampilkan jumlah matpal semester2
				var txt_matpal_m2 		= 'JP_SM2_'+data[i].tingkat+'_'+data[i].tipe_kelas;
				var total_matpal_m2		= $('#'+txt_matpal_m2).val();
				if((data[i].sm_2) >0)
					{
						$('#'+txt_matpal_m2).val(parseInt(total_matpal_m2)+1);
					}
				
			}
			
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


function loopMataPelajaran(textbox_id,kdkls,tmp){

	var mapel 			= document.getElementsByName(textbox_id+"[]");
	var ilength 		= mapel.length;
	var jml_kisos		= 0;
	var jml_matpel  	= 0;
	
	if (tmp == 'mp1'){
		var txt_kisos 	= 'JK_SM1_'+kdkls;
		var txt_matpal 	= 'JP_SM1_'+kdkls;
	}
	else if (tmp =='mp2')
	{
		var txt_kisos 	= 'JK_SM2_'+kdkls;	
		var txt_matpal 	= 'JP_SM2_'+kdkls;
	}
	
	for(i=0;i<ilength;i++){
		if((mapel[i].value) == '' || (mapel[i].value) <0)
			{
				bootbox.alert('Bobot Nilai Tidak Boleh Kosong');
				mapel[i].value=0;
				return false;
			}
		jml_kisos=jml_kisos+parseInt(mapel[i].value);
		if (parseInt(mapel[i].value) != 0)
			{
				jml_matpel=jml_matpel+1;
			}
	}
	$('#'+txt_kisos).val(jml_kisos);
	$('#'+txt_matpal).val(jml_matpel);


	
}