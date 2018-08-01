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
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	#regionheader1
        $this->excel->getActiveSheet()->setCellValue('A3', "HARI");
            // $this->excel->getActiveSheet()->mergeCells('A3:A5');
            $this->excel->getActiveSheet()->getStyle('A3:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('A3:A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->excel->getActiveSheet()->setCellValue('B3', "JAM");
                    // $this->excel->getActiveSheet()->mergeCells('B3:B5');
            $this->excel->getActiveSheet()->getStyle('B3:B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('B3:B3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
        // $this->excel->getActiveSheet()->setCellValue('A4', "SABTU");
        //             $this->excel->getActiveSheet()->mergeCells('A4:A9');
        //     $this->excel->getActiveSheet()->getStyle('A4:A10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //     $this->excel->getActiveSheet()->getStyle('A4:A10')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $this->excel->getActiveSheet()->setCellValue('B4', "I");
        //     $this->excel->getActiveSheet()->getStyle('B4:B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->getStyle('B4:B4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $this->excel->getActiveSheet()->setCellValue('B5', "II");
        //     $this->excel->getActiveSheet()->getStyle('B5:B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->getStyle('B5:B5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $this->excel->getActiveSheet()->setCellValue('B6', "III");
        //     $this->excel->getActiveSheet()->getStyle('B6:B6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->getStyle('B6:B6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $this->excel->getActiveSheet()->setCellValue('B7', "IV");
        //     $this->excel->getActiveSheet()->getStyle('B7:B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->getStyle('B7:B7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $this->excel->getActiveSheet()->setCellValue('B8', "V");
        //     $this->excel->getActiveSheet()->getStyle('B8:B8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->getStyle('B8:B8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        // $this->excel->getActiveSheet()->setCellValue('B9', "VI");
        //     $this->excel->getActiveSheet()->getStyle('B9:B9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->getStyle('B9:B9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
		// 	$this->excel->getActiveSheet()->setCellValue('A10', "AHAD");
		// 	$this->excel->getActiveSheet()->mergeCells('A10:A15');
        //     $this->excel->getActiveSheet()->getStyle('A10:A15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->getStyle('A10:A15')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->setCellValue('B10', "I");
		// 		$this->excel->getActiveSheet()->getStyle('B10:B10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->getStyle('B10:B10')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->setCellValue('B11', "II");
		// 		$this->excel->getActiveSheet()->getStyle('B11:B11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->getStyle('B11:B11')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->setCellValue('B12', "III");
		// 		$this->excel->getActiveSheet()->getStyle('B12:B12')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->getStyle('B12:B12')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->setCellValue('B13', "IV");
		// 		$this->excel->getActiveSheet()->getStyle('B13:B13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->getStyle('B13:B13')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->setCellValue('B14', "V");
		// 		$this->excel->getActiveSheet()->getStyle('B14:B14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->getStyle('B14:B14')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 	$this->excel->getActiveSheet()->setCellValue('B15', "VI");
		// 		$this->excel->getActiveSheet()->getStyle('B15:B15')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->getStyle('B15:B15')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				
		// 		$this->excel->getActiveSheet()->setCellValue('A16', "SENIN");
		// 		$this->excel->getActiveSheet()->mergeCells('A16:A21');
		// 		$this->excel->getActiveSheet()->getStyle('A16:A21')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->getStyle('A16:A21')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->setCellValue('B16', "I");
		// 			$this->excel->getActiveSheet()->getStyle('B16:B16')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('B16:B16')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->setCellValue('B17', "II");
		// 			$this->excel->getActiveSheet()->getStyle('B17:B17')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('B17:B17')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->setCellValue('B18', "III");
		// 			$this->excel->getActiveSheet()->getStyle('B18:B18')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('B18:B18')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->setCellValue('B19', "IV");
		// 			$this->excel->getActiveSheet()->getStyle('B19:B19')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('B19:B19')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->setCellValue('B20', "V");
		// 			$this->excel->getActiveSheet()->getStyle('B20:B20')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('B20:B20')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 		$this->excel->getActiveSheet()->setCellValue('B21', "VI");
		// 			$this->excel->getActiveSheet()->getStyle('B21:B21')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('B21:B21')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
					
		// 			$this->excel->getActiveSheet()->setCellValue('A22', "SELASA");
        //             $this->excel->getActiveSheet()->mergeCells('A22:A27');
		// 			$this->excel->getActiveSheet()->getStyle('A22:A27')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('A22:A27')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B22', "I");
		// 				$this->excel->getActiveSheet()->getStyle('B22:B22')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B22:B22')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B23', "II");
		// 				$this->excel->getActiveSheet()->getStyle('B23:B23')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B23:B23')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B24', "III");
		// 				$this->excel->getActiveSheet()->getStyle('B24:B24')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B24:B24')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B25', "IV");
		// 				$this->excel->getActiveSheet()->getStyle('B25:B25')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B25:B25')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B26', "V");
		// 				$this->excel->getActiveSheet()->getStyle('B26:B26')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B26:B26')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B27', "VI");
		// 				$this->excel->getActiveSheet()->getStyle('B27:B27')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B27:B27')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


		// 			$this->excel->getActiveSheet()->setCellValue('A28', "RABU");
        //             $this->excel->getActiveSheet()->mergeCells('A28:A33');
		// 			$this->excel->getActiveSheet()->getStyle('A28:A33')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('A28:A33')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B28', "I");
		// 				$this->excel->getActiveSheet()->getStyle('B28:B28')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B28:B28')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B29', "II");
		// 				$this->excel->getActiveSheet()->getStyle('B29:B29')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B29:B29')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B30', "III");
		// 				$this->excel->getActiveSheet()->getStyle('B30:B30')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B30:B30')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B31', "IV");
		// 				$this->excel->getActiveSheet()->getStyle('B31:B31')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B31:B31')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B32', "V");
		// 				$this->excel->getActiveSheet()->getStyle('B32:B32')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B32:B32')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B33', "VI");
		// 				$this->excel->getActiveSheet()->getStyle('B33:B33')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B33:B33')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


		// 			$this->excel->getActiveSheet()->setCellValue('A34', "KAMIS");
        //             $this->excel->getActiveSheet()->mergeCells('A34:A39');
		// 			$this->excel->getActiveSheet()->getStyle('A34:A39')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('A34:A39')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B34', "I");
		// 				$this->excel->getActiveSheet()->getStyle('B34:B34')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B34:B34')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B35', "II");
		// 				$this->excel->getActiveSheet()->getStyle('B35:B35')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B35:B35')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B36', "III");
		// 				$this->excel->getActiveSheet()->getStyle('B36:B36')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B36:B36')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B37', "IV");
		// 				$this->excel->getActiveSheet()->getStyle('B37:B37')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B37:B37')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B38', "V");
		// 				$this->excel->getActiveSheet()->getStyle('B38:B38')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B38:B38')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B39', "VI");
		// 				$this->excel->getActiveSheet()->getStyle('B39:B39')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B39:B39')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					

		// 			$this->excel->getActiveSheet()->setCellValue('A40', "JUMAT");
        //             $this->excel->getActiveSheet()->mergeCells('A40:A45');
		// 			$this->excel->getActiveSheet()->getStyle('A40:A45')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->getStyle('A40:A45')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B40', "I");
		// 				$this->excel->getActiveSheet()->getStyle('B40:B40')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B40:B40')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B41', "II");
		// 				$this->excel->getActiveSheet()->getStyle('B41:B41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B41:B41')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B42', "III");
		// 				$this->excel->getActiveSheet()->getStyle('B42:B42')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B42:B42')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B43', "IV");
		// 				$this->excel->getActiveSheet()->getStyle('B43:B43')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B43:B43')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B44', "V");
		// 				$this->excel->getActiveSheet()->getStyle('B44:B44')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B44:B44')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 			$this->excel->getActiveSheet()->setCellValue('B45', "VI");
		// 				$this->excel->getActiveSheet()->getStyle('B45:B45')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		// 				$this->excel->getActiveSheet()->getStyle('B45:B45')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					
	#endregion header1
           
			//data hari
			$colom_hari 	= 0;
			$row_hari		= 4;

			$colom_jam 		= 1;
			$row_jam		= 4;

			$hari			= array("SABTU","AHAD","SENIN","SELASA","RABU","KAMIS","JUMAT");
			$harilenght		=count($hari);
			for($x = 0; $x < $harilenght; $x++) {	
 			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($colom_hari,$row_hari, $hari[$x]);
            // $this->excel->getActiveSheet()->mergeCells($colom_hari.$row_hari);
            $this->excel->getActiveSheet()->getStyle()->getAlignment($colom_hari,$row_hari)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle()->getAlignment($colom_hari,$row_hari)->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			
			
			$jam			= array("I","II","III","IV","V","VI");
			$jamlenght		= count($jam);
					//data jam
					for($xjam = 0; $xjam < $jamlenght; $xjam++) {	
						$this->excel->getActiveSheet()->setCellValueByColumnAndRow($colom_jam,$row_jam, $jam[$xjam]);
						$this->excel->getActiveSheet()->getStyle()->getAlignment($colom_jam,$row_jam,$colom_jam,$row_jam)->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$this->excel->getActiveSheet()->getStyle()->getAlignment($colom_jam,$row_jam,$colom_jam,$row_jam)->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

						//data kelas array dan SM
						$col_kdkelas = 2;
						$col_cd = 3;

						$row = 3;
						
						foreach($header_kelas as $field_id => $field){
							$kode_kelas = $field->kode_kelas;
							$hari_data		= $hari[$x];
							$jam_data		= $jam[$xjam];
							
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_kdkelas, $row, $kode_kelas);
							$this->excel->getActiveSheet()->getStyle($col_kdkelas,$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_cd, $row, 'CD');
							$this->excel->getActiveSheet()->getStyle($col_cd,$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
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
							$this->excel->getActiveSheet()->getStyle($col_kdkelas, $row_jam)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_cd, $row_jam, $no_reg);
							$this->excel->getActiveSheet()->getStyle($col_cd, $row_jam)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
							
							}
						$col_kdkelas = $col_kdkelas+2;
						$col_cd = $col_cd+2;
						}
					$row_jam++;
					}
				$row_hari	=$row_hari	+6;
			}

   
		$fdate 	= "d-m-Y";

		

		// for($col = 'A'; $col !== 'G'; $col++) {

		//     $this->excel->getActiveSheet()
		//         ->getColumnDimension($col)
		//         ->setAutoSize(true);
		// }

		$styleArray = array(
		  'borders' => array(
		    'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		    )
		  )
		);
		// $i = $i-1;
		// $cell_to = "G".$i;
		// $this->excel->getActiveSheet()->getStyleByColumnAndRow($col.$row)->applyFromArray($styleArray);
		// $this->excel->getActiveSheet()->getStyle('A1:G3')->getFont()->setBold(true);
		// $this->excel->getActiveSheet()->getStyle('A3:G3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		// $this->excel->getActiveSheet()->getStyle('A3:G3')->getFill()->getStartColor()->setRGB('2CC30B');

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

}

	

	