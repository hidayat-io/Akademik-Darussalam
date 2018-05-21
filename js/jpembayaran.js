// //load
$(document).ready(function()
{
    setTable();
    $(".select2").select2();
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
	$('#total_tagihan').maskMoney({ precision: 0 });
	$('#sisa_tagihan').maskMoney({ precision: 0 });
	$('#jumlah_bayar').maskMoney({ precision: 0 });
	validate_add_pembayaran ();
	//fungsi key enter
	$("#no_registrasi").keyup(function (event) {
		if (event.keyCode === 13) {
			idregisshow();
		}
	});

	//untuk setfocus no reistrasi on modal show
	$("#Modal_add_daftarulang").on('shown.bs.modal', function () {
		$(this).find('#no_registrasi').focus();
	});

});

function OtomatisKapital(a) {
	setTimeout(function () {
		a.value = a.value.toUpperCase();
	}, 1);
}

function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"pembayaran/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		 },
		 columnDefs: [
			 { width: 20, targets: 0 },
			 { width: 20, targets: 1 },
			 { width: 100, targets:2 },
			 {
				 targets: [3],         //action
				 orderable: false,
				 width: 10
			 }
		 ],
	 });
}

//#region Add Pembayran
var validate_add_pembayaran = function () {

	var form = $('#add_pembayaran');
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

function clearvalidate_add_pembayaran() {

	$("#add_pembayaran div").removeClass('has-error');
	$("#add_pembayaran i").removeClass('fa-warning');
	$("#add_pembayaran div").removeClass('has-success');
	$("#add_pembayaran i").removeClass('fa-check');

	document.getElementById("add_pembayaran").reset();
}

function idregisshow() {
	if ($('#no_registrasi').val() == '') {
		bootbox.alert({
			message: "Masukan No Registrasi",
			title: "<span class='glyphicon glyphicon-remove-sign'></span>&nbsp;ERROR",
			size: 'small',
			callback: function () {
				// $('#no_registrasi').focus();
				setTimeout(function () { $('#no_registrasi').focus(); }, 100);
			}
		});
	} else {
		var no_registrasi = $('#no_registrasi').val();
		var tipe_pembayaran = $('input[name=tipe_pembayaran]:checked').val();
		var semester_pembayaran = $('input[name=semester]:checked').val();
		var str_url = encodeURI(base_url + "pembayaran/get_data_pembayaran/" + no_registrasi + "/" + tipe_pembayaran + "/" + semester_pembayaran);
		$.ajax({

			type: "POST",
			url: str_url,
			dataType: "html",
			success: function (data) {

				var data = $.parseJSON(data);
				if (data != '') {
					var ilength = data.length;
					
					$('#no_registrasi').attr('readonly', true);
					var button = document.getElementById("save_button");
					button.disabled = false;
					$('#spansearchregis').hide();
					$('#spansearchcloseregis').show();
					$('#tipe_pembayaran_semester').attr('disabled', true);
					$('#tipe_pembayaran_bulanan').attr('disabled', true);
					$('#semester_satu').attr('disabled', true);
					$('#semester_dua').attr('disabled', true);
					$('#nama').val(data[0].nama_lengkap);

					//jika bayar semester
					if(tipe_pembayaran =='S'){
						
						$('#data_pembayaran_semester').show();
						$('#total_tagihan').val(data[0].total_tagihan);
						var id_tagihan = data[0].id_tagihan;
						$('#id_tagihan').val(id_tagihan);
						//#region get sisa tagihan
						var str_url = encodeURI(base_url + "pembayaran/get_sisa_potongan/" + no_registrasi + "/" + id_tagihan);
						$.ajax({

							type: "POST",
							url: str_url,
							dataType: "html",
							success: function (data_tagihan) {

								var data_tagihan = $.parseJSON(data_tagihan);
								if (data_tagihan['total_pembayaran'] != null) {
									var ilength = data_tagihan.length;
									var total_tagihan = data[0].total_tagihan;
									var total_pembayaran = data_tagihan['total_pembayaran'];
									var sisa_pembayaran = total_tagihan - total_pembayaran;
									$('#sisa_tagihan').val(sisa_pembayaran);
									// for (i = 0; i < ilength; i++) {
									// }



								}
								else {
									$('#sisa_tagihan').val(data[0].total_tagihan);

								}
							}
						});
						//#endregion get sisa tagihan

								
					}else{ //jika bayar bulanan
						
						$('#data_pembayaran_bulanan').show();
						bootbox.alert("onprosess");
					}
					
				}
				else {
					bootbox.alert({
						message: "No Registrasi yang dimasukan tidak ada, atau belum daftar ulang",
						title: "<span class='glyphicon glyphicon-remove-sign'></span>&nbsp;Tidak Ada Data",
						size: 'small',
						callback: function () {
							// $('#no_registrasi').focus();
							setTimeout(function () { $('#no_registrasi').focus(); }, 100);
						}
					});

				}
			}
		});

	}

}

function idregishide() {
	clearvalidate_add_pembayaran();
	$('#no_registrasi').attr('readonly', false);
	setTimeout(function () { $('#no_registrasi').focus(); }, 1);
	var button = document.getElementById("save_button");
	button.disabled = true;
	$('#no_registrasi').val('');
	$('#nama').val('');
	$('#spansearchregis').show();
	$('#spansearchcloseregis').hide();
	$('#data_pembayaran_semester').hide();
	$('#data_pembayaran_bulanan').hide();
	$('#tipe_pembayaran_semester').attr('disabled', false);;
	$('#tipe_pembayaran_bulanan').attr('disabled', false);;
	$('#semester_satu').attr('disabled', false);;
	$('#semester_dua').attr('disabled', false);;
	clearvalidate_add_pembayaran();
}

function addpembayaran() {
	idregishide();
	$('#save_button').text('SAVE');
	clearvalidate_add_pembayaran();
	$('#Modal_add_pembayaran').modal('show');
}

function svpembayaran() {
	
	if ($("#add_pembayaran").valid() == true) {
		$status = $('#save_button').text();
		var tipe_pembayaran = $('input[name=tipe_pembayaran]:checked').val();
		$('#tipe_pembayaran_semester').attr('disabled', false);
		$('#tipe_pembayaran_bulanan').attr('disabled', false);
		$('#semester_satu').attr('disabled', false);
		$('#semester_dua').attr('disabled', false);

		var iform = $('#add_pembayaran')[0];
		var data = new FormData(iform);
		if ($status == 'UPDATE') {
			msg = "Update Data Berhasil"
		}
		else {
			msg = "Simpan Data Berhasil"
		}
		$.ajax({

			type: "POST",
			url: base_url + "pembayaran/simpan_pembayaran/" + $status,
			enctype: 'multipart/form-data',
			contentType: false,
			processData: false,
			data: data,
			success: function (data) {

				bootbox.alert({
					message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;" + msg + "!!",
					size: 'small',
					callback: function () {

						window.location = base_url + 'pembayaran';
					}
				});
			}
		});
	}
}
//#endregion pembayran
function Modalcari(){
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction(){
	var id_matpal 		= $('#s_idmatpal').val();
	var param 			= {'id_matpal':id_matpal};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function kosong(){
	$('#id_matpal').attr('disabled', false);
	$('#tingkat').attr('disabled', false);
	$('#kode_pembayaran').val('');
	$('#id_matpal').val('');
	$('#tingkat').val('');
	$('#pembayaran').val('');
	$('#jawaban_a').val('');
	$('#jawaban_b').val('');
	$('#jawaban_c').val('');
	$('#jawaban_d').val('');
	$('#jawab_benar').val('');
}









function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function edit(id_pembayaran){
	var str_url  	= encodeURI(base_url+"pembayaran/get_data_pembayaran_byid/"+id_pembayaran);
    $('#save_button').text('UPDATE');
    // $('#kode_pembayaran').attr('',true);
	$('#id_matpal').attr('disabled',true);
    $('#tingkat').attr('disabled',true);
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			$('#kode_pembayaran').val(data['id_pembayaran']);//untuk membaca kategori saat update
			$('#id_matpal').val(data['id_matpal']);
			$('#tingkat').val(data['tingkat']);
			$('#jawaban_a').val(data['jwb_a']);
			$('#pembayaran').val(data['pembayaran']);
			$('#jawaban_b').val(data['jwb_b']);
			$('#jawaban_c').val(data['jwb_c']);
			$('#jawaban_d').val(data['jwb_d']);
			$('#jawaban_d').val(data['jwb_d']);
			$('#jawab_benar').val(data['jwb_benar']);
			
			$('#Modal_add_pembayaran').modal('show');
			
			
		}
	});
	
}

function hapus(kode_pembayaran){
	var str_url  	= encodeURI(base_url+"pembayaran/Delpembayaran/"+kode_pembayaran);
	bootbox.confirm("Anda yakin akan menghapus ini ?",
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

							window.location = base_url+'pembayaran';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_kodepembayaran').val('');
	// $('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'pembayaran/exportexcel/'+param;
}

