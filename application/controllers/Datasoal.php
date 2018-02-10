<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class datasoal extends IO_Controller
{

	public function __construct()
	{
			$modul = 41;
			parent::__construct($modul);
		 	$this->load->model('mdatasoal','model');
	}

	function index()
	{
       //get Mata Pelajaran
			$mt_pelajaran= $this->mcommon->mget_list_mata_pelajaran()->result();
            
                        $vdata['mat_pal'][NULL] = '';
                        foreach ($mt_pelajaran as $b) {
            
							$vdata['mat_pal'][$b->id_matpal]
							=$b->id_matpal." | ".$b->nama_matpal;
                        }
		
		$vdata['title'] = 'DATA SOAL';
	    $data['content'] = $this->load->view('vdatasoal',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->id_matpal)) $string_param .= " ms_banksoal.id_matpal LIKE '%".$param->id_matpal."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_soal.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_soal.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			$idnama_matpal = $data[$i]->id_matpal.'-'.$data[$i]->nama_matpal;
			$records["data"][] = array(
		     	$idnama_matpal,
				$data[$i]->tingkat,
				$data[$i]->soal,
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
		$this->excel->getActiveSheet()->setTitle('Master_Soal');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master SOAL");
		$this->excel->getActiveSheet()->mergeCells('A1:I1');
		$this->excel->getActiveSheet()->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "ID Mata Pelajaran");
		$this->excel->getActiveSheet()->setCellValue('C3', "Tingkat");
		$this->excel->getActiveSheet()->setCellValue('D3', "Soal");
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
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->soal);
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

		$filename='Master-Soal.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function simpan_datasoal($status)
	{
		$kode_datasoal 			= $this->input->post('kode_datasoal');
		$id_matpal 				= $this->input->post('id_matpal');
		$tingkat  				= $this->input->post('tingkat');
		$soal  					= $this->input->post('soal');
		$jawaban_a 				= $this->input->post('jawaban_a');
		$jawaban_b 				= $this->input->post('jawaban_b');
		$jawaban_c 				= $this->input->post('jawaban_c');
		$jawaban_d 				= $this->input->post('jawaban_d');
		$jawab_benar 			= $this->input->post('jawab_benar');
	    $userid 				= $this->session->userdata('logged_in')['uid'];
        $recdate        		= date('y-m-d');

		$data_datasoal = array(
			'id_soal' 			=> $kode_datasoal,
			'id_matpal' 		=> $id_matpal,
			'tingkat' 		    => $tingkat,
			'soal' 		    	=> $soal,
			'jwb_a' 			=> $jawaban_a,
			'jwb_b' 			=> $jawaban_b,
			'jwb_c' 			=> $jawaban_c,
			'jwb_d' 			=> $jawaban_d,
			'jwb_benar' 		=> $jawab_benar,
            'recdate'           => $recdate,
			'userid' 			=> $userid
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data datasoal
         	$this->model->simpan_data_datasoal($data_datasoal);

		}
        else //update data
		{		
			// save data datasoal
         	$this->model->update_data_datasoal($kode_datasoal,$data_datasoal);
        }	    

			echo "true";
	}

	function get_data_datasoal($id_matpal,$tingkat)
	{
		$id_matpal = urldecode($id_matpal);
		$tingkat = urldecode($tingkat);
		$data = $this->model->query_datasoal($id_matpal,$tingkat);
    	echo json_encode($data);
	}
	function get_data_datasoal_byid($id_soal)
	{
		$id_soal = urldecode($id_soal);
		$data = $this->model->query_get_datasoal($id_soal);
    	echo json_encode($data);
	}

	function Deldatasoal($kode_datasoal)
	{
		$kode_datasoal = urldecode($kode_datasoal);
		$this->model->delete_datasoal($kode_datasoal);
	}


}

	

	