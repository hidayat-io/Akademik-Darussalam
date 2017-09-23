<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class bidstudi extends IO_Controller
{

	public function __construct()
	{
			$modul = 26;
			parent::__construct($modul);
		 	$this->load->model('mbidstudi','model');
	}

	function index()
	{
        $vdata['title'] = 'DATA BIDANG STUDI';
	    $data['content'] = $this->load->view('vbidstudi',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->id_bidang)) $string_param .= " id_bidang LIKE '%".$param->id_bidang."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_bidang.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_bidang.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

		     	$data[$i]->id_bidang,
				$data[$i]->nama_bidang,
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
		$this->excel->getActiveSheet()->setTitle('BIDANG STUDI');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master Data Bidang Studi");
		$this->excel->getActiveSheet()->mergeCells('A1:C1');
		$this->excel->getActiveSheet()->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "ID Bidang Studi");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama Bidang Studi");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){
               
				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->id_bidang);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama_bidang);
				
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
		$cell_to = "C".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:C3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:C3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:C3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Master-Bidang-Studi.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function simpan_bidstudi($status,$rbutton)
	{
		$id_bidang 		    = $this->input->post('id_bidang');
		$nama_bidang 		= $this->input->post('nama_bidang');
		$nama_bidang 		= $this->input->post('nama_bidang');
		$item_matpal 		= $this->input->post('hid_table_item_Matpal');
        $recdate            = date('y-m-d');
	    $userid 			= $this->session->userdata('logged_in')['uid'];

		$data_bidstudi = array(
			'id_bidang' 			=> $id_bidang,
			'nama_bidang' 			=> $nama_bidang,
			'kategori'				=> $rbutton,
            'recdate'               => $recdate,
			'userid' 				=> $userid
		);
		
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data bidstudi
         	$this->model->simpan_data_bidstudi($data_bidstudi);
			//save matapelajaran			
			$item_matpal  = explode(';',$item_matpal);
			foreach ($item_matpal as $i) {
					$idetail = explode('#',$i);
					if(count($idetail)>1){
							if($idetail[2] == "AKTIF"){
								$status = 1;
							}
							else{
								$status = 0;
							}
							$detail_Matpal = array(

								'id_matpal'			=> $idetail[0],
								'nama_matpal'		=> $idetail[1],
								'id_bidang'			=> $id_bidang,
								'status'			=> $status,
								'recdate'			=> $recdate,
								'userid' 			=> $userid
								
							);
							$this->model->simpan_item_matpal($detail_Matpal);

					}
			}

		}
        else //update data
		{		
			// save data bidstudi
         	$this->model->update_data_bidstudi($id_bidang,$data_bidstudi);
			
			//save matapelajaran
			$this->model->delete_item_matpal($id_bidang);			
			$item_matpal  = explode(';',$item_matpal);
			foreach ($item_matpal as $i) {
					$idetail = explode('#',$i);
					if(count($idetail)>1){
							if($idetail[2] == "AKTIF"){
								$status = 1;
							}
							else{
								$status = 0;
							}
							$detail_Matpal = array(

								'id_matpal'			=> $idetail[0],
								'nama_matpal'		=> $idetail[1],
								'id_bidang'			=> $id_bidang,
								'status'			=> $status,
								'recdate'			=> $recdate,
								'userid' 			=> $userid
								
							);
							$this->model->simpan_item_matpal($detail_Matpal);

					}
			}
        }	    

			echo "true";
	}

	function get_data_bidstudi($id_bidang)
	{
		$id_bidang = urldecode($id_bidang);
		$data = $this->model->query_bidstudi($id_bidang);
    	echo json_encode($data);
	}

	function Delbidstudi($id_bidang)
	{
		$id_bidang = urldecode($id_bidang);
		$this->model->delete_bidstudi($id_bidang);
		$this->model->delete_item_matpal($id_bidang);
	}

	function get_data_matpal($id_bidang)
	{
		$data = $this->model->query_matpal($id_bidang);
    	echo json_encode($data);
		// var_dump($data);
		// exit;
	}

	function get_data_mata_pelajaran($id_matpal,$nama_matpal,$kategori)
	{
		$id_matpal = urldecode($id_matpal);
		$data = $this->model->query_mata_pelajaran($id_matpal,$nama_matpal,$kategori);
    	echo json_encode($data);
	}


}