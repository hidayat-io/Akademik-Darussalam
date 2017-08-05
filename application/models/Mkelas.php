<?php

class Mkelas extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('kode_kelas','nama');

        $sql = "SELECT * FROM ms_kelas";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_kelas($kode_kelas){
		$this->db->where('kode_kelas',$kode_kelas);
		$this->db->delete('ms_kelas');
	}

	function simpan_data_kelas($data_kelas){

		$this->db->replace('ms_kelas',$data_kelas);
	}
    
    function update_data_kelas($kode_kelas,$data_kelas){
        
        $this->db->where('kode_kelas',$kode_kelas);
		$this->db->update('ms_kelas',$data_kelas);
	}

    function query_kelas($kode_kelas){
        $data = array();
		$data=$this->db->query("SELECT * from ms_kelas where kode_kelas ='$kode_kelas'")->row_array();
		return $data;
		// $this->db->select('*');
        // $this->db->from('ms_kelas');
        // $this->db->where('kode_kelas',$kode_kelas);
        
        // return $this->db->get()->result();
	}

	
}