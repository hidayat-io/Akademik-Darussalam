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
	$( "#add_semester" ).validate({
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
    
    $( "#add_bulan" ).validate({
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
        "bPaginate": false,
        "info": false,
		"searching": false,
		"bFilter":false,
		ajax: {
			'url':base_url+"semester/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
    } );
}

function kosong(){
		$('#nomor_statistik').val('');
		$('#id_semester').val('');
		$('#NPSN').val('');
		$('#nama').val('');
		$('#jenis_lembaga').val('');
}

function svsemester(){
	if($("#add_semester").valid()==true){
        $semester = $('#txt_semester').val();
		$status = $('#save_button').text();
        var item_data_tb_list_bulan = "";                    
        var oTable 		= document.getElementById('tb_list_bulan');
        var rowLength 	= oTable.rows.length;
        var isitableMatpal = $('#hid_jumlah_item_Matpal').val();

        if(isitableMatpal ==0){
            rowLength 	= rowLength-2;
        }else{
            rowLength 	= rowLength-1;
        }
            

        for (i = 1; i <= rowLength; i++)
        {

            var irow = oTable.rows.item(i);

            item_data_tb_list_bulan += irow.cells[1].innerHTML+"#"; //bulan


            item_data_tb_list_bulan += ';';
            
        }

        $('#hid_table_item_bulan').val(item_data_tb_list_bulan);
        var iform = $('#add_semester')[0];
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
            url:base_url+"semester/simpan_semester/"+$status,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: false,
            data:data,
            success:function(data){

                bootbox.alert({
                    message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;"+msg+"!!",
                    size: 'small',
                    callback: function () {

                        window.location = base_url+'semester';
                    }
                });
            }
        });
    }
}

function OtomatisKapital(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

function edit(semester){
    $('#tb_list_bulan tbody').html('');
    $.ajax({
        
        type:"POST",
        url:base_url+"semester/get_data_bulan/"+semester,
        dataType:"html",
        success:function(data){

            var data = $.parseJSON(data);

                $.each(data, function (index, value) {
					var bln = {'1' : 'Januari', '2' : 'Februari', '3' : 'Maret', '4' : 'April', '5' : 'Mei', '6' : 'Juni', '7' : 'Juli', '8' : 'Agustus', '9' : 'September', '10' : 'Oktober', '11' : 'November', '12' : 'Desember'};
                    var bulan = bln[value['bulan']];
                    var row_count 	= $('#tb_list_bulan tr.tb-detail').length;
                    var content_data 	= '<tr class="tb-detail"id="row'+bulan+'">';
                        content_data 	+= "<td>"+(row_count+1)+"</td>";
                        content_data 	+= "<td class='hidden'>"+value['bulan']+"</td>";
                        content_data 	+= "<td>"+bulan+"</td>";
                        content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
                        content_data 	+= ' onclick="hapusItembulan(\''+bulan+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
                        content_data 	+= "</tr>";

                    if(row_count<1){

                $('#tb_list_bulan tbody').html(content_data);
            }
            else{

                $('#tb_list_bulan tbody').append(content_data);
            }

            $("#hid_jumlah_item_bulan").val(row_count+1);
            urutkanNomorbulan();
                });
        }
    });

    $('#save_button').text('UPDATE');
    $('#txt_semester').val(semester);
    $('#txt_semester').attr('readonly',true);
    $('#Modal_add_semester').modal('show');
}

function addBulan(){
    $('#Modal_add_bulan').modal('show');
}

function TambahBulan(){
	if($("#add_bulan").valid()==true)
	{
		var semester 				= $('#txt_semester').val()
		var bulan 				    = $('#bulan').val()
		var hid_jumlah_item 		= $('hid_jumlah_item_bulan').val()


		if(cekItembulan(bulan)==true){
						
			var str_url = encodeURI(base_url +"semester/cek_data_bulan/"+bulan);
			$.ajax({
				type:"POST",
				url:str_url,
				dataType:"html",
				success:function(data){	
					$data = $.parseJSON(data);
						if($data != null)
						{							
                            bootbox.alert("Bulan di semester lain sudah ada");
                            return false;
							
						}
						else
						{
							var bln 			= { '1': 'Januari', '2': 'Februari', '3': 'Maret', '4': 'April', '5': 'Mei', '6': 'Juni', '7': 'Juli', '8': 'Agustus', '9': 'September', '10': 'Oktober', '11': 'November', '12': 'Desember' };
							var bulanH 			= bln[bulan];
							var row_count 		= $('#tb_list_bulan tr.tb-detail').length;
							var content_data 	= '<tr class="tb-detail" id="row'+bulan+'">';
								content_data 	+= "<td>"+(row_count+1)+"</td>";
								content_data 	+= "<td class='hidden'>" + bulan + "</td>";
								content_data 	+= "<td>" + bulanH + "</td>";
								content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
								content_data 	+= ' onclick="hapusItembulan(\''+bulan+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
								content_data 	+= "</tr>";

							if(row_count<1){

								$('#tb_list_bulan tbody').html(content_data);
							}
							else{

								$('#tb_list_bulan tbody').append(content_data);
							}

							$("#hid_jumlah_item_bulan").val(row_count+1);
							urutkanNomorbulan();

							$('#Modal_add_bulan').modal('hide');
						}
					}
				});
				
		}
		else{

			bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;Bulan di semester "+semester+" sudah ada atau bulan tidak urut");
		}
	}
}

function urutkanNomorbulan(){
    
    var oTable = document.getElementById('tb_list_bulan');

    //hitung table row
    var rowLength = oTable.rows.length;
        rowLength = rowLength-1;

    //urutkan nomor per row
    for (i = 1; i <= rowLength; i++){

        oTable.rows.item(i).cells[0].innerHTML = i;
    }
}

function cekItembulan(i_bulan){
    var oTable      = document.getElementById('tb_list_bulan');
    var rowLength   = oTable.rows.length;
    var itemcount   = $("#hid_jumlah_item_bulan").val();
	rowLength = rowLength-1;
	var nextbulan = parseInt(oTable.rows.item(itemcount).cells[1].innerHTML) +1;

    if(itemcount=="0"){ //jika item kosong

        return true;
	}
    else{

        for (i = 1; i <= rowLength; i++)
        {
            var bulan = oTable.rows.item(i).cells[1].innerHTML;
            // print(kode_kategori);
            if(bulan==i_bulan){

                    return false;
            }
		}
		if (nextbulan != i_bulan) {
			return false;
		}
        return true;
    }
}

function hapusItembulan(bulan){

		bootbox.confirm("Anda yakin akan menghapus item ini ?",
		function(result){
			if(result==true){

				$('#row'+bulan).remove();
				urutkanNomorbulan();

				var row_count = $('#tb_list_bulan tr.tb-detail').length					;

				$("#hid_jumlah_item_bulan").val(row_count); //simpan jumlah item


				if(row_count<1){

					var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
					$('#tb_list_bulan tbody').append(content_data);
				}
			}
		}
	);
}
