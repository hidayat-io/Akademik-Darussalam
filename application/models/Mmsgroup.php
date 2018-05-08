<?php

class Mmsgroup extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }
   
    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('group_id','group_name');

        $sql = "SELECT * FROM groupu";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		// var_dump($sql);
		// exit();

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		
		return $this->db->query($sql)->result();
	}
	
	function get_list_menu_parent(){
		$data = array();
		$data = $this->db->query("SELECT * FROM modul where parent =0 ORDER BY modul_id ASC")->result();
		return $data;
	}

	function get_list_menu($modul_id){
		$data = array();
		$data = $this->db->query("SELECT modul_id, nama_modul FROM modul where parent='$modul_id' or modul_id='$modul_id' ORDER BY parent  ASC")->result();
		// var_dump($data);
		// exit();
		return $data;
	}

	function get_alllist_menu(){
		$data = array();
		$data = $this->db->query("SELECT modul_id, nama_modul FROM modul ORDER BY parent  ASC")->result_array();
		// var_dump($data);
		// exit();
		return $data;
	}

	function delete_msgroup($group_id){
		$this->db->where('group_id',$group_id);
		$this->db->delete('user');
	}

	function delete_user_grup($group_id){
		$this->db->where('group_id',$group_id);
		$this->db->delete('group_daftar_user');
	}

	function simpan_groupu($data_groupu){

		$id = $this->db->replace('groupu',$data_groupu);		
		return $this->db->insert_id();
	}

	function simpan_group_hak_akses($data_group_hak_akses){

		$this->db->replace('group_hak_akses',$data_group_hak_akses);
	}
    
    function update_data_user_grup($group_id,$data_user_grup){
        
        $this->db->where('group_id',$group_id);
		$this->db->update('group_daftar_user',$data_user_grup);
	}

    function query_msgroup($group_name){
        $data = array();
		$data=$this->db->query("SELECT * from groupu where group_name ='$group_name'")->row_array();
        return $data;
    }
        
    function query_edit_msgroup($id_msgroup){
        $data = array();
		$data=$this->db->query("SELECT user.group_id, user.nama_lengkap, group_daftar_user.group_id,groupu.group_name 
								FROM USER 
								INNER JOIN group_daftar_user ON user.group_id = group_daftar_user.group_id 
								INNER JOIN groupu ON group_daftar_user.group_id = groupu.group_id 
								where user.group_id = '$id_msgroup'")->row();
		return $data;
	}

}