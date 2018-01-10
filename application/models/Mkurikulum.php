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
    function get_thn_ajar(){
		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran  order by id desc Limit 3 ");
		// $data = $this->db->query ("SELECT * FROM ms_tahun_ajaran where kategori='UTAMA' order by id desc Limit 2 ");
		return $data;
	}

    function get_mapel(){
		$data = $this->db->query ("SELECT * FROM ms_mata_pelajaran ORDER BY id_matpal");
		return $data;
	}

	function get_headertable_kurikulum(){
		$data = array();
		$data = $this->db->query ("SELECT DISTINCT tingkat, tipe_kelas FROM ms_kelas ORDER BY tingkat")->result_array();
		return $data;
	}

	function get_bodytable_kurikulum(){
		$data = array();
		$data = $this->db->query ("SELECT a.id_bidang, a.nama_bidang, b.id_matpal, b.nama_matpal, b.status
									FROM ms_bidang_study a 
									INNER JOIN ms_mata_pelajaran b ON a.id_bidang = b.id_bidang 
									WHERE b.status = 1 and a.kategori = 'UTAMA'")->result_array();
		return $data;
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
		
        $cols = array('id_thn_ajar','deskripsi');

        $sql = "SELECT DISTINCT a.id_thn_ajar,  b.deskripsi, b.kategori  
				FROM trans_kurikulum a
				INNER JOIN ms_tahun_ajaran b ON b.id = a.id_thn_ajar";
                    

            if($param!=null){

                // $sql .= " WHERE ".$param;
                $sql .= " WHERE a.kategori ='UTAMA'".$param;
                
			}
			else
			{
				$sql .= " WHERE a.kategori ='UTAMA'";
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
		$data=$this->db->query("SELECT * from trans_kurikulum where id_thn_ajar ='$id_thn_ajar'")->result_array();
		return $data;
	}

	function query_kurikulum_byid($id_thn_ajar){
        $data = array();
		$data=$this->db->query("SELECT * from trans_kurikulum where id_thn_ajar ='$id_thn_ajar'")->row_array();
		return $data;
	}

	function query_Row_Column(){
		$this->db->select('ms_bidang_study.id_bidang , ms_bidang_study.nama_bidang ,ms_mata_pelajaran.id_matpal ,ms_mata_pelajaran.nama_matpal , ms_mata_pelajaran.status , ms_kelas.kode_kelas');
		$this->db->from('ms_bidang_study');
		$this->db->join('ms_mata_pelajaran', 'ms_mata_pelajaran.id_bidang = ms_bidang_study.id_bidang');
		$this->db->join('ms_kelas');
        
        return $this->db->get()->result();
	}

	
}