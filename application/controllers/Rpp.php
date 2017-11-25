<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class rpp extends IO_Controller
{

	public function __construct()
	{
			$modul = 22;
			parent::__construct($modul);
		 	$this->load->model('mrpp','model');
	}

	function index()
	{
        //get Tahun Ajaran Data
			$select_thnajar= $this->model->get_thn_ajar()->result();
            
                        $vdata['kode_deskripsi'][NULL] = '';
                        foreach ($select_thnajar as $b) {
            
                            $vdata['kode_deskripsi'][$b->id]
                            =$b->deskripsi;
                        }
        //get Kelas
			$select_kelas= $this->model->get_kelas()->result();
            
                        $vdata['kode_kelas'][NULL] = '';
                        foreach ($select_kelas as $b) {
            
							$vdata['kode_kelas'][$b->kode_kelas."#".$b->nama."#".$b->tingkat."#".$b->tipe_kelas]
							=$b->nama." | ".$b->tingkat." | ".$b->tipe_kelas;
                        }
        //get Mata Pelajaran
			$mt_pelajaran= $this->mcommon->mget_list_mata_pelajaran()->result();
            
                        $vdata['mat_pal'][NULL] = '';
                        foreach ($mt_pelajaran as $b) {
            
							$vdata['mat_pal'][$b->id_matpal]
							=$b->id_matpal." | ".$b->nama_matpal;
                        }
		
		$vdata['title'] 		= 'RPP';
	    $data['content'] 		= $this->load->view('vrpp',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->id_jadwal)) $string_param .= " id_jadwal LIKE '%".$param->id_jadwal."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_rpp.'\',\''.$data[$i]->kode_kelas.'\',\''.$data[$i]->tingkat.'\',\''.$data[$i]->tipe_kelas.'\',\''.$data[$i]->nama.'\',\''.$data[$i]->santri.'\',\''.$data[$i]->id_thn_ajar.'\',\''.$data[$i]->deskripsi.'\',\''.$data[$i]->semester.'\',\''.$data[$i]->id_mapel.'\')">
					<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_rpp.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

				$data[$i]->id_mapel,
				$data[$i]->deskripsi,
				$data[$i]->semester,
		     	$data[$i]->kode_kelas,
                $data[$i]->nama,
  				$data[$i]->santri,
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
		$this->excel->getActiveSheet()->setTitle('Master_rpp');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master rpp");
		$this->excel->getActiveSheet()->mergeCells('A1:C1');
		$this->excel->getActiveSheet()->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "Kode rpp");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama rpp");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->id_jadwal);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama);
				
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
		$cell_to = "C".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:C3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:C3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:C3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Master-rpp.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function simpan_rpp($status)
	{
		$id_rpp 			= $this->input->post('id_rpp_hide');
		$id_thn_ajar 		= $this->input->post('hide_Kurikulum');
		$semester  		    = $this->input->post('semester');
		$tingkat  		    = $this->input->post('tingkat');
		$tipe_kelas  		= $this->input->post('tipe_kelas');
		$kode_kelas  		= $this->input->post('kode_kelas');
		$santri  			= $this->input->post('santri');
		$mt_pelajaran 		= $this->input->post('mt_pelajaran');
		$recdate            = date('y-m-d');
	    $userid 			= $this->session->userdata('logged_in')['uid'];
		
		if($status == 'SAVE')// proses simpan
		{	
					
			if ($semester == 1)
			{
				$kolom_sm = $this->model->_GetRPPSM1Tambah($id_thn_ajar,$tingkat,$tipe_kelas,$santri,$kode_kelas,$mt_pelajaran);
				
			}
			else if ($semester == 2)
			{
				$kolom_sm = $this->model->_GetRPPSM2Tambah($id_thn_ajar,$tingkat,$tipe_kelas,$santri,$kode_kelas,$mt_pelajaran);
				
			}
			//#region save ke RPP HD
			$data_rpp = array(				
				'id_thn_ajar' 		=> $id_thn_ajar,
				'santri' 			=> $santri,
				'semester' 		    => $semester,
				'kode_kelas' 		=> $kode_kelas,
				'id_mapel' 		    => $mt_pelajaran,
				'recdate'           => $recdate,
				'userid' 			=> $userid
			);
			$id = $this->model->simpan_data_rpp($data_rpp);
			//#endregion save ke RPP HD
			// var_dump($id);
			// exit();
			$row = $kolom_sm;
			$ilength = count($kolom_sm);
				for($i=0;$i<$ilength;$i++)
				{
				
					$bulan 					= $row[$i]['bulan'];
					$minggu 				= $row[$i]['minggu'];
					$hari 					= $row[$i]['hari'];
					$hissos 				= $row[$i]['jam'];
					$value_materi_pokok 	= 'txt_mpokok'.$row[$i]['minggu'].$row[$i]['hari'].$i;
					$value_waktu 			= 'txt_waktu'.$row[$i]['minggu'].$row[$i]['hari'].$i;
					$value_tiu 				= 'txt_tiu'.$row[$i]['minggu'].$row[$i]['hari'].$i;
					$value_pr 				= 'txt_pr'.$row[$i]['minggu'].$row[$i]['hari'].$i;
					// var_dump($input_hari);
					// exit();
					$materi_pokok 			= $this->input->post($value_materi_pokok);
					$waktu 					= $this->input->post($value_waktu);
					$tiu 					= $this->input->post($value_tiu);
					$pr 					= $this->input->post($value_pr);
					$data_rpp_dt = array(
						'id_rpp' 			=> $id,
						'bulan' 			=> $bulan,
						'minggu' 			=> $minggu,
						'hari' 				=> $hari,
						'hissos' 			=> $hissos,
						'materi_pokok' 		=> $materi_pokok,
						'alokasi_waktu' 	=> $waktu,
						'TIU' 				=> $tiu,
						'jns_tagihan' 		=> $pr,

						
					);
					// var_dump($data_rpp_dt);
					// exit();
					$this->model->simpan_data_rpp_dt($data_rpp_dt);
						
					
				}
		}
		else // proses update
		{
				$kolom_sm_update = $this->model->QueryGetRPPSM($id_rpp);
				// var_dump($kolom_sm_update);
				// exit();
			// }
				$this->model->delete_rpp_dt($id_rpp);
				$row = $kolom_sm_update;
				$ilength = count($kolom_sm_update);
					for($i=0;$i<$ilength;$i++)
					{
						$bulan 					= $row[$i]['bulan'];
						$minggu 				= $row[$i]['minggu'];
						$hari 					= $row[$i]['hari'];
						$hissos 				= $row[$i]['hissos'];
						$value_materi_pokok 	= 'txt_mpokok'.$row[$i]['minggu'].$row[$i]['hari'].$i;
						$value_waktu 			= 'txt_waktu'.$row[$i]['minggu'].$row[$i]['hari'].$i;
						$value_tiu 				= 'txt_tiu'.$row[$i]['minggu'].$row[$i]['hari'].$i;
						$value_pr 				= 'txt_pr'.$row[$i]['minggu'].$row[$i]['hari'].$i;
						$materi_pokok 			= $this->input->post($value_materi_pokok);
						$waktu 					= $this->input->post($value_waktu);
						$tiu 					= $this->input->post($value_tiu);
						$pr 					= $this->input->post($value_pr);
						$data_rpp_dt = array(
							'id_rpp' 			=> $id_rpp,
							'bulan' 			=> $bulan,
							'minggu' 			=> $minggu,
							'hari' 				=> $hari,
							'hissos' 			=> $hissos,
							'materi_pokok' 		=> $materi_pokok,
							'alokasi_waktu' 	=> $waktu,
							'TIU' 				=> $tiu,
							'jns_tagihan' 		=> $pr,

							
						);
						// var_dump($data_rpp_dt);
						// exit();
						$this->model->simpan_data_rpp_dt($data_rpp_dt);
						
					}
		}
		echo "true";
		
		
	}

	// function get_data_rpp($kode_kelas,$santri,$id_thn_ajar,$semester,$id_mapel)
	// {
        // $kode_kelas 	= urldecode($kode_kelas);
		// $santri 		= urldecode($santri);
		// $id_thn_ajar 	= urldecode($id_thn_ajar);
		// $semester 		= urldecode($semester);
		// $id_mapel 		= urldecode($id_mapel);
		// $data = $this->model->query_rpp($kode_kelas,$santri,$id_thn_ajar,$semester,$id_mapel);
    	// echo json_encode($data);
	// }

	function cek_duplicate_data($id_thn_ajar,$santri,$semester,$kode_kelas,$mt_pelajaran)
	{
        $id_thn_ajar 	= urldecode($id_thn_ajar);
        $santri 		= urldecode($santri);
        $semester 		= urldecode($semester);
        $kode_kelas 	= urldecode($kode_kelas);
        $mt_pelajaran 	= urldecode($mt_pelajaran);
		$data = $this->model->query_cek_duplicate_data($id_thn_ajar,$santri,$semester,$kode_kelas,$mt_pelajaran);
    	echo json_encode($data);
	}

	function Delrpp($id_rpp)
	{
		$id_rpp 	= urldecode($id_rpp);
		$this->model->delete_rpp($id_rpp);
		$this->model->delete_rpp_dt($id_rpp);
	}

	function GetRPP($id_rpp)
	{
		$id_rpp 	= urldecode($id_rpp);
		// $semester 	= urldecode($semester);
		// if ($semester == 1)
		// {
			$data = $this->model->QueryGetRPPSM($id_rpp);
			
		// }
		// else if ($semester == 2)
		// {
		// 	$data = $this->model->QueryGetRPPSM2($id_rpp);
			
		// }
		// var_dump($data);
		// exit();
		echo json_encode($data);
    	
	}
	
	function GetRPPTambah($id_thn_ajar,$semester,$tingkat,$tipe_kelas,$santri,$kode_kelas,$mt_pelajaran)
	{
		$id_thn_ajar 	= urldecode($id_thn_ajar);
		$semester 		= urldecode($semester);
		$tingkat 		= urldecode($tingkat);
		$tipe_kelas 	= urldecode($tipe_kelas);
		$santri 		= urldecode($santri);
		$kode_kelas 	= urldecode($kode_kelas);
		$mt_pelajaran 	= urldecode($mt_pelajaran);
		if ($semester == 1)
		{
			$data = $this->model->_GetRPPSM1Tambah($id_thn_ajar,$tingkat,$tipe_kelas,$santri,$kode_kelas,$mt_pelajaran);
			
		}
		else if ($semester == 2)
		{
			$data = $this->model->_GetRPPSM2Tambah($id_thn_ajar,$tingkat,$tipe_kelas,$santri,$kode_kelas,$mt_pelajaran);
			
		}
		echo json_encode($data);
    	
	}
}