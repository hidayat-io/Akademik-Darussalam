<?php

class Mgedung extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('kode_gedung','nama');

        $sql = "SELECT * FROM ms_gedung";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_gedung($kode_gedung){
		$this->db->where('kode_gedung',$kode_gedung);
		$this->db->delete('ms_gedung');
	}

	function simpan_data_gedung($data_gedung){

		$this->db->replace('ms_gedung',$data_gedung);
	}
    
    function update_data_gedung($kode_gedung,$data_gedung){
        
        $this->db->where('kode_gedung',$kode_gedung);
		$this->db->update('ms_gedung',$data_gedung);
	}

    function query_gedung($kode_gedung){
        $data = array();
		$data=$this->db->query("SELECT * from ms_gedung where kode_gedung ='$kode_gedung'")->row_array();
		return $data;
	}

	
}