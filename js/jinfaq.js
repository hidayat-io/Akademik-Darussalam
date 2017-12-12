// load
$(document).ready(function(){

	setTable();

	$('#txtsaldo').maskMoney({ precision: 0 });
	$('#txtnominalkl').maskMoney({ precision: 0 });
	$('#txtnominal').maskMoney({ precision: 0 });

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
	populateSelectdonatur2();
	populateSelectdonatur_src();

	$("#opt_donatur").select2({ 
		dropdownParent: $('#m_add')
	});

	$("#opt_donatur2").select2({ 
		dropdownParent: $('#m_add')
	});

	$("#opt_dnt_srch").select2({ 
		dropdownParent: $('#m_search')
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

function populateSelectdonatur2(){

	$.ajax({
	        type: "POST",
	        url: base_url+'infaq/get_list_donatur',
	        dataType: 'json',
	        success: function(json) {
	        	
	            var $el 		= $("#opt_donatur2");

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

function populateSelectdonatur_src(){

	$.ajax({
	        type: "POST",
	        url: base_url+'infaq/get_list_donatur',
	        dataType: 'json',
	        success: function(json) {
	        	
	            var $el 		= $("#opt_dnt_srch");

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
	kosong();
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
	$('#hid_data_nm_awl').val('');
    $("#txttgl").val('');
    $('#txtnominal').val('');
    $('#txtketerangan').val('');    
}


// JS Simpan infaq
function simpaninfaq(){

	//alert($('.nav-pills .active')[0].id);
	//return false;


	// ini field data  untuk data pemasukan
	var hid_id_data 		= $("input[name='hid_id_data']").val();
	var id_data_saldo		= $("input[name='hid_data_saldo']").val();
	var tipe 				= $('.nav-pills .active')[0].id;
	var tanggal 			= $("input[name='txttgl']").val();
	var nominal 			= $("input[name='txtnominal']").val();
	var keterangan 			= $("input[name='txtketerangan']").val();

	// ini field data unt
	var tglkl				= $("input[name='txttglkl']").val();
	var	nominalkl			= $("input[name='txtnominalkl']").val();
	var	keterangankl		= $("input[name='txtketerangankl']").val();





	$('input[name="hid_id_data_tipe"]').val(tipe);


	//var hid_id_data_tipe = $("input[name='']").val();


	//return false;
	if(tipe=="tab_in"){

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
	}
	else if(tipe=="tab_out"){

		if(tglkl==""){

				var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
				var str_message = "Keterangan, &amp; Tanggal Keluar tidak boleh kosong.";

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
		else if(nominalkl==""){

				var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
				var str_message = "Keterangan, &amp; Nominal keluar tidak boleh kosong.";

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


	$("#frminfaq").ajaxSubmit({
		url:base_url+"infaq/save_data",
		type: 'post',
		success: function(){

			var table = $('#tb-list').DataTable();
			table.ajax.reload( null, false );
			table.draw();
			
			clearForm();
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


function editdata(id){
	kosong();	

	$('#lbl_titel').text('Update Data Tabungan');

	$.ajax({

		type:"POST",
		url:base_url+"infaq/get_data/"+id,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);
			var tipe = data['tipe'];

			

			$('#m_add').modal('show');
			
			if(tipe=='i'){

				$('#tab_masuk').trigger('click'); //untuk  mengaktifkan tab masuk
				$('input[name="hid_id_data"]').val(data['id_infaq']);
				$('input[name="hid_data_saldo"]').val(data['saldo']);
				$('input[name="hid_data_nm_awl"]').val(data['nominal']);
				
				$("#opt_donatur").val(data['id_donatur']).trigger('change')
				$('input[name="txttgl"]').val(data['itgl']);
				$('input[name="txtnominal"]').val(data['nominal']);
				$('textarea[name="txtketerangan"]').val(data['keterangan']);
			}
			else{

				$('#tab_keluar').trigger('click'); // untuk mengaktifkan tab kelua

				$('input[name="hid_id_data"]').val(data['id_infaq']);
				$('input[name="hid_data_nm_awl"]').val(data['nominal']);
				
				$("#opt_donatur2").val(data['id_donatur']).trigger('change')
				$('input[name="txttglkl"]').val(data['itgl']);
				$('input[name="txtnominalkl"]').val(data['nominal']);
				$('input[name="txtsaldo"]').val(data['saldo']);
				$('textarea[name="txtketerangankl"]').val(data['keterangan']);


			}


		}
	});
}


function displaysaldo(){
	var id_donatur = $('#opt_donatur2').val();

	$.ajax({

		type:"POST",
		url:base_url+"infaq/get_saldo_infaq/"+id_donatur,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);
			if (data == null){
				$('input[name="txtsaldo"]').val(0);
			}
			else{
				// $('input[name="txtsaldo"]').val(data['saldo']);
				$('#txtsaldo').val(data['saldo']).maskMoney({ precision: 0 });

			}
		}

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

// JS cari data
function searchdata(){

//	var tipe_in		= $("input[name='optsrch']:checked").val();
//	var nama_in 	= $('#txtnamasearch').val();
	var nm 			= $('#opt_dnt_srch').val();
	

	var param 		= {'id_donatur':nm};
		param 		= JSON.stringify(param);
		
	$('#hid_param').val(param);

	var table = $('#tb-list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#m_search').modal('toggle');
}

function kosong() {
	$('#tab_masuk').trigger('click');
	$('#hid_id_data').val('');
	$('#hid_data_saldo').val('');
	$('#txtsaldo').val('');
	$('#txttgl').val('');
	$('#txtnominal').val('');
	$('#txtketerangan').val('');

	// ini field data unt
	$('#txttglkl').val('');
	$('#txtnominalkl').val('');
	$('#txtketerangankl').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'infaq/excel_infaq/'+param;
}

