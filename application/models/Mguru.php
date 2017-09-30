<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mguru extends CI_Model {

	function get_list_data($param,$sortby=0,$sorttype='desc'){
		
		$cols = array('no_reg','nama_lengkap','nig','mengajar_sejak','jns_kelamin','status');

		$sql = "SELECT g.*,p.nama_matpal 
					FROM ms_guru g 
						LEFT OUTER JOIN ms_mata_pelajaran p 
							ON g.materi_diampu=p.id_matpal";
				
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

	function mget_bio_guru($id_guru){

		$this->db->select('*');
		$this->db->select("DATE_FORMAT(tanggal_lahir,'%d-%m-%Y') as ibirth",null,false);
		$this->db->select("DATE_FORMAT(tgl_pasangan,'%d-%m-%Y') as ibirth_mate",null,false);
		$this->db->select("DATE_FORMAT(mengajar_start,'%d-%m-%Y') as iajar_start",null,false);
		$this->db->select("DATE_FORMAT(mengajar_end,'%d-%m-%Y') as iajar_end",null,false);
		$this->db->select("DATE_FORMAT(tgl_sk,'%d-%m-%Y') as isk",null,false);
		$this->db->where('id_guru',$id_guru);

		return $this->db->get('ms_guru')->row();
	}

	function mget_sk_guru($id_guru){

		$this->db->select('*');
		$this->db->select("DATE_FORMAT(tgl_sk,'%d-%m-%Y') as itgl_sk",null,false);
		$this->db->where('id_guru',$id_guru);

		return $this->db->get('ms_guru_sk')->result_array();
	}

	function mget_guru_familiy($id_guru){

		$this->db->select('*');
		$this->db->select("DATE_FORMAT(tanggal_lahir,'%d-%m-%Y') as ibirth_fam",null,false);
		$this->db->where('id_guru',$id_guru);

		return $this->db->get('ms_guru_family')->result_array();
	}

	function mget_guru_edu($id_guru){

		$this->db->where('id_guru',$id_guru);
		$this->db->order_by('kategori');
		$this->db->order_by('id');

		return $this->db->get('ms_guru_pendidikan')->result_array();
	}

	function mget_guru_structure($id_guru){

		$this->db->where('id_guru',$id_guru);
		return $this->db->get('ms_guru_struktural')->result_array();
	}

	function mdelete_data_guru($id_guru){

		$this->db->where('id_guru',$id_guru);
		$this->db->set('is_delete','1');
		$this->db->update('ms_guru');
	}
}
