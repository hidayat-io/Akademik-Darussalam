<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class Kurikulum extends IO_Controller
{

	public function __construct()
	{
			$modul = 19;
			parent::__construct($modul);
		 	$this->load->model('mkurikulum','model');
	}

	function index()
	{
        //get Tahun Ajaran Data
			$select_thnajar= $this->model->get_thn_ajar()->result();

			$vdata['kode_deskripsikelas'][NULL] = '';
			foreach ($select_thnajar as $b) {

				$vdata['kode_deskripsikelas'][$b->id]
				=$b->deskripsi;
			}

		//get isi header table
		$vdata['headertablekurikulum'] = $this->model->get_headertable_kurikulum();

		//get isi body table
		$vdata['bodytablekurikulum'] = $this->model->get_bodytable_kurikulum();
		
		$vdata['title'] = 'KURIKULUM UTAMA';
	    $data['content'] = $this->load->view('vkurikulum',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->id_thn_ajar)) $string_param .= " and b.deskripsi LIKE '%".$param->id_thn_ajar."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_thn_ajar.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_thn_ajar.'\')">
						<i class="fa fa-remove"></i>
					</a>';
   			
			$records["data"][] = array(

		     	$data[$i]->id_thn_ajar,
		     	$data[$i]->deskripsi,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function build_param_kurikulum($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->id_thn_ajar)) $string_param .= " a.id_bidang LIKE '%".$param->id_bidang."%' ";
		}

		return $string_param;
	}

	function AddKurikulum()
	{
		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param_kurikulum($iparam);
		
		//sorting
		// $sort_by 		= $_REQUEST['order'][0]['column'];
		// $sort_type 		= $_REQUEST['order'][0]['dir'];
		// var_dump($_REQUEST['order']);
		// exit();


		$data 				= $this->model->get_list_data_kurikulum($string_param);
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
			$idname = $i+1;
			$input = '<input type="text" class="form-control" placeholder="BOBOT NILAI"'.$idname.' name="sm_1" id="sm_1" style="width:80px" required></div>';
			$input2 = '<input type="text" class="form-control" placeholder="BOBOT NILAI"'.$idname.' name="sm_2" id="sm_2" style="width:80px" required></div>';
   			
			$records["data"][] = array(
				$i+1,
		     	$data[$i]->nama_bidang,
				$data[$i]->nama_matpal,
                $input,
				$input2
		   );
		
		}

		// $records["draw"]            	= $sEcho;
		// $records["recordsTotal"]    	= $iTotalRecords;
		// $records["recordsFiltered"] 	= $iTotalRecords;

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
		$this->excel->getActiveSheet()->setTitle('KURIKULUM');
		$this->excel->getActiveSheet()->setCellValue('A1', "DATA KURIKULUM");
		$this->excel->getActiveSheet()->mergeCells('A1:F1');
		$this->excel->getActiveSheet()->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "ID Tahun Ajar");
		$this->excel->getActiveSheet()->setCellValue('C3', "Kode Kelas");
		$this->excel->getActiveSheet()->setCellValue('D3', "ID Mata Pelajaran");
		$this->excel->getActiveSheet()->setCellValue('E3', "SM 1");
		$this->excel->getActiveSheet()->setCellValue('F3', "SM 2");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){
				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->id_thn_ajar);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->tingkat);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->id_mapel);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $row->sm_1);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->sm_2);
				
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

		$filename='kurikulum.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function simpan_kurikulum($status)
	{
		$headertablekurikulum = $this->model->get_headertable_kurikulum();
		$bodytablekurikulum = $this->model->get_bodytable_kurikulum();
		// var_dump($headertablekurikulum);
		// 		return false;
		foreach ($headertablekurikulum as $rowheader) { 
			$sequence = 0;
			foreach ($bodytablekurikulum as $rowbody) { 
				$new_id_thn_ajar 		= $this->input->post('hide_id_thn_ajar');
				$tingkat 		   		= $rowheader['tingkat'];
				$tipe_kelas				= $rowheader['tipe_kelas'];
				$id_mapel               = $rowbody['id_matpal'];
				$sm_1	                = $this->input->post('txt_mp1_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'])[$sequence];
				$sm_2	                = $this->input->post('txt_mp2_'.$rowheader['tingkat'].'_'.$rowheader['tipe_kelas'])[$sequence];
				$recdate                = date('y-m-d');
	    		$userid 			    = $this->session->userdata('logged_in')['uid'];
				
				$kategori				= 'UTAMA';
				$data_kurikulum = array(
				'id_thn_ajar' 			=> $new_id_thn_ajar,
				'tingkat' 				=> $tingkat,
				'tipe_kelas' 			=> $tipe_kelas,
				'id_mapel'              => $id_mapel,
				'sm_1' 			        => $sm_1,
				'sm_2' 			        => $sm_2,
				'kategori' 			    => $kategori,
				'recdate'               => $recdate,
				'userid' 				=> $userid
				);
				

				$this->model->simpan_data_kurikulum($data_kurikulum);
				
				$sequence++;
			}
			
		}
		echo "true";
	}

	function get_data_kurikulum($id_thn_ajar)
	{
		$id_thn_ajar = urldecode($id_thn_ajar);
		$data = $this->model->query_kurikulum($id_thn_ajar);
    	echo json_encode($data);
	}

	function get_data_kurikulum_byid($id_thn_ajar)
	{
		$id_thn_ajar = urldecode($id_thn_ajar);
		$data = $this->model->query_kurikulum_byid($id_thn_ajar);
    	echo json_encode($data);
	}

	function Delkurikulum($id_thn_ajar)
	{
		$id_thn_ajar = urldecode($id_thn_ajar);
		$this->model->delete_kurikulum($id_thn_ajar);
	}

	function Get_Row_Column_Table()
	{
		$data = $this->model->query_Row_Column();
    	echo json_encode($data);
	}


}

	

	