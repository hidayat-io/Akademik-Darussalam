<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class msconfig extends IO_Controller
{

	public function __construct()
	{
			$modul = 34;
			parent::__construct($modul);
		 	$this->load->model('mmsconfig','model');
	}

	function index()
	{
		
		$vdata['title'] = 'MASTER CONFIG';
	    $data['content'] = $this->load->view('vmsconfig',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->nomor_statistik)) $string_param .= " nomor_statistik LIKE '%".$param->nomor_statistik."%' ";
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

		for($i = $iDisplayStart; $i < $end; $i++) {
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id_config.'\')">
						<i class="fa fa-edit"></i>
					</a>';
			
			$records["data"][] = array(

		     	// $data[$i]->id_config,
		     	$data[$i]->nomor_statistik,
				$data[$i]->NPSN,
  				$data[$i]->nama,
				$data[$i]->jenis_lembaga,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
    }
    
    function simpan_msconfig($status)
	{
		$id_config 	        = $this->input->post('id_config');
		$nomor_statistik 	= $this->input->post('nomor_statistik');
		$NPSN 	            = $this->input->post('NPSN');
		$nama  		        = $this->input->post('nama');
		$jenis_lembaga 		= $this->input->post('jenis_lembaga');
        $recdate            = date('y-m-d');
	    $userid 	        = $this->session->userdata('logged_in')['uid'];

		$data_msconfig = array(
			'id_config' 	    => $id_config,
			'nomor_statistik' 	=> $nomor_statistik,
			'NPSN' 		        => $NPSN,
			'nama' 		        => $nama,
			'jenis_lembaga' 	=> $jenis_lembaga,
            'recdate'           => $recdate,
			'userid' 		    => $userid
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data msconfig
         	$this->model->simpan_data_msconfig($data_msconfig);

		}
        else //update data
		{		
			// save data msconfig
         	$this->model->update_data_msconfig($id_config,$data_msconfig);
        }	    

			echo "true";
	}

	function get_data_msconfig($id_config)
	{
		$id_config = urldecode($id_config);
		$data = $this->model->query_msconfig($id_config);
    	echo json_encode($data);
    }
    
	function get_edit_msconfig($id_config)
	{
		$id_config = urldecode($id_config);
		$data = $this->model->query_edit_msconfig($id_config);
    	echo json_encode($data);
	}

}

	

	