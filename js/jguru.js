$(document).ready(function(){

//	modalNew();
	setTable();
	handleValidation();
    validationFormAnak();
    validationFormPformal();
    validationFormpnonformal();
    validationFormSKAngkat();

	$('.datepicker').datepicker({
	
		autoclose: true,
		format: 'dd-mm-yyyy'
	});
	
	$(".select2-multiple").select2();
	
	$('.numbers-only').keypress(function(event) {
		var charCode = (event.which) ? event.which : event.keyCode;
			if ((charCode >= 48 && charCode <= 57)
				|| charCode == 46
				|| charCode == 44
				|| charCode == 8)
				return true;
		return false;
	});

	$('.nav-tabs').tabdrop();

	$("#form_editing").validate();

	$('input:file').change(function(e){

		var files 		= e.originalEvent.target.files;
		var id 			= e.currentTarget.id;

		if(id=="file_foto"){

			var sizemax 	= 1048576;

		    for (var i=0, len=files.length; i<len; i++){

		        var n = files[i].name,
		            s = files[i].size,
		            t = files[i].type;

		        if ((s > sizemax) || (t!='image/jpeg')){
		            
		            var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
					var str_message = "File tidak boleh lebih dari 1 MB.<br />";
						str_message += "Extensi yang diijinkan JPEG, JPG.";

					bootbox.alert({
						closeButton: false,
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

		            $('input#'+id).val('');
		        }
		    }
		}
		else{

			var sizemax 	= 5242880;

		    for (var i=0, len=files.length; i<len; i++){

		        var n = files[i].name,
		            s = files[i].size,
		            t = files[i].type;

		        if ((s > sizemax) || (t!='application/pdf' && t!='image/jpeg')){
		            
		            var title 		= "<span class='fa fa-exclamation-triangle text-warning'></span>&nbsp;Invalid Data";
					var str_message = "File tidak boleh lebih dari 5 MB.<br />";
						str_message += "Extensi yang diijinkan adalah PDF, JPEG, JPG.";

					bootbox.alert({
						closeButton: false,
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

		            $('input#'+id).val('');
		        }
		    }
		}
	});
});

function setTable(){

	$('#tb_list').DataTable( {
        processing: true,
		serverSide: true,
		ajax: {
			'url':base_url+"guru/load_grid",
			'type':'GET',
			'data': function (d) {
                d.param = $('#hid_param').val();
            }
		},
		columnDefs: [
			{
				"targets": [6],
				"orderable": false				
			}      
		]
    });
}

function redrawNumber(id_table){

	var itable 		= document.getElementById(id_table);
	var row_count 	= $('#'+id_table+' tr.tdetail').length;

	if(row_count>0){

		var no = 1;

		for(i=1;i<=row_count;i++){

			var irow 	= itable.rows.item(i);

			irow.cells[0].innerHTML = no;

			no++;
		}
	}
	else{

		var column = $('#'+id_table+' th').length;

		str_row = '<tr><td colspan="'+column+'" align="center">Tidak ada data ditemukan.</td></tr>';

		$('#'+id_table+' tbody').append(str_row);
	}
}

// MASTER FORM EDITING
function modalNew(){

	$('#modal_editing').modal('show');
}

function validateForm(){

	var valid = $("#form_editing").valid();

    if(valid==true){

    	$('.alert-danger').hide();
    	saveFormGuru();
    }
}

function saveFormGuru(){

	var iform 	= $('#form_editing')[0];
	var data 	= new FormData(iform);

	$.ajax({
		url: base_url+'Guru/save_data',
		type: 'post',
		enctype: 'multipart/form-data',
		contentType: false,
    	processData: false,
    	data: data,
		success: function(){

			// $('#img-load').hide();
			// $('#btn_simpan').show();

			// var table = $('#tb_list').DataTable();
			// table.ajax.reload( null, false );
			// table.draw();
			// $('#modal_edit').modal('toggle');
			// clearFormInput();
		},
		error: function(){

			// $('#img-load').hide();
			// $('#btn_simpan').show();
		}
	});
}

var handleValidation = function() {

        var form2 = $('#form_editing');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                txt_nama_lengkap: {                    
                    required: true
                },
                txt_no_ktp: {
                    required: true,                    
                },                
            },

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
                $(element).closest('.input-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
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
//END MASTER FORM EDITING


function modalAddEduFormal(){


}

function modalAddEduNonFormal(){


}

//FORM DATA ANAK
function modalAddAnak(){

    clearFormDataAnak();

    $('#modal_data_anak').modal('show');

    $('#modal_data_anak').on('shown.bs.modal', function() {

        $("#txt_da_nama").focus();
    })
}

var validationFormAnak = function() {

        var form = $('#form_data_anak');
        var error2 = $('.alert-danger', form);
        var success2 = $('.alert-success', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                txt_da_nama: {                    
                    required: true
                },
                txt_da_pendidikan: {
                    required: true
                },
                dtp_da_birth: {
                    required: true
                },
            },

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

function simpanDataAnak(){

    var valid = $('#form_data_anak').valid();

    if(valid==true){

    	var json_anak 	= $('#hid_anak').val();
    		json_anak 	= JSON.parse(json_anak);

        var str_id          = makeid();
        var detail_count    = $('#tb_data_anak tr.tdetail').length;
        var id_detail_anak  = $('#id_detail_anak').val();
        var nama_anak       = $('#txt_da_nama').val();
        var pendidikan      = $('#txt_da_pendidikan').val();
        var tgl_lahir		= $('#dtp_da_birth').val();
        var str_data 		= str_id+'#'+nama_anak+'#'+pendidikan+'#'+tgl_lahir;

        if(id_detail_anak!=''){

            var row = document.getElementById('row'+id_detail_anak);

            row.cells[1].innerHTML = nama_anak;
            row.cells[2].innerHTML = pendidikan;            
            row.cells[3].innerHTML = tgl_lahir;

            var json_item  = {

        		"nama_anak"	:nama_anak,
        		"pendidikan":pendidikan,
        		"tgl_lahir"	:tgl_lahir
        	};

        	json_anak = replace_json_item_data(json_anak,"id",id_detail_anak,json_item);
        }
        else{

        	var json_item  = {

        		"id"		:str_id,
        		"nama_anak"	:nama_anak,
        		"pendidikan":pendidikan,
        		"tgl_lahir"	:tgl_lahir
        	};

        	json_anak.push(json_item);

            var strbutton   =  "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editDetailAnak(\""+str_data+"\")'><i class='fa fa-pencil'></i></a>&nbsp;";
            strbutton       += "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='delDetailAnak(\""+str_id+"\")'><i class='fa fa-trash'></i></a>";

            var content_data    = '<tr class="tdetail" id="row'+str_id+'">';
                content_data    += "<td>"+(detail_count+1)+"</td>";
                content_data    += "<td>"+nama_anak+"</td>";
                content_data    += "<td>"+pendidikan+"</td>";
                content_data    += "<td>"+tgl_lahir+"</td>";                
                content_data    += "<td>"+strbutton+"</td>";
                content_data    += "</tr>";

            if(detail_count<1){

                $('#tb_data_anak tbody').html(content_data);
            }
            else{

                $('#tb_data_anak tbody').append(content_data);
            }
        }

        $('#modal_data_anak').modal('toggle');

        $('#hid_anak').val(JSON.stringify(json_anak));
        $('#txt_jml_anak').val(json_anak.length);
    }
}

function editDetailAnak(str_data){

	var idata 	= str_data.split('#');
	
	$("#id_detail_anak").val(idata[0]);
	$("#txt_da_nama").val(idata[1]);
	$("#txt_da_pendidikan").val(idata[2]);
	$("#dtp_da_birth").val(idata[3]);

	$('#modal_data_anak').modal('show');
}

function delDetailAnak(id_data){

	bootbox.confirm("Anda yakin akan menghapus data ini ?",
		function(result){
			if(result==true){

				$('#row'+id_data).remove();
				redrawNumber('tb_data_anak');

				//delete json_data
				var json_anak = $('#hid_anak').val();
    				json_anak = JSON.parse(json_anak);

				json_data = delete_json_item(json_anak,'id',id_data);

				$('#txt_jml_anak').val(json_data.length);
				$('#hid_anak').val(JSON.stringify(json_data));		
			}
		}
	);
}

function clearFormDataAnak(){

	$("#form_data_anak div").removeClass('has-error');
	$("#form_data_anak i").removeClass('fa-warning');

	$("#form_data_anak div").removeClass('has-success');
	$("#form_data_anak i").removeClass('fa-check');

    document.getElementById("form_data_anak").reset();
}
//END FORM DATA ANAK

//FORM DATA PENDIDIKAN FORMAL
function modalAddEduFormal(){

    clearFormPformal();

    $('#modal_data_pformal').modal('show');

    $('#modal_data_pformal').on('shown.bs.modal', function() {

        $("#txt_pformal_nama").focus();
    })
}

var validationFormPformal = function() {

        var form = $('#form_data_pformal');
        var error2 = $('.alert-danger', form);
        var success2 = $('.alert-success', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                txt_pformal_nama: {                    
                    required: true
                },
                txt_pformal_tempat: {
                    required: true
                },
                txt_pformal_lulus: {
                    required: true
                },
            },

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

function simpanDataPformal(){

    var valid = $('#form_data_pformal').valid();

    if(valid==true){

    	var json_pformal 	= $('#hid_formal_edu').val();
    		json_pformal 	= JSON.parse(json_pformal);

        var str_id          	= makeid();
        var detail_count    	= $('#tb_data_pformal tr.tdetail').length;
        var id_detail_pformal  	= $('#id_detail_pformal').val();
        var nama_pfromal       	= $('#txt_pformal_nama').val();
        var tempat      		= $('#txt_pformal_tempat').val();
        var lulus				= $('#txt_pformal_lulus').val();
        var str_data 			= str_id+'#'+nama_pfromal+'#'+tempat+'#'+lulus;

        //upload lampiran
        var iform 		= $('#form_data_pformal')[0];
		var data 		= new FormData(iform);
		var file_name 	= upload_file(data);

        if(file_name!=""){

        	var str_link 	= "<a href='"+base_url+"assets/images/uploadtemp/"+file_name+"' class='btn default btn-xs' target='_blank'><i class='fa fa-files-o'></i>&nbsp;File Lampiran</a>";
        }
        else{

        	var str_link = "";
        }
		//end upload lampiran

        if(id_detail_pformal!=''){

            var row = document.getElementById('row'+id_detail_pformal);

            row.cells[1].innerHTML = nama_pfromal;
            row.cells[2].innerHTML = tempat;            
            row.cells[3].innerHTML = lulus;	

            var json_item  = {

        		"nama"	:nama_pfromal,
        		"tempat":tempat,
        		"lulus"	:lulus
        	};

            // for existing item just update link when user upload file
            if(str_link!=""){

            	row.cells[4].innerHTML = str_link;

            	json_item["file"] = file_name;
            }            

            json_pformal = replace_json_item_data(json_pformal,"id",id_detail_pformal,json_item);
        }
        else{

        	var json_item  = {

        		"id"	:str_id,
        		"nama"	:nama_pfromal,
        		"tempat":tempat,
        		"lulus"	:lulus,
        		"file"	:file_name
        	};

        	json_pformal.push(json_item);
        	
            var strbutton   =  "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editDetailPformal(\""+str_data+"\")'><i class='fa fa-pencil'></i></a>&nbsp;";
            strbutton       += "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='delDetailPformal(\""+str_id+"\")'><i class='fa fa-trash'></i></a>";

            var content_data    = '<tr class="tdetail" id="row'+str_id+'">';
                content_data    += "<td>"+(detail_count+1)+"</td>";
                content_data    += "<td>"+nama_pfromal+"</td>";
                content_data    += "<td>"+tempat+"</td>";
                content_data    += "<td>"+lulus+"</td>";
                content_data    += "<td>"+str_link+"</td>";    
                content_data    += "<td>"+strbutton+"</td>";
                content_data    += "</tr>";

            if(detail_count<1){

                $('#tb_data_pformal tbody').html(content_data);
            }
            else{

                $('#tb_data_pformal tbody').append(content_data);
            }
        }

        $('#modal_data_pformal').modal('toggle');

        $('#hid_formal_edu').val(JSON.stringify(json_pformal));

        redrawSelectPendidikanTerakhir();
    }
}

function editDetailPformal(str_data){

	clearFormPformal();

	var idata 	= str_data.split('#');
	
	$("#id_detail_pformal").val(idata[0]);
	$("#txt_pformal_nama").val(idata[1]);
	$("#txt_pformal_tempat").val(idata[2]);
	$("#txt_pformal_lulus").val(idata[3]);

	$('#modal_data_pformal').modal('show');
}

function delDetailPformal(id_data){

	bootbox.confirm("Anda yakin akan menghapus data ini ?",
		function(result){
			if(result==true){

				$('#row'+id_data).remove();
				redrawNumber('tb_data_pformal');

				//delete json_data
				var json_pformal 	= $('#hid_formal_edu').val();
    				json_pformal 	= JSON.parse(json_pformal);

				json_data = delete_json_item(json_pformal,'id',id_data);

				$('#hid_formal_edu').val(JSON.stringify(json_data));

				redrawSelectPendidikanTerakhir();
			}
		}
	);
}

function clearFormPformal(){

	$("#form_data_pformal div").removeClass('has-error');
	$("#form_data_pformal i").removeClass('fa-warning');

	$("#form_data_pformal div").removeClass('has-success');
	$("#form_data_pformal i").removeClass('fa-check');

    document.getElementById("form_data_pformal").reset();
}

function redrawSelectPendidikanTerakhir(){

	var json_pformal 	= $('#hid_formal_edu').val();
    	json_pformal 	= JSON.parse(json_pformal);

    $("#opt_ijazah_terakhir").empty();

	for(var k=0;k<json_pformal.length;++k) {

		$("#opt_ijazah_terakhir").append($("<option></option>")
			.attr("value", json_pformal[k]["id"]).text(json_pformal[k]["nama"]));
    }
}
//END FORM DATA PENDIDIKAN FORMAL

//FORM DATA PENDIDIKAN NON FORMAL
function modalAddEduNonFormal(){

    clearFormpnonformal();

    $('#modal_data_pnonformal').modal('show');

    $('#modal_data_pnonformal').on('shown.bs.modal', function() {

        $("#txt_pnonformal_nama").focus();
    })
}

var validationFormpnonformal = function() {

        var form = $('#form_data_pnonformal');
        var error2 = $('.alert-danger', form);
        var success2 = $('.alert-success', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                txt_pnonformal_nama: {                    
                    required: true
                },
                txt_pnonformal_tempat: {
                    required: true
                },
                txt_pnonformal_lulus: {
                    required: true
                },
            },

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

function simpanDataPnonformal(){

    var valid = $('#form_data_pnonformal').valid();

    if(valid==true){

    	var json_pnonformal 	= $('#hid_nonformal_edu').val();
    		json_pnonformal 	= JSON.parse(json_pnonformal);

        var str_id          		= makeid();
        var detail_count    		= $('#tb_data_pnonformal tr.tdetail').length;
        var id_detail_pnonformal  	= $('#id_detail_pnonformal').val();
        var nama_pfromal       		= $('#txt_pnonformal_nama').val();
        var tempat      			= $('#txt_pnonformal_tempat').val();
        var lulus					= $('#txt_pnonformal_lulus').val();
        var str_data 				= str_id+'#'+nama_pfromal+'#'+tempat+'#'+lulus;

        //upload lampiran
        var iform 		= $('#form_data_pnonformal')[0];
		var data 		= new FormData(iform);
		var file_name 	= upload_file(data);

        if(file_name!=""){

        	var str_link 	= "<a href='"+base_url+"assets/images/uploadtemp/"+file_name+"' class='btn default btn-xs' target='_blank'><i class='fa fa-files-o'></i>&nbsp;File Lampiran</a>";
        }
        else{

        	var str_link = "";
        }
		//end upload lampiran

        if(id_detail_pnonformal!=''){

            var row = document.getElementById('row'+id_detail_pnonformal);

            row.cells[1].innerHTML = nama_pfromal;
            row.cells[2].innerHTML = tempat;            
            row.cells[3].innerHTML = lulus;	

            var json_item  = {

        		"nama"	:nama_pfromal,
        		"tempat":tempat,
        		"lulus"	:lulus        		
        	};

            // for existing item just update link when user upload file
            if(str_link!=""){

            	row.cells[4].innerHTML = str_link;

            	json_item["file"] = file_name;
            }            

            json_pnonformal = replace_json_item_data(json_pnonformal,"id",id_detail_pnonformal,json_item);
        }
        else{

        	var json_item  = {

        		"id"	:str_id,
        		"nama"	:nama_pfromal,
        		"tempat":tempat,
        		"lulus"	:lulus,
        		"file"	:file_name
        	};

        	json_pnonformal.push(json_item);
        	
            var strbutton   =  "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editDetailpnonformal(\""+str_data+"\")'><i class='fa fa-pencil'></i></a>&nbsp;";
            strbutton       += "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='delDetailpnonformal(\""+str_id+"\")'><i class='fa fa-trash'></i></a>";

            var content_data    = '<tr class="tdetail" id="row'+str_id+'">';
                content_data    += "<td>"+(detail_count+1)+"</td>";
                content_data    += "<td>"+nama_pfromal+"</td>";
                content_data    += "<td>"+tempat+"</td>";
                content_data    += "<td>"+lulus+"</td>";
                content_data    += "<td>"+str_link+"</td>";    
                content_data    += "<td>"+strbutton+"</td>";
                content_data    += "</tr>";

            if(detail_count<1){

                $('#tb_data_pnonformal tbody').html(content_data);
            }
            else{

                $('#tb_data_pnonformal tbody').append(content_data);
            }
        }

        $('#modal_data_pnonformal').modal('toggle');

        $('#hid_nonformal_edu').val(JSON.stringify(json_pnonformal));
    }
}

function editDetailpnonformal(str_data){

	clearFormpnonformal();

	var idata 	= str_data.split('#');
	
	$("#id_detail_pnonformal").val(idata[0]);
	$("#txt_pnonformal_nama").val(idata[1]);
	$("#txt_pnonformal_tempat").val(idata[2]);
	$("#txt_pnonformal_lulus").val(idata[3]);

	$('#modal_data_pnonformal').modal('show');
}

function delDetailpnonformal(id_data){

	bootbox.confirm("Anda yakin akan menghapus data ini ?",
		function(result){
			if(result==true){

				$('#row'+id_data).remove();
				redrawNumber('tb_data_pnonformal');

				//delete json_data
				var json_pnonformal 	= $('#hid_nonformal_edu').val();
    				json_pnonformal 	= JSON.parse(json_pnonformal);

				json_data = delete_json_item(json_pnonformal,'id',id_data);

				$('#hid_nonformal_edu').val(JSON.stringify(json_data));
			}
		}
	);
}

function clearFormpnonformal(){

	$("#form_data_pnonformal div").removeClass('has-error');
	$("#form_data_pnonformal i").removeClass('fa-warning');

	$("#form_data_pnonformal div").removeClass('has-success');
	$("#form_data_pnonformal i").removeClass('fa-check');

    document.getElementById("form_data_pnonformal").reset();
}
//END FORM DATA PENDIDIKAN NON FORMAL

//FORM DATA SK PENGANGKATAN
function modalFormSK(){

    clearFormpnonformal();

    $('#modal_data_sk').modal('show');

    $('#modal_data_sk').on('shown.bs.modal', function() {

        $("#txt_sktugas_no").focus();
    })
}

var validationFormSKAngkat = function() {

        var form = $('#form_data_sk');
        var error2 = $('.alert-danger', form);
        var success2 = $('.alert-success', form);

        form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            rules: {
                txt_no_sk: {                    
                    required: true
                },
                dtp_tgl_sk:{
                    required: true
                }                
            },

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

function simpanDataSK(){

    var valid = $('#form_data_sk').valid();

    if(valid==true){

    	var json_data_sk 	= $('#hid_sk_angkat').val();
    		json_data_sk 	= JSON.parse(json_data_sk);

        var str_id          = makeid();
        var detail_count    = $('#tb_data_sk_tugas tr.tdetail').length;
        var id_detail_sk  	= $('#id_detail_sk').val();
        var no_sk    		= $('#txt_no_sk').val();
        var tgl_sk      	= $('#dtp_tgl_sk').val();
        
        var str_data 		= str_id+'#'+no_sk+'#'+tgl_sk;

        //upload lampiran
        var iform 		= $('#form_data_sk')[0];
		var data 		= new FormData(iform);
		var file_name 	= upload_file(data);

        if(file_name!=""){

        	var str_link 	= "<a href='"+base_url+"assets/images/uploadtemp/"+file_name+"' class='btn default btn-xs' target='_blank'><i class='fa fa-files-o'></i>&nbsp;File Lampiran</a>";
        }
        else{

        	var str_link = "";
        }
		//end upload lampiran

        if(id_detail_sk!=''){

            var row = document.getElementById('row'+id_detail_sk);

            row.cells[1].innerHTML = no_sk;
            row.cells[2].innerHTML = tgl_sk;            

            var json_item  = {

        		"no_sk"	:no_sk,
        		"tgl_sk":tgl_sk        		       		
        	};

            // for existing item just update link when user upload file
            if(str_link!=""){

            	row.cells[3].innerHTML = str_link;
            	
            	json_item["file"] = file_name;
            }            

            json_data_sk = replace_json_item_data(json_data_sk,"id",id_detail_sk,json_item);
        }
        else{

        	var json_item  = {

        		"id"		:str_id,
        		"no_sk"		:no_sk,
        		"tgl_sk"	:tgl_sk,        		
        		"file_sk"	:file_name
        	};

        	json_data_sk.push(json_item);
        	
            var strbutton   =  "<a class='btn btn-primary btn-xs btn-flat' href='#' onclick='editDetailSK(\""+str_data+"\")'><i class='fa fa-pencil'></i></a>&nbsp;";
            strbutton       += "<a class='btn btn-danger btn-xs btn-flat' href='#' data-toggle='confirmation' data-popout='true' onclick='delDetailSK(\""+str_id+"\")'><i class='fa fa-trash'></i></a>";

            var content_data    = '<tr class="tdetail" id="row'+str_id+'">';
                content_data    += "<td>"+(detail_count+1)+"</td>";
                content_data    += "<td>"+no_sk+"</td>";
                content_data    += "<td>"+tgl_sk+"</td>";                
                content_data    += "<td>"+str_link+"</td>";    
                content_data    += "<td>"+strbutton+"</td>";
                content_data    += "</tr>";

            if(detail_count<1){

                $('#tb_data_sk_tugas tbody').html(content_data);
            }
            else{

                $('#tb_data_sk_tugas tbody').append(content_data);
            }
        }

        $('#modal_data_sk').modal('toggle');

        $('#hid_sk_angkat').val(JSON.stringify(json_data_sk));
    }
}

function editDetailSK(str_data){

	clearFormSK();

	var idata 	= str_data.split('#');
	
	$("#id_detail_sk").val(idata[0]);
	$("#txt_no_sk").val(idata[1]);
	$("#dtp_tgl_sk").val(idata[2]);

	$('#modal_data_sk').modal('show');
}

function delDetailSK(id_data){

	bootbox.confirm("Anda yakin akan menghapus data ini ?",
		function(result){
			if(result==true){

				$('#row'+id_data).remove();
				redrawNumber('tb_data_sk_tugas');

				//delete json_data
				var json_data_sk 	= $('#hid_sk_angkat').val();
    				json_data_sk 	= JSON.parse(json_data_sk);

				json_data = delete_json_item(json_data_sk,'id',id_data);

				$('#hid_sk_angkat').val(JSON.stringify(json_data));
			}
		}
	);
}

function clearFormSK(){

	$("#form_data_sk div").removeClass('has-error');
	$("#form_data_sk i").removeClass('fa-warning');

	$("#form_data_sk div").removeClass('has-success');
	$("#form_data_sk i").removeClass('fa-check');

    document.getElementById("form_data_sk").reset();
}
//END FORM DATA SK PENGANGKATAN
