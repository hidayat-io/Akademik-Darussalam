<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class msgroup extends IO_Controller
{

	public function __construct()
	{
			$modul = 48;
			parent::__construct($modul);
		 	$this->load->model('mmsgroup','model');
	}

	function index()
	{

		$vdata['title'] = 'DATA MASTER GROUP';
	    $data['content'] = $this->load->view('vmsgroup',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->group_id)) $string_param .= " group_name LIKE '%".$param->group_id."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->group_id.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->group_id.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

				'<div align="center" style="width: 100%">'.$data[$i]->group_id.'</div>',
  				'<div align="center" style="width: 100%">'.$data[$i]->group_name.'</div>',
                '<div align="center" style="width: 100%">'.$act.'</div>'
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function simpan_msgroup($status)
	{
		$group_id 			= $this->input->post('group_id');
		$nama_lengkap 		= $this->input->post('nama_msgroup');
		$group_id 			= $this->input->post('id_group');
		$password 			= $this->input->post('password');
		$pwd 			= substr(md5($password),0,15);
		$alamat  			= $this->input->post('alamat');
	    $userid 	    	= $this->session->userdata('logged_in')['uid'];

		$data_user = array(
			'group_id' 				=> $group_id,
			'password' 				=> $pwd,
			'nama_lengkap' 			=> $nama_lengkap
		);

		$data_user_grup = array(
			'group_id' 				=> $group_id,
			'group_id' 				=> $group_id
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data msgroup
         	$this->model->simpan_data_msgroup($data_user);
         	$this->model->simpan_data_user_grup($data_user_grup);

		}
        else //update data
		{	
			if ($password!=""){
				$this->model->simpan_data_msgroup($data_user);
			}
			// save data msgroup
         	$this->model->update_data_user_grup($group_id,$data_user_grup);
        }	    

			echo "true";
	}

	function get_data_msgroup($group_id)
	{
		$group_id 		= urldecode($group_id);
		$data 			= $this->model->query_msgroup($group_id);
    	echo json_encode($data);
    }
    
	function get_edit_msgroup($group_id)
	{
		$group_id 		= urldecode($group_id);
		$data 			= $this->model->query_edit_msgroup($group_id);
    	echo json_encode($data);
	}

	function Delmsgroup($group_id)
	{
		$id_msgroup = urldecode($group_id);
		$this->model->delete_msgroup($group_id);
		$this->model->delete_user_grup($group_id);
	}


}

	

	