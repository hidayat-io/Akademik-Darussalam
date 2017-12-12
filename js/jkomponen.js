// load
$(document).ready(function(){

	setTable();


});

function OtomatisKapital(a) {
	setTimeout(function () {
		a.value = a.value.toUpperCase();
	}, 1);
}

function pnladd(){

	$('#hid_id_data').val('');
	$('#txtnama').val('');
	$('#lbl_titel').text('TAMBAH KOMPONEN');

	$('#m_add').modal('show');
}

// JS memanggil POP UP
function modalSearch(){
	$('#lbl_title').text('Search Data KOMPONEN');
	$('#m_search').modal('show');

}


// java script buat clear form nama pada form tabungan

function clearForm(){

	 $('#hid_id_data').val('');
     $('#txtnama').val('');
}


function setTable(){

	var my_table = $('#tb-list').DataTable({
		scrollY:'70vh',
		scrollCollapse: true,
		processing: true,
		serverSide: true,
		ajax: {
			'url':base_url+"/komponen/load_grid",
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

function simpankomponen(){

var nama 				= $("input[name='txtnama']").val();

if(nama==""){

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




	$("#frmkomponen").ajaxSubmit({
		url:base_url+"komponen/save_data",
		type: 'post',
		success: function(){

			var table = $('#tb-list').DataTable();
			table.ajax.reload( null, false );
			table.draw();

		
			$('#m_add').modal('toggle');

		}
	});

}

function editdata(id){

	$('#lbl_titel').text('Update Data Komponen Biaya');

	$.ajax({

		type:"POST",
		url:base_url+"komponen/get_data/"+id,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);


			$('input[name="hid_id_data"]').val(data['id_komponen']);
			$('input[name="txtnama"]').val(data['nama_komponen']);
			$("input[name='optionsRadios']").filter('[value='+data['tipe']+']').prop('checked', true).trigger("click");

			$('#m_add').modal('show');
		}
	});
}

function deleteData(id){

	bootbox.confirm("Anda yakin akan menghapus data ini ?",
		function(result){
			if(result==true){

				$.post(
					base_url+"komponen/hapus_data/"+id,function(){

						var table = $('#tb-list').DataTable();
						table.ajax.reload( null, false );
						table.draw();
					}
				);
			}
		}
	);
}

// JS cari data
function searchdata(){

	var nama_in 	= $('#txtnamasearch').val();
	var param 		= {'nama_komponen':nama_in};
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

	window.location = base_url+'Komponen/excel_komponen/'+param;
}


