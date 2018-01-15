<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infaq extends IO_Controller
{

	public function __construct()
		{
    $modul = 2;
		parent::__construct($modul);
		$this->load->model('Minfaq');
	  }

	function index()
		{
			$data['title'] = 'INFAQ';
	    	$data['content'] = $this->load->view('vinfaq',$data,TRUE);
	    	$this->load->view('main',$data);
	  }


    function save_data(){

		$input = $this->input->post();


		$id_data 			= $input['hid_id_data'];
		$id_data_saldo 		= $input['hid_data_saldo']; 
		$hid_data_nm_awl 	= $input['hid_data_nm_awl'];

		$hid_id_data_tipe 	= $input['hid_id_data_tipe'];

		$tgl 				= io_return_date('d-m-Y',$input['txttgl']);
		$tglkl 				= io_return_date('d-m-Y',$input['txttglkl']);

		$user 				= $this->session->userdata('logged_in')['uid'];


		if($hid_id_data_tipe=="tab_in"){
			$tipe="i";
		}
		else{
			$tipe ="o";	
		}


		if($hid_id_data_tipe =="tab_in"){

				$data = array(
				'id_donatur'		=> $input['opt_donatur'],
				'tgl_infaq'			=> $tgl,
				'tipe'				=> $tipe,
				'nominal'			=> str_replace(array('.',','), array('',''),$input['txtnominal']),
				'keterangan'		=> $input['txtketerangan'],
				'userid'			=> $user
				);

				if($id_data==""){

					$this->Minfaq->insert_new($data);
					$this->Minfaq->update_saldo($input['opt_donatur'],$tipe,str_replace(array('.',','), array('',''),$input['txtnominal']),$user);
				}
				else{

					$this->Minfaq->update_data($id_data,$data);
					$this->Minfaq->update_saldo_updt_EDT($input['opt_donatur'],$tipe,str_replace(array('.',','), array('',''),$input['txtnominal']),$user,$id_data_saldo,$hid_data_nm_awl);
				}

		}

		else{

			$data = array(
				'id_donatur'		=> $input['opt_donatur2'],
				'tgl_infaq'			=> $tglkl,
				'tipe'				=> $tipe,
				'nominal'			=> str_replace(array('.',','), array('',''),$input['txtnominalkl']),
				'keterangan'		=> $input['txtketerangankl'],
				'userid'			=> $user
				);

			if($id_data==""){

					$this->Minfaq->insert_new_kl($data);
					$this->Minfaq->update_saldo_kl($input['opt_donatur2'],$tipe,str_replace(array('.',','), array('',''),$input['txtnominalkl']),$user);
				}
				else{

				$this->Minfaq->update_data($id_data,$data);
				$this->Minfaq->update_data_saldo_kl($input['opt_donatur2'],$tipe,$input['hid_data_nm_awl'],str_replace(array('.',','), array('',''),$input['txtnominalkl']),str_replace(array('.',','), array('',''),$input['txtsaldo']),$user);
				}

						

		}
	}

	function get_list_donatur(){
    	$data_donatur = $this->mcommon->mget_list_donatur();

    	echo json_encode($data_donatur);
    }

	// menapilkan data kedalam
	// grid
	function load_grid(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);


		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 			= $this->Minfaq->get_list_data($string_param,$sort_by,$sort_type);
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$fdate 	= 'd-M-Y';
		$tipe 	= array('i'=>'In','o'=>'Out');

		for($i = $iDisplayStart; $i < $end; $i++) {

			$act = '<a class="btn blue btn-xs" title="UBAH DATA" onclick="editdata(\''.$data[$i]->id_infaq.'\')">
						<i class="fa fa-edit"></i>
					<a class="btn red btn-xs" title="HAPUS DATA" onclick="deleteData(\''.$data[$i]->id_infaq.'|'.$data[$i]->tipe.'|'.$data[$i]->nominal.'|'.$data[$i]->id_donatur.'|'.$data[$i]->saldo.'|'.'\')">
						<i class="fa fa-trash"></i>';

			$records["data"][] = array(

				$data[$i]->id_infaq,
				$data[$i]->id_donatur,
				$data[$i]->nama_donatur,
				$data[$i]->alamat,
				io_date_format($data[$i]->tgl_infaq,$fdate),
				$tipe[$data[$i]->tipe],
				number_format($data[$i]->nominal,0,",","."),
				$data[$i]->keterangan,
				$act
			);
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	//parameter yang dikirm
	function build_param($param){


		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			//if(isset($param->nama)) $string_param .= "nama LIKE '%".$param->nama."%' ";

			if($param->id_infaq != "") $string_param .= "id_infaq = '".$param->id_infaq."' ";

			if($param->tgl_start != ""){

				$istart_date 	= io_return_date('d-m-Y',$param->tgl_start);
				$iend_date 		= io_return_date('d-m-Y',$param->tgl_end);

				if($string_param != null){

					$string_param .= ' AND ';
				}

				$string_param .= " tgl_infaq BETWEEN '".$istart_date."' AND '".$iend_date."' ";

				if($param->tipe != ""){
					if($string_param !=""){
						$string_param .=' AND ';
					}
					$string_param .="tipe = '".$param->tipe."' ";

				}
			} 
		}

		return $string_param;
	}

	//menampilkan data
	function get_data($id){

		$data = $this->Minfaq->query_getdata($id);

		echo json_encode($data);
	}

	function get_saldo_infaq($id){
		$data = $this->Minfaq->quey_getdata_saldoinfaq($id);
		echo json_encode($data);
	}

	//menghapus data
	function hapus_data($str){


		$param = explode('|', urldecode($str));


		$id 			= $param[0];
		$tipe 			= $param[1];
		$nom 			= $param[2];
		$id_donatur 	= $param[3];
		$saldo 			= $param[4];
		//$keytrans 	= $param[3];
		//$saldo_temp	= $param[4];
		$user 		= $this->session->userdata('logged_in')['uid'];

		// melempar data ke model untuk execute berdasarkan //
		// parameter yang diberikan //
		$this->Minfaq->m_hapus_data($id,$id_donatur,$tipe,$nom,$saldo,$user);
	}

	// menampilkan data ke dalam excel
	function excel_infaq(){
		// hasil decode // 
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		$str = $this->build_param($str);

		$data= $this->Minfaq->get_list_data($str);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Report-Infaq');
		$this->excel->getActiveSheet()->setCellValue('A1', "Report Infaq");
		$this->excel->getActiveSheet()->mergeCells('A1:L1');

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "Tanggal");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama");
		$this->excel->getActiveSheet()->setCellValue('D3', "Alamat");
		$this->excel->getActiveSheet()->setCellValue('E3', "Tipe");
		$this->excel->getActiveSheet()->setCellValue('F3', "Nominimal");
		$this->excel->getActiveSheet()->setCellValue('G3', "Keterangan");

		$fdate 	= "d-M-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				if($row->tipe=='i'){
					$tp="IN";
				}else{
					$tp="OUT";
				}

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, io_date_format($row->tgl_infaq,$fdate));
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama_donatur);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->alamat);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $tp);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->nominal);
				$this->excel->getActiveSheet()->setCellValue('G'.$i, $row->keterangan);
				
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
	
}
