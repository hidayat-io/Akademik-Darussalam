<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class bebankerja extends IO_Controller
{

	public function __construct() {
			$modul = 17;
			parent::__construct($modul);
		 	$this->load->model('mbebankerja','model');
	}

	function index() {
		//get kurikulum aktif
		$sys_param						= $this->kurikulum_aktif();
		$isys_param 					= explode('#',$sys_param);
		$id_thn_ajar					= $isys_param[0];
		$id_thn_ajar_value				= $this->model->get_kurikulum($id_thn_ajar);
			// var_dump($id_thn_ajar_value);
			// exit();
		$vdata['thn_ajar_aktif']		= $id_thn_ajar_value->deskripsi;
		$vdata['semester_aktif']		= $isys_param[1];

       	$vdata['title'] = 'BEBAN KERJA';
	    $data['content'] = $this->load->view('vbebankerja',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function jumlah_beban($id_guru,$thn_ajar_aktif,$semester_aktif) {
		$data_guru			= $this->model->get_jumlah_beban($id_guru,$thn_ajar_aktif,$semester_aktif);
		$jml_data			= count($data_guru);
		// var_dump($jml_data);
		// exit();
		
		return $jml_data;
	}

	function build_param($param) {        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->nama_lengkap)) $string_param .= " nama_lengkap LIKE '%".$param->nama_lengkap."%' ";
		}

		return $string_param;
	}

	function load_grid() {
		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];
		$semester_aktif		= $isys_param[1];

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];


		$data 				= $this->model->get_list_data($string_param,$sort_by,$sort_type,$thn_ajar_aktif,$semester_aktif);
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_guru.'\')">
						<i class="fa fa-edit"></i>
					</a>';
			$limit_beban = $data[$i]->jml_beban;
					if($limit_beban == null)
					{
						$limit_beban = '';
					}
					else {
						$limit_beban = $data[$i]->jml_beban;
					}
			//get jml beban dari trans_jadwalpelajaran
			$id_guru	= $data[$i]->id_guru;
			$jml_beban 	= $this->jumlah_beban($id_guru,$thn_ajar_aktif,$semester_aktif);

			$records["data"][] = array(
				$data[$i]->no_reg,
				$data[$i]->nama_lengkap,
				$data[$i]->materi_diampu,
				$limit_beban,
				$jml_beban,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function get_data_bebankerja_byID($id_guru) {
		//get thn ajar dan semester aktif
		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];
		$semester_aktif		= $isys_param[1];

		$data 				= $this->model->query_get_bebankerja($id_guru,$thn_ajar_aktif,$semester_aktif);
		// var_dump($id_guru);
		// exit();
		echo json_encode($data);
		

	}

	function simpan_bebankerja($status) {
		//get thn ajar dan semester aktif
		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];
		$semester_aktif		= $isys_param[1];

		$id_guru 			= $this->input->post('id_guru');
		$jml_beban 			= $this->input->post('jml_beban');
		$id_thn_ajar		= $thn_ajar_aktif;
		$semester			= $semester_aktif;
		$userid 			= $this->session->userdata('logged_in')['uid'];

		$data = array(
			'id_guru' 			=> $id_guru,
			'jml_beban' 		=> $jml_beban,
			'id_thn_ajar' 		=> $id_thn_ajar,
			'semester' 			=> $semester,
			'userid' 			=> $userid
		);
		
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data bebankerja
			$this->model->simpan_data($data);

		}
		else //update data
		{		
			// save data bebankerja
			$this->model->update_data($id_guru,$thn_ajar_aktif,$semester,$data);
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
		$data = $this->model->get_list_data($str);
		// echo "$this->model->get_list_data($str,$thn_ajar_aktif,$semester_aktif)";
		// var_dump ($data);
		// exit();
		
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Master_Soal');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master Beban Guru");
		$this->excel->getActiveSheet()->mergeCells('A1:F1');
		$this->excel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "No Registrasi");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama Lengkap");
		$this->excel->getActiveSheet()->setCellValue('D3', "Materi Yang Diampu");
		$this->excel->getActiveSheet()->setCellValue('E3', "Limit Beban");
		$this->excel->getActiveSheet()->setCellValue('F3', "Jumlah beban");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){
				$limit_beban = $row->jml_beban;
					if($limit_beban == null)
					{
						$limit_beban = '';
					}
					else {
						$limit_beban = $row->jml_beban;
					}
				//get jml beban dari trans_jadwalpelajaran
				$id_guru	= $row->id_guru;
				$jml_beban 	= $this->jumlah_beban($id_guru,$thn_ajar_aktif,$semester_aktif);

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->no_reg);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama_lengkap);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->materi_diampu);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $limit_beban);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $jml_beban);
				
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




}