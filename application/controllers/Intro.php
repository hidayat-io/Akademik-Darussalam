<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intro extends CI_Controller {

   	function index(){

   		if($this->session->userdata('logged_in')){

            redirect('auth');            
        }
        else{

        	$this->load->view('vintro');
        }
   	}
}
