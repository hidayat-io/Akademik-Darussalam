<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class biaya extends IO_Controller
{

	public function __construct() {
			$modul = 17;
			parent::__construct($modul);
		 	$this->load->model('mbiaya','model');
	}

	function index() {		
        //get komponen bulanan
        $vdata['komponen_bulanan'] = $this->model->get_komponen($tipe='B');
        //get komponen semester
        $vdata['komponen_semester'] = $this->model->get_komponen($tipe='S');
		//get Potogan
		$potongan				=  $this->model->get_potongan();
		if($potongan != null)
		{
			$potongan_val = $potongan->potongan;
		}
		else {
			$potongan_val = '0';
		}
        $vdata['potongan'] 		= $potongan_val;
        
       	$vdata['title'] = 'MASTER BIAYA';
       	$vdata['title2'] = 'POTONGAN SANTRI LOKAL';
	    $data['content'] = $this->load->view('vbiaya',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

#region ms_biaya
	function load_grid() {
		$data 				= $this->model->get_list_data();
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->tipe.'\')">
						<i class="fa fa-edit"></i>
					</a>';
			// $act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->tipe.'\')">
			// 			<i class="fa fa-edit"></i>
            // 		</a>';
            if ($data[$i]->tipe == 'S')
            {
                $tipe = 'SEMESTER';
            }
             ELSE IF ($data[$i]->tipe == 'B')
            {
                $tipe = 'BULANAN';
            }
             ELSE
            {
                $tipe = 'ERROR';
            }

            //get nominal
            $kategori                   = $data[$i]->tipe;
            $total_nominal 				= $this->model->get_nominal($kategori);
            // var_dump($total_nominal);
            // exit();

			$records["data"][] = array(
				'<div align="center" style="width: 100%">'.$tipe.'</div>',
				'<div align="center" style="width: 100%">'.number_format($total_nominal->NOMINAL,0,",",".").'</div>',
                '<div align="center" style="width: 100%">'.$act.'</div>'
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
	}

	function get_data_biaya_byID($id_guru) {
		//get thn ajar dan semester aktif
		$sys_param			= $this->kurikulum_aktif();
		$isys_param 		= explode('#',$sys_param);
		$thn_ajar_aktif		= $isys_param[0];
		$semester_aktif		= $isys_param[1];

		$data 				= $this->model->query_get_biaya($id_guru,$thn_ajar_aktif,$semester_aktif);
		// var_dump($id_guru);
		// exit();
		echo json_encode($data);
		

	}

	function simpan_biaya($status) {
		
		$userid 			= $this->session->userdata('logged_in')['uid'];			
		
		if ($status == 'UPDATE_BULANAN')
		{
			$komponen_bulanan 	= $this->model->get_komponen($tipe='B');

			$sequence = 0;
			$kategori			= 'B';
			$this->model->delete_ms_biaya($kategori);
			foreach ($komponen_bulanan as $row) { 
					$nama_item	         = $this->input->post('b_hid_nama_item_'.$row['id_komponen']);
					$nominal	            = $this->input->post('b_nominal_'.$row['id_komponen']);					
					

					$data_bulanan = array(
					'kategori' 			=> $kategori,
					'nama_item' 		=> $nama_item,
					'nominal' 			=> str_replace(array('.',','), array('',''),$nominal)
					);
					
					
					$this->model->update_data($data_bulanan);
					
					$sequence++;
			} 
				
			//update histori master biaya
			$total_nominal 				= $this->model->get_nominal($kategori='');
			// var_dump($total_nominal);
			// exit();
			$update_nominal	 = array(
				'userid' 			=> $userid,
				'nominal' 			=> $total_nominal->NOMINAL
				);
				
			// 	var_dump($update_nominal	);
			// exit();
				$this->model->insert_data_histori_ms_biaya($update_nominal);

			echo "true";
		}
		elseif ($status == 'UPDATE_SEMESTER')
		{			
			$komponen_semester 	= $this->model->get_komponen($tipe='S');

			$sequence 			= 0;
			$kategori			= 'S';
			$this->model->delete_ms_biaya($kategori);
			foreach ($komponen_semester as $row) { 
					$nama_item	         = $this->input->post('s_hid_nama_item_'.$row['id_komponen']);
					$nominal	            = $this->input->post('s_nominal_'.$row['id_komponen']);					
					

					$data_semester = array(
					'kategori' 			=> $kategori,
					'nama_item' 		=> $nama_item,
					'nominal' 			=> str_replace(array('.',','), array('',''),$nominal)
					);
					
	
					
					$this->model->update_data($data_semester);
					
					$sequence++;
			}
				
			//update histori master biaya
			$total_nominal 				= $this->model->get_nominal($kategori='');
			
			$update_nominal	 = array(
				'userid' 			=> $userid,
				'nominal' 			=> $total_nominal->NOMINAL
				);
				
			// 	var_dump($update_nominal	);
			// exit();
				$this->model->insert_data_histori_ms_biaya($update_nominal);

			echo "true";
		}
		else {
			echo "status error";
		}
	}

#endregion ms_biaya

#region potongan
	function simpan_potongan() {
		
		$potongan	        = $this->input->post('potongan');				
		$userid 			= $this->session->userdata('logged_in')['uid'];			
		if($potongan == null)
		{
			$potongan = 0;
		}
		$data_potongan = array(
		'potongan' 			=> $potongan,
		'userid' 			=> $userid
		);
			
		
		$this->model->_save_potongan($data_potongan);
			
			echo "true";

	}
#endregion potongan


}