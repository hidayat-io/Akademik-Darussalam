$(document).ready(function()
{	
	setTable();
	
	$("#thn_penyakit").datepicker({ 
		dateFormat: 'yy',
		autoclose: true 
	});
	$("#thn_masuk").datepicker({ 
		dateFormat: 'yy',
		autoclose: true 
	});
	$("#thn_fisik").datepicker({ 
		dateFormat: 'yy',
		autoclose: true 
	});
	$("#tahun_lulus_keluarga").datepicker({ 
		dateFormat: 'yy',
		autoclose: true 
	});
	$("#tgl_lahir_keluarga").datepicker({ 
		dateFormat: 'yyyy-mm-dd',
		autoclose: true,
	});
	$("#tgl_lahir").datepicker({ 
		dateFormat: 'yyyy-mm-dd',
		autoclose: true
		
	});

	$("#tgl_wafat_keluarga").datepicker({ 
		dateFormat: 'yyyy-mm-dd',
		autoclose: true 
	});

	validate_add_santri();
	validate_add_keluarga_santri();
	validate_add_penyakit();
	
	$(".select2").select2({
		dropdownParent:$('#Modal_add_Santri')
		// dropdownParent: parentElement
	});
	pilihItemGedung();
	pilihItemKamar();
	pilihItemKelas();
	pilihItemBagian();
	pilihItemDonatur();
	$('.nav-tabs').tabdrop();
	
	$('.numbers-only').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
			if ((charCode >= 48 && charCode <= 57)
				|| charCode == 46
				|| charCode == 44
				|| charCode == 8)
				return true;
		return false;
	});
	// #region maskmoney format
		$('#uang_jajan_perbulan').maskMoney({precision:0});
		$('#biaya_perbulan_min').maskMoney({precision:0});
		$('#biaya_perbulan_max').maskMoney({precision:0});
		$('#penghasilan').maskMoney({precision:0});
		$('#pedapatan_ibu_keluarga').maskMoney({precision:0});
	//#endregion maskmoney format

	$("#fileUpload").on('change', function(e) {

		var files = e.originalEvent.target.files;

      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
		var image_holder = $("#image-holder");

      	image_holder.empty();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#fileUpload").val('');
			return false;
		}
		else if (extn == "jpg" || extn == "jpeg") {


			if (typeof(FileReader) != "undefined") {
			  //loop for each file selected for uploaded.
			  for (var i = 0; i < countFiles; i++){

			    var reader = new FileReader();
			    reader.onload = function(e) {
			      $("<img />", {
			        "src": e.target.result,
			        "class"	: "thumb-image",
			        "name"	: "img_photo"
			      }).appendTo(image_holder);
			    }
			    reader.readAsDataURL($(this)[0].files[i]);
			  }
			}
			else {

			  bootbox.alert("This browser does not support FileReader.");
				$("#fileUpload").val('');
			  return false;
			}
		}
		else {

			bootbox.alert("Pls select only images");
			$("#fileUpload").val('');
			return false;
		}
	});

	$("#ktp_keluarga").on('change', function(e) {//lampiran penyakit

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#ktp_keluarga").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#ktp_keluarga").val('');
			return false;
		}
	});
	
	$("#lamp_bukti").on('change', function(e) {//lampiran penyakit

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#lamp_bukti").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#lamp_bukti").val('');
			return false;
		}
	});
	
	$("#fileUpload_ijazah").on('change', function(e) {

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#fileUpload_ijazah").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			// bootbox.alert("This browser does not support FileReader.");
			// $("#fileUpload_ijazah").val('');
			// return false;
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#fileUpload_ijazah").val('');
			return false;
		}
		
		if ($("#fileUpload_ijazah").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#ijazahholder").hide();
		}
	});	

	$("#RfileUpload_ijazah").on('click', function(e) {
		
		if ($("#fileUpload_ijazah").val()!= '' && $("#no_registrasi").val() !='')
		{
			$("#ijazahholder").show();
		}

	});	
	
	$("#fileUpload_akelahiran").on('change', function(e) {

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#fileUpload_akelahiran").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#fileUpload_akelahiran").val('');
			return false;
		}
		
		if ($("#fileUpload_akelahiran").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#aklahiranholder").hide();
		}
	});	

	$("#RfileUpload_akelahiran").on('click', function(e) {
		
		if ($("#fileUpload_akelahiran").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#aklahiranholder").show();
		}

	});	
	
	$("#fileUpload_kk").on('change', function(e) {

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#fileUpload_kk").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#fileUpload_kk").val('');
			return false;
		}
		
		if ($("#fileUpload_kk").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#kkholder").hide();
		}
	});	

	$("#RfileUpload_kk").on('click', function(e) {
		
		if ($("#fileUpload_kk").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#kkholder").show();
		}

	});

	$("#fileUpload_skhun").on('change', function(e) {

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#fileUpload_skhun").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#fileUpload_skhun").val('');
			return false;
		}
		
		if ($("#fileUpload_skhun").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#skhunholder").hide();
		}
	});	

	$("#RfileUpload_skhun").on('click', function(e) {
		
		if ($("#fileUpload_skhun").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#skhunholder").show();
		}

	});

	$("#fileUpload_transkip").on('change', function(e) {

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#fileUpload_transkip").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#fileUpload_transkip").val('');
			return false;
		}
		
		if ($("#fileUpload_transkip").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#transkipholder").hide();
		}
	});	

	$("#RfileUpload_transkip").on('click', function(e) {
		
		if ($("#fileUpload_transkip").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#transkipholder").show();
		}

	});

	$("#fileUpload_skbb").on('change', function(e) {

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#fileUpload_skbb").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#fileUpload_skbb").val('');
			return false;
		}
		
		if ($("#fileUpload_skbb").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#skbbholder").hide();
		}
	});	

	$("#RfileUpload_skbb").on('click', function(e) {
		
		if ($("#fileUpload_skbb").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#skbbholder").show();
		}

	});

	$("#fileUpload_skes").on('change', function(e) {

		var files = e.originalEvent.target.files;
      	//Get count of selected files
		var countFiles = $(this)[0].files.length;
		var size = files[0].size;
		var imgPath = $(this)[0].value;
		var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

      	if(size > 1048576 ){
			bootbox.alert("Cannot upload file more than 1 MB.");
			$("#fileUpload_skes").val('');
			return false;
		}
		else if (extn == "png" || extn == "jpg" || extn == "jpeg" || extn == "pdf" || extn == "doc" || extn == "docx") 
		{
			
		}
		else 
		{
			bootbox.alert("File tidak didukung");
			$("#fileUpload_skes").val('');
			return false;
		}
		
		if ($("#fileUpload_skes").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#skesholder").hide();
		}
	});	

	$("#RfileUpload_skes").on('click', function(e) {
		
		if ($("#fileUpload_skes").val() != '' && $("#no_registrasi").val() !='')
		{
			$("#skesholder").show();
		}

	});

});

function OtomatisKapital(a) {
	setTimeout(function () {
		a.value = a.value.toUpperCase();
	}, 1);
}

