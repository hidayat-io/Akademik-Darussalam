<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends IO_Controller {

	public function __construct(){

		$modul = 0;
		parent::__construct($modul);
	}

	public function index(){

		$this->welcome();
	}

	public function welcome(){

		$data['content'] 	= $this->load->view('welcome',null,TRUE);
		$data['title'] 		= 'Selamat Datang';

		$this->load->view('main',$data);
	}

	function invalid_page(){

		$data['content'] 	= $this->load->view('page_404',null,TRUE);
		$data['title'] 		= 'Halaman Tidak Tersedia';

		$this->load->view('main',$data);
	}
}