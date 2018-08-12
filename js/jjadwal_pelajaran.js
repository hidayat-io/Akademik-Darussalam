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
	
	// $(".select2").select2({
	// 	dropdownParent:$('#Modal_add_jadwal_pelajaran')
	// });
	$(".select2").select2();

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
	$( "#add_jadwal_pelajaran" ).validate({
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

function add_tohide()
{
	$id_thn_ajar = $('#id_thn_ajar').val();
	$('#hide_Kurikulum').val($id_thn_ajar);
}

function add_tohidekelas()
{
	$item  	= $('#select_kelas').val();
	$item 	= $item.split('#');

    $('#kode_kelas').val($item[0]);
    $('#tingkat').val($item[2]);
    $('#tipe_kelas').val($item[3]);
}

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"jadwal_pelajaran/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
    } );
}

function kosong_table()
{
	$('#tb_mata_pelajaran tbody').html('');
	$('#tb_mata_pelajaran > tbody').html('"<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>"');
}

function refresh_table()
{
    if($("#id_thn_ajar").val() == '')
    {
        bootbox.alert("Pilih Dulu Kurikulum");
    }
    else if($("#semester").val() == '')
    {
        bootbox.alert("Pilih Dulu Semester");
    }
    else if($("#select_kelas").val() == '')
    {
        bootbox.alert("Pilih Dulu Kelas");
    }
    else if($("#santri").val() == '')
    {
        bootbox.alert("Pilih Dulu Santri");
    }
    else
    {   
		$('#tb_mata_pelajaran tbody').html('');
		var id_thn_ajar = $('#id_thn_ajar').val();
		var semester 	= $('#semester').val();
		var tingkat 	= $('#tingkat').val();
		var tipe_kelas 	= $('#tipe_kelas').val();
		var kdrow 	= makeid();
		
		var str_url  	= encodeURI(base_url+"jadwal_pelajaran/GetKurikulumTambah/"+id_thn_ajar+"/"+semester+"/"+tingkat+"/"+tipe_kelas);
		$.ajax({
			
			type:"POST",
			url:str_url,
			dataType:"html",
			success:function(data)
			{
				var data = $.parseJSON(data);
				var LengtData = data.length;
				if (LengtData == 0){
					$('#tb_mata_pelajaran tbody').html('');
					$('#tb_mata_pelajaran > tbody').html('"<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>"');
					bootbox.alert('Tidak ada data, silahkan Cek Kurikulum!');
				}
				else
				{
					
					//build selectbox master guru
					var str_opt_guru 	= '';
					var data_guru 		= $('#hid_master_guru').val();
						data_guru 		= $.parseJSON(data_guru);

					for(x = 0; x < data_guru.length; x++){

					    str_opt_guru += '<option value="'+data_guru[x].id_guru+'">'+data_guru[x].id_guru+' - '+data_guru[x].nama_guru+'</option>';
					}
					//end build selectbox master guru
					
					for(i=0;i<LengtData;i++)
					{
						if (semester == 1)
							{
								var sm = data[i].sm_1;
							}
							else if (semester ==2)
							{
								var sm = data[i].sm_2;
							}
						for(y=0;y<sm;y++)
						{
							var hari = 'txthari_'+data[i].id_mapel+y+i;
							var guru = 'txtguru_'+data[i].id_mapel+y+i;
							var jam = 'txtjam_'+data[i].id_mapel+y+i;
							var content_data 	= '<tr class="tb-detail" id="row'+kdrow+'">';
							content_data 	+= "<td>"+data[i].nama_matpal+"</td>"; //mata pelajaran
							content_data 	+= '<td><select class="form-control" name="'+hari+'" id="hari" >'
												+'<option value="">-Pilih Hari-</option>'
												+'<option value="SENIN">SENIN</option>'
												+'<option value="SELASA">SELASA</option>'
												+'<option value="RABU">RABU</option>'
												+'<option value="KAMIS">KAMIS</option>'
												+'<option value="JUMAT">JUMAT</option>'
												+'<option value="SABTU">SABTU</option>'
												+'<option value="AHAD">AHAD</option>'
												+'</select></td>'; //hari
							content_data 	+= '<td><select class="form-control select2" style="width:100%"  name="'+guru+'" id="guru" >'
												+'<option value="">-Pilih Guru-</option>'
												+str_opt_guru
												+'</select></td>'; //Guru
							content_data 	+= '<td><select class="form-control" name="'+jam+'" id="jam" >'
												+'<option value="">-Pilih Jam-</option>'
												+'<option value="I">I</option>'
												+'<option value="II">II</option>'
												+'<option value="III">III</option>'
												+'<option value="IV">IV</option>'
												+'<option value="V">V</option>'
												+'<option value="VI">VI</option>'
												+'</select></td>'; //JAM
							content_data 	+= "</tr>";
										
							if(y<1 && i<1){
								
								$('#tb_mata_pelajaran tbody').html(content_data);
							}
							else{
	
								$('#tb_mata_pelajaran tbody').append(content_data);
							}
						}
						
					}
				}
						
			}
		});

        
    }
}

