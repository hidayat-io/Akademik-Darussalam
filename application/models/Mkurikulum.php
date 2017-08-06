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

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_thn_ajar','kode_kelas','id_mapel','sm_1','sm_2');

        $sql = "SELECT * FROM trans_kurikulum";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

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

	
}