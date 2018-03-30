$(document).ready(function(){

	setTable();
	modalEdit('317');

	$('.datepicker').datepicker({
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
});

function setTable(){

	var my_table = $('#tb-list').DataTable({
		scrollY:'70vh',
		scrollCollapse: true,
		processing: true,
		serverSide: true,
		ajax: {
			'url':base_url+"/absensi/load_grid",
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
				targets: [8],         //action
				orderable: false,
				width: 20,
				className: "dt-center"
			}
        ],
	});
}

function modalEdit(id_jadwal){

	$('#modal_editing').modal('show');
	loadDataAbsensiSiswa(id_jadwal);
}

function loadDataAbsensiSiswa(id_jadwal){

	var tgl_absensi = $('#dtp_tgl_absensi').val();
	var param = {
		'id_jadwal' : id_jadwal,
		'tgl_absensi' : tgl_absensi
	};

	var json_absensi = [];

	$.ajax({

		type: "GET",
		url: base_url + "absensi/get_data_absensi/",
		dataType: "json",
		data:param,
		success: function (data) {
			json_absensi = data;
		}
	});
}