function setTable(){
	var kategori_santri = $('#hid_kategori_santri').val();
	var page = $('#hid_page').val();
	$('#tb_list').DataTable({
		processing: true,
		serverSide: true,
		bFilter: false,
		ajax: {
			'url': base_url + "pendaftaran/load_grid/" + kategori_santri + "/" +page,
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
		// columnDefs: [
		// 	{ width: 2, targets: 0 },
		// 	{ width: 1, targets: 1 },
		// 	{ width: 2, targets: 2 },
		// 	{ width: 2, targets: 3 },
		// 	{ width: 2, targets: 4 },
		// 	{ width: 2, targets: 5 },
		// 	{ width: 2, targets: 6 },
		// 	{ width: 2, targets: 7 },         
		// 	{ width: 2, targets: 8 },         
		// 	{ width: 2, targets: 9 },         
		// 	{
		// 		targets: [10],         //action
		// 		orderable: false,
		// 		width: 100
		// 	}
		// ],
		order: [[0, "desc"]],
		dom: "<'row'<'col-sm-12'tr>>" +
		"<'row'<'col-sm-5'l><'col-sm-7'pi>>"
    } );
}

//#region santri

function kosong(){
	$('#kategori_santri').val('');
	$('#no_registrasi').val('');
	$('#no_stambuk').val('');
	$('#thn_masuk').val('');
	$('#rayon').val('');
	$('#kamar').val('');
	$('#bagian').val('');
	$('#kel_sekarang').val('');
	$('#nisn').val('');
	$('#nisnlokal').val('');
	$('#nama_lengkap').val('');
	$('#nama_arab').val('');
	$('#nama_panggilan').val('');
	$('#hobi').val('');
	$('#uang_jajan_perbulan').val('');
	$('#no_kk').val('');
	$('#nik').val('');
	$('#tempat_lahir').val('');
	$('#tgl_lahir').val('');
	$('#konsulat').val('');
	$('#nama_sekolah_aitam').val('');
	$('#kelas_aitam').val('');
	$('#alamat_sekolah_aitam').val('');
	$('#suku').val('');
	$('#kewarganegaraan').val('');
	$('#jalan').val('');
	$('#no_rumah').val('');
	$('#dusun').val('');
	$('#desa').val('');
	$('#kecamatan').val('');
	$('#kabupaten').val('');
	$('#provinsi').val('');
	$('#kd_pos').val('');
	$('#no_tlp').val('');
	$('#no_hp').val('');
	$('#email').val('');
	$('#fb').val('');
	$('#dibesarkan_di').val('');
	$('#pembiaya').val('');
	$('#biaya_perbulan_min').val('');
	$('#biaya_perbulan_max').val('');
	$('#penghasilan').val('');
	$('#gol_darah').val('');
	$('#tinggi_badan').val('');
	$('#berat_badan').val('');
	$('#khitan').val('');
	$('#kondisi_pendidikan').val('');
	$('#ekonomi_keluarga').val('');
	$('#situasi_rumah').val('');
	$('#dekat_dengan').val('');
	$('#hidup_beragama').val('');
	$('#pengelihatan_mata').val('');
	$('#kaca_mata').val('');
	$('#pendengaran').val('');
	$('#operasi').val('');
	$('#sebab').val('');
	$('#kecelakaan').val('');
	$('#akibat').val('');
	$('#alergi').val('');
	$('#thn_fisik').val('');
	$('#kelainan_fisik').val('');
	$('#image-holder').html('');
	$('#tb_list_keluarga > tbody').html('"<tr><td colspan=\"33\" align=\"center\">Belum Ada Data.</td></tr>"');
	$('#tb_list_penyakit > tbody').html('"<tr><td colspan=\"6\" align=\"center\">Belum Ada Data.</td></tr>"');
	$('#tb_list_donatur > tbody').html('"<tr><td colspan=\"4\" align=\"center\">Belum Ada Data.</td></tr>"');
	// $('#tb_list_kckhusus > tbody').html('"<tr><td colspan=\"6\" align=\"center\">Belum Ada Data.</td></tr>"');
	$('#hid_jumlah_item_keluarga').val('0');
	$('#hid_cek_ayah').val('0');
	$('#hid_cek_ibu').val('0');
	$('#hid_cek_wali').val('0');
	$('#hid_jumlah_item_penyakit').val('0');
	$('#hid_jumlah_item_donatur').val('0');
	$('#bid_studi').val('')
	$('#olahraga').val('')
	$('#kesenian').val('')
	$('#keterampilan').val('')
	$('#lain_lain').val('')
	// $('#hid_jumlah_item_KecakapanKhusus').val('0');
	
}

function mati(){
	if($('#kategori_santri').val() ==''){
		$('#kategori_santri').attr('disabled', false);
	}else{
		$('#kategori_santri').attr('disabled', true);
	}
	
	//disable form add_santri
		$('#no_registrasi').attr('disabled', true);
		
	if ($('#hid_page').val() == 'DAFTAR') {
		$('#rayon').attr('disabled', true);
		$('#kamar').attr('disabled', true);
		$('#bagian').attr('disabled', true);
		$('#kel_sekarang').attr('disabled', true);
	}
	else {
		$('#rayon').attr('disabled', false);
		$('#kamar').attr('disabled', false);
		$('#bagian').attr('disabled', false);
		$('#kel_sekarang').attr('disabled', false);
	}

		$('#no_stambuk').attr('disabled', true);
		$('#thn_masuk').attr('disabled', true);
		
		$('#nisn').attr('disabled', true);
		$('#nisnlokal').attr('disabled', true);
		$('#nama_lengkap').attr('disabled', true);
		$('#nama_arab').attr('disabled', true);
		$('#nama_panggilan').attr('disabled', true);
		$('#hobi').attr('disabled', true);
		$('#uang_jajan_perbulan').attr('disabled', true);
		$('#no_kk').attr('disabled', true);
		$('#nik').attr('disabled', true);
		$('#tempat_lahir').attr('disabled', true);
		$('#tgl_lahir').attr('disabled', true);
		$('#konsulat').attr('disabled', true);
		$('#nama_sekolah_aitam').attr('disabled', true);
		$('#kelas_aitam').attr('disabled', true);
		$('#alamat_sekolah_aitam').attr('disabled', true);
		$('#suku').attr('disabled', true);
		$('#kewarganegaraan').attr('disabled', true);
		$('#jalan').attr('disabled', true);
		$('#no_rumah').attr('disabled', true);
		$('#dusun').attr('disabled', true);
		$('#desa').attr('disabled', true);
		$('#kecamatan').attr('disabled', true);
		$('#kabupaten').attr('disabled', true);
		$('#provinsi').attr('disabled', true);
		$('#kd_pos').attr('disabled', true);
		$('#no_tlp').attr('disabled', true);
		$('#no_hp').attr('disabled', true);
		$('#email').attr('disabled', true);
		$('#fb').attr('disabled', true);
		$('#dibesarkan_di').attr('disabled', true);
		$('#pembiaya').attr('disabled', true);
		$('#biaya_perbulan_min').attr('disabled', true);
		$('#biaya_perbulan_max').attr('disabled', true);
		$('#penghasilan').attr('disabled', true);
		$('#gol_darah').attr('disabled', true);
		$('#tinggi_badan').attr('disabled', true);
		$('#berat_badan').attr('disabled', true);
		$('#khitan').attr('disabled', true);
		$('#kondisi_pendidikan').attr('disabled', true);
		$('#ekonomi_keluarga').attr('disabled', true);
		$('#situasi_rumah').attr('disabled', true);
		$('#dekat_dengan').attr('disabled', true);
		$('#hidup_beragama').attr('disabled', true);
		$('#pengelihatan_mata').attr('disabled', true);
		$('#kaca_mata').attr('disabled', true);
		$('#pendengaran').attr('disabled', true);
		$('#operasi').attr('disabled', true);
		$('#sebab').attr('disabled', true);
		$('#kecelakaan').attr('disabled', true);
		$('#akibat').attr('disabled', true);
		$('#alergi').attr('disabled', true);
		$('#thn_fisik').attr('disabled', true);
		$('#kelainan_fisik').attr('disabled', true);
		$('#bid_studi').attr('disabled', true);
		$('#olahraga').attr('disabled', true);
		$('#kesenian').attr('disabled', true);
		$('#keterampilan').attr('disabled', true);
		$('#lain_lain').attr('disabled', true);

		//button
		$('#button_keluarga').hide();
		$('#button_penyakit').hide();
		$('#button_donatur').hide();
		$('#button_kecakapankhusus').hide();
		$('#button_photo').hide();
		$('#button_ijazah').hide();
		$("#ijazahholder").hide();
		$("#ijazahholder").hide();
		$('#button_akelahiran').hide();
		$("#aklahiranholder").hide();
		$("#aklahiranholder").hide();
		$('#button_kk').hide();
		$("#kkholder").hide();
		$("#kkholder").hide();
		$('#button_skhun').hide();
		$("#skhunholder").hide();
		$("#skhunholder").hide();
		$('#button_transkip').hide();
		$("#transkipholder").hide();
		$("#transkipholder").hide();
		$('#button_skbb').hide();
		$("#skbbholder").hide();
		$("#skbbholder").hide();
		$('#button_skes').hide();
		$("#skesholder").hide();
		$("#skesholder").hide();		
}

function filter_tmi(){
	$('#no_registrasi').attr('disabled', false);
	$('#no_stambuk').attr('disabled', false);
	$('#thn_masuk').attr('disabled', false);
	if ($('#hid_page').val() == 'DAFTAR') {
		$('#rayon').attr('disabled', true);
		$('#kamar').attr('disabled', true);
		$('#bagian').attr('disabled', true);
		$('#kel_sekarang').attr('disabled', true);
	}
	else {
		$('#rayon').attr('disabled', false);
		$('#kamar').attr('disabled', false);
		$('#bagian').attr('disabled', false);
		$('#kel_sekarang').attr('disabled', false);
	}
	$('#nisn').attr('disabled', false);
	$('#nisnlokal').attr('disabled', false);
	$('#nama_lengkap').attr('disabled', false);
	$('#nama_arab').attr('disabled', false);
	$('#nama_panggilan').attr('disabled', false);
	$('#hobi').attr('disabled', false);
	$('#uang_jajan_perbulan').attr('disabled', false);
	$('#no_kk').attr('disabled', false);
	$('#nik').attr('disabled', false);
	$('#tempat_lahir').attr('disabled', false);
	$('#tgl_lahir').attr('disabled', false);
	$('#konsulat').attr('disabled', false);
	$('#nama_sekolah_aitam').attr('disabled', true);
	$('#kelas_aitam').attr('disabled', true);
	$('#alamat_sekolah_aitam').attr('disabled', true);
	$('#suku').attr('disabled', false);
	$('#kewarganegaraan').attr('disabled', false);
	$('#jalan').attr('disabled', false);
	$('#no_rumah').attr('disabled', false);
	$('#dusun').attr('disabled', false);
	$('#desa').attr('disabled', false);
	$('#kecamatan').attr('disabled', false);
	$('#kabupaten').attr('disabled', false);
	$('#provinsi').attr('disabled', false);
	$('#kd_pos').attr('disabled', false);
	$('#no_tlp').attr('disabled', false);
	$('#no_hp').attr('disabled', false);
	$('#email').attr('disabled', false);
	$('#fb').attr('disabled', false);
	$('#dibesarkan_di').attr('disabled', false);
	$('#pembiaya').attr('disabled', false);
	$('#biaya_perbulan_min').attr('disabled', false);
	$('#biaya_perbulan_max').attr('disabled', false);
	$('#penghasilan').attr('disabled', false);
	$('#gol_darah').attr('disabled', false);
	$('#tinggi_badan').attr('disabled', false);
	$('#berat_badan').attr('disabled', false);
	$('#khitan').attr('disabled', false);
	$('#kondisi_pendidikan').attr('disabled', false);
	$('#ekonomi_keluarga').attr('disabled', false);
	$('#situasi_rumah').attr('disabled', false);
	$('#dekat_dengan').attr('disabled', false);
	$('#hidup_beragama').attr('disabled', false);
	$('#pengelihatan_mata').attr('disabled', false);
	$('#kaca_mata').attr('disabled', false);
	$('#pendengaran').attr('disabled', false);
	$('#operasi').attr('disabled', false);
	$('#sebab').attr('disabled', false);
	$('#kecelakaan').attr('disabled', false);
	$('#akibat').attr('disabled', false);
	$('#alergi').attr('disabled', false);
	$('#thn_fisik').attr('disabled', false);
	$('#kelainan_fisik').attr('disabled', false);
	$('#bid_studi').attr('disabled', false);
	$('#olahraga').attr('disabled', false);
	$('#kesenian').attr('disabled', false);
	$('#keterampilan').attr('disabled', false);
	$('#lain_lain').attr('disabled', false);
	var no_registrasi		= $('#no_registrasi').val();
	if ( no_registrasi != ''){
		//button
		$('#button_keluarga').show();
		$('#button_penyakit').show();
		$('#button_donatur').show();
		// $('#button_kecakapankhusus').show();
		$('#button_photo').show();
		$('#button_ijazah').show();
		$("#ijazahholder").show();
		$('#button_akelahiran').show();
		$("#aklahiranholder").show();
		$('#button_kk').show();
		$("#kkholder").show();
		$('#button_skhun').show();
		$("#skhunholder").show();
		$('#button_transkip').show();
		$("#transkipholder").show();
		$('#button_skbb').show();
		$("#skbbholder").show();
		$('#button_skes').show();
		$("#skesholder").show();	
	}
	else
	{
				//button
		$('#button_keluarga').show();
		$('#button_penyakit').show();
		$('#button_donatur').show();
		// $('#button_kecakapankhusus').show();
		$('#button_photo').show();
		$('#button_ijazah').show();
		$("#ijazahholder").hide();
		$('#button_akelahiran').show();
		$("#aklahiranholder").hide();
		$('#button_kk').show();
		$("#kkholder").hide();
		$('#button_skhun').show();
		$("#skhunholder").hide();
		$('#button_transkip').show();
		$("#transkipholder").hide();
		$('#button_skbb').show();
		$("#skbbholder").hide();
		$('#button_skes').show();
		$("#skesholder").hide();	
	}
	
}

function filter_aitam(){
	$('#no_registrasi').attr('disabled', false);
	$('#no_stambuk').attr('disabled', true);
	$('#thn_masuk').attr('disabled', true);
	if ($('#hid_page').val() == 'DAFTAR') {
		$('#rayon').attr('disabled', true);
		$('#kamar').attr('disabled', true);
		$('#bagian').attr('disabled', true);
		$('#kel_sekarang').attr('disabled', true);
	}
	else {
		$('#rayon').attr('disabled', false);
		$('#kamar').attr('disabled', false);
		$('#bagian').attr('disabled', false);
		$('#kel_sekarang').attr('disabled', true);
	}
	$('#nisn').attr('disabled', false);
	$('#nisnlokal').attr('disabled', false);
	$('#nama_lengkap').attr('disabled', false);
	$('#nama_arab').attr('disabled', true);
	$('#nama_panggilan').attr('disabled', true);
	$('#hobi').attr('disabled', false);
	$('#uang_jajan_perbulan').attr('disabled', true);
	$('#no_kk').attr('disabled', false);
	$('#nik').attr('disabled', true);
	$('#tempat_lahir').attr('disabled', false);
	$('#tgl_lahir').attr('disabled', false);
	$('#konsulat').attr('disabled', true);
	$('#nama_sekolah_aitam').attr('disabled', false);
	$('#kelas_aitam').attr('disabled', false);
	$('#alamat_sekolah_aitam').attr('disabled', false);
	$('#suku').attr('disabled', false);
	$('#kewarganegaraan').attr('disabled', false);
	$('#jalan').attr('disabled', false);
	$('#no_rumah').attr('disabled', false);
	$('#dusun').attr('disabled', false);
	$('#desa').attr('disabled', false);
	$('#kecamatan').attr('disabled', false);
	$('#kabupaten').attr('disabled', false);
	$('#provinsi').attr('disabled', false);
	$('#kd_pos').attr('disabled', false);
	$('#no_tlp').attr('disabled', false);
	$('#no_hp').attr('disabled', false);
	$('#email').attr('disabled', true);
	$('#fb').attr('disabled', true);
	$('#dibesarkan_di').attr('disabled', true);
	$('#pembiaya').attr('disabled', true);
	$('#biaya_perbulan_min').attr('disabled', true);
	$('#biaya_perbulan_max').attr('disabled', true);
	$('#penghasilan').attr('disabled', true);
	$('#gol_darah').attr('disabled', true);
	$('#tinggi_badan').attr('disabled', true);
	$('#berat_badan').attr('disabled', true);
	$('#khitan').attr('disabled', true);
	$('#kondisi_pendidikan').attr('disabled', true);
	$('#ekonomi_keluarga').attr('disabled', true);
	$('#situasi_rumah').attr('disabled', true);
	$('#dekat_dengan').attr('disabled', true);
	$('#hidup_beragama').attr('disabled', true);
	$('#pengelihatan_mata').attr('disabled', true);
	$('#kaca_mata').attr('disabled', true);
	$('#pendengaran').attr('disabled', true);
	$('#operasi').attr('disabled', true);
	$('#sebab').attr('disabled', true);
	$('#kecelakaan').attr('disabled', true);
	$('#akibat').attr('disabled', true);
	$('#alergi').attr('disabled', true);
	$('#thn_fisik').attr('disabled', true);
	$('#kelainan_fisik').attr('disabled', true);

	var no_registrasi		= $('#no_registrasi').val();
	if ( no_registrasi != ''){
			//button
		$('#button_keluarga').show();
		$('#button_penyakit').show();
		$('#button_donatur').show();
		// $('#button_kecakapankhusus').show();
		$('#button_photo').show();
		$('#button_ijazah').show();
		$("#ijazahholder").show();
		$('#button_akelahiran').show();
		$("#aklahiranholder").show();
		$('#button_kk').show();
		$("#kkholder").show();
		$('#button_skhun').show();
		$("#skhunholder").show();
		$('#button_transkip').show();
		$("#transkipholder").show();
		$('#button_skbb').show();
		$("#skbbholder").show();
		$('#button_skes').show();
		$("#skesholder").show();	
	}
	else
	{
			//button
		$('#button_keluarga').show();
		$('#button_penyakit').show();
		$('#button_donatur').show();
		$('#button_kecakapankhusus').hide();
		$('#button_photo').show();
		$('#button_ijazah').show();
		$("#ijazahholder").hide();
		$('#button_akelahiran').show();
		$("#aklahiranholder").hide();
		$('#button_kk').show();
		$("#kkholder").hide();
		$('#button_skhun').hide();
		$("#skhunholder").hide();
		$('#button_transkip').hide();
		$("#transkipholder").hide();
		$('#button_skbb').hide();
		$("#skbbholder").hide();
		$('#button_skes').hide();
		$("#skesholder").hide();
	}
}

function filter_tab_modal() {
	if ($('#kategori_santri').val() != 'TMI') {
		$('#tabpembiayaan').addClass("hidden");
		$('#tabsekolah').removeClass("hidden");
		$('#tabfisik').addClass("hidden");
		$('#tabkecakapan').addClass("hidden");
		$('#tab_pembiayaan').addClass("hidden");
		$('#tab_sekolah').removeClass("hidden");
		$('#tab_fisik').addClass("hidden");
		$('#tab_kecakapan').addClass("hidden");
		$('#cnama_arab').addClass("hidden");
		$('#cnama_panggilan').addClass("hidden");
		$('#cuang_jajan_perbulan').addClass("hidden");
		$('#cnik').addClass("hidden");
		$('#ckonsulat').addClass("hidden");
	}
	else {
		$('#tabpembiayaan').removeClass("hidden");
		$('#tabsekolah').addClass("hidden");
		$('#tabfisik').removeClass("hidden");
		$('#tabkecakapan').removeClass("hidden");
		$('#tab_pembiayaan').removeClass("hidden");
		$('#tab_sekolah').addClass("hidden");
		$('#tab_fisik').removeClass("hidden");
		$('#tab_kecakapan').removeClass("hidden");
		$('#cnama_arab').removeClass("hidden");
		$('#cnama_panggilan').removeClass("hidden");
		$('#cuang_jajan_perbulan').removeClass("hidden");
		$('#cnik').removeClass("hidden");
		$('#ckonsulat').removeClass("hidden");
	}
}

var validate_add_santri = function() {
	
	var form = $('#add_santri');
	var error2 = $('.alert-danger', form);
	var success2 = $('.alert-success', form);

	form.validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		ignore: "",  // validate all fields including form hidden input
		// rules: {
		// 	txt_da_nama: {                    
		// 		required: true
		// 	},
		// 	txt_da_pendidikan: {
		// 		required: true
		// 	},
		// 	dtp_da_birth: {
		// 		required: true
		// 	},
		// },

		invalidHandler: function (event, validator) { //display error alert on form submit              
			success2.hide();
			error2.show();
			App.scrollTo(error2, -200);
		},

		errorPlacement: function (error, element) { // render error placement for each input type
			var icon = $(element).parent('.input-icon').children('i');
			icon.removeClass('fa-check').addClass("fa-warning");  
			icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
		},

		highlight: function (element) { // hightlight error inputs
			$(element)
				.closest('.input-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
		},

		unhighlight: function (element) { // revert the change done by hightlight
			
		},

		success: function (label, element) {
			var icon = $(element).parent('.input-icon').children('i');
			$(element).closest('.input-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
			icon.removeClass("fa-warning").addClass("fa-check");
		},

		submitHandler: function (form) {
			success2.show();
			error2.hide();
			form[0].submit(); // submit the form
		}
	});
}

function clearValidate_add_santri(){
	
		$("#add_santri div").removeClass('has-error');
		$("#add_santri i").removeClass('fa-warning');
	
		$("#add_santri div").removeClass('has-success');
		$("#add_santri i").removeClass('fa-check');
	
		document.getElementById("add_santri").reset();
}

function addSantri(){
	$('#hiddenidgedung').hide();
	$('#spansearchclosegedung').hide();
	$('#spansearchgedung').hide();
	$('#hiddenidKamar').hide();
	$('#spansearchcloseKamar').hide();
	$('#spansearchKamar').hide();
	$('#hiddenidKelas').hide();
	$('#spansearchcloseKelas').hide();
	$('#spansearchKelas').hide();
	$('#hiddenidBagian').hide();
	$('#spansearchcloseBagian').hide();
	$('#spansearchBagian').hide();
	kosong();
	mati();
	mati_kel();
	clearValidate_add_santri();
	$('.nav-tabs a[href="#tab_santri"]').tab('show');
	$('#addto_button_header').hide();
	$('#addto_button_footer').hide();
	$('#addtoTMI_button_footer').hide();
	$('#save_button_header').show();
	$('#save_button_footer').show();
	$('#save_button_header').text('SIMPAN');
	$('#save_button_footer').text('SIMPAN');
	
	filter_tab_modal();
	$('#Modal_add_Santri').modal('show');
	cek_kt();
}

function cek_kt(){ //cek jika kategri onchange
	var kategori = $('#hid_kategori_santri').val();
		if(kategori=='TMI'){
		filter_tmi();
	}
	else if(kategori=='AITAM')
	{
		filter_aitam();
	}
	// clearValidate_add_santri();
}

function svSantri() {

	if ($('#hid_kategori_santri').val() == 'TMI') {
		var url = 'Pendaftaran'
	}
	else {
		var url = 'Pendaftaran/aitam'
	}

	if ($("#add_santri").valid() == true) {

		//#region data keluarga
		var item_data_tb_list_keluarga = "";

		var oTable = document.getElementById('tb_list_keluarga');
		var rowLength = oTable.rows.length;
		var isitablekeluarga = $('#hid_jumlah_item_keluarga').val();
		if (isitablekeluarga == 0) {
			rowLength = rowLength - 2;
		} else {
			rowLength = rowLength - 1;
		}

		for (i = 1; i <= rowLength; i++) {

			var irow = oTable.rows.item(i);

			item_data_tb_list_keluarga += irow.cells[1].innerHTML + "#"; //kategori_keluarga
			item_data_tb_list_keluarga += irow.cells[2].innerHTML + "#"; //nama_keluarga
			item_data_tb_list_keluarga += irow.cells[3].innerHTML + "#"; //nik_keluarga
			item_data_tb_list_keluarga += irow.cells[4].innerHTML + "#"; //binbinti_keluarga
			item_data_tb_list_keluarga += irow.cells[5].innerHTML + "#"; //jenis_kelamin_keluarga
			item_data_tb_list_keluarga += irow.cells[6].innerHTML + "#"; //status_pernikahan_keluarga
			item_data_tb_list_keluarga += irow.cells[7].innerHTML + "#"; //tgl_wafat_keluarga
			item_data_tb_list_keluarga += irow.cells[8].innerHTML + "#"; //umur_keluarga
			item_data_tb_list_keluarga += irow.cells[9].innerHTML + "#"; //hari_keluarga
			item_data_tb_list_keluarga += irow.cells[10].innerHTML + "#"; //sebab_wafat_keluarga
			item_data_tb_list_keluarga += irow.cells[11].innerHTML + "#"; //status_perkawinan_ibu_keluarga
			item_data_tb_list_keluarga += irow.cells[12].innerHTML + "#"; //pedapatan_ibu_keluarga
			item_data_tb_list_keluarga += irow.cells[13].innerHTML + "#"; //sebab_tidak_bekerja_keluarga
			item_data_tb_list_keluarga += irow.cells[14].innerHTML + "#"; //keahlian_keluarga
			item_data_tb_list_keluarga += irow.cells[15].innerHTML + "#"; //status_rumah_keluarga
			item_data_tb_list_keluarga += irow.cells[16].innerHTML + "#"; //kondisi_rumah_keluarga
			item_data_tb_list_keluarga += irow.cells[17].innerHTML + "#"; //jml_asuh
			item_data_tb_list_keluarga += irow.cells[18].innerHTML + "#"; //pekerjaan_keluarga
			item_data_tb_list_keluarga += irow.cells[19].innerHTML + "#"; //pendidikan_terakhir
			item_data_tb_list_keluarga += irow.cells[20].innerHTML + "#"; //agama_keluarga
			item_data_tb_list_keluarga += irow.cells[21].innerHTML + "#"; //suku_keluarga
			item_data_tb_list_keluarga += irow.cells[22].innerHTML + "#"; //kewarganegaraan_keluarga
			item_data_tb_list_keluarga += irow.cells[23].innerHTML + "#"; //ormas_keluarga
			item_data_tb_list_keluarga += irow.cells[24].innerHTML + "#"; //orpol_keluarga
			item_data_tb_list_keluarga += irow.cells[25].innerHTML + "#"; //kedudukandimasyarakat_keluarga
			item_data_tb_list_keluarga += irow.cells[26].innerHTML + "#"; //tahun_lulus_keluarga
			item_data_tb_list_keluarga += irow.cells[27].innerHTML + "#"; //nostambuk_keluarga
			item_data_tb_list_keluarga += irow.cells[28].innerHTML + "#"; //tempat_lahir_keluarga
			item_data_tb_list_keluarga += irow.cells[29].innerHTML + "#"; //tgl_lahir_keluarga
			item_data_tb_list_keluarga += irow.cells[30].innerHTML + "#"; //hubungan_keluarga
			item_data_tb_list_keluarga += irow.cells[31].innerHTML + "#"; //keterangan_keluarga
			item_data_tb_list_keluarga += irow.cells[32].innerHTML + "#"; //ktp_keluarga

			item_data_tb_list_keluarga += ';';
		}
		$('#hid_table_item_Keluarga').val(item_data_tb_list_keluarga);
		//#endregion data keluarga

		//#region  data Penyakit
		var item_data_tb_list_penyakit = "";

		var oTable = document.getElementById('tb_list_penyakit');
		var rowLength = oTable.rows.length;
		var isitablepenyakit = $('#hid_jumlah_item_penyakit').val();
		if (isitablepenyakit == 0) {
			rowLength = rowLength - 2;
		} else {
			rowLength = rowLength - 1;
		}

		for (i = 1; i <= rowLength; i++) {

			var irow = oTable.rows.item(i);

			item_data_tb_list_penyakit += irow.cells[1].innerHTML + "#"; //nama_penyakit
			item_data_tb_list_penyakit += irow.cells[2].innerHTML + "#"; //thn_penyakit
			item_data_tb_list_penyakit += irow.cells[3].innerHTML + "#"; //kategori_penyakit
			item_data_tb_list_penyakit += irow.cells[4].innerHTML + "#"; //tipe_penyakit
			item_data_tb_list_penyakit += irow.cells[5].innerHTML + "#"; //lamp_bukti

			item_data_tb_list_penyakit += ';';
		}
		$('#hid_table_item_penyakit').val(item_data_tb_list_penyakit);
		var item_data_tb_list_penyakit_input = $('#hid_table_item_penyakit').val();
		//#endregion penyakit

		//#region  data donatur
		var item_data_tb_list_donatur = "";

		var oTable = document.getElementById('tb_list_donatur');
		var rowLength = oTable.rows.length;
		var isitabledonatur = $('#hid_jumlah_item_donatur').val();
		if (isitabledonatur == 0) {
			rowLength = rowLength - 2;
		} else {
			rowLength = rowLength - 1;
		}

		for (i = 1; i <= rowLength; i++) {

			var irow = oTable.rows.item(i);

			item_data_tb_list_donatur += irow.cells[1].innerHTML + "#"; //id_donatur

			item_data_tb_list_donatur += ';';
		}
		$('#hid_table_item_donatur').val(item_data_tb_list_donatur);
		var item_data_tb_list_donatur_input = $('#hid_table_item_donatur').val();
		//#endregion donatur


		var iform = $('#add_santri')[0];
		var data = new FormData(iform);
		cattt = $('#kategori_santri').val();
		cekstatus = $('#no_registrasi').val();
		if (cekstatus != '') {
			msg = "Update Data Berhasil"
		}
		else {
			msg = "Simpan Data Berhasil"
		}
		$.ajax({

			type: "POST",
			url: base_url + "pendaftaran/simpan_siswa",
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

						window.location = base_url + url;
					}
				});
			}
		});
	}
}

