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
}