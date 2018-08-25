<?php

class Mljadwalpelajaran extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }
    
    function get_thn_ajar(){
		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran order by id desc Limit 3 ");
		return $data;
    }
    
    function get_kurikulum($id) {
		$this->db->where('id',$id);
		return $this->db->get('ms_tahun_ajaran')->row();
    }
    
    function get_kelas($id_thn_ajar) {
        $data = array();
		    $data = $this->db->query ("SELECT * FROM ms_kelasdt ORDER BY kode_kelas DESC")->result();
        return $data;
        // return $query;
				
    }

    function mget_datarow($id_thn_ajar,$semester,$santri,$kode_kelas,$hari,$jam) {
        $data = array();
		    $data = $this->db->query ("SELECT a.id_mapel,b.no_reg 
        FROM trans_jadwal_pelajaran a
        INNER JOIN ms_guru b on a.id_guru = b.id_guru
        where a.id_thn_ajar = '$id_thn_ajar' and a.semester ='$semester' and a.santri='$santri' and a.kode_kelas ='$kode_kelas' and a.hari='$hari' and a.jam='$jam' and a.kategori = 'UTAMA'")->result();
        // $data = $this->db->last_query($data);
        // var_dump($data);
        // exit();
        return $data;
        // return $query;
				
    }
}