function view(no_registrasi) {
	clearValidate_add_santri();
	$('.nav-tabs a[href="#tab_santri"]').tab('show');

	if ($('#hid_page').val() == 'DAFTAR') {
		$('#hiddenidgedung').hide();
		$('#spansearchclosegedung').hide();
		$('#spansearchgedung').show();
		$('#hiddenidKamar').hide();
		$('#spansearchcloseKamar').hide();
		$('#spansearchKamar').show();
		if ($('#kategori_santri').val() != 'TMI') {
			$('#hiddenidKelas').hide();
			$('#spansearchcloseKelas').hide();
			$('#spansearchKelas').hide();
		}
		else {
			$('#hiddenidKelas').hide();
			$('#spansearchcloseKelas').hide();
			$('#spansearchKelas').show();
		}

		$('#hiddenidBagian').hide();
		$('#spansearchcloseBagian').hide();
		$('#spansearchBagian').show();
	}
	else {
		$('#hiddenidgedung').hide();
		$('#spansearchclosegedung').hide();
		$('#spansearchgedung').hide();
		$('#hiddenidKamar').hide();
		$('#spansearchcloseKamar').hide();
		$('#spansearchKamar').hide();
		$('#hiddenidKelas').hide();
		$('#spansearchcloseKelas').hide();
		$('#spansearchKelas').hide();
		$('#hiddenidBagian').hide();
		$('#spansearchcloseBagian').hide();
		$('#spansearchBagian').hide();
	}

	kosong();
	$('#image-holder').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_santri/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);

			$('#kategori_santri').val(data['kategori']);
			$('#kategori_update').val(data['kategori']);
			$('#no_registrasi').val(data['no_registrasi']);
			$('#no_stambuk').val(data['no_stambuk']);
			$('#thn_masuk').val(data['thn_masuk']);
			$('#rayon').val(data['rayon']);
			$('#kamar').val(data['kamar']);
			$('#bagian').val(data['bagian']);
			$('#kel_sekarang').val(data['kel_sekarang']);
			$('#nisn').val(data['nisn']);
			$('#nisnlokal').val(data['nisnlokal']);
			$('#nama_lengkap').val(data['nama_lengkap']);
			$('#nama_arab').val(data['nama_arab']);
			$('#nama_panggilan').val(data['nama_panggilan']);
			$('#hobi').val(data['hobi']);
			$('#uang_jajan_perbulan').val(data['uang_jajan_perbulan']);
			$('#no_kk').val(data['no_kk']);
			$('#nik').val(data['nik']);
			$('#tempat_lahir').val(data['tempat_lahir']);
			$('#tgl_lahir').val(data['tgl_lahir']);;
			$('#konsulat').val(data['konsulat']);
			$('#nama_sekolah_aitam').val(data['nama_sekolah']);
			$('#kelas_aitam').val(data['kelas_sekolah']);
			$('#alamat_sekolah_aitam').val(data['alamat_sekolah']);
			$('#suku').val(data['suku']);
			$('#kewarganegaraan').val(data['kewarganegaraan']);
			$('#jalan').val(data['jalan']);
			$('#no_rumah').val(data['no_rumah']);
			$('#dusun').val(data['dusun']);
			$('#desa').val(data['desa']);
			$('#kecamatan').val(data['kecamatan']);
			$('#kabupaten').val(data['kabupaten']);
			$('#provinsi').val(data['provinsi']);
			$('#kd_pos').val(data['kd_pos']);
			$('#no_tlp').val(data['no_tlp']);
			$('#no_hp').val(data['no_hp']);
			$('#email').val(data['email']);
			$('#fb').val(data['fb']);
			$('#dibesarkan_di').val(data['dibesarkan_di']);
			$('#pembiaya').val(data['pembiaya']);
			$('#biaya_perbulan_min').val(data['biaya_perbulan_min']);
			$('#biaya_perbulan_max').val(data['biaya_perbulan_max']);
			$('#penghasilan').val(data['penghasilan']);
			$('#gol_darah').val(data['gol_darah']);
			$('#tinggi_badan').val(data['tinggi_badan']);
			$('#berat_badan').val(data['berat_badan']);
			$('#khitan').val(data['khitan']);
			$('#kondisi_pendidikan').val(data['kondisi_pendidikan']);
			$('#ekonomi_keluarga').val(data['ekonomi_keluarga']);
			$('#situasi_rumah').val(data['situasi_rumah']);
			$('#dekat_dengan').val(data['dekat_dengan']);
			$('#hidup_beragama').val(data['hidup_beragama']);
			$('#pengelihatan_mata').val(data['pengelihatan_mata']);
			$('#kaca_mata').val(data['kaca_mata']);
			$('#pendengaran').val(data['pendengaran']);
			$('#operasi').val(data['operasi']);
			$('#sebab').val(data['sebab']);
			$('#kecelakaan').val(data['kecelakaan']);
			$('#akibat').val(data['akibat']);
			$('#alergi').val(data['alergi']);
			$('#thn_fisik').val(data['thn_fisik']);
			$('#kelainan_fisik').val(data['kelainan_fisik']);
			$('#hid_Xaitam').val(data['aitam']);
			$('#Modal_add_Santri').modal('show');
			$('#save_button_header').hide();
			$('#save_button_footer').hide();
			$('#addto_button_header').show();
			$('#addto_button_footer').show();
			$('#addtoTMI_button_footer').hide();
			$('#button_keluarga').hide();
			$('#button_penyakit').hide();
			$('#button_kecakapankhusus').hide();
			$('#button_donatur').hide();
			$('#button_photo').hide();
			mati();
			mati_kel();
			filter_tab_modal();
			$('#rayon').attr('disabled', false);
			if ($('#kategori_santri').val() != 'TMI') {
				$('#kel_sekarang').attr('disabled', true);
			}
			else {
				$('#kel_sekarang').attr('disabled', false);
			}
			$('#kamar').attr('disabled', false);
			$('#bagian').attr('disabled', false);
			
			$('#no_registrasi').attr('disabled', false);
			//show photo
			if (data['lamp_photo'] != null) {

				var image_holder = $("#image-holder");

				$("<img />", {
					"src": base_url + "./assets/images/fileupload/santri/" + data['lamp_photo'],
					"class": "thumb-image",
					"name": "img_photo"
				}).appendTo(image_holder);
			}
			//show ijazah
			if (data['lamp_ijazah'] != null) {
				var image_holder = $("#ijazahholder");
				$('#ijazahholder').attr("href", base_url + 'assets/images/fileupload/ijazah/' + data['lamp_ijazah']);
				image_holder.show();

			}
			else {

				$('.cijazah').hide();
			}
			//show Akta Kelahiran 
			if (data['lamp_akta_kelahiran'] != null) {
				var image_holder = $("#aklahiranholder");
				$('#aklahiranholder').attr("href", base_url + 'assets/images/fileupload/akte_kelahiran/' + data['lamp_akta_kelahiran']);
				image_holder.show();
			}
			else {

				$('.cakelahiran').hide();
			}
			//show kk 
			if (data['lamp_kk'] != null) {
				var image_holder = $("#kkholder");
				$('#kkholder').attr("href", base_url + 'assets/images/fileupload/kartukeluarga/' + data['lamp_kk']);
				image_holder.show();
			}
			else {

				$('.ckk').hide();
			}
			//show skhun 
			if (data['lamp_skhun'] != null) {
				var image_holder = $("#skhunholder");
				$('#skhunholder').attr("href", base_url + 'assets/images/fileupload/skhun/' + data['lamp_skhun']);
				image_holder.show();
			}
			else {

				$('.cskhun').hide();
			}
			//show ranskip 
			if (data['lamp_transkip_nilai'] != null) {
				var image_holder = $("#transkipholder");
				$('#transkipholder').attr("href", base_url + 'assets/images/fileupload/transkip_nilai/' + data['lamp_transkip_nilai']);
				image_holder.show();
			}
			else {

				$('.ctranskip').hide();
			}
			//show skbb 
			if (data['lamp_skkb'] != null) {
				var image_holder = $("#skbbholder");
				$('#skbbholder').attr("href", base_url + 'assets/images/fileupload/skb/' + data['lamp_skkb']);
				image_holder.show();
			}
			else {

				$('.cskbb').hide();
			}
			//show skes 
			if (data['lamp_surat_kesehatan'] != null) {
				var image_holder = $("#skesholder");
				$('#skesholder').attr("href", base_url + 'assets/images/fileupload/surat_kesehatan/' + data['lamp_surat_kesehatan']);
				image_holder.show();
			}
			else {

				$('.cskes').hide();
			}
		}
	});
	//show Keluarga
	$('#tb_list_keluarga tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_keluarga/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {
			$.each(data, function (index, value) {
				var kdkeluarga = makeid();
				var str_data = kdkeluarga + '#' + value['kategori'] + '#' + value['nama'] + '#' + value['nik'] + '#' + value['binbinti'] + '#' + value['jenis_kelamin'] + '#' + value['status'] + '#' + value['tgl_wafat'] + '#' + value['umur'] + '#' + value['hari'] + '#' + value['sebab_wafat'] + '#' + value['status_perkawinan'] + '#' + value['pendapatan_ibu'] + '#' + value['sebab_tdk_bekerja'] + '#' + value['keahlian'] + '#' + value['status_rumah'] + '#' + value['kondisi_rumah'] + '#' + value['jml_asuh'] + '#' + value['pekerjaan'] + '#' + value['pend_terakhir'] + '#' + value['agama'] + '#' + value['suku'] + '#' + value['kewarganegaraan'] + '#' + value['ormas'] + '#' + value['orpol'] + '#' + value['kedukmas'] + '#' + value['thn_lulus'] + '#' + value['no_stambuk_alumni'] + '#' + value['tempat_lahir'] + '#' + value['tgl_lahir_keluarga'] + '#' + value['hub_kel'] + '#' + value['keterangan'] + '#' + value['ktp'];
				var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='viewdetailkeluarga(\"" + str_data + "\")'><i class='fa fa-file-o'></i></a>&nbsp;";
				var kategori = $('#hid_kategori_santri').val();
				if (kategori == 'TMI') {
					var linkfile = "<a href='./assets/images/fileupload/ktp/" + value['ktp'] + "' target='_blank'>" + value['ktp'] + "</a>";
				}
				else if (kategori == 'AITAM') {
					var linkfile = "<a href='../assets/images/fileupload/ktp/" + value['ktp'] + "' target='_blank'>" + value['ktp'] + "</a>";
				}
				var row_count = $('#tb_list_keluarga tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + value['kategori'] + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['kategori'] + "</td>";
				content_data += "<td>" + value['nama'] + "</td>";
				content_data += "<td>" + value['nik'] + "</td>";
				content_data += "<td>" + value['binbinti'] + "</td>";
				content_data += "<td>" + value['jenis_kelamin'] + "</td>";
				content_data += "<td>" + value['status'] + "</td>";
				content_data += "<td class='hidden'>" + value['tgl_wafat'] + "</td>";
				content_data += "<td class='hidden'>" + value['umur'] + "</td>";
				content_data += "<td class='hidden'>" + value['hari'] + "</td>";
				content_data += "<td class='hidden'>" + value['sebab_wafat'] + "</td>";
				content_data += "<td class='hidden'>" + value['status_perkawinan'] + "</td>";
				content_data += "<td class='hidden'>" + value['pendapatan_ibu'] + "</td>";
				content_data += "<td class='hidden'>" + value['sebab_tdk_bekerja'] + "</td>";
				content_data += "<td class='hidden'>" + value['keahlian'] + "</td>";
				content_data += "<td class='hidden'>" + value['status_rumah'] + "</td>";
				content_data += "<td class='hidden'>" + value['kondisi_rumah'] + "</td>";
				content_data += "<td class='hidden'>" + value['jml_asuh'] + "</td>";
				content_data += "<td>" + value['pekerjaan'] + "</td>";
				content_data += "<td>" + value['pend_terakhir'] + "</td>";
				content_data += "<td class='hidden'>" + value['agama'] + "</td>";
				content_data += "<td class='hidden'>" + value['suku'] + "</td>";
				content_data += "<td class='hidden'>" + value['kewarganegaraan'] + "</td>";
				content_data += "<td class='hidden'>" + value['ormas'] + "</td>";
				content_data += "<td class='hidden'>" + value['orpol'] + "</td>";
				content_data += "<td class='hidden'>" + value['kedukmas'] + "</td>";
				content_data += "<td class='hidden'>" + value['thn_lulus'] + "</td>";
				content_data += "<td class='hidden'>" + value['no_stambuk_alumni'] + "</td>";
				content_data += "<td class='hidden'>" + value['tempat_lahir'] + "</td>";
				content_data += "<td>" + value['tgl_lahir_keluarga'] + "</td>";
				content_data += "<td>" + value['hub_kel'] + "</td>";
				content_data += "<td class='hidden'>" + value['keterangan'] + "</td>";
				content_data += "<td class='hidden'>" + value['ktp'] + "</td>";
				content_data += "<td>" + linkfile + "</td>";
				content_data += "<td>" + strbutton + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_keluarga tbody').html(content_data);
				}
				else {

					$('#tb_list_keluarga tbody').append(content_data);
				}
			});
			// }
		}
	});
	//show Penyakit
	$('#tb_list_penyakit tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_penyakit/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {
			$.each(data, function (index, value) {
				var kdpenyakit = makeid();
				var row_count = $('#tb_list_penyakit tr.tb-detail').length;
				var str_data = kdpenyakit + '#' + value['nama_penyakit'] + '#' + value['thn_penyakit'] + '#' + value['kategori_penyakit'] + '#' + value['tipe_penyakit'] + '#' + value['lamp_bukti'];
				var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='viewdetailpenyakit(\"" + str_data + "\")'><i class='fa fa-file-o'></i></a>&nbsp;";
				var kategori = $('#hid_kategori_santri').val();
				if (kategori == 'TMI') {
					var linkfile = "<a href='./assets/images/fileupload/lamp_penyakit/" + value['lamp_bukti'] + "' target='_blank'>" + value['lamp_bukti'] + "</a>";
				}
				else if (kategori == 'AITAM') {
					var linkfile = "<a href='../assets/images/fileupload/lamp_penyakit/" + value['lamp_bukti'] + "' target='_blank'>" + value['lamp_bukti'] + "</a>";
				}
				var row_count = $('#tb_list_penyakit tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + value['nama_penyakit'] + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['nama_penyakit'] + "</td>";
				content_data += "<td>" + value['thn_penyakit'] + "</td>";
				content_data += "<td>" + value['kategori_penyakit'] + "</td>";
				content_data += "<td>" + value['tipe_penyakit'] + "</td>";
				content_data += "<td class='hidden'>" + value['lamp_bukti'] + "</td>";
				content_data += "<td>" + linkfile + "</td>";
				content_data += "<td>" + strbutton + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_penyakit tbody').html(content_data);
				}
				else {

					$('#tb_list_penyakit tbody').append(content_data);
				}
			});
			// }
		}
	});
	//show kecakapan khusus
	$('#tb_list_kckhusus tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_kecakapankhusus/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			if (data != null) {

				$('#bid_studi').val(data['bid_studi']);
				$('#olahraga').val(data['olahraga']);
				$('#kesenian').val(data['kesenian']);
				$('#keterampilan').val(data['keterampilan']);
				$('#lain_lain').val(data['lain_lain']);

			}

		}
	});

	//show donatur
	$('#tb_list_donatur tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_donatur/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {
			$.each(data, function (index, value) {
				var kddonatur = makeid();
				var row_count = $('#tb_list_donatur tr.tb-detail').length;
				var str_data = kddonatur + '#' + value['nama_donatur'] + '#' + value['kategori'];
				// var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='viewdetaildonatur(\"" + str_data + "\")'><i class='fa fa-file-o'></i></a>&nbsp;";

				var row_count = $('#tb_list_donatur tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + value['nama_donatur'] + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['id_donatur'] + "</td>";
				content_data += "<td>" + value['nama_donatur'] + "</td>";
				content_data += "<td>" + value['kategori'] + "</td>";
				content_data += "<td>" + "-" + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_donatur tbody').html(content_data);
				}
				else {

					$('#tb_list_donatur tbody').append(content_data);
				}
			});
			// }
		}
	});
}

