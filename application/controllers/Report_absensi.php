<?php defined('BASEPATH') OR exit('No direct script access allowed');

// <!-- بسم الله الرحمن الرحیم -->

class Report_absensi extends IO_Controller
{

	public function __construct()
	{
		$this->modul = 54;
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
        
		foreach ($select_thnajar as $b) {
			$vdata['kode_deskripsi'][$b->id]
			=$b->deskripsi;
		}

        //get Kelas
		$select_kelas= $this->mcommon->mget_list_kelas()->result();
            
		$vdata['kode_kelas'][NULL] = '- Semua Kelas -';
		foreach ($select_kelas as $b) {

			$vdata['kode_kelas'][$b->kode_kelas] = $b->kode_kelas." - ".$b->nama;
		}

        //get santri
		$select_santri= $this->mcommon->query_list_santri();
            
		$vdata['select_santri'][NULL] = '- Semua Santri -';
		foreach ($select_santri as $s) {

			$vdata['select_santri'][$s->no_registrasi] = $s->no_registrasi." - ".$s->nama_lengkap;
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
		$vdata['title'] = 'REPORT ABSENSI';
	    $data['content'] = $this->load->view('vReport_absensi',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function unduh($str_param){

		$iparam = json_decode(base64_decode($str_param));
		
		foreach($iparam as $i){

			var_dump($i);
			echo "<br />";
		}
		
	}
}