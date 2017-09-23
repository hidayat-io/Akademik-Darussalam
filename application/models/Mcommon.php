<?php

class Mcommon extends CI_Model {

	function mcek_hak_akses($user,$modul){

		$this->db->select('gdu.user_id');
		$this->db->from('group_daftar_user gdu');
		$this->db->join('group_hak_akses gha','gdu.group_id=gha.group_id');
		$this->db->where('gdu.user_id',$user);
		$this->db->where('gha.modul_id',$modul);

		return $this->db->get()->row();
	}

	function query_list_santri(){

        $this->db->order_by('nama_lengkap');
		$this->db->like('no_registrasi','T');
		$this->db->not_like('no_registrasi','C');

        return $this->db->get('ms_santri')->result();
    }

    function mget_list_jabatan_guru(){

    	$this->db->order_by('nama_jabatan');
    	
    	return $this->db->get('ms_guru_jabatan');
    }

    function mget_list_master_guru(){

    	$this->db->order_by('id_guru','desc');
    	return $this->db->get('ms_guru');
    }
}