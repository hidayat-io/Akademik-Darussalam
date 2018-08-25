<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 49;
			parent::__construct($this->modul);
		 	$this->load->model('Mpendidikan','model');
	}

	function index()
	{
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
		$vdata['title'] = 'DATA PENDIDKAN';
	    $data['content'] = $this->load->view('vpendidikan',$vdata,TRUE);
	    $this->load->view('main',$data);
	}


	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->pendidikan)) $string_param .= " pendidikan LIKE '%".$param->pendidikan."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_pendidikan.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red '.$class_delete.'" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_pendidikan.'\',\''.$data[$i]->pendidikan.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

		     	$data[$i]->id_pendidikan,
				$data[$i]->pendidikan,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function save_data()
	{
		$id_Pendidikan 	= $this->input->post('id_Pendidikan');
		$jj_pendidikan 	= $this->input->post('jj_pendidikan');
	    $userid 	    = $this->session->userdata('logged_in')['uid'];

		$data_pendidikan = array(
			'id_Pendidikan' 		=> $id_Pendidikan,
			'pendidikan' 		=> $jj_pendidikan,
			'userid' 		    	=> $userid
		);


		if($id_Pendidikan=='')	
		{// cek apakah add new atau editdata
			
		// save data pendidikan
         	$this->model->simpan_data_pendidikan($data_pendidikan);

		}
        else //update data
		{		

			//var_dump($id_Pendidikan);
		///	exit();
        

			// save data pendidikan
         	$this->model->update_data_pendidikan($id_Pendidikan,$data_pendidikan);
        }	    
	}

	function Delpendidikan($id_pendidikan)
	{
		$id_pendidikan = urldecode($id_pendidikan);
		$this->model->delete_pendidikan($id_pendidikan);
	}

	function get_edit_pendidikan($id_pendidikan)
	{
		$id_pendidikan = urldecode($id_pendidikan);
		$data = $this->model->query_edit_pendidikan($id_pendidikan);
    	echo json_encode($data);
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
		$this->excel->getActiveSheet()->setTitle('Master_Pendidikan');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master Pendidikan");
		$this->excel->getActiveSheet()->mergeCells('A1:F1');
		$this->excel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "ID Pendidikan");
		$this->excel->getActiveSheet()->setCellValue('C3', "Pendidikan");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->id_pendidikan);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->pendidikan);
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'F'; $col++) {

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
		$this->excel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:F3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:F3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Master-Pendidikan.xls'; //save our workbook as this file name
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

	

	