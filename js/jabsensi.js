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
	$('#hid_id_jadwal').val(id_jadwal);
	loadDataAbsensiSiswa(id_jadwal);
}

function loadDataAbsensiSiswa(id_jadwal){

	//clear table absensi
	$("#tb_absensi tbody").empty();

	var tgl_absensi = $('#dtp_tgl_absensi').val();
	var param = {
		'id_jadwal' : id_jadwal,
		'tgl_absensi' : tgl_absensi
	};

	var json_absensi 	= [];
	var str_row 		= "";
	var list_siswa 		= [];

	$.ajax({

		type: "GET",
		url: base_url + "absensi/get_data_absensi/",
		dataType: "json",
		data:param,
		success: function (data) {
			json_absensi = data;

			if(json_absensi.length > 0){

				$('#lbl_nama_guru').text(json_absensi[0].nama_guru);
				$('#lbl_nama_kelas').text(json_absensi[0].kode_kelas+' - '+json_absensi[0].nama_kelas);
				$('#hid_id_guru').val(json_absensi[0].id_guru);

				let seqno = 1;

				for (let r of json_absensi) {

					str_row = `<tr>`;
					str_row += `<td class="cell-text-center">${seqno}</td>`;
					str_row += `<td>${r.no_registrasi}</td>`;
					str_row += `<td>${r.nama_lengkap}</td>`;
					str_row += `<td class="cell-text-center cur-hand" onclick="clickAbsen('${r.no_registrasi}','h')">${checkValueAbsensi(r.no_registrasi,'h')}</td>`;
					str_row += `<td class="cell-text-center cur-hand" onclick="clickAbsen('${r.no_registrasi}','i')">${checkValueAbsensi(r.no_registrasi,'i')}</td>`;
					str_row += `<td class="cell-text-center cur-hand" onclick="clickAbsen('${r.no_registrasi}','s')">${checkValueAbsensi(r.no_registrasi,'s')}</td>`;
					str_row += `<td class="cell-text-center cur-hand" onclick="clickAbsen('${r.no_registrasi}','a')">${checkValueAbsensi(r.no_registrasi,'a')}</td>`;
					str_row += `</tr>`;

					$("#tb_absensi tbody").append(str_row);
					list_siswa.push(r.no_registrasi);
					seqno++;
				}

				$('#hid_list_siswa').val(list_siswa.join(','))
			}
		}
	});
}

function checkValueAbsensi(noreg_santri,val_absen){

	return `<input type="radio" id="rdo${noreg_santri+val_absen}" name="rdo_${noreg_santri}" value="${val_absen}" class="cur-hand">`;
}

function clickAbsen(noreg_santri, val_absen){

	$('#rdo' + noreg_santri + val_absen).prop('checked', true);
}

function saveForm(){

	$("#form_absensi").ajaxSubmit({
		url: base_url + "absensi/save_absen",
		type: 'post',
		success: function () {

			
		}
	});
}

function getDayName(i){

	moment.locale('id');
	var a = moment(i, 'DD-MM-YYYY');

	$('#lbl_hari').text(a.format('dddd'));	
}