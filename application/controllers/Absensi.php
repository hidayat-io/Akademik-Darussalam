<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends IO_Controller{

	public function __construct(){

    	$modul = 2;
		parent::__construct($modul);
		$this->load->model('Mabsensi','model');
	}

	function index(){

		$data['title'] = 'ABSENSI';
    	$data['content'] = $this->load->view('vabsensi',$data,TRUE);
    	$this->load->view('main',$data);
	}

	function load_grid(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 				= $this->model->get_grid_kelas($string_param,$sort_by,$sort_type);
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {

			$btn = '<button type="button" class="btn blue btn-xs" title="LIHAT & EDIT DATA" onclick="modalEdit(\''.$data[$i]->id_jadwal.'\')">
	                	<i class="fa fa-edit"></i>
	                </button>';

			$records["data"][] = array(

				$data[$i]->kode_kelas,
				$data[$i]->nama,
				$data[$i]->tingkat,
				$data[$i]->tipe_kelas,
				$data[$i]->hari,
				$data[$i]->jam,
				$data[$i]->nama_matpal,
				$data[$i]->nama_lengkap,
				$btn
			);
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	function build_param($param){ //merubah hasil json menjadi parameter Query

		$string_param = NULL;

		if($param!=null){

			if(isset($param->nama)) $string_param .= "nama_lengkap LIKE '%".$param->nama."%' ";
		}

		return $string_param;
	}

	function get_data_absensi(){
		
		$input_tgl_absensi 	= $this->input->get('tgl_absensi');
		$tgl_absensi 		= io_return_date('d-m-Y',$input_tgl_absensi);
		$id_jadwal 			= $this->input->get('id_jadwal');

		$data = $this->model->mget_data_absensi($id_jadwal,$tgl_absensi)->result();

		echo json_encode($data);
	}

	function save_absen(){

		
	}
}