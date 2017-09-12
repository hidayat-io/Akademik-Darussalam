<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Databiaya extends IO_Controller
{

	public function __construct()
		{
    	$modul = 2;
		parent::__construct($modul);
		$this->load->model('Mdatabiaya');
	  }

	function index()
		{
			$data['title'] = 'Biaya Semester & Bulanan';
	    	$data['content'] = $this->load->view('vdatabiaya',$data,TRUE);
	    	$this->load->view('main',$data);
	  }


	
}
