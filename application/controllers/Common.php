<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	public function __construct(){

    	$modul = 2;
		parent::__construct($modul);
	}

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

   	function get_list_kamar(){

   		$kamar = $this->mcommon->mget_list_kamar()->result();

   		if($kamar==null) $kamar = array();

   		echo json_encode($kamar);
   	}

   	function get_list_santri($type='TMI'){

   		$santri = $this->mcommon->mget_list_santri($type)->result();

   		if($santri==null) $santri = array();

   		echo json_encode($santri);
   	}

   	function get_list_kelas(){

   		$kelas = $this->mcommon->mget_list_kelas()->result();

   		if($kelas==null) $kelas = array();

   		echo json_encode($kelas);
   	}
}
