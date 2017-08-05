// load
$(document).ready(function(){

	setTable();

	$('.datepicker').datepicker({
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

    $('#txtnoreg').keyup(function(){

       var nik = $('#txtnoreg').val();

        if(nik.length=='9'){

            lookUpNoreg();
        }
        else{

            clearForm();
        }
    });
   // $('#txtnominal').maskMoney({precision:0});

});

function pnladd(){

	$('#txtnoreg').val('');
	$('#hid_data_saldo').val('');
	$('#txtsaldotabungan').val('');
	$('#txtnama').val('');
	$("#txttgl").val('');
	$('#txtnominal').val('');
	$('#txtketerangan').val('');
	$('#lbl_titel').text('TAMBAH DATA TABUNGAN');

	$('#m_add').modal('show');
}

function modalSearch(){
	$('#lbl_title').text('SEARCH DATA TABUNGAN');
	$('#m_search').modal('show');

}

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

function lookUpNoreg(){

    var noreg = $("#txtnoreg").val();

    var str_data = 'noreg='+noreg;

    $.ajax({

        type:"POST",
        url:base_url+"Tabungan/lookup_noreg",
        dataType:"json",
        data:str_data,
        cache:false,
        success:function(result){

            if(result!=null){

                $('#txtnama').val(result.nama_lengkap);
                $('#txtsaldotabungan').val(result.saldo);


            }
            else{

                clearForm();
            }
        }
    });
}
// java script buat clear form nama pada form tabungan

function clearForm(){

    //document.getElementById("frmtabungan").reset();
     $('#txtnama').val('');
     $("#txttgl").val('');
     $('#txtnominal').val('');
     $('#txtketerangan').val('');
     $('#hid_data_saldo').val('');
	$('#txtsaldotabungan').val('');
}

function simpantabungan(){

	var hid_id_data 		= $("input[name='hid_id_data']").val();
	var saldotabungan 		= $("input[name='txtsaldotabungan']").val();
	var no_registrasi 		= $("input[name='txtnoreg']").val();
	var tanggal 			= $("input[name='txttgl']").val();
	var tipe 				= $("input[name='optionsRadios']:checked").val();
	var nominal 			= $("input[name='txtnominal']").val();
	var keterangan 			= $("input[name='txtketerangan']").val();

	if(no_registrasi==""){

		var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
		var str_message = "Keterangan, &amp; No Registrasi santri tidak boleh kosong.";

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
		return false;
	}
	else if(tanggal==""){

		var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
		var str_message = "Keterangan, &amp; Tanggal tidak boleh kosong.";

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
		return false;
	}

	else if(nominal==""){

		var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
		var str_message = "Keterangan, &amp; Nominal tidak boleh kosong.";

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
		return false;
	}

	else if(tipe=="o"){

		var nm = parseInt(nominal);
		var sldtbn = parseInt(saldotabungan);

		if(nm > sldtbn){
			var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
		var str_message = "Keterangan, &amp; Pengeluaran lebih besar dari pada saldo saat ini.";

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
		return false;
		}
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
			$('input[name="hid_data_saldo"]').val(data['saldo']);
			$('input[name="txtnoreg"]').val(data['no_registrasi']);
			$('input[name="txtnama"]').val(data['nama_lengkap']);
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

