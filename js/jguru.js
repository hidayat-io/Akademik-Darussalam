$(document).ready(function(){

	modalNew();
	setTable();
	handleValidation();
    validationFormAnak();

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
}

// MASTER FORM EDITING
function modalNew(){

	$('#modal_editing').modal('show');
}

function validateForm(){

	var valid = $("#form_editing").valid();

    if(valid==true) $('.alert-danger').hide();
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
        }
        else{

        	
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

    clearFormDataEduFormal();

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

function simpanDataPformal(){

    var valid = $('#form_data_pformal').valid();

	// <th>No</th>
 //    <th>Pendidikan</th>
 //    <th>Tempat</th>
 //    <th>Lulus Tahun</th>
 //    <th>Lampiran</th>
 //    <th>Action</th>    

    if(valid==true){

        var str_id          	= makeid();
        var detail_count    	= $('#tb_data_pformal tr.tdetail').length;
        var id_detail_pformal  	= $('#id_detail_pformal').val();
        var nama_pfromal       	= $('#txt_pformal_nama').val();
        var tempat      		= $('#txt_pformal_tempat').val();
        var lulus				= $('#txt_pformal_lulus').val();
        var str_data 			= str_id+'#'+nama_pfromal+'#'+tempat+'#'+tgl_lahir;

        if(id_detail_pformal!=''){

            var row = document.getElementById('row'+id_detail_pformal);

            row.cells[1].innerHTML = nama_pfromal;
            row.cells[2].innerHTML = tempat;            
            row.cells[3].innerHTML = tgl_lahir;
        }
        else{

        	
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

        $('#modal_data_pformal').modal('toggle');
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
			}
		}
	);
}

function clearFormDataEduFormal(){

	$("#form_data_anak div").removeClass('has-error');
	$("#form_data_anak i").removeClass('fa-warning');

	$("#form_data_anak div").removeClass('has-success');
	$("#form_data_anak i").removeClass('fa-check');

    document.getElementById("form_data_anak").reset();
}
//END FORM DATA ANAK