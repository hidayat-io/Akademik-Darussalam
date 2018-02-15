<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komponen extends IO_Controller
{

	public function __construct()
		{
    	$modul = 2;
		parent::__construct($modul);
		$this->load->model('Mkomponen');
	  }

	function index()
		{
			$data['title'] = 'Komponen Biaya';
	    	$data['content'] = $this->load->view('vkomponen',$data,TRUE);
	    	$this->load->view('main',$data);
	  }


	function load_grid(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);

		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 			= $this->Mkomponen->get_list_data($string_param,$sort_by,$sort_type);
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$fdate 		= 'd-M-Y';
		$tipe 		= array('S'=>'Semesteran','B'=>'Bulanan');
		$isActive 	= array('1'=>'Aktif','0'=>'NonAktif');

		for($i = $iDisplayStart; $i < $end; $i++) {

			$act ='<a class="btn blue btn-xs" title="UBAH DATA" onclick="editdata(\''.$data[$i]->id_komponen.'\')">
						<i class="fa fa-edit"></i>
					<a class="btn red btn-xs" title="HAPUS DATA" onclick="deleteData(\''.$data[$i]->id_komponen.'\')">
						<i class="fa fa-trash"></i>';

			$records["data"][] = array(

				$data[$i]->id_komponen,
				$data[$i]->nama_komponen,
				$tipe[$data[$i]->tipe],
				$isActive[$data[$i]->isActive],
				$act
			);
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}


	function build_param($param){

		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->nama_komponen)) $string_param .= "nama_komponen LIKE '%".$param->nama_komponen."%' ";
		}

		return $string_param;
	}

	function save_data(){

		$input = $this->input->post();

		$id_data 		= $input['hid_id_data'];
		$user 			= $this->session->userdata('logged_in')['uid'];

		$data = array(

			'nama_komponen'		=> $input['txtnama'],
			'tipe'				=> $input['optionsRadios'],
			'isActive'			=> $input['optionsRadiosStatus'],
			'userid'			=> $user
		);



		if($id_data==""){

			$this->Mkomponen->insert_new($data);

		}
		else{

			$this->Mkomponen->update_data($id_data,$data);
		}
	}

	function get_data($id){

		$data = $this->Mkomponen->query_getdata($id);

		echo json_encode($data);
	}


	function hapus_data($str){


		$param = explode('|', urldecode($str));


		$id 		= $param[0];

		$user 		= $this->session->userdata('logged_in')['uid'];
		$this->Mkomponen->m_hapus_data($id);
	}

	function excel_komponen(){
		// hasil decode // 
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		$str = $this->build_param($str);

		$data= $this->Mkomponen->get_list_data($str);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Report-Komponen');
		$this->excel->getActiveSheet()->setCellValue('A1', "Report Komponen");
		$this->excel->getActiveSheet()->mergeCells('A1:L1');

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "Nama Komponen");
		$this->excel->getActiveSheet()->setCellValue('C3', "tipe");

		$fdate 	= "d-M-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				if($row->tipe=='S'){
					$tp="Semesteran";
				}else{
					$tp="Bulanan";
				}

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->nama_komponen);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $tp);

				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'C'; $col++) {

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
		$cell_to = "C".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:C3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:C3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:C3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='report-komponen.xls'; //save our workbook as this file name
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
