<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){

        parent::__construct();
        $this->load->model('mauth','model');
    }

   	function index(){

   		if(!$this->session->userdata('logged_in')){

            $this->load->view('vLogin');
        }
        else{

        	redirect('main');
        }
   	}

	function login_act(){

		$uid 	= $this->input->post('user_id');
		$pwd 	= $this->input->post('password');
		$pwd 	= substr(md5($pwd),0,15);

		$data 	= $this->model->check_user($uid,$pwd);
	 	
	   	if($data!=null){

	     	$sess_array = array(

	     		'uid' 			=> $data->user_id,
	     		'nama_lengkap'	=> $data->nama_lengkap	     		
	     	);

	     	//history login
	     	$login = array(

	     		'user_id' 	=> $data->user_id,
	     		'ip_addr'	=> $this->input->ip_address()
	     	);

	     	$this->db->insert('login_history',$login);
	     	//akhir history login

	     	$this->session->set_userdata('logged_in', $sess_array);
	     	redirect(base_url().'main','refresh');
	   	}
	   	else{

	   		$this->session->set_flashdata('error', true);
	     	redirect('auth','refresh');
	   	}
	}

	function logout_act(){

		$this->session->unset_userdata('logged_in');
   		session_destroy();

   		redirect('intro','refresh');
	}
}
