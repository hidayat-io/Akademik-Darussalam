<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal_pelajaran extends IO_Controller
{

	public function __construct()
	{
			$modul = 20;
			parent::__construct($modul);
		 	$this->load->model('mjadwal_pelajaran','model');
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
		
		$vdata['title'] = 'JADWAL PELAJARAN';
	    $data['content'] = $this->load->view('vjadwal_pelajaran',$vdata,TRUE);
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_jadwal.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_jadwal.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

		     	$data[$i]->id_jadwal,
                 $data[$i]->nama,
  				$data[$i]->santri,
  				$data[$i]->deskripsi,
  				$data[$i]->semester,
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
		$this->excel->getActiveSheet()->setTitle('Master_jadwal_pelajaran');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master jadwal_pelajaran");
		$this->excel->getActiveSheet()->mergeCells('A1:C1');
		$this->excel->getActiveSheet()->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "Kode jadwal_pelajaran");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama jadwal_pelajaran");

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

		$filename='Master-jadwal_pelajaran.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function simpan_jadwal_pelajaran($status)
	{
		$id_jadwal 		= $this->input->post('id_jadwal');
		$nama  		        = $this->input->post('nama');
        $recdate            = date('y-m-d');
	    $userid 			= $this->session->userdata('logged_in')['uid'];

		$data_jadwal_pelajaran = array(
			'id_jadwal' 			=> $id_jadwal,
			'nama' 		            => $nama,
            'recdate'               => $recdate,
			'userid' 				=> $userid
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data jadwal_pelajaran
         	$this->model->simpan_data_jadwal_pelajaran($data_jadwal_pelajaran);

		}
        else //update data
		{		
			// save data jadwal_pelajaran
         	$this->model->update_data_jadwal_pelajaran($id_jadwal,$data_jadwal_pelajaran);
        }	    

			echo "true";
	}

	function get_data_jadwal_pelajaran($id_jadwal)
	{
        $id_jadwal = urldecode($id_jadwal);
		$data = $this->model->query_jadwal_pelajaran($id_jadwal);
    	echo json_encode($data);
	}

	function cek_duplicate_data($id_thn_ajar,$santri,$semester,$kode_kelas)
	{
        $id_thn_ajar 	= urldecode($id_thn_ajar);
        $santri 		= urldecode($santri);
        $semester 		= urldecode($semester);
        $kode_kelas 	= urldecode($kode_kelas);
		$data = $this->model->query_cek_duplicate_data($id_thn_ajar,$santri,$semester,$kode_kelas);
    	echo json_encode($data);
	}

	function Deljadwal_pelajaran($id_jadwal)
	{
		$id_jadwal = urldecode($id_jadwal);
		$this->model->delete_jadwal_pelajaran($id_jadwal);
	}

	function GetKurikulum($id_thn_ajar,$semester,$tingkat,$tipe_kelas)
	{
		$id_thn_ajar 	= urldecode($id_thn_ajar);
		$semester 		= urldecode($semester);
		$tingkat 		= urldecode($tingkat);
		$tipe_kelas 	= urldecode($tipe_kelas);
		if ($semester == 1)
		{
			$data = $this->model->QueryGetKurikulumSM1($id_thn_ajar,$tingkat,$tipe_kelas);
			
		}
		else if ($semester == 2)
		{
			$data = $this->model->QueryGetKurikulumSM2($id_thn_ajar,$tingkat,$tipe_kelas);
			
		}
		echo json_encode($data);
    	
	}
}

	

	