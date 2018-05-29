<?php

class Mwalikelas extends CI_Model 
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
		
        $cols = array('trans_walikelas.id_thn_ajar','ms_kelasdt.kode_kelas', 'trans_walikelas.id_guru','ms_guru.nama_lengkap');

		$sql = "select trans_walikelas.id, trans_walikelas.id_thn_ajar,ms_kelasdt.kode_kelas, trans_walikelas.id_guru, ms_guru.nama_lengkap
				from trans_walikelas
				right join ms_kelasdt on trans_walikelas.kode_kelas = ms_kelasdt.kode_kelas and trans_walikelas.id_thn_ajar = '$thn_ajar_aktif'
				left join ms_guru on trans_walikelas.id_guru = ms_guru.no_reg";

					

            if($param!=null){

                $sql .= " where ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		
		// echo "$sql";
		// 			exit();
		return $this->db->query($sql)->result();
	}

    function get_eksport_list_data($param,$thn_ajar_aktif){
		
        $cols = array('trans_walikelas.id_thn_ajar','ms_kelasdt.kode_kelas', 'trans_walikelas.id_guru','ms_guru.nama_lengkap');

		$sql = "select trans_walikelas.id, trans_walikelas.id_thn_ajar,ms_kelasdt.kode_kelas, trans_walikelas.id_guru, ms_guru.nama_lengkap
				from trans_walikelas
				right join ms_kelasdt on trans_walikelas.kode_kelas = ms_kelasdt.kode_kelas and trans_walikelas.id_thn_ajar = '$thn_ajar_aktif'
				left join ms_guru on trans_walikelas.id_guru = ms_guru.no_reg";

					

            if($param!=null){

                $sql .= " where ".$param;
                
            }
		

		// $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		
		// echo "$sql";
		// 			exit();
		return $this->db->query($sql)->result();
	}

	function query_get_walikelas($thn_ajar_aktif,$kode_kelas){
		
        $data = array();
		$data=$this->db->query("select trans_walikelas.id, trans_walikelas.id_thn_ajar,ms_kelasdt.kode_kelas, trans_walikelas.id_guru, ms_guru.nama_lengkap
								from trans_walikelas
								right join ms_kelasdt on trans_walikelas.kode_kelas = ms_kelasdt.kode_kelas and trans_walikelas.id_thn_ajar = '$thn_ajar_aktif'
								left join ms_guru on trans_walikelas.id_guru = ms_guru.no_reg
								where ms_kelasdt.kode_kelas = '$kode_kelas'")->row_array();
		// $data = $this->db->last_query();
		// var_dump($data);
		// exit();	
		return $data;
	}
	
	function simpan_data($data){

		$this->db->insert('trans_walikelas',$data);
	}
    
    function update_data($id,$thn_ajar_aktif,$kode_kelas,$data){
        
        $this->db->where('id',$id);
        $this->db->where('id_thn_ajar',$thn_ajar_aktif);
        $this->db->where('kode_kelas',$kode_kelas);
		$this->db->update('trans_walikelas',$data);
	}
	
}