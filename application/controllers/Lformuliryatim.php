<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class lformuliryatim extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 56;
			parent::__construct($this->modul);
			 $this->load->model('mlformuliryatim','model');
			 $this->load->library("pdf");
	}

	function index()
	{
        //get AITAM
            $select_santri= $this->mcommon->query_list_aitam_without_calon();  
                $vdata['data_santri'][NULL] = '';
                foreach ($select_santri as $b) {
    
                    $vdata['data_santri'][$b->no_registrasi]
                    =$b->no_registrasi." | ".$b->nama_lengkap;
                }	
                        
		
		//cek hakAkses
		$user_id			= $this->session->userdata('logged_in')['uid'];
		$modul_id			= $this->modul;
		$HakAkses			= $this->mcommon->get_hak_akses($user_id,$modul_id);
		$add				= $HakAkses->add;
		$edit				= $HakAkses->edit;
		$delete				= $HakAkses->delete;

		if($add==1){
			$class_add = '';
		}else{
			$class_add = 'hidden';
		}

		if($edit==1){
			$class_edit = '';
		}else{
			$class_edit = 'hidden';
		}

		if($delete==1){
			$class_delete = '';
		}else{
			$class_delete = 'hidden';
		}
		$vdata['class_add']				= $class_add;
		$vdata['title'] = 'Surat Permohonan';
	    $data['content'] = $this->load->view('vlformuliryatim',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function print_formyatim($no_registrasi){

		$data['data_santri'] = $this->model->query_get_data_santri_aitam($no_registrasi);
		
		// var_dump($data['data_santri']);
		// exit();

		$filenameattc = "SURAT PERMOHONAN KAFALAH $no_registrasi";
		// $this->load->view('vPrintlformuliryatim');
		// $this->load->view('vPrintlformuliryatim',$data);
		// $this->pdf->load_view('vPrintlformuliryatim');
		$this->pdf->load_view('vPrintlformuliryatim',$data);
		$this->pdf->set_paper("A4", "potrait");
		$this->pdf->render();
		$this->pdf->stream("'$filenameattc'.pdf",array("Attachment"=>0));
	}
}

	

	