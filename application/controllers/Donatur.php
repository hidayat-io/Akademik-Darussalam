<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class donatur extends IO_Controller
{

	public function __construct()
	{
			$modul = 33;
			parent::__construct($modul);
		 	$this->load->model('mdonatur','model');
	}

	function index()
	{
		
		$vdata['title'] = 'DATA DONATUR';
	    $data['content'] = $this->load->view('vdonatur',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->nama_donatur)) $string_param .= " nama_donatur LIKE '%".$param->nama_donatur."%' ";
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

		for($i = $iDisplayStart; $i < $end; $i++) {
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_donatur.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_donatur.'\',\''.$data[$i]->nama_donatur.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

		     	$data[$i]->id_donatur,
				$data[$i]->nama_donatur,
  				$data[$i]->alamat,
				$data[$i]->telpon,
				$data[$i]->kategori,
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
		$this->excel->getActiveSheet()->setTitle('Master_donatur');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master donatur");
		$this->excel->getActiveSheet()->mergeCells('A1:F1');
		$this->excel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "ID Donatur");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama Donatur");
		$this->excel->getActiveSheet()->setCellValue('D3', "Alamat");
		$this->excel->getActiveSheet()->setCellValue('E3', "Telpon");
		$this->excel->getActiveSheet()->setCellValue('F3', "Kategori");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->id_donatur);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama_donatur);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->alamat);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $row->telpon);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->kategori);
				
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

		$filename='Master-donatur.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function simpan_donatur($status)
	{
		$id_donatur 	= $this->input->post('id_donatur');
		$nama_donatur 	= $this->input->post('nama_donatur');
		$alamat  		= $this->input->post('alamat');
		$telpon 		= $this->input->post('telpon');
		$kategori 	    = $this->input->post('kategori');
        $recdate        = date('y-m-d');
	    $userid 	    = $this->session->userdata('logged_in')['uid'];

		$data_donatur = array(
			'id_donatur' 		=> $id_donatur,
			'nama_donatur' 		=> $nama_donatur,
			'alamat' 		    => $alamat,
			'telpon' 			=> $telpon,
			'kategori' 	        => $kategori,
            'recdate'           => $recdate,
			'userid' 		    => $userid
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data donatur
         	$this->model->simpan_data_donatur($data_donatur);

		}
        else //update data
		{		
			// save data donatur
         	$this->model->update_data_donatur($id_donatur,$data_donatur);
        }	    

			echo "true";
	}

	function get_data_donatur($nama_donatur)
	{
		$nama_donatur = urldecode($nama_donatur);
		$data = $this->model->query_donatur($nama_donatur);
    	echo json_encode($data);
    }
    
	function get_edit_donatur($id_donatur)
	{
		$id_donatur = urldecode($id_donatur);
		$data = $this->model->query_edit_donatur($id_donatur);
    	echo json_encode($data);
	}

	function Deldonatur($id_donatur)
	{
		$id_donatur = urldecode($id_donatur);
		$this->model->delete_donatur($id_donatur);
	}


}

	

	