function edit(no_registrasi) {
	clearValidate_add_santri();
	$('.nav-tabs a[href="#tab_santri"]').tab('show');
	if ($('#hid_page').val() == 'DAFTAR') {
		$('#hiddenidgedung').hide();
		$('#spansearchclosegedung').hide();
		$('#spansearchgedung').hide();
		$('#hiddenidKamar').hide();
		$('#spansearchcloseKamar').hide();
		$('#spansearchKamar').hide();
		$('#hiddenidKelas').hide();
		$('#spansearchcloseKelas').hide();
		$('#spansearchKelas').hide();
		$('#hiddenidBagian').hide();
		$('#spansearchcloseBagian').hide();
		$('#spansearchBagian').hide();
	}
	else {
		$('#hiddenidgedung').hide();
		$('#spansearchclosegedung').hide();
		$('#spansearchgedung').show();
		$('#hiddenidKamar').hide();
		$('#spansearchcloseKamar').hide();
		$('#spansearchKamar').show();
		if ($('#kategori_santri').val() != 'TMI') {
			$('#hiddenidKelas').hide();
			$('#spansearchcloseKelas').hide();
			$('#spansearchKelas').hide();
		}
		else {
			$('#hiddenidKelas').hide();
			$('#spansearchcloseKelas').hide();
			$('#spansearchKelas').show();
		}
		$('#hiddenidBagian').hide();
		$('#spansearchcloseBagian').hide();
		$('#spansearchBagian').show();
	}
	kosong();
	$('#image-holder').html('');
	$('#addto_button_header').hide();
	$('#addto_button_footer').hide();
	$('#addtoTMI_button_footer').hide();
	$('#save_button_header').show();
	$('#save_button_footer').show();
	$('#save_button_footer').text('PERBAHARUI');
	$('#save_button_header').text('PERBAHARUI');
	$.ajax({

		type: "POST",
		url: base_url + "pendaftaran/get_data_santri/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			$('#kategori_update').val(data['kategori']);//untuk membaca kategori saat update
			$('#kategori_santri').val(data['kategori']);
			$('#no_registrasi').val(data['no_registrasi']);
			$('#no_stambuk').val(data['no_stambuk']);
			$('#thn_masuk').val(data['thn_masuk']);
			$('#rayon').val(data['rayon']);
			$('#kamar').val(data['kamar']);
			$('#bagian').val(data['bagian']);
			$('#kel_sekarang').val(data['kel_sekarang']);
			$('#nisn').val(data['nisn']);
			$('#nisnlokal').val(data['nisnlokal']);
			$('#nama_lengkap').val(data['nama_lengkap']);
			$('#nama_arab').val(data['nama_arab']);
			$('#nama_panggilan').val(data['nama_panggilan']);
			$('#hobi').val(data['hobi']);
			$('#uang_jajan_perbulan').val(data['uang_jajan_perbulan']);
			$('#no_kk').val(data['no_kk']);
			$('#nik').val(data['nik']);
			$('#tempat_lahir').val(data['tempat_lahir']);
			$('#tgl_lahir').val(data['tgl_lahir']);;
			$('#konsulat').val(data['konsulat']);
			$('#nama_sekolah_aitam').val(data['nama_sekolah']);
			$('#kelas_aitam').val(data['kelas_sekolah']);
			$('#alamat_sekolah_aitam').val(data['alamat_sekolah']);
			$('#suku').val(data['suku']);
			$('#kewarganegaraan').val(data['kewarganegaraan']);
			$('#jalan').val(data['jalan']);
			$('#no_rumah').val(data['no_rumah']);
			$('#dusun').val(data['dusun']);
			$('#desa').val(data['desa']);
			$('#kecamatan').val(data['kecamatan']);
			$('#kabupaten').val(data['kabupaten']);
			$('#provinsi').val(data['provinsi']);
			$('#kd_pos').val(data['kd_pos']);
			$('#no_tlp').val(data['no_tlp']);
			$('#no_hp').val(data['no_hp']);
			$('#email').val(data['email']);
			$('#fb').val(data['fb']);
			$('#dibesarkan_di').val(data['dibesarkan_di']);
			$('#pembiaya').val(data['pembiaya']);
			$('#biaya_perbulan_min').val(data['biaya_perbulan_min']);
			$('#biaya_perbulan_max').val(data['biaya_perbulan_max']);
			$('#penghasilan').val(data['penghasilan']);
			$('#gol_darah').val(data['gol_darah']);
			$('#tinggi_badan').val(data['tinggi_badan']);
			$('#berat_badan').val(data['berat_badan']);
			$('#khitan').val(data['khitan']);
			$('#kondisi_pendidikan').val(data['kondisi_pendidikan']);
			$('#ekonomi_keluarga').val(data['ekonomi_keluarga']);
			$('#situasi_rumah').val(data['situasi_rumah']);
			$('#dekat_dengan').val(data['dekat_dengan']);
			$('#hidup_beragama').val(data['hidup_beragama']);
			$('#pengelihatan_mata').val(data['pengelihatan_mata']);
			$('#kaca_mata').val(data['kaca_mata']);
			$('#pendengaran').val(data['pendengaran']);
			$('#operasi').val(data['operasi']);
			$('#sebab').val(data['sebab']);
			$('#kecelakaan').val(data['kecelakaan']);
			$('#akibat').val(data['akibat']);
			$('#alergi').val(data['alergi']);
			$('#thn_fisik').val(data['thn_fisik']);
			$('#kelainan_fisik').val(data['kelainan_fisik']);
			$('#hid_Xaitam').val(data['aitam']);
			filter_tab_modal();
			$('#Modal_add_Santri').modal('show');
			//show photo
			if (data['lamp_photo'] != null) {
				$("#TfileUpload").val('');

				var image_holder = $("#image-holder");

				$("<img />", {
					"src": base_url + "./assets/images/fileupload/santri/" + data['lamp_photo'],
					"class": "thumb-image",
					"name": "img_photo"
				}).appendTo(image_holder);
				$("#TfileUpload").val(data['lamp_photo']);
			}
			//show ijazah
			$("#TfileUpload_ijazah").val('');
			if (data['lamp_ijazah'] != null) {
				var image_holder = $("#ijazahholder");
				var image_holder = $("#ijazahholder");
				$('#ijazahholder').attr("href", base_url + 'assets/images/fileupload/ijazah/' + data['lamp_ijazah']);
				image_holder.show();
				$("#TfileUpload_ijazah").val(data['lamp_ijazah']);
			}
			else {

				$('.cijazah').hide();
			}
			//show Akta Kelahiran 
			$("#TfileUpload_akelahiran").val('');
			if (data['lamp_akta_kelahiran'] != null) {
				var image_holder = $("#aklahiranholder");
				$('#aklahiranholder').attr("href", base_url + 'assets/images/fileupload/akte_kelahiran/' + data['lamp_akta_kelahiran']);
				image_holder.show();
				$("#TfileUpload_akelahiran").val(data['lamp_akta_kelahiran']);
			}
			else {

				$('.cakelahiran').hide();
			}
			//show kk 
			$("#TfileUpload_kk").val('');
			if (data['lamp_kk'] != null) {
				$("#TfileUpload_kk").val(data['lamp_kk']);
				var image_holder = $("#kkholder");
				$('#kkholder').attr("href", base_url + 'assets/images/fileupload/kartukeluarga/' + data['lamp_kk']);
				image_holder.show();
			}
			else {

				$('.ckk').hide();
			}
			//show skhun 
			$("#TfileUpload_skhun").val('');
			if (data['lamp_skhun'] != null) {
				$("#TfileUpload_skhun").val(data['lamp_skhun']);
				var image_holder = $("#skhunholder");
				$('#skhunholder').attr("href", base_url + 'assets/images/fileupload/skhun/' + data['lamp_skhun']);
				image_holder.show();
			}
			else {
				$('.cskhun').hide();
			}
			//show ranskip 
			$("#TfileUpload_transkip").val('');
			if (data['lamp_transkip_nilai'] != null) {
				$("#TfileUpload_transkip").val(data['lamp_transkip_nilai']);
				var image_holder = $("#transkipholder");
				$('#transkipholder').attr("href", base_url + 'assets/images/fileupload/transkip_nilai/' + data['lamp_transkip_nilai']);
				image_holder.show();
			}
			else {
				$('.ctranskip').hide();
			}
			//show skbb 
			$("#TfileUpload_skbb").val('');
			if (data['lamp_skkb'] != null) {
				$("#TfileUpload_skbb").val(data['lamp_skkb']);
				var image_holder = $("#skbbholder");
				$('#skbbholder').attr("href", base_url + 'assets/images/fileupload/skb/' + data['lamp_skkb']);
				image_holder.show();
			}
			else {

				$('.cskbb').hide();
			}
			//show skes 
			$("#TfileUpload_skes").val('');
			if (data['lamp_surat_kesehatan'] != null) {
				$("#TfileUpload_skes").val(data['lamp_surat_kesehatan']);
				var image_holder = $("#skesholder");
				$('#skesholder').attr("href", base_url + 'assets/images/fileupload/surat_kesehatan/' + data['lamp_surat_kesehatan']);
				image_holder.show();
			}
			else {
				$('.cskes').hide();
			}
			mati();
			mati_kel();
			cek_kt();
			
		}
	});
	//show Keluarga
	$('#tb_list_keluarga tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "pendaftaran/get_data_keluarga/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != '')
			// {
			$.each(data, function (index, value) {
				var kdkeluarga = makeid();
				var str_data = kdkeluarga + '#' + value['kategori'] + '#' + value['nama'] + '#' + value['nik'] + '#' + value['binbinti'] + '#' + value['jenis_kelamin'] + '#' + value['status'] + '#' + value['tgl_wafat'] + '#' + value['umur'] + '#' + value['hari'] + '#' + value['sebab_wafat'] + '#' + value['status_perkawinan'] + '#' + value['pendapatan_ibu'] + '#' + value['sebab_tdk_bekerja'] + '#' + value['keahlian'] + '#' + value['status_rumah'] + '#' + value['kondisi_rumah'] + '#' + value['jml_asuh'] + '#' + value['pekerjaan'] + '#' + value['pend_terakhir'] + '#' + value['agama'] + '#' + value['suku'] + '#' + value['kewarganegaraan'] + '#' + value['ormas'] + '#' + value['orpol'] + '#' + value['kedukmas'] + '#' + value['thn_lulus'] + '#' + value['no_stambuk_alumni'] + '#' + value['tempat_lahir'] + '#' + value['tgl_lahir_keluarga'] + '#' + value['hub_kel'] + '#' + value['keterangan'] + '#' + value['ktp'];
				var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editdetailkeluarga(\"" + str_data + "\")'><i class='fa fa-pencil'></i></a>&nbsp;";
				strbutton += "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='hapusItem(\"" + kdkeluarga + "\")'><i class='fa fa-trash'></i></a>";
				var kategori = $('#hid_kategori_santri').val();
				if (kategori == 'TMI') {
					var linkfile = "<a href='./assets/images/fileupload/ktp/" + value['ktp'] + "' target='_blank'>" + value['ktp'] + "</a>";
				}
				else if (kategori == 'AITAM') {
					var linkfile = "<a href='../assets/images/fileupload/ktp/" + value['ktp'] + "' target='_blank'>" + value['ktp'] + "</a>";
				}
				var row_count = $('#tb_list_keluarga tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + kdkeluarga + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['kategori'] + "</td>";
				content_data += "<td>" + value['nama'] + "</td>";
				content_data += "<td>" + value['nik'] + "</td>";
				content_data += "<td>" + value['binbinti'] + "</td>";
				content_data += "<td>" + value['jenis_kelamin'] + "</td>";
				content_data += "<td>" + value['status'] + "</td>";
				content_data += "<td class='hidden'>" + value['tgl_wafat'] + "</td>";
				content_data += "<td class='hidden'>" + value['umur'] + "</td>";
				content_data += "<td class='hidden'>" + value['hari'] + "</td>";
				content_data += "<td class='hidden'>" + value['sebab_wafat'] + "</td>";
				content_data += "<td class='hidden'>" + value['status_perkawinan'] + "</td>";
				content_data += "<td class='hidden'>" + value['pendapatan_ibu'] + "</td>";
				content_data += "<td class='hidden'>" + value['sebab_tdk_bekerja'] + "</td>";
				content_data += "<td class='hidden'>" + value['keahlian'] + "</td>";
				content_data += "<td class='hidden'>" + value['status_rumah'] + "</td>";
				content_data += "<td class='hidden'>" + value['kondisi_rumah'] + "</td>";
				content_data += "<td class='hidden'>" + value['jml_asuh'] + "</td>";
				content_data += "<td>" + value['pekerjaan'] + "</td>";
				content_data += "<td>" + value['pend_terakhir'] + "</td>";
				content_data += "<td class='hidden'>" + value['agama'] + "</td>";
				content_data += "<td class='hidden'>" + value['suku'] + "</td>";
				content_data += "<td class='hidden'>" + value['kewarganegaraan'] + "</td>";
				content_data += "<td class='hidden'>" + value['ormas'] + "</td>";
				content_data += "<td class='hidden'>" + value['orpol'] + "</td>";
				content_data += "<td class='hidden'>" + value['kedukmas'] + "</td>";
				content_data += "<td class='hidden'>" + value['thn_lulus'] + "</td>";
				content_data += "<td class='hidden'>" + value['no_stambuk_alumni'] + "</td>";
				content_data += "<td class='hidden'>" + value['tempat_lahir'] + "</td>";
				content_data += "<td>" + value['tgl_lahir_keluarga'] + "</td>";
				content_data += "<td>" + value['hub_kel'] + "</td>";
				content_data += "<td class='hidden'>" + value['keterangan'] + "</td>";
				content_data += "<td class='hidden'>" + value['ktp'] + "</td>";
				content_data += "<td>" + linkfile + "</td>";
				content_data += "<td>" + strbutton + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_keluarga tbody').html(content_data);
				}
				else {

					$('#tb_list_keluarga tbody').append(content_data);
				}
				if (value['kategori'] == 'AYAH') {
					$("#hid_cek_ayah").val(1);
				}
				if (value['kategori'] == 'IBU') {
					$("#hid_cek_ibu").val(1);
				}
				if (kategori_keluarga == 'WALI') {
					$("#hid_cek_wali").val(1);
				}
				$("#hid_jumlah_item_keluarga").val(row_count + 1);
				urutkanNomor();
			});
			// }
		}
	});
	//show Penyakit
	$('#tb_list_penyakit tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "pendaftaran/get_data_penyakit/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			$.each(data, function (index, value) {
				var kdpenyakit = makeid();
				var str_data = kdpenyakit + '#' + value['nama_penyakit'] + '#' + value['thn_penyakit'] + '#' + value['kategori_penyakit'] + '#' + value['tipe_penyakit'] + '#' + value['lamp_bukti'];
				var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editdetailpenyakit(\"" + str_data + "\")'><i class='fa fa-pencil'></i></a>&nbsp;";
				strbutton += "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='hapusItemPenyakit(\"" + kdpenyakit + "\")'><i class='fa fa-trash'></i></a>";
				var kategori = $('#hid_kategori_santri').val();
				if (kategori == 'TMI') {
					var linkfile = "<a href='./assets/images/fileupload/lamp_penyakit/" + value['lamp_bukti'] + "' target='_blank'>" + value['lamp_bukti'] + "</a>";
				}
				else if (kategori == 'AITAM') {
					var linkfile = "<a href='../assets/images/fileupload/lamp_penyakit/" + value['lamp_bukti'] + "' target='_blank'>" + value['lamp_bukti'] + "</a>";
				}
				var row_count = $('#tb_list_penyakit tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + kdpenyakit + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['nama_penyakit'] + "</td>";
				content_data += "<td>" + value['thn_penyakit'] + "</td>";
				content_data += "<td>" + value['kategori_penyakit'] + "</td>";
				content_data += "<td>" + value['tipe_penyakit'] + "</td>";
				content_data += "<td class='hidden'>" + value['lamp_bukti'] + "</td>";
				content_data += "<td>" + linkfile + "</td>";
				content_data += "<td>" + strbutton + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_penyakit tbody').html(content_data);
				}
				else {

					$('#tb_list_penyakit tbody').append(content_data);
				}

				$("#hid_jumlah_item_penyakit").val(row_count + 1);
				urutkanNomorPenyakit();
			});
			// }
		}
	});
	//show kecakapan khusus
	$('#tb_list_kckhusus tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "pendaftaran/get_data_kecakapankhusus/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			if (data != null) {

				$('#bid_studi').val(data['bid_studi']);
				$('#olahraga').val(data['olahraga']);
				$('#kesenian').val(data['kesenian']);
				$('#keterampilan').val(data['keterampilan']);
				$('#lain_lain').val(data['lain_lain']);

			}
		}
	});

	//show donatur
	$('#tb_list_donatur tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "pendaftaran/get_data_donatur/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			$.each(data, function (index, value) {
				var kddonatur = makeid();
				var str_data = kddonatur + '#' + value['nama_donatur'] + '#' + value['kategori'];
				var strbutton = "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='hapusItemdonatur(\"" + kddonatur + "\")'><i class='fa fa-trash'></i></a>";
				
				var row_count = $('#tb_list_donatur tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + kddonatur + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['id_donatur'] + "</td>";
				content_data += "<td>" + value['nama_donatur'] + "</td>";
				content_data += "<td>" + value['kategori'] + "</td>";
				content_data += "<td>" + strbutton + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_donatur tbody').html(content_data);
				}
				else {

					$('#tb_list_donatur tbody').append(content_data);
				}

				$("#hid_jumlah_item_donatur").val(row_count + 1);
				urutkanNomordonatur();
			});
			// }
		}
	});




}

function AddTOSantri() {
	if ($('#hid_kategori_santri').val() == 'TMI') {
		var url = 'Pendaftaran'
	}
	else {
		var url = 'Pendaftaran/aitam'
	}
	if ($("#add_santri").valid() == true) {

		var iform = $('#add_santri')[0];
		var data = new FormData(iform);

		$.ajax({

			type: "POST",
			url: base_url + "pendaftaran/addtosantri/",
			enctype: 'multipart/form-data',
			// dataType:"JSON",
			contentType: false,
			processData: false,
			data: data,
			success: function (data) {

				bootbox.alert({
					message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Berhasil",
					size: 'small',
					callback: function () {

						window.location = base_url + url;
					}
				});
			}
		});
	}

}

function hapus(no_registrasi) {

	bootbox.confirm("Anda yakin akan menghapus " + no_registrasi + " ini ?",
		function (result) {
			if (result == true) {

				$.ajax({
					type: "POST",
					url: base_url + "pendaftaran/DelSantri/" + no_registrasi,
					dataType: "html",
					success: function (data) {
						bootbox.alert({
							message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil Berhasil",
							size: 'small',
							callback: function () {

								window.location = base_url + 'pendaftaran';
							}
						});
					}
				});
			}
		}
	);

}

