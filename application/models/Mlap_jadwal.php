<?php

class Mlap_jadwal extends CI_Model 
{

	public function __construct(){

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

 	function get_data_pelajaran($param){

 		$id_guru 	= $param['id_guru'];
 		$hari 		= $param['hari'];
 		$jam 		= $param['jam'];
 		$thn_ajar  	= $param['thn_ajar'];
 		$semester  	= $param['semester'];

 		$sql = "SELECT
							jp.*,
							mp.nama_matpal
						FROM
							trans_jadwal_pelajaran jp
								INNER JOIN ms_guru mg ON jp.id_guru = mg.id_guru
								INNER JOIN ms_mata_pelajaran mp ON jp.id_mapel = mp.id_matpal
						WHERE
							 	jp.id_guru = '".$id_guru."' 
							 	 AND jp.hari = '".$hari."'
							 	 AND jp.jam = '".$jam."'
							 	 AND jp.id_thn_ajar = '".$thn_ajar."'
							 	 AND jp.semester = '".$semester."'
						ORDER BY
							 mp.nama_matpal";

		return $this->db->query($sql);
	}
	 
	function get_data_guru($id_guru){

		if($id_guru!=0){ $where = " WHERE id_guru = '".$id_guru."' "; }else{ $where=""; }

		$sql = "SELECT * FROM ms_guru ".$where." ORDER BY id_guru";

		return $this->db->query($sql);
	}
}