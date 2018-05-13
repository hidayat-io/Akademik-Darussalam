<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class user_login extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 47;
			parent::__construct($this->modul);
		 	$this->load->model('muser_login','model');
	}

	function index()
	{
	    // get ID karyawan
        $select_karyawan = $this->model->get_mskaryawan()->result();

        $vdata['mskaryawan'][NULL] = '-';
        foreach ($select_karyawan as $b) {

            $vdata['mskaryawan'][$b->no_reg."#".$b->nama_lengkap]
                =$b->no_reg." | ".$b->nama_lengkap;
        }

         // get ID group
        $select_group = $this->model->get_group()->result();

        $vdata['group'][NULL] = '-';
        foreach ($select_group as $b) {

            $vdata['group'][$b->group_id."#".$b->group_name]
                =$b->group_id." | ".$b->group_name;
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
		$vdata['title'] = 'DATA USER LOGIN';
	    $data['content'] = $this->load->view('vuser_login',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->user_id)) $string_param .= " user.user_id LIKE '%".$param->user_id."%' ";
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
		
		for($i = $iDisplayStart; $i < $end; $i++) {
			$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->user_id.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red '.$class_delete.'" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->user_id.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

		     	'<div align="center" style="width: 100%">'.$data[$i]->user_id.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->nama_lengkap.'</div>',
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

	function simpan_user_login($status)
	{
		$user_id 			= $this->input->post('user_id');
		$nama_lengkap 		= $this->input->post('nama_user_login');
		$group_id 			= $this->input->post('id_group');
		$password 			= $this->input->post('password');
		$pwd 			= substr(md5($password),0,15);
		$alamat  			= $this->input->post('alamat');
	    $userid 	    	= $this->session->userdata('logged_in')['uid'];

		$data_user = array(
			'user_id' 				=> $user_id,
			'password' 				=> $pwd,
			'nama_lengkap' 			=> $nama_lengkap
		);

		$data_user_grup = array(
			'user_id' 				=> $user_id,
			'group_id' 				=> $group_id
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data user_login
         	$this->model->simpan_data_user_login($data_user);
         	$this->model->simpan_data_user_grup($data_user_grup);

		}
        else //update data
		{	
			if ($password!=""){
				$this->model->simpan_data_user_login($data_user);
			}
			// save data user_login
         	$this->model->update_data_user_grup($user_id,$data_user_grup);
        }	    

			echo "true";
	}

	function get_data_user_login($user_id)
	{
		$user_id 		= urldecode($user_id);
		$data 			= $this->model->query_user_login($user_id);
    	echo json_encode($data);
    }
    
	function get_edit_user_login($user_id)
	{
		$user_id 		= urldecode($user_id);
		$data 			= $this->model->query_edit_user_login($user_id);
    	echo json_encode($data);
	}

	function Deluser_login($user_id)
	{
		$id_user_login = urldecode($user_id);
		$this->model->delete_user_login($user_id);
		$this->model->delete_user_grup($user_id);
	}


}

	

	