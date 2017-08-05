<?php

class IO_Controller extends CI_Controller {

    function __construct($modul=null){

        parent::__construct();

        //check logged in
        if(!$this->session->userdata('logged_in')){

            redirect('auth');            
        }
        else{

        	//validate modul privilege
        	if($modul!=null){

        		$user_id = $this->session->userdata('logged_in')['uid'];

        		$akses = $this->mcommon->mcek_hak_akses($user_id,$modul);
        		
        		if($akses==null){

        			redirect(base_url().'main/invalid_page');
        		}
        	}
        }
    }
}