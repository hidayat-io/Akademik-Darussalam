<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bulanan extends IO_Controller
{

	public function __construct()
		{
    $modul = 2;
		parent::__construct($modul);
		 $this->load->model('Mbulanan');
	  }

	function index()
		{
			$data['title'] = 'Data Bulanan';
	    	$data['content'] = $this->load->view('vbulanan',$data,TRUE);
	    	$this->load->view('main',$data);
	  }

	function lookup_noreg(){

        $noreg    	= $this->input->post('noreg');
        $emp     	= $this->Mbulanan->query_data_noreg($noreg);
        $ar_emp 	= array();

        if($emp!=null){

            $ar_emp = array(

                'no_registrasi'   	=> $emp->no_registrasi,
                'nama_lengkap'  	=> $emp->nama_lengkap,
                'saldo'  			=> $emp->saldo
            );
        }

        echo json_encode($ar_emp);
    }

    function lookUpNoregsrch(){

        $noreg    	= $this->input->post('noreg');
        $emp     	= $this->Mbulanan->query_data_noregsrch($noreg);
        $ar_emp 	= array();

        if($emp!=null){

            $ar_emp = array(

                'no_registrasi'   	=> $emp->no_registrasi,
                'nama_lengkap'  	=> $emp->nama_lengkap,
                'saldo'  			=> $emp->saldo
            );
        }

        echo json_encode($ar_emp);
    }
    

    function save_data(){

		$input = $this->input->post();

		$id_data 		= $input['hid_id_data'];
		$id_data_saldo 	= $input['hid_data_saldo'];
		$tgl 			= io_return_date('d-m-Y',$input['txttgl']);
		$user 			= $this->session->userdata('logged_in')['uid'];

		$data = array(

			'no_registrasi'		=> $input['opt_client'],
			'tgl_tabungan'		=> $tgl,
			'tipe'				=> $input['optionsRadios'],
			'nominal'			=> $input['txtnominal'],
			'keterangan'		=> $input['txtketerangan'],
			'userid'			=> $user
		);




		if($id_data==""){

			$this->Mbulanan->insert_new($data);
			$this->Mbulanan->update_saldo($input['txtnoreg'],$input['optionsRadios'],$input['txtnominal'],$user);
		}
		else{

			$this->Mbulanan->update_data($id_data,$data);
			$this->Mbulanan->update_saldo_updt($input['txtnoreg'],$input['optionsRadios'],$input['txtnominal'],$user,$id_data_saldo);
		}
	}

	function load_grid(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);

		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 				= $this->Mbulanan->get_list_data($string_param,$sort_by,$sort_type);
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$fdate 	= 'd-M-Y';
		$tipe 	= array('i'=>'In','o'=>'Out');

		for($i = $iDisplayStart; $i < $end; $i++) {

			$act = '<a class="btn btn-primary btn-xs btn-flat" href="#" onclick="editdata(\''.$data[$i]->id.'\')">Edit</a>&nbsp;';
			$act .= '<a class="btn btn-danger btn-xs btn-flat" href="#" onclick="deleteData(\''.$data[$i]->id.'|'.$data[$i]->tipe.'|'.$data[$i]->nominal.'|'.$data[$i]->no_registrasi.'|'.$data[$i]->saldo.'\')">Delete</a>&nbsp;';

			$records["data"][] = array(

				$data[$i]->id,
				io_date_format($data[$i]->tgl_tabungan,$fdate),
				$data[$i]->no_registrasi,
				$data[$i]->nama_lengkap,
				$data[$i]->kel_sekarang,
				$tipe[$data[$i]->tipe],
				$data[$i]->nominal,
				$data[$i]->keterangan,
				$act
			);
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	function hapus_data($str){


		$param = explode('|', urldecode($str));


		$id 		= $param[0];
		$tipe 		= $param[1];
		$nom 		= $param[2];
		$noregis 	= $param[3];
		$saldo_temp	= $param[4];
		$user 		= $this->session->userdata('logged_in')['uid'];

		// melempar data ke model untuk execute berdasarkan //
		// parameter yang diberikan //
		$this->Mbulanan->m_hapus_data($id,$tipe,$nom,$noregis,$user,$saldo_temp);
	}

	function get_data($id){

		$data = $this->Mbulanan->query_getdata($id);

		echo json_encode($data);
	}

	function build_param($param){
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->nama)) $string_param .= "nama_lengkap LIKE '%".$param->nama."%' ";
		}

		return $string_param;
	}



	function get_list_santri(){

    	$data_santri = $this->mcommon->query_list_santri();

    	echo json_encode($data_santri);
    }

    function get_saldo($nosantri){

    
		$data = $this->Mbulanan->query_getdatasaldo($nosantri);

		echo json_encode($data);
	}

	function load_data_santri(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);

		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 				= $this->Mbulanan->get_list_data_santri($string_param,$sort_by,$sort_type);
		$iTotalRecords  	= count($data);
		$iDisplayLength 	= intval($_REQUEST['length']);
		$iDisplayLength 	= $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
		$iDisplayStart  	= intval($_REQUEST['start']);
		$sEcho				= intval($_REQUEST['draw']);

		$records            = array();
		$records["data"]    = array();

		$end = $iDisplayStart + $iDisplayLength;
		$end = $end > $iTotalRecords ? $iTotalRecords : $end;

		$fdate 	= 'd-M-Y';

		for($i = $iDisplayStart; $i < $end; $i++) {

			$act = '<a class="btn btn-primary btn-xs btn-flat" href="#" onclick="editdata(\''.$data[$i]->no_registrasi.'\')">Edit</a>&nbsp;';
			$act .= '<a class="btn btn-danger btn-xs btn-flat" href="#" onclick="deleteData(\''.$data[$i]->no_registrasi.'\')">Delete</a>&nbsp;';

			$records["data"][] = array(
				$data[$i]->no_registrasi,
				$data[$i]->no_registrasi,
				$data[$i]->nama_lengkap,
				$data[$i]->kelas_sekolah,
				$data[$i]->saldo,
				$data[$i]->nominal,
				$act
			);
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	
}
