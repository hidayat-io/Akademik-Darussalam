<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class rapor extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 34;
			parent::__construct($this->modul);
			 $this->load->model('mrapor','model');
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
        //get Kelas
			$select_kelas= $this->mcommon->mget_list_kelas()->result();
            
                        $vdata['kode_kelas'][NULL] = '';
                        foreach ($select_kelas as $b) {
            
							$vdata['kode_kelas'][$b->kode_kelas]
							=$b->kode_kelas." | ".$b->nama;
							// $vdata['kode_kelas'][$b->kode_kelas."#".$b->nama."#".$b->tingkat."#".$b->tipe_kelas]
							// =$b->nama." | ".$b->tingkat." | ".$b->tipe_kelas;
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
		$vdata['title'] = 'RAPOR';
	    $data['content'] = $this->load->view('vrapor',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function print_rapor($action,$hide_Kurikulum,$semester,$id_kelas=0,$no_registrasi=0){
		//GET TAHUN AJAR
		$kurikulum = $this->model->get_kurikulum($hide_Kurikulum);
		$data['tahun_ajar'] = $kurikulum->deskripsi;
		$thnajar = $kurikulum->deskripsi;
		$data['semester'] = $semester;
		// var_dump($action);
		// exit();
		
		if ($action =='perkelas'){
			$data['data_bid_studi'] = $this->model->get_data_byidkelas($hide_Kurikulum,$semester,$id_kelas);
			// $data['data_bid_studi'] = 'ini perkelas';
		}elseif ($action =='pernoregister'){
			// $data['data_bid_studi'] = 'ini pernoregister' ;
			$data['data_bid_studi'] = $this->model->get_data_byidnoregistrasi($hide_Kurikulum,$semester,$no_registrasi);
			
		}
			// $data['data_bid_studi'] = $this->model->get_bid_studi();
			// $data['data_matpal'] = $this->model->get_matpal();
		$data['action']  = $action;
		// $filenameattc = "RAPOR TAHUN AJAR";
		$filenameattc = "RAPOR TAHUN AJAR $thnajar SEMESTER $semester";
		// var_dump($filenameattc);
		// exit();
		// $this->load->view('vPrintrapor');
		// $this->load->view('vPrintrapor',$data);
		// $this->pdf->load_view('vPrintrapor');
		$this->pdf->load_view('vPrintrapor',$data);
		$this->pdf->set_paper("A4", "potrait");
		$this->pdf->render();
		$this->pdf->stream("'$filenameattc'.pdf",array("Attachment"=>0));
	}
}

	

	