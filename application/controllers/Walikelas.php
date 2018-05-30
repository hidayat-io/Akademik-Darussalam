<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class walikelas extends IO_Controller
{

	public function __construct() {
			$this->modul = 17;
			parent::__construct($this->modul);
		 	$this->load->model('mwalikelas','model');
	}

	function index() {
		// get ID guru
        $select_guru = $this->model->get_msguru()->result();

        $vdata['msguru'][NULL] = '-';
        foreach ($select_guru as $b) {

            $vdata['msguru'][$b->no_reg."#".$b->nama_lengkap]
                =$b->no_reg." | ".$b->nama_lengkap;
		}
		
		//get kurikulum aktif
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
       	$vdata['title'] = 'WALI KELAS';
	    $data['content'] = $this->load->view('vwalikelas',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function build_param($param) {        
		// merubah hasil json menjadi parameter Query //
		// var_dump($string_param );
		// exit();
		$string_param = NULL;

		if($param!=null){

			if(isset($param->kode_kelas)) $string_param .= " ms_kelasdt.kode_kelas LIKE '%".$param->kode_kelas."%' ";
		}

		return $string_param;
	}

	function load_grid() {
		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		// var_dump($string_param );
		// exit();
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];


		$data 				= $this->model->get_list_data($string_param,$sort_by,$sort_type,$thn_ajar_aktif);
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
			$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->id.'\',\''.$data[$i]->kode_kelas.'\')">
						<i class="fa fa-edit"></i>
					</a>';
			$id_thn_ajar_value				= $this->model->get_kurikulum($thn_ajar_aktif);

			$records["data"][] = array(
				// $data[$i]->id,
				$id_thn_ajar_value->deskripsi,
				$data[$i]->kode_kelas,
				$data[$i]->id_guru,
				$data[$i]->nama_lengkap,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function get_data_walikelas_byID($kode_kelas) {
		//get thn ajar dan semester aktif
		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];

		$data 				= $this->model->query_get_walikelas($thn_ajar_aktif,$kode_kelas);
		// var_dump($data);
		// exit();
		echo json_encode($data);
		

	}

	function simpan_walikelas($status) {
		//get thn ajar dan semester aktif
		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];
		$semester_aktif		= $isys_param[1];

		$id 				= $this->input->post('id');
		$kode_kelas 		= $this->input->post('kode_kelas');
		$id_guru 			= $this->input->post('id_guru');
		$id_thn_ajar		= $thn_ajar_aktif;
		$userid 			= $this->session->userdata('logged_in')['uid'];

		$data = array(
			'id' 			=> $id,
			'id_thn_ajar' 	=> $id_thn_ajar,
			'kode_kelas' 	=> $kode_kelas,
			'id_guru' 		=> $id_guru,
			'userid' 		=> $userid
		);
		
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data walikelas
			$this->model->simpan_data($data);

		}
		else //update data
		{		
			// save data walikelas
			$this->model->update_data($id,$thn_ajar_aktif,$kode_kelas,$data);
		}	    

			echo "true";
	}

	function exportexcel(){
		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];
		$semester_aktif		= $isys_param[1];
		

		// $sort_by 		= '';
		// $sort_type 		= '';
		// hasil decode // 
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		$str = $this->build_param($str);
		// var_dump($str);
		// exit();
		$data = $this->model->get_eksport_list_data($str,$thn_ajar_aktif);
		// echo "$this->model->get_list_data($str,$thn_ajar_aktif,$semester_aktif)";
		// var_dump ($data);
		// exit();
		
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('LIST WALIKELAS');
		$this->excel->getActiveSheet()->setCellValue('A1', "LIST WALIKELAS");
		$this->excel->getActiveSheet()->mergeCells('A1:E1');
		$this->excel->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "Tahun Ajar");
		$this->excel->getActiveSheet()->setCellValue('C3', "Kode Kelas");
		$this->excel->getActiveSheet()->setCellValue('D3', "ID Guru");
		$this->excel->getActiveSheet()->setCellValue('E3', "Nama Guru");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){
				
				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->deskripsi);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->kode_kelas);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->id_guru);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $row->nama_lengkap);
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'E'; $col++) {

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
		$cell_to = "E".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:E3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:E3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:E3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='ListWaliKelas.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}




}