<?php

class Mdonatur extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_donatur','nama_donatur','alamat','telpon','kategori');

        $sql = "SELECT * FROM ms_donatur";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_donatur($id_donatur){
		$this->db->where('id_donatur',$id_donatur);
		$this->db->delete('ms_donatur');
	}

	function simpan_data_donatur($data_donatur){

		$this->db->replace('ms_donatur',$data_donatur);
	}
    
    function update_data_donatur($id_donatur,$data_donatur){
        
        $this->db->where('id_donatur',$id_donatur);
		$this->db->update('ms_donatur',$data_donatur);
	}

    function query_donatur($nama_donatur){
        $data = array();
		$data=$this->db->query("SELECT * from ms_donatur where nama_donatur ='$nama_donatur'")->row_array();
        return $data;
    }
        
    function query_edit_donatur($id_donatur){
        $data = array();
		$data=$this->db->query("SELECT * from ms_donatur where id_donatur ='$id_donatur'")->row_array();
		return $data;
	}

}