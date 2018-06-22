<?php

class Mnilai extends CI_Model 
{

	public function __construct() {

		// Call the CI_Model constructor
		parent::__construct();
	}

	function get_msguru(){
		$data = $this->db->query ("SELECT * FROM ms_guru ORDER BY no_reg");
		return $data;
    }
	
	function get_kurikulum($id) {
		$this->db->where('id',$id);
		return $this->db->get('ms_tahun_ajaran')->row();
	}

    function get_list_data($param,$sortby=0,$sorttype='asc',$thn_ajar_aktif){
				
        $cols = array('trans_jadwal_pelajaran.id_thn_ajar', 'trans_jadwal_pelajaran.semester,ms_kelashd.tingkat', 'ms_kelashd.tipe_kelas',  'trans_jadwal_pelajaran.santri');

		$sql = "SELECT trans_jadwal_pelajaran.id_thn_ajar,ms_tahun_ajaran.deskripsi, trans_jadwal_pelajaran.semester,  ms_kelashd.tingkat, ms_kelashd.tipe_kelas, trans_jadwal_pelajaran.santri, trans_jadwal_pelajaran.kode_kelas,  ms_kelasdt.nama,
				trans_jadwal_pelajaran.id_guru,ms_guru.nama_lengkap, trans_jadwal_pelajaran.id_mapel,ms_mata_pelajaran.nama_matpal, trans_jadwal_pelajaran.kategori
				from trans_jadwal_pelajaran
				inner join ms_kelasdt on trans_jadwal_pelajaran.kode_kelas = ms_kelasdt.kode_kelas and trans_jadwal_pelajaran.id_thn_ajar = '$thn_ajar_aktif'
				inner join ms_kelashd on ms_kelasdt.id_kelas = ms_kelashd.id_kelas
				inner join ms_guru on trans_jadwal_pelajaran.id_guru = ms_guru.id_guru
				inner join ms_mata_pelajaran on trans_jadwal_pelajaran.id_mapel = ms_mata_pelajaran.id_matpal
				inner join ms_tahun_ajaran on trans_jadwal_pelajaran.id_thn_ajar = ms_tahun_ajaran.id";

					

            if($param!=null){

                $sql .= " where ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		
		// echo "$sql";
		// 			exit();
		return $this->db->query($sql)->result();
	}

    function get_list_data_listsantri($param,$sortby=0,$sorttype='asc',$kode_kelas){
				
        $cols = array('no_registrasi', 'nama_lengkap', 'nama_arab');

		$sql = "select no_registrasi, nama_lengkap, nama_arab, kel_sekarang from ms_santri";

					

            if($param!=null){

                $sql .= " where kel_sekarang='$kode_kelas' and kategori='TMI' and isnonaktif is null and no_registrasi not like '%CT%' and ".$param;
                
            }else{
				$sql.= " where kel_sekarang='$kode_kelas' and kategori='TMI' and isnonaktif is null and no_registrasi not like '%CT%'";
			}
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		
		// echo "$sql";
		// 			exit();
		return $this->db->query($sql)->result();
	}

    function get_eksport_list_data($param,$thn_ajar_aktif){
		
        $cols = array('trans_jadwal_pelajaran.id_thn_ajar, trans_jadwal_pelajaran.semester,ms_kelashd.tingkat, ms_kelashd.tipe_kelas,  trans_jadwal_pelajaran.santri');

		$sql = "select trans_nilai.id, trans_nilai.id_thn_ajar,ms_tahun_ajaran.deskripsi,ms_kelasdt.kode_kelas, trans_nilai.id_guru, ms_guru.nama_lengkap
				from trans_nilai
				right join ms_kelasdt on trans_nilai.kode_kelas = ms_kelasdt.kode_kelas and trans_nilai.id_thn_ajar = '$thn_ajar_aktif'
				LEFT OUTER JOIN ms_tahun_ajaran ON trans_nilai.id_thn_ajar = ms_tahun_ajaran.id
				left join ms_guru on trans_nilai.id_guru = ms_guru.no_reg";

					

            if($param!=null){

                $sql .= " where ".$param;
                
            }
		

		// $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		
		// echo "$sql";
		// 			exit();
		return $this->db->query($sql)->result();
	}

	function query_get_data_nilai_by_noregistrasi($no_registrasi){
		
        $data = array();
		$data=$this->db->query("select no_registrasi,nama_lengkap,nama_arab from ms_santri where no_registrasi='$no_registrasi'")->row();
		// $data = $this->db->last_query();
		// var_dump($data);
		// exit();	
		return $data;
	}
	
	function simpan_data($data){

		$this->db->insert('trans_nilai',$data);
	}
    
    function update_data($id,$thn_ajar_aktif,$kode_kelas,$data){
        
        $this->db->where('id',$id);
        $this->db->where('id_thn_ajar',$thn_ajar_aktif);
        $this->db->where('kode_kelas',$kode_kelas);
		$this->db->update('trans_nilai',$data);
	}
	
}