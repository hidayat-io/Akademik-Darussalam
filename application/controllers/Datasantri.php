<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class Datasantri extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 3;
			parent::__construct($this->modul);
		 	$this->load->model('mdatasantri','model');
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

				$vdata['kode_kamar'][$b->kode_kamar."#".$b->nama."#".$b->kode_gedung."#".$b->nama_gedung]
					=$b->kode_kamar." | ".$b->nama." | ".$b->kode_gedung." | ".$b->nama_gedung;
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
			//get pengeluaran global
			$pengeluaran_global= $this->model->get_pengeluaran_global();
		//cek hakAkses
		$user_id			= $this->session->userdata('logged_in')['uid'];
		$modul_id			= '15';
		// $modul_id			= $this->modul;
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
		$vdata['pengeluaran_global']	= $pengeluaran_global['limit'];
		$vdata['kategori_santri']		= 'TMI';
		$vdata['page']					= 'SANTRI';
		$vdata['title'] = 'DATA SANTRI TMI';
	    $data['content'] = $this->load->view('vdatasantri',$vdata,TRUE);
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

				$vdata['kode_kamar'][$b->kode_kamar."#".$b->nama."#".$b->kode_gedung."#".$b->nama_gedung]
					=$b->kode_kamar." | ".$b->nama." | ".$b->kode_gedung." | ".$b->nama_gedung;
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
						//get pengeluaran global
			//get pengeluaran global
			$pengeluaran_global= $this->model->get_pengeluaran_global();
		//cek hakAkses
		$user_id			= $this->session->userdata('logged_in')['uid'];
		$modul_id			= '14';
		// $modul_id			= $this->modul;
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
		$vdata['pengeluaran_global']	= $pengeluaran_global['limit'];
		$vdata['kategori_santri']		= 'AITAM';
		$vdata['page']					= 'SANTRI';
		$vdata['title'] 				= 'DATA AITAM';
	    $data['content'] 				= $this->load->view('vdatasantri',$vdata,TRUE);
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
		
		//cek hakAkses
		$user_id			= $this->session->userdata('logged_in')['uid'];
			// $modul_id			= $this->modul;
		if($kategori_santri=='TMI'){
			$modul_id			= '15';
		}else {
			$modul_id			= '14';
		}
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
		if ($page == 'DAFTAR')
		{
			$act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-file-o"></i>
					<a class="btn blue btn-xs '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-edit"></i>
					<a class="btn red btn-xs '.$class_delete.'" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-trash"></i>';
		}
		else {
		
			if ($kategori_santri == 'TMI')
			{
				if($data[$i]->isnonaktif == 1){//cek apakah sudah nonaktif
					$act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-file-o"></i>';
				}
				else {
					$act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-file-o"></i>
					<a class="btn blue btn-xs '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-edit"></i>
					<a class="btn red btn-xs '.$class_delete.'" title="NONAKTIF" onclick="keluarkan(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa  fa-arrow-right"></i>';
				}		
				
				    // $act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
					// 	<i class="fa fa-file-o"></i>
					// <a class="btn blue btn-xs" title="UBAH DATA" onclick="edit(\''.$data[$i]->no_registrasi.'\')">
					// 	<i class="fa fa-edit"></i>
					// <a class="btn red btn-xs" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->no_registrasi.'\')">
					// 	<i class="fa fa-trash"></i>';
					
			}
			else
			{
				if($data[$i]->isnonaktif == 1){//cek apakah sudah nonaktif
					$act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-file-o"></i>';
				}
				else {
					$act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-file-o"></i>
					<a class="btn blue btn-xs '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-edit"></i>
					<a class="btn red btn-xs '.$class_delete.'" title="NONAKTIF" onclick="keluarkan(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-arrow-right"></i>
					<a class="btn yellow btn-xs '.$class_edit.'" title="Jadikan TMI" onclick="ToTMI(\''.$data[$i]->no_registrasi.'\')">
						<i class="fa fa-exchange"></i>';
				}

				// $act = '<a class="btn green btn-xs" title="LIHAT DATA" onclick="view(\''.$data[$i]->no_registrasi.'\')">
				// 		<i class="fa fa-file-o"></i>
				// 	<a class="btn blue btn-xs" title="UBAH DATA" onclick="edit(\''.$data[$i]->no_registrasi.'\')">
				// 		<i class="fa fa-edit"></i>
				// 	<a class="btn red btn-xs" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->no_registrasi.'\')">
				// 		<i class="fa fa-trash"></i>
				// 	<a class="btn yellow btn-xs" title="Jadikan TMI" onclick="ToTMI(\''.$data[$i]->no_registrasi.'\')">
				// 		<i class="fa fa-exchange"></i>';
			}
		}
					
			$records["data"][] = array(

		     	$data[$i]->no_registrasi,
  				io_date_format($data[$i]->thn_daftar,$fdate),
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
		// $kategori_santri = base64_decode($this->uri->segment(4));
		// $page = base64_decode($this->uri->segment(5));
		if($str == 'TMI' || $str =='AITAM'){
			$str = '';
			$kategori_santri = base64_decode($this->uri->segment(3));
			$page = base64_decode($this->uri->segment(4));

		}else {
			$str = base64_decode($this->uri->segment(3));
			$kategori_santri = base64_decode($this->uri->segment(4));
			$page = base64_decode($this->uri->segment(5));

			// merubah hasil decode dari string ke json //
			$str = json_decode($str);
		
			// memasukan data json kedalam builparam //
			// agar json menjadi parameter query //
			$str = $this->build_param($str);
		}
		// var_dump($str,$kategori_santri,$page);
		// exit();


		$data= $this->model->get_eksport_list_data($str,$kategori_santri,$page);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('List Santri TMI');
		$this->excel->getActiveSheet()->setCellValue('A1', "LIST SANTRI TMI ");
		$this->excel->getActiveSheet()->mergeCells('A1:CA1');
		$this->excel->getActiveSheet()->getStyle('A1:CA1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header 1
		$this->excel->getActiveSheet()->setCellValue('A2', "Identitas Lembaga.");
		$this->excel->getActiveSheet()->mergeCells('A2:B2');
		$this->excel->getActiveSheet()->getStyle('A2:B2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('C2', "Informasi Pribadi Santri");
		$this->excel->getActiveSheet()->mergeCells('C2:N2');
		$this->excel->getActiveSheet()->getStyle('C2:N2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('O2', "Tambahan Data Pribadi Santri");
		$this->excel->getActiveSheet()->mergeCells('O2:Q2');
		$this->excel->getActiveSheet()->getStyle('O2:Q2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('R2', "Data Registrasi Santri");
		$this->excel->getActiveSheet()->mergeCells('R2:U2');
		$this->excel->getActiveSheet()->getStyle('R2:U2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('V2', "Data Aktifitas Belajar Santri");
		$this->excel->getActiveSheet()->mergeCells('V2:X2');
		$this->excel->getActiveSheet()->getStyle('V2:X2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('Z2', "Informasi Kategori Kebutuhan Khusus yang diperlukan Santri");
		$this->excel->getActiveSheet()->mergeCells('Z2:AH2');
		$this->excel->getActiveSheet()->getStyle('Z2:AH2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AI2', "Data Sekolah/Lembaga Pendidikan Jenjang Sebelumnya");
		$this->excel->getActiveSheet()->mergeCells('AI2:AO2');
		$this->excel->getActiveSheet()->getStyle('AI2:AO2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AP2', "Informasi Alamat Tempat Tinggal/Domisili Santri");
		$this->excel->getActiveSheet()->mergeCells('AP2:AT2');
		$this->excel->getActiveSheet()->getStyle('AP2:AT2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AU2', "Kartu Keluarga (KK)");
		$this->excel->getActiveSheet()->mergeCells('AU2:AV2');
		$this->excel->getActiveSheet()->getStyle('AU2:AV2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AW2', "Nomor KKS/KPS");
		$this->excel->getActiveSheet()->mergeCells('AW2:AW4');
		$this->excel->getActiveSheet()->getStyle('AW2:AW4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AW2:AW4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AX2', "Nomor Kartu PKH");
		$this->excel->getActiveSheet()->mergeCells('AX2:AX4');
		$this->excel->getActiveSheet()->getStyle('AX2:AX4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AX2:AX4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AY2', "Informasi Program Indonesia Pintar (PIP)");
		$this->excel->getActiveSheet()->mergeCells('AY2:BB2');
		$this->excel->getActiveSheet()->getStyle('AY2:BB2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BC2', "Prestasi Tertinggi Yang Pernah Diraih Santri");
		$this->excel->getActiveSheet()->mergeCells('BC2:BF2');
		$this->excel->getActiveSheet()->getStyle('BC2:BF2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BG2', "Beasiswa Yang Diterima (Selain PIP)");
		$this->excel->getActiveSheet()->mergeCells('BG2:BK2');
		$this->excel->getActiveSheet()->getStyle('BG2:BK2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BL2', "Identitas Orangtua/Wali Santri");
		$this->excel->getActiveSheet()->mergeCells('BL2:CA2');
		$this->excel->getActiveSheet()->getStyle('BL2:CA2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('A3', "Nomor Statistik");
		$this->excel->getActiveSheet()->mergeCells('A3:A4');
		$this->excel->getActiveSheet()->getStyle('A3:A4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A3:A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('B3', "NPSN");
		$this->excel->getActiveSheet()->mergeCells('B3:B4');
		$this->excel->getActiveSheet()->getStyle('A3:B4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('A3:B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('C3', "NIS Lokal");
		$this->excel->getActiveSheet()->mergeCells('C3:C4');
		$this->excel->getActiveSheet()->getStyle('C3:C4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('C3:C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('D3', "NIS Nasional (NISN)");
		$this->excel->getActiveSheet()->mergeCells('D3:D4');
		$this->excel->getActiveSheet()->getStyle('D3:D4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('D3:D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('E3', "NIK/No. Passport");
		$this->excel->getActiveSheet()->mergeCells('E3:E4');
		$this->excel->getActiveSheet()->getStyle('E3:E4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('E3:E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('F3', "Nama Lengkap Santri");
		$this->excel->getActiveSheet()->mergeCells('F3:F4');
		$this->excel->getActiveSheet()->getStyle('F3:F4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('F3:F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('G3', "Tempat Lahir");
		$this->excel->getActiveSheet()->mergeCells('G3:G4');
		$this->excel->getActiveSheet()->getStyle('G3:G4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('G3:G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('H3', "Tanggal Lahir");
		$this->excel->getActiveSheet()->mergeCells('H3:J3');
		$this->excel->getActiveSheet()->getStyle('H3:J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('H4', "Tgl");
		$this->excel->getActiveSheet()->getStyle('H4:H4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('I4', "Bln");
		$this->excel->getActiveSheet()->getStyle('I4:I4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('J4', "Thn");
		$this->excel->getActiveSheet()->getStyle('J4:J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('K3', "Jenis Kelamin");
		$this->excel->getActiveSheet()->mergeCells('K3:K4');
		$this->excel->getActiveSheet()->getStyle('K3:K4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('K3:K4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('K3:K4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('L3', "Agama");
		$this->excel->getActiveSheet()->mergeCells('L3:L4');
		$this->excel->getActiveSheet()->getStyle('L3:L4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('L3:L4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('M3', "No. Telepon");
		$this->excel->getActiveSheet()->mergeCells('M3:M4');
		$this->excel->getActiveSheet()->getStyle('M3:M4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('M3:M4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('N3', "No. HP");
		$this->excel->getActiveSheet()->mergeCells('N3:N4');
		$this->excel->getActiveSheet()->getStyle('N3:N4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('N3:N4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('O3', "Hobi");
		$this->excel->getActiveSheet()->mergeCells('O3:O4');
		$this->excel->getActiveSheet()->getStyle('O3:O4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('O3:O4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('P3', "Cita-Cita");
		$this->excel->getActiveSheet()->mergeCells('P3:P4');
		$this->excel->getActiveSheet()->getStyle('P3:P4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('P3:P4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('P3:P4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('Q3', "Jumlah Saudara");
		$this->excel->getActiveSheet()->mergeCells('Q3:Q4');
		$this->excel->getActiveSheet()->getStyle('Q3:Q4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Q3:Q4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Q3:Q4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('R3', "Tanggal Masuk");
		$this->excel->getActiveSheet()->mergeCells('R3:T3');
		$this->excel->getActiveSheet()->getStyle('R3:T3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('R4', "Tgl");
		$this->excel->getActiveSheet()->getStyle('R4:R4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('S4', "Bln");
		$this->excel->getActiveSheet()->getStyle('S4:S4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('T4', "Thn");
		$this->excel->getActiveSheet()->getStyle('T4:T4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('U3', "Status Asal Santri");
		$this->excel->getActiveSheet()->mergeCells('U3:U4');
		$this->excel->getActiveSheet()->getStyle('U3:U4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('U3:U4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('U3:U4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('V3', "Tingkat/ Kelas");
		$this->excel->getActiveSheet()->mergeCells('V3:V4');
		$this->excel->getActiveSheet()->getStyle('V3:V4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('V3:V4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('V3:V4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('W3', "Jurusan/ Peminatan");
		$this->excel->getActiveSheet()->mergeCells('W3:W4');
		$this->excel->getActiveSheet()->getStyle('W3:W4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('W3:W4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('W3:W4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('X3', "Kode Rombel");
		$this->excel->getActiveSheet()->mergeCells('X3:X4');
		$this->excel->getActiveSheet()->getStyle('X3:X4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('X3:X4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('X3:X4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('Y3', "Nomor Absen");
		$this->excel->getActiveSheet()->mergeCells('Y3:Y4');
		$this->excel->getActiveSheet()->getStyle('Y3:Y4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Y3:Y4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Y3:Y4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('Z3', "Tuna Rungu");
		$this->excel->getActiveSheet()->mergeCells('Z3:Z4');
		$this->excel->getActiveSheet()->getStyle('Z3:Z4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Z3:Z4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Z3:Z4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AA3', "Tuna Netra");
		$this->excel->getActiveSheet()->mergeCells('AA3:AA4');
		$this->excel->getActiveSheet()->getStyle('AA3:AA4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AA3:AA4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AA3:AA4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AB3', "Tuna Daksa");
		$this->excel->getActiveSheet()->mergeCells('AB3:AB4');
		$this->excel->getActiveSheet()->getStyle('AB3:AB4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AB3:AB4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AB3:AB4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AC3', "Tuna Grahita");
		$this->excel->getActiveSheet()->mergeCells('AC3:AC4');
		$this->excel->getActiveSheet()->getStyle('AC3:AC4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AC3:AC4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AC3:AC4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AD3', "Tuna Laras");
		$this->excel->getActiveSheet()->mergeCells('AD3:AD4');
		$this->excel->getActiveSheet()->getStyle('AD3:AD4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AD3:AD4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AD3:AD4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AE3', "Lamban Belajar");
		$this->excel->getActiveSheet()->mergeCells('AE3:AE4');
		$this->excel->getActiveSheet()->getStyle('AE3:AE4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AE3:AE4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AE3:AE4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AF3', "Sulit Belajar");
		$this->excel->getActiveSheet()->mergeCells('AF3:AF4');
		$this->excel->getActiveSheet()->getStyle('AF3:AF4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AF3:AF4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AF3:AF4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AG3', "Gangguan Komunikasi");
		$this->excel->getActiveSheet()->mergeCells('AG3:AG4');
		$this->excel->getActiveSheet()->getStyle('AG3:AG4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AG3:AG4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AG3:AG4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AH3', "Bakat Luar Biasa");
		$this->excel->getActiveSheet()->mergeCells('AH3:AH4');
		$this->excel->getActiveSheet()->getStyle('AH3:AH4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AH3:AH4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AH3:AH4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AI3', "Jenis Pendidikan");
		$this->excel->getActiveSheet()->mergeCells('AI3:AI4');
		$this->excel->getActiveSheet()->getStyle('AI3:AI4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AI3:AI4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AJ3', "NPSN Lembaga");
		$this->excel->getActiveSheet()->mergeCells('AJ3:AJ4');
		$this->excel->getActiveSheet()->getStyle('AJ3:AJ4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AJ3:AJ4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AK3', "Nama Lembaga");
		$this->excel->getActiveSheet()->mergeCells('AK3:AK4');
		$this->excel->getActiveSheet()->getStyle('AK3:AK4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AK3:AK4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AL3', "Kabupaten/Kota Lokasi Lembaga");
		$this->excel->getActiveSheet()->mergeCells('AL3:AL4');
		$this->excel->getActiveSheet()->getStyle('AL3:AL4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AL3:AL4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AL3:AL4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AM3', "Provinsi Lokasi Lembaga");
		$this->excel->getActiveSheet()->mergeCells('AM3:AM4');
		$this->excel->getActiveSheet()->getStyle('AM3:AM4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AM3:AM4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AM3:AM4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AN3', "Tahun Lulus");
		$this->excel->getActiveSheet()->mergeCells('AN3:AN4');
		$this->excel->getActiveSheet()->getStyle('AN3:AN4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AN3:AN4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AO3', "Status Ijazah");
		$this->excel->getActiveSheet()->mergeCells('AO3:AO4');
		$this->excel->getActiveSheet()->getStyle('AO3:AO4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AO3:AO4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AO3:AO4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AP3', "Jenis Tempat Tinggal");
		$this->excel->getActiveSheet()->mergeCells('AP3:AP4');
		$this->excel->getActiveSheet()->getStyle('AP3:AP4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AP3:AP4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AP3:AP4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AQ3', "Alamat");
		$this->excel->getActiveSheet()->mergeCells('AQ3:AQ4');
		$this->excel->getActiveSheet()->getStyle('AQ3:AQ4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AQ3:AQ4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AR3', "Kecamatan");
		$this->excel->getActiveSheet()->mergeCells('AR3:AR4');
		$this->excel->getActiveSheet()->getStyle('AR3:AR4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AR3:AR4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AS3', "Kab./Kota");
		$this->excel->getActiveSheet()->mergeCells('AS3:AS4');
		$this->excel->getActiveSheet()->getStyle('AS3:AS4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AS3:AS4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AT3', "Provinsi");
		$this->excel->getActiveSheet()->mergeCells('AT3:AT4');
		$this->excel->getActiveSheet()->getStyle('AT3:AT4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AT3:AT4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('AU3', "Nomor Kartu Keluarga (KK)");
		$this->excel->getActiveSheet()->mergeCells('AU3:AU4');
		$this->excel->getActiveSheet()->getStyle('AU3:AU4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AU3:AU4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AU3:AU4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AV3', "Status Kepala Keluarga dalam KK");
		$this->excel->getActiveSheet()->mergeCells('AV3:AV4');
		$this->excel->getActiveSheet()->getStyle('AV3:AV4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AV3:AV4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AV3:AV4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AY3', "Nomor Kartu Indonesia Pintar (KIP)");
		$this->excel->getActiveSheet()->mergeCells('AY3:AY4');
		$this->excel->getActiveSheet()->getStyle('AY3:AY4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AY3:AY4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AY3:AY4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('AZ3', "Status Penerima PIP");
		$this->excel->getActiveSheet()->mergeCells('AZ3:AZ4');
		$this->excel->getActiveSheet()->getStyle('AZ3:AZ4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AZ3:AZ4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('AZ3:AZ4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BA3', "Alasan Menerima PIP");
		$this->excel->getActiveSheet()->mergeCells('BA3:BA4');
		$this->excel->getActiveSheet()->getStyle('BA3:BA4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BA3:BA4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BA3:BA4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BB3', "Periode Menerima PIP");
		$this->excel->getActiveSheet()->mergeCells('BB3:BB4');
		$this->excel->getActiveSheet()->getStyle('BB3:BB4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BB3:BB4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BB3:BB4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BC3', "Bidang Prestasi");
		$this->excel->getActiveSheet()->mergeCells('BC3:BC4');
		$this->excel->getActiveSheet()->getStyle('BC3:BC4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BC3:BC4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BD3', "Tingkat Prestasi");
		$this->excel->getActiveSheet()->mergeCells('BD3:BD4');
		$this->excel->getActiveSheet()->getStyle('BD3:BD4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BD3:BD4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BD3:BD4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BE3', "Peringkat Yang Diraih");
		$this->excel->getActiveSheet()->mergeCells('BE3:BE4');
		$this->excel->getActiveSheet()->getStyle('BE3:BE4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BE3:BE4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BE3:BE4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BF3', "Tahun Meraih Prestasi");
		$this->excel->getActiveSheet()->mergeCells('BF3:BF4');
		$this->excel->getActiveSheet()->getStyle('BF3:BF4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BF3:BF4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BF3:BF4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BG3', "Status Beasiswa");
		$this->excel->getActiveSheet()->mergeCells('BG3:BG4');
		$this->excel->getActiveSheet()->getStyle('BG3:BG4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BG3:BG4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BH3', "Sumber Beasiswa");
		$this->excel->getActiveSheet()->mergeCells('BH3:BH4');
		$this->excel->getActiveSheet()->getStyle('BH3:BH4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BH3:BH4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BI3', "Jenis Beasiswa");
		$this->excel->getActiveSheet()->mergeCells('BI3:BI4');
		$this->excel->getActiveSheet()->getStyle('BI3:BI4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BI3:BI4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BJ3', "Jangka Waktu (Bulan)");
		$this->excel->getActiveSheet()->mergeCells('BJ3:BJ4');
		$this->excel->getActiveSheet()->getStyle('BJ3:BJ4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BJ3:BJ4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BJ3:BJ4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BK3', "Besar Uang Diterima (Rp)");
		$this->excel->getActiveSheet()->mergeCells('BK3:BK4');
		$this->excel->getActiveSheet()->getStyle('BK3:BK4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BK3:BK4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BK3:BK4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BL3', "Ayah Kandung");
		$this->excel->getActiveSheet()->mergeCells('BL3:BP3');
		$this->excel->getActiveSheet()->getStyle('BL3:BP3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BL3:BP3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BL4', "Nama Lengkap");
		$this->excel->getActiveSheet()->mergeCells('BL4:BL4');
		$this->excel->getActiveSheet()->getStyle('BL4:BL4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BL4:BL4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BM4', "Status Hidup");
		$this->excel->getActiveSheet()->mergeCells('BM4:BM4');
		$this->excel->getActiveSheet()->getStyle('BM4:BM4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BM4:BM4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BN4', "NIK/Nomor KTP");
		$this->excel->getActiveSheet()->mergeCells('BN4:BN4');
		$this->excel->getActiveSheet()->getStyle('BN4:BN4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BN4:BN4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BN4:BN4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BO4', "Pendidikan");
		$this->excel->getActiveSheet()->mergeCells('BO4:BO4');
		$this->excel->getActiveSheet()->getStyle('BO4:BO4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BO4:BO4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BP4', "Pekerjaan");
		$this->excel->getActiveSheet()->mergeCells('BP4:BP4');
		$this->excel->getActiveSheet()->getStyle('BP4:BP4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BP4:BP4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BQ3', "Ibu Kandung");
		$this->excel->getActiveSheet()->mergeCells('BQ3:BU3');
		$this->excel->getActiveSheet()->getStyle('BQ3:BU3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BQ3:BU3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BQ4', "Nama Lengkap");
		$this->excel->getActiveSheet()->mergeCells('BQ4:BQ4');
		$this->excel->getActiveSheet()->getStyle('BQ4:BQ4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BQ4:BQ4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BR4', "Status Hidup");
		$this->excel->getActiveSheet()->mergeCells('BR4:BR4');
		$this->excel->getActiveSheet()->getStyle('BR4:BR4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BR4:BR4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BS4', "NIK/Nomor KTP");
		$this->excel->getActiveSheet()->mergeCells('BS4:BS4');
		$this->excel->getActiveSheet()->getStyle('BS4:BS4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BS4:BS4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BS4:BS4')->getAlignment()->setWrapText(true);
		$this->excel->getActiveSheet()->setCellValue('BT4', "Pendidikan");
		$this->excel->getActiveSheet()->mergeCells('BT4:BT4');
		$this->excel->getActiveSheet()->getStyle('BT4:BT4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BT4:BT4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BU4', "Pekerjaan");
		$this->excel->getActiveSheet()->mergeCells('BU4:BU4');
		$this->excel->getActiveSheet()->getStyle('BU4:BU4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BU4:BU4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BV4', "Nama Lengkap");
		$this->excel->getActiveSheet()->mergeCells('BV4:BV4');
		$this->excel->getActiveSheet()->getStyle('BV4:BV4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BV4:BV4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BW4', "Hubungan");
		$this->excel->getActiveSheet()->mergeCells('BW4:BW4');
		$this->excel->getActiveSheet()->getStyle('BW4:BW4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BW4:BW4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BX4', "NIK/Nomor KTP");
		$this->excel->getActiveSheet()->mergeCells('BX4:BX4');
		$this->excel->getActiveSheet()->getStyle('BX4:BX4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BX4:BX4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BY4', "Pendidikan");
		$this->excel->getActiveSheet()->mergeCells('BY4:BY4');
		$this->excel->getActiveSheet()->getStyle('BY4:BY4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BY4:BY4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('BZ4', "Pekerjaan");
		$this->excel->getActiveSheet()->mergeCells('BZ4:BZ4');
		$this->excel->getActiveSheet()->getStyle('BZ4:BZ4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('BZ4:BZ4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('CA3', "Rata-Rata Penghasilan Orangtua/Wali per Bulan");
		$this->excel->getActiveSheet()->mergeCells('CA3:CA4');
		$this->excel->getActiveSheet()->getStyle('CA3:CA4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('CA3:CA4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::VERTICAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('CA3:CA4')->getAlignment()->setWrapText(true);

		// header 2

		$fdate 	= "d-m-Y";
		$i  	= 5;
		$tdk_ada = '-';
		if($data != null){

			foreach($data as $row){
				//set agama untuk kemenag
				$agama = explode('-',$row->agama);
				$agama = $agama['0'];
				// get info ayah kandung
				$no_registrasi_santri 	= $row->no_registrasi;
				$ayah_kandung			= $this->model->get_eksport_list_data_keluarga($no_registrasi_santri,'ayah');
					if ($ayah_kandung!=null)
					{
						$ayah_nama = $ayah_kandung->nama;
						if($ayah_kandung->status !='WAFAT'){
							$ayah_status_hidup = '1';
						}
						else{
							$ayah_status_hidup = '0';
						}
						
						$ayah_nik = $ayah_kandung->nik;
						$ayah_pend_terakhir = $ayah_kandung->pend_terakhir;
						$ayah_pekerjaan = $ayah_kandung->pekerjaan;
					}else{
						$ayah_nama = $tdk_ada;
						$ayah_status_hidup = $tdk_ada;					
						$ayah_nik = $tdk_ada;
						$ayah_pend_terakhir = $tdk_ada;
						$ayah_pekerjaan = $tdk_ada;
					}
				$ibu_kandung			= $this->model->get_eksport_list_data_keluarga($no_registrasi_santri,'ibu');
					if ($ibu_kandung!=null)
					{
						$ibu_nama = $ibu_kandung->nama;
						if($ibu_kandung->status !='WAFAT'){
							$ibu_status_hidup = '1';
						}
						else{
							$ibu_status_hidup = '0';
						}
						
						$ibu_nik = $ibu_kandung->nik;
						$ibu_pend_terakhir = $ibu_kandung->pend_terakhir;
						$ibu_pekerjaan = $ibu_kandung->pekerjaan;
					}else{
						$ibu_nama = $tdk_ada;
						$ibu_status_hidup = $tdk_ada;					
						$ibu_nik = $tdk_ada;
						$ibu_pend_terakhir = $tdk_ada;
						$ibu_pekerjaan = $tdk_ada;
					}
				$wali			= $this->model->get_eksport_list_data_keluarga($no_registrasi_santri,'wali');
					if ($wali!=null)
					{
						$wali_nama = $wali->nama;						
						$wali_hubungan = $wali->hub_kel;
						$wali_nik = $wali->nik;
						$wali_pendidikan = $wali->pend_terakhir;
						$wali_pekerjaan = $wali->pekerjaan;
					}else{
						$wali_nama = $tdk_ada;					
						$wali_hubungan = $tdk_ada;
						$wali_nik = $tdk_ada;
						$wali_pendidikan = $tdk_ada;
						$wali_pekerjaan = $tdk_ada;
					}

				// $this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				// $this->excel->getActiveSheet()->setCellValue('B'.$i, $row->no_registrasi);
				// $this->excel->getActiveSheet()->setCellValue('C'.$i, io_date_format($row->thn_masuk,$fdate));
				// $this->excel->getActiveSheet()->setCellValue('D'.$i, $row->nama_lengkap);
				// $this->excel->getActiveSheet()->setCellValue('E'.$i, $row->nama_arab);
				// $this->excel->getActiveSheet()->setCellValue('F'.$i, $row->tempat_lahir);
				// $this->excel->getActiveSheet()->setCellValue('G'.$i, io_date_format($row->tgl_lahir,$fdate));
				$this->excel->getActiveSheet()->setCellValue('A'.$i, $row->nomor_statistik);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->NPSN);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nisnlokal);
				$this->excel->getActiveSheet()->setCellValue('D'.$i, $row->nisn);
				$this->excel->getActiveSheet()->setCellValue('E'.$i, $row->nik);
				$this->excel->getActiveSheet()->setCellValue('F'.$i, $row->nama_lengkap);
				$this->excel->getActiveSheet()->setCellValue('G'.$i, $row->tempat_lahir);
				$this->excel->getActiveSheet()->setCellValue('H'.$i, $row->tgllahir_day);
				$this->excel->getActiveSheet()->setCellValue('I'.$i, $row->tgllahir_month);
				$this->excel->getActiveSheet()->setCellValue('J'.$i, $row->tgllahir_year);
				$this->excel->getActiveSheet()->setCellValue('K'.$i, $row->jenis_kelamin);
				$this->excel->getActiveSheet()->setCellValue('L'.$i, $agama);
				$this->excel->getActiveSheet()->setCellValue('M'.$i, $row->no_tlp);
				$this->excel->getActiveSheet()->setCellValue('N'.$i, $row->no_hp);
				$this->excel->getActiveSheet()->setCellValue('O'.$i, $row->hobi);
				$this->excel->getActiveSheet()->setCellValue('P'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('Q'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('R'.$i, $row->thnmasuk_day);
				$this->excel->getActiveSheet()->setCellValue('S'.$i, $row->thnmasuk_month);
				$this->excel->getActiveSheet()->setCellValue('T'.$i, $row->thnmasuk_year);
				$this->excel->getActiveSheet()->setCellValue('U'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('V'.$i, $row->tingkat);
				$this->excel->getActiveSheet()->setCellValue('W'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('X'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('Y'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('Z'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AA'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AB'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AC'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AD'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AE'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AF'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AG'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AH'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AI'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AJ'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AK'.$i, $row->nama_sekolah);
				$this->excel->getActiveSheet()->setCellValue('AL'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AM'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AN'.$i, $row->thn_lulus);
				$this->excel->getActiveSheet()->setCellValue('AO'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AP'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AQ'.$i, $row->jalan);
				$this->excel->getActiveSheet()->setCellValue('AR'.$i, $row->kecamatan);
				$this->excel->getActiveSheet()->setCellValue('AS'.$i, $row->kabupaten);
				$this->excel->getActiveSheet()->setCellValue('AT'.$i, $row->provinsi);
				$this->excel->getActiveSheet()->setCellValue('AU'.$i, $row->no_kk);
				$this->excel->getActiveSheet()->setCellValue('AV'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AW'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AX'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AY'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('AZ'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('BA'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('BB'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('BC'.$i, $row->bidang_prestasi);
				$this->excel->getActiveSheet()->setCellValue('BD'.$i, $row->tingkat_prestasi);
				$this->excel->getActiveSheet()->setCellValue('BE'.$i, $row->peringkat_yg_diraih);
				$this->excel->getActiveSheet()->setCellValue('BF'.$i, $row->thn_meraih);
				$this->excel->getActiveSheet()->setCellValue('BG'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('BH'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('BI'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('BJ'.$i, $tdk_ada);
				$this->excel->getActiveSheet()->setCellValue('BK'.$i, $tdk_ada);				
				$this->excel->getActiveSheet()->setCellValue('BL'.$i, $ayah_nama);
				$this->excel->getActiveSheet()->setCellValue('BM'.$i, $ayah_status_hidup);
				$this->excel->getActiveSheet()->setCellValue('BN'.$i, $ayah_nik);
				$this->excel->getActiveSheet()->setCellValue('BO'.$i, $ayah_pend_terakhir);
				$this->excel->getActiveSheet()->setCellValue('BP'.$i, $ayah_pekerjaan);
				$this->excel->getActiveSheet()->setCellValue('BQ'.$i, $ibu_nama);
				$this->excel->getActiveSheet()->setCellValue('BR'.$i, $ibu_status_hidup);
				$this->excel->getActiveSheet()->setCellValue('BS'.$i, $ibu_nik);
				$this->excel->getActiveSheet()->setCellValue('BT'.$i, $ibu_pend_terakhir);
				$this->excel->getActiveSheet()->setCellValue('BU'.$i, $ibu_pekerjaan);
				$this->excel->getActiveSheet()->setCellValue('BV'.$i, $wali_nama);
				$this->excel->getActiveSheet()->setCellValue('BW'.$i, $wali_hubungan);
				$this->excel->getActiveSheet()->setCellValue('BX'.$i, $wali_nik);
				$this->excel->getActiveSheet()->setCellValue('BY'.$i, $wali_pendidikan);
				$this->excel->getActiveSheet()->setCellValue('BZ'.$i, $wali_pekerjaan);
				$this->excel->getActiveSheet()->setCellValue('CA'.$i, $tdk_ada);
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'CA'; $col++) {

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
		$cell_to = "CA".$i;
		$this->excel->getActiveSheet()->getStyle('A2:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A2:CA4')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A2:CA4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A2:CA4')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='LIST-SANTRI.xls'; //save our workbook as this file name
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
		$thn_daftarX				= $this->input->post('thn_daftar');
		$thn_daftar				= io_return_date('d-m-Y',$thn_daftarX);
		$thn_masukX				= $this->input->post('thn_masuk');
		$thn_masuk				= io_return_date('d-m-Y',$thn_masukX);
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
		$nama_sekolah_tmi  	= $this->input->post('nama_sekolah_tmi');
		$thn_lulus_tmi  			= $this->input->post('thn_lulus_tmi');
		$alamat_sekolah_tmi  	= $this->input->post('alamat_sekolah_tmi');
		$suku  					= $this->input->post('suku');
		$kewarganegaraan  		= $this->input->post('kewarganegaraan');
		$jeniskelamin_santri  	= $this->input->post('jeniskelamin_santri');
		$agama_santri  			= $this->input->post('agama_santri');
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
		$item_sekolahAitam  		= $this->input->post('hid_table_item_sekolahAitam');
		$item_keluarga 			= $this->input->post('hid_table_item_Keluarga');
		$item_penyakit 			= $this->input->post('hid_table_item_penyakit');
		$item_kckhusus 			= $this->input->post('hid_table_item_KecakapanKhusus');
		$item_donatur 			= $this->input->post('hid_table_item_donatur');
		$TfileUpload 		= $this->input->post('TfileUpload');
		$TfileUpload_ijazah 		= $this->input->post('TfileUpload_ijazah');
		$TfileUpload_akelahiran 		= $this->input->post('TfileUpload_akelahiran');
		$TfileUpload_kk 		= $this->input->post('TfileUpload_kk');
		$TfileUpload_skhun 		= $this->input->post('TfileUpload_skhun');
		$TfileUpload_nisn 		= $this->input->post('TfileUpload_nisn');
		$TfileUpload_transkip 		= $this->input->post('TfileUpload_transkip');
		$TfileUpload_skbb 		= $this->input->post('TfileUpload_skbb');
		$TfileUpload_skes 		= $this->input->post('TfileUpload_skes');
		$user 					= $this->session->userdata('logged_in')['uid'];

	
		$data_santri = array(
			'kategori' 				=> $kategori_santri,
			'no_registrasi' 		=> $no_registrasi,
			'no_stambuk' 			=> $no_stambuk,
			'thn_daftar' 			=> $thn_daftar,
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
			'nama_sekolah' 			=> $nama_sekolah_tmi,
			'thn_lulus' 		=> $thn_lulus_tmi,
			'alamat_sekolah' 		=> $alamat_sekolah_tmi,
			'suku' 					=> $suku,
			'kewarganegaraan' 		=> $kewarganegaraan,
			'jenis_kelamin' 		=> $jeniskelamin_santri,
			'agama' 				=> $agama_santri,
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
		// exit();


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
		//save sekolahAitam
			
			$item_sekolahAitam  = explode(';',$item_sekolahAitam );
			foreach ($item_sekolahAitam   as $i) 
				{
					$idetail = explode('#',$i);
					if(count($idetail)>1)
					{

							$detail_sekolahAitam = array(

								'no_registrasi' 			=> $no_registrasi,
								'nama_sekolah'				=> $idetail[0],
								'alamat_sekolah'			=> $idetail[1],
								'kelas'						=> $idetail[2],
								'tanggal'					=> $idetail[3],
								'lampiran'					=> $idetail[4]

							);

							//pindahkan filenya
							if(file_exists ('./assets/images/uploadtemp/'.$detail_sekolahAitam['lampiran'])){
							rename('./assets/images/uploadtemp/'.$detail_sekolahAitam['lampiran'],'./assets/images/fileupload/lamp_sekolah/'.$detail_sekolahAitam['lampiran']);	
							}
							
							$this->model->simpan_item_sekolahAitam($detail_sekolahAitam);

					}
				}

		
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
		//upload file nisn
			$string_name 				= io_random_string(20);
			$temp						= explode(".",$_FILES['fileUpload_nisn']['name']);
			$filename 					= $string_name.'.'.end($temp);
			$config['upload_path']   	= './assets/images/fileupload/nisn/';
			$config['allowed_types'] 	= '*';
			$config['file_name'] 		= $filename;
			$config['overwrite'] 		= true;
			$this->load->library('upload');
			$this->upload->initialize($config);
			if($this->upload->do_upload('fileUpload_nisn')){

				$this->model->update_photo_nisn($no_registrasi,$filename);
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

		//save sekolahAitam
			
				$this->model->delete_item_sekolahAitam($no_registrasi);
				$item_sekolahAitam  = explode(';',$item_sekolahAitam );
				foreach ($item_sekolahAitam   as $i) 
					{
						$idetail = explode('#',$i);
							if(count($idetail)>1)
							{

									$detail_sekolahAitam = array(

										'no_registrasi' 		=> $no_registrasi,
										'nama_sekolah'			=> $idetail[0],
										'alamat_sekolah'		=> $idetail[1],
										'kelas'					=> $idetail[2],
										'tanggal'				=> $idetail[3],
										'lampiran'				=> $idetail[4]

									);
									//pindahkan filenya
									if(file_exists ('./assets/images/uploadtemp/'.$detail_sekolahAitam['lampiran'])){
									rename('./assets/images/uploadtemp/'.$detail_sekolahAitam['lampiran'],'./assets/images/fileupload/lamp_sekolah/'.$detail_sekolahAitam['lampiran']);	
									}
									
									$this->model->simpan_item_sekolahAitam($detail_sekolahAitam);

							}
					}

		
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

			//upload file kk
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
			//upload file nisn
				if($_FILES['fileUpload_nisn'] != '')
				
				{
					$string_name 				= io_random_string(20);
					$temp						= explode(".",$_FILES['fileUpload_nisn']['name']);
					$filename 					= $string_name.'.'.end($temp);
					$config['upload_path']   	= './assets/images/fileupload/nisn/';
					$config['allowed_types'] 	= '*';
					$config['file_name'] 		= $filename;
					$config['overwrite'] 		= true;
					$this->load->library('upload');
					$this->upload->initialize($config);
					if($this->upload->do_upload('fileUpload_nisn')){

						$this->model->update_photo_nisn($no_registrasi,$filename);
						unlink('./assets/images/fileupload/nisn/'.$TfileUpload_nisn);
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

	function upload_lamp_sekolahAitam()
	{
    	$this->load->library('upload');
    	//upload file
		$ioname		 				= io_random_string(4);
		$temp						= explode(".",$_FILES['lamp_SuratPindah']['name']);
		$filename 					= $ioname.'.'.end($temp);
		$config['upload_path']   	= './assets/images/uploadtemp/';				
		$config['file_name'] 		= $filename;				
		$config['allowed_types']    = '*';

		$this->upload->initialize($config);

		if($this->upload->do_upload('lamp_SuratPindah')){

			$response = array(

				'name' => $filename
			);

			echo json_encode($response);
		}
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
		
	function get_data_sekolahAitam($no_registrasi)
	{
		$data = $this->model->query_sekolahAitam($no_registrasi);
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
		$thn_daftar				= $this->input->post('thn_daftar');
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

	function Keluarkan_santri($no_registrasi,$keterangan)
	{
		
		$this->model->nonaktif_santri($no_registrasi,$keterangan);
	}

}