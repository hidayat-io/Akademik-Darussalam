<?php

class Mbagian extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('kode_bagian','nama');

        $sql = "SELECT * FROM ms_bagian";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_bagian($kode_bagian){
		$this->db->where('kode_bagian',$kode_bagian);
		$this->db->delete('ms_bagian');
	}

	function simpan_data_bagian($data_bagian){

		$this->db->replace('ms_bagian',$data_bagian);
	}
    
    function update_data_bagian($kode_bagian,$data_bagian){
        
        $this->db->where('kode_bagian',$kode_bagian);
		$this->db->update('ms_bagian',$data_bagian);
	}

    function query_bagian($kode_bagian){
        $data = array();
		$data=$this->db->query("SELECT * from ms_bagian where kode_bagian ='$kode_bagian'")->row_array();
		return $data;
	}

	
}