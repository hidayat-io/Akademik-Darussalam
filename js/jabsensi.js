$(document).ready(function(){

	setTable();

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
				targets: [4],         //action
				orderable: false,
				width: 20,
				className: "dt-center"
			}
        ],
	});
}

function modalEdit(id_kelasdt){

	document.getElementById('form_absensi').reset();

	$('#cmd_save').addClass('hidden');
	$('#modal_editing').modal('show');
	$('#hid_id_kelasdt').val(id_kelasdt);

	$('#dtp_tgl_absensi').trigger("change");
	
	// loadDataAbsensiSiswa();
}

function loadDataAbsensiSiswa(id_kelasdt=0){

	//clear table absensi
	$("#tb_absensi tbody").empty();

	if(id_kelasdt==0){

		id_kelasdt = $('#hid_id_kelasdt').val();
	}

	var tgl_absensi = $('#dtp_tgl_absensi').val();
	var hari 		= $('#lbl_hari').text();
		hari 		= hari.toUpperCase()

	var param = {
		'id_kelasdt' : id_kelasdt,
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

			json_absensi = data.data;

			if(json_absensi.length > 0){

				$('#lbl_nama_kelas').text(json_absensi[0].kode_kelas+' - '+json_absensi[0].nama_kelas);
				$('#hid_id_absen_header').val(json_absensi[0].id_absen_header);
				
				//jika hari pada tanggal sama dengan hari pada jadwal
				if(data.isToday!=1){

					if (data.group == 'Administrator'){

						$('#cmd_save').removeClass('hidden');
					}
					else{

						$('#cmd_save').addClass('hidden');
					}
				}
				else if(data.isToday==1){

					$('#cmd_save').removeClass('hidden');
				}

				let seqno = 1;

				for (let r of json_absensi) {

					str_row = `<tr>`;
					str_row += `<td class="cell-text-center">${seqno}</td>`;
					str_row += `<td>${r.no_registrasi}</td>`;
					str_row += `<td>${r.nama_lengkap}</td>`;
					str_row += `<td class="cell-text-center cur-hand" onclick="clickAbsen('${r.no_registrasi}','h')">${checkValueAbsensi(r.no_registrasi,r.absensi,'h')}</td>`;
					str_row += `<td class="cell-text-center cur-hand" onclick="clickAbsen('${r.no_registrasi}','i')">${checkValueAbsensi(r.no_registrasi,r.absensi,'i')}</td>`;
					str_row += `<td class="cell-text-center cur-hand" onclick="clickAbsen('${r.no_registrasi}','s')">${checkValueAbsensi(r.no_registrasi,r.absensi,'s')}</td>`;
					str_row += `<td class="cell-text-center cur-hand" onclick="clickAbsen('${r.no_registrasi}','a')">${checkValueAbsensi(r.no_registrasi,r.absensi,'a')}</td>`;
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

function checkValueAbsensi(noreg_santri,actual_absen,val_absen){

	$checked = '';

	if(actual_absen==val_absen) $checked = `checked="checked"`;

	return `<input type="radio" id="rdo${noreg_santri+val_absen}" name="rdo_${noreg_santri}" value="${val_absen}" class="cur-hand" ${$checked}>`;
}

function clickAbsen(noreg_santri, val_absen){

	$('#rdo' + noreg_santri + val_absen).prop('checked', true);
}

function saveForm(){


	if($('#hid_list_siswa').val()==''){

		var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
		var str_message = "List Siswa masih kosong.";

		showMessage(title, str_message);
	}
	else{

		$("#form_absensi").ajaxSubmit({
			url: base_url + "absensi/save_absen",
			type: 'post',
			success: function (return_val) {

				if (return_val == 1) {

					alert('Simpan data absensi berhasil.');
					$('#modal_editing').modal('hide');
				}
				else {

					alert('ERROR simpan data absensi.');
				}
			},
		});
	}
}

function getDayName(i){

	moment.locale('id');
	var a = moment(i, 'DD-MM-YYYY');

	$('#lbl_hari').text(a.format('dddd'));	
}

function showMessage(title, str_message) {

	bootbox.alert({
		size: 'small',
		title: title,
		message: str_message,
		buttons: {
			ok: {
				label: 'OK',
				className: 'btn-warning'
			}
		}
	});
}