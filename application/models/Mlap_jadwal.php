<?php

class Mlap_jadwal extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();

	}
  function get_thn_ajar(){
		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran order by id desc Limit 3 ");
		// $data = $this->db->query ("SELECT * FROM ms_tahun_ajaran where kategori='UTAMA' order by id desc Limit 2 ");
		return $data;
    }
    
  function get_kurikulum($id) {
		$this->db->where('id',$id);
		return $this->db->get('ms_tahun_ajaran')->row();
	}

  
}