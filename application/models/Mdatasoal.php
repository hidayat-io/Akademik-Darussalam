<?php

class Mdatasoal extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_matpal','tingkat','soal');

		$sql = "SELECT ms_banksoal.* ,ms_mata_pelajaran.nama_matpal FROM ms_banksoal
				INNER JOIN ms_mata_pelajaran ON ms_banksoal.id_matpal = ms_mata_pelajaran.id_matpal";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_datasoal($kode_datasoal){
		$this->db->where('id_soal',$kode_datasoal);
		$this->db->delete('ms_banksoal');
	}

	function simpan_data_datasoal($data_datasoal){

		$this->db->replace('ms_banksoal',$data_datasoal);
	}
    
    function update_data_datasoal($kode_datasoal,$data_datasoal){
        
        $this->db->where('id_soal',$kode_datasoal);
		$this->db->update('ms_banksoal',$data_datasoal);
	}

    function query_datasoal($id_matpal,$tingkat){
        $data = array();
		$data=$this->db->query("SELECT * from ms_banksoal where id_matpal ='$id_matpal' AND tingkat ='$tingkat'")->row_array();
		return $data;
        
        // return $this->db->get()->result();
	}

    function query_get_datasoal($id_soal){
        $data = array();
		$data=$this->db->query("SELECT * from ms_banksoal where id_soal ='$id_soal'")->row_array();
		return $data;
        
        // return $this->db->get()->result();
	}

	
}