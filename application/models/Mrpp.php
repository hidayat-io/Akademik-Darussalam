<?php

class Mrpp extends CI_Model 
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

   
    function get_list_data($param,$sortby=1,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('santri','id_mapel','semester','nama_lengkap','deskripsi','nama','santri');

        $sql = "SELECT DISTINCT a.id_rpp, a.kode_kelas,a.id_guru,e.tingkat, e.tipe_kelas,c.nama, a.santri, a.semester, a.id_thn_ajar, a.id_mapel, b.deskripsi, c.nama, d.nama_lengkap
                FROM trans_rpp a
                INNER JOIN ms_tahun_ajaran b ON b.id = a.id_thn_ajar
                INNER JOIN ms_kelasDT c ON c.kode_kelas=a.kode_kelas
				INNER JOIN ms_guru d ON d.id_guru=a.id_guru
				INNER JOIN ms_kelasHD e ON c.id_kelas=e.id_kelas";
				
                    

            if($param!=null){
                    
                    $sql .= " WHERE ".$param;
                    // $sql .= " WHERE b.kategori ='UTAMA'".$param;
                    
                }
                // else
                // {
                //     $sql .= " WHERE b.kategori ='UTAMA'";
                // }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		// echo $sql;
		// exit();

		return $this->db->query($sql)->result();
	}
	
	function delete_rpp($id_rpp){
		$this->db->where('id_rpp',$id_rpp);
		$this->db->delete('trans_rpp');
	}
	function delete_rpp_dt($id_rpp){
		$this->db->where('id_rpp',$id_rpp);
		$this->db->delete('trans_rpp_detail');
	}

	function simpan_data_rpp($data_rpp){
		$id = $this->db->insert('trans_rpp',$data_rpp);
		return $this->db->insert_id();
	}

	function simpan_data_rpp_dt($data_rpp_dt)
	{
		$this->db->insert('trans_rpp_detail',$data_rpp_dt);
		
	}
    
    // function update_data_rpp($id_jadwal,$data_rpp){
        
		//     $this->db->where('id_jadwal',$id_jadwal);
		// 	$this->db->update('ms_rpp',$data_rpp);
	// }

    // function query_rpp($kode_kelas,$santri,$id_thn_ajar,$semester,$id_mapel){
        // $data = array();
		// $data=$this->db->query("SELECT a.kode_kelas,a.id_guru, a.jam, a.hari, a.id_mapel, d.nama_matpal 
		// 						FROM trans_rpp a 
		// 						INNER JOIN ms_kelas b ON a.kode_kelas = b.kode_kelas 
		// 						INNER JOIN ms_tahun_ajaran c ON a.id_thn_ajar = c.id 
		// 						INNER JOIN ms_mata_pelajaran d ON a.id_mapel = d.id_matpal 
		// 						where a.kode_kelas ='$kode_kelas' 
		// 						and a.santri ='$santri' 
		// 						and a.id_thn_ajar ='$id_thn_ajar' 
		// 						and a.semester ='$semester'
		// 						and a.id_mapel ='$id_mapel'")->row_array();
		// 						// echo $this->db->last_query();
		// 						// exit();
		// return $data;
	// }

    function query_cek_duplicate_data($id_thn_ajar,$santri,$semester,$kode_kelas,$mt_pelajaran){
        $data = array();
		$data=$this->db->query("SELECT * FROM trans_rpp
								WHERE id_thn_ajar = '$id_thn_ajar'
								AND santri = '$santri'
								AND semester = '$semester'
								AND id_mapel = '$mt_pelajaran'
								AND kode_kelas = '$kode_kelas'")->row_array();
								// echo $this->db->last_query();
								// exit();
								return $data;
	}

	// function QueryGetRPPSM1($id_thn_ajar,$tingkat,$tipe_kelas,$santri,$kode_kelas,$mt_pelajaran){
		//     $data = array();
		// 	$data=$this->db->query("SELECT DISTINCT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas, a.sm_1, a.sm_2, e.`hari`, e.`id_guru`, e.`jam`, e.`kode_kelas`
		// 							FROM trans_kurikulum a 
		// 							INNER JOIN ms_tahun_ajaran b ON a.id_thn_ajar = b.id 
		// 							INNER JOIN ms_mata_pelajaran c ON a.id_mapel=c.id_matpal 
		// 							INNER JOIN trans_rpp e ON a.id_thn_ajar = e.id_thn_ajar AND a.`id_mapel` = e.`id_mapel`
		// 							where a.id_thn_ajar ='$id_thn_ajar'
		// 							and a.tingkat = '$tingkat'
		// 							and a.tipe_kelas = '$tipe_kelas'
		// 							and b.kategori = 'UTAMA'
		// 							AND e.kode_kelas = '$kode_kelas' 
		// 							AND e.santri ='$santri'
		// 							and a.sm_1 > 0
		// 							ORDER BY b.id, e.id_mapel, e.kode_kelas, e.santri")->result_array();
		// 	// $data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2  
		// 	// 						from trans_kurikulum a
		// 	// 						inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
		//     //         				inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
		// 	// 						where a.id_thn_ajar ='$id_thn_ajar'
		// 	// 						and a.tingkat = '$tingkat'
		// 	// 						and a.tipe_kelas = '$tipe_kelas'
		// 	// 						and b.kategori = 'UTAMA'
		// 	// 						and a.sm_1 > 0")->result_array();
		// 							// echo $this->db->last_query();
		// 							// exit();
		// 	return $data;
	// }
	// function QueryGetRPPSM2($id_thn_ajar,$tingkat,$tipe_kelas,$santri,$kode_kelas,$mt_pelajaran){
		//     $data = array();
		// 	$data=$this->db->query("SELECT DISTINCT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas, a.sm_1, a.sm_2, e.`hari`, e.`id_guru`, e.`jam`, e.`kode_kelas`
		// 							FROM trans_kurikulum a 
		// 							INNER JOIN ms_tahun_ajaran b ON a.id_thn_ajar = b.id 
		// 							INNER JOIN ms_mata_pelajaran c ON a.id_mapel=c.id_matpal 
		// 							INNER JOIN trans_rpp e ON a.id_thn_ajar = e.id_thn_ajar AND a.`id_mapel` = e.`id_mapel`
		// 							where a.id_thn_ajar ='$id_thn_ajar'
		// 							and a.tingkat = '$tingkat'
		// 							and a.tipe_kelas = '$tipe_kelas'
		// 							and b.kategori = 'UTAMA'
		// 							AND e.kode_kelas = '$kode_kelas' 
		// 							AND e.santri ='$santri'
		// 							and a.sm_2 > 0
		// 							ORDER BY b.id, e.id_mapel, e.kode_kelas, e.santri")->result_array();
		// 							// echo $this->db->last_query();
		// 							// exit();
		// 	return $data;
	// }
	function QueryGetRPPSM($id_rpp){
        $data = array();
		$data=$this->db->query("SELECT * from trans_rpp_detail where id_rpp = '$id_rpp' order by id_rpp_dtl")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
	function _GetRPPSM1Tambah($id_thn_ajar,$semester,$tingkat,$tipe_kelas,$santri,$id_guru,$kode_kelas,$mt_pelajaran){
        $data = array();
		$data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2, d.hari, d.jam, e.semester, e.bulan, f.minggu
								from trans_kurikulum a
								inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
								inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
								inner join trans_jadwal_pelajaran d on a.id_mapel=d.id_mapel
                                inner join ms_semester e on d.semester = e.semester
								join ms_minggu f
								where a.id_thn_ajar ='$id_thn_ajar'
								and a.tingkat = '$tingkat'
								and a.tipe_kelas = '$tipe_kelas'
								and d.santri = '$santri'
								and d.kode_kelas = '$kode_kelas'
								and d.id_mapel = '$mt_pelajaran'
								and d.id_guru = '$id_guru'
								and a.sm_1 > 0
								order by e.id_semester, f.id_minggu asc")->result_array();
	// function _GetRPPSM1Tambah($id_thn_ajar,$tingkat,$tipe_kelas,$santri,$kode_kelas,$mt_pelajaran){
    //     $data = array();
	// 	$data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2, d.hari, d.jam, e.semester, e.bulan, f.minggu
	// 							from trans_kurikulum a
	// 							inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
	// 							inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
	// 							inner join trans_jadwal_pelajaran d on a.id_mapel=d.id_mapel
    //                             inner join ms_semester e on d.semester = e.semester
	// 							join ms_minggu f
	// 							where a.id_thn_ajar ='$id_thn_ajar'
	// 							and a.tingkat = '$tingkat'
	// 							and a.tipe_kelas = '$tipe_kelas'
	// 							and b.kategori = 'UTAMA'
	// 							and d.santri = '$santri'
	// 							and d.kode_kelas = '$kode_kelas'
	// 							and d.id_mapel = '$mt_pelajaran'
	// 							and a.sm_1 > 0
	// 							order by e.id_semester, f.id_minggu asc")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
	function _GetRPPSM2Tambah($id_thn_ajar,$semester,$tingkat,$tipe_kelas,$santri,$id_guru,$kode_kelas,$mt_pelajaran){
        $data = array();
		$data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2, d.hari, d.jam, e.semester, e.bulan, f.minggu
								from trans_kurikulum a
								inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
								inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
								inner join trans_jadwal_pelajaran d on a.id_mapel=d.id_mapel
                                inner join ms_semester e on d.semester = e.semester
								join ms_minggu f
								where a.id_thn_ajar ='$id_thn_ajar'
								and a.tingkat = '$tingkat'
								and a.tipe_kelas = '$tipe_kelas'
								and d.santri = '$santri'
								and d.kode_kelas = '$kode_kelas'
								and d.id_mapel = '$mt_pelajaran'
								and d.id_guru = '$id_guru'
								and a.sm_2 > 0
								order by e.id_semester, f.id_minggu asc")->result_array();
		// $data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2, d.hari, d.jam, e.semester, e.bulan, f.minggu
		// 						from trans_kurikulum a
		// 						inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
		// 						inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
		// 						inner join trans_jadwal_pelajaran d on a.id_mapel=d.id_mapel
        //                         inner join ms_semester e on d.semester = e.semester
		// 						join ms_minggu f
		// 						where a.id_thn_ajar ='$id_thn_ajar'
		// 						and a.tingkat = '$tingkat'
		// 						and a.tipe_kelas = '$tipe_kelas'
		// 						and b.kategori = 'UTAMA'
		// 						and d.santri = '$santri'
		// 						and d.kode_kelas = '$kode_kelas'
		// 						and d.id_mapel = '$mt_pelajaran'
		// 						and a.sm_2 > 0
		// 						order by e.id_semester, f.id_minggu asc")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
}