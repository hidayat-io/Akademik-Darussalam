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

		$data 			= $this->model->get_list_data($string_param,$sort_by,$sort_type);
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

			$btn = '<button type="button" class="btn blue btn-xs" title="Lihat & Edit Data" onclick="edit(\''.$data[$i]->id_guru.'\')">
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

		$input = $this->input->post();

		$id 				= $input['hid_id_data'];
		$tgl_lahir 			= $input['dtp_tgl_lahir']==''?null:io_return_date('d-m-Y',$input['dtp_tgl_lahir']);
		$tgl_lahir_pasangan = $input['dtp_tgllahir_pasangan']==''?null:io_return_date('d-m-Y',$input['dtp_tgllahir_pasangan']);
		$tgl_sk 			= $input['dtp_tgl_sk']==''?null:io_return_date('d-m-Y',$input['dtp_tgl_sk']);
		$pend_terakhir 		= isset($input['opt_ijazah_terakhir'])?$input['opt_ijazah_terakhir']:null;
		$start_ajar 		= $input['dtp_ajar_mulai']==''?null:io_return_date('d-m-Y',$input['dtp_ajar_mulai']);
		$end_ajar 			= $input['dtp_ajar_akhir']==''?null:io_return_date('d-m-Y',$input['dtp_ajar_akhir']);

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

		//save data anak
		$ar_anak = json_decode($input['hid_anak']);

		if(count($ar_anak)>0){

			//delete existing data
			$this->model->mdelete_anak($id);

			//insert new data
			foreach ($ar_anak as $anak) {
				
				$data_anak = array(

					'id_guru' 		=> $id,
					'nama_anak' 	=> $anak->nama_anak,
					'pendidikan' 	=> $anak->pendidikan,
					'tanggal_lahir' => $anak->tgl_lahir,
					'user_id' 		=> io_return_date('d-m-Y',$sk->tgl_sk),
					'recdate' 		=> date('Y-m-d H:i:s')
				);

				$this->model->minsert_anak();
			}
		}

		//save data SK
		$ar_sk = json_decode($input['hid_sk_angkat']);

		if(count($ar_sk)>0){

			//delete existing data
			$this->model->mdelete_sk($id);

			//insert new data
			foreach ($ar_sk as $sk) {
				
				$sk_data = array(

					'id_guru'	=> $id,
					'no_sk' 	=> $sk->no_sk,
					'tgl_sk' 	=> io_return_date('d-m-Y',$sk->tgl_sk),
					'file_sk'	=> $sk->file_sk
				);

				$this->model->minsert_sk($sk_data);
			}
		}
		
	}

	function build_param($param){
	
		$string_param = NULL;

		if($param!=null){

			if(isset($param->no_reg)) $string_param .= "no_reg LIKE '%".$param->no_reg."%' ";
		}

		return $string_param;
	}
}

	

	
