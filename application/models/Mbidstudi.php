<?php

class Mbidstudi extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_bidang','nama_bidang','kategori');

        $sql = "SELECT * FROM ms_bidang_study";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_bidstudi($id_bidang){
		$this->db->where('id_bidang',$id_bidang);
		$this->db->delete('ms_bidang_study');
	}

	function simpan_data_bidstudi($data_bidstudi){

		$this->db->replace('ms_bidang_study',$data_bidstudi);
	}
    
    function update_data_bidstudi($id_bidang,$data_bidstudi){
        
        $this->db->where('id_bidang',$id_bidang);
		$this->db->update('ms_bidang_study',$data_bidstudi);
	}

    function query_bidstudi($id_bidang){
        $data = array();
		$data=$this->db->query("SELECT * from ms_bidang_study where id_bidang ='$id_bidang'")->row_array();
		return $data;
		// $this->db->select('*');
        // $this->db->from('ms_bidang_study');
        // $this->db->where('id_bidang',$id_bidang);
        
        // return $this->db->get()->result();
	}

	function query_matpal($id_bidang){
		$this->db->select('id_matpal , nama_matpal , status');
        $this->db->from('ms_mata_pelajaran');
        $this->db->where('id_bidang',$id_bidang);
        
        return $this->db->get()->result();
	}

	function query_mata_pelajaran($id_matpal,$nama_matpal,$kategori)
	{
        $data = array();
		$data=$this->db->query("SELECT a.*, b.kategori 
								FROM ms_mata_pelajaran a
								INNER JOIN ms_bidang_study b ON a.id_bidang = b.id_bidang
								where a.id_matpal ='$id_matpal' or a.nama_matpal ='$nama_matpal' and b.kategori='$kategori'")->row_array();
		return $data;
	}

	function delete_item_matpal($id_bidang){
		$this->db->where('id_bidang',$id_bidang);
		$this->db->delete('ms_mata_pelajaran');
	}

	function simpan_item_matpal($detail_Matpal){

		$this->db->replace('ms_mata_pelajaran',$detail_Matpal);
	}
	
}