function ToTMI(no_registrasi) {
	clearValidate_add_santri();
	$('.nav-tabs a[href="#tab_santri"]').tab('show');

	if ($('#hid_page').val() == 'DAFTAR') {
		$('#hiddenidgedung').hide();
		$('#spansearchclosegedung').hide();
		$('#spansearchgedung').show();
		$('#hiddenidKamar').hide();
		$('#spansearchcloseKamar').hide();
		$('#spansearchKamar').show();
		$('#hiddenidKelas').hide();
		$('#spansearchcloseKelas').hide();
		$('#spansearchKelas').show();
		$('#hiddenidBagian').hide();
		$('#spansearchcloseBagian').hide();
		$('#spansearchBagian').show();
	}
	else {
		$('#hiddenidgedung').hide();
		$('#spansearchclosegedung').hide();
		$('#spansearchgedung').hide();
		$('#hiddenidKamar').hide();
		$('#spansearchcloseKamar').hide();
		$('#spansearchKamar').hide();
		$('#hiddenidKelas').hide();
		$('#spansearchcloseKelas').hide();
		$('#spansearchKelas').hide();
		$('#hiddenidBagian').hide();
		$('#spansearchcloseBagian').hide();
		$('#spansearchBagian').hide();
	}

	kosong();
	$('#image-holder').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_santri/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);

			$('#kategori_santri').val('TMI');
			$('#kategori_update').val('TMI'); 
			$('#no_registrasi').val(data['no_registrasi']);
			$('#no_stambuk').val(data['no_stambuk']);
			$('#thn_masuk').val(data['thn_masuk']);
			$('#rayon').val(data['rayon']);
			$('#kamar').val(data['kamar']);
			$('#bagian').val(data['bagian']);
			$('#kel_sekarang').val(data['kel_sekarang']);
			$('#nisn').val(data['nisn']);
			$('#nisnlokal').val(data['nisnlokal']);
			$('#nama_lengkap').val(data['nama_lengkap']);
			$('#nama_arab').val(data['nama_arab']);
			$('#nama_panggilan').val(data['nama_panggilan']);
			$('#hobi').val(data['hobi']);
			$('#uang_jajan_perbulan').val(data['uang_jajan_perbulan']);
			$('#no_kk').val(data['no_kk']);
			$('#nik').val(data['nik']);
			$('#tempat_lahir').val(data['tempat_lahir']);
			$('#tgl_lahir').val(data['tgl_lahir']);;
			$('#konsulat').val(data['konsulat']);
			$('#nama_sekolah_aitam').val(data['nama_sekolah']);
			$('#kelas_aitam').val(data['kelas_sekolah']);
			$('#alamat_sekolah_aitam').val(data['alamat_sekolah']);
			$('#suku').val(data['suku']);
			$('#kewarganegaraan').val(data['kewarganegaraan']);
			$('#jalan').val(data['jalan']);
			$('#no_rumah').val(data['no_rumah']);
			$('#dusun').val(data['dusun']);
			$('#desa').val(data['desa']);
			$('#kecamatan').val(data['kecamatan']);
			$('#kabupaten').val(data['kabupaten']);
			$('#provinsi').val(data['provinsi']);
			$('#kd_pos').val(data['kd_pos']);
			$('#no_tlp').val(data['no_tlp']);
			$('#no_hp').val(data['no_hp']);
			$('#email').val(data['email']);
			$('#fb').val(data['fb']);
			$('#dibesarkan_di').val(data['dibesarkan_di']);
			$('#pembiaya').val(data['pembiaya']);
			$('#biaya_perbulan_min').val(data['biaya_perbulan_min']);
			$('#biaya_perbulan_max').val(data['biaya_perbulan_max']);
			$('#penghasilan').val(data['penghasilan']);
			$('#gol_darah').val(data['gol_darah']);
			$('#tinggi_badan').val(data['tinggi_badan']);
			$('#berat_badan').val(data['berat_badan']);
			$('#khitan').val(data['khitan']);
			$('#kondisi_pendidikan').val(data['kondisi_pendidikan']);
			$('#ekonomi_keluarga').val(data['ekonomi_keluarga']);
			$('#situasi_rumah').val(data['situasi_rumah']);
			$('#dekat_dengan').val(data['dekat_dengan']);
			$('#hidup_beragama').val(data['hidup_beragama']);
			$('#pengelihatan_mata').val(data['pengelihatan_mata']);
			$('#kaca_mata').val(data['kaca_mata']);
			$('#pendengaran').val(data['pendengaran']);
			$('#operasi').val(data['operasi']);
			$('#sebab').val(data['sebab']);
			$('#kecelakaan').val(data['kecelakaan']);
			$('#akibat').val(data['akibat']);
			$('#alergi').val(data['alergi']);
			$('#thn_fisik').val(data['thn_fisik']);
			$('#kelainan_fisik').val(data['kelainan_fisik']);
			$('#hid_Xaitam').val(data['aitam']);
			mati();
			$('#Modal_add_Santri').modal('show');
			$('#save_button_header').hide();
			$('#save_button_footer').hide();
			$('#addto_button_header').hide();
			$('#addto_button_footer').hide();
			$('#addtoTMI_button_footer').show();
			$('#button_keluarga').hide();
			$('#button_penyakit').hide();
			$('#button_kecakapankhusus').hide();
			$('#button_donatur').hide();
			$('#button_photo').hide();
			// mati_kel();
			$('#kategori_santri').attr('disabled', true);
			filter_tab_modal();
			$('#thn_masuk').attr('disabled', false);
			$('#pembiaya').attr('disabled', false);
			$('#biaya_perbulan_min').attr('disabled', false);
			$('#biaya_perbulan_max').attr('disabled', false);
			$('#penghasilan').attr('disabled', false);
			$('#gol_darah').attr('disabled', false);
			$('#tinggi_badan').attr('disabled', false);
			$('#berat_badan').attr('disabled', false);
			$('#khitan').attr('disabled', false);
			$('#kondisi_pendidikan').attr('disabled', false);
			$('#ekonomi_keluarga').attr('disabled', false);
			$('#situasi_rumah').attr('disabled', false);
			$('#dekat_dengan').attr('disabled', false);
			$('#hidup_beragama').attr('disabled', false);
			$('#pengelihatan_mata').attr('disabled', false);
			$('#kaca_mata').attr('disabled', false);
			$('#pendengaran').attr('disabled', false);
			$('#operasi').attr('disabled', false);
			$('#sebab').attr('disabled', false);
			$('#kecelakaan').attr('disabled', false);
			$('#akibat').attr('disabled', false);
			$('#alergi').attr('disabled', false);
			$('#thn_fisik').attr('disabled', false);
			$('#kelainan_fisik').attr('disabled', false);
			$('#bid_studi').attr('disabled', false);
			$('#olahraga').attr('disabled', false);
			$('#kesenian').attr('disabled', false);
			$('#keterampilan').attr('disabled', false);
			$('#lain_lain').attr('disabled', false);
			$('#rayon').attr('disabled', false);
			$('#kamar').attr('disabled', false);
			$('#bagian').attr('disabled', false);
			$('#kel_sekarang').attr('disabled', false);
			$('#no_registrasi').attr('disabled', false);
			//show photo
			if (data['lamp_photo'] != null) {

				var image_holder = $("#image-holder");

				$("<img />", {
					"src": base_url + "./assets/images/fileupload/santri/" + data['lamp_photo'],
					"class": "thumb-image",
					"name": "img_photo"
				}).appendTo(image_holder);
			}
			//show ijazah
			if (data['lamp_ijazah'] != null) {
				var image_holder = $("#ijazahholder");
				$('#ijazahholder').attr("href", base_url + 'assets/images/fileupload/ijazah/' + data['lamp_ijazah']);
				image_holder.show();

			}
			else {

				$('.cijazah').hide();
			}
			//show Akta Kelahiran 
			if (data['lamp_akta_kelahiran'] != null) {
				var image_holder = $("#aklahiranholder");
				$('#aklahiranholder').attr("href", base_url + 'assets/images/fileupload/akte_kelahiran/' + data['lamp_akta_kelahiran']);
				image_holder.show();
			}
			else {

				$('.cakelahiran').hide();
			}
			//show kk 
			if (data['lamp_kk'] != null) {
				var image_holder = $("#kkholder");
				$('#kkholder').attr("href", base_url + 'assets/images/fileupload/kartukeluarga/' + data['lamp_kk']);
				image_holder.show();
			}
			else {

				$('.ckk').hide();
			}
			//show skhun 
			if (data['lamp_skhun'] != null) {
				var image_holder = $("#skhunholder");
				$('#skhunholder').attr("href", base_url + 'assets/images/fileupload/skhun/' + data['lamp_skhun']);
				image_holder.show();
			}
			else {

				$('.cskhun').hide();
			}
			//show ranskip 
			if (data['lamp_transkip_nilai'] != null) {
				var image_holder = $("#transkipholder");
				$('#transkipholder').attr("href", base_url + 'assets/images/fileupload/transkip_nilai/' + data['lamp_transkip_nilai']);
				image_holder.show();
			}
			else {

				$('.ctranskip').hide();
			}
			//show skbb 
			if (data['lamp_skkb'] != null) {
				var image_holder = $("#skbbholder");
				$('#skbbholder').attr("href", base_url + 'assets/images/fileupload/skb/' + data['lamp_skkb']);
				image_holder.show();
			}
			else {

				$('.cskbb').hide();
			}
			//show skes 
			if (data['lamp_surat_kesehatan'] != null) {
				var image_holder = $("#skesholder");
				$('#skesholder').attr("href", base_url + 'assets/images/fileupload/surat_kesehatan/' + data['lamp_surat_kesehatan']);
				image_holder.show();
			}
			else {

				$('.cskes').hide();
			}
		}
	});
	//show Keluarga
	$('#tb_list_keluarga tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_keluarga/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {
			$.each(data, function (index, value) {
				var kdkeluarga = makeid();
				var str_data = kdkeluarga + '#' + value['kategori'] + '#' + value['nama'] + '#' + value['nik'] + '#' + value['binbinti'] + '#' + value['jenis_kelamin'] + '#' + value['status'] + '#' + value['tgl_wafat'] + '#' + value['umur'] + '#' + value['hari'] + '#' + value['sebab_wafat'] + '#' + value['status_perkawinan'] + '#' + value['pendapatan_ibu'] + '#' + value['sebab_tdk_bekerja'] + '#' + value['keahlian'] + '#' + value['status_rumah'] + '#' + value['kondisi_rumah'] + '#' + value['jml_asuh'] + '#' + value['pekerjaan'] + '#' + value['pend_terakhir'] + '#' + value['agama'] + '#' + value['suku'] + '#' + value['kewarganegaraan'] + '#' + value['ormas'] + '#' + value['orpol'] + '#' + value['kedukmas'] + '#' + value['thn_lulus'] + '#' + value['no_stambuk_alumni'] + '#' + value['tempat_lahir'] + '#' + value['tgl_lahir_keluarga'] + '#' + value['hub_kel'] + '#' + value['keterangan'] + '#' + value['ktp'];
				var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='viewdetailkeluarga(\"" + str_data + "\")'><i class='fa fa-file-o'></i></a>&nbsp;";
				var kategori = $('#hid_kategori_santri').val();
				if (kategori == 'TMI') {
					var linkfile = "<a href='./assets/images/fileupload/ktp/" + value['ktp'] + "' target='_blank'>" + value['ktp'] + "</a>";
				}
				else if (kategori == 'AITAM') {
					var linkfile = "<a href='../assets/images/fileupload/ktp/" + value['ktp'] + "' target='_blank'>" + value['ktp'] + "</a>";
				}
				var row_count = $('#tb_list_keluarga tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + value['kategori'] + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['kategori'] + "</td>";
				content_data += "<td>" + value['nama'] + "</td>";
				content_data += "<td>" + value['nik'] + "</td>";
				content_data += "<td>" + value['binbinti'] + "</td>";
				content_data += "<td>" + value['jenis_kelamin'] + "</td>";
				content_data += "<td>" + value['status'] + "</td>";
				content_data += "<td class='hidden'>" + value['tgl_wafat'] + "</td>";
				content_data += "<td class='hidden'>" + value['umur'] + "</td>";
				content_data += "<td class='hidden'>" + value['hari'] + "</td>";
				content_data += "<td class='hidden'>" + value['sebab_wafat'] + "</td>";
				content_data += "<td class='hidden'>" + value['status_perkawinan'] + "</td>";
				content_data += "<td class='hidden'>" + value['pendapatan_ibu'] + "</td>";
				content_data += "<td class='hidden'>" + value['sebab_tdk_bekerja'] + "</td>";
				content_data += "<td class='hidden'>" + value['keahlian'] + "</td>";
				content_data += "<td class='hidden'>" + value['status_rumah'] + "</td>";
				content_data += "<td class='hidden'>" + value['kondisi_rumah'] + "</td>";
				content_data += "<td class='hidden'>" + value['jml_asuh'] + "</td>";
				content_data += "<td>" + value['pekerjaan'] + "</td>";
				content_data += "<td>" + value['pend_terakhir'] + "</td>";
				content_data += "<td class='hidden'>" + value['agama'] + "</td>";
				content_data += "<td class='hidden'>" + value['suku'] + "</td>";
				content_data += "<td class='hidden'>" + value['kewarganegaraan'] + "</td>";
				content_data += "<td class='hidden'>" + value['ormas'] + "</td>";
				content_data += "<td class='hidden'>" + value['orpol'] + "</td>";
				content_data += "<td class='hidden'>" + value['kedukmas'] + "</td>";
				content_data += "<td class='hidden'>" + value['thn_lulus'] + "</td>";
				content_data += "<td class='hidden'>" + value['no_stambuk_alumni'] + "</td>";
				content_data += "<td class='hidden'>" + value['tempat_lahir'] + "</td>";
				content_data += "<td>" + value['tgl_lahir_keluarga'] + "</td>";
				content_data += "<td>" + value['hub_kel'] + "</td>";
				content_data += "<td class='hidden'>" + value['keterangan'] + "</td>";
				content_data += "<td class='hidden'>" + value['ktp'] + "</td>";
				content_data += "<td>" + linkfile + "</td>";
				content_data += "<td>" + strbutton + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_keluarga tbody').html(content_data);
				}
				else {

					$('#tb_list_keluarga tbody').append(content_data);
				}
			});
			// }
		}
	});
	//show Penyakit
	$('#tb_list_penyakit tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_penyakit/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {
			$.each(data, function (index, value) {
				var kdpenyakit = makeid();
				var row_count = $('#tb_list_penyakit tr.tb-detail').length;
				var str_data = kdpenyakit + '#' + value['nama_penyakit'] + '#' + value['thn_penyakit'] + '#' + value['kategori_penyakit'] + '#' + value['tipe_penyakit'] + '#' + value['lamp_bukti'];
				var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='viewdetailpenyakit(\"" + str_data + "\")'><i class='fa fa-file-o'></i></a>&nbsp;";
				var kategori = $('#hid_kategori_santri').val();
				if (kategori == 'TMI') {
					var linkfile = "<a href='./assets/images/fileupload/lamp_penyakit/" + value['lamp_bukti'] + "' target='_blank'>" + value['lamp_bukti'] + "</a>";
				}
				else if (kategori == 'AITAM') {
					var linkfile = "<a href='../assets/images/fileupload/lamp_penyakit/" + value['lamp_bukti'] + "' target='_blank'>" + value['lamp_bukti'] + "</a>";
				}
				var row_count = $('#tb_list_penyakit tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + value['nama_penyakit'] + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['nama_penyakit'] + "</td>";
				content_data += "<td>" + value['thn_penyakit'] + "</td>";
				content_data += "<td>" + value['kategori_penyakit'] + "</td>";
				content_data += "<td>" + value['tipe_penyakit'] + "</td>";
				content_data += "<td class='hidden'>" + value['lamp_bukti'] + "</td>";
				content_data += "<td>" + linkfile + "</td>";
				content_data += "<td>" + strbutton + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_penyakit tbody').html(content_data);
				}
				else {

					$('#tb_list_penyakit tbody').append(content_data);
				}
			});
			// }
		}
	});
	//show kecakapan khusus
	$('#tb_list_kckhusus tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_kecakapankhusus/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			if (data != null) {

				$('#bid_studi').val(data['bid_studi']);
				$('#olahraga').val(data['olahraga']);
				$('#kesenian').val(data['kesenian']);
				$('#keterampilan').val(data['keterampilan']);
				$('#lain_lain').val(data['lain_lain']);

			}

		}
	});

	//show donatur
	$('#tb_list_donatur tbody').html('');
	$.ajax({

		type: "POST",
		url: base_url + "datasantri/get_data_donatur/" + no_registrasi,
		dataType: "html",
		success: function (data) {

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {
			$.each(data, function (index, value) {
				var kddonatur = makeid();
				var row_count = $('#tb_list_donatur tr.tb-detail').length;
				var str_data = kddonatur + '#' + value['nama_donatur'] + '#' + value['kategori'];
				// var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='viewdetaildonatur(\"" + str_data + "\")'><i class='fa fa-file-o'></i></a>&nbsp;";

				var row_count = $('#tb_list_donatur tr.tb-detail').length;
				var content_data = '<tr class="tb-detail" id="row' + value['nama_donatur'] + '">';
				content_data += "<td>" + (row_count + 1) + "</td>";
				content_data += "<td>" + value['id_donatur'] + "</td>";
				content_data += "<td>" + value['nama_donatur'] + "</td>";
				content_data += "<td>" + value['kategori'] + "</td>";
				content_data += "<td>" + "-" + "</td>";
				content_data += "</tr>";

				if (row_count < 1) {

					$('#tb_list_donatur tbody').html(content_data);
				}
				else {

					$('#tb_list_donatur tbody').append(content_data);
				}
			});
			// }
		}
	});
}

function AddToTMI() {
	var no_registrasi = $('#no_registrasi').val();
	var nm_lengkap = $('#nama_lengkap').val();
	if ($("#add_santri").valid() == true) {
		bootbox.confirm("Anda yakin No registrasi " + "<b>" + no_registrasi + "</b> " + " dengan nama " + "<b>" + nm_lengkap + "</b> " + " ini akan dijadikan TMI ?",
			function (result) {
				if (result == true) {
					var url = 'datasantri/aitam'

					// if ($("#add_santri").valid() == true) {

					var iform = $('#add_santri')[0];
					var data = new FormData(iform);

					$.ajax({

						type: "POST",
						url: base_url + "datasantri/addtoTMI/",
						enctype: 'multipart/form-data',
						// dataType:"JSON",
						contentType: false,
						processData: false,
						data: data,
						success: function (data) {

							bootbox.alert({
								message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Berhasil dijadikan TMI",
								size: 'small',
								callback: function () {

									window.location = base_url + url;
								}
							});
						}
					});

				}
			}
		);
	}
}
//#endregion santri

//#region kecakapan khusus
// function kosong_modal_kckhusu(){
// 	$('#bid_studi').val('')
// 	$('#olahraga').val('')
// 	$('#kesenian').val('')
// 	$('#keterampilan').val('')
// 	$('#lain_lain').val('')
// }
//#endregion kecakapan khusu

//#region keluarga

function kosong_modal_keluarga(){
	//disable form add keluarga
		$('#kategori_keluarga').val('');
		$('#nama_keluarga').val('');
		$('#nik_keluarga').val('');
		$('#binbinti_keluarga').val('');
		$('#jenis_kelamin_keluarga').val('');
		$('#status_pernikahan_keluarga').val('');
		$('#tgl_wafat_keluarga').val('');
		$('#umur_keluarga').val('');
		$('#hari_keluarga').val('');
		$('#sebab_wafat_keluarga').val('');
		$('#status_perkawinan_ibu_keluarga').val('');
		$('#pedapatan_ibu_keluarga').val('');
		$('#sebab_tidak_bekerja_keluarga').val('');
		$('#keahlian_keluarga').val('');
		$('#status_rumah_keluarga').val('');
		$('#kondisi_rumah_keluarga').val('');
		$('#jml_asuh').val('');
		$('#pekerjaan_keluarga').val('');
		$('#pendidikan_terakhir').val('');
		$('#agama_keluarga').val('');
		$('#suku_keluarga').val('');
		$('#kewarganegaraan_keluarga').val('');
		$('#ormas_keluarga').val('');
		$('#orpol_keluarga').val('');
		$('#kedudukandimasyarakat_keluarga').val('');
		$('#tahun_lulus_keluarga').val('');
		$('#nostambuk_keluarga').val('');
		$('#tempat_lahir_keluarga').val('');
		$('#tgl_lahir_keluarga').val('');
		$('#hubungan_keluarga').val('');
		$('#keterangan_keluarga').val('');
		$('#ktp_keluarga').val('');
		$('#hid_ktp_keluarga').val('');
		$('#hid_kdkeluarga').val('');
		
}

function mati_kel() {
	//disable form add keluarga
	$('#nama_keluarga').attr('disabled', true);
	$('#nik_keluarga').attr('disabled', true);
	$('#binbinti_keluarga').attr('disabled', true);
	$('#jenis_kelamin_keluarga').attr('disabled', true);
	$('#status_pernikahan_keluarga').attr('disabled', true);
	$('#tgl_wafat_keluarga').attr('disabled', true);
	$('#umur_keluarga').attr('disabled', true);
	$('#hari_keluarga').attr('disabled', true);
	$('#sebab_wafat_keluarga').attr('disabled', true);
	$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
	$('#pedapatan_ibu_keluarga').attr('disabled', true);
	$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
	$('#keahlian_keluarga').attr('disabled', true);
	$('#status_rumah_keluarga').attr('disabled', true);
	$('#kondisi_rumah_keluarga').attr('disabled', true);
	$('#jml_asuh').attr('disabled', true);
	$('#pekerjaan_keluarga').attr('disabled', true);
	$('#pendidikan_terakhir').attr('disabled', true);
	$('#agama_keluarga').attr('disabled', true);
	$('#suku_keluarga').attr('disabled', true);
	$('#kewarganegaraan_keluarga').attr('disabled', true);
	$('#ormas_keluarga').attr('disabled', true);
	$('#orpol_keluarga').attr('disabled', true);
	$('#kedudukandimasyarakat_keluarga').attr('disabled', true);
	$('#tahun_lulus_keluarga').attr('disabled', true);
	$('#nostambuk_keluarga').attr('disabled', true);
	$('#tempat_lahir_keluarga').attr('disabled', true);
	$('#tgl_lahir_keluarga').attr('disabled', true);
	$('#hubungan_keluarga').attr('disabled', true);
	$('#keterangan_keluarga').attr('disabled', true);
	$('#ktp_keluarga').attr('disabled', true);
}

