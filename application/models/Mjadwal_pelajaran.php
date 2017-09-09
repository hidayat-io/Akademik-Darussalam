<?php

class Mjadwal_pelajaran extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }
    
    function get_thn_ajar(){
		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran where kategori='UTAMA' order by id desc Limit 2 ");
		return $data;
	}

    function get_kelas(){
		$data = $this->db->query ("SELECT * FROM ms_kelas");
		return $data;
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_jadwal','santri','semester','deskripsi','nama');

        $sql = "SELECT a.id_jadwal, a.santri, a.semester, b.deskripsi, c.nama
                FROM trans_jadwal_pelajaran a
                INNER JOIN ms_tahun_ajaran b ON b.id = a.id_thn_ajar
                INNER JOIN ms_kelas c ON c.kode_kelas=a.kode_kelas";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_jadwal_pelajaran($id_jadwal){
		$this->db->where('id_jadwal',$id_jadwal);
		$this->db->delete('ms_jadwal_pelajaran');
	}

	function simpan_data_jadwal_pelajaran($data_jadwal_pelajaran){

		$this->db->replace('ms_jadwal_pelajaran',$data_jadwal_pelajaran);
	}
    
    function update_data_jadwal_pelajaran($id_jadwal,$data_jadwal_pelajaran){
        
        $this->db->where('id_jadwal',$id_jadwal);
		$this->db->update('ms_jadwal_pelajaran',$data_jadwal_pelajaran);
	}

    function query_jadwal_pelajaran($id_jadwal){
        $data = array();
		$data=$this->db->query("SELECT * from ms_jadwal_pelajaran where id_jadwal ='$id_jadwal'")->row_array();
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

	function QueryGetKurikulumSM1($id_thn_ajar,$tingkat,$tipe_kelas){
        $data = array();
		$data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal, a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2  
								from trans_kurikulum a
								inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
                				inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
								where a.id_thn_ajar ='$id_thn_ajar'
								and a.tingkat = '$tingkat'
								and a.tipe_kelas = '$tipe_kelas'
								and b.kategori = 'UTAMA'
								and a.sm_1 > 0")->result_array();
		return $data;
	}
	function QueryGetKurikulumSM2($id_thn_ajar,$tingkat,$tipe_kelas){
        $data = array();
		$data=$this->db->query("SELECT b.deskripsi, a.id_mapel, c.nama_matpal,a.tingkat, a.tipe_kelas,  a.sm_1, a.sm_2  
								from trans_kurikulum a
								inner join ms_tahun_ajaran b on a.id_thn_ajar = b.id
                				inner join ms_mata_pelajaran c on a.id_mapel=c.id_matpal
								where a.id_thn_ajar ='$id_thn_ajar'
								and a.tingkat = '$tingkat'
								and a.tipe_kelas = '$tipe_kelas'
								and b.kategori = 'UTAMA'
								and a.sm_2 > 0")->result_array();
		return $data;
	}
}