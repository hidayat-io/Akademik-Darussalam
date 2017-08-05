<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infaq extends IO_Controller
{

	public function __construct()
		{
    $modul = 8;
		parent::__construct($modul);
		$this->load->model('infaq_model','model');
	  }

	function index()
		{
			$data['title'] = 'INFAQ';
	    	$data['content'] = $this->load->view('vinfaq',$data,TRUE);
	    	$this->load->view('main',$data);
	  }

    function save_data(){

		$input = $this->input->post();

		$id_data 		= $input['hid_id_data'];
		$id_key			= $input['hid_id_key'];
		$id_data_saldo 	= $input['hid_data_saldo'];
		$tgl 			= io_return_date('d-m-Y',$input['txttgl']);
		$user 			= $this->session->userdata('logged_in')['uid'];

		$data = array(
			'keytrans'			=> $id_key,
			'nama'				=> $input['txtnama'],
			'alamat'			=> $input['txtalamat'],
			'tgl_infaq'			=> $tgl,
			'tipe'				=> $input['optionsRadios'],
			'nominal'			=> $input['txtnominal'],
			'keterangan'		=> $input['txtketerangan'],
			'userid'			=> $user
		);



		if($id_data==""){

			$this->model->insert_new($data);
			$this->model->update_saldo($id_key,$input['optionsRadios'],$input['txtnominal'],$user);
		}
		else{

			$this->model->update_data($id_data,$data);
			$this->model->update_saldo_updt($id_key,$input['optionsRadios'],$input['txtnominal'],$user,$id_data_saldo);
		}
	}

	function load_grid(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);

		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 			= $this->model->get_list_data($string_param,$sort_by,$sort_type);
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

			$act = '<a class="btn btn-primary btn-xs btn-flat" href="#" onclick="editdata(\''.$data[$i]->id_infaq.'\')">Edit</a>&nbsp;';
			$act .= '<a class="btn btn-danger btn-xs btn-flat" href="#" onclick="deleteData(\''.$data[$i]->id_infaq.'|'.$data[$i]->tipe.'|'.$data[$i]->nominal.'|'.'\')">Delete</a>&nbsp;';

			$records["data"][] = array(

				$data[$i]->id_infaq,
				$data[$i]->nama,
				$data[$i]->alamat,
				io_date_format($data[$i]->tgl_infaq,$fdate),
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

	function build_param($param){

		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->nama)) $string_param .= " s.nama LIKE '%".$param->nama."%' ";
		}

		return $string_param;
	}

	function get_data($id){

		$data = $this->model->query_getdata($id);

		echo json_encode($data);
	}
	
}
