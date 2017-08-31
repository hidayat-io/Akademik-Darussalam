<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mguru extends CI_Model {

	function get_list_data($param,$sortby=0,$sorttype='desc'){
		
		$cols = array('no_reg','nama_lengkap','nig','mengajar_sejak','jns_kelamin','status');

		$sql = "SELECT * FROM ms_guru ";
				
		if($param!=null) $sql .= $param;
		
		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		
		return $this->db->query($sql)->result();
	}

	function msimpan_data($data){

		$id = $this->db->insert('ms_guru',$data);
		
		return $this->db->insert_id();
	}
}
