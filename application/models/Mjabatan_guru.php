<?php

class Mjabatan_guru extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_jabatan','nama_jaatan');

        $sql = "SELECT * FROM ms_guru_jabatan";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function delete_jabatan_guru($id_jabatan){
		$this->db->where('id_jabatan',$id_jabatan);
		$this->db->delete('ms_guru_jabatan');
	}

	function simpan_data_jabatan_guru($data_jabatan_guru){

		$this->db->insert('ms_guru_jabatan',$data_jabatan_guru);
	}
    
    function update_data_jabatan_guru($id_jabatan,$data_jabatan_guru){
        
        $this->db->where('id_jabatan',$id_jabatan);
		$this->db->update('ms_guru_jabatan',$data_jabatan_guru);
	}

    function query_jabatan_guru($id_jabatan){
        $data = array();
		$data=$this->db->query("SELECT * from ms_guru_jabatan where id_jabatan ='$id_jabatan'")->row_array();
		return $data;
	}

	
}