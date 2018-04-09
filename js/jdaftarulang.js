// //load
$(document).ready(function()
{	
	setTable();
    validate_add_daftarulang();
      
    $(".select2").select2({
        dropdownParent: $('#Modal_add_daftarulang')
        // dropdownParent: parentElement
    });
    
    pilihItemGedung();
    pilihItemKamar();
    pilihItemKelas();
    pilihItemBagian();
    pilihItemPotongan();

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

//#region index
function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

function idgedungshow() {
    $('#hiddenidgedung').show();
    $('#spansearchgedung').hide();
    $('#spansearchclosegedung').show();
}

function idgedunghide() {
    $('#hiddenidgedung').hide();
    $('#spansearchgedung').show();
    $('#spansearchclosegedung').hide();
}

function pilihItemGedung() {

    $item = $('#hide_id_gedung').val();
    $item = $item.split('#');

    $('#rayon').val($item[0]);
    $('#hiddenidgedung').hide();
    $('#spansearchgedung').show();
    $('#spansearchclosegedung').hide();
}

function idKamarshow() {
    $('#hiddenidKamar').show();
    $('#spansearchKamar').hide();
    $('#spansearchcloseKamar').show();
}

function idKamarhide() {
    $('#hiddenidKamar').hide();
    $('#spansearchKamar').show();
    $('#spansearchcloseKamar').hide();
}

function pilihItemKamar() {

    $item = $('#hide_id_Kamar').val();
    $item = $item.split('#');

    $('#kamar').val($item[0]);
    $('#hiddenidKamar').hide();
    $('#spansearchKamar').show();
    $('#spansearchcloseKamar').hide();
}

function idKelasshow() {
    $('#hiddenidKelas').show();
    $('#spansearchKelas').hide();
    $('#spansearchcloseKelas').show();
}

function idKelashide() {
    $('#hiddenidKelas').hide();
    $('#spansearchKelas').show();
    $('#spansearchcloseKelas').hide();
}

function pilihItemKelas() {

    $item = $('#hide_id_Kelas').val();
    $item = $item.split('#');

    $('#kel_sekarang').val($item[0]);
    $('#hiddenidKelas').hide();
    $('#spansearchKelas').show();
    $('#spansearchcloseKelas').hide();
}

function idBagianshow() {
    $('#hiddenidBagian').show();
    $('#spansearchBagian').hide();
    $('#spansearchcloseBagian').show();
}

function idBagianhide() {
    $('#hiddenidBagian').hide();
    $('#spansearchBagian').show();
    $('#spansearchcloseBagian').hide();
}

function pilihItemBagian() {

    $item = $('#hide_id_Bagian').val();
    $item = $item.split('#');

    $('#bagian').val($item[0]);
    $('#hiddenidBagian').hide();
    $('#spansearchBagian').show();
    $('#spansearchcloseBagian').hide();
}

function idPotonganshow() {
    $('#hiddenidPotongan').show();
    $('#spansearchPotongan').hide();
    $('#spansearchclosePotongan').show();
    $('#tipe_potongan_persen').prop('checked', false)
    $('#tipe_potongan_nominal').prop('checked', false)
}

function idPotonganhide() {
    $('#hiddenidPotongan').hide();
    $('#spansearchPotongan').show();
    $('#spansearchclosePotongan').hide();
}

function pilihItemPotongan() {

    $item = $('#hide_id_Potongan').val();
    $item = $item.split('#');

    $('#id_potongan').val($item[0]);
    $('#nama_potongan').val($item[1]);
    $('#potongan_persen').val($item[2]);
    $('#potongan_nominal').val($item[3]);
    if ($('#nama_potongan').val() !=''){
        $('#tipe_potongan_persen').prop('checked', true);
        // $('#tipe_potongan_nominal').prop('checked', false);
    }else{
        $('#tipe_potongan_persen').prop('checked', false);
        $('#tipe_potongan_nominal').prop('checked', false);
    }
    $('#hiddenidPotongan').hide();
    $('#spansearchPotongan').show();
    $('#spansearchclosePotongan').hide();
}

function setTable() {
    $('#tb_list').DataTable({
        "order": [[0, "desc"]],
        "processing": true,
        "serverSide": true,
        "bFilter": false,
        ajax: {
            'url': base_url + "daftarulang/load_grid",
            'type': 'GET',
            'data': function (d) {
                d.param = $('#hid_param').val();
            }
        },
    });
}
//#endregion index

//#region modal add daftar ulang
function adddaftarulang() {
    // clearvalidate_add_daftarulang();
    idregishide();  
    $('#save_button').text('SAVE');
    // $('#no_registrasi').val('T39180001');

    $('#Modal_add_daftarulang').modal('show');    
    
}

function idregisshow() {
    if ($('#no_registrasi').val() == ''){
        bootbox.alert({
            message: "Masukan No Registrasi",
            title: "<span class='glyphicon glyphicon-remove-sign'></span>&nbsp;ERROR",
            size: 'small',
            callback: function () {
                // $('#no_registrasi').focus();
                setTimeout(function () { $('#no_registrasi').focus(); }, 100);
            }
        });
    }else{
        var no_registrasi = $('#no_registrasi').val();
        var str_url = encodeURI(base_url + "daftarulang/get_data_santri/" + no_registrasi);
        $.ajax({

            type: "POST",
            url: str_url,
            dataType: "html",
            success: function (data) {

                var data = $.parseJSON(data);
                if(data != null){
                    $('#no_registrasi').attr('readonly',true);
                    var button = document.getElementById("save_button");
                    button.disabled = false;
                    $('#spansearchregis').hide();
                    $('#spansearchcloseregis').show();
                    $('#data_santri_detail').show();

                    //masukan data ke box data santri
                    $('#nama').val(data['nama_lengkap']);
                    $('#rayon').val(data['rayon']);
                    $('#kamar').val(data['kamar']);
                    $('#bagian').val(data['bagian']);
                    $('#kel_sekarang').val(data['kel_sekarang']);
                }
                else
                {
                    bootbox.alert({
                        message: "No Registrasi yang dimasukan tidak ada di data TMI ",
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
    clearvalidate_add_daftarulang();
    $('#no_registrasi').attr('readonly', false);
    setTimeout(function () { $('#no_registrasi').focus(); }, 1);
    var button = document.getElementById("save_button");
    button.disabled = true;
    $('#no_registrasi').val('');
    $('#nama').val('');
    $('#spansearchregis').show();
    $('#spansearchcloseregis').hide();
    $('#data_santri_detail').hide();
}

var validate_add_daftarulang = function () {

    var form = $('#add_daftarulang');
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

function clearvalidate_add_daftarulang() {

    $("#add_daftarulang div").removeClass('has-error');
    $("#add_daftarulang i").removeClass('fa-warning');
    $("#add_daftarulang div").removeClass('has-success');
    $("#add_daftarulang i").removeClass('fa-check');

    document.getElementById("add_daftarulang").reset();
}

function svdaftarulang() {
    if ($("#add_daftarulang").valid() == true) {
        var no_registrasi = $('#no_registrasi').val();
        var id_thn_ajar = $('#id_thn_ajar').val();
        var deskripsi = $('#deskripsi').val();
        $status = $('#save_button').text();
        //cek sudah pernah daftar ulang di kurikulum yang sama?
        var str_url = encodeURI(base_url + "daftarulang/get_data_daftarulang/" + id_thn_ajar + "/" + no_registrasi);
        $.ajax({
            type: "POST",
            url: str_url,
            dataType: "html",
            success: function (data) {
                $data = $.parseJSON(data);
                if ($data != null & $status == 'SAVE') {
                    bootbox.alert({
                        title: "<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span> <b>ERROR</b></div>",
                        message: " NO Register " + no_registrasi + " ditahun ajaran " + deskripsi +" Sudah Terdaftar." ,
                        size: 'small'
                    });

                }
                else {                    
                    var iform = $('#add_daftarulang')[0];
                    var data = new FormData(iform);
                    if ($status == 'SAVE') {
                        msg = "Simpan Data Berhasil"
                    }
                    else {
                        msg = "Update Data Berhasil"
                    }
                    $.ajax({

                        type: "POST",
                        url: base_url + "daftarulang/simpan_daftarulang/" + $status,
                        enctype: 'multipart/form-data',
                        // dataType:"JSON",
                        contentType: false,
                        processData: false,
                        data: data,
                        success: function (data) {

                            bootbox.alert({
                                message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;" + msg + "!!",
                                size: 'small',
                                callback: function () {

                                    window.location = base_url + 'daftarulang';
                                }
                            });
                        }
                    });
                }
            }
        });
    }
}

function edit(kode_daftarulang) {
    var id_thn_ajar_aktif = $('#id_thn_ajar').val();
    var str_url = encodeURI(base_url + "daftarulang/get_dataedit_daftarulang/" + kode_daftarulang);
    $('#save_button').text('UPDATE');
    $('#kode_daftarulang').attr('readonly', true);
    $.ajax({

        type: "POST",
        url: str_url,
        dataType: "html",
        success: function (data) {

            var data = $.parseJSON(data);
            if (id_thn_ajar_aktif != data['id_thn_ajar']){
                bootbox.alert({
                    message: "<span class='glyphicon glyphicon-remove-sign'></span>&nbsp;Tidak bisa diubah",
                    size: 'small'
                });
            }else
            {
                $('#no_registrasi').val(data['no_registrasi']);//untuk membaca kategori saat update
                $('#nama').val(data['nama_lengkap']);
                $('#nama').val(data['nama_lengkap']);
                $('#rayon').val(data['rayon']);
                $('#kamar').val(data['kamar']);
                $('#bagian').val(data['bagian']);
                $('#kel_sekarang').val(data['kel_sekarang']);
                $('#nama_potongan').val(data['nama_potongan']);
                $('#potongan_persen').val(data['persen']);
                $('#potongan_nominal').val(data['nominal']);
                if (data['tipe_potongan'] == 'persen') {
                    // $('#tipe_potongan_persen').checked = true;
                    // $('#tipe_potongan_nominal').checked = false;
                    $('#tipe_potongan_persen').prop('checked', true);
                } else if (data['tipe_potongan'] == 'nominal') {
                    // $('#tipe_potongan_persen').checked = false;
                    // $('#tipe_potongan_nominal').checked = true;
                    $('#tipe_potongan_nominal').prop('checked', true);
                }
                else {
                    $('#tipe_potongan_persen').prop('checked', false);
                    $('#tipe_potongan_nominal').prop('checked', false);
                }
                $('#no_registrasi').attr('readonly', true);
                $('#spansearchregis').hide();
                $('#spansearchcloseregis').hide();
                $('#spansearchPotongan').hide();
                $('#tipe_potongan_persen').attr('disabled', true);
                $('#tipe_potongan_nominal').attr('disabled', true);
                $('#Modal_add_daftarulang').modal('show');
            }
        }
    });

}

function hapus(kode_daftarulang) {
    var id_thn_ajar_aktif = $('#id_thn_ajar').val();
    var str_url = encodeURI(base_url + "daftarulang/get_dataedit_daftarulang/" + kode_daftarulang); //get all data
    $.ajax({

        type: "POST",
        url: str_url,
        dataType: "html",
        success: function (data) {

            var data = $.parseJSON(data);
            if (id_thn_ajar_aktif != data['id_thn_ajar']) {
                bootbox.alert({
                    message: "<span class='glyphicon glyphicon-remove-sign'></span>&nbsp;Data Tidak bisa dihapus",
                    size: 'small'
                });
            } 
            else {

                //cek sudah ada pembayaran belum
                var id_thn_ajar = data['id_thn_ajar'];
                var no_registrasi = data['no_registrasi'];

                var str_url = encodeURI(base_url + "daftarulang/get_dataID_tagihan/" + id_thn_ajar + "/" + no_registrasi); //get all data id tagihan
                $.ajax({

                    type: "POST",
                    url: str_url,
                    dataType: "html",
                    success: function (data) {

                        var data = $.parseJSON(data);
                        if(data != null){
                            bootbox.alert({
                                message: "<span class='glyphicon glyphicon-remove-sign'></span>&nbsp;Data Tidak bisa dihapus karena sudah ada pembayaran",
                                size: 'small'
                            });
                        }
                        else{
                            //#region hapus
                            var str_url = encodeURI(base_url + "daftarulang/Deldaftarulang/" + kode_daftarulang);
                            bootbox.confirm("Anda yakin akan menghapus ini ?",
                                function (result) {
                                    if (result == true) {
                                        $.ajax({
                                            type: "POST",
                                            url: str_url,
                                            dataType: "html",
                                            success: function (data) {
                                                bootbox.alert({
                                                    message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil Berhasil",
                                                    size: 'small',
                                                    callback: function () {

                                                        // window.location = base_url + 'daftarulang';
                                                    }
                                                });
                                            }
                                        });
                                    }
                                }
                            );
                            //#region hapus
                        }

                       
                        
                    }
                });
                
            }
        }
    });
   

}
//#endregion modal daftar ulang

//#region modal cari
function Modalcari() {
    clearformcari();
    $('#Modal_cari').modal('show');
}

function SearchAction() {
    var no_registrasi = $('#s_no_registrasi').val();
    // var nama_lengkap = $('#s_namalengkap').val();
    var param = { 'no_registrasi': no_registrasi };
    param = JSON.stringify(param);

    $('#hid_param').val(param);

    var table = $('#tb_list').DataTable();
    table.ajax.reload(null, false);
    table.draw();

    $('#Modal_cari').modal('toggle');
}

function clearformcari() {
    $('#s_kodedaftarulang').val('');
    // $('#s_namalengkap').val('');
}
//#endregion modal cari

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'daftarulang/exportexcel/'+param;
}