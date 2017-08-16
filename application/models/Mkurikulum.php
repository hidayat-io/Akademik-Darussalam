<?php

class Mkurikulum extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_kelas(){
		$data = $this->db->query ("SELECT * FROM ms_kelas ORDER BY kode_kelas");
		return $data;
	}

    function get_mapel(){
		$data = $this->db->query ("SELECT * FROM ms_mata_pelajaran ORDER BY id_matpal");
		return $data;
	}

	function get_headertable_kurikulum(){
		$data = array();
		$data = $this->db->query ("SELECT * from ms_kelas")->result_array();
		return $data;
	}

	function get_bodytable_kurikulum(){
		$data = array();
		$data = $this->db->query ("SELECT a.id_bidang, a.nama_bidang, b.id_matpal, b.nama_matpal, b.status
									FROM ms_bidang_study a 
									INNER JOIN ms_mata_pelajaran b ON a.id_bidang = b.id_bidang 
									WHERE b.status = 1")->result_array();
		return $data;
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
		
        $cols = array('id_thn_ajar','kode_kelas','id_mapel','sm_1','sm_2');

        $sql = "SELECT * FROM trans_kurikulum";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}

	 function get_list_data_kurikulum($param){
		
        $cols = array('a.id_bidang, a.nama_bidang, b.id_matpal, b.nama_matpal, b.status');

        $sql = "SELECT a.id_bidang, a.nama_bidang, b.id_matpal, b.nama_matpal, b.status
				FROM ms_bidang_study a 
				INNER JOIN ms_mata_pelajaran b ON a.id_bidang = b.id_bidang 
				WHERE b.status = 1";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		
		// var_dump($sql);
		// exit();
		

		return $this->db->query($sql)->result();
	}
	
	function delete_kurikulum($id_thn_ajar){
		$this->db->where('id_thn_ajar',$id_thn_ajar);
		$this->db->delete('trans_kurikulum');
	}

	function simpan_data_kurikulum($data_kurikulum){

		$this->db->replace('trans_kurikulum',$data_kurikulum);
	}
    
    function update_data_kurikulum($id_thn_ajar,$data_kurikulum){
        
        $this->db->where('id_thn_ajar',$id_thn_ajar);
		$this->db->update('trans_kurikulum',$data_kurikulum);
	}

    function query_kurikulum($id_thn_ajar){
        $data = array();
		$data=$this->db->query("SELECT * from trans_kurikulum where id_thn_ajar ='$id_thn_ajar'")->row_array();
		return $data;
	}

	function query_Row_Column(){
        // $data = array();
		// $data=$this->db->query("SELECT a.id_bidang, a.nama_bidang, b.id_matpal, b.nama_matpal, b.status, c.kode_kelas
		// 						FROM ms_bidang_study a 
		// 						INNER JOIN ms_mata_pelajaran b ON a.id_bidang = b.id_bidang
		// 						JOIN ms_kelas c
		// 						WHERE b.status = 1")->row_array();
		// return $data;
		$this->db->select('ms_bidang_study.id_bidang , ms_bidang_study.nama_bidang ,ms_mata_pelajaran.id_matpal ,ms_mata_pelajaran.nama_matpal , ms_mata_pelajaran.status , ms_kelas.kode_kelas');
		$this->db->from('ms_bidang_study');
		$this->db->join('ms_mata_pelajaran', 'ms_mata_pelajaran.id_bidang = ms_bidang_study.id_bidang');
		$this->db->join('ms_kelas');
        
        return $this->db->get()->result();
	}

	
}