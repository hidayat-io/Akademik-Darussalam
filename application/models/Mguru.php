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

	function mupdate_data($id,$data){

		$this->db->where('id_guru',$id);
		$this->db->update('ms_guru',$data);
	}

	function mget_new_no(){

		$this->db->select('nomor_terakhir');
		$this->db->from('sequence');
		$this->db->where('nama_field','no_reg_guru');

		$no = $this->db->get()->row()->nomor_terakhir;

		$ino = (int)$no;
		$ino = $ino+=1;

		$this->db->where('nama_field','no_reg_guru');
		$this->db->update('sequence',array('nomor_terakhir'=>$ino));

		return $no;
	}

	function mdelete_detail($table,$id){

		$this->db->where('id_guru',$id);
		$this->db->delete($table);
	}

	function minsert_detail($table,$data){

		$this->db->insert($table,$data);
	}

	function mdelete_detail_edu($id,$type){

		$this->db->where('kategori',$type);
		$this->db->where('id_guru',$id);
		$this->db->delete('ms_guru_pendidikan');
	}

	function mdelete_jabatan($id){

		$this->db->where('id_guru',$id);
		$this->db->delete('ms_guru_struktural');
	}
}
