<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends IO_Controller{

	public function __construct(){

		$modul = 16;
		parent::__construct($modul);
	 	$this->load->model('mguru','model');
	}

	function index(){			


		$vdata['title'] = 'DATA GURU & KARYAWAN';

		/* data master guru */
		$mguru = $this->mcommon->mget_list_jabatan_guru()->result();

		foreach ($mguru as $g) {
			
			$vdata['opt_jabatan'][$g->id_jabatan] = $g->nama_jabatan;
		}

	    $data['content'] = $this->load->view('vguru',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function load_grid(){

		$iparam 			= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 				= $this->model->get_list_data($string_param,$sort_by,$sort_type);
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

		$jk['l'] 	= 'Laki-laki';
		$jk['p'] 	= 'Perempuan';

		for($i = $iDisplayStart; $i < $end; $i++) {

			$btn = '<button type="button" class="btn blue btn-xs" title="Lihat & Edit Data" onclick="modalEdit(\''.$data[$i]->id_guru.'\')">
	                	<i class="fa fa-edit"></i>&nbsp;Edit
	                </button>
	                <button type="button" class="btn red btn-xs" title="Hapus Data" onclick="hapus(\''.$data[$i]->id_guru.'\')">
	                	<i class="fa fa-trash"></i>&nbsp;Hapus
	                </button>';
					
			$records["data"][] = array(

		     	$data[$i]->no_reg,
		     	$data[$i]->nama_lengkap,
		     	$data[$i]->nig,
		     	io_date_format($data[$i]->mengajar_start,$fdate),
		     	$jk[$data[$i]->jns_kelamin],
		     	$data[$i]->status,
		      	$btn
		   );
		
		}

		$records["draw"]            = $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	function save_data(){

		$this->load->library('upload');

		$input = $this->input->post();

		$id 					= $input['hid_id_data'];
		$tgl_lahir 				= $input['dtp_tgl_lahir']==''?null:io_return_date('d-m-Y',$input['dtp_tgl_lahir']);
		$tgl_lahir_pasangan 	= $input['dtp_tgllahir_pasangan']==''?null:io_return_date('d-m-Y',$input['dtp_tgllahir_pasangan']);
		$tgl_sk 				= $input['dtp_tgl_sk']==''?null:io_return_date('d-m-Y',$input['dtp_tgl_sk']);
		$pend_terakhir 			= isset($input['opt_ijazah_terakhir'])?$input['opt_ijazah_terakhir']:null;
		$start_ajar 			= $input['dtp_ajar_mulai']==''?null:io_return_date('d-m-Y',$input['dtp_ajar_mulai']);
		$end_ajar 				= $input['dtp_ajar_akhir']==''?null:io_return_date('d-m-Y',$input['dtp_ajar_akhir']);

		$data = array(

			"nama_lengkap"			=> $input['txt_nama_lengkap'],
			"nama_arab" 			=> $input['txt_nama_arab'],
			"no_ptk"           		=> $input['txt_nuptk'],
			"nig"              		=> $input['txt_no_nig'],
			"tempat_lahir"     		=> $input['txt_tmp_lahir'],
			"tanggal_lahir" 		=> $tgl_lahir,
			"jns_kelamin" 			=> $input['opt_gender'],
			"no_kk" 				=> $input['txt_no_kk'],
			"no_ktp"  				=> $input['txt_no_ktp'],
			"kewarganegaraan" 		=> $input['txt_kewarganegaraan'],
			"alamat" 				=> $input['txa_alamat'],
			"no_telepon" 			=> $input['txt_notelp'],
			"email" 				=> $input['txt_email'],
			"status_nikah"			=> $input['opt_pernikahan'],
			"nama_ayah" 			=> $input['txt_nama_ayah'],
			"nama_ibu" 				=> $input['txt_nama_ibu'],
			"nama_pasangan" 		=> $input['txt_nama_pasangan'],
			"tgl_pasangan" 			=> $tgl_lahir_pasangan,
			"jml_anak" 				=> $input['txt_jml_anak'],
			"akademik" 				=> $input['txt_gelar'],
			"status" 				=> $input['opt_status'],
			"pendidikan_terakhir" 	=> $pend_terakhir,
			"mengajar_start" 		=> $start_ajar,
			"mengajar_end" 			=> $end_ajar,
			"id_alumni" 			=> $input['txt_stambuk_alumni'],			
			"masa_abdi" 			=> $input['txt_masa_pengabdian'],
			"sertifikasi"			=> $input['txt_sertifikasi'],
			"no_sk"					=> $input['txt_sk_angkat'],
			"tgl_sk"				=> $tgl_sk,
			"materi_diampu"  		=> $input['txa_materi'],
			"gapok"					=> $input['txt_gapok'],
			"userid"				=> $this->session->userdata('logged_in')['uid'],
			"recdate" 				=> date('Y-m-d H:i:s'),
			"status_aktif"			=> '1'
		);

		if($id==""){

			$no_reg = $this->model->mget_new_no();

			$data['no_reg'] = $no_reg;

			$id 	= $this->model->msimpan_data($data);
		}
		else{

			$this->model->mupdate_data($id,$data);
		}

		//save history data gapok
		if(floatval($input['hid_old_gapok']) != floatval($input['txt_gapok'])){

			$gapok = array(

				'id_guru'	=> $id,
				'nominal'	=> floatval($input['txt_gapok']),
				'userid' 	=> $this->session->userdata('logged_in')['uid'],
				'recdate'	=> date('Y-m-d H:i:s')
			);

			$this->model->minsert_detail('ms_guru_gapok',$gapok);
		}

		//save data anak
		$ar_anak = json_decode($input['hid_anak']);

		$this->model->mdelete_detail('ms_guru_family',$id);

		foreach ($ar_anak as $anak) {
			
			$data_anak = array(

				'id_guru' 		=> $id,
				'nama_anak' 	=> $anak->nama_anak,
				'pendidikan' 	=> $anak->pendidikan,
				'tanggal_lahir' => io_return_date('d-m-Y',$anak->tgl_lahir)					
			);

			$this->model->minsert_detail('ms_guru_family',$data_anak);
		}

		//save data SK
		$ar_sk = json_decode($input['hid_sk_angkat']);

		$this->model->mdelete_detail('ms_guru_sk',$id);
		
		foreach ($ar_sk as $sk) {
			
			$sk_data = array(

				'id_guru'	=> $id,
				'no_sk' 	=> $sk->no_sk,
				'tgl_sk' 	=> io_return_date('d-m-Y',$sk->tgl_sk),
				'file_sk'	=> $sk->file_sk
			);

			$this->model->minsert_detail('ms_guru_sk',$sk_data);

			//move temporary file
			if(file_exists('./assets/images/uploadtemp/'.$sk->file_sk)){

				rename('./assets/images/uploadtemp/'.$sk->file_sk,'./assets/images/fileupload/guru_sk/'.$sk->file_sk);	
			}			
		}

		//save pendidikan formal
		$ar_pformal = json_decode($input['hid_formal_edu']);

		$this->model->mdelete_detail_edu($id,'f');

		foreach ($ar_pformal as $pf) {
			
			$pformal = array(

				'id_guru'		=> $id,
				'tempat'		=> $pf->tempat,
				'lulus'			=> $pf->lulus,
				'kategori'		=> 'f',
				'file_lampiran' => $pf->file
			);

			$this->model->minsert_detail('ms_guru_pendidikan',$pformal);

			if(file_exists('./assets/images/uploadtemp/'.$pf->file)){

				rename('./assets/images/uploadtemp/'.$pf->file,'./assets/images/fileupload/guru_pendidikan/'.$pf->file);	
			}
		}

		//save pendidikan non formal
		$ar_pnonformal = json_decode($input['hid_nonformal_edu']);

		$this->model->mdelete_detail_edu($id,'n');

		foreach ($ar_pnonformal as $pf) {
			
			$pnonformal = array(

				'id_guru'		=> $id,
				'tempat'		=> $pf->tempat,
				'lulus'			=> $pf->lulus,
				'kategori'		=> 'n',
				'file_lampiran' => $pf->file
			);

			$this->model->minsert_detail('ms_guru_pendidikan',$pnonformal);			

			if(file_exists('./assets/images/uploadtemp/'.$pf->file)){

				rename('./assets/images/uploadtemp/'.$pf->file,'./assets/images/fileupload/guru_pendidikan/'.$pf->file);	
			}
		}

		//save struktur jabatan
		$this->model->mdelete_jabatan($id);

		if(isset($input['opt_jabatan'])){			

			foreach($input['opt_jabatan'] as $jab){
			
				$jabatan = array(

					'id_jabatan' 	=> $jab,
					'id_guru'		=> $id
				);

				$this->model->minsert_detail('ms_guru_struktural',$jabatan);
			}
		}

		//save file foto
		if($_FILES['file_foto']){

			$ioname		 				= $id;			
			$filename 					= $ioname.'.jpg';
			$config['upload_path']   	= './assets/images/fileupload/guru_foto';
			$config['file_name'] 		= $filename;
			$config['allowed_types']    = '*';
			$config['overwrite']		= TRUE;

			$this->upload->initialize($config);

			if(!$this->upload->do_upload('file_foto')){

				echo $this->upload->display_errors();
			};
		}

		//save file sk pengangkatan
		if($_FILES['file_sk_pengangkatan']){

			$ioname		 				= date('dmyHis').io_random_string(4);;
			$temp						= explode(".",$_FILES['file_sk_pengangkatan']['name']);
			$filename 					= $ioname.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/guru_sk';
			$config['file_name'] 		= $filename;
			$config['allowed_types']    = '*';	

			$this->upload->initialize($config);

			if(!$this->upload->do_upload('file_sk_pengangkatan')){

				echo $this->upload->display_errors();
			};

			$iupdate['file_sk'] = $filename;
		}

		//save file sertifikasi
		if($_FILES['file_sertifikasi']){

			$ioname		 				= date('dmyHis').io_random_string(4);;
			$temp						= explode(".",$_FILES['file_sertifikasi']['name']);
			$filename 					= $ioname.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/guru_sertifikasi';
			$config['file_name'] 		= $filename;
			$config['allowed_types']    = '*';

			$this->upload->initialize($config);

			if(!$this->upload->do_upload('file_sertifikasi')){

				echo $this->upload->display_errors();
			};

			$iupdate['file_sertifikasi'] = $filename;
		}

		//update link file
		$this->model->mupdate_data($id,$iupdate);
	}

	function build_param($param){
	
		$string_param = NULL;

		if($param!=null){

			if(isset($param->no_reg)) $string_param .= "no_reg LIKE '%".$param->no_reg."%' ";
		}

		return $string_param;
	}

	function get_bio_guru($id_guru){

		$bio 		= $this->model->mget_bio_guru($id_guru);
		$sk  		= $this->model->mget_sk_guru($id_guru);
		$family 	= $this->model->mget_guru_familiy($id_guru);
		$edu 		= $this->model->mget_guru_edu($id_guru);
		$structure 	= $this->model->mget_guru_structure($id_guru);

		$data_guru = array(

			'biodata' 	=> $bio,
			'sk'		=> $sk,
			'fam'		=> $family,
			'edu'		=> $edu,
			'struct'	=> $structure
		);

		echo json_encode($data_guru);
	}
}