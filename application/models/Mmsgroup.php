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
	
	function delete_msgroup($group_id){
		$this->db->where('group_id',$group_id);
		$this->db->delete('user');
	}

	function delete_user_grup($group_id){
		$this->db->where('group_id',$group_id);
		$this->db->delete('group_daftar_user');
	}

	function simpan_data_msgroup($data_user){

		$this->db->replace('user',$data_user);
	}

	function simpan_data_user_grup($data_user_grup){

		$this->db->replace('group_daftar_user',$data_user_grup);
	}
    
    function update_data_user_grup($group_id,$data_user_grup){
        
        $this->db->where('group_id',$group_id);
		$this->db->update('group_daftar_user',$data_user_grup);
	}

    function query_msgroup($group_id){
        $data = array();
		$data=$this->db->query("SELECT * from user where group_id ='$group_id'")->row_array();
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