<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class mata_pelajaran extends IO_Controller
{

	public function __construct()
	{
			$modul = 26;
			parent::__construct($modul);
		 	$this->load->model('mmata_pelajaran','model');
	}

	function index()
	{
        //get ID BIDANG STUDI
			$hide_id_bidangstudi = $this->model->get_bidangstudi()->result();

			$vdata['id_bidangstudi'][NULL] = '-';
			foreach ($hide_id_bidangstudi as $b) {

				$vdata['id_bidangstudi'][$b->id_bidang."#".$b->nama_bidang]
					=$b->id_bidang." | ".$b->nama_bidang;
			}
		
		$vdata['title'] = 'DATA MATA PELAJARAN';
	    $data['content'] = $this->load->view('vmata_pelajaran',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->id_matpal)) $string_param .= " id_matpal LIKE '%".$param->id_matpal."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_matpal.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_matpal.'\')">
						<i class="fa fa-remove"></i>
					</a>';
         if ($data[$i]->status == 0){
            $status = 'TIDAK AKTIF';

        }else{
            $status = 'AKTIF';
        }
			
			$records["data"][] = array(

		     	$data[$i]->id_matpal,
				$data[$i]->nama_matpal,
  				$data[$i]->id_bidang,
  				$data[$i]->kategori,
				$status,
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
		$this->excel->getActiveSheet()->setTitle('MATA PELAJARAN');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master Data Mata Pelajaran");
		$this->excel->getActiveSheet()->mergeCells('A1:E1');
		$this->excel->getActiveSheet()->getStyle('A1:E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "ID Mata Pelajaran");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama Mata Pelajaran");
		$this->excel->getActiveSheet()->setCellValue('D3', "ID Bidang Studi");
		$this->excel->getActiveSheet()->setCellValue('E3', "Status");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){
                if ($row->status = 0){
                    $status = 'TIDAK AKTIF';
                }
                else{
                    $status = 'AKTIF';
                }
				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->id_matpal);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama_matpal);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->id_bidang);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $status);
				
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

		$filename='Master-mata_pelajaran.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function simpan_mata_pelajaran($status)
	{
		$id_matpal 		    = $this->input->post('id_matpal');
		$nama_matpal 		= $this->input->post('nama_matpal');
		$id_bidangstudi     = $this->input->post('id_bidangstudi');
		$statusmatpel	    = $this->input->post('status');
        $recdate            = date('y-m-d');
	    $userid 			= $this->session->userdata('logged_in')['uid'];

		$data_mata_pelajaran = array(
			'id_matpal' 			=> $id_matpal,
			'nama_matpal' 			=> $nama_matpal,
			'id_bidang'             => $id_bidangstudi,
			'status' 			    => $statusmatpel,
            'recdate'               => $recdate,
			'userid' 				=> $userid
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data mata_pelajaran
         	$this->model->simpan_data_mata_pelajaran($data_mata_pelajaran);

		}
        else //update data
		{		
			// save data mata_pelajaran
         	$this->model->update_data_mata_pelajaran($id_matpal,$data_mata_pelajaran);
        }	    

			echo "true";
	}

	function get_data_mata_pelajaran($id_matpal)
	{
		$id_matpal = urldecode($id_matpal);
		$data = $this->model->query_mata_pelajaran($id_matpal);
    	echo json_encode($data);
	}

	function Delmata_pelajaran($id_matpal)
	{
		$id_matpal = urldecode($id_matpal);
		$this->model->delete_mata_pelajaran($id_matpal);
	}


}

	

	