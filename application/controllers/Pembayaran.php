<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 2;
			parent::__construct($this->modul);
		 	$this->load->model('mpembayaran','model');
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

	function index()
	{
		// get tahun & senester aktif
       	$sys_param						= $this->kurikulum_aktif();
		$isys_param 					= explode('#',$sys_param);
		$id_thn_ajar					= $isys_param[0];
		$id_thn_ajar_value				= $this->model->get_kurikulum($id_thn_ajar);
			// var_dump($id_thn_ajar_value);
			// exit();
		$vdata['id_thn_ajar']			= $id_thn_ajar;
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
		$vdata['title'] 				= 'TRANSAKSI PEMBAYARAN';
	    $data['content'] 				= $this->load->view('vpembayaran',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->id_matpal)) $string_param .= " ms_bankpembayaran.id_matpal LIKE '%".$param->id_matpal."%' ";
		}

		return $string_param;
	}

	function load_grid()
	{
		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];
		// var_dump($_REQUEST['order']);
		// exit();


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
			$act = '<a href="#" class="btn btn-icon-only green" title="Lihat/Print" onclick="print(\''.$data[$i]->id_pembayaran.'\')">
						<i class="fa fa-file-o"></i>
					</a>
					<a href="#" class="btn btn-icon-only red '.$class_delete.'" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_pembayaran.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			// $act = '<a href="#" class="btn btn-icon-only green" title="Lihat/Print" onclick="print(\''.$data[$i]->id_pembayaran.'\')">
			// 			<i class="fa fa-file-o"></i>
			// 		</a>
			// 		<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_pembayaran.'\',\''.$data[$i]->no_registrasi.'\',\''.$data[$i]->tipe_pembayaran.'\',\''.$data[$i]->semester.'\')">
			// 			<i class="fa fa-edit"></i>
			// 		</a>
			// 		<a href="#" class="btn btn-icon-only red '.$class_delete.'" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_pembayaran.'\')">
			// 			<i class="fa fa-remove"></i>
			// 		</a>';
			// $act = '<a href="#" class="btn btn-icon-only green" title="Lihat/Print" onclick="print(\''.$data[$i]->id_pembayaran.'\')">
			// 			<i class="fa fa-file-o"></i>
			// 		</a>
			// 		<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_pembayaran.'\')">
			// 			<i class="fa fa-edit"></i>
			// 		</a>
			// 		<a href="#" class="btn btn-icon-only red '.$class_delete.'" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id_pembayaran.'\')">
			// 			<i class="fa fa-remove"></i>
					// </a>';
			if($data[$i]->tipe_pembayaran =='S'){
				$tipe_pembayaran = 'SEMESTER';
			}else{
				$tipe_pembayaran = 'BULANAN';
			}
			$records["data"][] = array(
		     	$data[$i]->id_pembayaran,
		     	$data[$i]->deskripsi,
		     	$data[$i]->tanggal,
		     	$data[$i]->no_registrasi,
		     	$data[$i]->nama_lengkap,
		     	$tipe_pembayaran,
		     	$data[$i]->semester,
				$data[$i]->keterangan,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function get_data_pembayaran($no_registrasi,$tipe_pembayaran,$semester_pembayaran,$id_thn_ajar)
	{
		$no_registrasi 				= urldecode($no_registrasi);
		$id_thn_ajar 				= urldecode($id_thn_ajar);
		$tipe_pembayaran 			= urldecode($tipe_pembayaran);
		$semester_pembayaran 		= urldecode($semester_pembayaran);
		$data 						= $this->model->query_get_data_pembayaran($no_registrasi,$tipe_pembayaran,$semester_pembayaran,$id_thn_ajar);
    	echo json_encode($data);
	}

	function get_sisa_potongan($no_registrasi,$id_tagihan)
	{
		$no_registrasi 				= urldecode($no_registrasi);
		$id_tagihan 				= urldecode($id_tagihan);
		$data_tagihan 						= $this->model->query_get_sisa_potongan($no_registrasi,$id_tagihan);
    	echo json_encode($data_tagihan);
	}

	function get_status_pembayaran_bulanan($no_registrasi,$id_tagihan)
	{
		$no_registrasi 				= urldecode($no_registrasi);
		$id_tagihan 				= urldecode($id_tagihan);
		$data_tagihan 				= $this->model->query_status_pembayaran_bulanan($no_registrasi,$id_tagihan);
    	echo json_encode($data_tagihan);
	}

	function simpan_pembayaran($status)
	{
		$kode_pembayaran 		= $this->input->post('kode_pembayaran');
		$no_registrasi 			= $this->input->post('no_registrasi');
		$id_thn_ajar 			= $this->input->post('id_thn_ajar');
		$tgl_bayar 				= $this->input->post('tgl_bayar');
		$tgl_bayar 				= io_return_date('d-m-Y',$tgl_bayar);
		$tipe_pembayaran  		= $this->input->post('tipe_pembayaran');
		$semester  				= $this->input->post('semester');
		$id_tagihan  			= $this->input->post('id_tagihan');
		$total_tagihan  		= $this->input->post('total_tagihan');
		$jumlah_bayar  			= $this->input->post('jumlah_bayar');
		$keterangan  			= $this->input->post('keterangan');
		$userid 				= $this->session->userdata('logged_in')['uid'];
		
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			//jika bayar semester
			if($tipe_pembayaran =='S'){

				$data_pembayaranhd = array(
					'no_registrasi' 		=> $no_registrasi,
					'id_thn_ajar'			=> $id_thn_ajar,
					'tanggal' 				=> $tgl_bayar,
					'tipe_pembayaran'		=> $tipe_pembayaran,
					'semester' 		    	=> $semester,
					'keterangan' 		    => $keterangan,
					'userid' 				=> $userid
				);

				$id = $this->model->simpan_pembayaranhd($data_pembayaranhd);

				$data_pembayarandt = array(
					'id_pembayaranhd' 		=> $id,
					'id_tagihan' 			=> $id_tagihan,
					'nominal'				=> str_replace(array('.',','), array('',''),$jumlah_bayar),
				);
				
				$this->model->simpan_pembayarandt($data_pembayarandt);

			}
			else{

				$data_pembayaranhd = array(
					'no_registrasi' 		=> $no_registrasi,
					'id_thn_ajar'			=> $id_thn_ajar,
					'tanggal' 				=> $tgl_bayar,
					'tipe_pembayaran'		=> $tipe_pembayaran,
					'semester' 		    	=> $semester,
					'keterangan' 		    => $keterangan,
					'userid' 				=> $userid
				);

				$id = $this->model->simpan_pembayaranhd($data_pembayaranhd);
				$input = $this->input->post();
				if(isset($input['byr'])){			

					foreach($input['byr'] as $id_tagihan){
						$idetail = explode('#',$id_tagihan);
					
						$data_pembayarandt = array(
							'id_pembayaranhd' 		=> $id,
							'id_tagihan' 			=> $idetail[0],
							'nominal' 				=> $idetail[1]
						);
						$this->model->simpan_pembayarandt($data_pembayarandt);
					}
				}
			}

		}
        else //update data
		{		
			//jika bayar semester
			if($tipe_pembayaran =='S'){

				$data_pembayaranhd = array(
					// 'no_registrasi' 		=> $no_registrasi,
					'tanggal' 				=> $tgl_bayar,
					'tipe_pembayaran'		=> $tipe_pembayaran,
					'semester' 		    	=> $semester,
					'keterangan' 		    => $keterangan,
					'userid' 				=> $userid
				);
				// var_dump($data_pembayaranhd);
				// exit();
				$this->model->update_pembayaranhd($data_pembayaranhd,$kode_pembayaran);

				$data_pembayarandt = array(
					// 'id_pembayaranhd' 		=> $id,
					'id_tagihan' 			=> $id_tagihan,
					'nominal'				=> str_replace(array('.',','), array('',''),$jumlah_bayar),
				);
				
				$this->model->update_pembayarandt($data_pembayarandt,$kode_pembayaran);

			}
			else{

				$data_pembayaranhd = array(
					'no_registrasi' 		=> $no_registrasi,
					'tanggal' 				=> $tgl_bayar,
					'tipe_pembayaran'		=> $tipe_pembayaran,
					'semester' 		    	=> $semester,
					'keterangan' 		    => $keterangan,
					'userid' 				=> $userid
				);

				$id = $this->model->simpan_pembayaranhd($data_pembayaranhd);
				$input = $this->input->post();
				if(isset($input['byr'])){			

					foreach($input['byr'] as $id_tagihan){
						$idetail = explode('#',$id_tagihan);
					
						$data_pembayarandt = array(
							'id_pembayaranhd' 		=> $id,
							'id_tagihan' 			=> $idetail[0],
							'nominal' 				=> $idetail[1]
						);
						$this->model->simpan_pembayarandt($data_pembayarandt);
					}
				}
			}
        }	    

			echo "true";
	}

	function Delpembayaran($id_pembayaran)
	{
		$id_pembayaran = urldecode($id_pembayaran);
		$this->model->delete_pembayaranhd($id_pembayaran);
		$this->model->delete_pembayarandt($id_pembayaran);
	}

	function PrintPembayaran($id_pembayaran)
	{
		$this->load->library("pdf");
		$data['dataheader'] = $this->model->get_print_pembayaran_header($id_pembayaran);
		$data['databody'] 	= $this->model->get_print_pembayaran($id_pembayaran);

		$this->pdf->set_paper("A4", "potrait");
		$this->pdf->filename = "Pembayaran".$id_pembayaran.".pdf";
		$this->pdf->load_view('vPrintPembayaran',$data);
		
	}
	
	function get_data_pembayaran_byid($id_pembayaran,$no_registrasi,$tipe_pembayaran,$semester)
	{
		$id_pembayaran = urldecode($id_pembayaran);
		$no_registrasi = urldecode($no_registrasi);
		$tipe_pembayaran = urldecode($tipe_pembayaran);
		$semester = urldecode($semester);
		$data = $this->model->query_get_pembayaran($id_pembayaran,$no_registrasi,$tipe_pembayaran,$semester);
    	echo json_encode($data);
	}
	// function get_data_pembayaran_byid($id_pembayaran)
	// {
	// 	$id_pembayaran = urldecode($id_pembayaran);
	// 	$data = $this->model->query_get_pembayaran($id_pembayaran);
    // 	echo json_encode($data);
	// }




}

	

	