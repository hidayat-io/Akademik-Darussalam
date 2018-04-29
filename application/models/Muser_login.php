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
                FROM USER 
                INNER JOIN group_daftar_user ON user.user_id = group_daftar_user.user_id
                INNER JOIN groupu ON  group_daftar_user.group_id = groupu.group_id";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_user_login($id_user_login){
		$this->db->where('id_user_login',$id_user_login);
		$this->db->delete('ms_user_login');
	}

	function simpan_data_user_login($data_user_login){

		$this->db->replace('ms_user_login',$data_user_login);
	}
    
    function update_data_user_login($id_user_login,$data_user_login){
        
        $this->db->where('id_user_login',$id_user_login);
		$this->db->update('ms_user_login',$data_user_login);
	}

    function query_user_login($nama_user_login){
        $data = array();
		$data=$this->db->query("SELECT * from ms_user_login where nama_user_login ='$nama_user_login'")->row_array();
        return $data;
    }
        
    function query_edit_user_login($id_user_login){
        $data = array();
		$data=$this->db->query("SELECT * from ms_user_login where id_user_login ='$id_user_login'")->row_array();
		return $data;
	}

}