$(document).ready(function(){

	setTable();
	populateSelectSantri();
	populateSelectKamar();
	populateSelectKelas();

	$("#opt_noreg").select2({

		dropdownParent: $('#m_add')
	});

	$("#opt_snoreg").select2({

		dropdownParent: $('#modal_search_siswa')
	});

	$("#opt_skamar").select2({

		dropdownParent: $('#modal_search_siswa')
	});

	$("#opt_skelas").select2({

		dropdownParent: $('#modal_search_siswa')
	});

	var today = "<?=date('d-m-Y')?>";
	$('.datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy',
        endDate: "today",
        maxDate: today
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

	//change tipe on tab change
  	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e){

		var target 	= $(e.target).attr("href");
		var tipe 	= target=='#tab_in'?'i':'o';

		$('#hid_tipe_transaksi').val(tipe);

		if(tipe=='o'){

			$('#tb_list_santri').bootstrapTable('resetView');
		}
	});
});

function populateSelectSantri(){

	$.ajax({
        type: "POST",
        url: base_url+'tabungan/get_list_santri',
        dataType: 'json',
        success: function(json) {

            var $el 	= $("#opt_noreg");
            var $els 	= $("#opt_snoreg");

            $el.empty(); // remove old options
            $els.empty(); // remove old options

            $el.append($("<option></option>")
                    .attr("value", '').text('- Please Select -'));
            $els.append($("<option></option>")
                    .attr("value", '').text('- Please Select -'));

            $.each(json, function(index, value) {

                $el.append($("<option></option>")
                        .attr("value", value['no_registrasi']).text(value['no_registrasi']+' - '+value['nama_lengkap']));
                $els.append($("<option></option>")
                        .attr("value", value['no_registrasi']).text(value['no_registrasi']+' - '+value['nama_lengkap']));
            });

        }
    });
}

function populateSelectKelas(){

	$.ajax({
        type: "POST",
        url: base_url+'common/get_list_kelas',
        dataType: 'json',
        success: function(json) {

            var $el 	= $("#opt_skelas");

            $el.empty(); // remove old options

            $el.append($("<option></option>")
                    .attr("value", '').text('- Please Select -'));

            $.each(json, function(index, value) {

                $el.append($("<option></option>")
                        .attr("value", value['kode_kelas']).text(value['kode_kelas']+' - '+value['nama']));
            });

        }
    });
}

function populateSelectKamar(){

	$.ajax({
        type: "POST",
        url: base_url+'common/get_list_kamar',
        dataType: 'json',
        success: function(json) {

            var $el 	= $("#opt_skamar");

            $el.empty(); // remove old options

            $el.append($("<option></option>")
                    .attr("value", '').text('- Please Select -'));

            $.each(json, function(index, value) {

                $el.append($("<option></option>")
                        .attr("value", value['kode_kamar']).text(value['kode_kamar']+' - '+value['nama']));
            });
        }
    });
}

function pnladd(){

	clearForm();

	$('#m_add').modal('show');
}

function modalSearch(){
	$('#lbl_title').text('SEARCH DATA TABUNGAN');
	$('#m_search').modal('show');
}

// JS Cari data
function searchdata(){

	var nama_santri = $('#txtnamasearch').val();
	var param 		= {'nama':nama_santri};
		param 		= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb-list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#m_search').modal('toggle');
}

// java script buat clear form nama pada form tabungan
function clearForm(){

    document.getElementById("frmtabungan").reset();
    $("#opt_noreg").val("").trigger("change");
}

function simpantabungan(){

	var nama 				= $("input[name='txtnama']").val();
	var hid_id_data 		= $("input[name='hid_id_data']").val();
	var saldotabungan 		= $("input[name='txtsaldotabungan']").val();
	var no_registrasi 		= $("#opt_noreg").val();
	var tanggal 			= $("input[name='txttgl']").val();
	var tipe 				= $("input[name='optionsRadios']:checked").val();
	var nominal 			= $("input[name='txtnominal']").val();
	var keterangan 			= $("input[name='txtketerangan']").val();


	if(no_registrasi=="" || (nominal=="" || parseInt(nominal)<1)){

		if(no_registrasi==""){

			var str_message = "Santri harus dipilih.";
		}
		else{

			var str_message = "Nominal harus lebih dari 0 (nol)";
		}

		var title = "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";

		showMessage(title,str_message);
		return false;
	}

	$("#frmtabungan").ajaxSubmit({
		url:base_url+"tabungan/save_data",
		type: 'post',
		success: function(){

			var table = $('#tb-list').DataTable();
			table.ajax.reload( null, false );
			table.draw();
			$('#m_add').modal('toggle');
		}
	});
}

