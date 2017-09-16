<?php

class Mmsconfig extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('nomor_statistik','NPSN','nama','jenis_lembaga');

        $sql = "SELECT * FROM ms_config";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function simpan_data_msconfig($data_msconfig){

		$this->db->replace('ms_config',$data_msconfig);
	}
    
    function update_data_msconfig($id_config,$data_msconfig){
        // var_dump($id_config,$data_msconfig);
        // exit();
        $this->db->where('id_config',$id_config);
		$this->db->update('ms_config',$data_msconfig);
	}

    function query_msconfig($nomor_statistik){
        $data = array();
		$data=$this->db->query("SELECT * from ms_config where nomor_statistik ='$nomor_statistik'")->row_array();
        return $data;
    }
        
    function query_edit_msconfig($id_config){
        $data = array();
		$data=$this->db->query("SELECT * from ms_config where id_config ='$id_config'")->row_array();
		return $data;
	}

}