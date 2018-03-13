<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends IO_Controller
{

	public function __construct()
	{
			$modul = 26;
			parent::__construct($modul);
		 	$this->load->model('mkelas','model');
	}

	function index()
	{
		//get tingkat
		$select_tingkat= $this->mcommon->mget_list_tingkat()->result();
		
					$vdata['id_kelas'][NULL] = '';
					foreach ($select_tingkat as $b) {
		
						$vdata['id_kelas'][$b->id_kelas]
						=$b->tingkat." | ".$b->tipe_kelas;
					}
						
		$vdata['titleHD'] = 'DATA TINGKAT KELAS';
		$vdata['title'] = 'DATA KELAS';
	    $data['content'] = $this->load->view('vkelas',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	#region kelasHD
	function build_paramHD($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->tingkat)) $string_param .= " tingkat LIKE '%".$param->tingkat."%' ";
		}

		return $string_param;
	}

	function load_gridHD()
	{
		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_paramHD($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];
		// var_dump($_REQUEST['order']);
		// exit();


		$data 				= $this->model->get_list_dataHD($string_param,$sort_by,$sort_type);
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="editHD(\''.$data[$i]->id_kelas.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapusHD(\''.$data[$i]->id_kelas.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

				$data[$i]->id_kelas,
				$data[$i]->tingkat,
		     	$data[$i]->tipe_kelas,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function get_data_cekkelasHD($tingkat,$tipe_kelas){
		$tingkat = urldecode($tingkat);
		$tipe_kelas = urldecode($tipe_kelas);
		$data = $this->model->query_cekkelasHD($tingkat,$tipe_kelas);
    	echo json_encode($data);
	}

	function get_data_kelasHD($id_kelas){
		$id_kelas = urldecode($id_kelas);
		$data = $this->model->query_kelasHD($id_kelas);
    	echo json_encode($data);
	}

	function simpan_kelasHD($status){
		$id_kelas 			= $this->input->post('id_kelas');
		$tingkat 			= $this->input->post('tingkat');
		$tipe_kelas  		= $this->input->post('tipe_kelas');
	    $userid 			= $this->session->userdata('logged_in')['uid'];

		$data_kelasHD = array(
			'tingkat' 			=> $tingkat,
			'tipe_kelas' 		=> $tipe_kelas,
			'userid' 			=> $userid
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data kelas
         	$this->model->simpan_data_kelasHD($data_kelasHD);

		}
        else //update data
		{		
			// save data kelas
         	$this->model->update_data_kelasHD($id_kelas,$data_kelasHD);
        }	    

			echo "true";
	}

	function DelKelasHD($id_kelas){
		$id_kelas = urldecode($id_kelas);
		$this->model->delete_kelasHD($id_kelas);
	}

	function exportexcelHD(){
		// hasil decode // 
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		$str = $this->build_paramHD($str);

		$data= $this->model->get_list_dataHD($str);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Master_Tingkat_Kelas');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master Tingkat Kelas");
		$this->excel->getActiveSheet()->mergeCells('A1:D1');
		$this->excel->getActiveSheet()->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "ID Kelas");
		$this->excel->getActiveSheet()->setCellValue('C3', "Tingkat");
		$this->excel->getActiveSheet()->setCellValue('D3', "Tipe kelas");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->id_kelas);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->tingkat);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->tipe_kelas);
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'D'; $col++) {

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
		$cell_to = "D".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:D3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:D3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:D3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Master-TIngkat-Kelas.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	#endregion kelasHD

	#region kelasDT
	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->kode_kelas)) $string_param .= " kode_kelas LIKE '%".$param->kode_kelas."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->kode_kelas.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->kode_kelas.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

				$data[$i]->tingkat,
				$data[$i]->tipe_kelas,
		     	$data[$i]->kode_kelas,
  				$data[$i]->nama,
  				$data[$i]->kapasitas,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}	

	function simpan_kelas($status){
		$kode_kelas 		= $this->input->post('kode_kelas');
		$id_kelas 			= $this->input->post('select_tingkat');
		$nama  		        = $this->input->post('nama');
		$kapasitas  		= $this->input->post('kapasitas');
	    $userid 			= $this->session->userdata('logged_in')['uid'];

		$data_kelas = array(
			'kode_kelas' 			=> $kode_kelas,
			'id_kelas' 				=> $id_kelas,
			'nama' 		            => $nama,
			'kapasitas' 		    => $kapasitas,
			'userid' 				=> $userid
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data kelas
         	$this->model->simpan_data_kelas($data_kelas);

		}
        else //update data
		{		
			// save data kelas
         	$this->model->update_data_kelas($kode_kelas,$data_kelas);
        }	    

			echo "true";
	}

	function get_data_kelas($kode_kelas){
		$kode_kelas = urldecode($kode_kelas);
		$data = $this->model->query_kelas($kode_kelas);
    	echo json_encode($data);
	}

	function DelKelas($kode_kelas){
		$kode_kelas = urldecode($kode_kelas);
		$this->model->delete_kelas($kode_kelas);
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
		$this->excel->getActiveSheet()->setTitle('Master_Kelas');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master Kelas");
		$this->excel->getActiveSheet()->mergeCells('A1:F1');
		$this->excel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "Kode Kelas");
		$this->excel->getActiveSheet()->setCellValue('C3', "Tingkat");
		$this->excel->getActiveSheet()->setCellValue('D3', "Nama kelas");
		$this->excel->getActiveSheet()->setCellValue('E3', "Kapasitas");
		$this->excel->getActiveSheet()->setCellValue('F3', "Tipe Kelas");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->kode_kelas);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->tingkat);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->nama);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $row->kapasitas);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->tipe_kelas);
				
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
		$cell_to = "F".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:F3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:F3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:F3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Master-Kelas.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}
	#endregion kelasDT

	


}