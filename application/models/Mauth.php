<?php

class Mauth extends CI_Model {

	public function __construct(){
        
        parent::__construct();
    }
	
	function check_user($uid,$pwd){

		$this->db->where('user_id',$uid);
		$this->db->where('password',$pwd);

		return $this->db->get('user')->row();
	}
}