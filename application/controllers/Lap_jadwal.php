<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lap_jadwal extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 53;
			parent::__construct($this->modul);
			 $this->load->model('Mlap_jadwal','model');
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
			$select_kelas= $this->mcommon->mget_list_kelas()->result();
            
                        $vdata['kode_kelas'][NULL] = '';
                        foreach ($select_kelas as $b) {
            
							$vdata['kode_kelas'][$b->kode_kelas]
							=$b->kode_kelas." | ".$b->nama;
							// $vdata['kode_kelas'][$b->kode_kelas."#".$b->nama."#".$b->tingkat."#".$b->tipe_kelas]
							// =$b->nama." | ".$b->tingkat." | ".$b->tipe_kelas;
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
		$vdata['title'] = 'Laporan Jadwal Pengajar';
	    $data['content'] = $this->load->view('vlap_jadwal',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function print_rapor($action,$hide_Kurikulum,$semester,$id_kelas=0,$no_registrasi=0){
		//GET TAHUN AJAR
		$kurikulum = $this->model->get_kurikulum($hide_Kurikulum);
		$data['tahun_ajar'] = $kurikulum->deskripsi;
		$thnajar = $kurikulum->deskripsi;
		$data['semester'] = $semester;
		// var_dump($action);
		// exit();
		
		if ($action =='perkelas'){
			$data['data_bid_studi'] = $this->model->get_data_byidkelas($hide_Kurikulum,$semester,$id_kelas);
			// $data['data_bid_studi'] = 'ini perkelas';
		}elseif ($action =='pernoregister'){
			// $data['data_bid_studi'] = 'ini pernoregister' ;
			$data['data_bid_studi'] = $this->model->get_data_byidnoregistrasi($hide_Kurikulum,$semester,$no_registrasi);
			
		}
			// $data['data_bid_studi'] = $this->model->get_bid_studi();
			// $data['data_matpal'] = $this->model->get_matpal();
		$data['action']  = $action;
		// $filenameattc = "RAPOR TAHUN AJAR";
		$filenameattc = "RAPOR TAHUN AJAR $thnajar SEMESTER $semester";
		// var_dump($filenameattc);
		// exit();
		// $this->load->view('vPrintrapor');
		// $this->load->view('vPrintrapor',$data);
		// $this->pdf->load_view('vPrintrapor');
		$this->pdf->load_view('vPrintrapor',$data);
		$this->pdf->set_paper("A4", "potrait");
		$this->pdf->render();
		$this->pdf->stream("'$filenameattc'.pdf",array("Attachment"=>0));
	}

	function get_list_guru(){

		$data_guru = $this->mcommon->mget_list_guru();
    	echo json_encode($data_guru);

	}

		// menampilkan data ke dalam excel
	function excel_jadwal(){

		// hasil decode // 
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		//$str = $this->build_param($str);

		//$data= $this->Mlap_jadwal->get_list_data($str);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Report-Jadwal');
		$this->excel->getActiveSheet()->setCellValue('A1', "Report Jadwal Guru");
		$this->excel->getActiveSheet()->mergeCells('A1:L1');

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "JAM");
		$this->excel->getActiveSheet()->setCellValue('B3', "SABTU");
		$this->excel->getActiveSheet()->setCellValue('C3', "AHAD");
		$this->excel->getActiveSheet()->setCellValue('D3', "SENIN");
		$this->excel->getActiveSheet()->setCellValue('E3', "SELASA");
		$this->excel->getActiveSheet()->setCellValue('F3', "RABU");
		$this->excel->getActiveSheet()->setCellValue('G3', "KAMIS");
		$this->excel->getActiveSheet()->setCellValue('H3', "JUMAT");

		$fdate 	= "d-M-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){



			//	$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
			//	$this->excel->getActiveSheet()->setCellValue('B'.$i, io_date_format($row->tgl_infaq,$fdate));
			//	$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama_donatur);
			//	$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->alamat);
			//	$this->excel->getActiveSheet()->setCellValue('E'.$i, $tp);
			//	$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->nominal);
			//	$this->excel->getActiveSheet()->setCellValue('G'.$i, $row->keterangan); 
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'G'; $col++) {

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
		$cell_to = "G".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:G3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:G3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:G3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='report-Ifaq.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}



	function coba(){

    	$jam  = array('I','II','III','IV','V','VI');
    	$hari = array('SABTU','AHAD','SENIN','SELASA','RABU','KAMIS','JUMAT');

		$table = "<table border='1'>";
		$table .= "<tr><th>JAM / HARI</th>";

		foreach($hari as $hh){ $table.= "<th>$hh</th>"; }

		$table .= "</tr>";

		foreach($jam as $j){

			$table .= "<tr><td>$j</td>";

			foreach($hari as $h){

				$sql = " SELECT * FROM tjadwal WHERE hari='$h' AND jam='$j' ";
				$table .= "<td>$sql</td>";
			}

			$table .= "</tr>";
		}

		$table .= "</table>";

    	echo $table;
  	}


}

	

	