<?php

class Mkomponen extends CI_Model {
	
public function __construct(){

        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_list_data($param,$sortby=0,$sorttype='desc'){

        $cols = array('id_komponen','nama_komponen','tipe','isActive');

        $sql = "SELECT id_komponen,nama_komponen,tipe,isActive FROM ms_biaya_komponen";

        if($param!=null){

            $sql .= " WHERE ".$param;
        }


        $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

        return $this->db->query($sql)->result();
    }

	function insert_new($data){

       $this->db->insert('ms_biaya_komponen', $data);
    }

    function update_data($id,$data){

        $this->db->where('id_komponen',$id);
        $this->db->update('ms_biaya_komponen',$data);
    }


    function query_getdata($id){

        $sql="SELECT id_komponen,nama_komponen,tipe FROM ms_biaya_komponen Where id_komponen=$id";

        return $this->db->query($sql)->row();
    }

    function m_hapus_data($id){

        $this->db->where('id_komponen',$id);
        $this->db->delete('ms_biaya_komponen');
    }

}