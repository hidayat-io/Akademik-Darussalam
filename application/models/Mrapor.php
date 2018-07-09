<?php

class Mrapor extends CI_Model 
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

	#region PRINT RAPOR
  function get_bid_studi() {
		$data = array();
		$data=$this->db->query("SELECT id_bidang, nama_bidang FROM ms_bidang_study 
		where id_bidang in (select id_bidang 
		from ms_mata_pelajaran 
		inner join trans_kurikulum on ms_mata_pelajaran.id_matpal = trans_kurikulum.id_mapel and trans_kurikulum.kategori='UTAMA')")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}

  function get_matpal() {
		$data = array();
		$data=$this->db->query("SELECT id_bidang,nama_matpal from ms_mata_pelajaran")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
	#ENDREGION PRINT RAPOR

  
}