<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class lskurikulum extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 55;
			parent::__construct($this->modul);
			 $this->load->model('mlskurikulum','model');
			 $this->load->library("pdf");
	}

	function index()
	{
        //get kurikulum aktif
			$sys_param						= $this->kurikulum_aktif();
			$isys_param 					= explode('#',$sys_param);
			$id_thn_ajar					= $isys_param[0];
			$id_thn_ajar_value				= $this->model->get_kurikulum($id_thn_ajar);
			$idthnajaraktif					= $id_thn_ajar_value->id;
			$vdata['id_thn_ajar']			= $id_thn_ajar_value->id;
			$vdata['deskripsi']				= $id_thn_ajar_value->deskripsi;
			$vdata['semester_aktif']		= $isys_param[1];

		 //get Tahun Ajaran Data
			$select_thnajar= $this->model->get_thn_ajar()->result();
            
                        $vdata['kode_deskripsi'][NULL] = '';
                        foreach ($select_thnajar as $b) {
                            $vdata['kode_deskripsi'][$b->id]
                            =$b->deskripsi;
                        }
         //get Kelas
			$select_kelas= $this->mcommon->mget_list_tingkat()->result();
            
                        $vdata['kode_kelas'][NULL] = '';
                        foreach ($select_kelas as $b) {
            
							$vdata['kode_kelas'][$b->tingkat."#".$b->tipe_kelas]
							=$b->tingkat." | ".$b->tipe_kelas;
                        }
                        
		
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
		$vdata['title'] = 'Surat Permohonan';
	    $data['content'] = $this->load->view('vlskurikulum',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
    }
    
	function get_kurikulum($id_thn_ajar) {
		//GET TAHUN AJAR
		$kurikulum = $this->model->get_kurikulum($id_thn_ajar);
		
		return $kurikulum;
	}

	function cek_trans_kurikulum($id_thn_ajar,$kategori){
		$id_thn_ajar	= urldecode($id_thn_ajar);
		$kategori		= urldecode($kategori);
		$data			= $this->model->mcek_trans_kurikulum($id_thn_ajar,$kategori);
		// var_dump($data);
		// exit();
		echo json_encode($data);
	}

	function cprint_skurikulum_nontingkat($id_thn_ajar,$kategori,$tingkat){
       	//GET TAHUN AJAR
		$kurikulum = $this->model->get_kurikulum($id_thn_ajar);
        $thnajar = $kurikulum->deskripsi;


        $data_header= $this->model->mprint_skurikulum_utama_header($id_thn_ajar);

		$data_row= $this->model->mprint_skurikulum_utama_row($id_thn_ajar,$kategori);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('STRUKTUR '.$kategori.' '.$thnajar);
		$this->excel->getActiveSheet()->setCellValue('A1', "STRUKTUR KURIKULUM DAN ALOKASI WAKTU DI TMI PELAJARAN ".$kategori." ".$thnajar);
		// $this->excel->getActiveSheet()->mergeCells('A1:G1');
		// $this->excel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //header
        $this->excel->getActiveSheet()->setCellValue('A3', "NO");
            $this->excel->getActiveSheet()->mergeCells('A3:A5');
            // $this->excel->getActiveSheet()->getStyle('A3:A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('A3:A5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->setCellValue('B3', "BIDANG STUDI");
                    $this->excel->getActiveSheet()->mergeCells('B3:B5');
            // $this->excel->getActiveSheet()->getStyle('B3:B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('B3:B5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->setCellValue('C3', "MATA PELAJARAN");
                    $this->excel->getActiveSheet()->mergeCells('C3:C5');
            // $this->excel->getActiveSheet()->getStyle('C3:C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle('C3:C5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

           
		$i = 6;  
		$row_dtsm = 6;      
		if($data_row != null){

			foreach($data_row as $rowdt){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-5);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $rowdt->nama_bidang);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $rowdt->nama_matpal);
				
				$i++;

				//data kelas array dan SM
				$col = 3;
				$colmerge = 4;
				
				$col_sm1= 3;
				$col_sm2= 4;

				// $codtsm = 

				$row = 4;
				$row_sm = 5;
				
				$tipe_kelas = array('REGULER'=>'','INTENSIF'=>'INT');
				foreach($data_header as $field_id => $field){
					$data_field = $field->tingkat.' '.$tipe_kelas[$field->tipe_kelas];
					$dt_tingkat= $field->tingkat;
					$dt_tipe_kelas = $field->tipe_kelas;
					$dt_id_mapel = $rowdt->id_mapel;
					
					$datasm= $this->model->mget_datasm($id_thn_ajar,$dt_tingkat,$dt_tipe_kelas,$dt_id_mapel);
					foreach($datasm as $rowdatasm){
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $data_field);
						$this->excel->getActiveSheet()->mergeCells($this->cellsByColRow($col_sm1, $col_sm2,4));
						// $this->excel->getActiveSheet()->getStyle($col,$row,$col,$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						// $this->excel->getActiveSheet()->getStyle($col,$row,$col,$row)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_sm1, $row_sm, 'SM 1');
						// $this->excel->getActiveSheet()->getStyle($col_sm1,$row_sm,$col_sm1,$row_sm)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_sm2, $row_sm, 'SM 2');
						// $this->excel->getActiveSheet()->getStyle($col_sm2,$row_sm,$col_sm2,$row_sm)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						//bodydata
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_sm1, $row_dtsm, $rowdatasm->sm_1);
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_sm2, $row_dtsm, $rowdatasm->sm_2);
					
					
				}
				$col = $col+2;
				$col_sm1 = $col_sm1 + 2;
				$col_sm2 = $col_sm2 + 2;
				}
				// exit();
				$row_dtsm++;

			}
		}

		//header kelas
		$col--;
		$colkelas = 3;
		$rowkelas = 3;
		$rowtitle = 0;
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($colkelas, $rowkelas, 'KELAS');
			$this->excel->getActiveSheet()->mergeCells($this->cellsByColRow($colkelas,$col,3));
            // $this->excel->getActiveSheet()->getStyle($col,$colkelas,$col,$colkelas)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $this->excel->getActiveSheet()->getStyle($col,$colkelas,$col,$colkelas)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			//----------------------Sytle merge untuk title
			$this->excel->getActiveSheet()->mergeCells($this->cellsByColRow($rowtitle,$col,1));

			$fdate 	= "d-m-Y";

		

		$last_column = PHPExcel_Cell::stringFromColumnIndex($col);
		
		for($cols = 'A'; $cols <= $last_column; $cols++) {

		    $this->excel->getActiveSheet()
		        ->getColumnDimension($cols)
		        ->setAutoSize(true);
		}

		$styleArray = array(
		  'borders' => array(
		    'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		    )
		  )
		);	
		
		$style = array(//semua rata tengah
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				)
			);
			
		$this->excel->getDefaultStyle()->applyFromArray($style);
		$row_dtsm--;
		$this->excel->getActiveSheet()->getStyle('A3:'.$last_column.$row_dtsm)->applyFromArray($styleArray);
		

		$filename='STRUKTUR KURIKULUM DAN ALOKASI WAKTU DI TMI PELAJARAN '.$kategori.' '.$thnajar.'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	function cellsByColRow($start = -1, $end = -1, $row = -1){

		$merge = 'A1:A1';
		if($start>=0 && $end>=0 && $row>=0){
			$start = PHPExcel_Cell::stringFromColumnIndex($start);
			$end = PHPExcel_Cell::stringFromColumnIndex($end);
			$merge = "$start{$row}:$end{$row}";
		}
		return $merge;
	}
}

	

	