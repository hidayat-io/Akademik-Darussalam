<?php

class Mbiaya extends CI_Model 
{

	public function __construct() {

		// Call the CI_Model constructor
		parent::__construct();
	}
	
#region ms_biaya
	function get_list_data(){     

		$sql = "SELECT DISTINCT ms_biaya_komponen.tipe
                FROM ms_biaya_komponen
				LEFT JOIN ms_biaya ON ms_biaya_komponen.id_komponen = ms_biaya.nama_item
				order by tipe asc";
		

		return $this->db->query($sql)->result();
    }
    
    function get_nominal($kategori) {
		$data = array();
		if($kategori !='')
		{
		$data=$this->db->query("SELECT sum(nominal) AS NOMINAL
								FROM ms_biaya
								WHERE kategori = '$kategori'")->row();
		}
		else {
			$data=$this->db->query("SELECT sum(nominal) AS NOMINAL
								FROM ms_biaya")->row();
		}
		// echo $this->db->last_query();
		// exit();
		return $data;
    }
    
    function get_komponen($tipe){
		$data = array();
		$data = $this->db->query ("SELECT ms_biaya_komponen.id_komponen, ms_biaya_komponen.nama_komponen, ms_biaya_komponen.tipe, ms_biaya_komponen.id_komponen,
                                            ms_biaya.nominal
                                    FROM ms_biaya_komponen 
                                    LEFT JOIN ms_biaya on ms_biaya_komponen.id_komponen = ms_biaya.nama_item
                                    WHERE tipe = '$tipe' ORDER BY id_komponen ASC")->result_array();
		return $data;
    }
	
	function delete_ms_biaya($kategori){
		$this->db->where('kategori',$kategori);
		$this->db->delete('ms_biaya');
	}

	function update_data($data){
		$this->db->insert('ms_biaya',$data);
	}

	function insert_data_histori_ms_biaya($data)
	{
		$this->db->insert('histori_master_biaya',$data);
	}
#endregion ms_biaya

#region potongan
	function get_potongan(){
		$this->db->order_by('rec_date','desc');
		return $this->db->get('ms_biaya_potongan')->row();
	}
	
	function _save_potongan($data_potongan)
	{
		$this->db->insert('ms_biaya_potongan',$data_potongan);
	}
#endregion 
    

}