function modalAddkeluarga() {
	clearvalidate_add_keluarga_santri()
	kosong_modal_keluarga();
	mati_kel();
	$('#btn_keluarga').text('Tambah');
	$('#kategori_keluarga').attr('disabled', false);
	$('#Modal_add_keluarga_santri').modal('show');
}

var validate_add_keluarga_santri = function () {

	var form = $('#add_keluarga_santri');
	var error2 = $('.alert-danger', form);
	var success2 = $('.alert-success', form);

	form.validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		ignore: "",  // validate all fields including form hidden input

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
				.closest('.input-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
		},

		unhighlight: function (element) { // revert the change done by hightlight

		},

		success: function (label, element) {
			var icon = $(element).parent('.input-icon').children('i');
			$(element).closest('.input-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
			icon.removeClass("fa-warning").addClass("fa-check");
		},

		submitHandler: function (form) {
			success2.show();
			error2.hide();
			form[0].submit(); // submit the form
		}
	});
}

function clearvalidate_add_keluarga_santri() {

	$("#add_keluarga_santri div").removeClass('has-error');
	$("#add_keluarga_santri i").removeClass('fa-warning');

	$("#add_keluarga_santri div").removeClass('has-success');
	$("#add_keluarga_santri i").removeClass('fa-check');

	document.getElementById("add_keluarga_santri").reset();
}

function cek_jk() { // cek saat memilih jenis kelamin di modal keluarga
	var kategori_santri = $('#kategori_santri').val();
	var kategori_keluarga = $('#kategori_keluarga').val();

	if (kategori_keluarga == 'AYAH') {
		$('#jenis_kelamin_keluarga').val('LAKI-LAKI');
		if ($('#kategori_santri').val() == 'AITAM_ISLAH' || $('#kategori_santri').val() == 'AITAM_JAMIAH') {
			$('#nama_keluarga').attr('disabled', false);
			$('#nik_keluarga').attr('disabled', false);
			$('#binbinti_keluarga').attr('disabled', false);
			$('#jenis_kelamin_keluarga').attr('disabled', true);
			$('#status_pernikahan_keluarga').attr('disabled', true);
			$('#tgl_wafat_keluarga').attr('disabled', false);
			$('#umur_keluarga').attr('disabled', false);
			$('#hari_keluarga').attr('disabled', false);
			$('#sebab_wafat_keluarga').attr('disabled', false);
			$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
			$('#pedapatan_ibu_keluarga').attr('disabled', true);
			$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
			$('#keahlian_keluarga').attr('disabled', true);
			$('#status_rumah_keluarga').attr('disabled', true);
			$('#kondisi_rumah_keluarga').attr('disabled', true);
			$('#jml_asuh').attr('disabled', true);
			$('#pekerjaan_keluarga').attr('disabled', false);
			$('#pendidikan_terakhir').attr('disabled', false);
			$('#agama_keluarga').attr('disabled', false);
			$('#suku_keluarga').attr('disabled', false);
			$('#kewarganegaraan_keluarga').attr('disabled', false);
			$('#ormas_keluarga').attr('disabled', false);
			$('#orpol_keluarga').attr('disabled', false);
			$('#kedudukandimasyarakat_keluarga').attr('disabled', false);
			$('#tahun_lulus_keluarga').attr('disabled', false);
			$('#nostambuk_keluarga').attr('disabled', false);
			$('#tempat_lahir_keluarga').attr('disabled', false);
			$('#tgl_lahir_keluarga').attr('disabled', false);
			$('#hubungan_keluarga').attr('disabled', true);
			$('#keterangan_keluarga').attr('disabled', true);
			$('#ktp_keluarga').attr('disabled', false);
		}
		else if ($('#kategori_santri').val() == 'TMI') {
			$('#nama_keluarga').attr('disabled', false);
			$('#nik_keluarga').attr('disabled', false);
			$('#binbinti_keluarga').attr('disabled', false);
			$('#jenis_kelamin_keluarga').attr('disabled', true);
			$('#status_pernikahan_keluarga').attr('disabled', true);
			$('#tgl_wafat_keluarga').attr('disabled', true);
			$('#umur_keluarga').attr('disabled', true);
			$('#hari_keluarga').attr('disabled', true);
			$('#sebab_wafat_keluarga').attr('disabled', true);
			$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
			$('#pedapatan_ibu_keluarga').attr('disabled', true);
			$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
			$('#keahlian_keluarga').attr('disabled', true);
			$('#status_rumah_keluarga').attr('disabled', true);
			$('#kondisi_rumah_keluarga').attr('disabled', true);
			$('#jml_asuh').attr('disabled', true);
			$('#pekerjaan_keluarga').attr('disabled', false);
			$('#pendidikan_terakhir').attr('disabled', false);
			$('#agama_keluarga').attr('disabled', false);
			$('#suku_keluarga').attr('disabled', false);
			$('#kewarganegaraan_keluarga').attr('disabled', false);
			$('#ormas_keluarga').attr('disabled', false);
			$('#orpol_keluarga').attr('disabled', false);
			$('#kedudukandimasyarakat_keluarga').attr('disabled', false);
			$('#tahun_lulus_keluarga').attr('disabled', false);
			$('#nostambuk_keluarga').attr('disabled', false);
			$('#tempat_lahir_keluarga').attr('disabled', false);
			$('#tgl_lahir_keluarga').attr('disabled', false);
			$('#hubungan_keluarga').attr('disabled', true);
			$('#keterangan_keluarga').attr('disabled', true);
			$('#ktp_keluarga').attr('disabled', false);
		}
	} else if (kategori_keluarga == 'IBU') {
		$('#jenis_kelamin_keluarga').val('PEREMPUAN');
		if ($('#kategori_santri').val() == 'AITAM_ISLAH' || $('#kategori_santri').val() == 'AITAM_JAMIAH') {
			$('#nama_keluarga').attr('disabled', false);
			$('#nik_keluarga').attr('disabled', false);
			$('#binbinti_keluarga').attr('disabled', false);
			$('#jenis_kelamin_keluarga').attr('disabled', true);
			$('#status_pernikahan_keluarga').attr('disabled', true);
			$('#tgl_wafat_keluarga').attr('disabled', true);
			$('#umur_keluarga').attr('disabled', true);
			$('#hari_keluarga').attr('disabled', true);
			$('#sebab_wafat_keluarga').attr('disabled', true);
			$('#status_perkawinan_ibu_keluarga').attr('disabled', false);
			$('#pedapatan_ibu_keluarga').attr('disabled', false);
			$('#sebab_tidak_bekerja_keluarga').attr('disabled', false);
			$('#keahlian_keluarga').attr('disabled', false);
			$('#status_rumah_keluarga').attr('disabled', false);
			$('#kondisi_rumah_keluarga').attr('disabled', false);
			$('#jml_asuh').attr('disabled', true);
			$('#pekerjaan_keluarga').attr('disabled', false);
			$('#pendidikan_terakhir').attr('disabled', false);
			$('#agama_keluarga').attr('disabled', false);
			$('#suku_keluarga').attr('disabled', false);
			$('#kewarganegaraan_keluarga').attr('disabled', false);
			$('#ormas_keluarga').attr('disabled', false);
			$('#orpol_keluarga').attr('disabled', false);
			$('#kedudukandimasyarakat_keluarga').attr('disabled', false);
			$('#tahun_lulus_keluarga').attr('disabled', false);
			$('#nostambuk_keluarga').attr('disabled', false);
			$('#tempat_lahir_keluarga').attr('disabled', false);
			$('#tgl_lahir_keluarga').attr('disabled', false);
			$('#hubungan_keluarga').attr('disabled', true);
			$('#keterangan_keluarga').attr('disabled', true);
			$('#ktp_keluarga').attr('disabled', false);
		}
		else if ($('#kategori_santri').val() == 'TMI') {
			$('#nama_keluarga').attr('disabled', false);
			$('#nik_keluarga').attr('disabled', false);
			$('#binbinti_keluarga').attr('disabled', false);
			$('#jenis_kelamin_keluarga').attr('disabled', true);
			$('#status_pernikahan_keluarga').attr('disabled', true);
			$('#tgl_wafat_keluarga').attr('disabled', true);
			$('#umur_keluarga').attr('disabled', true);
			$('#hari_keluarga').attr('disabled', true);
			$('#sebab_wafat_keluarga').attr('disabled', true);
			$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
			$('#pedapatan_ibu_keluarga').attr('disabled', true);
			$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
			$('#keahlian_keluarga').attr('disabled', true);
			$('#status_rumah_keluarga').attr('disabled', true);
			$('#kondisi_rumah_keluarga').attr('disabled', true);
			$('#jml_asuh').attr('disabled', true);
			$('#pekerjaan_keluarga').attr('disabled', false);
			$('#pendidikan_terakhir').attr('disabled', false);
			$('#agama_keluarga').attr('disabled', false);
			$('#suku_keluarga').attr('disabled', false);
			$('#kewarganegaraan_keluarga').attr('disabled', false);
			$('#ormas_keluarga').attr('disabled', false);
			$('#orpol_keluarga').attr('disabled', false);
			$('#kedudukandimasyarakat_keluarga').attr('disabled', false);
			$('#tahun_lulus_keluarga').attr('disabled', false);
			$('#nostambuk_keluarga').attr('disabled', false);
			$('#tempat_lahir_keluarga').attr('disabled', false);
			$('#tgl_lahir_keluarga').attr('disabled', false);
			$('#hubungan_keluarga').attr('disabled', true);
			$('#keterangan_keluarga').attr('disabled', true);
			$('#ktp_keluarga').attr('disabled', false);
		}
	} else if (kategori_keluarga == 'WALI') {
		$('#jenis_kelamin_keluarga').val('');
		if ($('#kategori_santri').val() == 'AITAM_ISLAH' || $('#kategori_santri').val() == 'AITAM_JAMIAH') {
			$('#nama_keluarga').attr('disabled', false);
			$('#nik_keluarga').attr('disabled', false);
			$('#binbinti_keluarga').attr('disabled', false);
			$('#jenis_kelamin_keluarga').attr('disabled', false);
			$('#status_pernikahan_keluarga').attr('disabled', false);
			$('#tgl_wafat_keluarga').attr('disabled', true);
			$('#umur_keluarga').attr('disabled', true);
			$('#hari_keluarga').attr('disabled', true);
			$('#sebab_wafat_keluarga').attr('disabled', true);
			$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
			$('#pedapatan_ibu_keluarga').attr('disabled', true);
			$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
			$('#keahlian_keluarga').attr('disabled', true);
			$('#status_rumah_keluarga').attr('disabled', true);
			$('#kondisi_rumah_keluarga').attr('disabled', true);
			$('#jml_asuh').attr('disabled', false);
			$('#pekerjaan_keluarga').attr('disabled', false);
			$('#pendidikan_terakhir').attr('disabled', false);
			$('#agama_keluarga').attr('disabled', false);
			$('#suku_keluarga').attr('disabled', false);
			$('#kewarganegaraan_keluarga').attr('disabled', false);
			$('#ormas_keluarga').attr('disabled', false);
			$('#orpol_keluarga').attr('disabled', false);
			$('#kedudukandimasyarakat_keluarga').attr('disabled', false);
			$('#tahun_lulus_keluarga').attr('disabled', false);
			$('#nostambuk_keluarga').attr('disabled', false);
			$('#tempat_lahir_keluarga').attr('disabled', false);
			$('#tgl_lahir_keluarga').attr('disabled', false);
			$('#hubungan_keluarga').attr('disabled', false);
			$('#keterangan_keluarga').attr('disabled', false);
			$('#ktp_keluarga').attr('disabled', false);
		}
		else if ($('#kategori_santri').val() == 'TMI') {
			$('#nama_keluarga').attr('disabled', false);
			$('#nik_keluarga').attr('disabled', false);
			$('#binbinti_keluarga').attr('disabled', false);
			$('#jenis_kelamin_keluarga').attr('disabled', false);
			$('#status_pernikahan_keluarga').attr('disabled', false);
			$('#tgl_wafat_keluarga').attr('disabled', true);
			$('#umur_keluarga').attr('disabled', true);
			$('#hari_keluarga').attr('disabled', true);
			$('#sebab_wafat_keluarga').attr('disabled', true);
			$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
			$('#pedapatan_ibu_keluarga').attr('disabled', true);
			$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
			$('#keahlian_keluarga').attr('disabled', true);
			$('#status_rumah_keluarga').attr('disabled', true);
			$('#kondisi_rumah_keluarga').attr('disabled', true);
			$('#jml_asuh').attr('disabled', false);
			$('#pekerjaan_keluarga').attr('disabled', false);
			$('#pendidikan_terakhir').attr('disabled', false);
			$('#agama_keluarga').attr('disabled', false);
			$('#suku_keluarga').attr('disabled', false);
			$('#kewarganegaraan_keluarga').attr('disabled', false);
			$('#ormas_keluarga').attr('disabled', false);
			$('#orpol_keluarga').attr('disabled', false);
			$('#kedudukandimasyarakat_keluarga').attr('disabled', false);
			$('#tahun_lulus_keluarga').attr('disabled', false);
			$('#nostambuk_keluarga').attr('disabled', false);
			$('#tempat_lahir_keluarga').attr('disabled', false);
			$('#tgl_lahir_keluarga').attr('disabled', false);
			$('#hubungan_keluarga').attr('disabled', false);
			$('#keterangan_keluarga').attr('disabled', false);
			$('#ktp_keluarga').attr('disabled', false);
		}
	} else if ($('#kategori_keluarga').val() == '') {
		//disable form add keluarga
		$('#nama_keluarga').attr('disabled', true);
		$('#nik_keluarga').attr('disabled', true);
		$('#binbinti_keluarga').attr('disabled', true);
		$('#jenis_kelamin_keluarga').attr('disabled', true);
		$('#status_pernikahan_keluarga').attr('disabled', true);
		$('#tgl_wafat_keluarga').attr('disabled', true);
		$('#umur_keluarga').attr('disabled', true);
		$('#hari_keluarga').attr('disabled', true);
		$('#sebab_wafat_keluarga').attr('disabled', true);
		$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
		$('#pedapatan_ibu_keluarga').attr('disabled', true);
		$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
		$('#keahlian_keluarga').attr('disabled', true);
		$('#status_rumah_keluarga').attr('disabled', true);
		$('#kondisi_rumah_keluarga').attr('disabled', true);
		$('#jml_asuh').attr('disabled', true);
		$('#pekerjaan_keluarga').attr('disabled', true);
		$('#pendidikan_terakhir').attr('disabled', true);
		$('#agama_keluarga').attr('disabled', true);
		$('#suku_keluarga').attr('disabled', true);
		$('#kewarganegaraan_keluarga').attr('disabled', true);
		$('#ormas_keluarga').attr('disabled', true);
		$('#orpol_keluarga').attr('disabled', true);
		$('#kedudukandimasyarakat_keluarga').attr('disabled', true);
		$('#tahun_lulus_keluarga').attr('disabled', true);
		$('#nostambuk_keluarga').attr('disabled', true);
		$('#tempat_lahir_keluarga').attr('disabled', true);
		$('#tgl_lahir_keluarga').attr('disabled', true);
		$('#hubungan_keluarga').attr('disabled', true);
		$('#keterangan_keluarga').attr('disabled', true);
		$('#ktp_keluarga').attr('disabled', true);
	} else {
		$('#jenis_kelamin_keluarga').attr('disabled', false);
		$('#jenis_kelamin_keluarga').val('');
		if ($('#kategori_santri').val() == 'AITAM_ISLAH' || $('#kategori_santri').val() == 'AITAM_JAMIAH') {
			$('#nama_keluarga').attr('disabled', false);
			$('#nik_keluarga').attr('disabled', false);
			$('#binbinti_keluarga').attr('disabled', false);
			$('#jenis_kelamin_keluarga').attr('disabled', false);
			$('#status_pernikahan_keluarga').attr('disabled', false);
			$('#tgl_wafat_keluarga').attr('disabled', true);
			$('#umur_keluarga').attr('disabled', true);
			$('#hari_keluarga').attr('disabled', true);
			$('#sebab_wafat_keluarga').attr('disabled', true);
			$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
			$('#pedapatan_ibu_keluarga').attr('disabled', true);
			$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
			$('#keahlian_keluarga').attr('disabled', true);
			$('#status_rumah_keluarga').attr('disabled', true);
			$('#kondisi_rumah_keluarga').attr('disabled', true);
			$('#jml_asuh').attr('disabled', true);
			$('#pekerjaan_keluarga').attr('disabled', false);
			$('#pendidikan_terakhir').attr('disabled', false);
			$('#agama_keluarga').attr('disabled', false);
			$('#suku_keluarga').attr('disabled', false);
			$('#kewarganegaraan_keluarga').attr('disabled', false);
			$('#ormas_keluarga').attr('disabled', true);
			$('#orpol_keluarga').attr('disabled', true);
			$('#kedudukandimasyarakat_keluarga').attr('disabled', false);
			$('#tahun_lulus_keluarga').attr('disabled', false);
			$('#nostambuk_keluarga').attr('disabled', false);
			$('#tempat_lahir_keluarga').attr('disabled', false);
			$('#tgl_lahir_keluarga').attr('disabled', false);
			$('#hubungan_keluarga').attr('disabled', false);
			$('#keterangan_keluarga').attr('disabled', false);
			$('#ktp_keluarga').attr('disabled', false);
		}
		else if ($('#kategori_santri').val() == 'TMI') {
			$('#nama_keluarga').attr('disabled', false);
			$('#nik_keluarga').attr('disabled', false);
			$('#binbinti_keluarga').attr('disabled', false);
			$('#jenis_kelamin_keluarga').attr('disabled', false);
			$('#status_pernikahan_keluarga').attr('disabled', false);
			$('#tgl_wafat_keluarga').attr('disabled', true);
			$('#umur_keluarga').attr('disabled', true);
			$('#hari_keluarga').attr('disabled', true);
			$('#sebab_wafat_keluarga').attr('disabled', true);
			$('#status_perkawinan_ibu_keluarga').attr('disabled', true);
			$('#pedapatan_ibu_keluarga').attr('disabled', true);
			$('#sebab_tidak_bekerja_keluarga').attr('disabled', true);
			$('#keahlian_keluarga').attr('disabled', true);
			$('#status_rumah_keluarga').attr('disabled', true);
			$('#kondisi_rumah_keluarga').attr('disabled', true);
			$('#jml_asuh').attr('disabled', true);
			$('#pekerjaan_keluarga').attr('disabled', false);
			$('#pendidikan_terakhir').attr('disabled', false);
			$('#agama_keluarga').attr('disabled', false);
			$('#suku_keluarga').attr('disabled', false);
			$('#kewarganegaraan_keluarga').attr('disabled', false);
			$('#ormas_keluarga').attr('disabled', true);
			$('#orpol_keluarga').attr('disabled', true);
			$('#kedudukandimasyarakat_keluarga').attr('disabled', false);
			$('#tahun_lulus_keluarga').attr('disabled', false);
			$('#nostambuk_keluarga').attr('disabled', false);
			$('#tempat_lahir_keluarga').attr('disabled', false);
			$('#tgl_lahir_keluarga').attr('disabled', false);
			$('#hubungan_keluarga').attr('disabled', false);
			$('#keterangan_keluarga').attr('disabled', false);
			$('#ktp_keluarga').attr('disabled', false);
		}
	}
}

