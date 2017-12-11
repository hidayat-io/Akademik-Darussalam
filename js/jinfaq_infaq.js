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

	populateSelectdonatur();

	$("#opt_donatur").select2({ 
		dropdownParent: $('#m_add')
	});

});

function populateSelectdonatur(){

	$.ajax({
	        type: "POST",
	        url: base_url+'infaq/get_list_donatur',
	        dataType: 'json',
	        success: function(json) {
	        	
	            var $el 		= $("#opt_donatur");

	            $el.empty(); // remove old options

	            $el.append($("<option></option>")
	                    .attr("value", '').text('- Please Select -'));


	            $.each(json, function(index, value) {

	                $el.append($("<option></option>")
	                        .attr("value", value['id_donatur']).text(value['nama_donatur']));
	            });
	            
	        }
	    });
}


function pnladd(){

	$('#hid_data_saldo').val('');
	$('#txtsaldotabungan').val('');
	$('#txtnama').val('');
	$('#txtalamat').val('');
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

// java script buat clear form nama pada form tabungan
function clearForm(){
	$('#hid_id_data').val('');
	$('#hid_data_saldo').val('');
    $("#txttgl").val('');
    $('#txtnominal').val('');
    $('#txtketerangan').val('');
     
}


// JS Simpan infaq
function simpaninfaq(){

	//alert($('.nav-pills .active')[0].id);
	//return false;



	var hid_id_data 		= $("input[name='hid_id_data']").val();
	var id_data_saldo		= $("input[name='hid_data_saldo']").val();
	var tipe 				= $('.nav-pills .active')[0].id;
	var tanggal 			= $("input[name='txttgl']").val();
	
	var nominal 			= $("input[name='txtnominal']").val();
	var keterangan 			= $("input[name='txtketerangan']").val();


	$('input[name="hid_id_data_tipe"]').val(tipe);


	//return false;


	if(tanggal==""){

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

	$("#frminfaq").ajaxSubmit({
		url:base_url+"infaq/save_data",
		type: 'post',
		success: function(){

			var table = $('#tb-list').DataTable();
			table.ajax.reload( null, false );
			table.draw();
			$('#m_add').modal('toggle');
		}
	});
	clearForm();
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

	$('#lbl_titel').text('Update Data Tabungan');

	$.ajax({

		type:"POST",
		url:base_url+"infaq/get_data/"+id,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);


			$('input[name="hid_id_data"]').val(data['id_infaq']);
			$('input[name="hid_data_saldo"]').val(data['saldo']);
			$("#opt_donatur").val(data['id_donatur']).trigger('change')
			$('input[name="txttgl"]').val(data['itgl']);
			$('input[name="txtnominal"]').val(data['nominal']);
			$('textarea[name="txtketerangan"]').val(data['keterangan']);

			$('#m_add').modal('show');

		}
	});
}

// JS cari data
function searchdata(){

	var tipe_in		= $("input[name='optsrch']:checked").val();
	var nama_in 	= $('#txtnamasearch').val();
	var param 		= {'nama':nama_in,'tipe':tipe_in};
		param 		= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb-list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#m_search').modal('toggle');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'infaq/excel_infaq/'+param;
}

