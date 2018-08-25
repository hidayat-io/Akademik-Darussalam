function downloadLaporanAbsensi(){

    let form_data  = $('#form_report').serializeArray();
        form_data  = JSON.stringify(form_data);
    
    let str_encoded = ioEncode(form_data);

    window.open(base_url + "report_absensi/unduh/" + str_encoded, '_blank');
}

$(document).ready(function()
{

	// $('[data-toggle="tooltip"]').tooltip(); 

    $(".select2").select2({
        dropdownParent: $('#form_report')
        // dropdownParent: parentElement
	});

	$('.datepicker').datepicker({
    
        autoclose: true,
        format: 'dd-mm-yyyy'
	});
	
	$('#dtp_absen_mulai').change(function(){

		$('#dtp_absen_akhir').val($('#dtp_absen_mulai').val());
	});

	$('#dtp_absen_mulai').keypress(function(event) {

        var charCode = (event.which) ? event.which : event.keyCode;

        if(charCode==8 || charCode==127){

            $(this).val('');
        }
        else{

            return false;
        }       
	});
});