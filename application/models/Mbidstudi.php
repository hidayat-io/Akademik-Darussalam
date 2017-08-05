<?php

class Mbidstudi extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_bidang','nama_bidang');

        $sql = "SELECT * FROM ms_bidang_study";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_bidstudi($id_bidang){
		$this->db->where('id_bidang',$id_bidang);
		$this->db->delete('ms_bidang_study');
	}

	function simpan_data_bidstudi($data_bidstudi){

		$this->db->replace('ms_bidang_study',$data_bidstudi);
	}
    
    function update_data_bidstudi($id_bidang,$data_bidstudi){
        
        $this->db->where('id_bidang',$id_bidang);
		$this->db->update('ms_bidang_study',$data_bidstudi);
	}

    function query_bidstudi($id_bidang){
        $data = array();
		$data=$this->db->query("SELECT * from ms_bidang_study where id_bidang ='$id_bidang'")->row_array();
		return $data;
		// $this->db->select('*');
        // $this->db->from('ms_bidang_study');
        // $this->db->where('id_bidang',$id_bidang);
        
        // return $this->db->get()->result();
	}

	
}