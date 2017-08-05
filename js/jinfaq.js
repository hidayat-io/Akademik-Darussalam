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

  	$('input[name="optionsRadios"]').on('click', function() {
        if ($(this).val() == 'o') {
        	$('#nm').hide();
            
        }
        else {
            
        	$('#nm').show();
        }
    });


});


function pnladd(){

	$('#txtnoreg').val('');
	$('#hid_data_saldo').val('');
	$('#txtsaldotabungan').val('');
	$('#txtnama').val('');
	$("#txttgl").val('');
	$('#txtnominal').val('');
	$('#txtketerangan').val('');
	$('#lbl_titel').text('TAMBAH INFAQ');

	$('#m_add').modal('show');
}

// JS memanggil POP UP
function modalSearch(){
	$('#lbl_title').text('Search Data Infaq');
	$('#m_search').modal('show');

}

// JS cari data
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
     $('#txtnama').val('');
     $('#txtalamat').val('');
     $("#txttgl").val('');
     $('#txtnominal').val('');
     $('#txtketerangan').val('');
     $('#hid_data_saldo').val('');
}


// JS Simpan infaq
function simpaninfaq(){

	var hid_id_data 		= $("input[name='hid_id_data']").val();
	var hid_id_key			= $("input[name='hid_id_key']").val();
	var nama 				= $("input[name='txtnama']").val();
	var alamat				= $("input[name='txtalamat']").val();
	var tanggal 			= $("input[name='txttgl']").val();
	var tipe 				= $("input[name='optionsRadios']:checked").val();
	var nominal 			= $("input[name='txtnominal']").val();
	var keterangan 			= $("input[name='txtketerangan']").val();

	if(nama==""){

		var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
		var str_message = "Keterangan, &amp; Nama tidak boleh kosong.";

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

//	else if(tipe=="o"){

//		var nm = parseInt(nominal);
//		var sldtbn = parseInt(saldo);

//		if(nm > sldtbn){
//			var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
//		var str_message = "Keterangan, &amp; Pengeluaran lebih besar dari pada saldo saat ini.";
//
//		bootbox.alert({
//			size:'small',
//			title:title,
///			message:str_message,
//			buttons:{
//				ok:{
//					label: 'OK',
//					className: 'btn-warning'
//				}
//			}
//		});
//		return false;
//		}
//	}

	$("#frmtabungan").ajaxSubmit({
		url:base_url+"infaq/save_data",
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
			'url':base_url+"/infaq/load_grid",
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
					base_url+"infaq/hapus_data/"+id,function(){

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

	$('#lbl_titel').text('Update Data Infaq');

	$.ajax({

		type:"POST",
		url:base_url+"infaq/get_data/"+id,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);

			$('input[name="hid_id_data"]').val(data['id_infaq']);
			$('input[name="hid_data_saldo"]').val(data['saldo']);
			$('input[name="txtnama"]').val(data['nama']);
			$('textarea[name="txtalamat"]').val(data['alamat']);
			$("input[name='optionsRadios']").filter('[value='+data['tipe']+']').prop('checked', true).trigger("click");
			$('input[name="txttgl"]').val(data['itgl']);
			$('input[name="txtnominal"]').val(data['nominal']);
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

