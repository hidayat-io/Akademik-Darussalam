// //load
$(document).ready(function()
{
	setTable();
	setTableMenu();
	validate_add_msgroup();
});

function OtomatisKapital(a) {
    setTimeout(function () {
        a.value = a.value.toUpperCase();
    }, 1);
}

function setTable(){
	$('#tb_list').DataTable({
		processing: true,
		serverSide: true,
		bFilter: false,
		ajax: {
			'url': base_url + "msgroup/load_grid",
			'type': 'GET',
			'data': function (d) {
				d.param = $('#hid_param').val();
			}
		},
    } );
}

function setTableMenu(){
	$('#tb_list_menu').DataTable({
		processing: true,
		serverSide: true,
		bFilter: false,
		"paging": false,
		"ordering": false,
		"info": false,
		ajax: {
			'url': base_url + "msgroup/load_grid_menu",
			'type': 'GET',
			'data': function (d) {
				d.param = $('#hid_param').val();
			}
		},
    } );
}

var validate_add_msgroup = function () {

	var form = $('#add_msgroup');
	var error2 = $('.alert-danger', form);
	var success2 = $('.alert-success', form);


	form.validate({
		errorElement: 'span', //default input error message container
		errorClass: 'help-block help-block-error', // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		rules: {
			confirmPassword: {
				equalTo: "#password"
			}	
		},
		invalidHandler: function (event, validator) { //display error alert on form submit              
			success2.hide();
			error2.show();
			$('#Modal_add_msgroup').animate({
				scrollTop: $(validator.errorList[0].element).offset().top
			}, 1000);

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

function clearvalidate_add_msgroup() {

	$("#add_msgroup div").removeClass('has-error');
	$("#add_msgroup i").removeClass('fa-warning');
	$("#add_msgroup div").removeClass('has-success');
	$("#add_msgroup i").removeClass('fa-check');

	document.getElementById("add_msgroup").reset();
}

function svmsgroup(){
	if($("#add_msgroup").valid()==true){
		$group_name = $('#group_name').val();
		$status = $('#save_button').text();
		var str_url = encodeURI(base_url + "msgroup/get_data_msgroup/" + $group_name);//cek user id sudah ada atau tidak
       $.ajax({
		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){	
            $data = $.parseJSON(data);
                if( $data != null & $status =='SAVE'){
					bootbox.alert("<div class='callout callout-danger'><span class='glyphicon glyphicon-exclamation-sign'></span> Group " + $group_name+" sudah ada! </div>",
                            function(result){
                                if(result==true){
                                }
                            }
                        );
                    
                }
                else{
                    var iform = $('#add_msgroup')[0];
                    var data = new FormData(iform);
                    if ($status == 'UPDATE')
                        {
                            msg="Update Data Berhasil"
                        }
                        else
                        {
                            msg="Simpan Data Berhasil"
                        }
                    $.ajax({

                        type:"POST",
                        url:base_url+"msgroup/simpan_msgroup/"+$status,
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

                                    window.location = base_url+'msgroup';
                                }
                            });
                        }
                    });
                }
            }
        });
	}
}

function addmsgroup(){
	clearvalidate_add_msgroup();
	$('#spansearchmskaryawan').show();
	$("#cls_changePWD").addClass("hidden");
	$('#password').attr('disabled', false);
	$('#confirmPassword').attr('disabled', false);
    $('#save_button').text('SAVE');
	// kosong();
	$('#Modal_add_msgroup').modal('show');
}

function edit(group_id){
	clearvalidate_add_msgroup();
	var str_url = encodeURI(base_url + "msgroup/get_edit_msgroup/" + group_id);
	$('#save_button').text('UPDATE');
	
	$.ajax({

		type:"POST",
		url:str_url,
		dataType:"html",
		success:function(data){
			
			var data = $.parseJSON(data);
			var LengtData = data.length;
			$('#group_id').val(data[0].group_id);
			$('#group_name').val(data[0].group_name);
			for (i = 0; i < LengtData; i++) {

				var modul_id = 'modul_id' + data[i].modul_id;
				var modul_idX = data[i].modul_id;
				var nama_modul = data[i].nama_modul;
				var add = 'add' + data[i].modul_id;
				var edit = 'edit' + data[i].modul_id;
				var del = 'delete' + data[i].modul_id;

				$("#" + modul_id).prop("checked", true);
				if (data[i].add == 1){
					$("#" + add).prop("checked", true);
				}
				else
				{
					$("#" + add).prop("checked", false);
				}

				if (data[i].edit == 1) {
					$("#" + edit).prop("checked", true);
				}
				else {
					$("#" + edit).prop("checked", false);
				}

				if (data[i].edit == 1) {
					$("#" + del).prop("checked", true);
				}
				else {
					$("#" + del).prop("checked", false);
				}
				
			}
			$('#Modal_add_msgroup').modal('show');
			
			
		}
	});
	
}

function hapus(group_id,group_name){
	var str_url = encodeURI(base_url + "msgroup/cek_user/" + group_id);
	$.ajax({
		type: "POST",
		url: str_url,
		dataType: "html",
		success: function (data) {
			var data = $.parseJSON(data);
			if(data==null){
				var str_url = encodeURI(base_url + "msgroup/Delmsgroup/" + group_id);
				bootbox.confirm("Anda yakin akan menghapus " + group_name + " ?",
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

											window.location = base_url + 'msgroup';
										}
									});
								}
							});
						}
					}
				);
			}else{
				bootbox.alert({
				message: "<span class='glyphicon glyphicon-ok-sign'></span>&nbsp;Tidak bisa dihapus, karena sudah digunakan di master user",
				size: 'small'
				});
			}
			
		}
	});

	
	
}

function Modalcari() {
	clearformcari();
	$('#Modal_cari').modal('show');
}

function SearchAction() {
	var group_id = $('#s_group_id').val();
	var param = { 'group_id': group_id };
	param = JSON.stringify(param);

	$('#hid_param').val(param);

	var table = $('#tb_list').DataTable();
	table.ajax.reload(null, false);
	table.draw();

	$('#Modal_cari').modal('toggle');
}

function clearformcari(){
	$('#s_group_id').val('');
}


