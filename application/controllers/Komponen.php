<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komponen extends IO_Controller
{

	public function __construct()
		{
    	$modul = 2;
		parent::__construct($modul);
		$this->load->model('Mkomponen');
	  }

	function index()
		{
			$data['title'] = 'Komponen Biaya';
	    	$data['content'] = $this->load->view('vkomponen',$data,TRUE);
	    	$this->load->view('main',$data);
	  }


	function load_grid(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);

		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 			= $this->Mkomponen->get_list_data($string_param,$sort_by,$sort_type);
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
		$tipe 	= array('S'=>'Semesteran','B'=>'Bulanan');

		for($i = $iDisplayStart; $i < $end; $i++) {

			$act ='<a class="btn btn-primary btn-xs btn-flat" href="#" onclick="editdata(\''.$data[$i]->id_komponen.'\')">Edit</a>&nbsp;';
			$act .= '<a class="btn btn-danger btn-xs btn-flat" href="#" onclick="deleteData(\''.$data[$i]->id_komponen.'\')">Delete</a>&nbsp;';

			$records["data"][] = array(

				$data[$i]->id_komponen,
				$data[$i]->nama_komponen,
				$tipe[$data[$i]->tipe],
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

			if(isset($param->nama_komponen)) $string_param .= "nama_komponen LIKE '%".$param->nama_komponen."%' ";
		}

		return $string_param;
	}

	function save_data(){

		$input = $this->input->post();

		$id_data 		= $input['hid_id_data'];
		$user 			= $this->session->userdata('logged_in')['uid'];

		$data = array(

			'nama_komponen'		=> $input['txtnama'],
			'tipe'				=> $input['optionsRadios'],
			'userid'			=> $user
		);



		if($id_data==""){

			$this->Mkomponen->insert_new($data);

		}
		else{

			$this->Mkomponen->update_data($id_data,$data);
		}
	}

	function get_data($id){

		$data = $this->Mkomponen->query_getdata($id);

		echo json_encode($data);
	}


	function hapus_data($str){


		$param = explode('|', urldecode($str));


		$id 		= $param[0];

		$user 		= $this->session->userdata('logged_in')['uid'];
		$this->Mkomponen->m_hapus_data($id);
	}

	
}
