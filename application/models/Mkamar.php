<?php

class Mkamar extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('kode_kamar','nama');

        $sql = "SELECT * FROM ms_kamar";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_kamar($kode_kamar){
		$this->db->where('kode_kamar',$kode_kamar);
		$this->db->delete('ms_kamar');
	}

	function simpan_data_kamar($data_kamar){

		$this->db->replace('ms_kamar',$data_kamar);
	}
    
    function update_data_kamar($kode_kamar,$data_kamar){
        
        $this->db->where('kode_kamar',$kode_kamar);
		$this->db->update('ms_kamar',$data_kamar);
	}

    function query_kamar($kode_kamar){
        $data = array();
		$data=$this->db->query("SELECT * from ms_kamar where kode_kamar ='$kode_kamar'")->row_array();
		return $data;
	}

	
}