<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class ljadwalpelajaran extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 58;
			parent::__construct($this->modul);
			 $this->load->model('mljadwalpelajaran','model');
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
		$vdata['title'] = 'LAPORAN JADWAL PELAJARAN';
	    $data['content'] = $this->load->view('vljadwalpelajaran',$vdata,TRUE);
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


	function export_jadwal_pelajaran($id_thn_ajar,$santri,$semester){
       	//GET TAHUN AJAR
		$kurikulum = $this->model->get_kurikulum($id_thn_ajar);
        $thnajar = $kurikulum->deskripsi;


        $header_kelas= $this->model->get_kelas($id_thn_ajar);

		// $data_row= $this->model->get_data($id_thn_ajar,$kategori);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('JP '.$santri.' '.$thnajar);
		$this->excel->getActiveSheet()->setCellValue('A1', "JADWAL PELAJARAN ".$santri." TAHUN AJAR ".$thnajar." SEMESTER ".$semester);

	#regionheader1
        $this->excel->getActiveSheet()->setCellValue('A3', "HARI");
        $this->excel->getActiveSheet()->setCellValue('B3', "JAM");
		
			//data hari
			$colom_hari 	= 0;
			$row_hari		= 4;

			$colom_jam 		= 1;
			$row_jam		= 4;

			$hari			= array("SABTU","AHAD","SENIN","SELASA","RABU","KAMIS","JUMAT");
			$harilenght		=count($hari);
			for($x = 0; $x < $harilenght; $x++) {	
 			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($colom_hari,$row_hari, $hari[$x]);
			
			
			$jam			= array("I","II","III","IV","V","VI");
			$jamlenght		= count($jam);
					//data jam
					for($xjam = 0; $xjam < $jamlenght; $xjam++) {	
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($colom_jam,$row_jam, $jam[$xjam]);

						//data kelas array dan SM
						$col_kdkelas = 2;
						$col_cd = 3;

						$row = 3;
						
						foreach($header_kelas as $field_id => $field){
							$kode_kelas = $field->kode_kelas;
							$hari_data		= $hari[$x];
							$jam_data		= $jam[$xjam];
							
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_kdkelas, $row, $kode_kelas);
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_cd, $row, 'CD');
							$datarow= $this->model->mget_datarow($id_thn_ajar,$semester,$santri,$kode_kelas,$hari_data,$jam_data);
							foreach($datarow as $rowdatafield){
									if($rowdatafield->id_mapel ==''){
										$id_mapel = '-';
									}else{
										$id_mapel =$rowdatafield->id_mapel;
									}
									if($rowdatafield->no_reg ==''){
										$no_reg = '-';
									}else{
										$no_reg =$rowdatafield->no_reg;
									}
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_kdkelas, $row_jam, $id_mapel);
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_cd, $row_jam, $no_reg);
							
							}
						$col_kdkelas = $col_kdkelas+2;
						$col_cd = $col_cd+2;
						}
					$row_jam++;
					}
				$row_hari	=$row_hari	+6;
			}

		$col_cd=$col_cd-1;	
		$col_cd--;
		//----------------------Sytle merge untuk title
		$rowtitle = 0;
		$this->excel->getActiveSheet()->mergeCells($this->cellsByColRow($rowtitle,$col_cd,1));
		$fdate 	= "d-m-Y";

		

		$last_column = PHPExcel_Cell::stringFromColumnIndex($col_cd);
		
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
		$row_hari--;
		$this->excel->getActiveSheet()->getStyle('A3:'.$last_column.$row_hari)->applyFromArray($styleArray);

		$filename='JADWAL PELAJARAN '.$santri.' '.$thnajar.' '.$semester.'.xls'; //save our workbook as this file name
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

	

	