function TambahKeluarga() {
	if ($("#add_keluarga_santri").valid() == true) {
		var kdkeluarga = makeid();
		var hid_kdkeluarga = $('#hid_kdkeluarga').val();
		var kategori_keluarga = $('#kategori_keluarga').val();
		var nama_keluarga = $('#nama_keluarga').val();
		var nik_keluarga = $('#nik_keluarga').val();
		var binbinti_keluarga = $('#binbinti_keluarga').val();
		var jenis_kelamin_keluarga = $('#jenis_kelamin_keluarga').val();
		var status_pernikahan_keluarga = $('#status_pernikahan_keluarga').val();
		var tgl_wafat_keluarga = $('#tgl_wafat_keluarga').val();
		var umur_keluarga = $('#umur_keluarga').val();
		var hari_keluarga = $('#hari_keluarga').val();
		var sebab_wafat_keluarga = $('#sebab_wafat_keluarga').val();
		var status_perkawinan_ibu_keluarga = $('#status_perkawinan_ibu_keluarga').val();
		var pedapatan_ibu_keluarga = $('#pedapatan_ibu_keluarga').val();
		var sebab_tidak_bekerja_keluarga = $('#sebab_tidak_bekerja_keluarga').val();
		var keahlian_keluarga = $('#keahlian_keluarga').val();
		var status_rumah_keluarga = $('#status_rumah_keluarga').val();
		var kondisi_rumah_keluarga = $('#kondisi_rumah_keluarga').val();
		var jml_asuh = $('#jml_asuh').val();
		var pekerjaan_keluarga = $('#pekerjaan_keluarga').val();
		var pendidikan_terakhir = $('#pendidikan_terakhir').val();
		var agama_keluarga = $('#agama_keluarga').val();
		var suku_keluarga = $('#suku_keluarga').val();
		var kewarganegaraan_keluarga = $('#kewarganegaraan_keluarga').val();
		var ormas_keluarga = $('#ormas_keluarga').val();
		var orpol_keluarga = $('#orpol_keluarga').val();
		var kedudukandimasyarakat_keluarga = $('#kedudukandimasyarakat_keluarga').val();
		var tahun_lulus_keluarga = $('#tahun_lulus_keluarga').val();
		var nostambuk_keluarga = $('#nostambuk_keluarga').val();
		var tempat_lahir_keluarga = $('#tempat_lahir_keluarga').val();
		var tgl_lahir_keluarga = $('#tgl_lahir_keluarga').val();
		var hubungan_keluarga = $('#hubungan_keluarga').val();
		var keterangan_keluarga = $('#keterangan_keluarga').val();
		var ktp_keluarga = $('#ktp_keluarga').val();
		var hid_ktp_keluarga = $('#hid_ktp_keluarga').val();
		var hid_jumlah_item = $('#hid_jumlah_item_keluarga').val();
		var itemcountayah = $('#hid_cek_ayah').val();
		var itemcountibu = $('#hid_cek_ibu').val();
		var itemcountwali = $('#hid_cek_wali').val();

		var kdkel = kategori_keluarga;
		if (cekItem(kdkel) == true) {
			//upload file ke temp folder
			var iform = $('#add_keluarga_santri')[0];
			var data = new FormData(iform);

			$.ajax({
				url: base_url + 'pendaftaran/upload_lamp_keluarga',
				type: 'post',
				enctype: 'multipart/form-data',
				contentType: false,
				processData: false,
				data: data,
				success: function (response) {

					if (response != '') {

						var resp = $.parseJSON(response);
						var file = resp.name;
						var kategori = $('#hid_kategori_santri').val();
						if (kategori == 'TMI') {
							var linkfile = "<a href='./assets/images/uploadtemp/" + file + "' target='_blank'>" + file + "</a>";
						}
						else if (kategori == 'AITAM') {
							var linkfile = "<a href='../assets/images/uploadtemp/" + file + "' target='_blank'>" + file + "</a>";
						}
					}
					else {
						var file = hid_ktp_keluarga;
						var kategori = $('#hid_kategori_santri').val();
						if (kategori == 'TMI') {
							var linkfile = "<a href='./assets/images/fileupload/ktp/" + file + "' target='_blank'>" + file + "</a>";
						}
						else if (kategori == 'AITAM') {
							var linkfile = "<a href='../assets/images/fileupload/ktp/" + file + "' target='_blank'>" + file + "</a>";
						}
					}

					var str_data = kdkeluarga + '#' + kategori_keluarga + '#' + nama_keluarga + '#' + nik_keluarga + '#' + binbinti_keluarga + '#' + jenis_kelamin_keluarga + '#' + status_pernikahan_keluarga + '#' + tgl_wafat_keluarga + '#' + umur_keluarga + '#' + hari_keluarga + '#' + sebab_wafat_keluarga + '#' + status_perkawinan_ibu_keluarga + '#' + pedapatan_ibu_keluarga + '#' + sebab_tidak_bekerja_keluarga + '#' + keahlian_keluarga + '#' + status_rumah_keluarga + '#' + kondisi_rumah_keluarga + '#' + jml_asuh + '#' + pekerjaan_keluarga + '#' + pendidikan_terakhir + '#' + agama_keluarga + '#' + suku_keluarga + '#' + kewarganegaraan_keluarga + '#' + ormas_keluarga + '#' + orpol_keluarga + '#' + kedudukandimasyarakat_keluarga + '#' + tahun_lulus_keluarga + '#' + nostambuk_keluarga + '#' + tempat_lahir_keluarga + '#' + tgl_lahir_keluarga + '#' + hubungan_keluarga + '#' + keterangan_keluarga + '#' + file;
					var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editdetailkeluarga(\"" + str_data + "\")'><i class='fa fa-pencil'></i></a>&nbsp;";
					strbutton += "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='hapusItem(\"" + kdkeluarga + "\")'><i class='fa fa-trash'></i></a>";


					// var hid_kdkeluarga = $('#hid_kdkeluarga').val();
					if (hid_kdkeluarga != '') {
						var row = document.getElementById('row' + hid_kdkeluarga);

						row.cells[1].innerHTML = kategori_keluarga;
						row.cells[2].innerHTML = nama_keluarga;
						row.cells[3].innerHTML = nik_keluarga;
						row.cells[4].innerHTML = binbinti_keluarga;
						row.cells[5].innerHTML = jenis_kelamin_keluarga;
						row.cells[6].innerHTML = status_pernikahan_keluarga;
						row.cells[7].innerHTML = tgl_wafat_keluarga;
						row.cells[8].innerHTML = umur_keluarga;
						row.cells[9].innerHTML = hari_keluarga;
						row.cells[10].innerHTML = sebab_wafat_keluarga;
						row.cells[11].innerHTML = status_perkawinan_ibu_keluarga;
						row.cells[12].innerHTML = pedapatan_ibu_keluarga;
						row.cells[13].innerHTML = sebab_tidak_bekerja_keluarga;
						row.cells[14].innerHTML = keahlian_keluarga;
						row.cells[15].innerHTML = status_rumah_keluarga;
						row.cells[16].innerHTML = kondisi_rumah_keluarga;
						row.cells[17].innerHTML = jml_asuh;
						row.cells[18].innerHTML = pekerjaan_keluarga;
						row.cells[19].innerHTML = pendidikan_terakhir;
						row.cells[20].innerHTML = agama_keluarga;
						row.cells[21].innerHTML = suku_keluarga;
						row.cells[22].innerHTML = kewarganegaraan_keluarga;
						row.cells[23].innerHTML = ormas_keluarga;
						row.cells[24].innerHTML = orpol_keluarga
						row.cells[25].innerHTML = kedudukandimasyarakat_keluarga;
						row.cells[26].innerHTML = tahun_lulus_keluarga;
						row.cells[27].innerHTML = nostambuk_keluarga;
						row.cells[28].innerHTML = tempat_lahir_keluarga;
						row.cells[29].innerHTML = tgl_lahir_keluarga;
						row.cells[30].innerHTML = hubungan_keluarga;
						row.cells[31].innerHTML = keterangan_keluarga;
						row.cells[32].innerHTML = file;
						row.cells[33].innerHTML = linkfile;
						row.cells[34].innerHTML = strbutton;

						$('#Modal_add_keluarga_santri').modal('hide');
					}
					else {
						var row_count = $('#tb_list_keluarga tr.tb-detail').length;
						var content_data = '<tr class="tb-detail" id="row' + kdkeluarga + '">';
						content_data += "<td>" + (row_count + 1) + "</td>";
						content_data += "<td>" + kategori_keluarga + "</td>";
						content_data += "<td>" + nama_keluarga + "</td>";
						content_data += "<td>" + nik_keluarga + "</td>";
						content_data += "<td>" + binbinti_keluarga + "</td>";
						content_data += "<td>" + jenis_kelamin_keluarga + "</td>";
						content_data += "<td>" + status_pernikahan_keluarga + "</td>";
						content_data += "<td class='hidden'>" + tgl_wafat_keluarga + "</td>";
						content_data += "<td class='hidden'>" + umur_keluarga + "</td>";
						content_data += "<td class='hidden'>" + hari_keluarga + "</td>";
						content_data += "<td class='hidden'>" + sebab_wafat_keluarga + "</td>";
						content_data += "<td class='hidden'>" + status_perkawinan_ibu_keluarga + "</td>";
						content_data += "<td class='hidden'>" + pedapatan_ibu_keluarga + "</td>";
						content_data += "<td class='hidden'>" + sebab_tidak_bekerja_keluarga + "</td>";
						content_data += "<td class='hidden'>" + keahlian_keluarga + "</td>";
						content_data += "<td class='hidden'>" + status_rumah_keluarga + "</td>";
						content_data += "<td class='hidden'>" + kondisi_rumah_keluarga + "</td>";
						content_data += "<td class='hidden'>" + jml_asuh + "</td>";
						content_data += "<td>" + pekerjaan_keluarga + "</td>";
						content_data += "<td>" + pendidikan_terakhir + "</td>";
						content_data += "<td class='hidden'>" + agama_keluarga + "</td>";
						content_data += "<td class='hidden'>" + suku_keluarga + "</td>";
						content_data += "<td class='hidden'>" + kewarganegaraan_keluarga + "</td>";
						content_data += "<td class='hidden'>" + ormas_keluarga + "</td>";
						content_data += "<td class='hidden'>" + orpol_keluarga + "</td>";
						content_data += "<td class='hidden'>" + kedudukandimasyarakat_keluarga + "</td>";
						content_data += "<td class='hidden'>" + tahun_lulus_keluarga + "</td>";
						content_data += "<td class='hidden'>" + nostambuk_keluarga + "</td>";
						content_data += "<td class='hidden'>" + tempat_lahir_keluarga + "</td>";
						content_data += "<td>" + tgl_lahir_keluarga + "</td>";
						content_data += "<td>" + hubungan_keluarga + "</td>";
						content_data += "<td class='hidden'>" + keterangan_keluarga + "</td>";
						content_data += "<td class='hidden'>" + file + "</td>"
						content_data += "<td>" + linkfile + "</td>";
						content_data += "<td>" + strbutton + "</td>";
						content_data += "</tr>";

						if (row_count < 1) {

							$('#tb_list_keluarga tbody').html(content_data);
						}
						else {

							$('#tb_list_keluarga tbody').append(content_data);
						}
						if (kategori_keluarga == 'AYAH') {
							$("#hid_cek_ayah").val(1);
						}
						if (kategori_keluarga == 'IBU') {
							$("#hid_cek_ibu").val(1);
						}
						if (kategori_keluarga == 'WALI') {
							$("#hid_cek_wali").val(1);
						}
						$("#hid_jumlah_item_keluarga").val(row_count + 1);
						urutkanNomor();

						$('#Modal_add_keluarga_santri').modal('hide');
					}
				}
			});
			// }
		}
		else {

			bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;kategori " + kategori_keluarga + " sudah ada di list.");
		}
	}

}

function cek_tgl_lahir() {


	// var datep = $('#tgl_lahir_keluarga').val();

	// if (Date.parse(datep) - Date.parse(new Date()) < 0) {
	// 	alert("good");
	// }
	// else{
	// 	alert("bad");
	// }



}

function urutkanNomor() {

	var oTable = document.getElementById('tb_list_keluarga');

	//hitung table row
	var rowLength = oTable.rows.length;
	rowLength = rowLength - 1;

	//urutkan nomor per row
	for (i = 1; i <= rowLength; i++) {

		oTable.rows.item(i).cells[0].innerHTML = i;
	}
}

function cekItem(i_kdkel) {
	var oTable = document.getElementById('tb_list_keluarga');
	var rowLength = oTable.rows.length;
	var itemcount = $('#hid_jumlah_item_keluarga').val();
	var hid_kdkeluarga = $('#hid_kdkeluarga').val();
	rowLength = rowLength - 1;

	if (itemcount == "0" || hid_kdkeluarga != '') { //jika item kosong

		return true;
	}
	else {

		for (i = 1; i <= rowLength; i++) {
			var kdkel = oTable.rows.item(i).cells[1].innerHTML;
			if (kdkel != 'SAUDARA') {

				if (kdkel == i_kdkel) {

					return false;
				}
			}
		}
		return true;
	}
}

function editdetailkeluarga(str_data) {
	clearvalidate_add_keluarga_santri()

	var idata = str_data.split('#');

	$('#hid_kdkeluarga').val(idata[0]);
	$('#kategori_keluarga').val(idata[1]);
	$('#nama_keluarga').val(idata[2]);
	$('#nik_keluarga').val(idata[3]);
	$('#binbinti_keluarga').val(idata[4]);
	$('#jenis_kelamin_keluarga').val(idata[5]);
	$('#status_pernikahan_keluarga').val(idata[6]);
	$('#tgl_wafat_keluarga').val(idata[7]);
	$('#umur_keluarga').val(idata[8]);
	$('#hari_keluarga').val(idata[9]);
	$('#sebab_wafat_keluarga').val(idata[10]);
	$('#status_perkawinan_ibu_keluarga').val(idata[11]);
	$('#pedapatan_ibu_keluarga').val(idata[12]);
	$('#sebab_tidak_bekerja_keluarga').val(idata[13]);
	$('#keahlian_keluarga').val(idata[14]);
	$('#status_rumah_keluarga').val(idata[15]);
	$('#kondisi_rumah_keluarga').val(idata[16]);
	$('#jml_asuh').val(idata[17]);
	$('#pekerjaan_keluarga').val(idata[18]);
	$('#pendidikan_terakhir').val(idata[19]);
	$('#agama_keluarga').val(idata[20]);
	$('#suku_keluarga').val(idata[21]);
	$('#kewarganegaraan_keluarga').val(idata[22]);
	$('#ormas_keluarga').val(idata[23]);
	$('#orpol_keluarga').val(idata[24]);
	$('#kedudukandimasyarakat_keluarga').val(idata[25]);
	$('#tahun_lulus_keluarga').val(idata[26]);
	$('#nostambuk_keluarga').val(idata[27]);
	$('#tempat_lahir_keluarga').val(idata[28]);
	$('#tgl_lahir_keluarga').val(idata[29]);
	$('#hubungan_keluarga').val(idata[30]);
	$('#keterangan_keluarga').val(idata[31]);
	$('#hid_ktp_keluarga').val(idata[32]);

	cek_kt();
	cek_jk();
	$('#kategori_keluarga').attr('disabled', true);
	$('#btn_keluarga').text('Perbaharui');
	$('#Modal_add_keluarga_santri').modal('show');
}

function viewdetailkeluarga(str_data) {
	clearvalidate_add_keluarga_santri()

	var idata = str_data.split('#');

	$('#hid_kdkeluarga').val(idata[0]);
	$('#kategori_keluarga').val(idata[1]);
	$('#nama_keluarga').val(idata[2]);
	$('#nik_keluarga').val(idata[3]);
	$('#binbinti_keluarga').val(idata[4]);
	$('#jenis_kelamin_keluarga').val(idata[5]);
	$('#status_pernikahan_keluarga').val(idata[6]);
	$('#tgl_wafat_keluarga').val(idata[7]);
	$('#umur_keluarga').val(idata[8]);
	$('#hari_keluarga').val(idata[9]);
	$('#sebab_wafat_keluarga').val(idata[10]);
	$('#status_perkawinan_ibu_keluarga').val(idata[11]);
	$('#pedapatan_ibu_keluarga').val(idata[12]);
	$('#sebab_tidak_bekerja_keluarga').val(idata[13]);
	$('#keahlian_keluarga').val(idata[14]);
	$('#status_rumah_keluarga').val(idata[15]);
	$('#kondisi_rumah_keluarga').val(idata[16]);
	$('#jml_asuh').val(idata[17]);
	$('#pekerjaan_keluarga').val(idata[18]);
	$('#pendidikan_terakhir').val(idata[19]);
	$('#agama_keluarga').val(idata[20]);
	$('#suku_keluarga').val(idata[21]);
	$('#kewarganegaraan_keluarga').val(idata[22]);
	$('#ormas_keluarga').val(idata[23]);
	$('#orpol_keluarga').val(idata[24]);
	$('#kedudukandimasyarakat_keluarga').val(idata[25]);
	$('#tahun_lulus_keluarga').val(idata[26]);
	$('#nostambuk_keluarga').val(idata[27]);
	$('#tempat_lahir_keluarga').val(idata[28]);
	$('#tgl_lahir_keluarga').val(idata[29]);
	$('#hubungan_keluarga').val(idata[30]);
	$('#keterangan_keluarga').val(idata[31]);
	$('#hid_ktp_keluarga').val(idata[32]);

	cek_kt();
	cek_jk();
	mati_kel();
	$('#kategori_keluarga').attr('disabled', true);
	$('#btn_keluarga').hide();
	$('#button_keluarga').hide();
	$('#Modal_add_keluarga_santri').modal('show');
}

function hapusItem(row_id) {

	bootbox.confirm("Anda yakin akan menghapus item ini ?",
		function (result) {
			if (result == true) {

				$('#row' + row_id).remove();
				urutkanNomor();

				var row_count = $('#tb_list_keluarga tr.tb-detail').length;

				$('#hid_jumlah_item_keluarga').val(row_count); //simpan jumlah item


				if (row_count < 1) {

					var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
					$('#tb_list_keluarga tbody').append(content_data);
				}
			}
		}
	);
}
//#endregion keluarga

//#region data penyakit
function kosong_modal_penyakit() {
	$('#nama_penyakit').val('')
	$('#thn_penyakit').val('')
	$('#kategori_penyakit').val('')
	$('#tipe_penyakit').val('')
	$('#lamp_bukti').val('')
	$('#hid_kdpenyakit').val('')
	$('#hid_lamp_bukti').val('')
}

function modalAddPenyakit(){
	kosong_modal_penyakit();
	$('#btn_penyakit').text('Tambah');
	$('#Modal_add_penyakit').modal('show');
}

var validate_add_penyakit = function(){
	
	var form = $('#add_penyakit');
	var error2 = $('.alert-danger', form);
	var success2 = $('.alert-success', form);

	form.validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		ignore: "",  // validate all fields including form hidden input

		invalidHandler: function (event, validator) { //display error alert on form submit              
			success2.hide();
			error2.show();
			App.scrollTo(error2, -200);
		},

		errorPlacement: function (error, element) { // render error placement for each input type
			var icon = $(element).parent('.input-icon').children('i');
			icon.removeClass('fa-check').addClass("fa-warning");  
			icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
		},

		highlight: function (element) { // hightlight error inputs
			$(element)
				.closest('.input-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
		},

		unhighlight: function (element) { // revert the change done by hightlight
			
		},

		success: function (label, element) {
			var icon = $(element).parent('.input-icon').children('i');
			$(element).closest('.input-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
			icon.removeClass("fa-warning").addClass("fa-check");
		},

		submitHandler: function (form) {
			success2.show();
			error2.hide();
			form[0].submit(); // submit the form
		}
	});
}

function clearvalidate_add_penyakit(){
	
		$("#add_penyakit div").removeClass('has-error');
		$("#add_penyakit i").removeClass('fa-warning');
	
		$("#add_penyakit div").removeClass('has-success');
		$("#add_penyakit i").removeClass('fa-check');
	
		document.getElementById("add_penyakit").reset();
}

function TambahPenyakit(){
	if($("#add_penyakit").valid()==true)
	{
		var kdpenyakit 	= makeid();
		var hid_kdpenyakit 				= $('#hid_kdpenyakit').val();
		var nama_penyakit 				= $('#nama_penyakit').val();
		var thn_penyakit 				= $('#thn_penyakit').val();
		var kategori_penyakit 			= $('#kategori_penyakit').val();
		var tipe_penyakit 				= $('#tipe_penyakit').val();
		var lamp_bukti 					= $('#lamp_bukti').val();
		var hid_lamp_bukti 				= $('#hid_lamp_bukti').val();
		var hid_jumlah_item 			= $('#hid_jumlah_item_penyakit').val();
		
		
		// if(cekItemPenyakit(nama_penyakit)==true)
		// {
					//upload file ke temp folder
					var iform = $('#add_penyakit')[0];
					var data = new FormData(iform);

					$.ajax({
						url: base_url+'pendaftaran/upload_lamp_penyakit',
						type: 'post',
						enctype: 'multipart/form-data',
						contentType: false,
						processData: false,
						data: data,
						success: function(response){
							

							if(response!=''){
								
								var resp 		= $.parseJSON(response);
								var file 		=resp.name;
								var kategori = $('#hid_kategori_santri').val();
								if (kategori == 'TMI') {
									var linkfile = "<a href='./assets/images/uploadtemp/" + file + "' target='_blank'>" + file + "</a>";
								}
								else if (kategori == 'AITAM') {
									var linkfile = "<a href='../assets/images/uploadtemp/" + file + "' target='_blank'>" + file + "</a>";
								}
								
							}
							else
							{
								var file = hid_lamp_bukti;
								var kategori = $('#hid_kategori_santri').val();
								if (kategori == 'TMI') {
									var linkfile = "<a href='./assets/images/fileupload/lamp_penyakit/" + file + "' target='_blank'>" + file + "</a>";
								}
								else if (kategori == 'AITAM') {
									var linkfile = "<a href='../assets/images/fileupload/lamp_penyakit/" + file + "' target='_blank'>" + file + "</a>";
								}
							}
							
							var str_data = kdpenyakit + '#' + nama_penyakit + '#' + thn_penyakit + '#' + kategori_penyakit + '#' + tipe_penyakit + '#' + file ;
							var strbutton = "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editdetailpenyakit(\"" + str_data + "\")'><i class='fa fa-pencil'></i></a>&nbsp;";
							strbutton += "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='hapusItemPenyakit(\"" + kdpenyakit + "\")'><i class='fa fa-trash'></i></a>";

							if (hid_kdpenyakit !='')
							{

								var row = document.getElementById('row' + hid_kdpenyakit);

								row.cells[1].innerHTML = nama_penyakit;
								row.cells[2].innerHTML = thn_penyakit;
								row.cells[3].innerHTML = kategori_penyakit;
								row.cells[4].innerHTML = tipe_penyakit;
								row.cells[5].innerHTML = file;
								row.cells[6].innerHTML = linkfile;
								row.cells[7].innerHTML = strbutton; 
								$('#Modal_add_penyakit').modal('hide');

							}
							else
							{
								//add to table list
								var row_count = $('#tb_list_penyakit tr.tb-detail').length;
								var content_data = '<tr class="tb-detail" id="row' + kdpenyakit + '">';
								content_data += "<td>" + (row_count + 1) + "</td>";
								content_data += "<td>" + nama_penyakit + "</td>";
								content_data += "<td>" + thn_penyakit + "</td>";
								content_data += "<td>" + kategori_penyakit + "</td>";
								content_data += "<td>" + tipe_penyakit + "</td>";
								content_data += "<td class='hidden'>" + file + "</td>";
								content_data += "<td>" + linkfile + "</td>";
								content_data += "<td>" + strbutton + "</td>";
								content_data += "</tr>";

								if (row_count < 1) {

									$('#tb_list_penyakit tbody').html(content_data);
								}
								else {

									$('#tb_list_penyakit tbody').append(content_data);
								}

								$("#hid_jumlah_item_penyakit").val(row_count + 1);
								urutkanNomorPenyakit();
								$('#Modal_add_penyakit').modal('hide');
							}
									
									
						},
						error:function(){

							bootbox.alert({
								size:'small',
								title:"<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Upload Failed.",
								message:"Upload Failed.",
								buttons:{
									ok:{
										label: 'OK',
										className: 'btn-error'
									}
								}
							});
						}
					});
					//end upload
		// }
		// else{

		// 	bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;"+nama_penyakit+" sudah ada di list.");
		// }

	}
}

function urutkanNomorPenyakit(){

	var oTable = document.getElementById('tb_list_penyakit');

	//hitung table row
	var rowLength = oTable.rows.length;
		rowLength = rowLength-1;

	//urutkan nomor per row
	for (i = 1; i <= rowLength; i++){

		oTable.rows.item(i).cells[0].innerHTML = i;
	}
}

function cekItemPenyakit(i_kdpenyakit){
		var oTable  	= document.getElementById('tb_list_penyakit');
		var rowLength = oTable.rows.length;
		var itemcount = $('#hid_jumlah_item_penyakit').val();
		rowLength = rowLength-1;

		if(itemcount=="0"){ //jika item kosong

			return true;
		}
		else{

			for (i = 1; i <= rowLength; i++)
			{
				var kdpenyakit = oTable.rows.item(i).cells[1].innerHTML;
				// print(kode_kategori);
				if(kdpenyakit==i_kdpenyakit){

						return false;
				}
			}
			return true;
		}
}

function editdetailpenyakit(str_data) {
	clearvalidate_add_penyakit();

	var idata = str_data.split('#');

	$("#hid_kdpenyakit").val(idata[0]);
	$("#nama_penyakit").val(idata[1]);
	$("#thn_penyakit").val(idata[2]);
	$("#kategori_penyakit").val(idata[3]);
	$("#tipe_penyakit").val(idata[4]);
	$("#hid_lamp_bukti").val(idata[5]);
	// $("#lamp_bukti").val('test');
	$('#btn_penyakit').text('Perbaharui');
	$('#Modal_add_penyakit').modal('show');
}

function viewdetailpenyakit(str_data) {
	clearvalidate_add_penyakit();

	var idata = str_data.split('#');

	$("#hid_kdpenyakit").val(idata[0]);
	$("#nama_penyakit").val(idata[1]);
	$("#thn_penyakit").val(idata[2]);
	$("#kategori_penyakit").val(idata[3]);
	$("#tipe_penyakit").val(idata[4]);
	$("#hid_lamp_bukti").val(idata[5]);
	$("#hid_kdpenyakit").attr('disabled',true);
	$("#nama_penyakit").attr('disabled', true);
	$("#thn_penyakit").attr('disabled', true);
	$("#kategori_penyakit").attr('disabled', true);
	$("#tipe_penyakit").attr('disabled', true);
	$("#hid_lamp_bukti").attr('disabled', true);
	$("#lamp_bukti").attr('disabled', true);
	
	$('#btn_penyakit').hide();
	$('#Modal_add_penyakit').modal('show');
}

function hapusItemPenyakit(row_id){

		bootbox.confirm("Anda yakin akan menghapus item ini ?",
		function(result){
			if(result==true){

				$('#row'+row_id).remove();
				urutkanNomorPenyakit();

				var row_count = $('#tb_list_penyakit tr.tb-detail').length					;

				$('#hid_jumlah_item_penyakit').val(row_count); //simpan jumlah item


				if(row_count<1){

					var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
					$('#tb_list_penyakit tbody').append(content_data);
				}
			}
		}
	);
}
//#endregion data penyakit

//#region  donatur
function modalAdddonatur() {
	if ($("#hid_Xaitam").val() == '' && $("#kategori_santri") == 'TMI')
	{
		bootbox.alert("tidan bisa!!");
	}
	else
	{
		clearvalidate_add_donatur
		$('#hiddenidDonatur').hide();
		$('#spansearchcloseDonatur').hide();
		// $('#spansearchDonatur').hide();
		$('#btn_donatur').text('Tambah');
		$('#Modal_add_donatur').modal('show');

	}
}
function idDonaturshow() {
	$('#hiddenidDonatur').show();
	$('#spansearchDonatur').hide();
	$('#spansearchcloseDonatur').show();
}

function idDonaturhide() {
	$('#hiddenidDonatur').hide();
	$('#spansearchDonatur').show();
	$('#spansearchcloseDonatur').hide();
}

function pilihItemDonatur() {

	$item = $('#hide_id_Donatur').val();
	$item = $item.split('#');

	$('#donatur').val($item[0]);
	$('#nama_donatur').val($item[1]);
	$('#kategori_donatur').val($item[2]);
	$('#hiddenidDonatur').hide();
	$('#spansearchDonatur').show();
	$('#spansearchcloseDonatur').hide();
}

var validate_add_donatur = function () {

	var form = $('#add_donatur');
	var error2 = $('.alert-danger', form);
	var success2 = $('.alert-success', form);

	form.validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		ignore: "",  // validate all fields including form hidden input

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
				.closest('.input-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
		},

		unhighlight: function (element) { // revert the change done by hightlight

		},

		success: function (label, element) {
			var icon = $(element).parent('.input-icon').children('i');
			$(element).closest('.input-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
			icon.removeClass("fa-warning").addClass("fa-check");
		},

		submitHandler: function (form) {
			success2.show();
			error2.hide();
			form[0].submit(); // submit the form
		}
	});
}

