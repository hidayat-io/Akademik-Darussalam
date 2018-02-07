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
		       
       	$vdata['title'] = 'MASTER BIAYA';
       	$vdata['title2'] = 'POTONGAN SANTRI';
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
					$nama_item	         	= $this->input->post('b_hid_nama_item_'.$row['id_komponen']);
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

	function load_grid_potongan() {
		$data 				= $this->model->get_list_data_potongan();
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		for($i = $iDisplayStart; $i < $end; $i++) {
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit_potongan(\''.$data[$i]->id_potongan.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus_potongan(\''.$data[$i]->id_potongan.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			

			$records["data"][] = array(
				'<div align="center" style="width: 100%">'.$data[$i]->nama_potongan.'</div>',
				'<div align="center" style="width: 100%">'.$data[$i]->persen.'%'.'</div>',
				'<div align="center" style="width: 100%">'.number_format($data[$i]->nominal,0,",",".").'</div>',
				'<div align="center" style="width: 100%">'.$act.'</div>'
		);
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
			
	}

	function get_data_potongan($id_potongan){
		$id_potongan = urldecode($id_potongan);
		$data = $this->model->query_potongan($id_potongan);
    	echo json_encode($data);
	}

	function simpan_potongan($status) {
		
		$id_potongan	        = $this->input->post('id_potongan');				
		$nama_potongan	        = $this->input->post('nama_potongan');				
		$persen	        		= $this->input->post('persen');				
		$nominal_potongan	    = $this->input->post('nominal_potongan');				
		$userid 				= $this->session->userdata('logged_in')['uid'];			
		
		$data_potongan = array(
		'nama_potongan' 	=> $nama_potongan,
		'persen' 			=> $persen,
		'nominal' 			=> str_replace(array('.',','), array('',''),$nominal_potongan),
		'userid' 			=> $userid
		);
			
		
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
         	$this->model->_save_potongan($data_potongan);

		}
        else //update data
		{		
         	$this->model->_update_potongan($id_potongan,$data_potongan);
		}	 
		
			
			echo "true";

	}

	function hapus_potongan($id_potongan){
		$id_potongan = urldecode($id_potongan);

		$this->model->_DelPotongan($id_potongan);
	}
#endregion potongan


}