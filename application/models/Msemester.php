<?php

class Msemester extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('semester');

        $sql = "SELECT DISTINCT semester FROM ms_semester";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function simpan_item_bulan($detail_bulan){

		$this->db->replace('ms_semester',$detail_bulan);
	}
    
    function delete_item_bulan($semester){
		$this->db->where('semester',$semester);
		$this->db->delete('ms_semester');
	}

    function query_semester($nomor_statistik){
        $data = array();
		$data=$this->db->query("SELECT * from ms_semester where nomor_statistik ='$nomor_statistik'")->row_array();
        return $data;
    }
        
    function query_edit_semester($semester){
        $data = array();
		$data=$this->db->query("SELECT * from ms_semester where semester ='$semester'")->row_array();
		return $data;
    }
    
    function query_bulan($semester){
		$this->db->select('id_semester, semester , bulan');
        $this->db->from('ms_semester');
        $this->db->where('semester',$semester);
        // echo $this->db->last_query();
        // exit();
        return $this->db->get()->result();
        
    }
    
    function query_cekbulan($bulan){
		$this->db->select('id_semester, semester , bulan');
        $this->db->from('ms_semester');
        $this->db->where('bulan',$bulan);
        // echo $this->db->last_query();
        // exit();
        return $this->db->get()->result();
        
	}

}