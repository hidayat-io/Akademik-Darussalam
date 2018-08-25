// //load
$(document).ready(function()
{
	setTable();
	$('.datepicker').datepicker(
	{
		rtl: App.isRTL(),
		orientation: "left",
		autoclose: true,
		format: 'dd-mm-yyyy'
    });

    $(".select2").select2();
    // pilihItem();
	$('.numbers-only').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
			if ((charCode >= 48 && charCode <= 57)
				|| charCode == 46
				|| charCode == 44
				|| charCode == 8)
				return true;
		return false;
	});

	//validasi form modal add bidang Studi
	$( "#add_bidstudi" ).validate({
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

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"bidstudi/load_grid",
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
    var id_bidang 	    = $('#s_id_bidang').val();
    var nama_bidang 	= $('#s_namalengkap').val();
	var param 			= {'id_bidang':id_bidang};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function kosong(){
		$('#id_bidang').val('');
		$('#nama_bidang').val('');
}

function svbidstudi(){
	if($("#add_bidstudi").valid()==true){
		//cekk table mata pelajaran
		if ($('#hid_jumlah_item_Matpal').val() == 0){
			bootbox.alert("Data List Mata Pelajaran Tidak Boleh Kosong");
			return false;
		}
				$id_bidang = $('#id_bidang').val();
				$status = $('#save_button').text();
				var str_url  	= encodeURI(base_url+"bidstudi/get_data_bidstudi/"+$id_bidang);
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
							//data matapelajaran
							var item_data_tb_list_Matpal = "";

							var oTable 		= document.getElementById('tb_list_Matpal');
							var rowLength 	= oTable.rows.length;
							var isitableMatpal = $('#hid_jumlah_item_Matpal').val();
								if(isitableMatpal ==0){
									rowLength 	= rowLength-2;
								}else{
									rowLength 	= rowLength-1;
								}
								

							for (i = 1; i <= rowLength; i++){

								var irow = oTable.rows.item(i);

								item_data_tb_list_Matpal += irow.cells[1].innerHTML+"#"; //idmatapelajaran
								item_data_tb_list_Matpal += irow.cells[2].innerHTML+"#"; //nama mata pelajaran
								item_data_tb_list_Matpal += irow.cells[3].innerHTML+"#"; //status


								item_data_tb_list_Matpal += ';';
								
							}
							$('#hid_table_item_Matpal').val(item_data_tb_list_Matpal);
							var iform = $('#add_bidstudi')[0];
							var data = new FormData(iform);
							if ($status == 'UPDATE')
								{
									msg="Update Data Berhasil"
								}
								else
								{
									msg="Simpan Data Berhasil"
								}
							if (document.getElementById('r_utama').checked) {
								var rbutton = document.getElementById('r_utama').value;
								}	
								else if (document.getElementById('r_sore').checked) {
								var rbutton = document.getElementById('r_sore').value;								
								}
								else if (document.getElementById('r_kitab').checked) {
								var rbutton = document.getElementById('r_kitab').value;								
								}
							$.ajax({

								type:"POST",
								url:base_url+"bidstudi/simpan_bidstudi/"+$status+"/"+rbutton,
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

											window.location = base_url+'bidstudi';
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

function addbidstudi(){
    kosong();
    // $('#spansearchclose').hide();
    // $('#hiddenidbid').hide();
	$('#save_button').text('SAVE');	
	$('#id_bidang').attr('readonly',false);
	$('#tb_list_Matpal tbody').html('');
	$("#hid_jumlah_item_Matpal").val(0);
    // $('#status').val('1');
	$('#Modal_add_bidstudi').modal('show');
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(id_bidang){
	var str_url  	= encodeURI(base_url+"bidstudi/get_data_bidstudi/"+id_bidang);
    $('#save_button').text('UPDATE');
    $('#id_bidang').attr('readonly',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#id_bidang').val(data['id_bidang']);
			$('#nama_bidang').val(data['nama_bidang']);

			if (data['kategori'] == "UTAMA")
			{
				$('#r_utama').prop("checked", true)
			}	
			else if (data['kategori'] == "SORE")
			{
				$('#r_sore').prop("checked", true)
			}
			
            
		}
	});
	//show matapelajaran
	$('#tb_list_Matpal tbody').html('');
	var str_url  	= encodeURI(base_url+"bidstudi/get_data_matpal/"+id_bidang);
	$.ajax({

		type:"POST",
		url:base_url+"bidstudi/get_data_matpal/"+id_bidang,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {

				$.each(data, function (index, value) {
					if(value['status']==1){
						status = "AKTIF";
					}
					else{
						status = "TIDAK AKTIF";
					}
					var row_count 	= $('#tb_list_Matpal tr.tb-detail').length;
					var content_data 	= '<tr class="tb-detail" id="row'+value['id_matpal']+'">';
						content_data 	+= "<td>"+(row_count+1)+"</td>";
						content_data 	+= "<td>"+value['id_matpal']+"</td>";
						content_data 	+= "<td>"+value['nama_matpal']+"</td>";
						content_data 	+= "<td>"+status+"</td>";
						content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
						content_data 	+= ' onclick="hapusItemMatpal(\''+value['id_matpal']+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
						content_data 	+= "</tr>";

					if(row_count<1){

					$('#tb_list_Matpal tbody').html(content_data);
				}
				else{

				$('#tb_list_Matpal tbody').append(content_data);
			}

			$("#hid_jumlah_item_Matpal").val(row_count+1);
			urutkanNomorMatpal();
				});
		}
	});

	$('#Modal_add_bidstudi').modal('show');
	
}

function hapus(id_bidang){
	var str_url  	= encodeURI(base_url+"bidstudi/Delbidstudi/"+id_bidang);
	bootbox.confirm("Anda yakin akan menghapus "+id_bidang+" ini ?",
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

							window.location = base_url+'bidstudi';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_id_bidang').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'bidstudi/exportexcel/'+param;
}

function kosong_Matpal(){
		$('#id_matpal').val('');
		$('#nama_matpal').val('');
		$('#id_bidangstudi').val('');
		$('#status').val('');
}

function addmata_pelajaran(){
	kosong_Matpal();
	$('#status').val('1');
	$('#Modal_add_mata_pelajaran').modal('show');
}

function TambahMatpal(){
	if($("#add_mata_pelajaran").valid()==true)
	{
		var id_matpal 				= $('#id_matpal').val()
		var nama_matpal 			= $('#nama_matpal').val()
		// var rbutton					= $('optionsRadios').filter(':checked').attr('value');
		var status 					= $('#status').val()
		var hid_jumlah_item 		= $('#hid_jumlah_item_Matpal').val()
		
		if (document.getElementById('r_utama').checked) {
			var rbutton = document.getElementById('r_utama').value;
		  }	
		  else if (document.getElementById('r_sore').checked) {
			var rbutton = document.getElementById('r_sore').value;
		  
		  }


		if(cekItemMatpal(id_matpal)==true){
			if (status ==1){
				status = "AKTIF"
			}
			else{
				status = "TIDAK AKTIF"
			}
				//cek di table mata pelajaran sudah ada atau belum
				// $id_matpal 		= $('#id_matpal').val();
				// $nama_matpal 	= $('#nama_matpal').val();
				var str_url  	= encodeURI(base_url+"bidstudi/get_data_mata_pelajaran/"+id_matpal+"/"+nama_matpal+"/"+rbutton);
			$.ajax({
				type:"POST",
				url:str_url,
				dataType:"html",
				success:function(data){	
					$data = $.parseJSON(data);
						if($data != null)
						{
							if( $data['id_matpal'] == $('#id_matpal').val()){
									bootbox.alert("ID Mata Pelajaran sudah ada di database!!");
									return false;
								
							}
							else if( $data['nama_matpal'] == $('#nama_matpal').val() && $data['kategori'] == rbutton){
								bootbox.alert("Nama Mata Pelajaran dengan kategori "+rbutton+" sudah ada di database!!");
								return false;
							
							}
							
						}
						else
						{
							var row_count 		= $('#tb_list_Matpal tr.tb-detail').length;
							var content_data 	= '<tr class="tb-detail" id="row'+id_matpal+'">';
								content_data 	+= "<td>"+(row_count+1)+"</td>";
								content_data 	+= "<td>"+id_matpal+"</td>";
								content_data 	+= "<td>"+nama_matpal+"</td>";
								content_data 	+= "<td>"+status+"</td>";
								content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
								content_data 	+= ' onclick="hapusItemMatpal(\''+id_matpal+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
								content_data 	+= "</tr>";

							if(row_count<1){

								$('#tb_list_Matpal tbody').html(content_data);
							}
							else{

								$('#tb_list_Matpal tbody').append(content_data);
							}

							$("#hid_jumlah_item_Matpal").val(row_count+1);
							urutkanNomorMatpal();

							$('#Modal_add_mata_pelajaran').modal('hide');
						}
					}
				});
				
		}
		else{

			bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;"+id_matpal+" sudah ada di List.");
		}
	}
}

function urutkanNomorMatpal(){

	var oTable = document.getElementById('tb_list_Matpal');

	//hitung table row
	var rowLength = oTable.rows.length;
		rowLength = rowLength-1;

	//urutkan nomor per row
	for (i = 1; i <= rowLength; i++){

		oTable.rows.item(i).cells[0].innerHTML = i;
	}
}

function cekItemMatpal(i_id_matpal){
		var oTable  	= document.getElementById('tb_list_Matpal');
		var rowLength = oTable.rows.length;
		var itemcount = $('#hid_jumlah_item_Matpal').val();
		rowLength = rowLength-1;

		if(itemcount=="0"){ //jika item kosong

			return true;
		}
		else{

			for (i = 1; i <= rowLength; i++)
			{
				var id_matpal = oTable.rows.item(i).cells[1].innerHTML;
				// print(kode_kategori);
				if(id_matpal==i_id_matpal){

						return false;
				}
			}
			return true;
		}
}

function hapusItemMatpal(row_id){

		bootbox.confirm("Anda yakin akan menghapus item ini ?",
		function(result){
			if(result==true){

				$('#row'+row_id).remove();
				urutkanNomorMatpal();

				var row_count = $('#tb_list_Matpal tr.tb-detail').length					;

				$('#hid_jumlah_item_Matpal').val(row_count); //simpan jumlah item


				if(row_count<1){

					var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
					$('#tb_list_Matpal tbody').append(content_data);
				}
			}
		}
	);
}

function RB_action()
{
	if ($('#save_button').text() == "SAVE")
		{
			kosong();
			$('#tb_list_Matpal tbody').html('');
		}	
}