<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends IO_Controller
{

	public function __construct()
	{
			$modul = 1;
			parent::__construct($modul);
		 	$this->load->model('mpendaftaran','model');
	}

	function index()
	{
		//get ID Gedung
			$hide_id_gedung = $this->model->get_gedung()->result();

			$vdata['kode_gedung'][NULL] = '-';
			foreach ($hide_id_gedung as $b) {

				$vdata['kode_gedung'][$b->kode_gedung."#".$b->nama]
					=$b->kode_gedung." | ".$b->nama;
			}

			//get ID Kamar
			$hide_id_Kamar= $this->model->get_kamar()->result();

			$vdata['kode_kamar'][NULL] = '-';
			foreach ($hide_id_Kamar as $b) {

				$vdata['kode_kamar'][$b->kode_kamar."#".$b->nama]
					=$b->kode_kamar." | ".$b->nama;
			}

			//get ID Bagian
			$hide_id_Bagian= $this->model->get_bagian()->result();

			$vdata['kode_Bagian'][NULL] = '-';
			foreach ($hide_id_Bagian as $b) {

				$vdata['kode_Bagian'][$b->kode_bagian."#".$b->nama]
					=$b->kode_bagian." | ".$b->nama;
			}

			//get ID Kelas
			$hide_id_Kelas= $this->model->get_kelas()->result();

			$vdata['kode_kelas'][NULL] = '-';
			foreach ($hide_id_Kelas as $b) {

				$vdata['kode_kelas'][$b->kode_kelas."#".$b->tingkat."#".$b->nama."#".$b->tipe_kelas]
					=$b->kode_kelas." | ".$b->tingkat." | ".$b->nama." | ".$b->tipe_kelas;
			}

			//get ID Donatur
			$hide_id_Donatur= $this->model->get_donatur()->result();

			$vdata['id_donatur'][NULL] = '-';
			foreach ($hide_id_Donatur as $b) {

				$vdata['id_donatur'][$b->id_donatur."#".$b->nama_donatur."#".$b->kategori]
					=$b->id_donatur." | ".$b->nama_donatur." | ".$b->kategori;
			}
			
		$vdata['kategori_santri']		= 'TMI';
		$vdata['page']					= 'DAFTAR';
		$vdata['title'] = 'DATA CALON SANTRI TMI';
	    $data['content'] = $this->load->view('vpendaftaran',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function aitam(){
		//get ID Gedung
			$hide_id_gedung = $this->model->get_gedung()->result();

			$vdata['kode_gedung'][NULL] = '-';
			foreach ($hide_id_gedung as $b) {

				$vdata['kode_gedung'][$b->kode_gedung."#".$b->nama]
					=$b->kode_gedung." | ".$b->nama;
			}

			//get ID Kamar
			$hide_id_Kamar= $this->model->get_kamar()->result();

			$vdata['kode_kamar'][NULL] = '-';
			foreach ($hide_id_Kamar as $b) {

				$vdata['kode_kamar'][$b->kode_kamar."#".$b->nama]
					=$b->kode_kamar." | ".$b->nama;
			}

			//get ID Bagian
			$hide_id_Bagian= $this->model->get_bagian()->result();

			$vdata['kode_Bagian'][NULL] = '-';
			foreach ($hide_id_Bagian as $b) {

				$vdata['kode_Bagian'][$b->kode_bagian."#".$b->nama]
					=$b->kode_bagian." | ".$b->nama;
			}

			//get ID Kelas
			$hide_id_Kelas= $this->model->get_kelas()->result();

			$vdata['kode_kelas'][NULL] = '-';
			foreach ($hide_id_Kelas as $b) {

				$vdata['kode_kelas'][$b->kode_kelas."#".$b->tingkat."#".$b->nama."#".$b->tipe_kelas]
					=$b->kode_kelas." | ".$b->tingkat." | ".$b->nama." | ".$b->tipe_kelas;
			}

			//get ID Donatur
			$hide_id_Donatur= $this->model->get_donatur()->result();

			$vdata['id_donatur'][NULL] = '-';
			foreach ($hide_id_Donatur as $b) {

				$vdata['id_donatur'][$b->id_donatur."#".$b->nama_donatur."#".$b->kategori]
					=$b->id_donatur." | ".$b->nama_donatur." | ".$b->kategori;
			}
			
		$vdata['kategori_santri']		= 'AITAM';
		$vdata['page']					= 'DAFTAR';
		$vdata['title'] 				= 'DATA CALON AITAM';
	    $data['content'] 				= $this->load->view('vpendaftaran',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->no_registrasi)) $string_param .= " and no_registrasi LIKE '%".$param->no_registrasi."%' ";
		}

		return $string_param;
	}

	function load_grid($kategori_santri,$page)
	{
		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];
		// var_dump($_REQUEST['order']);
		// exit();


		$data 				= $this->model->get_list_data($string_param,$sort_by,$sort_type,$kategori_santri,$page);
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
			if ($page == 'DAFTAR')
		{
			$act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-file-o"></i>
					<a class="btn blue btn-xs" title="UBAH DATA" onclick="edit(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-edit"></i>
					<a class="btn red btn-xs" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-trash"></i>';
		}
		else {
			$act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-file-o"></i>
					<a class="btn blue btn-xs" title="UBAH DATA" onclick="edit(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-edit"></i>
					<a class="btn red btn-xs" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-trash"></i>
					<a class="btn yellow btn-xs" title="Jadikan TMI" onclick="ToTMI(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-exchange"></i>';
		}	
					
			$records["data"][] = array(

		     	$data[$i]->no_registrasi,
  				$data[$i]->thn_masuk,
  				$data[$i]->nama_lengkap,
		     	$data[$i]->nama_arab,
		     	// $data[$i]->nama_panggilan,
		     	// number_format($data[$i]->uang_jajan_perbulan,0,",","."),
				//  $data[$i]->no_kk,
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

	function exportexcel(){
		// hasil decode // 
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		$str = $this->build_param($str);

		$data= $this->model->get_list_data($str);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Calon_Siswa');
		$this->excel->getActiveSheet()->setCellValue('A1', "LIST CALON SISWA");
		$this->excel->getActiveSheet()->mergeCells('A1:G1');
		$this->excel->getActiveSheet()->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "No Register");
		$this->excel->getActiveSheet()->setCellValue('C3', "Tahun Masuk");
		$this->excel->getActiveSheet()->setCellValue('D3', "Nama Santri");
		$this->excel->getActiveSheet()->setCellValue('E3', "Nama Arab");
		$this->excel->getActiveSheet()->setCellValue('F3', "Tempat Lahir");
		$this->excel->getActiveSheet()->setCellValue('G3', "Tanggal Lahir");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->no_registrasi);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, io_date_format($row->thn_masuk,$fdate));
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->nama_lengkap);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $row->nama_arab);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->tempat_lahir);
				$this->excel->getActiveSheet()->setCellValue('G'.$i, io_date_format($row->tgl_lahir,$fdate));
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'G'; $col++) {

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
		$cell_to = "G".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:G3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:G3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:G3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Calon-Siswa.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	function no_registrasi($kategori_santri)
	{
		$page  		= $this->input->post('hid_page');
		$tahun_masehi 	= date('y');
		$today 			= date("Y/m/d");
		$tahun_hijri 	= io_get_hijri($today);
		$tahun_hijri  	= substr($tahun_hijri['year'],-2);
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
		$kategori_santri 		= $this->input->post('kategori_santri');
		$kategori_update  		= $this->input->post('kategori_update');
		$no_registrasi  		= $this->input->post('no_registrasi');
		$no_stambuk  			= $this->input->post('no_stambuk');
		$thn_masuk					= $this->input->post('thn_masuk');
		// $thn_masuk 				= io_return_date('d-m-Y',$tglm);
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
		$thn_fisik					= $this->input->post('thn_fisik');
		// $thn_fisik 				= io_return_date('d-m-Y',$tglf);
		$kelainan_fisik  		= $this->input->post('kelainan_fisik');
		$item_keluarga 			= $this->input->post('hid_table_item_Keluarga');
		$item_penyakit 			= $this->input->post('hid_table_item_penyakit');
		$item_kckhusus 			= $this->input->post('hid_table_item_KecakapanKhusus');
		$item_donatur 			= $this->input->post('hid_table_item_donatur');
		$TfileUpload 		= $this->input->post('TfileUpload');
		$TfileUpload_ijazah 		= $this->input->post('TfileUpload_ijazah');
		$TfileUpload_akelahiran 		= $this->input->post('TfileUpload_akelahiran');
		$TfileUpload_kk 		= $this->input->post('TfileUpload_kk');
		$TfileUpload_skhun 		= $this->input->post('TfileUpload_skhun');
		$TfileUpload_transkip 		= $this->input->post('TfileUpload_transkip');
		$TfileUpload_skbb 		= $this->input->post('TfileUpload_skbb');
		$TfileUpload_skes 		= $this->input->post('TfileUpload_skes');
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
			
			$this->model->simpan_ms_fisik_santri($data_ms_fisik_santri);

		//save keluarga
			$item_keluarga  = explode(';',$item_keluarga );
			foreach ($item_keluarga   as $i) 
				{
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
							// $tgll					= $idetail[25];
							// $tgl_l 					= date_parse_from_format("d/m/Y", $tgll);
							// $thn_lulus 				= $tgl_l['year'].'-'.'01'.'-'.'01';
							// $detail_keluarga['thn_lulus'] = $thn_lulus;
							// rbuah format tgl lahri keluarga
							$tglkel					= $idetail[28];
							$tgl_lahir_keluarga 				= io_return_date('d-m-Y',$tglkel);
							$detail_keluarga['tgl_lahir_keluarga'] = $tgl_lahir_keluarga;

							$detail_keluarga['pendapatan_ibu']	= str_replace(array('.',','), array('',''),$idetail[11]);
							//pindahkan filenya
							if(file_exists ('./assets/images/uploadtemp/'.$detail_keluarga['ktp']))
							{
								rename('./assets/images/uploadtemp/'.$detail_keluarga['ktp'],'./assets/images/fileupload/ktp/'.$detail_keluarga['ktp']);
							}
							
							$this->model->simpan_item_keluarga($detail_keluarga);

					}
				}

		//save penyakit
			
			$item_penyakit  = explode(';',$item_penyakit );
			foreach ($item_penyakit   as $i) 
				{
					$idetail = explode('#',$i);
					if(count($idetail)>1)
					{

							$detail_penyakit = array(

								'no_registrasi' 		=> $no_registrasi,
								'nama_penyakit'			=> $idetail[0],
								'thn_penyakit'			=> $idetail[1],
								'kategori_penyakit'		=> $idetail[2],
								'tipe_penyakit'			=> $idetail[3],
								'lamp_bukti'			=> $idetail[4]

							);
							
							// rbuah thun penyakit
							// $tglp						= $idetail[1];
							// // $tgl_p 						= date_parse_from_format("d/m/Y", $tglp);
							// $thn_penyakit 				= $tglp.'-'.'01'.'-'.'01';
							// var_dump($thn_penyakit);
							// exit();
							// $detail_penyakit['thn_penyakit'] = $thn_penyakit;
							//pindahkan filenya
							if(file_exists ('./assets/images/uploadtemp/'.$detail_penyakit['lamp_bukti'])){
							rename('./assets/images/uploadtemp/'.$detail_penyakit['lamp_bukti'],'./assets/images/fileupload/lamp_penyakit/'.$detail_penyakit['lamp_bukti']);	
							}
							
							$this->model->simpan_item_penyakit($detail_penyakit);

					}
				}

		//save kecakapan khusus
			$bid_studi  			= $this->input->post('bid_studi');
			$olahraga  				= $this->input->post('olahraga');
			$kesenian  				= $this->input->post('kesenian');
			$keterampilan  			= $this->input->post('keterampilan');
			$lain_lain  			= $this->input->post('lain_lain');

			$detail_kckhusus = array(

				'no_registrasi' 	=> $no_registrasi,
				'bid_studi'			=> $bid_studi,
				'olahraga'			=> $olahraga,
				'kesenian'			=> $kesenian,
				'keterampilan'		=> $keterampilan,
				'lain_lain'			=> $lain_lain

			);
			$this->model->simpan_item_kckhusus($detail_kckhusus);
		//upload file santri photo
			$string_name 				= io_random_string(20);
			$filename 					= $string_name.'.jpg';
			$config['upload_path']   	= './assets/images/fileupload/santri/';
			$config['allowed_types'] 	= 'jpg|jpeg';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload', $config);
			if($this->upload->do_upload('fileUpload')){

				$this->model->update_photo($no_registrasi,$filename);
			}
			else{

				echo $this->upload->display_errors();
			};
		//upload file ijazah
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
			}
			else{

				echo $this->upload->display_errors();
			};
		//upload file akte_kelahiran
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
			}
			else{

				echo $this->upload->display_errors();
			};
		//upload file kartukeluarga
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
			}
			else{

				echo $this->upload->display_errors();
			};
		//upload file skhun
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
			}
			else{

				echo $this->upload->display_errors();
			};
		//upload file transkip_nilai
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
			}
			else{

				echo $this->upload->display_errors();
			};
		//upload file skb
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
			}
			else{

				echo $this->upload->display_errors();
			};
		//upload file surat_kesehatan
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
			}
			else{

				echo $this->upload->display_errors();
			};
		
		//save donatur
			
			$item_donatur  = explode(';',$item_donatur );
			foreach ($item_donatur   as $i) 
				{
					$idetail = explode('#',$i);
					if(count($idetail)>1)
					{

						$detail_donatur = array(

							'no_registrasi' 		=> $no_registrasi,
							'id_donatur'			=> $idetail[0]

						);
						
						$this->model->simpan_item_donatur($detail_donatur);

					}
				}
				
        }
        else //update data
		{		
			// Prosess update
		// save data santri
			$data_santri['kategori'] = $kategori_update;
		// 			var_dump($data_santri);
		// exit();
         	$this->model->update_data_santri($no_registrasi,$data_santri);

		//save pembiayaan
				$data_trans_pembiayaan_siswa = array(

					'no_registrasi' 		=> $no_registrasi,
					'pembiaya' 				=> $pembiaya,
					'biaya_perbulan_min' 	=> str_replace(array('.',','), array('',''),$biaya_perbulan_min),
					'biaya_perbulan_max' 	=> str_replace(array('.',','), array('',''),$biaya_perbulan_max),
					'penghasilan' 			=> str_replace(array('.',','), array('',''),$penghasilan)
					// 'user' 					=> $user
				);
				
				$this->model->update_pembiayaan_siswa($no_registrasi,$data_trans_pembiayaan_siswa);

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
				
				$this->model->update_ms_fisik_santri($no_registrasi,$data_ms_fisik_santri);

		//save keluarga
			
				$this->model->delete_item_keluarga($no_registrasi);	//delete semua isi keluarga
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
								// $tgll					= $idetail[25];
								// $tgl_l 					= date_parse_from_format("d/m/Y", $tgll);
								// $thn_lulus 				= $tgl_l['year'].'-'.'01'.'-'.'01';
								// $detail_keluarga['thn_lulus'] = $thn_lulus;
								// rbuah format tgl lahri keluarga
								$tglkel					= $idetail[28];
								$tgl_lahir_keluarga 				= io_return_date('d-m-Y',$tglkel);
								$detail_keluarga['tgl_lahir_keluarga'] = $tgl_lahir_keluarga;

								$detail_keluarga['pendapatan_ibu']	= str_replace(array('.',','), array('',''),$idetail[11]);
								//pindahkan filenya
								if(file_exists ('./assets/images/uploadtemp/'.$detail_keluarga->ktp)){
								rename('./assets/images/uploadtemp/'.$detail_keluarga['ktp'],'./assets/images/fileupload/ktp/'.$detail_keluarga['ktp']);
								}
							$this->model->simpan_item_keluarga($detail_keluarga); //masukan kembali isi keluarga

						}
				}

		//save penyakit
			
				$this->model->delete_item_penyakit($no_registrasi);
				$item_penyakit  = explode(';',$item_penyakit );
				foreach ($item_penyakit   as $i) 
					{
						$idetail = explode('#',$i);
							if(count($idetail)>1)
							{

									$detail_penyakit = array(

										'no_registrasi' 		=> $no_registrasi,
										'nama_penyakit'			=> $idetail[0],
										'thn_penyakit'			=> $idetail[1],
										'kategori_penyakit'		=> $idetail[2],
										'tipe_penyakit'			=> $idetail[3],
										'lamp_bukti'			=> $idetail[4]

									);
									//pindahkan filenya
									if(file_exists ('./assets/images/uploadtemp/'.$detail_penyakit['lamp_bukti'])){
									rename('./assets/images/uploadtemp/'.$detail_penyakit['lamp_bukti'],'./assets/images/fileupload/lamp_penyakit/'.$detail_penyakit['lamp_bukti']);	
									}
									
									$this->model->simpan_item_penyakit($detail_penyakit);

							}
					}

		//save khusus
				$this->model->delete_item_kckhusus($no_registrasi);
				//save kecakapan khusus
			$bid_studi  			= $this->input->post('bid_studi');
			$olahraga  				= $this->input->post('olahraga');
			$kesenian  				= $this->input->post('kesenian');
			$keterampilan  			= $this->input->post('keterampilan');
			$lain_lain  			= $this->input->post('lain_lain');

			$detail_kckhusus = array(

				'no_registrasi' 	=> $no_registrasi,
				'bid_studi'			=> $bid_studi,
				'olahraga'			=> $olahraga,
				'kesenian'			=> $kesenian,
				'keterampilan'		=> $keterampilan,
				'lain_lain'			=> $lain_lain

			);
			$this->model->simpan_item_kckhusus($detail_kckhusus);
		//upload file
			//upload file santri photo
			
					$string_name 				= io_random_string(20);
					$filename 					= $string_name.'.jpg';
					$config['upload_path']   	= './assets/images/fileupload/santri/';
					$config['allowed_types'] 	= 'jpg|jpeg';
					$config['file_name'] 		= $filename;
					$config['overwrite'] 		= true;
					$this->load->library('upload', $config);
					if($this->upload->do_upload('fileUpload')){

						$this->model->update_photo($no_registrasi,$filename);
						unlink('./assets/images/fileupload/santri/'.$TfileUpload);
					}
					else{

						echo $this->upload->display_errors();
					};

			//upload file ijazah
				if($_FILES['fileUpload_ijazah'] != '')
				
				{
					$string_name 				= io_random_string(20);
					$temp						= explode(".",$_FILES['fileUpload_ijazah']['name']);
					$filename 					= $string_name.'.'.end($temp);
					$config['upload_path']   	= './assets/images/fileupload/ijazah/';
					$config['allowed_types'] 	= '*';
					$config['file_name'] 		= $filename;
					$config['overwrite'] 		= true;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if($this->upload->do_upload('fileUpload_ijazah')){

						$this->model->update_photo_ijazah($no_registrasi,$filename);
						unlink('./assets/images/fileupload/ijazah/'.$TfileUpload_ijazah);
					}
					else{

						echo $this->upload->display_errors();
					};
				}
				
			//upload file akte_kelahiran
				if($_FILES['fileUpload_akelahiran'] != '')
				
				{
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
						unlink('./assets/images/fileupload/akte_kelahiran/'.$TfileUpload_akelahiran);
					}
					else{

						echo $this->upload->display_errors();
					};
				}

			//upload file skhun
				if($_FILES['fileUpload_kk'] != '')
				
				{
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
						unlink('./assets/images/fileupload/kartukeluarga/'.$TfileUpload_kk);
					}
					else{

						echo $this->upload->display_errors();
					};
				}

			//upload file skhun
				if($_FILES['fileUpload_skhun'] != '')
				
				{
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
						unlink('./assets/images/fileupload/skhun/'.$TfileUpload_skhun);
					}
					else{

						echo $this->upload->display_errors();
					};
				}

			//upload file 
				if($_FILES['fileUpload_transkip'] != '')
				
				{
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
						unlink('./assets/images/fileupload/transkip_nilai/'.$TfileUpload_transkip);
					}
					else{

						echo $this->upload->display_errors();
					};
				}

			//upload file skb
				if($_FILES['fileUpload_skbb'] != '')
				
				{
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
						unlink('./assets/images/fileupload/skb/'.$TfileUpload_skbb);
					}
					else{

						echo $this->upload->display_errors();
					};
				}

			//upload file surat_kesehatan
				if($_FILES['fileUpload_skes'] != '')
				
				{
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
						unlink('./assets/images/fileupload/surat_kesehatan/'.$TfileUpload_skes);
					}
					else{

						echo $this->upload->display_errors();
					};
					
				}
					
		//save donatur
			
				$this->model->delete_item_donatur($no_registrasi);
				$item_donatur  = explode(';',$item_donatur );
				foreach ($item_donatur   as $i) 
					{
						$idetail = explode('#',$i);
							if(count($idetail)>1)
							{

									$detail_donatur = array(

										'no_registrasi' 		=> $no_registrasi,
										'id_donatur'			=> $idetail[0]

									);									
									$this->model->simpan_item_donatur($detail_donatur);

							}
					}		
        }	

			echo "true";
	}

	function upload_lamp_keluarga()
	{
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

	function upload_lamp_penyakit()
	{
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
			// var_dump($response);
			// exit();
			echo json_encode($response);
		}
    }

	function get_data_santri($no_registrasi)
	{
		$data = $this->model->query_santri($no_registrasi);
    	echo json_encode($data);
	}
	
	function get_data_keluarga($no_registrasi)
	{
		$data = $this->model->query_keluarga($no_registrasi);
    	echo json_encode($data);
	}

	function get_data_penyakit($no_registrasi)
	{
		$data = $this->model->query_penyakit($no_registrasi);
    	echo json_encode($data);
	}

	function get_data_kecakapankhusus($no_registrasi)
	{
		$data = $this->model->query_kecakapankhusus($no_registrasi);
    	echo json_encode($data);
	}
	
	function get_data_donatur($no_registrasi)
	{
		$data = $this->model->query_donatur($no_registrasi);
    	echo json_encode($data);
	}

	function no_stambuk($kategori_santri)
	{
			if($kategori_santri =='TMI') {
				
				$data_sequence 	= $this->model->get_sequence_noStambukTMI();
				
					if($data_sequence==null)
					{
						$no_stambuk = '1';
					}
					else
					{
						$no_terakhir 	= $data_sequence->nomor_terakhir;
						$no_stambuk 		= $no_terakhir+1;
						
					
					}
					
					$this->model->update_sequence_SantriTMI($no_stambuk);
					return $no_stambuk;
					
				}
				else{
					$no_stambuk = '0';
				}
			
			
	}

	function new_no_registrasi($kategori_santri)
	{
		$tahun_masehi 	= date('y');
		$today 			= date("Y/m/d");
		$tahun_hijri 	= io_get_hijri($today);
		$tahun_hijri  	= substr($tahun_hijri['year'],-2);
		if($kategori_santri =='TMI') {
			$data_sequence 	= $this->model->new_get_sequence_noreg_TMI();
				if($data_sequence==null)
				{
					$no_registrasi = 'T'.$tahun_hijri.$tahun_masehi.'0001';
				}
				else
				{
					$no_terakhir 	= $data_sequence->nomor_terakhir;
					$sequence_db 	= substr($no_terakhir,-4);
					$awalan 		= 'T'.$tahun_hijri.$tahun_masehi;
					// $didb = substr($no_terakhir,0,6);
					
					if(substr($no_terakhir,0,5)==$awalan)
					{
						$akhiran 		= str_pad($sequence_db+1, 4, "0", STR_PAD_LEFT);
						$no_registrasi 	= $awalan.$akhiran;
						
					}
					else if(substr($no_terakhir,0,6)!=$awalan)
					{

						$no_registrasi = 'T'.$tahun_hijri.$tahun_masehi.'0001';
					}
				}
				$this->model->new_update_sequence_TMI($no_registrasi);
				return $no_registrasi;
			}
			else{
				$data_sequence 	= $this->model->new_get_sequence_noreg_AITAM();
				if($data_sequence==null)
				{
					$no_registrasi = 'A'.$tahun_hijri.$tahun_masehi.'0001';
				}
				else
				{
					$no_terakhir 	= $data_sequence->nomor_terakhir;
					$sequence_db 	= substr($no_terakhir,-3);
					$awalan 		= 'A'.$tahun_hijri.$tahun_masehi;
					
					if(substr($no_terakhir,0,5)==$awalan)
					{
						$akhiran 		= str_pad($sequence_db+1, 4, "0", STR_PAD_LEFT);
						$no_registrasi 	= $awalan.$akhiran;
					}
					else if(substr($no_terakhir,0,5)!=$awalan)
					{

						$no_registrasi = 'A'.$tahun_hijri.$tahun_masehi.'0001';
					}
				}
				$this->model->new_update_sequence_AITAM($no_registrasi);
				return $no_registrasi;
			}
		
		
	}

	function addtosantri()
	{
		$kategori_santri  		= $this->input->post('kategori_update');
		$no_registrasi  		= $this->input->post('no_registrasi');
		$nisnlokal  			= $this->input->post('nisnlokal');
		$no_stambuk  			= $this->input->post('no_stambuk');
		$rayon  				= $this->input->post('rayon');
		$kamar  				= $this->input->post('kamar');
		$bagian  				= $this->input->post('bagian');
		$kel_sekarang  			= $this->input->post('kel_sekarang');
		// $no_registrasi_baru 	= SUBSTR($no_registrasi,1);
		// var_dump($no_registrasi);
		

			$data_santri = array(
				'no_registrasi' 		=> $no_registrasi,
				'no_stambuk' 			=> $no_stambuk,
				'nisnlokal' 			=> $nisnlokal,
				'rayon' 				=> $rayon,
				'kamar' 				=> $kamar,
				'bagian' 				=> $bagian,
				'kel_sekarang' 			=> $kel_sekarang,
				// 'user' 					=> $user
			);
			// var_dump($data_santri);
			// exit();

			$new_no_registrasi=$this->new_no_registrasi($kategori_santri);			
			//update no_registrasi ke no baru
			$data_santri['no_registrasi'] = $new_no_registrasi;

			$no_stambuk=$this->no_stambuk($kategori_santri);
			$data_santri['no_stambuk'] = $no_stambuk;

			//nisn local
			$data_statistik 				=  $this->model->get_noSTATISTIK();
				$no_statistik 				= $data_statistik->nomor_statistik;
				$regis						= substr($new_no_registrasi,1,9);
				$NISN_LOKAL					= $no_statistik.$regis;					
				$data_santri['nisnlokal'] 	= $NISN_LOKAL;	

		$this->model->addto_data_santri($no_registrasi,$data_santri);
		echo "true";
	}

	function addtoTMI()
	{
		$kategori_santri  		= $this->input->post('kategori_update');
		$no_registrasi  		= $this->input->post('no_registrasi');
		$thn_masuk				= $this->input->post('thn_masuk');
		$nisnlokal  			= $this->input->post('nisnlokal');
		$no_stambuk  			= $this->input->post('no_stambuk');
		$rayon  				= $this->input->post('rayon');
		$kamar  				= $this->input->post('kamar');
		$bagian  				= $this->input->post('bagian');
		$kel_sekarang  			= $this->input->post('kel_sekarang');
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
		$thn_fisik					= $this->input->post('thn_fisik');
		// $thn_fisik 				= io_return_date('d-m-Y',$tglf);
		$kelainan_fisik  		= $this->input->post('kelainan_fisik');
		// $no_registrasi_baru 	= SUBSTR($no_registrasi,1);
		// var_dump($no_registrasi);
		

			$data_santri = array(
				'kategori'				=> $kategori_santri,
				'no_registrasi' 		=> $no_registrasi,
				'thn_masuk' 			=> $thn_masuk,
				'no_stambuk' 			=> $no_stambuk,
				'nisnlokal' 			=> $nisnlokal,
				'rayon' 				=> $rayon,
				'kamar' 				=> $kamar,
				'bagian' 				=> $bagian,
				'kel_sekarang' 			=> $kel_sekarang,
				// 'user' 					=> $user
			);
			// var_dump($data_santri);
			// exit();

			$new_no_registrasi=$this->new_no_registrasi($kategori_santri);	
			// var_dump($new_no_registrasi);
			// exit();		
			//update no_registrasi ke no baru
			$data_santri['no_registrasi'] = $new_no_registrasi;

			$no_stambuk=$this->no_stambuk($kategori_santri);
			$data_santri['no_stambuk'] = $no_stambuk;

			//nisn local
			$data_statistik 				=  $this->model->get_noSTATISTIK();
				$no_statistik 				= $data_statistik->nomor_statistik;
				$regis						= substr($new_no_registrasi,1,9);
				$NISN_LOKAL					= $no_statistik.$regis;					
				$data_santri['nisnlokal'] 	= $NISN_LOKAL;	

		$this->model->addto_data_toTMI($no_registrasi,$data_santri);
		
		//save pembiayaan
			$data_trans_pembiayaan_siswa = array(

				'no_registrasi' 		=> $new_no_registrasi,
				'pembiaya' 				=> $pembiaya,
				'biaya_perbulan_min' 	=> str_replace(array('.',','), array('',''),$biaya_perbulan_min),
				'biaya_perbulan_max' 	=> str_replace(array('.',','), array('',''),$biaya_perbulan_max),
				'penghasilan' 			=> str_replace(array('.',','), array('',''),$penghasilan)
				// 'user' 					=> $user
			);
			// var_dump($data_trans_pembiayaan_siswa);
			// exit();
			$this->model->simpan_pembiayaan_siswa($data_trans_pembiayaan_siswa);

		//save fisik
			$data_ms_fisik_santri = array(

				'no_registrasi' 		=> $new_no_registrasi,
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
			// var_dump($data_ms_fisik_santri);
			// exit();
			$this->model->simpan_ms_fisik_santri($data_ms_fisik_santri);

		//save kecakapan khusus
			$bid_studi  			= $this->input->post('bid_studi');
			$olahraga  				= $this->input->post('olahraga');
			$kesenian  				= $this->input->post('kesenian');
			$keterampilan  			= $this->input->post('keterampilan');
			$lain_lain  			= $this->input->post('lain_lain');

			$detail_kckhusus = array(

				'no_registrasi' 	=> $new_no_registrasi,
				'bid_studi'			=> $bid_studi,
				'olahraga'			=> $olahraga,
				'kesenian'			=> $kesenian,
				'keterampilan'		=> $keterampilan,
				'lain_lain'			=> $lain_lain

			);

			// var_dump($detail_kckhusus);
			// exit();
			$this->model->simpan_item_kckhusus($detail_kckhusus);
		echo "true";
	}

	function DelSantri($no_registrasi)
	{
		$this->model->delete_all_data_santri($no_registrasi);
	}

}