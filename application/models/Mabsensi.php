<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mabsensi extends CI_Model {

	public function __construct(){

        parent::__construct();
    }
	
	function get_grid_kelas($param,$sortby=0,$sorttype='desc'){

        $cols = array('kl.kode_kelas','kl.nama','kl.tingkat','kl.tipe_kelas','jp.hari','jp.jam','pl.nama_matpal','gr.nama_lengkap');

        $sql = "SELECT jp.id_jadwal,
					kl.nama, 
					kl.kode_kelas, 
					kl.tingkat, 
					kl.tipe_kelas, 
					pl.nama_matpal, 
					gr.nama_lengkap, 
					jp.hari, 
					jp.jam 
				FROM   ms_kelas kl 
					INNER JOIN trans_jadwal_pelajaran jp 
							ON kl.kode_kelas = jp.kode_kelas 
					INNER JOIN ms_guru gr 
							ON jp.id_guru = gr.id_guru 
					INNER JOIN ms_mata_pelajaran pl 
							ON jp.id_mapel = pl.id_matpal ";

		if($param!=null){

			$sql .= " WHERE ".$param;
		}

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype." ,
						kl.tingkat, 
						kl.kode_kelas, 
						Field(jp.hari, 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'AHAD'), 
						jp.jam, 
						pl.nama_matpal, 
						gr.nama_lengkap";

        return $this->db->query($sql)->result();
	}
}