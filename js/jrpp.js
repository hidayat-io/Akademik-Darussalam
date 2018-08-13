// //load
$(document).ready(function()
{

	setTable();
	$(".select2").select2({
		dropdownParent: $('#Modal_add_rpp')
		// dropdownParent: parentElement
	});
	// addrpp();
	$('.datepicker').datepicker(
	{
		rtl: App.isRTL(),
		orientation: "left",
		autoclose: true,
		format: 'dd-mm-yyyy'
	});
	
	validate_add_rpp();

	$('.numbers-only').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
			if ((charCode >= 48 && charCode <= 57)
				|| charCode == 46
				|| charCode == 44
				|| charCode == 8)
				return true;
		return false;
	});


});

var validate_add_rpp = function () {

	var form = $('#add_rpp');
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

function clearvalidate_add_rpp() {

	$("#add_rpp div").removeClass('has-error');
	$("#add_rpp i").removeClass('fa-warning');
	$("#add_rpp div").removeClass('has-success');
	$("#add_rpp i").removeClass('fa-check');

	document.getElementById("add_rpp").reset();
}

function add_tohide()
{
	$id_thn_ajar = $('#id_thn_ajar').val();
	$('#hide_Kurikulum').val($id_thn_ajar);
}

function add_tohidekelas()
{
	$item  	= $('#id_kelas').val();
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
			'url':base_url+"rpp/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
		columnDefs:[{
			targets: [6],
			orderable : false,
		}]
    } );
}

function kosong_table()
{
	$('#tb_list_rpp tbody').html('');
	$('#tb_list_rpp tbody').html('"<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>"');
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
	else if ($("#id_kelas").val() == '')
    {
        bootbox.alert("Pilih Dulu Kelas");
    }
    else if($("#santri").val() == '')
    {
        bootbox.alert("Pilih Dulu Santri");
    }
	else if ($("#id_guru").val() == '')
    {
        bootbox.alert("Pilih Dulu Guru");
    }
    else
    {   
		var id_thn_ajar 	= $('#id_thn_ajar').val();
		var semester 		= $('#semester').val();
		var tingkat 		= $('#tingkat').val();
		var tipe_kelas 		= $('#tipe_kelas').val();
		var santri 			= $('#santri').val();
		var id_guru 		= $('#id_guru').val();
		var kode_kelas 		= $('#kode_kelas').val();
		var mt_pelajaran 	= $('#mt_pelajaran').val();
		var kdrow 			= makeid();
		var str_url			 = encodeURI(base_url + "rpp/GetRPPTambah/" + id_thn_ajar + "/" + semester + "/" + tingkat + "/" + tipe_kelas + "/" + santri + "/" + id_guru + "/" + kode_kelas + "/" + mt_pelajaran);
		$.ajax({
			
			type:"POST",
			url:str_url,
			dataType:"html",
			success:function(data)
			{
				var data = $.parseJSON(data);
				var LengtData = data.length;
				if (LengtData == 0){
					$('#tb_list_rpp tbody').html('');
					$('#tb_list_rpp > tbody').html('"<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>"');
					bootbox.alert('Tidak ada data, silahkan Cek Kurikulum Atau Jadwal Pelajaran!');
				}
				else
				{

					var kdrow = makeid();
					$('#tb_list_rpp tbody').html('');
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
						var materi_pokok = 'txt_mpokok'+data[i].minggu+data[i].hari+i;
						var waktu = 'txt_waktu'+data[i].minggu+data[i].hari+i;
						var tiu = 'txt_tiu'+data[i].minggu+data[i].hari+i;
						var pr = 'txt_pr'+data[i].minggu+data[i].hari+i;
						var content_data 	= '<tr class="tb-detail" id="row'+kdrow+'">';
							content_data 	+= "<td>"+data[i].bulan+"</td>"; //mata pelajaran
							content_data 	+= '<td>'+data[i].minggu+'</td>'; //Minggu
							content_data 	+= '<td>'+data[i].hari+'/'+data[i].jam+'</td>'; //Hari/Hissoh
							content_data 	+= '<td><div class="form-group"><input type="text" class="form-control" name="'+materi_pokok+'" id="'+materi_pokok+'" onkeydown="OtomatisKapital(this)" required></div></td>'; //Materi Pokok
						content_data += '<td><div class="form-group"><input type="text" class="form-control" name="' + waktu + '" id="' + waktu +'" onkeydown="OtomatisKapital(this)" required></div></td>'; //Waktu
						content_data += '<td><div class="form-group"><input type="text" class="form-control" name="' + tiu + '" id="' + tiu +'" onkeydown="OtomatisKapital(this)" required></div></td>'; //TIU/TIK
						content_data += '<td><div class="form-group"><input type="text" class="form-control" name="' + pr + '" id="' + pr +'" onkeydown="OtomatisKapital(this)"  required></div></td>'; //Jenis Tagihan PR/UH HP / PK								
							content_data 	+= "</tr>";
										
							if(i<1){
								
								$('#tb_list_rpp tbody').html(content_data);
							}
							else{

								$('#tb_list_rpp tbody').append(content_data);
							}											
					}
				}
			}
		});
        
	}
	
}

function kosong(){
	//disable
		$('#mt_pelajaran').prop("disabled", false);
		$('#id_kelas').prop("disabled", false);
		$('#id_guru').prop("disabled", false);
		$('#semester').attr("disabled", false);
		$('#id_thn_ajar').attr("disabled", false);
		$('#santri').attr("disabled", false);
		$('#id_thn_ajar').val('');
		$('#id_guru').val(null).trigger('change');
		$('#id_kelas').val(null).trigger('change');
		$('#mt_pelajaran').val(null).trigger('change');
		$('#semester').val('');
		$('#id_kelas').val('');
		$('#tingkat').val('');
		$('#tipe_kelas').val('');
		$('#santri').val('');
		$('#mt_pelajaran').val('');
		$('#tb_list_rpp tbody').html('');
		
}

