<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class daftarulang extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 45;
			parent::__construct($this->modul);
		 	$this->load->model('mdaftarulang','model');
	}

	function index(){
		//get kurikulum aktif
		$sys_param						= $this->kurikulum_aktif();
		$isys_param 					= explode('#',$sys_param);
		$id_thn_ajar					= $isys_param[0];
		$id_thn_ajar_value				= $this->model->get_kurikulum($id_thn_ajar);
		$vdata['id_thn_ajar']			= $id_thn_ajar_value->id;
		$vdata['deskripsi']				= $id_thn_ajar_value->deskripsi;
		$vdata['semester_aktif']		= $isys_param[1];

        // get ID Potongan
        $select_potongan = $this->model->get_potongan()->result();

        $vdata['id_potongan'][NULL] = '-';
        foreach ($select_potongan as $b) {

            $vdata['id_potongan'][$b->id_potongan."#".$b->nama_potongan."#".$b->persen."#".$b->nominal]
                =$b->id_potongan." | ".$b->nama_potongan." | ".$b->persen." | ".$b->nominal;
        }
		
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
		$vdata['title'] = 'DATA DAFTAR ULANG';
	    $data['content'] = $this->load->view('vdaftarulang',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function kurikulum_aktif() {
		$sys_param			= $this->mcommon->get_kurikulum_aktif();
		$sys_param_value	= $sys_param->param_value;
		
		return $sys_param_value;
	}

    #region index daftar ulang
    function build_param($param){        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->no_registrasi)) $string_param .= " trans_daftar_ulang.no_registrasi LIKE '%".$param->no_registrasi."%' ";
		}

		return $string_param;
	}

	function load_grid(){
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
			$act = '<a href="#" class="btn btn-icon-only blue '.$class_edit.'" title="UBAH DATA" onclick="edit(\''.$data[$i]->id.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red '.$class_delete.'" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

                '<div align="center" style="width: 100%">'.$data[$i]->deskripsi.'</div>',
                '<div align="center" style="width: 100%">'.$data[$i]->no_registrasi.'</div>',
                '<div align="center" style="width: 100%">'.$data[$i]->rayon.'</div>',
                // '<div align="center" style="width: 100%">'.$data[$i]->bagian.'</div>',
                '<div align="center" style="width: 100%">'.$data[$i]->kamar.'</div>',
                '<div align="center" style="width: 100%">'.$data[$i]->kel_sekarang.'</div>',
                '<div align="center" style="width: 100%">'.io_date_format($data[$i]->date,$fdate).'</div>',
                '<div align="center" style="width: 100%">'.$act.'</div>'
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
    }

    function Deldaftarulang($kode_daftarulang){
		$kode_daftarulang = urldecode($kode_daftarulang);
		$userid 			= $this->session->userdata('logged_in')['uid'];
		//get all data data ulang, untuk penembalian data sebelumnya.
		$fulldata_daftarulang	= $this->model->query_dataedit_daftarulang($kode_daftarulang);
		$id_thn_ajar			= $fulldata_daftarulang['id_thn_ajar'];
		$no_registrasi			= $fulldata_daftarulang['no_registrasi'];
		$rayon_sebelumnya		= $fulldata_daftarulang['rayon_sebelumnya'];
		$kel_sebelumnya			= $fulldata_daftarulang['kel_sebelumnya'];
		$kamar_sebelumnya		= $fulldata_daftarulang['kamar_sebelumnya'];
		$bagian_sebelumnya		= $fulldata_daftarulang['bagian_sebelumnya'];
		// var_dump($id_thn_ajar,$no_registrasi,$rayon_sebelumnya,$kel_sebelumnya,$kamar_sebelumnya,$bagian_sebelumnya);
		// exit();

		$data_update_ms_santri = array( //update data ms_santri
            'kel_sekarang'       	=> $kel_sebelumnya,
			'rayon' 				=> $rayon_sebelumnya,
            'kamar'      			=> $kamar_sebelumnya,
            'bagian'     			=> $bagian_sebelumnya,
			// 'userid' 				=> $userid
		);

		$this->model->update_ms_santri($data_update_ms_santri,$no_registrasi);//update kelas, bagian, rayon, kamar ms_santri
		$this->model->delete_daftarulang($kode_daftarulang);
		$this->model->delete_tagihan($id_thn_ajar,$no_registrasi);
	}

    function get_dataID_tagihan($id_thn_ajar,$no_registrasi){
		$id_thn_ajar 		= urldecode($id_thn_ajar);
		$no_registrasi 		= urldecode($no_registrasi);
		$data               = $this->model->query_get_dataID_tagihan($id_thn_ajar,$no_registrasi);
		echo json_encode($data);
	}

    #endregion index daftar ulang
	
    
    #region modal add daftar ulang
    function get_data_santri($no_registrasi){
        $no_registrasi      = urldecode($no_registrasi);
		$data               = $this->model->query_data_santri($no_registrasi);
    	echo json_encode($data);
	}
	
    function get_data_daftarulang($id_thn_ajar,$no_registrasi){
        $no_registrasi      = urldecode($no_registrasi);
        $id_thn_ajar      	= urldecode($id_thn_ajar);
		$data               = $this->model->query_data_daftarulang($id_thn_ajar,$no_registrasi);
    	echo json_encode($data);
	}
	
    function get_dataedit_daftarulang($kode_daftarulang){
        $kode_daftarulang      	= urldecode($kode_daftarulang);
		$data               	= $this->model->query_dataedit_daftarulang($kode_daftarulang);
    	echo json_encode($data);
    }
    
    function simpan_daftarulang($status){
		$id_thn_ajar 		= $this->input->post('id_thn_ajar');
		$no_registrasi 		= $this->input->post('no_registrasi');
		$rayon 				= $this->input->post('rayon');
		$kamar 				= $this->input->post('kamar');
		$bagian 			= $this->input->post('bagian');
		$kel_sekarang 		= $this->input->post('kel_sekarang');
		$id_potongan 		= $this->input->post('id_potongan');
		
		if($id_potongan ==''){
			$tipe_potongan 		= '';
			$nominal_potongan = '0';
		}else{
			$tipe_potongan 			= $this->input->post('tipe_potongan');
			if ($tipe_potongan == 'persen'){
				$nominal_potongan 	= $this->input->post('potongan_persen');
			}else {
				$nominal_potongan 	= $this->input->post('potongan_nominal');
			}
		}

	    $userid 			= $this->session->userdata('logged_in')['uid'];

		//ambil kelas, rayon,kamar sebelumnya
		$data_santri_lama 		= $this->model->query_data_santri($no_registrasi);
		$kel_sebelumnya        	= $data_santri_lama->kel_sekarang;
		$rayon_sebelumnya 		= $data_santri_lama->rayon;
		$kamar_sebelumnya      	= $data_santri_lama->kamar;
		$bagian_sebelumnya     	= $data_santri_lama->bagian;
		
		$data_update_ms_santri = array( //data ms_santri
			// 'id_thn_ajar' 			=> $id_thn_ajar,
			// 'no_registrasi' 		=> $no_registrasi,
            'kel_sekarang'       	=> $kel_sekarang,
			'rayon' 				=> $rayon,
            'kamar'      			=> $kamar,
            'bagian'     			=> $bagian,
            // 'kel_sebelumnya'     => $kel_sebelumnya,
			// 'rayon_sebelumnya' 	=> $rayon_sebelumnya,
            // 'kamar_sebelumnya'   => $kamar_sebelumnya,
            // 'bagian_sebelumnya'     => $bagian_sebelumnya,
            // 'id_potongan'     	=> $id_potongan,
            // 'tipe_potongan'     	=> $tipe_potongan,
            // 'nominal_potongan'   => $nominal_potongan,
			// 'userid' 				=> $userid
		);
 
		$data_daftarulang = array( //data trans_daftar ulang
			'id_thn_ajar' 			=> $id_thn_ajar,
			'no_registrasi' 		=> $no_registrasi,
            // 'kel_sekarang'       => $kel_sekarang,
			// 'rayon' 				=> $rayon,
            // 'kamar'      		=> $kamar,
            // 'bagian'     		=> $bagian,
            'kel_sebelumnya'        => $kel_sebelumnya,
			'rayon_sebelumnya' 		=> $rayon_sebelumnya,
            'kamar_sebelumnya'      => $kamar_sebelumnya,
            'bagian_sebelumnya'     => $bagian_sebelumnya,
            'id_potongan'     		=> $id_potongan,
            'tipe_potongan'     	=> $tipe_potongan,
            // 'nominal_potongan'   => $nominal_potongan,
			'userid' 				=> $userid
		);

		$data_daftarulang_update = array( //data trans_daftar ulang
			// 'id_thn_ajar' 			=> $id_thn_ajar,
			// 'no_registrasi' 		=> $no_registrasi,
            // 'kel_sekarang'       => $kel_sekarang,
			// 'rayon' 				=> $rayon,
            // 'kamar'      		=> $kamar,
            // 'bagian'     		=> $bagian,
            'kel_sebelumnya'        => $kel_sebelumnya,
			'rayon_sebelumnya' 		=> $rayon_sebelumnya,
            'kamar_sebelumnya'      => $kamar_sebelumnya,
            'bagian_sebelumnya'     => $bagian_sebelumnya,
            // 'id_potongan'     		=> $id_potongan,
            // 'tipe_potongan'     	=> $tipe_potongan,
            // 'nominal_potongan'   => $nominal_potongan,
			'userid' 				=> $userid
		);
		
		if($status =="SAVE"){
					//get total tagihan per semester&perbulan
			$tipe_tagihan_semester 		= 'S';
			$tipe_tagihan_bulanan 		= 'B';
			$total_tagihan_semester		= $this->model->query_data_tagihan($id_thn_ajar,$tipe_tagihan_semester);
			$total_tagihan_bulanan		= $this->model->query_data_tagihan($id_thn_ajar,$tipe_tagihan_bulanan);

			$total_tagihan_semester		= (int)$total_tagihan_semester->total_tagihan;
			$total_tagihan_bulanan		= (int)$total_tagihan_bulanan->total_tagihan;
			
			//hasil akhir tagihan setelah dipotong
			if($id_potongan ==''){
				$grand_total_tagihan_semester 		= $total_tagihan_semester;
				$grand_total_tagihan_bulanan 		= $total_tagihan_bulanan;
			}else{
				if ($tipe_potongan == 'persen'){ //POTONGAN BERDASARKAN PERSENTASI
					$prcn = $nominal_potongan / 100;
					$nominal_potongan_semester 			= $prcn * $total_tagihan_semester;
					$nominal_potongan_bulanan  			= $prcn * $total_tagihan_bulanan;
					
					$grand_total_tagihan_semester 		= $total_tagihan_semester - $nominal_potongan_semester;
					$grand_total_tagihan_bulanan 		= $total_tagihan_bulanan - 	$nominal_potongan_bulanan;
				}else {//POTONGAN BERDASARKAN NOMINAL
						$grand_total_tagihan_semester 		= $total_tagihan_semester - $nominal_potongan;
						$grand_total_tagihan_bulanan 		= $total_tagihan_bulanan - $nominal_potongan;
				}
			}
			
							
			//save trans_tagihan /semester
			$semester		= $this->model->query_data_ms_semester();
			$row_semester	= count($semester);
			for($isemester=0;$isemester<$row_semester;$isemester++)
			{
				$data_tagihan_semester 		= array(
					'id_thn_ajar' 			=> $id_thn_ajar,
					'no_registrasi' 		=> $no_registrasi,
					'tipe_tagihan' 			=> 'S',
					'ket_semester' 			=> 'SEMESTER'.$semester[$isemester]['semester'],
					'ket_bulan' 			=> '',
					'id_potongan' 			=> $id_potongan,
					'tipe_potongan' 		=> $tipe_potongan,
					'nominal_potongan' 		=> $nominal_potongan,
					'total_tagihan' 		=> $grand_total_tagihan_semester,
					'userid' 				=> $userid

					
				);
				
				$semester_bulanan	= $semester[$isemester]['semester'];
				$bulanan			= $this->model->query_data_ms_semester_bulanan($semester_bulanan);
				
				$row_bulanan		= count($bulanan);

				for($ibulanan=0;$ibulanan<$row_bulanan;$ibulanan++)
				{
					$data_tagihan_bulanan 		= array(
						'id_thn_ajar' 			=> $id_thn_ajar,
						'no_registrasi' 		=> $no_registrasi,
						'tipe_tagihan' 			=> 'B',
						'ket_semester' 			=> 'SEMESTER'.$semester_bulanan,
						'ket_bulan' 			=> $bulanan[$ibulanan]['bulan'],
						'id_potongan' 			=> $id_potongan,
						'tipe_potongan' 		=> $tipe_potongan,
						'nominal_potongan' 		=> $nominal_potongan,
						'total_tagihan' 		=> $grand_total_tagihan_bulanan,
						'userid' 				=> $userid

						
					);
				$this->model->simpan_data_tagihan($data_tagihan_bulanan);//simpan tagihan per bulan			
					
				}

				$this->model->simpan_data_tagihan($data_tagihan_semester);//simpan tagihan per semester		
					
					
			}
			// save data daftarulang
				$this->model->simpan_data_daftarulang($data_daftarulang);
				$this->model->update_ms_santri($data_update_ms_santri,$no_registrasi);//update kelas, bagian, rayon, kamar ms_santri

		}else if($status =="UPDATE"){
				$this->model->update_data_daftarulang($id_thn_ajar,$no_registrasi,$data_daftarulang_update);
				$this->model->update_ms_santri($data_update_ms_santri,$no_registrasi);//update kelas, bagian, rayon, kamar ms_santri
		}else{
			alert("error status update");
		}



		echo "true";
	}	
    #endregion modal add daftar ulang
}