<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class semester extends IO_Controller
{

	public function __construct()
	{
			$modul = 36;
			parent::__construct($modul);
		 	$this->load->model('msemester','model');
	}

	function index()
	{
		
		$vdata['title'] = 'MASTER SEMESTER';
	    $data['content'] = $this->load->view('vsemester',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

	function build_param($param)
	{        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->txt_semester)) $string_param .= " semester LIKE '%".$param->txt_semester."%' ";
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->semester.'\')">
						<i class="fa fa-edit"></i>
					</a>';
			
			$records["data"][] = array(

		     	// $data[$i]->id_semester,
		     	$data[$i]->semester,
                $act
		   );
		
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
		
    }
    
    function simpan_semester($status)
	{
		$semester 	        = $this->input->post('txt_semester');
		$item_bulan				= $this->input->post('hid_table_item_bulan');
        // $recdate            	= date('y-m-d');
	    // $userid 	        	= $this->session->userdata('logged_in')['uid'];
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data semester

		}
        else //update data
		{		
			$this->model->delete_item_bulan($semester);	
			 //save bulan		
			$item_bulan  = explode(';',$item_bulan);
			foreach ($item_bulan as $i) {
					$idetail = explode('#',$i);
					if(count($idetail)>1){
							$detail_bulan = array(

								'semester'			=> $semester,
								'bulan'				=> $idetail[0],
								// 'recdate'			=> $recdate,
								// 'userid' 			=> $userid
								
							);
							$this->model->simpan_item_bulan($detail_bulan);

					}
			}
        }	    

			echo "true";
	}

	function get_data_semester($id_semester)
	{
		$id_semester = urldecode($id_semester);
		$data = $this->model->query_semester($id_semester);
    	echo json_encode($data);
	}
	
	function get_data_bulan($semester)
	{
		$data = $this->model->query_bulan($semester);
    	echo json_encode($data);
		// var_dump($data);
		// exit;
	}

	function cek_data_bulan($bulan)
	{
		$data = $this->model->query_cekbulan($bulan);
    	echo json_encode($data);
		// var_dump($data);
		// exit;
	}
    
	function get_edit_semester($semester)
	{
		$semester = urldecode($semester);
		$data = $this->model->query_edit_semester($semester);
    	echo json_encode($data);
	}

}