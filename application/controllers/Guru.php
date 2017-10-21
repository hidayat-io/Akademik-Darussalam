<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends IO_Controller{

	public function __construct(){

		$modul = 16;
		parent::__construct($modul);
	 	$this->load->model('mguru','model');
	}

	function index(){			

		$vdata['title'] = 'DATA GURU & KARYAWAN';

		//data master jabatan
		$mguru = $this->mcommon->mget_list_jabatan_guru()->result();

		if($mguru!=null){

			foreach ($mguru as $g) {
			
				$vdata['opt_jabatan'][$g->id_jabatan] = $g->nama_jabatan;
			}	
		}
		else{

			$vdata['opt_jabatan'] = array();
		}
		

		//data master mata pelajaran
		$mpelajaran = $this->mcommon->mget_list_mata_pelajaran()->result();

		if($mpelajaran!=null){

			foreach ($mpelajaran as $p) {
			
				$vdata['opt_mapel'][$p->id_matpal] = $p->id_matpal.' - '.$p->nama_matpal;
			}
		}
		else{

			$vdata['opt_mapel'] = array();
		}

		//default config data lembaga
		$dconfig = $this->mcommon->mget_config_lembaga()->row();
		$vdata['nomor_statistik'] = $dconfig->nomor_statistik;

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

		$jk['l'] 	= 'Laki-laki';
		$jk['p'] 	= 'Perempuan';

		for($i = $iDisplayStart; $i < $end; $i++) {

			$btn = '<button type="button" class="btn blue btn-xs" title="LIHAT & EDIT DATA" onclick="modalEdit(\''.$data[$i]->id_guru.'\')">
	                	<i class="fa fa-edit"></i>
	                </button>
	                <button type="button" class="btn red btn-xs" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->nama_lengkap.'\',\''.$data[$i]->id_guru.'\')">
	                	<i class="fa fa-trash"></i>
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
			"materi_diampu"  		=> $input['opt_mapel'],
			"gapok"					=> $input['txt_gapok'],
			"userid"				=> $this->session->userdata('logged_in')['uid'],
			"recdate" 				=> date('Y-m-d H:i:s'),
			"status_aktif"			=> '1'
		);

		if($id==""){

			$no_reg = $this->model->mget_new_no();

			$data['no_reg'] = $no_reg;

			$id = $this->model->msimpan_data($data);

			//update NIG according to inserted ID
			$no_stat 	= $input['hid_no_statistik'];
			$mapel 		= $input['opt_mapel'];
			$fixid 		= str_pad($id, 3, "0", STR_PAD_LEFT);
			$nig 		= $no_stat.$mapel.$fixid;

			$this->model->mupdate_data($id,array("nig"=>$nig));
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
		$ar_pformal = json_decode($input['hid_pformal_edu']);

		$this->model->mdelete_detail_edu($id,'f');

		foreach ($ar_pformal as $pf) {
			
			$pformal = array(

				'id_guru'			=> $id,
				'nama_pendidikan'	=> $pf->nama,
				'tempat'			=> $pf->tempat,
				'lulus'				=> $pf->lulus,
				'kategori'			=> 'f',
				'file_lampiran' 	=> $pf->file
			);

			$this->model->minsert_detail('ms_guru_pendidikan',$pformal);

			if(file_exists('./assets/images/uploadtemp/'.$pf->file)){

				rename('./assets/images/uploadtemp/'.$pf->file,'./assets/images/fileupload/guru_pendidikan/'.$pf->file);	
			}
		}

		//save pendidikan non formal
		$ar_pnonformal = json_decode($input['hid_pnonformal_edu']);

		$this->model->mdelete_detail_edu($id,'n');

		foreach ($ar_pnonformal as $pf) {
			
			$pnonformal = array(

				'id_guru'			=> $id,
				'nama_pendidikan'	=> $pf->nama,
				'tempat'			=> $pf->tempat,
				'lulus'				=> $pf->lulus,
				'kategori'			=> 'n',
				'file_lampiran' 	=> $pf->file
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
		if($_FILES['file_foto']['name']!=''){

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
		if($_FILES['file_sk_pengangkatan']['name']!=''){

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
		if($_FILES['file_sertifikasi']['name']!=''){

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
		if(isset($iupdate)){

			$this->model->mupdate_data($id,$iupdate);	
		}		
	}

	function build_param($param){

		$string_param = " WHERE is_delete = '0' ";
		
		if($param!=null){

			foreach ($param as $p) {
			
				$key = $p->name;
				$val = $p->value;

				switch ($key) {
					
					case "txt_snoregis":

						if($val!=""){

							$string_param .= " AND ";
							$string_param .= "no_reg = '".$val."' ";
						}
						break;

					case "txt_snig":

						if($val!=""){

							$string_param .= " AND ";
							$string_param .= "nig LIKE '%".$val."%' ";
						}
						break;

					case "txt_snama_lengkap":

						if($val!=""){

							$string_param .= " AND ";
							$string_param .= "nama_lengkap LIKE '%".$val."%' ";
						}
						break;

					case "dtp_sajar_start":
					
						if($val!=""){

							$idate = io_return_date('d-m-Y',$val);

							$string_param .= " AND ";
							$string_param .= "mengajar_start BETWEEN '".$idate."' AND ";
						}
						break;

					case "dtp_sajar_end":

						if($val!=""){

							$idate = io_return_date('d-m-Y',$val);

							$string_param .= " '".$idate."' ";
						}
						break;

					case "opt_sgender":

						if($val!=""){

							$string_param .= " AND ";
							$string_param .= "jns_kelamin = '".$val."' ";
						}
						break;

					case "opt_sstatus":

						if($val!=""){

							$string_param .= " AND ";
							$string_param .= "status = '".$val."' ";
						}
						break;
				}
			}
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

	function delete_data($id_guru){

		$this->model->mdelete_data_guru($id_guru);
	}

	function excel_master_guru($param){

		$iparam 		= json_decode(base64_decode($param));		
		$string_param 	= $this->build_param($iparam);

		$data = $this->model->get_list_data($string_param);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Data Guru');
		$this->excel->getActiveSheet()->setCellValue('A1', "MASTER DATA GURU");
		$this->excel->getActiveSheet()->mergeCells('A1:AF1');

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "No Register");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama Lengkap");
		$this->excel->getActiveSheet()->setCellValue('D3', "Nama Arab");
		$this->excel->getActiveSheet()->setCellValue('E3', "NUPTK");
		$this->excel->getActiveSheet()->setCellValue('F3', "NIG");
		$this->excel->getActiveSheet()->setCellValue('G3', "Tanggal Lahir");
		$this->excel->getActiveSheet()->setCellValue('H3', "Tempat Lahir");
		$this->excel->getActiveSheet()->setCellValue('I3', "Jenis Kelamin");
		$this->excel->getActiveSheet()->setCellValue('J3', "No.KK");
		$this->excel->getActiveSheet()->setCellValue('K3', "No.KTP");
		$this->excel->getActiveSheet()->setCellValue('L3', "Kewarganegaraan");
		$this->excel->getActiveSheet()->setCellValue('M3', "Alamat");
		$this->excel->getActiveSheet()->setCellValue('N3', "No.Telepon");
		$this->excel->getActiveSheet()->setCellValue('O3', "Email");
		$this->excel->getActiveSheet()->setCellValue('P3', "Status Nikah");
		$this->excel->getActiveSheet()->setCellValue('Q3', "Nama Pasangan");
		$this->excel->getActiveSheet()->setCellValue('R3', "Tgl.Lahir Pasangan");
		$this->excel->getActiveSheet()->setCellValue('S3', "Jml.Anak");
		$this->excel->getActiveSheet()->setCellValue('T3', "Nama Ayah");
		$this->excel->getActiveSheet()->setCellValue('U3', "Nama Ibu");
		$this->excel->getActiveSheet()->setCellValue('V3', "Gelar Akademik");
		$this->excel->getActiveSheet()->setCellValue('W3', "Status");
		$this->excel->getActiveSheet()->setCellValue('X3', "Pendidikan Terakhir");
		$this->excel->getActiveSheet()->setCellValue('Y3', "Mulai Mengajar");
		$this->excel->getActiveSheet()->setCellValue('Z3', "Selesai Mengajar");
		$this->excel->getActiveSheet()->setCellValue('AA3', "ID Alumni");
		$this->excel->getActiveSheet()->setCellValue('AB3', "No.SK");
		$this->excel->getActiveSheet()->setCellValue('AC3', "Tgl.SK");
		$this->excel->getActiveSheet()->setCellValue('AD3', "Gapok");
		$this->excel->getActiveSheet()->setCellValue('AE3', "Masa Abdi");
		$this->excel->getActiveSheet()->setCellValue('AF3', "Materi Diampu");


		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$start_ajar = ($row->mengajar_start!=null)?io_date_format($row->mengajar_start,$fdate):'';
				$end_ajar 	= ($row->mengajar_end!=null)?io_date_format($row->mengajar_end,$fdate):'';
				$tgl_sk 	= ($row->tgl_sk!=null)?io_date_format($row->tgl_sk,$fdate):'';
				$tgl_psg 	= ($row->tgl_pasangan!=null)?io_date_format($row->tgl_pasangan,$fdate):'';

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->no_reg);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama_lengkap);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->nama_arab);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $row->no_ptk);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->nig);
				$this->excel->getActiveSheet()->setCellValue('G'.$i, io_date_format($row->tanggal_lahir,$fdate));
				$this->excel->getActiveSheet()->setCellValue('H'.$i, $row->tempat_lahir);
				$this->excel->getActiveSheet()->setCellValue('I'.$i, $row->jns_kelamin);
				$this->excel->getActiveSheet()->setCellValue('J'.$i, $row->no_kk);
				$this->excel->getActiveSheet()->setCellValue('K'.$i, $row->no_ktp);
				$this->excel->getActiveSheet()->setCellValue('L'.$i, $row->kewarganegaraan);
				$this->excel->getActiveSheet()->setCellValue('M'.$i, $row->alamat);
				$this->excel->getActiveSheet()->setCellValue('N'.$i, $row->no_telepon);
				$this->excel->getActiveSheet()->setCellValue('O'.$i, $row->email);
				$this->excel->getActiveSheet()->setCellValue('P'.$i, $row->status_nikah);
				$this->excel->getActiveSheet()->setCellValue('Q'.$i, $row->nama_pasangan);
				$this->excel->getActiveSheet()->setCellValue('R'.$i, $tgl_psg,$fdate);
				$this->excel->getActiveSheet()->setCellValue('S'.$i, $row->jml_anak);
				$this->excel->getActiveSheet()->setCellValue('T'.$i, $row->nama_ayah);
				$this->excel->getActiveSheet()->setCellValue('U'.$i, $row->nama_ibu);
				$this->excel->getActiveSheet()->setCellValue('V'.$i, $row->akademik);
				$this->excel->getActiveSheet()->setCellValue('W'.$i, $row->status);
				$this->excel->getActiveSheet()->setCellValue('X'.$i, $row->pendidikan_terakhir);
				$this->excel->getActiveSheet()->setCellValue('Y'.$i, $start_ajar);
				$this->excel->getActiveSheet()->setCellValue('Z'.$i, $end_ajar);
				$this->excel->getActiveSheet()->setCellValue('AA'.$i, $row->id_alumni);
				$this->excel->getActiveSheet()->setCellValue('AB'.$i, $row->no_sk);
				$this->excel->getActiveSheet()->setCellValue('AC'.$i, $tgl_sk);
				$this->excel->getActiveSheet()->setCellValue('AD'.$i, $row->gapok);
				$this->excel->getActiveSheet()->setCellValue('AE'.$i, $row->masa_abdi);
				$this->excel->getActiveSheet()->setCellValue('AF'.$i, $row->materi_diampu.' - '.$row->nama_matpal);
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'AF'; $col++) {

		    $this->excel->getActiveSheet()
		        ->getColumnDimension($col)
		        ->setAutoSize(true);
		}

		$styleArray = array(
		  'borders' => array(
		    'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		    )
		  )
		);
		$i = $i-1;
		$cell_to = "AF".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:AF3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:AF3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:AF3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Master-Data-Guru.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}