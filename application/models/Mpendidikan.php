<?php

class Mpendidikan extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

	function simpan_data_pendidikan($data_pendidikan){

		$this->db->insert('ms_pendidikan',$data_pendidikan);
	}

	function delete_pendidikan($id_pendidikan){
		$this->db->where('id_pendidikan',$id_pendidikan);
		$this->db->delete('ms_pendidikan');
	}

	function query_pendidikan($pendidikan){
        $data = array();
		$data=$this->db->query("SELECT * from ms_pendidikan where pendidikan ='$pendidikan'")->row_array();
        return $data;
    }
        
    function query_edit_pendidikan($id_pendidikan){
        $data = array();
		$data=$this->db->query("SELECT * from ms_pendidikan where id_pendidikan ='$id_pendidikan'")->row_array();
		return $data;
	}

	function update_data_pendidikan($id_Pendidikan,$data_pendidikan){

        $this->db->where('id_Pendidikan',$id_Pendidikan);
		$this->db->update('ms_pendidikan',$data_pendidikan);
	}
    
    function get_list_data($param,$sortby=0,$sorttype='desc'){
        
		
        $cols = array('id_pendidikan','pendidikan');

        $sql = "SELECT * FROM ms_pendidikan";
            

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}


	

}