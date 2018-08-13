<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class nilai extends IO_Controller
{

	public function __construct() {
			$this->modul = 24;
			parent::__construct($this->modul);
		 	$this->load->model('mnilai','model');
	}
#region LoadPage
	function index() {
		// get ID guru
        $select_guru = $this->model->get_msguru()->result();

        $vdata['msguru'][NULL] = '-';
        foreach ($select_guru as $b) {

            $vdata['msguru'][$b->no_reg."#".$b->nama_lengkap]
                =$b->no_reg." | ".$b->nama_lengkap;
		}
		
		//get kurikulum aktif
		$sys_param						= $this->kurikulum_aktif();
		$isys_param 					= explode('#',$sys_param);
		$id_thn_ajar					= $isys_param[0];
		$id_thn_ajar_value				= $this->model->get_kurikulum($id_thn_ajar);
			// var_dump($id_thn_ajar_value);
			// exit();
		$vdata['thn_ajar_aktif']		= $id_thn_ajar_value->deskripsi;
		$vdata['semester_aktif']		= $isys_param[1];
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
       	$vdata['title'] = 'DATA PENILAIAN';
	    $data['content'] = $this->load->view('vnilai',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function build_param($param) {        
		// merubah hasil json menjadi parameter Query //
		// var_dump($string_param );
		// exit();
		$string_param = NULL;

		if($param!=null){

			if(isset($param->kode_kelas)) $string_param .= " ms_kelasdt.kode_kelas LIKE '%".$param->kode_kelas."%' ";
		}

		return $string_param;
	}

	function load_grid() {
		$user_id			= $this->session->userdata('logged_in')['uid'];

		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];


		$data 				= $this->model->get_list_data($string_param,$sort_by,$sort_type,$thn_ajar_aktif,$user_id);
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
			$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_thn_ajar.'\',\''.$data[$i]->deskripsi.'\',\''.$data[$i]->semester.'\',\''.$data[$i]->santri.'\',\''.$data[$i]->kode_kelas.'\',\''.$data[$i]->nama.'\',\''.$data[$i]->id_guru.'\',\''.$data[$i]->nama_lengkap.'\',\''.$data[$i]->id_mapel.'\',\''.$data[$i]->nama_matpal.'\')">
						<i class="fa fa-edit"></i>
					</a>';

			$records["data"][] = array(
				// $data[$i]->id,
				'<div align="center" style="width: 100%">'.$data[$i]->deskripsi.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->semester.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->tingkat.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->tipe_kelas.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->santri.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->kode_kelas,
				'<div align="center" style="width: 100%">'.$data[$i]->nama.'</div>',
				// $data[$i]->id_guru,
				'<div align="center" style="width: 100%">'.$data[$i]->nama_lengkap.'</div>',
				// $data[$i]->id_mapel,
				'<div align="center" style="width: 100%">'.$data[$i]->nama_matpal.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->kategori.'</div>',
                '<div align="center" style="width: 100%">'.$act.'</div>'
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}
#endregion LoadPage
#region Modal ListSantri
	function build_param_listsantri($param_listsantri) {        
		// merubah hasil json menjadi parameter Query //
		// var_dump($string_param );
		// exit();
		$string_param = NULL;

		if($param!=null){

			if(isset($param->kode_kelas)) $string_param .= " ms_kelasdt.kode_kelas LIKE '%".$param->kode_kelas."%' ";
		}

		return $string_param;
	}

	function load_grid_listsantri($kode_kelas) {
		$iparam 		= json_decode($_REQUEST['param_listsantri']);
		// var_dump($iparam);
		// exit();
		$string_param 	= $this->build_param($iparam);
		// var_dump($string_param );
		// exit();
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];


		$data 				= $this->model->get_list_data_listsantri($string_param,$sort_by,$sort_type,$kode_kelas);
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

		
		
		for($i = $iDisplayStart; $i < $end; $i++) {
			$act = '<a href="#" class="btn btn-icon-only blue " title="UBAH DATA" onclick="edit_santri(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-edit"></i>
					</a>';

			$records["data"][] = array(
				// $data[$i]->id,
				'<div align="center" style="width: 100%">'.$data[$i]->no_registrasi.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->nama_lengkap.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->nama_arab.'</div>',
                '<div align="center" style="width: 100%">'.$act.'</div>'
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function get_data_nilai_by_noregistrasi($no_registrasi,$id_thn_ajar,$semester,$kode_kelas,$id_guru,$id_mapel) {
		$no_registrasi 		= urldecode($no_registrasi);
		$id_thn_ajar 		= urldecode($id_thn_ajar);
		$semester 			= urldecode($semester);
		$kode_kelas 		= urldecode($kode_kelas);
		$id_guru 			= urldecode($id_guru);
		$id_mapel 			= urldecode($id_mapel);
		$data = $this->model->query_get_data_nilai_by_noregistrasi($no_registrasi,$id_thn_ajar,$semester,$kode_kelas,$id_guru,$id_mapel);
    	echo json_encode($data);
		

	}
#endregion  Modal ListSantri
#region Modal AddNilai
    function simpan_nilai($status)
	{
		$id_trans_nilai 	    	= $this->input->post('id_trans_nilai');
		$id_thn_ajar				= $this->input->post('id_thn_ajar_nilai_santri');
		$semester					= $this->input->post('semester_nilai_santri');
		$kode_kelas					= $this->input->post('kode_kelas_nilai_santri');
			$kode_kelas					= explode('#',$kode_kelas);;
			$kode_kelas					= $kode_kelas[0];
		$id_guru					= $this->input->post('id_guru_nilai_santri');
			$id_guru					= explode('#',$id_guru);;
			$id_guru					= $id_guru[0];
		$id_mapel					= $this->input->post('id_mapel_nilai_santri');
			$id_mapel					= explode('#',$id_mapel);;
			$id_mapel					= $id_mapel[0];
		$no_registrasi				= $this->input->post('no_registrasi');
	    $userid 	        		= $this->session->userdata('logged_in')['uid'];
		
		$hid_table_item_Penilaian	= $this->input->post('hid_table_item_Penilaian');
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data trans nilai hd
			$trans_nilai_hd = array(

								'id_thn_ajar'		=> $id_thn_ajar,
								'semester'			=> $semester,
								'kode_kelas'		=> $kode_kelas,
								'id_guru'			=> $id_guru,
								'id_mapel'			=> $id_mapel,
								'no_registrasi'		=> $no_registrasi,
								'userid' 			=> $userid
								
							);
			$id = $this->model->query_simpan_trans_nilai_hd($trans_nilai_hd);
							
		//save data trans nilai dt		
			$item_Penilaian  = explode(';',$hid_table_item_Penilaian);
			foreach ($item_Penilaian as $i) {
					$idetail = explode('#',$i);
					if(count($idetail)>1){
							$trans_nilai_dt = array(
								
								'id_hd'					=> $id,
								'kategori'				=> $idetail[0],
								'nama_penilaian'		=> $idetail[1],
								'nilai'					=> $idetail[2]
								
							);
							
							$this->model->query_simpan_trans_nilai_dt($trans_nilai_dt);
							}
			}
		}
        else //update data
		{		
							
			//save data trans nilai dt	
			$this->model->query_delete_trans_nilai_dt($id_trans_nilai);		
			$item_Penilaian  = explode(';',$hid_table_item_Penilaian);
			foreach ($item_Penilaian as $i) {
					$idetail = explode('#',$i);
					if(count($idetail)>1){
							$trans_nilai_dt = array(
								
								'id_hd'					=> $id_trans_nilai,
								'kategori'				=> $idetail[0],
								'nama_penilaian'		=> $idetail[1],
								'nilai'					=> $idetail[2]
								
							);
							
							$this->model->query_simpan_trans_nilai_dt($trans_nilai_dt);
							}
			}	
			

        }	    

			echo "true";
	}
#end region Modal AddNilai

}