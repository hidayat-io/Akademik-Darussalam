<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends IO_Controller
{

	public function __construct()
		{
			$modul = 14;
			parent::__construct($modul);
		 	$this->load->model('msiswa','model');
	  }

	function index()
		{
		
		$vdata['title'] = 'DATA SANTRI';
			// $data['kategori'] = 'AITAM';
	    $data['content'] = $this->load->view('vsiswa',$vdata,TRUE);
	    $this->load->view('main',$data);
	  }

	function load_grid(){
		$user = $this->session->userdata('logged_in')['uid'];
		$data = $this->model->get_list_data($user,'siswa');
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;
		$fdate = 'd-M-Y';

		for($i = $iDisplayStart; $i < $end; $i++) {
			// $privilege = $this->session->userdata('logged_in')['priv'];
			// if ($privilege=='U')
			// {
 			// //$act = '- || <a class="btn btn-danger alert-danger btn-xs" href="'.base_url().'pembelian/edit/'.$data[$i]->no_pembelian.'" onclick="return confirm(\'anda yakin akan diedit\')">Edit</a>';
 			// $act = '- || <a class="btn btn-danger alert-danger btn-xs" href="#" onclick="editKeluar(\''.$data[$i]->no_registrasi.'\')">Edit</a>';
			// }else{
			// $act = '<a class="btn btn-danger alert-danger btn-xs" href="'.base_url().'siswa/delete/'.$data[$i]->no_registrasi.'" onclick="return confirm(\'anda yakin akan Hapus?\')">Hapus</a> ||
			// 	<a class="btn btn-danger alert-danger btn-xs" href="#" onclick="editKeluar(\''.$data[$i]->no_registrasi.'\')">Edit</a>';
			$act = '<div class="btn-group">
                      <button class="btn red btn-xs dropdown-toggle" type="button" onclick="" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-wrench"></i> ACTION
                          <i class="fa fa-angle-down"></i>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                          <li>
                              <a href="#" onclick="edit(\''.$data[$i]->no_registrasi.'\')"> LIHAT </a>
                          </li>
                          <li>
                              <a href="#" onclick="ONprosses()"> UBAH </a>
                          </li>
						  <li>
                              <a href="#" onclick="ONprosses()"> HAPUS </a>
                          </li>
                        </ul>
                    </div>';
			// }

	       	// $jumlah = $data[$i]->jumlah;
	       	// $harga = $data[$i]->harga;
			// $totalharga = $jumlah * $harga;

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
				 $data[$i]->tgl_lahir,
		      	$act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function no_registrasi($kategori_santri){
		$tahun_masehi 	= date('y');
		$tahun_hijri 	= '38';
		if($kategori_santri =='TMI') {
			$data_sequence 	= $this->model->get_sequence_noreg_TMI();
				if($data_sequence==null)
				{
					$no_registrasi = 'C'.'T'.$tahun_hijri.$tahun_masehi.'0001';
				}
				else
				{
					$no_terakhir 	= $data_sequence->nomor_terakhir;
					$sequence_db 	= substr($no_terakhir,-4);
					$awalan 		= 'C'.'T'.$tahun_hijri.$tahun_masehi;
					// $didb = substr($no_terakhir,0,6);
					
					if(substr($no_terakhir,0,6)==$awalan)
					{
						$akhiran 		= str_pad($sequence_db+1, 4, "0", STR_PAD_LEFT);
						$no_registrasi 	= $awalan.$akhiran;
						
					}
					else if(substr($no_terakhir,0,6)!=$awalan)
					{

						$no_registrasi = 'C'.'T'.$tahun_hijri.$tahun_masehi.'0001';
					}
				}
				$this->model->update_sequence_TMI($no_registrasi);
				return $no_registrasi;
			}
			else{
				$data_sequence 	= $this->model->get_sequence_noreg_AITAM();
				if($data_sequence==null)
				{
					$no_registrasi = 'C'.'A'.$tahun_hijri.$tahun_masehi.'0001';
				}
				else
				{
					$no_terakhir 	= $data_sequence->nomor_terakhir;
					$sequence_db 	= substr($no_terakhir,-4);
					$awalan 		= 'C'.'A'.$tahun_hijri.$tahun_masehi;
					
					if(substr($no_terakhir,0,6)==$awalan)
					{
						$akhiran 		= str_pad($sequence_db+1, 4, "0", STR_PAD_LEFT);
						$no_registrasi 	= $awalan.$akhiran;
					}
					else if(substr($no_terakhir,0,6)!=$awalan)
					{

						$no_registrasi = 'C'.'A'.$tahun_hijri.$tahun_masehi.'0001';
					}
				}
				$this->model->update_sequence_AITAM($no_registrasi);
				return $no_registrasi;
			}
		
		
	}

	function simpan_siswa()
	{
			$kategori_santri  		= $this->input->post('kategori_santri');
			$no_registrasi  		= $this->input->post('no_registrasi');
			$no_stambuk  			= $this->input->post('no_stambuk');
				$tglm					= $this->input->post('thn_masuk');
			$thn_masuk 				= io_return_date('d-m-Y',$tglm);
			$rayon  				= $this->input->post('rayon');
			$kamar  				= $this->input->post('kamar');
			$bagian  				= $this->input->post('bagian');
			$kel_sekarang  			= $this->input->post('kel_sekarang');
			$nisn  					= $this->input->post('nisn');
			$nisnlokal  			= $this->input->post('nisnlokal');
			$nama_lengkap  			= $this->input->post('nama_lengkap');
			$nama_arab  			= $this->input->post('nama_arab');
			$nama_panggilan  		= $this->input->post('nama_panggilan');
			$hobi  					= $this->input->post('hobi');
			$uang_jajan_perbulan  	= $this->input->post('uang_jajan_perbulan');
			$no_kk  				= $this->input->post('no_kk');
			$nik  					= $this->input->post('nik');
			$tempat_lahir  			= $this->input->post('tempat_lahir');
				$tgll					= $this->input->post('tgl_lahir');
			$tgl_lahir 				= io_return_date('d-m-Y',$tgll);
			$konsulat  				= $this->input->post('konsulat');
			$nama_sekolah_aitam  	= $this->input->post('nama_sekolah_aitam');
			$kelas_aitam  			= $this->input->post('kelas_aitam');
			$alamat_sekolah_aitam  	= $this->input->post('alamat_sekolah_aitam');
			$suku  					= $this->input->post('suku');
			$kewarganegaraan  		= $this->input->post('kewarganegaraan');
			$jalan  				= $this->input->post('jalan');
			$no_rumah  				= $this->input->post('no_rumah');
			$dusun  				= $this->input->post('dusun');
			$desa  					= $this->input->post('desa');
			$kecamatan  			= $this->input->post('kecamatan');
			$kabupaten  			= $this->input->post('kabupaten');
			$provinsi  				= $this->input->post('provinsi');
			$kd_pos  				= $this->input->post('kd_pos');
			$no_tlp  				= $this->input->post('no_tlp');
			$no_hp  				= $this->input->post('no_hp');
			$email  				= $this->input->post('email');
			$fb  					= $this->input->post('fb');
			$dibesarkan_di  		= $this->input->post('dibesarkan_di');
			$pembiaya  				= $this->input->post('pembiaya');
			$biaya_perbulan_min  	= $this->input->post('biaya_perbulan_min');
			$biaya_perbulan_max  	= $this->input->post('biaya_perbulan_max');
			$penghasilan  			= $this->input->post('penghasilan');
			$gol_darah  			= $this->input->post('gol_darah');
			$tinggi_badan  			= $this->input->post('tinggi_badan');
			$berat_badan  			= $this->input->post('berat_badan');
			$khitan  				= $this->input->post('khitan');
			$kondisi_pendidikan  	= $this->input->post('kondisi_pendidikan');
			$ekonomi_keluarga  		= $this->input->post('ekonomi_keluarga');
			$situasi_rumah  		= $this->input->post('situasi_rumah');
			$dekat_dengan  			= $this->input->post('dekat_dengan');
			$hidup_beragama  		= $this->input->post('hidup_beragama');
			$pengelihatan_mata  	= $this->input->post('pengelihatan_mata');
			$kaca_mata  			= $this->input->post('kaca_mata');
			$pendengaran  			= $this->input->post('pendengaran');
			$operasi  				= $this->input->post('operasi');
			$sebab  				= $this->input->post('sebab');
			$kecelakaan  			= $this->input->post('kecelakaan');
			$akibat  				= $this->input->post('akibat');
			$alergi  				= $this->input->post('alergi');
				$tglf					= $this->input->post('thn_fisik');
			$thn_fisik 				= io_return_date('d-m-Y',$tglf);
			$kelainan_fisik  		= $this->input->post('kelainan_fisik');
			$item_keluarga 			= $this->input->post('hid_table_item_Keluarga');
			$item_penyakit 			= $this->input->post('hid_table_item_penyakit');
			$item_kckhusus 			= $this->input->post('hid_table_item_KecakapanKhusus');
			$user 					= $this->session->userdata('logged_in')['uid'];


			$data_santri = array(
				'kategori' 				=> $kategori_santri,
				'no_registrasi' 		=> $no_registrasi,
				'no_stambuk' 			=> $no_stambuk,
				'thn_masuk' 			=> $thn_masuk,
				'rayon' 				=> $rayon,
				'kamar' 				=> $kamar,
				'bagian' 				=> $bagian,
				'kel_sekarang' 			=> $kel_sekarang,
				'nisn' 					=> $nisn,
				'nisnlokal' 			=> $nisnlokal,
				'nama_lengkap' 			=> $nama_lengkap,
				'nama_arab' 			=> $nama_arab,
				'nama_panggilan' 		=> $nama_panggilan,
				'hobi' 					=> $hobi,
				'uang_jajan_perbulan' 	=> str_replace(array('.',','), array('',''),$uang_jajan_perbulan),
				'no_kk' 				=> $no_kk,
				'nik' 					=> $nik,
				'tempat_lahir' 			=> $tempat_lahir,
				'tgl_lahir' 			=> $tgl_lahir,
				'konsulat' 				=> $konsulat,
				'nama_sekolah' 			=> $nama_sekolah_aitam,
				'kelas_sekolah' 		=> $kelas_aitam,
				'alamat_sekolah' 		=> $alamat_sekolah_aitam,
				'suku' 					=> $suku,
				'kewarganegaraan' 		=> $kewarganegaraan,
				'jalan' 				=> $jalan,
				'no_rumah' 				=> $no_rumah,
				'dusun' 				=> $dusun,
				'desa' 					=> $desa,
				'kecamatan' 			=> $kecamatan,
				'kabupaten' 			=> $kabupaten,
				'provinsi' 				=> $provinsi,
				'kd_pos' 				=> $kd_pos,
				'no_tlp' 				=> $no_tlp,
				'no_hp' 				=> $no_hp,
				'email' 				=> $email,
				'fb' 					=> $fb,
				'dibesarkan_di' 		=> $dibesarkan_di
				// 'user' 					=> $user
			);
			// var_dump($data_santri);
			// return false;

		if($no_registrasi=='')
		{// cek apakah add new atau editdata
			
			if($no_registrasi=='')$no_registrasi=$this->no_registrasi($kategori_santri);
			
			//update no_registrasi ke no baru
			$data_santri['no_registrasi'] = $no_registrasi;
		// save data santri
         	$this->model->simpan_data_santri($data_santri);

			//save pembiayaan
			$data_trans_pembiayaan_siswa = array(

				'no_registrasi' 		=> $no_registrasi,
				'pembiaya' 				=> $pembiaya,
				'biaya_perbulan_min' 	=> str_replace(array('.',','), array('',''),$biaya_perbulan_min),
				'biaya_perbulan_max' 	=> str_replace(array('.',','), array('',''),$biaya_perbulan_max),
				'penghasilan' 			=> str_replace(array('.',','), array('',''),$penghasilan)
				// 'user' 					=> $user
			);
			
		// save pembiayaan
			$this->model->simpan_pembiayaan_siswa($data_trans_pembiayaan_siswa);

			//save fisik
			$data_ms_fisik_santri = array(

				'no_registrasi' 		=> $no_registrasi,
				'gol_darah' 			=> $gol_darah,
				'tinggi_badan' 			=> $tinggi_badan,
				'berat_badan' 			=> $berat_badan,
				'khitan' 				=> $khitan,
				'kondisi_pendidikan' 	=> $kondisi_pendidikan,
				'ekonomi_keluarga' 		=> $ekonomi_keluarga,
				'situasi_rumah' 		=> $situasi_rumah,
				'dekat_dengan' 			=> $dekat_dengan,
				'hidup_beragama' 		=> $hidup_beragama,
				'pengelihatan_mata' 	=> $pengelihatan_mata,
				'kaca_mata' 			=> $kaca_mata,
				'pendengaran' 			=> $pendengaran,
				'operasi' 				=> $operasi,
				'sebab' 				=> $sebab,
				'kecelakaan' 			=> $kecelakaan,
				'akibat' 				=> $akibat,
				'alergi' 				=> $alergi,
				'thn_fisik' 			=> $thn_fisik,
				'kelainan_fisik' 		=> $kelainan_fisik
				// 'user' 					=> $user
			);
			
		// save fisik
			$this->model->simpan_ms_fisik_santri($data_ms_fisik_santri);

			//save keluarga
			$item_keluarga  = explode(';',$item_keluarga );
			foreach ($item_keluarga   as $i) {
					$idetail = explode('#',$i);
					if(count($idetail)>1){

							$detail_keluarga = array(

								'no_registrasi' 		=> $no_registrasi,
								'kategori'				=> $idetail[0],
								'nama'					=> $idetail[1],
								'nik'					=> $idetail[2],
								'binbinti'				=> $idetail[3],
								'jenis_kelamin'			=> $idetail[4],
								'status'				=> $idetail[5],
								'tgl_wafat'				=> $idetail[6],
								'umur'					=> $idetail[7],
								'hari'					=> $idetail[8],
								'sebab_wafat'			=> $idetail[9],
								'status_perkawinan'		=> $idetail[10],
								'pendapatan_ibu'		=> $idetail[11],
								'sebab_tdk_bekerja'		=> $idetail[12],
								'keahlian'				=> $idetail[13],
								'status_rumah'			=> $idetail[14],
								'kondisi_rumah'			=> $idetail[15],
								'jml_asuh'				=> $idetail[16],
								'pekerjaan'				=> $idetail[17],
								'pend_terakhir'			=> $idetail[18],
								'agama'					=> $idetail[19],
								'suku'					=> $idetail[20],
								'kewarganegaraan'		=> $idetail[21],
								'ormas'					=> $idetail[22],
								'orpol'					=> $idetail[23],
								'kedukmas'				=> $idetail[24],
								'thn_lulus'				=> $idetail[25],
								'no_stambuk_alumni'		=> $idetail[26],
								'tempat_lahir'			=> $idetail[27],
								'tgl_lahir_keluarga'	=> $idetail[28],
								'hub_kel'				=> $idetail[29],
								'keterangan'			=> $idetail[30],
								'ktp'					=> $idetail[31]

							);
							// rubah format tgl wafat
							$tglw					= $idetail[6];
							$tgl_wafat 				= io_return_date('d-m-Y',$tglw);
							$detail_keluarga['tgl_wafat'] = $tgl_wafat;
							// rbuah formattahun lulus keluarga
							$tgll					= $idetail[25];
							$tgl_l 					= date_parse_from_format("d/m/Y", $tgll);
							$thn_lulus 				= $tgl_l['year'].'-'.'01'.'-'.'01';
							$detail_keluarga['thn_lulus'] = $thn_lulus;
							// rbuah format tgl lahri keluarga
							$tglkel					= $idetail[28];
							$tgl_lahir_keluarga 				= io_return_date('d-m-Y',$tglkel);
							$detail_keluarga['tgl_lahir_keluarga'] = $tgl_lahir_keluarga;

							$detail_keluarga['pendapatan_ibu']	= str_replace(array('.',','), array('',''),$idetail[11]);
							//pindahkan filenya
							if(file_exists ('./assets/images/uploadtemp/'.$detail_keluarga->ktp)){
							rename('./assets/images/uploadtemp/'.$detail_keluarga->ktp,'./assets/images/fileupload/ktp/'.$detail_keluarga->ktp);
							}
							
							
		// save keluarga
			$this->model->simpan_item_keluarga($detail_keluarga);

					}
			}

			//save penyakit
			
			$item_penyakit  = explode(';',$item_penyakit );
			foreach ($item_penyakit   as $i) {
					$idetail = explode('#',$i);
					if(count($idetail)>1){

							$detail_penyakit = array(

								'no_registrasi' 		=> $no_registrasi,
								'nama_penyakit'			=> $idetail[0],
								'thn_penyakit'			=> $idetail[1],
								'kategori_penyakit'		=> $idetail[2],
								'tipe_penyakit'			=> $idetail[3],
								'lamp_bukti'			=> $idetail[4]

							);
							// rbuah thun penyakit
							$tglp					= $idetail[1];
							$tgl_p 					= date_parse_from_format("d/m/Y", $tglp);
							$thn_penyakit 				= $tgl_p['year'].'-'.'01'.'-'.'01';
							$detail_penyakit['thn_penyakit'] = $thn_penyakit;
							//pindahkan filenya
							if(file_exists ('./assets/images/uploadtemp/'.$detail_penyakit->lamp_bukti)){
							rename('./assets/images/uploadtemp/'.$detail_penyakit->lamp_bukti,'./assets/images/fileupload/lamp_penyakit/'.$detail_penyakit->lamp_bukti);	
							}
		// save penyakit
			$this->model->simpan_item_penyakit($detail_penyakit);

					}
			}

			//save khusus
			
			$item_kckhusus  = explode(';',$item_kckhusus);
			foreach ($item_kckhusus as $i) {
					$idetail = explode('#',$i);
					if(count($idetail)>1){

							$detail_kckhusus = array(

								'no_registrasi' 	=> $no_registrasi,
								'bid_studi'			=> $idetail[0],
								'olahraga'			=> $idetail[1],
								'kesenian'			=> $idetail[2],
								'keterampilan'		=> $idetail[3],
								'lain_lain'			=> $idetail[4]

							);
		// save kecakapan khusus
			$this->model->simpan_item_kckhusus($detail_kckhusus);

					}
			}
			//upload file
			$string_name 				= io_random_string(20);
			$filename 					= $string_name.'.jpg';
			$config['upload_path']   	= './assets/images/fileupload/santri/';
			$config['allowed_types'] 	= 'jpg|jpeg';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload', $config);
			if($this->upload->do_upload('fileUpload')){

				$this->model->update_photo($no_registrasi,$filename);
				// var_dump($no_registrasi);
				// return false;
			}
			else{

				echo $this->upload->display_errors();
			};
			//upload file
			$string_name 				= io_random_string(20);
			$temp						= explode(".",$_FILES['fileUpload_ijazah']['name']);
			$filename 					= $string_name.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/ijazah/';
			$config['allowed_types'] 	= '*';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			// $this->load->library('upload', $config);
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileUpload_ijazah')){

				$this->model->update_photo_ijazah($no_registrasi,$filename);
				// var_dump($no_registrasi);
				// return false;
			}
			else{

				echo $this->upload->display_errors();
			};
			//upload file
			$string_name 				= io_random_string(20);
			$temp						= explode(".",$_FILES['fileUpload_akelahiran']['name']);
			$filename 					= $string_name.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/akte_kelahiran/';
			$config['allowed_types'] 	= 'png|jpg|jpeg|pdf|doc|docx';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileUpload_akelahiran')){

				$this->model->update_photo_akte_kelahiran($no_registrasi,$filename);
				// var_dump($no_registrasi);
				// return false;
			}
			else{

				echo $this->upload->display_errors();
			};
			//upload file
			$string_name 				= io_random_string(20);
			$temp						= explode(".",$_FILES['fileUpload_kk']['name']);
			$filename 					= $string_name.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/kartukeluarga/';
			$config['allowed_types'] 	= '*';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileUpload_kk')){

				$this->model->update_photo_kartukeluarga($no_registrasi,$filename);
				// var_dump($no_registrasi);
				// return false;
			}
			else{

				echo $this->upload->display_errors();
			};
			//upload file
			$string_name 				= io_random_string(20);
			$temp						= explode(".",$_FILES['fileUpload_skhun']['name']);
			$filename 					= $string_name.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/skhun/';
			$config['allowed_types'] 	= '*';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileUpload_skhun')){

				$this->model->update_photo_skhun($no_registrasi,$filename);
				// var_dump($no_registrasi);
				// return false;
			}
			else{

				echo $this->upload->display_errors();
			};
			//upload file
			$string_name 				= io_random_string(20);
			$temp						= explode(".",$_FILES['fileUpload_transkip']['name']);
			$filename 					= $string_name.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/transkip_nilai/';
			$config['allowed_types'] 	= '*';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileUpload_transkip')){

				$this->model->update_photo_trasnkip_nilai($no_registrasi,$filename);
				// var_dump($no_registrasi);
				// return false;
			}
			else{

				echo $this->upload->display_errors();
			};
			//upload file
			$string_name 				= io_random_string(20);
			$temp						= explode(".",$_FILES['fileUpload_skbb']['name']);
			$filename 					= $string_name.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/skb/';
			$config['allowed_types'] 	= '*';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileUpload_skbb')){

				$this->model->update_photo_skb($no_registrasi,$filename);
				// var_dump($no_registrasi);
				// return false;
			}
			else{

				echo $this->upload->display_errors();
			};
			//upload file
			$string_name 				= io_random_string(20);
			$temp						= explode(".",$_FILES['fileUpload_skes']['name']);
			$filename 					= $string_name.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/surat_kesehatan/';
			$config['allowed_types'] 	= '*';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileUpload_skes')){

				$this->model->update_photo_surat_kesehatan($no_registrasi,$filename);
				// var_dump($no_registrasi);
				// return false;
			}
			else{

				echo $this->upload->display_errors();
			};

        }
        else
		{		
			// Prosess update
			
        }	

			echo "true";
	}

	function upload_lamp_keluarga(){
    	$this->load->library('upload');
    	//upload file
		$ioname		 				= io_random_string(4);
		$temp						= explode(".",$_FILES['ktp_keluarga']['name']);
		$filename 					= $ioname.'.'.end($temp);
		$config['upload_path']   	= './assets/images/uploadtemp/';				
		$config['file_name'] 		= $filename;				
		$config['allowed_types']    = '*';

		$this->upload->initialize($config);

		if($this->upload->do_upload('ktp_keluarga')){

			$response = array(

				'name' => $filename
			);

			echo json_encode($response);
		}
    }

	function upload_lamp_penyakit(){
    	$this->load->library('upload');
		
    	//upload file
		$ioname		 				= io_random_string(4);
		$temp						= explode(".",$_FILES['lamp_bukti']['name']);
		$filename 					= $ioname.'.'.end($temp);
		$config['upload_path']   	= './assets/images/uploadtemp/';				
		$config['file_name'] 		= $filename;				
		$config['allowed_types']    = '*';

		$this->upload->initialize($config);

		if($this->upload->do_upload('lamp_bukti')){

			$response = array(

				'name' => $filename
			);

			echo json_encode($response);
		}
    }

	function get_data_santri($no_registrasi){
		$data = $this->model->query_santri($no_registrasi);
    	echo json_encode($data);
	}
	
	function get_data_keluarga($no_registrasi){
		$data = $this->model->query_keluarga($no_registrasi);
    	echo json_encode($data);
	}

	function get_data_penyakit($no_registrasi){
		$data = $this->model->query_penyakit($no_registrasi);
    	echo json_encode($data);
	}

	function get_data_kecakapankhusus($no_registrasi){
		$data = $this->model->query_kecakapankhusus($no_registrasi);
    	echo json_encode($data);
	}




}