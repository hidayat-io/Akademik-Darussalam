// //load
$(document).ready(function()
{
	// addSantri("TMI");
	setTable();
	$('.datepicker').datepicker(
	{
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
			$('#uang_jajan_perbulan').maskMoney({precision:0});
			$('#biaya_perbulan_min').maskMoney({precision:0});
			$('#biaya_perbulan_max').maskMoney({precision:0});
			$('#penghasilan').maskMoney({precision:0});
			$('#pedapatan_ibu_keluarga').maskMoney({precision:0});

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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			    // image_holder.show();
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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
			// bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>Cannot upload file more than 1 MB</div>");
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

	//validasi form data santri
	$( "#add_santri" ).validate({
		errorElement:"em",
		// errorClass:"help-block help-block-error",
			// rules:{
	    //    no_registrasi:{
	    //    minlength:2,
	    //    required:!0},
	    //    no_stambuk:{
	    //    required:!0}
			// },
			messages: {
				// no_registrasi: {
				// 	required: "(required)",
				// 	minlength: " (must be at least 3 characters)"
				// },
				email: "Email invalid"
			},

			invalidHandler: function(element, validator){
				validator.focusInvalid();
			},

			errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-md-9" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "form-control" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-md-9" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-md-9" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}

	}); //end dari validasi form
	//validasi form modal keluarga
	$( "#add_keluarga_santri" ).validate({
		errorElement:"em",
		// errorClass:"help-block help-block-error",
			// rules:{
	    //    no_registrasi:{
	    //    minlength:2,
	    //    required:!0},
	    //    no_stambuk:{
	    //    required:!0}
			// },
			messages: {
				// no_registrasi: {
				// 	required: "(required)",
				// 	minlength: " (must be at least 3 characters)"
				// },
				email: "Email invalid"
			},

			invalidHandler: function(element, validator){
				validator.focusInvalid();
			},

			errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					$(element).closest(".form-group").addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "form-control" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}

	}); //end dari validasi form
	//validasi form modal penyakit
	$( "#add_penyakit" ).validate({
		errorElement:"em",
		// errorClass:"help-block help-block-error",
			// rules:{
	    //    no_registrasi:{
	    //    minlength:2,
	    //    required:!0},
	    //    no_stambuk:{
	    //    required:!0}
			// },
			messages: {
				// no_registrasi: {
				// 	required: "(required)",
				// 	minlength: " (must be at least 3 characters)"
				// },
				email: "Email invalid"
			},

			invalidHandler: function(element, validator){
				validator.focusInvalid();
			},

			errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					$(element).closest(".form-group").addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "form-control" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}

	}); //end dari validasi form

	//validasi form modal add_kecakapan_khusus
	$( "#add_kecakapan_khusus" ).validate({
		errorElement:"em",
		// errorClass:"help-block help-block-error",
			// rules:{
	    //    no_registrasi:{
	    //    minlength:2,
	    //    required:!0},
	    //    no_stambuk:{
	    //    required:!0}
			// },
			messages: {
				// no_registrasi: {
				// 	required: "(required)",
				// 	minlength: " (must be at least 3 characters)"
				// },
				email: "Email invalid"
			},

			invalidHandler: function(element, validator){
				validator.focusInvalid();
			},

			errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					$(element).closest(".form-group").addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "form-control" ) );
					} else {
						error.insertAfter( element );
					}

					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function ( element, errorClass, validClass ) {
					$(element).closest(".form-group").addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}

	}); //end dari validasi form

});


function setTable(){
	 $('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		"bFilter":false,
		ajax: {
			'url':base_url+"aitam/load_grid",
			'type':'GET',
			'data': function ( d ) {
                d.param = $('#hid_param').val();
            }
		},
    } );
}

function Modalcari(){
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction(){
    var no_registrasi 	= $('#s_noregistrasi').val();
    var nama_lengkap 	        = $('#s_namalengkap').val();
	var param 			= {'no_registrasi':no_registrasi};
		param 			= JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload( null, false );
	table.draw();

	$('#Modal_cari').modal('toggle');
}

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
	$('#tb_list_kckhusus > tbody').html('"<tr><td colspan=\"6\" align=\"center\">Belum Ada Data.</td></tr>"');
	$('#hid_jumlah_item_keluarga').val('0');
	$('#hid_cek_ayah').val('0');
	$('#hid_cek_ibu').val('0');
	$('#hid_cek_wali').val('0');
	$('#hid_jumlah_item_penyakit').val('0');
	$('#hid_jumlah_item_KecakapanKhusus').val('0');
	
}

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
		
}

function kosong_modal_penyakit(){
	$('#nama_penyakit').val('')
	$('#thn_penyakit').val('')
	$('#kategori_penyakit').val('')
	$('#tipe_penyakit').val('')
	$('#lamp_bukti').val('')
}

function kosong_modal_kckhusu(){
	$('#bid_studi').val('')
	$('#olahraga').val('')
	$('#kesenian').val('')
	$('#keterampilan').val('')
	$('#lain_lain').val('')
}
	
