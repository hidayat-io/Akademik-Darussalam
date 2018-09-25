<?php

class Muser_login extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }
    
	function get_mskaryawan(){
		$data = $this->db->query ("SELECT * FROM ms_guru ORDER BY no_reg");
		return $data;
    }

	function get_group(){
		$data = $this->db->query ("SELECT * FROM groupu ORDER BY group_id");
		return $data;
    }

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('user_id','nama_lengkap','group_id','group_name');

        $sql = "SELECT user.user_id, user.nama_lengkap, group_daftar_user.group_id,groupu.group_name
                FROM user 
                INNER JOIN group_daftar_user ON user.user_id = group_daftar_user.user_id
                INNER JOIN groupu ON  group_daftar_user.group_id = groupu.group_id";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		// var_dump($sql);
		// exit();

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		
		return $this->db->query($sql)->result();
	}
	
	function delete_user_login($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('user');
	}

	function delete_user_grup($user_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete('group_daftar_user');
	}

	function simpan_data_user_login($data_user){

		$this->db->replace('user',$data_user);
	}

	function simpan_data_user_grup($data_user_grup){

		$this->db->replace('group_daftar_user',$data_user_grup);
	}
    
    function update_data_user_grup($user_id,$data_user_grup){
        
        $this->db->where('user_id',$user_id);
		$this->db->update('group_daftar_user',$data_user_grup);
	}

    function query_user_login($user_id){
        $data = array();
		$data=$this->db->query("SELECT * from user where user_id ='$user_id'")->row_array();
        return $data;
    }
        
    function query_edit_user_login($id_user_login){
        $data = array();
		$data=$this->db->query("SELECT user.user_id, user.nama_lengkap, group_daftar_user.group_id,groupu.group_name 
								FROM user 
								INNER JOIN group_daftar_user ON user.user_id = group_daftar_user.user_id 
								INNER JOIN groupu ON group_daftar_user.group_id = groupu.group_id 
								where user.user_id = '$id_user_login'")->row();
		return $data;
	}

}