function svrpp(){	
	if($("#add_rpp").valid()==true){
		var lengtable = $('.tb-detail').length;
		if (lengtable == 0){
		bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>RPP list masih kosong </div>");
		return false;
		}

        $mt_pelajaran 		= $('#mt_pelajaran').val();
        $santri 			= $('#santri').val();
		$id_guru 			= $('#id_guru').val();
        $id_thn_ajar 		= $('#id_thn_ajar').val();
        $semester 			= $('#semester').val();
        $kode_kelas 		= $('#kode_kelas').val();
		$status 			= $('#save_button').text();
		var str_url 		= encodeURI(base_url + "rpp/cek_duplicate_data/" + $id_thn_ajar + "/" + $santri + "/" + $id_guru + "/" + $semester+"/"+$kode_kelas+"/"+$mt_pelajaran);
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
                    var iform = $('#add_rpp')[0];
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
                        url:base_url+"rpp/simpan_rpp/"+$status,
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

                                    window.location = base_url+'rpp';
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

function addrpp(){
	document.getElementById("add_rpp").reset();
    $('#save_button').text('SAVE');
	kosong();
	$('#button_refresh').attr('disabled',false);
	$('#Modal_add_rpp').modal('show');
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(id_rpp, kode_kelas, tingkat, tipe_kelas, nama, santri, id_thn_ajar, deskripsi, semester, id_guru, id_mapel){
	$('#save_button').text('UPDATE');
	$('#button_refresh').attr('disabled',true);
	
	$('#id_rpp_hide').val(id_rpp);
	$('#id_thn_ajar').val(id_thn_ajar);
	$('#id_kelas').val(kode_kelas+'#'+nama+'#'+tingkat+'#'+tipe_kelas);
	$('#id_kelas').trigger('change');
	$('#hide_Kurikulum').val(id_thn_ajar);
	$('#santri').val(santri);
	$('#semester').val(semester);
	$('#id_guru').val(id_guru);
	$('#id_guru').trigger('change');
	$('#kode_kelas').val(kode_kelas);
	$('#tingkat').val(tingkat);
	$('#tipe_kelas').val(tipe_kelas);
	$('#mt_pelajaran').val(id_mapel);
	$('#mt_pelajaran').trigger('change');

	//disable
	$('#mt_pelajaran').prop("disabled", true);
	$('#id_kelas').prop("disabled", true);
	$('#id_guru').prop("disabled", true);
	$('#semester').attr("disabled", true);
	$('#id_thn_ajar').attr("disabled", true);
	$('#santri').attr("disabled", true);
		
	$('#Modal_add_rpp').modal('show');
	
	$('#tb_list_rpp tbody').html('');
	var kdrow 	= makeid();
	
	var str_url  	= encodeURI(base_url+"rpp/GetRPP/"+id_rpp);
	$.ajax({
		
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data)
		{
			var data = $.parseJSON(data);
			var LengtData = data.length;
			if (LengtData == 0){
				$('#tb_list_rpp tbody').html('');
				$('#tb_list_rpp > tbody').html('"<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>"');
				bootbox.alert('Mungkin Data sudah dihapus oleh user lain, silahkan tekan F5!');
			}
			else
			{

				var kdrow = makeid();
				$('#tb_list_rpp tbody').html('');
				for(i=0;i<LengtData;i++)
				{
					
					var materi_pokok = 'txt_mpokok'+data[i].minggu+data[i].hari+i;
					var waktu = 'txt_waktu'+data[i].minggu+data[i].hari+i;
					var tiu = 'txt_tiu'+data[i].minggu+data[i].hari+i;
					var pr = 'txt_pr'+data[i].minggu+data[i].hari+i;
					var content_data 	= '<tr class="tb-detail" id="row'+kdrow+'">';
						content_data 		+= "<td>"+data[i].bulan+"</td>"; //mata pelajaran
						content_data 	+= '<td>'+data[i].minggu+'</td>'; //Minggu
						content_data 	+= '<td>'+data[i].hari+'/'+data[i].hissos+'</td>'; //Hari/Hissoh
						content_data 	+= '<td><input type="text" class="form-control" name="'+materi_pokok+'" id="'+materi_pokok+'" onkeydown="OtomatisKapital(this)" value="'+data[i].materi_pokok+'"></td>'; //Materi Pokok
						content_data 	+= '<td><input type="text" class="form-control" name="'+waktu+'" id="'+waktu+'" onkeydown="OtomatisKapital(this)" value="'+data[i].alokasi_waktu+'" ></td>'; //Waktu
						content_data 	+= '<td><input type="text" class="form-control" name="'+tiu+'" id="'+tiu+'" onkeydown="OtomatisKapital(this)" value="'+data[i].TIU+'"TIU></td>'; //TIU/TIK
						content_data 	+= '<td><input type="text" class="form-control" name="'+pr+'" id="'+pr+'" onkeydown="OtomatisKapital(this)" value="'+data[i].jns_tagihan+'"></td>'; //Jenis Tagihan PR/UH HP / PK								
						content_data 	+= "</tr>";
									
						if(i<1){
							
							$('#tb_list_rpp tbody').html(content_data);
						}
						else{

							$('#tb_list_rpp tbody').append(content_data);
						}											
				}
			}
					
		}
	});
	
}

function hapus(id_rpp){
	var str_url  	= encodeURI(base_url+"rpp/Delrpp/"+id_rpp);
	bootbox.confirm("Anda yakin akan dihapus?",
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

							window.location = base_url+'rpp';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_koderpp').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'rpp/exportexcel/'+param;
}