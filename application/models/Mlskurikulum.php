<?php
//ok
class Mlskurikulum extends CI_Model 
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
    
    function mcek_trans_kurikulum($id_thn_ajar,$kategori){
        $data = array();
        $data=$this->db->query("SELECT * from trans_kurikulum where id_thn_ajar='$id_thn_ajar' and kategori='$kategori'")->result_array();
        return $data;
    }
    
    function mprint_skurikulum_utama_header($id_thn_ajar) {
        $data = array();
		    $data = $this->db->query ("SELECT tingkat, tipe_kelas FROM ms_kelashd ORDER BY tingkat, tipe_kelas DESC")->result();
        return $data;
        
        // $query = $this->db->query("SELECT tingkat, tipe_kelas FROM ms_kelashd ORDER BY tingkat");
        // return $query;
				
    }

    function mprint_skurikulum_utama_row($id_thn_ajar,$kategori) {
        $data = array();
        // $data = $this->db->query ("SELECT a.id_bidang, a.nama_bidang, b.id_matpal as id_mapel, b.nama_matpal, b.status
        // 							FROM ms_bidang_study a 
        // 							INNER JOIN ms_mata_pelajaran b ON a.id_bidang = b.id_bidang 
        // 							WHERE b.status = 1 and a.kategori = 'UTAMA' order by a.id_bidang asc")->result();
        $data = $this->db->query ("SELECT DISTINCT c.nama_bidang, b.nama_matpal, a.id_mapel
                                from trans_kurikulum a
                                inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
                                inner join ms_bidang_study c on b.id_bidang = c.id_bidang where a.id_thn_ajar = '$id_thn_ajar' and  a.kategori = '$kategori' order by b.id_bidang, a.id_mapel ASC")->result();
		return $data;
				
    }

    function mprint_kurikulum_utama_pertingkat_row($id_thn_ajar,$kategori) {
		$data = array();
		$data = $this->db->query ("SELECT DISTINCT b.nama_matpal, a.id_mapel
                                from trans_kurikulum a
                                inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
                                where a.id_thn_ajar = '$id_thn_ajar' order by b.id_bidang, a.id_mapel ASC")->result();
                                // where a.id_thn_ajar = '$id_thn_ajar' and  a.kategori = '$kategori' order by b.id_bidang, a.id_mapel ASC")->result();
		return $data;
				
    }

    function mget_datasm($id_thn_ajar,$dt_tingkat,$dt_tipe_kelas,$dt_id_mapel){
      $data = array();
      $data = $this->db->query("SELECT sm_1,sm_2 FROM trans_kurikulum WHERE id_thn_ajar = '$id_thn_ajar' AND tingkat= '$dt_tingkat' AND tipe_kelas='$dt_tipe_kelas' AND id_mapel='$dt_id_mapel'")->result();
      return $data;
      // $data = $this->db->last_query($data);
      // var_dump($data);
    }
}
