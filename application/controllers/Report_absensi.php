<?php defined('BASEPATH') OR exit('No direct script access allowed');

// <!-- بسم الله الرحمن الرحیم -->

class Report_absensi extends IO_Controller
{

	public function __construct()
	{
		$this->modul = 60;
		parent::__construct($this->modul);
		$this->load->model('mreport_absen','model');
		$this->load->library("pdf");

		$this->ptahun_ajar 	= '';
		$this->pkurikulum  	= '';
		$this->psemester 	= '';
		$this->pkelas 	 	= '';
		$this->ptgl_absen1 	= '';
		$this->ptgl_absen2 	= '';
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
        
		foreach ($select_thnajar as $b) {
			$vdata['kode_deskripsi'][$b->id]
			=$b->deskripsi;
		}

        //get Kelas
		$select_kelas= $this->mcommon->mget_list_kelas()->result();
            
		$vdata['kode_kelas'][NULL] = '- Semua Kelas -';
		foreach ($select_kelas as $b) {

			$vdata['kode_kelas'][$b->kode_kelas] = $b->nama.' - '.$b->tipe_kelas;
		}

        //get santri
		$select_santri= $this->mcommon->query_list_santri();
            
		$vdata['select_santri'][NULL] = '- Semua Santri -';
		foreach ($select_santri as $s) {

			$vdata['select_santri'][$s->no_registrasi] = $s->no_registrasi." - ".$s->nama_lengkap;
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
		$vdata['title'] = 'REPORT ABSENSI';
	    $data['content'] = $this->load->view('vReport_absensi',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}


	function unduh($str_param){

		$iparam = json_decode(base64_decode($str_param));
		$this->build_param($iparam);

		//load our new PHPExcel library
		$this->load->library('excel');

		$data_kelas = $this->model->get_list_kelas($this->pkelas);
		
		$i = 0;
		foreach($data_kelas as $kl){
			
			//buat sheet baru
			if($i>0) $this->excel->createSheet($i);

			//activate worksheet number 1
			$this->excel->setActiveSheetIndex($i);
			//name the worksheet
			$this->excel->getActiveSheet()->setTitle($kl->nama.'-'.substr($kl->tipe_kelas,0,3));
			
			//Begin HEADER
			$this->excel->getActiveSheet()->setCellValue('A2', "No.");
			$this->excel->getActiveSheet()->mergeCells('A2:A3');
			$this->excel->getActiveSheet()->getStyle('A2:A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A2:A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$this->excel->getActiveSheet()->setCellValue('B2', "No.Reg");
			$this->excel->getActiveSheet()->mergeCells('B2:B3');
			$this->excel->getActiveSheet()->getStyle('B2:B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('B2:B3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$this->excel->getActiveSheet()->setCellValue('C2', "Nama.");
			$this->excel->getActiveSheet()->mergeCells('C2:C3');
			$this->excel->getActiveSheet()->getStyle('C2:C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('C2:C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

			$this->excel->getActiveSheet()->setCellValue('D2', "Jumlah.");
			$this->excel->getActiveSheet()->setCellValue('D3', "H");
			$this->excel->getActiveSheet()->setCellValue('E3', "S");
			$this->excel->getActiveSheet()->setCellValue('F3', "I");
			$this->excel->getActiveSheet()->setCellValue('G3', "A");
			$this->excel->getActiveSheet()->mergeCells('D2:G2');
			$this->excel->getActiveSheet()->getStyle('D2:G3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('D2:G3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			//END Header

			//Begin Data Santri
			$santri = $this->model->get_list_santri($kl->kode_kelas);

			if($santri->num_rows()>0){

				$no 		= 1;
				$row		= 4;

				foreach($santri->result() as $s){

					$this->excel->getActiveSheet()->setCellValue('A'.$row, $no);
					$this->excel->getActiveSheet()->setCellValue('B'.$row, $s->no_registrasi);
					$this->excel->getActiveSheet()->setCellValue('C'.$row, $s->nama_lengkap);
					
					//BEGIN detail absensi
					$a_param = '';
					if($this->ptgl_absen1!='') $a_param = " AND abh.tgl_absensi BETWEEN '".$this->ptgl_absen1."' AND '".$this->ptgl_absen2."' ";
					$data_absen = $this->model->mget_data_absensi($s->no_registrasi,$a_param);
					$col_absen 	= 7;
					if($data_absen->num_rows()>0){

						$absen_ke 	= 1;
						$ah = $as = $ai = $aa = 0;
						foreach($data_absen->result() as $a){

							$col_start 	= $col_absen;
							$col_end 	= $col_absen+3;
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,2, date('d-M-y',strtotime($a->tgl_absensi)));
							$this->excel->getActiveSheet()->mergeCells($this->cellsByColRow($col_absen,$col_end,2));

							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,3, 'H');
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,$row, $a->absensi=='h'?1:'');
							$col_absen++;
							
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,3, 'S');
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,$row, $a->absensi=='s'?1:'');
							$col_absen++;

							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,3, 'I');
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,$row, $a->absensi=='i'?1:'');
							$col_absen++;

							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,3, 'A');
							$this->excel->getActiveSheet()->setCellValueByColumnAndRow($col_absen,$row, $a->absensi=='a'?1:'');
							$col_absen++;

							//simpan jumlah absensi
							if($a->absensi=='h') $ah++;
							if($a->absensi=='s') $as++;
							if($a->absensi=='i') $ai++;
							if($a->absensi=='a') $aa++;

							$icolor 		= $absen_ke % 2 == 0?'b3e7fc':'e6ff82';
							$strcol_start 	= PHPExcel_Cell::stringFromColumnIndex($col_start);
							$strcol_end 	= PHPExcel_Cell::stringFromColumnIndex($col_end);
							$this->excel->getActiveSheet()->getStyle($strcol_start.'2:'.$strcol_end.$row)->getFill()->getStartColor()->setRGB($icolor);
							$this->excel->getActiveSheet()->getStyle($strcol_start.'2:'.$strcol_end.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

							$absen_ke++;
						}

						$this->excel->getActiveSheet()->setCellValue('D'.$row, $ah);
						$this->excel->getActiveSheet()->setCellValue('E'.$row, $as);
						$this->excel->getActiveSheet()->setCellValue('F'.$row, $ai);
						$this->excel->getActiveSheet()->setCellValue('G'.$row, $aa);
					}					
					//END detail absensi

					$row++;
					$no++;
				}
			}
			//End Data Santri

			$col_absen--;
			$last_column = PHPExcel_Cell::stringFromColumnIndex($col_absen);
			
			for($col = 'A'; $col <= $last_column; $col++) {

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


			$row--;
			
			$this->excel->getActiveSheet()->getStyle('A2:G3')->getFill()->getStartColor()->setRGB('E0E0E0');
			$this->excel->getActiveSheet()->getStyle('A2:G3')->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle('A2:'.$last_column.$row)->applyFromArray($styleArray);
			
			$this->excel->getActiveSheet()->getStyle('A2:'.$last_column.$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
			

			$i++;
		}		

		// $this->excel->getActiveSheet()->getStyleByColumnAndRow($col.$row)->applyFromArray($styleArray);
		// $this->excel->getActiveSheet()->getStyle('A1:G3')->getFont()->setBold(true);
		// $this->excel->getActiveSheet()->getStyle('A3:G3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		// $this->excel->getActiveSheet()->getStyle('A3:G3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='unduh.xls'; //save our workbook as this file name
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

	function build_param($param){

		$string_param = " WHERE is_delete = '0' ";
		
		if($param!=null){

			foreach ($param as $p) {
			
				$key = $p->name;
				$val = $p->value;

				switch ($key) {
					
					case "select_thnajar":

						if($val!=""){

							$this->ptahun_ajar = $val;
						}
						break;

					case "hide_Kurikulum":

						if($val!=""){

							$this->pkurikulum = $val;
						}
						break;

					case "semester":

						if($val!=""){

							$this->psemester = $val;
						}
						break;

					case "select_kelas":
					
						if($val!=""){

							$this->pkelas = $val;
						}
						break;

					case "dtp_absen_mulai":

						if($val!=""){

							$idate = io_return_date('d-m-Y',$val);

							$this->ptgl_absen1 = $idate;
						}
						break;

					case "dtp_absen_akhir":

						if($val!=""){

							$idate = io_return_date('d-m-Y',$val);

							$this->ptgl_absen2 = $idate;
						}
						break;
				}
			}
		}

		return $string_param;
	}
}