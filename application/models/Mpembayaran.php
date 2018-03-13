<?php

class Mpembayaran extends CI_Model 
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
	
	function delete_pembayaran($kode_pembayaran){
		$this->db->where('id_soal',$kode_pembayaran);
		$this->db->delete('ms_banksoal');
	}

	function simpan_data_pembayaran($data_pembayaran){

		$this->db->replace('ms_banksoal',$data_pembayaran);
	}
    
    function update_data_pembayaran($kode_pembayaran,$data_pembayaran){
        
        $this->db->where('id_soal',$kode_pembayaran);
		$this->db->update('ms_banksoal',$data_pembayaran);
	}

    function query_pembayaran($id_matpal,$tingkat){
        $data = array();
		$data=$this->db->query("SELECT * from ms_banksoal where id_matpal ='$id_matpal' AND tingkat ='$tingkat'")->row_array();
		return $data;
        
        // return $this->db->get()->result();
	}

    function query_get_pembayaran($id_soal){
        $data = array();
		$data=$this->db->query("SELECT * from ms_banksoal where id_soal ='$id_soal'")->row_array();
		return $data;
        
        // return $this->db->get()->result();
	}

	
}