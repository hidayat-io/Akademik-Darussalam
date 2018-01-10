<?php

class Mjadwal_pelajaran_sore extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }
    
    function get_thn_ajar(){
		// $data = $this->db->query ("SELECT * FROM ms_tahun_ajaran where kategori='SORE' order by id desc Limit 2 ");
		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran  order by id desc Limit 3 ");
		return $data;
	}

    function get_kelas(){
		$data = $this->db->query ("SELECT * FROM ms_kelas");
		return $data;
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('santri','semester','deskripsi','nama');

        $sql = "SELECT DISTINCT a.kode_kelas,c.tingkat, c.tipe_kelas,c.nama, a.santri, a.semester, a.id_thn_ajar, b.deskripsi, c.nama
                FROM trans_jadwal_pelajaran a
                INNER JOIN ms_tahun_ajaran b ON b.id = a.id_thn_ajar
                INNER JOIN ms_kelas c ON c.kode_kelas=a.kode_kelas";
                    

                if($param!=null){
                    
                    // $sql .= " WHERE ".$param;
                    $sql .= " WHERE a.kategori ='SORE'".$param;
                    
                }
                else
                {
                    $sql .= " WHERE a.kategori ='SORE'";
                }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		// echo $sql;
		// exit();

		return $this->db->query($sql)->result();
	}
	
	function delete_jadwal_pelajaran_sore($kode_kelas,$santri,$id_thn_ajar,$semester){
		$this->db->where('kode_kelas',$kode_kelas);
		$this->db->where('santri',$santri);
		$this->db->where('id_thn_ajar',$id_thn_ajar);
		$this->db->where('semester',$semester);
		$this->db->delete('trans_jadwal_pelajaran');
	}

	function simpan_data_jadwal_pelajaran_sore($data_jadwal_pelajaran_sore){

		$this->db->replace('trans_jadwal_pelajaran',$data_jadwal_pelajaran_sore);
	}
    
    // function update_data_jadwal_pelajaran_sore($id_jadwal,$data_jadwal_pelajaran_sore){
        
		//     $this->db->where('id_jadwal',$id_jadwal);
		// 	$this->db->update('ms_jadwal_pelajaran',$data_jadwal_pelajaran_sore);
	// }

    function query_jadwal_pelajaran_sore($kode_kelas,$santri,$id_thn_ajar,$semester,$id_mapel){
        $data = array();
		$data=$this->db->query("SELECT a.kode_kelas,a.id_guru, a.jam, a.hari, a.id_mapel, d.nama_matpal 
								FROM trans_jadwal_pelajaran a 
								INNER JOIN ms_kelas b ON a.kode_kelas = b.kode_kelas 
								INNER JOIN ms_tahun_ajaran c ON a.id_thn_ajar = c.id 
								INNER JOIN ms_mata_pelajaran d ON a.id_mapel = d.id_matpal 
								where a.kode_kelas ='$kode_kelas' 
								and a.santri ='$santri' 
								and a.id_thn_ajar ='$id_thn_ajar' 
								and a.semester ='$semester'
								and a.id_mapel ='$id_mapel'")->row_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}

    function query_cek_duplicate_data($id_thn_ajar,$santri,$semester,$kode_kelas){
        $data = array();
		$data=$this->db->query("SELECT * FROM trans_jadwal_pelajaran
								WHERE santri = '$santri'
								AND id_thn_ajar = '$id_thn_ajar'
								AND semester = '$semester'
								AND kode_kelas = '$kode_kelas'")->row_array();
								return $data;
	}

	function QueryGetKurikulumSM1($id_thn_ajar,$tingkat,$tipe_kelas,$kode_kelas,$santri){
        $data = array();
		// $data=$this->db->query("SELECT DISTINCT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas, a.sm_1, a.sm_2, e.`hari`, e.`id_guru`, e.`jam`, e.`kode_kelas`
		// 						FROM trans_kurikulum a 
		// 						INNER JOIN ms_tahun_ajaran b ON a.id_thn_ajar = b.id 
		// 						INNER JOIN ms_mata_pelajaran c ON a.id_mapel=c.id_matpal 
		// 						INNER JOIN trans_jadwal_pelajaran e ON a.id_thn_ajar = e.id_thn_ajar AND a.`id_mapel` = e.`id_mapel`
		// 						where a.id_thn_ajar ='$id_thn_ajar'
		// 						and a.tingkat = '$tingkat'
		// 						and a.tipe_kelas = '$tipe_kelas'
		// 						AND e.kode_kelas = '$kode_kelas' 
		// 						AND e.santri ='$santri'
		// 						and a.sm_1 > 0
		// 						ORDER BY b.id, e.id_mapel, e.kode_kelas, e.santri")->result_array();
		$data=$this->db->query("SELECT DISTINCT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas, a.sm_1, a.sm_2, e.`hari`, e.`id_guru`, e.`jam`, e.`kode_kelas`
								FROM trans_kurikulum a 
								INNER JOIN ms_tahun_ajaran b ON a.id_thn_ajar = b.id 
								INNER JOIN ms_mata_pelajaran c ON a.id_mapel=c.id_matpal 
								INNER JOIN trans_jadwal_pelajaran e ON a.id_thn_ajar = e.id_thn_ajar AND a.`id_mapel` = e.`id_mapel`
								where a.id_thn_ajar ='$id_thn_ajar'
								and a.tingkat = '$tingkat'
								and a.tipe_kelas = '$tipe_kelas'
								and a.kategori = 'SORE'
								AND e.kode_kelas = '$kode_kelas' 
								AND e.santri ='$santri'
								and a.sm_1 > 0
								ORDER BY b.id, e.id_mapel, e.kode_kelas, e.santri")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
	function QueryGetKurikulumSM2($id_thn_ajar,$tingkat,$tipe_kelas,$kode_kelas,$santri){
        $data = array();
		// $data=$this->db->query("SELECT DISTINCT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas, a.sm_1, a.sm_2, e.`hari`, e.`id_guru`, e.`jam`, e.`kode_kelas`
		// 						FROM trans_kurikulum a 
		// 						INNER JOIN ms_tahun_ajaran b ON a.id_thn_ajar = b.id 
		// 						INNER JOIN ms_mata_pelajaran c ON a.id_mapel=c.id_matpal 
		// 						INNER JOIN trans_jadwal_pelajaran e ON a.id_thn_ajar = e.id_thn_ajar AND a.`id_mapel` = e.`id_mapel`
		// 						where a.id_thn_ajar ='$id_thn_ajar'
		// 						and a.tingkat = '$tingkat'
		// 						and a.tipe_kelas = '$tipe_kelas'
		// 						AND e.kode_kelas = '$kode_kelas' 
		// 						AND e.santri ='$santri'
		// 						and a.sm_2 > 0
		// 						ORDER BY b.id, e.id_mapel, e.kode_kelas, e.santri")->result_array();
		$data=$this->db->query("SELECT DISTINCT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas, a.sm_1, a.sm_2, e.`hari`, e.`id_guru`, e.`jam`, e.`kode_kelas`
								FROM trans_kurikulum a 
								INNER JOIN ms_tahun_ajaran b ON a.id_thn_ajar = b.id 
								INNER JOIN ms_mata_pelajaran c ON a.id_mapel=c.id_matpal 
								INNER JOIN trans_jadwal_pelajaran e ON a.id_thn_ajar = e.id_thn_ajar AND a.`id_mapel` = e.`id_mapel`
								where a.id_thn_ajar ='$id_thn_ajar'
								and a.tingkat = '$tingkat'
								and a.tipe_kelas = '$tipe_kelas'
								and a.kategori = 'SORE'
								AND e.kode_kelas = '$kode_kelas' 
								AND e.santri ='$santri'
								and a.sm_2 > 0
								ORDER BY b.id, e.id_mapel, e.kode_kelas, e.santri")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
	function QueryGetKurikulumSM1Tambah($id_thn_ajar,$tingkat,$tipe_kelas){
        $data = array();
		// $data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2  
		// 						from trans_kurikulum a
		// 						inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
        //         				inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
		// 						where a.id_thn_ajar ='$id_thn_ajar'
		// 						and a.tingkat = '$tingkat'
		// 						and a.tipe_kelas = '$tipe_kelas'
		// 						and a.sm_1 > 0")->result_array();
		$data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2  
								from trans_kurikulum a
								inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
                				inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
								where a.id_thn_ajar ='$id_thn_ajar'
								and a.tingkat = '$tingkat'
								and a.tipe_kelas = '$tipe_kelas'
								and a.kategori = 'SORE'
								and a.sm_1 > 0")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
	function QueryGetKurikulumSM2Tambah($id_thn_ajar,$tingkat,$tipe_kelas){
        $data = array();
		// $data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal,a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2  
		// 						from trans_kurikulum a
		// 						inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
        //         				inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
		// 						where a.id_thn_ajar ='$id_thn_ajar'
		// 						and a.tingkat = '$tingkat'
		// 						and a.tipe_kelas = '$tipe_kelas'
		// 						and a.sm_2 > 0")->result_array();
		$data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal,a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2  
								from trans_kurikulum a
								inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
                				inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
								where a.id_thn_ajar ='$id_thn_ajar'
								and a.tingkat = '$tingkat'
								and a.tipe_kelas = '$tipe_kelas'
								and a.kategori = 'SORE'
								and a.sm_2 > 0")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
}