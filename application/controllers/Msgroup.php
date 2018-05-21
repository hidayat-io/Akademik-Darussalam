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
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->group_id.'\',\''.$data[$i]->group_name.'\')">
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

	function load_grid_menu()
	{
		$data 				= $this->model->get_list_menu_parent();
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end 				= $iDisplayStart + $iDisplayLength;
		$end 				= $end > $iTotalRecords ? $iTotalRecords : $end;
		$fdate 				= 'd-m-Y';
		for($i = $iDisplayStart; $i < $end; $i++) {
			$data_modul 		= $this->model->get_list_menu($data[$i]->modul_id);
			$data_nama 			= $data[$i]->modul_id;
			$menu_lenght 		= count($data_modul);
			for($x=0;$x<$menu_lenght;$x++) {
					$modul_id       	=  'modul_id'.$data_modul[$x]->modul_id;
					$modul_idX       	=  $data_modul[$x]->modul_id;
					$nama_modul       	= $data_modul[$x]->nama_modul;
					$add            	=  'add'.$data_modul[$x]->modul_id;
					$edit           	=  'edit'.$data_modul[$x]->modul_id;
					$delete         	=  'delete'.$data_modul[$x]->modul_id;
					if($data_nama == $modul_idX)
					{
						$style ='<strong>';
						$style_color ='style="color: red;"';
					}
					else {
						$style ='';
						$style_color ='style="color: black;"';
					}
					
				$records["data"][] = array(
				
					
					'<div align="right"><input type="checkbox" value="'.$modul_id.'" name="'.$modul_id.'[]" id="'.$modul_id.'"></div>',
					'<div align="center" style="color: red;"><strong>'.$data[$i]->nama_modul.'</div>',
					'<div align="center" '.$style_color.'>'.$style.''.$nama_modul.'</div>',
					'<div align="center"><input type="checkbox" value="'.$add.'#add" name="'.$add.'[]" id="'.$add.'"</div>',
					'<div align="center"><input type="checkbox" value="'.$edit.'#add" name="'.$edit.'[]" id="'.$edit.'"</div>',
					'<div align="center"><input type="checkbox" value="'.$delete.'#add" name="'.$delete.'[]" id="'.$delete.'"</div>',
					
				);
			}
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function simpan_msgroup($status)
	{
		$list_menu			= $this->model->get_alllist_menu();
		$group_id 			= $this->input->post('group_id');
		$group_name 		= $this->input->post('group_name');
	


		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			// save data msgroup
		
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
					$this->model->simpan_group_hak_akses($data_group_hak_akses);
				}
				

			}

		}
        else //update data
		{	
			
			$this->model->update_groupu($group_id,$group_name);
			$this->model->delete_group_hak_akses($group_id);
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
						'group_id'		=> $group_id,
						'modul_id'		=> $modul_id,
						'add'			=> $add,
						'edit'			=> $edit,
						'delete'		=> $delete


					);
					
					$this->model->simpan_group_hak_akses($data_group_hak_akses);
				}
			}	 
		}   

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

	function cek_user($group_id)
	{
		$group_id 		= urldecode($group_id);
		$data 			= $this->model->query_cek_userp($group_id);
    	echo json_encode($data);
	}

	function Delmsgroup($group_id)
	{
		$group_id = urldecode($group_id);
		$this->model->delete_groupu($group_id);
		$this->model->delete_group_hak_akses($group_id);
	}


}

	

	