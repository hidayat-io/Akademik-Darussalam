<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class msconfig extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 34;
			parent::__construct($this->modul);
		 	$this->load->model('mmsconfig','model');
	}

	function index()
	{
		//get Tahun Ajaran Data
			$select_thnajar= $this->model->get_thn_ajar()->result();

			// $vdata['kode_deskripsikelas'][NULL] = '';
			foreach ($select_thnajar as $b) {

				$vdata['kode_deskripsikelas'][$b->id]
				=$b->deskripsi;
			}
			//get Tahun Ajaran Data
					$data							= $this->model->get_list_data_kurikulum();		
					$data_param						= $data[0]->param_value;	
					$isys_param 					= explode('#',$data_param);
					$thn_ajar_aktif					= $isys_param[0];
					$semester_aktif					= $isys_param[1];
					$id_thn_ajar_value				= $this->model->get_kurikulum($thn_ajar_aktif);
					$deskripsi						= $id_thn_ajar_value->deskripsi;
			//end get Tahun Ajaran Data
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
		$vdata['id_thn_ajar_gen'] = $thn_ajar_aktif;
		$vdata['thn_ajargen'] = $deskripsi;
		$vdata['smstgen'] = $semester_aktif;
		$vdata['title'] = 'MASTER CONFIG';
		$vdata['title2'] = 'SETTING KURIKULUM & SEMESTER AKTIF';
	    $data['content'] = $this->load->view('vmsconfig',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	#region data akademik
		
		function load_grid()
		{
			
			$data 				= $this->model->get_list_data();
			$iTotalRecords  	= count($data);
			$iDisplayLength 	= intval($_REQUEST['length']);
			$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
			$iDisplayStart  	= intval($_REQUEST['start']);
			$sEcho				= intval($_REQUEST['draw']);

			$records            = array();
			$records["data"]    = array();

			$end = $iDisplayStart + $iDisplayLength;
			$end = $end > $iTotalRecords ? $iTotalRecords : $end;
			$fdate = 'd-m-Y';

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
		
			for($i = $iDisplayStart; $i < $end; $i++) {
				$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_config.'\')">
							<i class="fa fa-edit"></i>
						</a>';
				
				$records["data"][] = array(

					// $data[$i]->id_config,
					'<div align="center" style="width: 100%">'.$data[$i]->nomor_statistik.'</div>',
					'<div align="center" style="width: 100%">'.$data[$i]->NPSN.'</div>',
					'<div align="center" style="width: 100%">'.$data[$i]->nama.'</div>',
					'<div align="center" style="width: 100%">'.$data[$i]->jenis_lembaga.'</div>',
					'<div align="center" style="width: 100%">'.$data[$i]->alamat.'</div>',
					'<div align="center" style="width: 100%">'.$act.'</div>'
			);
			
			}

			$records["draw"]            	= $sEcho;
			$records["recordsTotal"]    	= $iTotalRecords;
			$records["recordsFiltered"] 	= $iTotalRecords;

			echo json_encode($records);
			
		}
		
		function simpan_msconfig($status)
		{
			$id_config 	        = $this->input->post('id_config');
			$nomor_statistik 	= $this->input->post('nomor_statistik');
			$NPSN 	            = $this->input->post('NPSN');
			$nama  		        = $this->input->post('nama');
			$jenis_lembaga 		= $this->input->post('jenis_lembaga');
			$alamat 			= $this->input->post('alamat');
			$recdate            = date('y-m-d');
			$userid 	        = $this->session->userdata('logged_in')['uid'];

			$data_msconfig = array(
				'id_config' 	    => $id_config,
				'nomor_statistik' 	=> $nomor_statistik,
				'NPSN' 		        => $NPSN,
				'nama' 		        => $nama,
				'jenis_lembaga' 	=> $jenis_lembaga,
				'alamat' 			=> $alamat,
				'recdate'           => $recdate,
				'userid' 		    => $userid
			);
			
			if($status=='SAVE')	
			{// cek apakah add new atau editdata
				
			// save data msconfig
				$this->model->simpan_data_msconfig($data_msconfig);

			}
			else //update data
			{		
				// save data msconfig
				$this->model->update_data_msconfig($id_config,$data_msconfig);
			}	    

				echo "true";
		}

		function get_data_msconfig($id_config)
		{
			$id_config = urldecode($id_config);
			$data = $this->model->query_msconfig($id_config);
			echo json_encode($data);
		}
		
		function get_edit_msconfig($id_config)
		{
			$id_config = urldecode($id_config);
			$data = $this->model->query_edit_msconfig($id_config);
			echo json_encode($data);
		}

	#endregion data akademik

	#region data kurikulum

		function load_grid_kurikulum(){
				$data 				= $this->model->get_list_data_kurikulum();
				$iTotalRecords  	= count($data);
				$iDisplayLength 	= intval($_REQUEST['length']);
				$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
				$iDisplayStart  	= intval($_REQUEST['start']);
				$sEcho				= intval($_REQUEST['draw']);

				$records            = array();
				$records["data"]    = array();

				$end = $iDisplayStart + $iDisplayLength;
				$end = $end > $iTotalRecords ? $iTotalRecords : $end;
				$fdate = 'd-m-Y';

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
		
				for($i = $iDisplayStart; $i < $end; $i++) {
					$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit_kurikulum(\''.$data[$i]->param_id.'\')">
								<i class="fa fa-edit"></i>
							</a>';
					$data_param						= $data[$i]->param_value;	
					$isys_param 					= explode('#',$data_param);
					$thn_ajar_aktif					= $isys_param[0];
					$semester_aktif					= $isys_param[1];
					$id_thn_ajar_value				= $this->model->get_kurikulum($thn_ajar_aktif);
					
					$records["data"][] = array(

						// $data[$i]->id_config,
						'<div align="center" style="width: 100%">'.$id_thn_ajar_value->deskripsi.'</div>',
						'<div align="center" style="width: 100%">'.$semester_aktif.'</div>',
						'<div align="center" style="width: 100%">'.$act.'</div>'
				);
				
				}

				$records["draw"]            	= $sEcho;
				$records["recordsTotal"]    	= $iTotalRecords;
				$records["recordsFiltered"] 	= $iTotalRecords;

				echo json_encode($records);
				
		}

		function get_edit_kurikulum($param_id) {
				$param_id = urldecode($param_id);
				$data = $this->model->query_edit_kurikulum($param_id);
				echo json_encode($data);
		}

		function simpan_kurikulum() {
			$param_id 	        = $this->input->post('param_id');
			$thn_ajar 			= $this->input->post('select_thnajar');
			$semester_aktif 	= $this->input->post('semester_aktif');
			$param_value		= $thn_ajar.'#'.$semester_aktif;

			$data = array(
				'param_value' 	    => $param_value
			);			
			//update data
				$this->model->update_data_kurikulum($param_id,$data);   

				echo "true";
		}

	#endregion data kurikulum

	#region limit Pengeluaran
		function load_grid_LimitPengeluaran(){
				$data 				= $this->model->get_list_data_LimitPengeluaran();
				$iTotalRecords  	= count($data);
				$iDisplayLength 	= intval($_REQUEST['length']);
				$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
				$iDisplayStart  	= intval($_REQUEST['start']);
				$sEcho				= intval($_REQUEST['draw']);

				$records            = array();
				$records["data"]    = array();

				$end = $iDisplayStart + $iDisplayLength;
				$end = $end > $iTotalRecords ? $iTotalRecords : $end;
				$fdate = 'd-m-Y';

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
		
				for($i = $iDisplayStart; $i < $end; $i++) {
					$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit_LimitPengeluaran(\''.$data[$i]->id.'\')">
								<i class="fa fa-edit"></i>
							</a>';
					
					
					$records["data"][] = array(

						// $data[$i]->id_config,
						'<div align="center" style="width: 100%">'.$data[$i]->limit.'</div>',
						'<div align="center" style="width: 100%">'.$act.'</div>'
				);
				
				}

				$records["draw"]            	= $sEcho;
				$records["recordsTotal"]    	= $iTotalRecords;
				$records["recordsFiltered"] 	= $iTotalRecords;

				echo json_encode($records);
				
		}

		function get_edit_LimitPengeluaran($id) {
			$id = urldecode($id);
			$data = $this->model->query_edit_LimitPengeluaran($id);
			echo json_encode($data);
		}

		function simpan_LimitPengeluaran() {
			$id 	        = $this->input->post('id');
			$limit			= $this->input->post('limit');
			$limit_lama 	= $this->input->post('limit_lama');
			$userid 	    = $this->session->userdata('logged_in')['uid'];

			$data_LimitPengeluaran = array(
				'limit' 	    => $limit,
				'userid' 	    => $userid
			);		

			$data_LimitPengeluaran_santri = array(
				'uang_jajan_perbulan' 	    => $limit
			);			
			//update data Limit Peneluaran
				$this->model->update_data_LimitPengeluaran($id,$data_LimitPengeluaran);   

				//update data uang jajan santri yang nominalnya sama dengan limit global
				$this->model->update_data_LimitPengeluaran_santri($limit_lama,$data_LimitPengeluaran_santri);   

				echo "true";
		}

	#endregion Limit Pengeluaran

	#region generate report
		function cek_generate($id_thn_ajar, $semester){
				$id_thn_ajar 	= urldecode($id_thn_ajar);
				$semester 		= urldecode($semester);
				$data 			= $this->model->query_cek_generate($id_thn_ajar,$semester);
				echo json_encode($data);
		}

		function del_rapor_data($id_thn_ajar, $semester){
				$id_thn_ajar 	= urldecode($id_thn_ajar);
				$semester 		= urldecode($semester);
				$data 			= $this->model->query_del_rapor_data($id_thn_ajar,$semester);
				echo json_encode($data);
		}

		function get_all_id($id_thn_ajar, $semester){
				$id_thn_ajar 	= urldecode($id_thn_ajar);
				$semester 		= urldecode($semester);
				$data 			= $this->model->query_get_all_id($id_thn_ajar,$semester);
				echo json_encode($data);
		}

		function gen_all_nilai($id_nilai){
				$id_nilai 	= urldecode($id_nilai);
				$data 			= $this->model->query_gen_all_nilai($id_nilai);
				echo json_encode($data);
		}

		function save_nilai_rapor(){
				$id_thn_ajar = $this->input->post('id_thn_ajar');
				$semester = $this->input->post('semester');
				$kode_kelas = $this->input->post('kode_kelas');
				$id_mapel = $this->input->post('id_mapel');
				$no_registrasi = $this->input->post('no_registrasi');
				$nilai = $this->input->post('nilai');
				
				
				$data_nilai = array(
					'id_thn_ajar'=> $id_thn_ajar,
					'semester'=> $semester,
					'kode_kelas'=> $kode_kelas,
					'id_mapel'=> $id_mapel,
					'no_registrasi'=> $no_registrasi,
					'nilai'=> $nilai
				);			
				
			//update data
				$this->model->simpan_nilai_to_rapor($data_nilai);   
				echo json_encode($no_registrasi);
		}

	#end region generate report
}

	

	