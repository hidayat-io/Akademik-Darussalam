$(document).ready(function(){

	modalNew();
	setTable();
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
});

function modalNew(){

	$('#modal_editing').modal('show');
}

function setTable(){

	$('#tb_list').DataTable( {
		"order": [[ 0, "desc" ]],
        "processing": true,
		"serverSide": true,
		ajax: {
			'url':base_url+"guru/load_grid",
			'type':'GET',
			'data': function (d) {
                d.param = $('#hid_param').val();
            }
		},
    });
}