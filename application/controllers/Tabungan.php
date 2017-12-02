<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends IO_Controller {

	public function __construct(){

    	$modul = 2;
		parent::__construct($modul);
		$this->load->model('tabungan_model');
	}

	function index(){

		$data['title'] 		= 'Data Tabungan';
    	$data['content'] 	= $this->load->view('vtabungan',$data,TRUE);
    	$this->load->view('main',$data);
	}

	function lookup_noreg(){

        $noreg    	= $this->input->post('noreg');
        $emp     	= $this->tabungan_model->query_data_noreg($noreg);
        $ar_emp 	= array();

        if($emp!=null){

            $ar_emp = array(

                'no_registrasi'   	=> $emp->no_registrasi,
                'nama_lengkap'  	=> $emp->nama_lengkap,
                'saldo'  			=> $emp->saldo
            );
        }

        echo json_encode($ar_emp);
    }

    function lookUpNoregsrch(){

        $noreg    	= $this->input->post('noreg');
        $emp     	= $this->tabungan_model->query_data_noregsrch($noreg);
        $ar_emp 	= array();

        if($emp!=null){

            $ar_emp = array(

                'no_registrasi'   	=> $emp->no_registrasi,
                'nama_lengkap'  	=> $emp->nama_lengkap,
                'saldo'  			=> $emp->saldo
            );
        }

        echo json_encode($ar_emp);
    }

    function save_data(){

		$input 	= $this->input->post();
		$user 	= $this->session->userdata('logged_in')['uid'];

		if($input['hid_tipe_transaksi']=='i'){ //save tabungan IN

			$id_data 		= $input['hid_id_data'];
			$old_saldo 		= $input['hid_old_nominal'];
			$tgl 			= io_return_date('d-m-Y',$input['txttgl']);

			$data = array(

				'no_registrasi'		=> $input['opt_noreg'],
				'tgl_tabungan'		=> $tgl,
				'tipe'				=> $input['hid_tipe_transaksi'],
				'nominal'			=> $input['txtnominal'],
				'keterangan'		=> $input['txtketerangan'],
				'userid'			=> $user
			);

			if($id_data==""){ //insert new data

				$this->tabungan_model->insert_new($data);
			}
			else{ //update data

				//remove old nominal
				$this->tabungan_model->update_saldo($input['opt_noreg'],'o',$old_saldo ,$user);
				$this->tabungan_model->update_data($id_data,$data);
			}

			//update table saldo
			$this->tabungan_model->update_saldo($input['opt_noreg'],$input['hid_tipe_transaksi'],$input['txtnominal'],$user);

			//if cek kalkulasi pengeluaran harian is checked
			if(isset($input['chk_kalkulasi'])){

				$this->calculate_limit_pengeluaran($input['opt_noreg']);
			}
		}
		else{ //save tabungan OUT

			$list_siswa = json_decode($input['hid_list_siswa']);
			$tgl 		= date('Y/m/d');

			for($i=0;$i<count($list_siswa);$i++){

				$noreg 		= $list_siswa[$i]->no_registrasi;
				$nominal  	= $input['txt_jml_ambil'];

				$data = array(

					'no_registrasi'		=> $noreg,
					'tgl_tabungan'		=> $tgl,
					'tipe'				=> 'o',
					'nominal'			=> $nominal,
					'userid'			=> $user
				);

				//save new data
				$this->tabungan_model->insert_new($data);

				//update table saldo
				$this->tabungan_model->update_saldo($noreg,'o',$nominal,$user);
			}
		}
	}

	function load_grid(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);

		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 				= $this->tabungan_model->get_list_data($string_param,$sort_by,$sort_type);
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

			$act = '';

			if($data[$i]->tipe=='i'){ // hanya transaksi in yang dapat diedit / transaksi out tidak

				$act = '<button type="button" class="btn blue btn-xs" title="LIHAT & EDIT DATA" onclick="editdata(\''.$data[$i]->id.'\')">
		                	<i class="fa fa-edit"></i>
		                </button>';
			}

			$act.= '<button type="button" class="btn red btn-xs" title="HAPUS DATA" onclick="deleteData(\''.$data[$i]->id.'|'.$data[$i]->tipe.'|'.$data[$i]->nominal.'|'.$data[$i]->no_registrasi.'|'.$data[$i]->saldo.'\')">
						<i class="fa fa-trash"></i>
					</button>';


			// $act = '<a class="btn btn-primary btn-xs btn-flat" href="#" onclick="editdata(\''.$data[$i]->id.'\')">Edit</a>&nbsp;';
			// $act .= '<a class="btn btn-danger btn-xs btn-flat" href="#" onclick="deleteData(\''.$data[$i]->id.'|'.$data[$i]->tipe.'|'.$data[$i]->nominal.'|'.$data[$i]->no_registrasi.'|'.$data[$i]->saldo.'\')">Delete</a>&nbsp;';

			$records["data"][] = array(

				$data[$i]->id,
				io_date_format($data[$i]->tgl_tabungan,$fdate),
				$data[$i]->no_registrasi,
				$data[$i]->nama_lengkap,
				$data[$i]->kel_sekarang,
				$tipe[$data[$i]->tipe],
				$data[$i]->nominal,
				$data[$i]->keterangan,
				$act
			);
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	function hapus_data($str){

		$param = explode('|', urldecode($str));

		$id 		= $param[0];
		$tipe 		= $param[1];
		$nom 		= $param[2];
		$noregis 	= $param[3];
		$saldo_temp	= $param[4];
		$user 		= $this->session->userdata('logged_in')['uid'];

		// melempar data ke model untuk execute berdasarkan //
		// parameter yang diberikan //
		$this->tabungan_model->m_hapus_data($id,$tipe,$nom,$noregis,$user,$saldo_temp);
	}

	function get_data($id){

		$data = $this->tabungan_model->query_getdata($id);

		echo json_encode($data);
	}

	function build_param($param){
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->nama)) $string_param .= "nama_lengkap LIKE '%".$param->nama."%' ";
		}

		return $string_param;
	}

	function excel_tabungan(){
		// hasil decode //
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		$str = $this->build_param($str);

		$data= $this->tabungan_model->get_list_data($str);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Report-Tabungan');
		$this->excel->getActiveSheet()->setCellValue('A1', "Report Tabungan");
		$this->excel->getActiveSheet()->mergeCells('A1:L1');

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "Tanggal");
		$this->excel->getActiveSheet()->setCellValue('C3', "No.Register");
		$this->excel->getActiveSheet()->setCellValue('D3', "Nama Santri");
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
				$this->excel->getActiveSheet()->setCellValue('B'.$i, io_date_format($row->tgl_tabungan,$fdate));
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->no_registrasi);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->nama_lengkap);
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

		$filename='report-Tabungan.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}


	function get_list_santri_pengeluaran(){

		$kelas 	= $this->input->get('skelas');
		$kamar 	= $this->input->get('skamar');
		$santri = $this->input->get('ssantri');
		$param 	= " ";

		//build param for requesting data
		if($kelas!=''){

			$param .= " AND s.kel_sekarang='$kelas'  ";
		}

		if($kamar!=''){

			$param .= " AND s.kamar= '".$kamar."' ";
		}

		if($santri!=''){

			$param .= " AND s.no_registrasi='".$santri."' ";
		}

		$data = $this->tabungan_model->mget_list_limit_pengeluaran($param)->result();

		if($data==null) $data = array();

    	echo json_encode($data);
    }

    function get_saldo($nosantri=null){

    	if($nosantri!=null){

    		$data = $this->tabungan_model->query_getdatasaldo($nosantri);

			echo json_encode($data);
    	}
    	else{

    		echo json_encode(array());
    	}
	}

	function load_data_santri(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);

		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 				= $this->tabungan_model->get_list_data_santri($string_param,$sort_by,$sort_type);
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

		for($i = $iDisplayStart; $i < $end; $i++) {

			$act = '<a class="btn btn-primary btn-xs btn-flat" href="#" onclick="editdata(\''.$data[$i]->no_registrasi.'\')">Edit</a>&nbsp;';
			$act .= '<a class="btn btn-danger btn-xs btn-flat" href="#" onclick="deleteData(\''.$data[$i]->no_registrasi.'\')">Delete</a>&nbsp;';

			$records["data"][] = array(
				$data[$i]->no_registrasi,
				$data[$i]->no_registrasi,
				$data[$i]->nama_lengkap,
				$data[$i]->kelas_sekolah,
				$data[$i]->saldo,
				$data[$i]->nominal,
				$act
			);
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	private function calculate_limit_pengeluaran($no_reg_santri){

		$limit 		= 5000;
		$multiply   = 1000;

		//get current saldo
		$saldo = $this->tabungan_model->query_getdatasaldo($no_reg_santri);

		if($saldo!=null){

			//divide by 30 days ( a month )
			$new_limit = (int)$saldo->saldo / 30;

			//if new limit more than default limit
			if($new_limit > $limit){

				//round down to the closest thousands
				$new_limit	= floor($new_limit / $multiply);
				$limit 		= $new_limit * $multiply;
			}
		}

		$data = array(

			'no_reg'	=> $no_reg_santri,
			'limit'		=> $limit,
			'up_by'		=> $this->session->userdata('logged_in')['uid']
		);

		$this->tabungan_model->update_limit_pengeluaran($data);
	}

	function get_list_santri(){

    	$data_santri = $this->mcommon->query_list_santri();

    	echo json_encode($data_santri);
    }
}
