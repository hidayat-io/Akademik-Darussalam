<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 2;
			parent::__construct($this->modul);
		 	$this->load->model('mpembayaran','model');
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function index()
	{
		// get tahun & senester aktif
       	$sys_param						= $this->kurikulum_aktif();
		$isys_param 					= explode('#',$sys_param);
		$id_thn_ajar					= $isys_param[0];
		$id_thn_ajar_value				= $this->model->get_kurikulum($id_thn_ajar);
			// var_dump($id_thn_ajar_value);
			// exit();
		$vdata['thn_ajar_aktif']		= $id_thn_ajar_value->deskripsi;
		$vdata['semester_aktif']		= $isys_param[1];

		//cek hakAkses
		$user_id			= $this->session->userdata('logged_in')['uid'];
		$modul_id			= $this->modul;
		$HakAkses			= $this->mcommon->get_hak_akses($user_id,$modul_id);
		$add				= $HakAkses->add;
		$edit				= $HakAkses->edit;
		$delete				= $HakAkses->delete;

		if($add==1){
			$class_add = '';
		}else{
			$class_add = 'hidden';
		}

		if($edit==1){
			$class_edit = '';
		}else{
			$class_edit = 'hidden';
		}

		if($delete==1){
			$class_delete = '';
		}else{
			$class_delete = 'hidden';
		}

		$vdata['class_add']				= $class_add;
		$vdata['title'] 				= 'TRANSAKSI PEMBAYARAN';
	    $data['content'] 				= $this->load->view('vpembayaran',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->id_matpal)) $string_param .= " ms_bankpembayaran.id_matpal LIKE '%".$param->id_matpal."%' ";
		}

		return $string_param;
	}

	function load_grid()
	{
		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];
		// var_dump($_REQUEST['order']);
		// exit();


		$data 				= $this->model->get_list_data($string_param,$sort_by,$sort_type);
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
		$fdate = 'd-m-Y';

		//cek hakAkses
		$user_id			= $this->session->userdata('logged_in')['uid'];
		$modul_id			= $this->modul;
		$HakAkses			= $this->mcommon->get_hak_akses($user_id,$modul_id);
		$add				= $HakAkses->add;
		$edit				= $HakAkses->edit;
		$delete				= $HakAkses->delete;

		if($add==1){
			$class_add = '';
		}else{
			$class_add = 'hidden';
		}

		if($edit==1){
			$class_edit = '';
		}else{
			$class_edit = 'hidden';
		}

		if($delete==1){
			$class_delete = '';
		}else{
			$class_delete = 'hidden';
		}

		for($i = $iDisplayStart; $i < $end; $i++) {
			$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_pembayaran.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red '.$class_delete.'" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_pembayaran.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			if($data[$i]->tipe_pembayaran =='S'){
				$tipe_pembayaran = 'SEMESTER';
			}else{
				$tipe_pembayaran = 'BULANAN';
			}
			$records["data"][] = array(
		     	// $data[$i]->id_pembayaran,
		     	$data[$i]->tanggal,
		     	$data[$i]->no_registrasi,
		     	$data[$i]->no_registrasi,
		     	$tipe_pembayaran,
		     	$data[$i]->semester,
				$data[$i]->keterangan,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function exportexcel(){
		// hasil decode // 
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		$str = $this->build_param($str);

		$data= $this->model->get_list_data($str);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Master_pembayaran');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master pembayaran");
		$this->excel->getActiveSheet()->mergeCells('A1:I1');
		$this->excel->getActiveSheet()->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "ID Mata Pelajaran");
		$this->excel->getActiveSheet()->setCellValue('C3', "Tingkat");
		$this->excel->getActiveSheet()->setCellValue('D3', "pembayaran");
		$this->excel->getActiveSheet()->setCellValue('E3', "Jawaban A");
		$this->excel->getActiveSheet()->setCellValue('F3', "Jawaban B");
		$this->excel->getActiveSheet()->setCellValue('G3', "Jawaban C");
		$this->excel->getActiveSheet()->setCellValue('H3', "Jawaban D");
		$this->excel->getActiveSheet()->setCellValue('I3', "Jawaban");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->id_matpal.'-'.$row->nama_matpal);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->tingkat);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->pembayaran);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $row->jwb_a);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->jwb_b);
				$this->excel->getActiveSheet()->setCellValue('G'.$i, $row->jwb_c);
				$this->excel->getActiveSheet()->setCellValue('H'.$i, $row->jwb_d);
				$this->excel->getActiveSheet()->setCellValue('I'.$i, $row->jwb_benar);
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'I'; $col++) {

		    $this->excel->getActiveSheet()
		        ->getColumnDimension($col)
		        ->setAutoSize(true);
		}

		$styleArray = array(
		  'borders' => array(
		    'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		    )
		  )
		);
		$i = $i-1;
		$cell_to = "I".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:I3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:I3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:I3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Master-pembayaran.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function simpan_pembayaran($status)
	{
		$no_registrasi 			= $this->input->post('no_registrasi');
		$tgl_bayar 				= $this->input->post('tgl_bayar');
		$tgl_bayar 				= io_return_date('d-m-Y',$tgl_bayar);
		$tipe_pembayaran  		= $this->input->post('tipe_pembayaran');
		$semester  				= $this->input->post('semester');
		$id_tagihan  			= $this->input->post('id_tagihan');
		$total_tagihan  		= $this->input->post('total_tagihan');
		$jumlah_bayar  			= $this->input->post('jumlah_bayar');
		$keterangan  			= $this->input->post('keterangan');
	    $userid 				= $this->session->userdata('logged_in')['uid'];
		
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			//jika bayar semester
			if($tipe_pembayaran =='S'){

				$data_pembayaranhd = array(
					'no_registrasi' 		=> $no_registrasi,
					'tanggal' 				=> $tgl_bayar,
					'tipe_pembayaran'		=> $tipe_pembayaran,
					'semester' 		    	=> $semester,
					'keterangan' 		    => $keterangan,
					'userid' 				=> $userid
				);

				$id = $this->model->simpan_pembayaranhd($data_pembayaranhd);

				$data_pembayarandt = array(
					'id_pembayaranhd' 		=> $id,
					'id_tagihan' 			=> $id_tagihan,
					'nominal'				=> str_replace(array('.',','), array('',''),$jumlah_bayar),
				);

				$this->model->simpan_pembayarandt($data_pembayarandt);

			}
			else{

			}
		// save data pembayaran
         	// $this->model->simpan_data_pembayaran($data_pembayaran);

		}
        else //update data
		{		
			// save data pembayaran
         	$this->model->update_data_pembayaran($kode_pembayaran,$data_pembayaran);
        }	    

			echo "true";
	}

	function get_data_pembayaran($no_registrasi,$tipe_pembayaran,$semester_pembayaran)
	{
		$no_registrasi 				= urldecode($no_registrasi);
		$tipe_pembayaran 			= urldecode($tipe_pembayaran);
		$semester_pembayaran 		= urldecode($semester_pembayaran);
		$data 						= $this->model->query_get_data_pembayaran($no_registrasi,$tipe_pembayaran,$semester_pembayaran);
    	echo json_encode($data);
	}

	function get_sisa_potongan($no_registrasi,$id_tagihan)
	{
		$no_registrasi 				= urldecode($no_registrasi);
		$id_tagihan 				= urldecode($id_tagihan);
		$data_tagihan 						= $this->model->query_get_sisa_potongan($no_registrasi,$id_tagihan);
    	echo json_encode($data_tagihan);
	}

	function get_data_pembayaran_byid($id_pembayaran)
	{
		$id_pembayaran = urldecode($id_pembayaran);
		$data = $this->model->query_get_pembayaran($id_pembayaran);
    	echo json_encode($data);
	}

	function Delpembayaran($kode_pembayaran)
	{
		$kode_pembayaran = urldecode($kode_pembayaran);
		$this->model->delete_pembayaran($kode_pembayaran);
	}


}

	

	