function kosong(){
		$('#id_thn_ajar').val('');
		$('#semester').val('');
		$('#select_kelas').val('');
		$('#tingkat').val('');
		$('#tipe_kelas').val('');
		$('#santri').val('');
		$('#tb_mata_pelajaran tbody').html('');
		
}

function svjadwal_pelajaran(){
	if($("#add_jadwal_pelajaran").valid()==true){
		var lengtable = $('.tb-detail').length;
		if (lengtable == 0){
		bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Data pelajaran masih kosong </div>");
		return false;
		}
        $santri = $('#santri').val();
        $id_thn_ajar = $('#id_thn_ajar').val();
        $semester = $('#semester').val();
        $kode_kelas = $('#kode_kelas').val();
		$status = $('#save_button').text();
		var str_url  	= encodeURI(base_url+"jadwal_pelajaran/cek_duplicate_data/"+$id_thn_ajar+"/"+$santri+"/"+$semester+"/"+$kode_kelas);
       $.ajax({
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){	
            $data = $.parseJSON(data);
                if( $data != null & $status =='SAVE'){
                        bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SUDAH ADA DI DATABASE! </div>");
                }
                else{
                    var iform = $('#add_jadwal_pelajaran')[0];
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
                        url:base_url+"jadwal_pelajaran/simpan_jadwal_pelajaran/"+$status,
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

                                    window.location = base_url+'jadwal_pelajaran';
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

function addjadwal_pelajaran(){
    $('#save_button').text('SAVE');
	kosong();
	$('#button_refresh').attr('disabled',false);
	$('#Modal_add_jadwal_pelajaran').modal('show');
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(kode_kelas,tingkat, tipe_kelas,nama,santri,id_thn_ajar,deskripsi,semester){
	$('#save_button').text('UPDATE');
	$('#button_refresh').attr('disabled',true);
	
	$('#id_thn_ajar').val(id_thn_ajar);
	$('#select_kelas').val(kode_kelas+'#'+nama+'#'+tingkat+'#'+tipe_kelas);
	$('#hide_Kurikulum').val(id_thn_ajar);
	$('#santri').val(santri);
	$('#semester').val(semester);
	$('#kode_kelas').val(kode_kelas);
	$('#tingkat').val(tingkat);
	$('#tipe_kelas').val(tipe_kelas);

	//read only text box
	// $('#id_thn_ajar').attr('disabled',true);
	// $('#select_kelas').attr('disabled',true);
	// $('#semester').attr('disabled',true);
	// $('#santri').attr('disabled',true);
		
	$('#Modal_add_jadwal_pelajaran').modal('show');
	
	$('#tb_mata_pelajaran tbody').html('');
	// var id_thn_ajar = $('#id_thn_ajar').val();
	// var semester 	= $('#semester').val();
	// var tingkat 	= $('#tingkat').val();
	// var tipe_kelas 	= $('#tipe_kelas').val();
	var kdrow 	= makeid();
	
	var str_url  	= encodeURI(base_url+"jadwal_pelajaran/GetKurikulum/"+id_thn_ajar+"/"+semester+"/"+tingkat+"/"+tipe_kelas+"/"+kode_kelas+"/"+santri);
	$.ajax({
		
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data)
		{
			var data = $.parseJSON(data);
			var LengtData = data.length;
			if (LengtData == 0){
				$('#tb_mata_pelajaran tbody').html('');
				$('#tb_mata_pelajaran > tbody').html('"<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>"');
				bootbox.alert('Tidak ada data, silahkan Cek Kurikulum!');
			}
			else
			{	
				//build selectbox master guru
				var str_opt_guru 	= '';
				var data_guru 		= $('#hid_master_guru').val();
					data_guru 		= $.parseJSON(data_guru);

				for(x = 0; x < data_guru.length; x++){

					str_opt_guru += '<option value="'+data_guru[x].id_guru+'">'+data_guru[x].id_guru+' - '+data_guru[x].nama_guru+'</option>';
				}
				//end build selectbox master guru

				for(i=0;i<LengtData;i++)
				{
					if (semester == 1)
						{
							var sm = data[i].sm_1;
						}
						else if (semester ==2)
						{
							var sm = data[i].sm_2;
						}
					// for(y=0;y<sm;y++)
					// {

						var hari = 'txthari_'+data[i].id_mapel+i;
						var guru = 'txtguru_'+data[i].id_mapel+i;
						var jam = 'txtjam_'+data[i].id_mapel+i;
						// var hari = 'txthari_'+data[i].id_mapel+y+i;
						// var guru = 'txtguru_'+data[i].id_mapel+y+i;
						// var jam = 'txtjam_'+data[i].id_mapel+y+i;
						
								var content_data 	= '<tr class="tb-detail" id="row'+kdrow+'">';
								content_data 	+= "<td>"+data[i].nama_matpal+"</td>"; //mata pelajaran
								content_data 	+= '<td><select class="form-control" name="'+hari+'" id="'+hari+'" >'
													+'<option value="">-Pilih Hari-</option>'
													+'<option value="SENIN">SENIN</option>'
													+'<option value="SELASA">SELASA</option>'
													+'<option value="RABU">RABU</option>'
													+'<option value="KAMIS">KAMIS</option>'
													+'<option value="JUMAT">JUMAT</option>'
													+'<option value="SABTU">SABTU</option>'
													+'<option value="AHAD">AHAD</option>'
													+'</select></td>'; //hari
								content_data 	+= '<td><select class="form-control select2" style="width:100%"  name="'+guru+'" id="'+guru+'" >'
													+'<option value="">-Pilih Guru-</option>'
													+str_opt_guru
													+'</select></td>'; //Guru
								content_data 	+= '<td><select class="form-control" name="'+jam+'" id="'+jam+'" >'
													+'<option value="">-Pilih Jam-</option>'
													+'<option value="I">I</option>'
													+'<option value="II">II</option>'
													+'<option value="III">III</option>'
													+'<option value="IV">IV</option>'
													+'<option value="V">V</option>'
													+'<option value="VI">VI</option>'
													+'</select></td>'; //JAM
								content_data 	+= "</tr>";
								
								
		
								if(i<1){
								// if(y<1 && i<1){
									
									$('#tb_mata_pelajaran tbody').html(content_data);
								}
								else{
		
									$('#tb_mata_pelajaran tbody').append(content_data);
								}
								$('#'+hari).val(data[i].hari);
								$('#'+guru).val(data[i].id_guru);
								$('#'+jam).val(data[i].jam);
								
						// 	}
						// });
						
					// }
					
				}
			}
					
		}
	});
	
}

// function edit(kode_kelas,tingkat, tipe_kelas,nama,santri,id_thn_ajar,deskripsi,semester){
	// 	// var str_url  	= encodeURI(base_url+"jadwal_pelajaran/get_data_jadwal_pelajaran/"+kode_kelas+'/'+santri+'/'+id_thn_ajar+'/'+semester);
	// 	$('#save_button').text('UPDATE');
	// 	$('#button_refresh').attr('disabled',true);
		
	//     // $('#id_jadwal').attr('readonly',true);
	// 	// $.ajax({

	// 	// 	type:"POST",
	// 	// 	url:str_url,
	// 	// 	dataType:"html",
	// 	// 	success:function(data){
				
	// 	// 		var data = $.parseJSON(data);
	// 			$('#id_thn_ajar').val(id_thn_ajar);
	// 			$('#select_kelas').val(kode_kelas+'#'+nama+'#'+tingkat+'#'+tipe_kelas);
	// 			$('#hide_Kurikulum').val(id_thn_ajar);
	// 			$('#santri').val(santri);
	// 			$('#semester').val(semester);
	// 			$('#kode_kelas').val(kode_kelas);
	// 			$('#tingkat').val(tingkat);
	// 			$('#tipe_kelas').val(tipe_kelas);

	// 			//read only text box
	// 			// $('#id_thn_ajar').attr('disabled',true);
	// 			// $('#select_kelas').attr('disabled',true);
	// 			// $('#semester').attr('disabled',true);
	// 			// $('#santri').attr('disabled',true);
				
				
	// 			$('#Modal_add_jadwal_pelajaran').modal('show');
				
	// 			// //add to table
	// 			// var id_thn_ajar = $('#id_thn_ajar').val();
	// 			// var semester 	= $('#semester').val();
	// 			// var tingkat 	= $('#tingkat').val();
	// 			// var tipe_kelas 	= $('#tipe_kelas').val();
	// 			// var id_thn_ajar = $('#id_thn_ajar').val();
	// 			// var semester 	= $('#semester').val();
	// 			// var tingkat 	= $('#tingkat').val();
	// 			// var tipe_kelas 	= $('#tipe_kelas').val();
	// 			var kdrow 	= makeid();
				
	// 			var str_url  	= encodeURI(base_url+"jadwal_pelajaran/GetKurikulum/"+id_thn_ajar+"/"+semester+"/"+tingkat+"/"+tipe_kelas);
	// 			$.ajax({
					
	// 				type:"POST",
	// 				url:str_url,
	// 				dataType:"html",
	// 				success:function(data)
	// 				{
	// 					var data = $.parseJSON(data);
	// 					var LengtData = data.length;
	// 					// if (LengtData == 0){
	// 					// 	$('#tb_mata_pelajaran tbody').html('');
	// 					// 	$('#tb_mata_pelajaran > tbody').html('"<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>"');
	// 					// 	bootbox.alert('Tidak ada data, silahkan Cek Kurikulum!');
	// 					// }
	// 					// else
	// 					// {
							
							
	// 						for(i=0;i<LengtData;i++)
	// 						{
	// 							if (semester == 1)
	// 								{
	// 									var sm = data[i].sm_1;
	// 								}
	// 								else if (semester ==2)
	// 								{
	// 									var sm = data[i].sm_2;
	// 								}
	// 							for(y=0;y<sm;y++)
	// 							{
	// 								var hari = 'txthari_'+data[i].id_mapel+y+i;
	// 								var guru = 'txtguru_'+data[i].id_mapel+y+i;
	// 								var jam = 'txtjam_'+data[i].id_mapel+y+i;
	// 								var content_data 	= '<tr class="tb-detail" id="row'+kdrow+'">';
	// 								content_data 	+= "<td>"+data[i].nama_matpal+"</td>"; //mata pelajaran
	// 								content_data 	+= '<td><select class="form-control" name="'+hari+'" id="'+hari+'" >'
	// 													+'<option value="">Pilih Hari</option>'
	// 													+'<option value="SENIN">SENIN</option>'
	// 													+'<option value="SELASA">SELASA</option>'
	// 													+'<option value="RABU">RABU</option>'
	// 													+'<option value="KAMIS">KAMIS</option>'
	// 													+'<option value="JUMAT">JUMAT</option>'
	// 													+'<option value="SABTU">SABTU</option>'
	// 													+'<option value="AHAD">AHAD</option>'
	// 													+'</select></td>'; //hari
	// 								content_data 	+= '<td><select class="form-control" name="'+guru+'" id="guru" >'
	// 													+'<option value="">-Pilih Guru-</option>'
	// 													+'<option value="1">G001</option>'
	// 													+'<option value="2">G002</option>'
	// 													+'<option value="3">G003</option>'
	// 													+'</select></td>'; //Guru
	// 								content_data 	+= '<td><select class="form-control" name="'+jam+'" id="hari" >'
	// 													+'<option value="">-Pilih Jam-</option>'
	// 													+'<option value="I">I</option>'
	// 													+'<option value="II">II</option>'
	// 													+'<option value="III">III</option>'
	// 													+'<option value="IV">IV</option>'
	// 													+'<option value="V">V</option>'
	// 													+'<option value="VI">VI</option>'
	// 													+'</select></td>'; //JAM
	// 								content_data 	+= "</tr>";

									
												
	// 								if(y<1 && i<1){
										
	// 									$('#tb_mata_pelajaran tbody').html(content_data);
	// 								}
	// 								else{

	// 									$('#tb_mata_pelajaran tbody').append(content_data);
	// 								}

	// 								$('#'+hari).val(dataS['hari']);
	// 							}
								
	// 						}
	// 					// }
								
	// 				}
	// 			});
				
	// 		// }
	// 	// });
	
// }

function hapus(kode_kelas,santri,id_thn_ajar,deskripsi,semester){
	var str_url  	= encodeURI(base_url+"jadwal_pelajaran/Deljadwal_pelajaran/"+kode_kelas+'/'+santri+'/'+id_thn_ajar+'/'+semester);
	bootbox.confirm("Anda yakin akan menghapus Mata Pelajaran kurikulum "+deskripsi+", Kode Kelas "+kode_kelas+", Santri "+santri+", dan semester "+semester+"  ini ?",
		function(result){
			if(result==true){				
			$.ajax({
			type:"POST",
			url:str_url,
			dataType:"html",
			success:function(data){
					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Berhasil dihapus",
						size: 'small',
						callback: function () {

							window.location = base_url+'jadwal_pelajaran';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_kodejadwal_pelajaran').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'jadwal_pelajaran/exportexcel/'+param;
}

// function CekDuplicate(id_jadwal){
	// 	$.ajax({

	// 		type:"POST",
	// 		url:base_url+"jadwal_pelajaran/get_data_jadwal_pelajaran/"+id_jadwal,
	// 		dataType:"html",
	// 		success:function(data){				
	//             var data =	 $.parseJSON(data)
	// 		}
	// 	});
	
// }
