<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class lmateriajartiapguru extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 59;
			parent::__construct($this->modul);
			 $this->load->model('mlmateriajartiapguru','model');
			 $this->load->library("pdf");
	}

	function index()
	{
		//get kurikulum aktif
			$sys_param						= $this->kurikulum_aktif();
			$isys_param 					= explode('#',$sys_param);
			$id_thn_ajar					= $isys_param[0];
			$id_thn_ajar_value				= $this->model->get_kurikulum($id_thn_ajar);
			$idthnajaraktif					= $id_thn_ajar_value->id;
			$vdata['id_thn_ajar']			= $id_thn_ajar_value->id;
			$vdata['deskripsi']				= $id_thn_ajar_value->deskripsi;
			$vdata['semester_aktif']		= $isys_param[1];

		 //get Tahun Ajaran Data
			$select_thnajar= $this->model->get_thn_ajar()->result();
            
                        $vdata['kode_deskripsi'][NULL] = '';
                        foreach ($select_thnajar as $b) {
                            $vdata['kode_deskripsi'][$b->id]
                            =$b->deskripsi;
						}
		//get GURU
			$select_guru= $this->mcommon->mget_list_master_guru()->result();
                $vdata['data_guru'][NULL] = '';
                foreach ($select_guru as $b) {
    
                    $vdata['data_guru'][$b->id_guru]
                    =$b->id_guru." | ".$b->no_reg." | ".$b->nama_lengkap;
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
		$vdata['title'] = 'MATERI AJAR';
	    $data['content'] = $this->load->view('vlmateriajartiapguru',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function print_lmateriajartiapguru($action,$hide_Kurikulum,$semester,$id_guru=0){
		//GET TAHUN AJAR
		$kurikulum = $this->model->get_kurikulum($hide_Kurikulum);
		$data['tahun_ajar'] = $kurikulum->deskripsi;
		$thnajar = $kurikulum->deskripsi;
		$data['semester'] = $semester;
		
		if ($action =='semua'){
			$data['materiajar'] = $this->model->get_data_all($hide_Kurikulum,$semester);
			// $data['data_bid_studi'] = 'ini semua';
		}elseif ($action =='byidguru'){
			// $data['data_bid_studi'] = 'ini byidguru' ;
			$data['materiajar'] = $this->model->get_data_byidguru($hide_Kurikulum,$semester,$id_guru);
			
		}
		$data['action']  = $action;
		$filenameattc = "MATERI AJAR TIAP GURU TAHUN AJAR $thnajar SEMESTER $semester";
		// $this->load->view('vPrintlmateriajartiapguru',$data);
		$this->pdf->load_view('vPrintlmateriajartiapguru',$data);
		$this->pdf->set_paper("A4", "potrait");
		$this->pdf->render();
		$this->pdf->stream("'$filenameattc'.pdf",array("Attachment"=>0));
	}
}

	

	