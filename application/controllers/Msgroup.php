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
		//get all menu
		$vdata['list_menu']	= $this->model->get_list_menu();

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
		$list_menu			= $this->model->get_list_menu();
		$group_id 			= $this->input->post('group_id');
		$group_name 		= $this->input->post('group_name');

		$data_groupu = array(
			'group_id'		=> $group_id,
			'group_name'	=> $group_name

		);

		$id = $this->model->simpan_groupu($data_groupu);

		foreach ($list_menu as $row) {

			$modul_id		= $this->input->post('modul_id'.$row['modul_id']);
			$add			= $this->input->post('add'.$row['modul_id']);
			$edit			= $this->input->post('edit'.$row['modul_id']);
			$delete			= $this->input->post('delete'.$row['modul_id']);

			if(isset($modul_id)){
				$modul_id = $row['modul_id'];
				if(isset($add)){

					$add=1;
				}
				else{
					$add=0;
				}

				if(isset($edit)){

					$edit=1;
				}
				else{
					$edit=0;
				}

				if(isset($delete)){

					$delete=1;
				}
				else{
					$delete=0;
				}

				$data_group_hak_akses = array(
					'group_id'		=> $id,
					'modul_id'		=> $modul_id,
					'add'			=> $add,
					'edit'			=> $edit,
					'delete'		=> $delete


				);
				// var_dump($data_group_hak_akses);
				// exit();
				$this->model->simpan_group_hak_akses($data_group_hak_akses);
			}
			

		}
		
        
		// if($status=='SAVE')	
		// {// cek apakah add new atau editdata
			
		// // save data msgroup
        //  	$this->model->simpan_data_msgroup($data_user);
        //  	$this->model->simpan_data_user_grup($data_user_grup);

		// }
        // else //update data
		// {	
		// 	if ($password!=""){
		// 		$this->model->simpan_data_msgroup($data_user);
		// 	}
		// 	// save data msgroup
        //  	$this->model->update_data_user_grup($group_id,$data_user_grup);
        // }	    

			echo "true";
	}

	function get_data_msgroup($group_name)
	{
		$group_name 		= urldecode($group_name);
		$data 				= $this->model->query_msgroup($group_name);
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

	

	