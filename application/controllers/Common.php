<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

   	function upload_lampiran(){

   		$this->load->library('upload');

		$ioname		 				= date('dmyHis').io_random_string(4);
		$temp						= explode(".",$_FILES['att_file']['name']);
		$filename 					= $ioname.'.'.end($temp);
		$config['upload_path']   	= './assets/images/uploadtemp';
		$config['file_name'] 		= $filename;
		$config['allowed_types']    = '*';

		$this->upload->initialize($config);

		if($this->upload->do_upload('att_file')){

			echo $filename;
		}
		else{

			//echo $this->upload->display_errors();
			echo null;
		}
   	}

   	function mget_guru_aktif(){

   		$this->db->where('status_aktif','1');
   		return $this->db->get('ms_guru')->result();
   	}
}