function setTable(){

	var my_table = $('#tb-list').DataTable({
		scrollY:'70vh',
		scrollCollapse: true,
		processing: true,
		serverSide: true,
		ajax: {
			'url':base_url+"/tabungan/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
		bFilter:false,
		order: [[ 0, "desc" ]],
		dom: "<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-5'l><'col-sm-7'pi>>",
		columnDefs: [
	        {
	            targets: [0],
	            visible: false
	        },
	        {
	            targets: [8],
	            orderable: false,
	            width: 80
	        }
        ],
	});
}

function deleteData(id){

	bootbox.confirm("Anda yakin akan menghapus data ini ?",
		function(result){
			if(result==true){

				$.post(
					base_url+"tabungan/hapus_data/"+id,function(){

						var table = $('#tb-list').DataTable();
						table.ajax.reload( null, false );
						table.draw();
					}
				);
			}
		}
	);
}

function editdata(id){

	$('#lbl_titel').text('Update Data Tabungan');

	$.ajax({

		type:"POST",
		url:base_url+"tabungan/get_data/"+id,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);

			$('input[name="hid_id_data"]').val(data['id']);
			$('input[name="hid_old_nominal"]').val(data['nominal']);
			$("#opt_noreg").val(data['no_registrasi']).trigger("change");
			$("input[name='optionsRadios']").filter('[value='+data['tipe']+']').prop('checked', true).trigger("click");
			$('input[name="txttgl"]').val(data['itgl']);
			$('input[name="txtnominal"]').val(data['nominal']);
			$('input[name="txtsaldotabungan"]').val(data['saldo']);
			$('textarea[name="txtketerangan"]').val(data['keterangan']);

			$('#m_add').modal('show');
		}
	});
}


function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'tabungan/excel_tabungan/'+param;
}

function displaySaldo(){

	var nosantri = $('#opt_noreg').val();

	$.ajax({

		type:"GET",
		url:base_url+"tabungan/get_saldo/"+nosantri,
		dataType:"html",
		success:function(data){

			var data 	= $.parseJSON(data);
			var saldo 	= 0;

			if(data!=null) saldo = data['saldo'];

			$('input[name="txtsaldotabungan"]').val(saldo);
		}
	});
}

function setdatasantri(){

	var my_table = $('#tbl_santri').DataTable({
		scrollY:'70vh',
		scrollCollapse: true,
		processing: true,
		serverSide: true,
		ajax: {
			'url':base_url+"/tabungan/load_data_santri",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
		bFilter:false,
		order: [[ 0, "desc" ]],
		dom: "<'row'<'col-sm-12'tr>>" +
				"<'row'<'col-sm-5'l><'col-sm-7'pi>>",
		columnDefs: [
	        {
	            targets: [0],
	            visible: false
	        }
        ],
	});
}

function queryParamPengeluaranSantri(){

	var skelas 	= $('#opt_skelas').val();
	var ssantri = $('#opt_snoreg').val();
	var skamar 	= $('#opt_skamar').val();

	return {
        skelas: 	skelas,
        skamar: 	skamar,
        ssantri: 	ssantri
    }
}

//modal search data santri
function modalCariSiswa(){

	$('#modal_search_siswa').modal('show');
}

function searchDataSantri(){

	$('#tb_list_siswa').bootstrapTable('refresh');
	$('#modal_search_siswa').modal('hide');
}
//end modal search data santri

function savePengeluaran(){

	var dataSiswa 	= $('#tb_list_siswa').bootstrapTable('getSelections');
	var jmlAmbil 	= $('#txt_jml_ambil').val().trim()!=''?$('#txt_jml_ambil').val():0;
		jmlAmbil 	= parseInt(jmlAmbil);

	if(dataSiswa.length < 1){

		var str_message = "Belum ada data yang dipilih.";
		var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";

		showMessage(title,str_message);
	}
	else if(jmlAmbil <= 0){

		var str_message = "Jumlah pengambilan harus lebih dari 0 (nol).";
		var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Jumlah Pengambilan";

		showMessage(title,str_message);
	}
	else{

		//validate daily limit
		for(i=0;i<dataSiswa.length;i++){

			if(parseInt(dataSiswa[i].saldo) < jmlAmbil){

				var siswa_name 	= dataSiswa[i].nama_lengkap;
				var str_message = "Saldo untuk siswa : "+siswa_name+" tidak mencukupi.";
				var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Saldo.";

				showMessage(title,str_message);
				return false;
			}

			if(jmlAmbil > parseInt(dataSiswa[i].limit)){

				var siswa_name 	= dataSiswa[i].nama_lengkap;
				var str_message = "Limit untuk siswa : "+siswa_name+" melebihi jumlah yang akan diambil.";
				var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Limit.";

				showMessage(title,str_message);
				return false;
			}
		}

		var str_list_siswa = JSON.stringify(dataSiswa);

		$('#hid_list_siswa').val(str_list_siswa);

		$("#frmtabungan").ajaxSubmit({
			url:base_url+"tabungan/save_data",
			type: 'post',
			success: function(){

				var table = $('#tb-list').DataTable();
				table.ajax.reload( null, false );
				table.draw();
				$('#m_add').modal('toggle');

				$('#tb_list_siswa').bootstrapTable('refresh');
			}
		});
	}
}

function showMessage(title,str_message){

	bootbox.alert({
		size:'small',
		title:title,
		message:str_message,
		buttons:{
			ok:{
				label: 'OK',
				className: 'btn-warning'
			}
		}
	});
}
