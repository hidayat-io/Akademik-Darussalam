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
		return $data;
	}

	function get_alllist_menu(){
		$data = array();
		$data = $this->db->query("SELECT modul_id, nama_modul FROM modul ORDER BY parent  ASC")->result_array();
		return $data;
	}

	function simpan_groupu($data_groupu){

		$id = $this->db->replace('groupu',$data_groupu);		
		return $this->db->insert_id();
	}

	function update_groupu($group_id,$group_name){
		$this->db->set('group_name',$group_name);
		$this->db->where('group_id',$group_id);
		$this->db->update('groupu');
		
	}

	function delete_groupu($group_id){
		$this->db->where('group_id',$group_id);
		$this->db->delete('groupu');
	}

	function simpan_group_hak_akses($data_group_hak_akses){

		$this->db->insert('group_hak_akses',$data_group_hak_akses);
	}

	function delete_group_hak_akses($group_id){

		$this->db->where('group_id',$group_id);
		$this->db->delete('group_hak_akses');
	}


    function query_msgroup($group_name){
        $data = array();
		$data=$this->db->query("SELECT * from groupu where group_name ='$group_name'")->row_array();
        return $data;
    }
        
    function query_edit_msgroup($id_msgroup){
        $data = array();
		$data=$this->db->query("select groupu.group_id, groupu.group_name, group_hak_akses.modul_id, group_hak_akses.`add`,group_hak_akses.edit,group_hak_akses.`delete`
								from groupu
								left join group_hak_akses on groupu.group_id = group_hak_akses.group_id where groupu.group_id ='$id_msgroup'")->result_array();
		//         $query = $this->db->last_query();
		// var_dump($query);
		// exit();
		return $data;
	}

    function query_cek_userp($group_id){
        $data = array();
		$data=$this->db->query("select * from group_daftar_user where group_id ='$group_id'")->row_array();
		return $data;
	}

}