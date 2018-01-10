<?php

class Mbebankerja extends CI_Model 
{

	public function __construct() {

		// Call the CI_Model constructor
		parent::__construct();
	}
	
	function get_kurikulum($id) {
		$this->db->where('id',$id);
		return $this->db->get('ms_tahun_ajaran')->row();
	}

	function get_jumlah_beban($id_guru,$thn_ajar_aktif,$semester_aktif) {
		$data = array();
		$data=$this->db->query("SELECT * 
								FROM trans_jadwal_pelajaran
								where id_guru ='$id_guru' 
								and id_thn_ajar ='$thn_ajar_aktif' 
								and semester ='$semester_aktif'")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}

    function get_list_data($param,$sortby=0,$sorttype='desc',$thn_ajar_aktif,$semester_aktif){
		
        $cols = array('no_reg','nama_lengkap','materi_diampu');

		$sql = "SELECT ms_guru.id_guru, ms_guru.no_reg, ms_guru.nama_lengkap, ms_guru.materi_diampu, ms_bebanguru.jml_beban, ms_bebanguru.id_thn_ajar, ms_bebanguru.semester
				FROM ms_guru 
				LEFT JOIN ms_bebanguru ON ms_guru.id_guru =  ms_bebanguru.id_guru AND ms_bebanguru.id_thn_ajar = '$thn_ajar_aktif' AND ms_bebanguru.semester = '$semester_aktif'
				WHERE ms_guru.is_pengajar=1";

					// echo "$sql";
					// exit();

            if($param!=null){

                $sql .= " AND ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}

	function query_get_bebankerja($id_guru,$thn_ajar_aktif,$semester_aktif){
		
        $data = array();
		$data=$this->db->query("SELECT ms_guru.id_guru, ms_guru.no_reg, ms_guru.nama_lengkap, ms_guru.materi_diampu, ms_bebanguru.jml_beban, ms_bebanguru.id_thn_ajar, ms_bebanguru.semester
								FROM ms_guru 
								LEFT JOIN ms_bebanguru ON ms_guru.id_guru =  ms_bebanguru.id_guru AND ms_bebanguru.id_thn_ajar = '$thn_ajar_aktif' AND ms_bebanguru.semester = '$semester_aktif'
								WHERE ms_guru.is_pengajar='1'
								and ms_guru.id_guru = '$id_guru'")->row_array();
		// var_dump($data);
		// exit();
		return $data;
	}
	
	function simpan_data($data){

		$this->db->insert('ms_bebanguru',$data);
	}
    
    function update_data($id_guru,$thn_ajar_aktif,$semester,$data){
        
        $this->db->where('id_guru',$id_guru);
        $this->db->where('id_thn_ajar',$thn_ajar_aktif);
        $this->db->where('semester',$semester);
		$this->db->update('ms_bebanguru',$data);
	}
	
}