function clearvalidate_add_donatur() {

	$("#add_donatur div").removeClass('has-error');
	$("#add_donatur i").removeClass('fa-warning');

	$("#add_donatur div").removeClass('has-success');
	$("#add_donatur i").removeClass('fa-check');

	document.getElementById("add_donatur").reset();
}

function Tambahdonatur() {
	if ($("#add_donatur").valid() == true) {
		var kddonatur 			= makeid();
		var hid_kddonatur 		= $('#hid_kddonatur').val();
		var donatur 			= $('#donatur').val();
		var nama_donatur 		= $('#nama_donatur').val();
		var kategori_donatur 	= $('#kategori_donatur').val();
		var hid_jumlah_item 	= $('#hid_jumlah_item_donatur').val();


		if(cekItemdonatur(nama_donatur)==true)
		{
			
					var str_data = kddonatur + '#' + nama_donatur + '#' + kategori_donatur;
					var strbutton = "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='hapusItemdonatur(\"" + kddonatur + "\")'><i class='fa fa-trash'></i></a>";

					if (hid_kddonatur != '') {

						var row = document.getElementById('row' + hid_kddonatur);

						row.cells[0].innerHTML = donatur;
						row.cells[1].innerHTML = nama_donatur;
						row.cells[2].innerHTML = kategori_donatur;
						row.cells[7].innerHTML = strbutton;
						$('#Modal_add_donatur').modal('hide');

					}
					else {
						//add to table list
						var row_count = $('#tb_list_donatur tr.tb-detail').length;
						var content_data = '<tr class="tb-detail" id="row' + kddonatur + '">';
						content_data += "<td>" + (row_count + 1) + "</td>";
						content_data += "<td>" + donatur + "</td>";
						content_data += "<td>" + nama_donatur + "</td>";
						content_data += "<td>" + kategori_donatur + "</td>";
						content_data += "<td>" + strbutton + "</td>";
						content_data += "</tr>";

						if (row_count < 1) {

							$('#tb_list_donatur tbody').html(content_data);
						}
						else {

							$('#tb_list_donatur tbody').append(content_data);
						}

						$("#hid_jumlah_item_donatur").val(row_count + 1);
						urutkanNomordonatur();
						$('#Modal_add_donatur').modal('hide');
					}
			}
			else{

				bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;"+nama_donatur+" sudah ada di list.");
			}

	}
}

function urutkanNomordonatur() {

	var oTable = document.getElementById('tb_list_donatur');

	//hitung table row
	var rowLength = oTable.rows.length;
	rowLength = rowLength - 1;

	//urutkan nomor per row
	for (i = 1; i <= rowLength; i++) {

		oTable.rows.item(i).cells[0].innerHTML = i;
	}
}

function cekItemdonatur(i_kddonatur) {
	var oTable = document.getElementById('tb_list_donatur');
	var rowLength = oTable.rows.length;
	var itemcount = $('#hid_jumlah_item_donatur').val();
	rowLength = rowLength - 1;

	if (itemcount == "0") { //jika item kosong

		return true;
	}
	else {

		for (i = 1; i <= rowLength; i++) {
			var kddonatur = oTable.rows.item(i).cells[2].innerHTML;
			// print(kode_kategori);
			if (kddonatur == i_kddonatur) {

				return false;
			}
		}
		return true;
	}
}

function editdetaildonatur(str_data) {
	clearvalidate_add_donatur();

	var idata = str_data.split('#');

	$("#hid_kddonatur").val(idata[0]);
	$("#nama_donatur").val(idata[1]);
	$("#thn_donatur").val(idata[2]);
	$("#kategori_donatur").val(idata[3]);
	$("#tipe_donatur").val(idata[4]);
	$("#hid_lamp_bukti").val(idata[5]);
	// $("#lamp_bukti").val('test');
	$('#btn_donatur').text('Perbaharui');
	$('#Modal_add_donatur').modal('show');
}

function viewdetaildonatur(str_data) {
	clearvalidate_add_donatur();

	var idata = str_data.split('#');

	$("#hid_kddonatur").val(idata[0]);
	$("#nama_donatur").val(idata[1]);
	$("#thn_donatur").val(idata[2]);
	$("#kategori_donatur").val(idata[3]);
	$("#tipe_donatur").val(idata[4]);
	$("#hid_lamp_bukti").val(idata[5]);
	$("#hid_kddonatur").attr('disabled', true);
	$("#nama_donatur").attr('disabled', true);
	$("#thn_donatur").attr('disabled', true);
	$("#kategori_donatur").attr('disabled', true);
	$("#tipe_donatur").attr('disabled', true);
	$("#hid_lamp_bukti").attr('disabled', true);
	$("#lamp_bukti").attr('disabled', true);

	$('#btn_donatur').hide();
	$('#Modal_add_donatur').modal('show');
}

function hapusItemdonatur(row_id) {

	bootbox.confirm("Anda yakin akan menghapus item ini ?",
		function (result) {
			if (result == true) {

				$('#row' + row_id).remove();
				urutkanNomordonatur();

				var row_count = $('#tb_list_donatur tr.tb-detail').length;

				$('#hid_jumlah_item_donatur').val(row_count); //simpan jumlah item


				if (row_count < 1) {

					var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
					$('#tb_list_donatur tbody').append(content_data);
				}
			}
		}
	);
}
//#endregion donatur

//#region cari
function Modalcari() {
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction() {
	var no_registrasi = $('#s_noregistrasi').val();
	var nama_lengkap = $('#s_namalengkap').val();
	var param = { 'no_registrasi': no_registrasi };
	param = JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload(null, false);
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function clearformcari(){
	$('#s_noregistrasi').val('');
	$('#s_namalengkap').val('');
}

//#endregion cari

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'pendaftaran/exportexcel/'+param;
}

function idgedungshow(){
	$('#hiddenidgedung').show();
	$('#spansearchgedung').hide();
    $('#spansearchclosegedung').show();
}

function idgedunghide(){
	$('#hiddenidgedung').hide();
	$('#spansearchgedung').show();
    $('#spansearchclosegedung').hide();
}

function pilihItemGedung(){

	$item  	= $('#hide_id_gedung').val();
	$item 	= $item.split('#');

    $('#rayon').val($item[0]);
	$('#hiddenidgedung').hide();
    $('#spansearchgedung').show();
    $('#spansearchclosegedung').hide();
}

function idKamarshow(){
	$('#hiddenidKamar').show();
	$('#spansearchKamar').hide();
    $('#spansearchcloseKamar').show();
}

function idKamarhide(){
	$('#hiddenidKamar').hide();
	$('#spansearchKamar').show();
    $('#spansearchcloseKamar').hide();
}

function pilihItemKamar(){

	$item  	= $('#hide_id_Kamar').val();
	$item 	= $item.split('#');

    $('#kamar').val($item[0]);
	$('#hiddenidKamar').hide();
    $('#spansearchKamar').show();
    $('#spansearchcloseKamar').hide();
}

function idKelasshow(){
	$('#hiddenidKelas').show();
	$('#spansearchKelas').hide();
    $('#spansearchcloseKelas').show();
}

function idKelashide(){
	$('#hiddenidKelas').hide();
	$('#spansearchKelas').show();
    $('#spansearchcloseKelas').hide();
}

function pilihItemKelas(){

	$item  	= $('#hide_id_Kelas').val();
	$item 	= $item.split('#');

    $('#kel_sekarang').val($item[0]);
	$('#hiddenidKelas').hide();
    $('#spansearchKelas').show();
    $('#spansearchcloseKelas').hide();
}

function idBagianshow(){
	$('#hiddenidBagian').show();
	$('#spansearchBagian').hide();
    $('#spansearchcloseBagian').show();
}

function idBagianhide(){
	$('#hiddenidBagian').hide();
	$('#spansearchBagian').show();
    $('#spansearchcloseBagian').hide();
}

function pilihItemBagian(){

	$item  	= $('#hide_id_Bagian').val();
	$item 	= $item.split('#');

    $('#bagian').val($item[0]);
	$('#hiddenidBagian').hide();
    $('#spansearchBagian').show();
    $('#spansearchcloseBagian').hide();
}

function ONprosses() {

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function (result) {
			if (result == true) {

			}
		}
	);
}




