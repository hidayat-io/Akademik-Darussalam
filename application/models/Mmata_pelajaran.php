<?php

class Mmata_pelajaran extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_bidangstudi(){
		$data = $this->db->query ("SELECT * FROM ms_bidang_study ORDER BY id_bidang,nama_bidang");
		return $data;
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_matpal','nama_matpal','id_bidang','status');

        $sql = "SELECT a.*, b.kategori FROM ms_mata_pelajaran a
		INNER JOIN ms_bidang_study b ON a.id_bidang = b.`id_bidang`";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_mata_pelajaran($id_matpal){
		$this->db->where('id_matpal',$id_matpal);
		$this->db->delete('ms_mata_pelajaran');
	}

	function simpan_data_mata_pelajaran($data_mata_pelajaran){

		$this->db->replace('ms_mata_pelajaran',$data_mata_pelajaran);
	}
    
    function update_data_mata_pelajaran($id_matpal,$data_mata_pelajaran){
        
        $this->db->where('id_matpal',$id_matpal);
		$this->db->update('ms_mata_pelajaran',$data_mata_pelajaran);
	}

    function query_mata_pelajaran($id_matpal){
        $data = array();
		$data=$this->db->query("SELECT * from ms_mata_pelajaran where id_matpal ='$id_matpal'")->row_array();
		return $data;
		// $this->db->select('*');
        // $this->db->from('ms_mata_pelajaran');
        // $this->db->where('id_matpal',$id_matpal);
        
        // return $this->db->get()->result();
	}

	
}