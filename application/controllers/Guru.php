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

		$iparam 		= json_decode($_REQUEST['param']);
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

		for($i = $iDisplayStart; $i < $end; $i++) {
			$act = '<a href="#" class="btn btn-icon-only green" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-file-o"></i>
					</a>
					<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-trash"></i>
					</a>';
					
			$records["data"][] = array(

		     	$data[$i]->no_registrasi,
  				date('Y',strtotime($data[$i]->thn_masuk)),
  				$data[$i]->nama_lengkap,
		     	$data[$i]->nama_arab,
		     	$data[$i]->nama_panggilan,
		     	number_format($data[$i]->uang_jajan_perbulan,0,",","."),
				$data[$i]->no_kk,
				$data[$i]->nik,
				$data[$i]->tempat_lahir,
				io_date_format($data[$i]->tgl_lahir,$fdate),
		      	$act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	function save_data(){

		$input = $this->input->post();

		$tgl_lahir 			= $input['dtp_tgl_lahir']==''?null:io_return_date('d-m-Y',$input['dtp_tgl_lahir']);
		$tgl_lahir_pasangan = $input['dtp_tgllahir_pasangan']==''?null:io_return_date('d-m-Y',$input['dtp_tgllahir_pasangan']);
		$tgl_sk 			= $input['dtp_tgl_sk']==''?null:io_return_date('d-m-Y',$input['dtp_tgl_sk']);
		$pend_terakhir 		= isset($input['opt_ijazah_terakhir'])?$input['opt_ijazah_terakhir']:null;

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
			"nama_ayah" 			=> $input['txt_nama_ayah'],
			"nama_ibu" 				=> $input['txt_nama_ibu'],
			"nama_pasangan" 		=> $input['txt_nama_pasangan'],
			"tgl_pasangan" 			=> $tgl_lahir_pasangan,
			"jml_anak" 				=> $input['txt_jml_anak'],
			"akedemik" 				=> $input['txt_gelar'],
			"status" 				=> $input['opt_status'],
			"pendidikan_terakhir" 	=> $pend_terakhir,
			"mengajar_start" 		=> $input['txt_tahun_mulai'],
			"mengajar_end" 			=> $input['txt_tahun_akhir'],
			"id_alumni" 			=> $input['txt_stambuk_alumni'],			
			"masa_abdi" 			=> $input['txt_masa_pengabdian'],
			"sertifikasi"			=> $input['txt_sertifikasi'],
			"no_sk"					=> $input['txt_sk_angkat'],
			"tgl_sk"				=> $tgl_sk,
			"materi_diampu"  		=> $input['txa_materi'],
			"userid"				=> $this->session->userdata('logged_in')['uid'],
			"recdate" 				=> date('Y-m-d H:i:s'),
			"status_aktif"			=> '1'
		);

		print_r($this->input->post());
	}
}

	

	