function mati(){
	if($('#kategori_santri').val() ==''){
		$('#kategori_santri').attr('disabled', false);
	}else{
		$('#kategori_santri').attr('disabled', true);
	}
	
	//disable form add_santri
		// $('#kategori_santri').attr('disabled', true);
		$('#no_registrasi').attr('disabled', true);
		$('#no_stambuk').attr('disabled', true);
		$('#thn_masuk').attr('disabled', true);
		$('#rayon').attr('disabled', true);
		$('#kamar').attr('disabled', true);
		$('#bagian').attr('disabled', true);
		$('#kel_sekarang').attr('disabled', true);
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

		//button
		$('#button_keluarga').hide();
		$('#button_penyakit').hide();
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

function mati_kel(){
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

function hidup(){
	// $('#no_registrasi').attr('disabled', false);
	// $('#no_stambuk').attr('disabled', false);
	$('#kategori_santri').attr('disabled', false);
	$('#thn_masuk').attr('disabled', false);
	$('#rayon').attr('disabled', false);
	$('#kamar').attr('disabled', false);
	$('#bagian').attr('disabled', false);
	$('#kel_sekarang').attr('disabled', false);
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
}

function filter_tmi(){
	$('#no_registrasi').attr('disabled', false);
	$('#no_stambuk').attr('disabled', false);
	$('#thn_masuk').attr('disabled', false);
	$('#rayon').attr('disabled', false);
	$('#kamar').attr('disabled', false);
	$('#bagian').attr('disabled', false);
	$('#kel_sekarang').attr('disabled', true);
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
	var no_registrasi		= $('#no_registrasi').val();
	if ( no_registrasi != ''){
			//button
		$('#button_keluarga').show();
		$('#button_penyakit').show();
		$('#button_kecakapankhusus').show();
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
		$('#button_kecakapankhusus').show();
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
	$('#rayon').attr('disabled', true);
	$('#kamar').attr('disabled', true);
	$('#bagian').attr('disabled', true);
	$('#kel_sekarang').attr('disabled', true);
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
		$('#button_kecakapankhusus').show();
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

function svSantri(){
	if($("#add_santri").valid()==true){
	
		//data keluarga
		var item_data_tb_list_keluarga = "";

		var oTable 		= document.getElementById('tb_list_keluarga');
		var rowLength 	= oTable.rows.length;
		var isitablekeluarga = $('#hid_jumlah_item_keluarga').val();
			if(isitablekeluarga ==0){
				rowLength 	= rowLength-2;
			}else{
				rowLength 	= rowLength-1;
			}

		for (i = 1; i <= rowLength; i++){

			var irow = oTable.rows.item(i);

			item_data_tb_list_keluarga += irow.cells[1].innerHTML+"#"; //kategori_keluarga
			item_data_tb_list_keluarga += irow.cells[2].innerHTML+"#"; //nama_keluarga
			item_data_tb_list_keluarga += irow.cells[3].innerHTML+"#"; //nik_keluarga
			item_data_tb_list_keluarga += irow.cells[4].innerHTML+"#"; //binbinti_keluarga
			item_data_tb_list_keluarga += irow.cells[5].innerHTML+"#"; //jenis_kelamin_keluarga
			item_data_tb_list_keluarga += irow.cells[6].innerHTML+"#"; //status_pernikahan_keluarga
			item_data_tb_list_keluarga += irow.cells[7].innerHTML+"#"; //tgl_wafat_keluarga
			item_data_tb_list_keluarga += irow.cells[8].innerHTML+"#"; //umur_keluarga
			item_data_tb_list_keluarga += irow.cells[9].innerHTML+"#"; //hari_keluarga
			item_data_tb_list_keluarga += irow.cells[10].innerHTML+"#"; //sebab_wafat_keluarga
			item_data_tb_list_keluarga += irow.cells[11].innerHTML+"#"; //status_perkawinan_ibu_keluarga
			item_data_tb_list_keluarga += irow.cells[12].innerHTML+"#"; //pedapatan_ibu_keluarga
			item_data_tb_list_keluarga += irow.cells[13].innerHTML+"#"; //sebab_tidak_bekerja_keluarga
			item_data_tb_list_keluarga += irow.cells[14].innerHTML+"#"; //keahlian_keluarga
			item_data_tb_list_keluarga += irow.cells[15].innerHTML+"#"; //status_rumah_keluarga
			item_data_tb_list_keluarga += irow.cells[16].innerHTML+"#"; //kondisi_rumah_keluarga
			item_data_tb_list_keluarga += irow.cells[17].innerHTML+"#"; //jml_asuh
			item_data_tb_list_keluarga += irow.cells[18].innerHTML+"#"; //pekerjaan_keluarga
			item_data_tb_list_keluarga += irow.cells[19].innerHTML+"#"; //pendidikan_terakhir
			item_data_tb_list_keluarga += irow.cells[20].innerHTML+"#"; //agama_keluarga
			item_data_tb_list_keluarga += irow.cells[21].innerHTML+"#"; //suku_keluarga
			item_data_tb_list_keluarga += irow.cells[22].innerHTML+"#"; //kewarganegaraan_keluarga
			item_data_tb_list_keluarga += irow.cells[23].innerHTML+"#"; //ormas_keluarga
			item_data_tb_list_keluarga += irow.cells[24].innerHTML+"#"; //orpol_keluarga
			item_data_tb_list_keluarga += irow.cells[25].innerHTML+"#"; //kedudukandimasyarakat_keluarga
			item_data_tb_list_keluarga += irow.cells[26].innerHTML+"#"; //tahun_lulus_keluarga
			item_data_tb_list_keluarga += irow.cells[27].innerHTML+"#"; //nostambuk_keluarga
			item_data_tb_list_keluarga += irow.cells[28].innerHTML+"#"; //tempat_lahir_keluarga
			item_data_tb_list_keluarga += irow.cells[29].innerHTML+"#"; //tgl_lahir_keluarga
			item_data_tb_list_keluarga += irow.cells[30].innerHTML+"#"; //hubungan_keluarga
			item_data_tb_list_keluarga += irow.cells[31].innerHTML+"#"; //keterangan_keluarga
			item_data_tb_list_keluarga += irow.cells[32].innerHTML+"#"; //ktp_keluarga

			item_data_tb_list_keluarga += ';';
		}
		$('#hid_table_item_Keluarga').val(item_data_tb_list_keluarga);	
		// var item_data_tb_list_keluarga_input = $('#hid_table_item_Keluarga').val();

		//data Penyakit
		var item_data_tb_list_penyakit = "";

		var oTable 		= document.getElementById('tb_list_penyakit');
		var rowLength 	= oTable.rows.length;
		var isitablepenyakit = $('#hid_jumlah_item_penyakit').val();
			if(isitablepenyakit ==0){
				rowLength 	= rowLength-2;
			}else{
				rowLength 	= rowLength-1;
			}

		for (i = 1; i <= rowLength; i++){

			var irow = oTable.rows.item(i);

			item_data_tb_list_penyakit += irow.cells[1].innerHTML+"#"; //nama_penyakit
			item_data_tb_list_penyakit += irow.cells[2].innerHTML+"#"; //thn_penyakit
			item_data_tb_list_penyakit += irow.cells[3].innerHTML+"#"; //kategori_penyakit
			item_data_tb_list_penyakit += irow.cells[4].innerHTML+"#"; //tipe_penyakit
			item_data_tb_list_penyakit += irow.cells[5].innerHTML+"#"; //lamp_bukti

			item_data_tb_list_penyakit += ';';
		}
		$('#hid_table_item_penyakit').val(item_data_tb_list_penyakit);
		// var item_data_tb_list_penyakit_input = $('#hid_table_item_penyakit').val();
		//data Kecakapan Khusus
		var item_data_tb_list_kckhusus = "";

		var oTable 		= document.getElementById('tb_list_kckhusus');
		var rowLength 	= oTable.rows.length;
		var isitablekecakapankhusus = $('#hid_jumlah_item_KecakapanKhusus').val();
			if(isitablekecakapankhusus ==0){
				rowLength 	= rowLength-2;
			}else{
				rowLength 	= rowLength-1;
			}
			

		for (i = 1; i <= rowLength; i++){

			var irow = oTable.rows.item(i);

			item_data_tb_list_kckhusus += irow.cells[1].innerHTML+"#"; //bid_studi
			item_data_tb_list_kckhusus += irow.cells[2].innerHTML+"#"; //olahraga
			item_data_tb_list_kckhusus += irow.cells[3].innerHTML+"#"; //kesenian
			item_data_tb_list_kckhusus += irow.cells[4].innerHTML+"#"; //keterampilan
			item_data_tb_list_kckhusus += irow.cells[5].innerHTML+"#"; //lain_lain


			item_data_tb_list_kckhusus += ';';
			
		}
		$('#hid_table_item_KecakapanKhusus').val(item_data_tb_list_kckhusus);
		// var item_data_tb_list_kckhusus_input = $('#hid_table_item_KecakapanKhusus').val();
		var iform = $('#add_santri')[0];
		var data = new FormData(iform);
		cattt = $('#kategori_santri').val();
		cekstatus = $('#no_registrasi').val();
		if (cekstatus != '')
			{
				msg="Update Data Berhasil"
			}
			else
			{
				msg="Simpan Data Berhasil"
			}
		$.ajax({

			type:"POST",
			url:base_url+"aitam/simpan_siswa",
			enctype: 'multipart/form-data',
			// dataType:"JSON",
			contentType: false,
    		processData: false,
			data:data,
			success:function(data){

				bootbox.alert({
					message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;"+msg+"!!",
					size: 'small',
					callback: function () {

						window.location = base_url+'aitam';
					}
				});
			}
		});
	}
}

function OtomatisKapital(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

function addSantri(){
	kosong();
	mati();
	mati_kel();
	$('#addto_button_header').hide();
	$('#addto_button_footer').hide();
	$('#save_button_header').show();
	$('#save_button_footer').show();
	$('#save_button_header').text('SIMPAN');
	$('#save_button_footer').text('SIMPAN');
	// $('#button_keluarga').show();
	// $('#button_penyakit').show();
	// $('#button_kecakapankhusus').show();
	// $('#button_photo').show();
	// $('#button_ijazah').show();
	// $("#ijazahholder").show();
	// $("#ijazahholder").hide();
	// $('#button_akelahiran').show();
	// $("#aklahiranholder").show();
	// $("#aklahiranholder").hide();
	// $('#button_kk').show();
	// $("#kkholder").show();
	// $("#kkholder").hide();
	// $('#button_skhun').show();
	// $("#skhunholder").show();
	// $("#skhunholder").hide();
	// $('#button_transkip').show();
	// $("#transkipholder").show();
	// $("#transkipholder").hide();
	// $('#button_skbb').show();
	// $("#skbbholder").show();
	// $("#skbbholder").hide();
	// $('#button_skes').show();
	// $("#skesholder").show();
	// $("#skesholder").hide();

	//males nginput
	// $('#rayon').val('rayon1');
	// $('#kamar').val('kamar2');
	// $('#bagian').val('bagian');
	// $('#kel_sekarang').val('kelas1');
	// $('#nisn').val('112233');
	// $('#nisnlokal').val('445566');
	// $('#nama_lengkap').val('namalengkap nya1');
	// $('#nama_arab').val('namaarab nya1');
	// $('#nama_panggilan').val('namapanggilan 1');
	// $('#hobi').val('hoinya apa');
	// $('#uang_jajan_perbulan').val('500000');
	// $('#no_kk').val('123');
	// $('#nik').val('321');
	// $('#tempat_lahir').val('Tempat_lahir');
	// // $('#tgl_lahir').val('19/07/2017');
	// $('#konsulat').val('konsulat1');
	// $('#nama_sekolah_aitam').val('nmsklAITAM');
	// $('#kelas_aitam').val('klsAITAM1');
	// $('#alamat_sekolah_aitam').val('AlamatSKL');
	// $('#suku').val('suku1');
	// $('#kewarganegaraan').val('Kewarga1');
	// $('#jalan').val('jaln1');
	// $('#no_rumah').val('norUMah1');
	// $('#dusun').val('Dusun1');
	// $('#desa').val('desa1');
	// $('#kecamatan').val('kecamatan1');
	// $('#kabupaten').val('kabupaten1');
	// $('#provinsi').val('provinsi1');
	// $('#kd_pos').val('51280');
	// $('#no_tlp').val('02155677');
	// $('#no_hp').val('08136737202');
	// $('#email').val('email1@yahoo.com');
	// $('#fb').val('fb1');
	// $('#dibesarkan_di').val('dfdfdfdfdfd');
	// $('#pembiaya').val('AYAH');
	// $('#biaya_perbulan_min').val('1000000');
	// $('#biaya_perbulan_max').val('1500000');
	// $('#penghasilan').val('2000000');
	// $('#gol_darah').val('A');
	// $('#tinggi_badan').val('1');
	// $('#berat_badan').val('1');
	// $('#khitan').val('SUDAH');
	// $('#kondisi_pendidikan').val('KETAT');
	// $('#ekonomi_keluarga').val('MAMPU');
	// $('#situasi_rumah').val('PERKOTAAN');
	// $('#dekat_dengan').val('MASJID');
	// $('#hidup_beragama').val('SEDANG');
	// $('#pengelihatan_mata').val('BAIK');
	// $('#kaca_mata').val('TIDAK');
	// $('#pendengaran').val('BAIK');
	// $('#operasi').val('TIDAK');
	// $('#sebab').val('1');
	// $('#kecelakaan').val('TIDAK');
	// $('#akibat').val('1akibat');
	// $('#alergi').val('alergi1');
	// $('#thn_fisik').val('2007');
	// $('#kelainan_fisik').val('kelainan_fisik1');


	// clearFormInput();
	$('#Modal_add_Santri').modal('show');
}

function cek_kt(){ //cek jika kategri onchange
	var kategori		= $('#kategori_santri').val();
		if(kategori=='TMI'){
		filter_tmi();
	}
	else if(kategori=='AITAM_ISLAH' || kategori=='AITAM_JAMIAH')
	{
		filter_aitam();
	}
}

function modalAddkeluarga(){
	kosong_modal_keluarga();
	mati_kel();
	$('#Modal_add_keluarga_santri').modal('show');
}

function cek_jk(){ // cek saat memilih jenis kelamin di modal keluarga
	var kategori_santri		= $('#kategori_santri').val();
	var kategori_keluarga 		= $('#kategori_keluarga').val();

	if(kategori_keluarga =='AYAH'){
		$('#jenis_kelamin_keluarga').val('LAKI-LAKI');
		if ($('#kategori_santri').val() == 'AITAM_ISLAH' || $('#kategori_santri').val() == 'AITAM_JAMIAH')
			{
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
			else if ($('#kategori_santri').val() == 'TMI' )
			{
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
	}else if(kategori_keluarga =='IBU'){
		$('#jenis_kelamin_keluarga').val('PEREMPUAN');
		if ($('#kategori_santri').val() == 'AITAM_ISLAH' || $('#kategori_santri').val() == 'AITAM_JAMIAH')
			{
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
				$('#pendidikan_terakhir').attr('disabled', trufalsee);
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
			else if ($('#kategori_santri').val() == 'TMI' )
			{
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
	}else if(kategori_keluarga =='WALI'){
		$('#jenis_kelamin_keluarga').val('');
		if ($('#kategori_santri').val() == 'AITAM_ISLAH' || $('#kategori_santri').val() == 'AITAM_JAMIAH')
			{
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
			else if ($('#kategori_santri').val() == 'TMI' )
			{
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
	}else if ($('#kategori_keluarga').val() == '')	{
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
	}else
		{
		$('#jenis_kelamin_keluarga').attr('disabled', false);
		$('#jenis_kelamin_keluarga').val('');
		if ($('#kategori_santri').val() == 'AITAM_ISLAH' || $('#kategori_santri').val() == 'AITAM_JAMIAH')
			{
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
			else if ($('#kategori_santri').val() == 'TMI' )
			{
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
	}
}

function TambahKeluarga(){
	if($("#add_keluarga_santri").valid()==true)
	{
		var kategori_keluarga 				= $('#kategori_keluarga').val();
		var nama_keluarga 					= $('#nama_keluarga').val();
		var nik_keluarga 					= $('#nik_keluarga').val();
		var binbinti_keluarga 				= $('#binbinti_keluarga').val();
		var jenis_kelamin_keluarga 			= $('#jenis_kelamin_keluarga').val();
		var status_pernikahan_keluarga 		= $('#status_pernikahan_keluarga').val();
		var tgl_wafat_keluarga 				= $('#tgl_wafat_keluarga').val();
		var umur_keluarga 					= $('#umur_keluarga').val();
		var hari_keluarga 					= $('#hari_keluarga').val();
		var sebab_wafat_keluarga 			= $('#sebab_wafat_keluarga').val();
		var status_perkawinan_ibu_keluarga 	= $('#status_perkawinan_ibu_keluarga').val();
		var pedapatan_ibu_keluarga 			= $('#pedapatan_ibu_keluarga').val();
		var sebab_tidak_bekerja_keluarga 	= $('#sebab_tidak_bekerja_keluarga').val();
		var keahlian_keluarga 				= $('#keahlian_keluarga').val();
		var status_rumah_keluarga 			= $('#status_rumah_keluarga').val();
		var kondisi_rumah_keluarga 			= $('#kondisi_rumah_keluarga').val();
		var jml_asuh 						= $('#jml_asuh').val();
		var pekerjaan_keluarga 				= $('#pekerjaan_keluarga').val();
		var pendidikan_terakhir 			= $('#pendidikan_terakhir').val();
		var agama_keluarga 					= $('#agama_keluarga').val();
		var suku_keluarga 					= $('#suku_keluarga').val();
		var kewarganegaraan_keluarga 		= $('#kewarganegaraan_keluarga').val();
		var ormas_keluarga 					= $('#ormas_keluarga').val();
		var orpol_keluarga 					= $('#orpol_keluarga').val();
		var kedudukandimasyarakat_keluarga 	= $('#kedudukandimasyarakat_keluarga').val();
		var tahun_lulus_keluarga 			= $('#tahun_lulus_keluarga').val();
		var nostambuk_keluarga 				= $('#nostambuk_keluarga').val();
		var tempat_lahir_keluarga 			= $('#tempat_lahir_keluarga').val();
		var tgl_lahir_keluarga 				= $('#tgl_lahir_keluarga').val();
		var hubungan_keluarga 				= $('#hubungan_keluarga').val();
		var keterangan_keluarga 			= $('#keterangan_keluarga').val();
		var ktp_keluarga 					= $('#ktp_keluarga').val();
		var hid_jumlah_item 				= $('#hid_jumlah_item_keluarga').val();
		var itemcountayah 					= $('#hid_cek_ayah').val();
		var itemcountibu 					= $('#hid_cek_ibu').val();
		var itemcountwali 					= $('#hid_cek_wali').val();

		var kdkel 	= kategori_keluarga;
		if(cekItem(kdkel)==true)
		{
			// if(itemcountayah=="1" && kategori_keluarga=='AYAH')
			// {
			// 	bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;Data Ayah  sudah ada di list.");
			// 	return false;
			// }
			// else if(itemcountibu=="1" && kategori_keluarga=='IBU')
			// {
			// 	bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;Data Ibu  sudah ada di list.");
			// 	return false;
			// }
			// else if(itemcountwali=="1" && kategori_keluarga=='WALI')
			// {
			// 	bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;Data WALI  sudah ada di list.");
			// 	return false;
			// }
			// else
			// {
					//upload file ke temp folder
					var iform = $('#add_keluarga_santri')[0];
					var data = new FormData(iform);

					$.ajax({
						url: base_url+'aitam/upload_lamp_keluarga',
						type: 'post',
						enctype: 'multipart/form-data',
						contentType: false,
						processData: false,
						data: data,
						success: function(response){
							
							if(response!=null)
							{
										var resp 		= $.parseJSON(response);
										//add to table list
										var linkfile 	= "<a href='./assets/images/uploadtemp/"+resp.name+"' target='_blank'>"+resp.name+"</a>";	
										var row_count 		= $('#tb_list_keluarga tr.tb-detail').length;
										var content_data 	= '<tr class="tb-detail" id="row'+kdkel+'">';
										content_data 	+= "<td>"+(row_count+1)+"</td>";
										content_data 	+= "<td>"+kategori_keluarga+"</td>";
										content_data 	+= "<td>"+nama_keluarga+"</td>";
										content_data 	+= "<td>"+nik_keluarga+"</td>";
										content_data 	+= "<td>"+binbinti_keluarga+"</td>";
										content_data 	+= "<td>"+jenis_kelamin_keluarga+"</td>";
										content_data 	+= "<td>"+status_pernikahan_keluarga+"</td>";
										content_data 	+= "<td>"+tgl_wafat_keluarga+"</td>";
										content_data 	+= "<td>"+umur_keluarga+"</td>";
										content_data 	+= "<td>"+hari_keluarga+"</td>";
										content_data 	+= "<td>"+sebab_wafat_keluarga+"</td>";
										content_data 	+= "<td>"+status_perkawinan_ibu_keluarga+"</td>";
										content_data 	+= "<td>"+pedapatan_ibu_keluarga+"</td>";
										content_data 	+= "<td>"+sebab_tidak_bekerja_keluarga+"</td>";
										content_data 	+= "<td>"+keahlian_keluarga+"</td>";
										content_data 	+= "<td>"+status_rumah_keluarga+"</td>";
										content_data 	+= "<td>"+kondisi_rumah_keluarga+"</td>";
										content_data 	+= "<td>"+jml_asuh+"</td>";
										content_data 	+= "<td>"+pekerjaan_keluarga+"</td>";
										content_data 	+= "<td>"+pendidikan_terakhir+"</td>";
										content_data 	+= "<td>"+agama_keluarga+"</td>";
										content_data 	+= "<td>"+suku_keluarga+"</td>";
										content_data 	+= "<td>"+kewarganegaraan_keluarga+"</td>";
										content_data 	+= "<td>"+ormas_keluarga+"</td>";
										content_data 	+= "<td>"+orpol_keluarga+"</td>";
										content_data 	+= "<td>"+kedudukandimasyarakat_keluarga+"</td>";
										content_data 	+= "<td>"+tahun_lulus_keluarga+"</td>";
										content_data 	+= "<td>"+nostambuk_keluarga+"</td>";
										content_data 	+= "<td>"+tempat_lahir_keluarga+"</td>";
										content_data 	+= "<td>"+tgl_lahir_keluarga+"</td>";
										content_data 	+= "<td>"+hubungan_keluarga+"</td>";
										content_data 	+= "<td>"+keterangan_keluarga+"</td>";
										content_data 	+= "<td class='hidden'>"+resp.name+"</td>"
										content_data 	+= "<td>"+linkfile+"</td>";;
										content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
										content_data 	+= ' onclick="hapusItem(\''+kdkel+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
										content_data 	+= "</tr>";

										if(row_count<1){

											$('#tb_list_keluarga tbody').html(content_data);
										}
										else{

											$('#tb_list_keluarga tbody').append(content_data);
										}
										if(kategori_keluarga=='AYAH')
										{
											$("#hid_cek_ayah").val(1);
										}
										if(kategori_keluarga=='IBU')
										{
											$("#hid_cek_ibu").val(1);
										}
										if(kategori_keluarga=='WALI')
										{
											$("#hid_cek_wali").val(1);
										}
										$("#hid_jumlah_item_keluarga").val(row_count+1);
										urutkanNomor();

										$('#Modal_add_keluarga_santri').modal('hide');
							}
							else{

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
			// }
		}
		else
		{

			bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;kategori "+kategori_keluarga+" sudah ada di list.");
		}
	}

}

function urutkanNomor(){

	var oTable = document.getElementById('tb_list_keluarga');

	//hitung table row
	var rowLength = oTable.rows.length;
		rowLength = rowLength-1;

	//urutkan nomor per row
	for (i = 1; i <= rowLength; i++){

		oTable.rows.item(i).cells[0].innerHTML = i;
	}
}

function cekItem(i_kdkel){
		var oTable  	= document.getElementById('tb_list_keluarga');
		var rowLength = oTable.rows.length;
		var itemcount = $('#hid_jumlah_item_keluarga').val();
		rowLength = rowLength-1;

		if(itemcount=="0"){ //jika item kosong

			return true;
		}
		else{

			for (i = 1; i <= rowLength; i++)
			{
				var kdkel = oTable.rows.item(i).cells[1].innerHTML;
				if(kdkel !='SAUDARA'){
				
					if(kdkel==i_kdkel){

							return false;
					}
				}
			}
			return true;
		}
}

function hapusItem(row_id){

		bootbox.confirm("Anda yakin akan menghapus item ini ?",
		function(result){
			if(result==true){

				$('#row'+row_id).remove();
				urutkanNomor();

				var row_count = $('#tb_list_keluarga tr.tb-detail').length					;

				$('#hid_jumlah_item_keluarga').val(row_count); //simpan jumlah item


				if(row_count<1){

					var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
					$('#tb_list_keluarga tbody').append(content_data);
				}
			}
		}
	);
}

function modalAddPenyakit(){
	kosong_modal_penyakit();
	$('#Modal_add_penyakit').modal('show');
}

function TambahPenyakit(){
	if($("#add_penyakit").valid()==true)
	{
		var nama_penyakit 				= $('#nama_penyakit').val()
		var thn_penyakit 				= $('#thn_penyakit').val()
		var kategori_penyakit 			= $('#kategori_penyakit').val()
		var tipe_penyakit 				= $('#tipe_penyakit').val()
		var lamp_bukti 					= $('#lamp_bukti').val()
		var hid_jumlah_item 			= $('#hid_jumlah_item_penyakit').val()
		var kdpenyakit 	= makeid();
		if(cekItemPenyakit(nama_penyakit)==true)
		{
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
							

								if(response!=null){
									
									var resp 		= $.parseJSON(response);
									
									//add to table list
									var linkfile 	= "<a href='./assets/images/uploadtemp/"+resp.name+"' target='_blank'>"+resp.name+"</a>";			
									// var strbutton 	= "<a class='btn btn-danger btn-xs btn-flat' href='#' onclick='delAtt(\""+uniq_id+"\")'><i class='fa fa-trash'></i></a>";
									var row_count 		= $('#tb_list_penyakit tr.tb-detail').length;
									var content_data 	= '<tr class="tb-detail" id="row'+kdpenyakit+'">';
										content_data 	+= "<td>"+(row_count+1)+"</td>";
										content_data 	+= "<td>"+nama_penyakit+"</td>";
										content_data 	+= "<td>"+thn_penyakit+"</td>";
										content_data 	+= "<td>"+kategori_penyakit+"</td>";
										content_data 	+= "<td>"+tipe_penyakit+"</td>";
										content_data 	+= "<td class='hidden'>"+resp.name+"</td>";
										content_data 	+= "<td>"+linkfile+"</td>";
										content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
										content_data 	+= ' onclick="hapusItemPenyakit(\''+kdpenyakit+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
										content_data 	+= "</tr>";

									if(row_count<1){

										$('#tb_list_penyakit tbody').html(content_data);
									}
									else{

										$('#tb_list_penyakit tbody').append(content_data);
									}

									$("#hid_jumlah_item_penyakit").val(row_count+1);
									urutkanNomorPenyakit();
									$('#Modal_add_penyakit').modal('hide');
								}
								else{

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
		}
		else{

			bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;"+nama_penyakit+" sudah ada di list.");
		}

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

function modalAddKecakapanKhusus(){
	kosong_modal_kckhusu();
	$('#Modal_add_KecakapanKhusus').modal('show');
}

function TambahKecakapanKhusus(){
	if($("#add_kecakapan_khusus").valid()==true)
	{
		var bid_studi 				= $('#bid_studi').val()
		var olahraga 				= $('#olahraga').val()
		var kesenian 				= $('#kesenian').val()
		var keterampilan 			= $('#keterampilan').val()
		var lain_lain 				= $('#lain_lain').val()
		var hid_jumlah_item 		= $('#hid_jumlah_item_KecakapanKhusus').val()

		var kd_bidstudi 	= makeid();
		if(cekItemkckhusus(bid_studi)==true){

			var row_count 		= $('#tb_list_kckhusus tr.tb-detail').length;
			var content_data 	= '<tr class="tb-detail" id="row'+kd_bidstudi+'">';
				content_data 	+= "<td>"+(row_count+1)+"</td>";
				content_data 	+= "<td>"+bid_studi+"</td>";
				content_data 	+= "<td>"+olahraga+"</td>";
				content_data 	+= "<td>"+kesenian+"</td>";
				content_data 	+= "<td>"+keterampilan+"</td>";
				content_data 	+= "<td>"+lain_lain+"</td>";
				content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
				content_data 	+= ' onclick="hapusItemkckhusus(\''+kd_bidstudi+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
				content_data 	+= "</tr>";

			if(row_count<1){

				$('#tb_list_kckhusus tbody').html(content_data);
			}
			else{

				$('#tb_list_kckhusus tbody').append(content_data);
			}

			$("#hid_jumlah_item_KecakapanKhusus").val(row_count+1);
			urutkanNomorkckhusus();

			$('#Modal_add_KecakapanKhusus').modal('hide');
		}
		else{

			bootbox.alert("<span class='glyphicon glyphicon-exclamation-sign'></span>&nbsp;"+bid_studi+" sudah ada di list.");
		}
	}
}

function urutkanNomorkckhusus(){

	var oTable = document.getElementById('tb_list_kckhusus');

	//hitung table row
	var rowLength = oTable.rows.length;
		rowLength = rowLength-1;

	//urutkan nomor per row
	for (i = 1; i <= rowLength; i++){

		oTable.rows.item(i).cells[0].innerHTML = i;
	}
}

function cekItemkckhusus(i_bid_studi){
		var oTable  	= document.getElementById('tb_list_kckhusus');
		var rowLength = oTable.rows.length;
		var itemcount = $('#hid_jumlah_item_KecakapanKhusus').val();
		rowLength = rowLength-1;

		if(itemcount=="0"){ //jika item kosong

			return true;
		}
		else{

			for (i = 1; i <= rowLength; i++)
			{
				var bid_studi = oTable.rows.item(i).cells[1].innerHTML;
				// print(kode_kategori);
				if(bid_studi==i_bid_studi){

						return false;
				}
			}
			return true;
		}
}

function hapusItemkckhusus(row_id){

		bootbox.confirm("Anda yakin akan menghapus item ini ?",
		function(result){
			if(result==true){

				$('#row'+row_id).remove();
				urutkanNomorkckhusus();

				var row_count = $('#tb_list_kckhusus tr.tb-detail').length					;

				$('#hid_jumlah_item_KecakapanKhusus').val(row_count); //simpan jumlah item


				if(row_count<1){

					var content_data = "<tr><td colspan=\"30\" align=\"center\">Belum Ada Data.</td></tr>";
					$('#tb_list_kckhusus tbody').append(content_data);
				}
			}
		}
	);
}

function ONprosses(){

	bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span>SEDANG DALAM PENGERJAAN! </div>",
		function(result){
			if(result==true){

			}
		}
	);
}

function view(no_registrasi){
	kosong();
	$('#image-holder').html('');
	$.ajax({

		type:"POST",
		url:base_url+"aitam/get_data_santri/"+no_registrasi,
		dataType:"html",
		success:function(data){
			
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
			$('#pendengaran').val(data['operasi']);
			$('#operasi').val(data['pendengaran']);
			$('#sebab').val(data['sebab']);
			$('#kecelakaan').val(data['kecelakaan']);
			$('#akibat').val(data['akibat']);
			$('#alergi').val(data['alergi']);
			$('#thn_fisik').val(data['thn_fisik']);
			$('#kelainan_fisik').val(data['kelainan_fisik']);
			$('#Modal_add_Santri').modal('show');
			$('#save_button_header').hide();
			$('#save_button_footer').hide();
			$('#addto_button_header').hide();
			$('#addto_button_footer').hide();
			$('#button_keluarga').hide();
			$('#button_penyakit').hide();
			$('#button_kecakapankhusus').hide();
			$('#button_photo').hide();
			mati();
			mati_kel();
			// $('#rayon').attr('disabled', false);
			// $('#kamar').attr('disabled', false);
			// $('#bagian').attr('disabled', false);
			// $('#no_registrasi').attr('disabled', false);
			//show photo
			if(data['lamp_photo']!=null){

				var image_holder = $("#image-holder");

				$("<img />", {
				    "src": base_url+"./assets/images/fileupload/santri/"+data['lamp_photo'],
				    "class"	: "thumb-image",
				    "name"	: "img_photo"
				}).appendTo(image_holder);
			}
			//show ijazah
				$('#button_ijazah').hide();
				$("#ijazahholder").hide();
			if(data['lamp_ijazah']!=null){
				var image_holder = $("#ijazahholder");
				// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

				var href = $('.cijazah a').attr('href');
				// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
				var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/ijazah/'+data['lamp_ijazah']);
				// Add that new href again to the anchor.
				$('.cijazah a').attr('href', href);
				image_holder.show();
				
			}
			//show Akta Kelahiran 
				$('#button_akelahiran').hide();
				$("#aklahiranholder").hide();
			if(data['lamp_akta_kelahiran']!=null){
				var image_holder = $("#aklahiranholder");
				// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

				var href = $('.cakelahiran a').attr('href');
				// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
				var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/akte_kelahiran/'+data['lamp_akta_kelahiran']);
				// Add that new href again to the anchor.
				$('.cakelahiran a').attr('href', href);
				image_holder.show();
			}
			//show kk 
				$('#button_kk').hide();
				$("#kkholder").hide();
			if(data['lamp_kk']!=null){
				var image_holder = $("#kkholder");
				// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

				var href = $('.ckk a').attr('href');
				// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
				var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/kartukeluarga/'+data['lamp_kk']);
				// Add that new href again to the anchor.
				$('.ckk a').attr('href', href);
				image_holder.show();
				
			}
			//show skhun 
				$('#button_skhun').hide();
				$("#skhunholder").hide();
			if(data['lamp_skhun']!=null){
				var image_holder = $("#skhunholder");
				// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

				var href = $('.cskhun a').attr('href');
				// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
				var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/skhun/'+data['lamp_skhun']);
				// Add that new href again to the anchor.
				$('.cskhun a').attr('href', href);
				image_holder.show();
				
			}
			//show ranskip 
				$('#button_transkip').hide();
				$("#transkipholder").hide();
			if(data['lamp_transkip_nilai']!=null){
				var image_holder = $("#transkipholder");
				// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

				var href = $('.ctranskip a').attr('href');
				// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
				var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/transkip_nilai/'+data['lamp_transkip_nilai']);
				// Add that new href again to the anchor.
				$('.ctranskip a').attr('href', href);
				image_holder.show();
				
			}
			//show skbb 
				$('#button_skbb').hide();
				$("#skbbholder").hide();
			if(data['lamp_skkb']!=null){
				var image_holder = $("#skbbholder");
				// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

				var href = $('.cskbb a').attr('href');
				// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
				var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/skb/'+data['lamp_skkb']);
				// Add that new href again to the anchor.
				$('.cskbb a').attr('href', href);
				image_holder.show();
				
			}
			//show skes 
				$('#button_skes').hide();
				$("#skesholder").hide();
			if(data['lamp_surat_kesehatan']!=null){
				var image_holder = $("#skesholder");
				// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

				var href = $('.cskes a').attr('href');
				// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
				var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/surat_kesehatan/'+data['lamp_surat_kesehatan']);
				// Add that new href again to the anchor.
				$('.cskes a').attr('href', href);
				image_holder.show();
				
			}
		}
	});
	//show Keluarga
	$('#tb_list_keluarga tbody').html('');
	$.ajax({

		type:"POST",
		url:base_url+"aitam/get_data_keluarga/"+no_registrasi,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {
					$.each(data, function (index, value) {
					// var linkfile 	= "<a href='./assets/images/fileupload/ktp/"+value['ktp']+"' target='_blank'>"+value['ktp']+"</a>";
					var linkfile 	= "<a href='./assets/images/uploadtemp/"+value['ktp']+"' target='_blank'>"+value['ktp']+"</a>";
					var row_count 		= $('#tb_list_keluarga tr.tb-detail').length;
					var content_data 	= '<tr class="tb-detail" id="row'+value['kategori']+'">';
						content_data 	+= "<td>"+(row_count+1)+"</td>";
						content_data 	+= "<td>"+value['kategori']+"</td>";
						content_data 	+= "<td>"+value['nama']+"</td>";
						content_data 	+= "<td>"+value['nik']+"</td>";
						content_data 	+= "<td>"+value['binbinti']+"</td>";
						content_data 	+= "<td>"+value['jenis_kelamin']+"</td>";
						content_data 	+= "<td>"+value['status']+"</td>";
						content_data 	+= "<td>"+value['tgl_wafat']+"</td>";
						content_data 	+= "<td>"+value['umur']+"</td>";
						content_data 	+= "<td>"+value['hari']+"</td>";
						content_data 	+= "<td>"+value['sebab_wafat']+"</td>";
						content_data 	+= "<td>"+value['status_perkawinan']+"</td>";
						content_data 	+= "<td>"+value['pendapatan_ibu']+"</td>";
						content_data 	+= "<td>"+value['sebab_tdk_bekerja']+"</td>";
						content_data 	+= "<td>"+value['keahlian']+"</td>";
						content_data 	+= "<td>"+value['status_rumah']+"</td>";
						content_data 	+= "<td>"+value['kondisi_rumah']+"</td>";
						content_data 	+= "<td>"+value['jml_asuh']+"</td>";
						content_data 	+= "<td>"+value['pekerjaan']+"</td>";
						content_data 	+= "<td>"+value['pend_terakhir']+"</td>";
						content_data 	+= "<td>"+value['agama']+"</td>";
						content_data 	+= "<td>"+value['suku']+"</td>";
						content_data 	+= "<td>"+value['kewarganegaraan']+"</td>";
						content_data 	+= "<td>"+value['ormas']+"</td>";
						content_data 	+= "<td>"+value['orpol']+"</td>";
						content_data 	+= "<td>"+value['kedukmas']+"</td>";
						content_data 	+= "<td>"+value['thn_lulus']+"</td>";
						content_data 	+= "<td>"+value['no_stambuk_alumni']+"</td>";
						content_data 	+= "<td>"+value['tempat_lahir']+"</td>";
						content_data 	+= "<td>"+value['tgl_lahir_keluarga']+"</td>";
						content_data 	+= "<td>"+value['hub_kel']+"</td>";
						content_data 	+= "<td>"+value['keterangan']+"</td>";
						content_data 	+= "<td class='hidden'>"+value['ktp']+"</td>";
						content_data 	+= "<td>"+linkfile+"</td>";
						// content_data 	+= "<td>"+value['rel_en']+"</td>";		
						// content_data 	+= "<td>"+strbutton+hid_code+"</td>";
						content_data 	+= "</tr>";

					if(row_count<1){

						$('#tb_list_keluarga tbody').html(content_data);
					}
					else{

						$('#tb_list_keluarga tbody').append(content_data);
					}
				});
			// }
		}
	});
	//show Penyakit
	$('#tb_list_penyakit tbody').html('');
	$.ajax({

		type:"POST",
		url:base_url+"aitam/get_data_penyakit/"+no_registrasi,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {
				$.each(data, function (index, value) {

					var row_count 	= $('#tb_list_penyakit tr.tb-detail').length;
					// var linkfile 	= "<a href='./assets/images/fileupload/lamp_penyakit/"+value['lamp_bukti']+"' target='_blank'>"+value['lamp_bukti']+"</a>";
					var linkfile 	= "<a href='./assets/images/uploadtemp/"+value['lamp_bukti']+"' target='_blank'>"+value['lamp_bukti']+"</a>";
					
					// var strbutton 	=  "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editDetail(\""+value['bid_studi']+"\")'><i class='fa fa-pencil'></i></a>&nbsp;";
					// strbutton 	+= "<a class='btn btn-danger btn-xs btn-flat' href='#' onclick='delDetailkecakapan(\""+value['bid_studi']+"\")'><i class='fa fa-trash'></i></a>";

					// var hid_code 	= "<input type='text' id='hid"+value['bid_studi']+"' value='"+value['bid_studi']+"' />";

					var row_count 		= $('#tb_list_penyakit tr.tb-detail').length;
					var content_data 	= '<tr class="tb-detail" id="row'+value['nama_penyakit']+'">';
						content_data 	+= "<td>"+(row_count+1)+"</td>";
						content_data 	+= "<td>"+value['nama_penyakit']+"</td>";
						content_data 	+= "<td>"+value['thn_penyakit']+"</td>";
						content_data 	+= "<td>"+value['kategori_penyakit']+"</td>";
						content_data 	+= "<td>"+value['tipe_penyakit']+"</td>";
						content_data 	+= "<td class='hidden'>"+value['lamp_bukti']+"</td>";
						content_data 	+= "<td>"+linkfile+"</td>";
						// content_data 	+= "<td>"+value['rel_en']+"</td>";		
						// content_data 	+= "<td>"+strbutton+hid_code+"</td>";
						content_data 	+= "</tr>";

					if(row_count<1){

						$('#tb_list_penyakit tbody').html(content_data);
					}
					else{

						$('#tb_list_penyakit tbody').append(content_data);
					}
				});
			// }
		}
	});
	//show kecakapan khusus
	$('#tb_list_kckhusus tbody').html('');
	$.ajax({

		type:"POST",
		url:base_url+"aitam/get_data_kecakapankhusus/"+no_registrasi,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != null)
			// {

				$.each(data, function (index, value) {

					var row_count 	= $('#tb_list_kckhusus tr.tb-detail').length;
					
					// var strbutton 	=  "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editDetail(\""+value['bid_studi']+"\")'><i class='fa fa-pencil'></i></a>&nbsp;";
					// strbutton 	+= "<a class='btn btn-danger btn-xs btn-flat' href='#' onclick='delDetailkecakapan(\""+value['bid_studi']+"\")'><i class='fa fa-trash'></i></a>";

					// var hid_code 	= "<input type='text' id='hid"+value['bid_studi']+"' value='"+value['bid_studi']+"' />";

					var content_data 	= '<tr class="tb-detail" id="row'+value['bid_studi']+'">';
						content_data 	+= "<td>"+(row_count+1)+"</td>";
						content_data 	+= "<td>"+value['bid_studi']+"</td>";
						content_data 	+= "<td>"+value['olahraga']+"</td>";
						content_data 	+= "<td>"+value['kesenian']+"</td>";
						content_data 	+= "<td>"+value['keterampilan']+"</td>";
						content_data 	+= "<td>"+value['lain_lain']+"</td>";
						// content_data 	+= "<td>"+value['rel_en']+"</td>";		
						// content_data 	+= "<td>"+strbutton+hid_code+"</td>";
						content_data 	+= "</tr>";

					if(row_count<1){

					$('#tb_list_kckhusus tbody').html(content_data);
				}
				else{

					$('#tb_list_kckhusus tbody').append(content_data);
				}
				});
			// }
		}
	});
}

function edit(no_registrasi){
	kosong();
	$('#image-holder').html('');
	$('#addto_button_header').hide();
	$('#addto_button_footer').hide();
	$('#save_button_header').show();
	$('#save_button_footer').show();
	$('#save_button_footer').text('PERBAHARUI');
	$('#save_button_header').text('PERBAHARUI');
	$.ajax({

		type:"POST",
		url:base_url+"aitam/get_data_santri/"+no_registrasi,
		dataType:"html",
		success:function(data){
			
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
			$('#Modal_add_Santri').modal('show');
			// $('#save_button_header').hide();
			// $('#save_button_footer').hide();
			// $('#button_keluarga').hide();
			// $('#button_penyakit').hide();
			// $('#button_kecakapankhusus').hide();
			// $('#button_photo').hide();
			//show photo
			if(data['lamp_photo']!=null){
				$("#TfileUpload").val('');

				var image_holder = $("#image-holder");

				$("<img />", {
				    "src": base_url+"./assets/images/fileupload/santri/"+data['lamp_photo'],
				    "class"	: "thumb-image",
				    "name"	: "img_photo"
				}).appendTo(image_holder);
				$("#TfileUpload").val(data['lamp_photo']);
			}
			//show ijazah
				$('#button_ijazah').hide();
				$("#ijazahholder").hide();
				$("#TfileUpload_ijazah").val('');
				if(data['lamp_ijazah']!=null){
					var image_holder = $("#ijazahholder");
					// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

					var href = $('.cijazah a').attr('href');
					// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
					var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/ijazah/'+data['lamp_ijazah']);
					// Add that new href again to the anchor.
					$('.cijazah a').attr('href', href);
					image_holder.show();
				$("#TfileUpload_ijazah").val(data['lamp_ijazah']);
					
					
				}
			//show Akta Kelahiran 
				$('#button_akelahiran').hide();
				$("#aklahiranholder").hide();
				$("#TfileUpload_akelahiran").val('');
				if(data['lamp_akta_kelahiran']!=null){
					var image_holder = $("#aklahiranholder");
					// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

					var href = $('.cakelahiran a').attr('href');
					// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
					var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/akte_kelahiran/'+data['lamp_akta_kelahiran']);
					// Add that new href again to the anchor.
					$('.cakelahiran a').attr('href', href);
					image_holder.show();
					$("#TfileUpload_akelahiran").val(data['lamp_akta_kelahiran']);
					
				}
			//show kk 
				$('#button_kk').hide();
				$("#kkholder").hide();
				$("#TfileUpload_kk").val('');
				if(data['lamp_kk']!=null){
					var image_holder = $("#kkholder");
					// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

					var href = $('.ckk a').attr('href');
					// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
					var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/kartukeluarga/'+data['lamp_kk']);
					// Add that new href again to the anchor.
					$('.ckk a').attr('href', href);
					image_holder.show();
					$("#TfileUpload_kk").val(data['lamp_kk']);
					
				}
			//show skhun 
				$('#button_skhun').hide();
				$("#skhunholder").hide();
				$("#TfileUpload_skhun").val('');
				if(data['lamp_skhun']!=null){
					var image_holder = $("#skhunholder");
					// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

					var href = $('.cskhun a').attr('href');
					// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
					var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/skhun/'+data['lamp_skhun']);
					// Add that new href again to the anchor.
					$('.cskhun a').attr('href', href);
					image_holder.show();
					$("#TfileUpload_skhun").val(data['lamp_skhun']);
					
				}
			//show ranskip 
				$('#button_transkip').hide();
				$("#transkipholder").hide();
				$("#TfileUpload_transkip").val('');
				if(data['lamp_transkip_nilai']!=null){
					var image_holder = $("#transkipholder");
					// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

					var href = $('.ctranskip a').attr('href');
					// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
					var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/transkip_nilai/'+data['lamp_transkip_nilai']);
					// Add that new href again to the anchor.
					$('.ctranskip a').attr('href', href);
					image_holder.show();
					 $("#TfileUpload_transkip").val(data['lamp_transkip_nilai']);
					
				}
			//show skbb 
				$('#button_skbb').hide();
				$("#skbbholder").hide();
				 $("#TfileUpload_skbb").val('');
				if(data['lamp_skkb']!=null){
					var image_holder = $("#skbbholder");
					// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

					var href = $('.cskbb a').attr('href');
					// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
					var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/skb/'+data['lamp_skkb']);
					// Add that new href again to the anchor.
					$('.cskbb a').attr('href', href);
					image_holder.show();
					$("#TfileUpload_skbb").val(data['lamp_skkb']);
					
				}
			//show skes 
				$('#button_skes').hide();
				$("#skesholder").hide();
				$("#TfileUpload_skes").val('');
				if(data['lamp_surat_kesehatan']!=null){
					
					var image_holder = $("#skesholder");
					// var link = "./assets/images/uploadtemp/"+data['lamp_ijazah']+";

					var href = $('.cskes a').attr('href');
					// Replace the CURRENT_URL_GOES_HERE to CodeProject Url.
					var href = href.replace('LINKTARGET', base_url+'assets/images/fileupload/surat_kesehatan/'+data['lamp_surat_kesehatan']);
					// Add that new href again to the anchor.
					$('.cskes a').attr('href', href);
					image_holder.show();
					$("#TfileUpload_skes").val(data['lamp_surat_kesehatan']);
					
				}
			mati();
			mati_kel();
			cek_kt();
		}
	});
	//show Keluarga
	$('#tb_list_keluarga tbody').html('');
	$.ajax({

		type:"POST",
		url:base_url+"aitam/get_data_keluarga/"+no_registrasi,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != '')
			// {
					$.each(data, function (index, value) {
					var linkfile 	= "<a href='./assets/images/fileupload/ktp/"+value['ktp']+"' target='_blank'>"+value['ktp']+"</a>";
					var row_count 		= $('#tb_list_keluarga tr.tb-detail').length;
					var content_data 	= '<tr class="tb-detail" id="row'+value['kategori']+'">';
						content_data 	+= "<td>"+(row_count+1)+"</td>";
						content_data 	+= "<td>"+value['kategori']+"</td>";
						content_data 	+= "<td>"+value['nama']+"</td>";
						content_data 	+= "<td>"+value['nik']+"</td>";
						content_data 	+= "<td>"+value['binbinti']+"</td>";
						content_data 	+= "<td>"+value['jenis_kelamin']+"</td>";
						content_data 	+= "<td>"+value['status']+"</td>";
						content_data 	+= "<td>"+value['tgl_wafat']+"</td>";
						content_data 	+= "<td>"+value['umur']+"</td>";
						content_data 	+= "<td>"+value['hari']+"</td>";
						content_data 	+= "<td>"+value['sebab_wafat']+"</td>";
						content_data 	+= "<td>"+value['status_perkawinan']+"</td>";
						content_data 	+= "<td>"+value['pendapatan_ibu']+"</td>";
						content_data 	+= "<td>"+value['sebab_tdk_bekerja']+"</td>";
						content_data 	+= "<td>"+value['keahlian']+"</td>";
						content_data 	+= "<td>"+value['status_rumah']+"</td>";
						content_data 	+= "<td>"+value['kondisi_rumah']+"</td>";
						content_data 	+= "<td>"+value['jml_asuh']+"</td>";
						content_data 	+= "<td>"+value['pekerjaan']+"</td>";
						content_data 	+= "<td>"+value['pend_terakhir']+"</td>";
						content_data 	+= "<td>"+value['agama']+"</td>";
						content_data 	+= "<td>"+value['suku']+"</td>";
						content_data 	+= "<td>"+value['kewarganegaraan']+"</td>";
						content_data 	+= "<td>"+value['ormas']+"</td>";
						content_data 	+= "<td>"+value['orpol']+"</td>";
						content_data 	+= "<td>"+value['kedukmas']+"</td>";
						content_data 	+= "<td>"+value['thn_lulus']+"</td>";
						content_data 	+= "<td>"+value['no_stambuk_alumni']+"</td>";
						content_data 	+= "<td>"+value['tempat_lahir']+"</td>";
						content_data 	+= "<td>"+value['tgl_lahir_keluarga']+"</td>";
						content_data 	+= "<td>"+value['hub_kel']+"</td>";
						content_data 	+= "<td>"+value['keterangan']+"</td>";
						content_data 	+= "<td class='hidden'>"+value['ktp']+"</td>";
						content_data 	+= "<td>"+linkfile+"</td>";
						content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
						content_data 	+= ' onclick="hapusItem(\''+value['kategori']+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
						content_data 	+= "</tr>";

					if(row_count<1){

											$('#tb_list_keluarga tbody').html(content_data);
										}
										else{

											$('#tb_list_keluarga tbody').append(content_data);
										}
										if(value['kategori']=='AYAH')
										{
											$("#hid_cek_ayah").val(1);
										}
										if(value['kategori']=='IBU')
										{
											$("#hid_cek_ibu").val(1);
										}
										if(kategori_keluarga=='WALI')
										{
											$("#hid_cek_wali").val(1);
										}
										$("#hid_jumlah_item_keluarga").val(row_count+1);
										urutkanNomor();
				});
			// }
		}
	});
	//show Penyakit
	$('#tb_list_penyakit tbody').html('');
	$.ajax({

		type:"POST",
		url:base_url+"aitam/get_data_penyakit/"+no_registrasi,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);
			// if (data['no_registrasi'] != '')
			// {
				$.each(data, function (index, value) {
					var kdpenyakit = makeid();
					var row_count 	= $('#tb_list_penyakit tr.tb-detail').length;
					var linkfile 	= "<a href='./assets/images/fileupload/lamp_penyakit/"+value['lamp_bukti']+"' target='_blank'>"+value['lamp_bukti']+"</a>";
					var row_count 		= $('#tb_list_penyakit tr.tb-detail').length;
					var content_data 	= '<tr class="tb-detail" id="row'+kdpenyakit+'">';
						content_data 	+= "<td>"+(row_count+1)+"</td>";
						content_data 	+= "<td>"+value['nama_penyakit']+"</td>";
						content_data 	+= "<td>"+value['thn_penyakit']+"</td>";
						content_data 	+= "<td>"+value['kategori_penyakit']+"</td>";
						content_data 	+= "<td>"+value['tipe_penyakit']+"</td>";
						content_data 	+= "<td class='hidden'>"+value['lamp_bukti']+"</td>";
						content_data 	+= "<td>"+linkfile+"</td>";
						content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
						content_data 	+= ' onclick="hapusItemPenyakit(\''+kdpenyakit+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
						content_data 	+= "</tr>";

					if(row_count<1){

										$('#tb_list_penyakit tbody').html(content_data);
									}
									else{

										$('#tb_list_penyakit tbody').append(content_data);
									}

									$("#hid_jumlah_item_penyakit").val(row_count+1);
									urutkanNomorPenyakit();
				});
			// }
		}
	});
	//show kecakapan khusus
	$('#tb_list_kckhusus tbody').html('');
	$.ajax({

		type:"POST",
		url:base_url+"aitam/get_data_kecakapankhusus/"+no_registrasi,
		dataType:"html",
		success:function(data){

			var data = $.parseJSON(data);

				$.each(data, function (index, value) {
					var kd_bidstudi =makeid();
					var row_count 	= $('#tb_list_kckhusus tr.tb-detail').length;
					
					var content_data 	= '<tr class="tb-detail" id="row'+kd_bidstudi+'">';
						content_data 	+= "<td>"+(row_count+1)+"</td>";
						content_data 	+= "<td>"+value['bid_studi']+"</td>";
						content_data 	+= "<td>"+value['olahraga']+"</td>";
						content_data 	+= "<td>"+value['kesenian']+"</td>";
						content_data 	+= "<td>"+value['keterampilan']+"</td>";
						content_data 	+= "<td>"+value['lain_lain']+"</td>";
						content_data 	+= '<td><button type="button" class="btn btn-danger btn-xs" ';
						content_data 	+= ' onclick="hapusItemkckhusus(\''+kd_bidstudi+'\')"><i class="fa fa-fw fa-trash"></i>Hapus</button></td>';
						content_data 	+= "</tr>";

					if(row_count<1){

				$('#tb_list_kckhusus tbody').html(content_data);
			}
			else{

				$('#tb_list_kckhusus tbody').append(content_data);
			}

			$("#hid_jumlah_item_KecakapanKhusus").val(row_count+1);
			urutkanNomorkckhusus();
				});
		}
	});
	

}

function AddTOSantri(){
	if($("#add_santri").valid()==true){
		
		var iform = $('#add_santri')[0];
		var data = new FormData(iform);
		
		$.ajax({

			type:"POST",
			url:base_url+"aitam/addtosantri/",
			enctype: 'multipart/form-data',
			// dataType:"JSON",
			contentType: false,
    		processData: false,
			data:data,
			success:function(data){

				bootbox.alert({
					message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Berhasil",
					size: 'small',
					callback: function () {

						window.location = base_url+'siswa';
					}
				});
			}
		});
	}

}

function hapus(no_registrasi){

	bootbox.confirm("Anda yakin akan menghapus "+no_registrasi+" ini ?",
		function(result){
			if(result==true){
				
			$.ajax({
			type:"POST",
			url:base_url+"aitam/DelSantri/"+no_registrasi,
			dataType:"html",
			success:function(data){
					bootbox.alert({
						message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Hapus Berhasil Berhasil",
						size: 'small',
						callback: function () {

							window.location = base_url+'aitam';
						}
					});
				}
			});
			}
		}
	);
	
}

function clearformcari(){
	$('#s_noregistrasi').val('');
	$('#s_namalengkap').val('');
}

function downloadExcel(){

	var param 	= $('#hid_param').val();
	param 		= ioEncode(param);

	window.location = base_url+'aitam/exportexcel/'+param;
}