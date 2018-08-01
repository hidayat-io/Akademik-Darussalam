<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends IO_Controller{

	public function __construct(){

    	$this->modul = 23;
		parent::__construct($this->modul);
		$this->load->model('Mabsensi','model');
	}

	function index(){

		$data['title'] = 'ABSENSI';
    	$data['content'] = $this->load->view('vabsensi',$data,TRUE);
    	$this->load->view('main',$data);
	}

	function load_grid(){

		$iparam 		= json_decode($_REQUEST['param']);
		$string_param 	= $this->build_param($iparam);
		
		//sorting
		$sort_by 		= $_REQUEST['order'][0]['column'];
		$sort_type 		= $_REQUEST['order'][0]['dir'];

		$data 				= $this->model->get_grid_kelas($string_param,$sort_by,$sort_type);
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

			$btn = '<button type="button" class="btn blue btn-xs" title="LIHAT & EDIT DATA" onclick="modalEdit(\''.$data[$i]->id_mskelasdt.'\')">
	                	<i class="fa fa-edit"></i>
	                </button>';

			$records["data"][] = array(

				$data[$i]->tingkat,
				$data[$i]->tipe_kelas,
				$data[$i]->kode_kelas,
				$data[$i]->nama,
				$btn
			);
		}

		$records["draw"]            	= $sEcho;
		$records["recordsTotal"]    	= $iTotalRecords;
		$records["recordsFiltered"] 	= $iTotalRecords;

		echo json_encode($records);
	}

	function build_param($param=""){ //merubah hasil json menjadi parameter Query

		$config = $this->mcommon->get_kurikulum_aktif();
		
		if($config!=null){

			$config_val 	= explode("#",$config->param_value);
			$kurikulum 		= $config_val[0];
			$semester 		= $config_val[1];
			$string_param 	= " kur.id_thn_ajar = $kurikulum AND kur.sm_$semester > 0 ";
		}
		else{

			$string_param = "";
		}

		return $string_param;
	}

	function get_data_absensi(){
		
		$login_user 		= $this->session->userdata('logged_in')['uid'];
		$input_tgl_absensi 	= $this->input->get('tgl_absensi');
		$tgl_absensi 		= io_return_date('d-m-Y',$input_tgl_absensi);
		$id_kelasdt			= $this->input->get('id_kelasdt');
		$tgl_server 		= date('Y/m/d');
		$group 				= $this->mcommon->get_hak_akses($login_user,$this->modul);

		$data = $this->model->mget_data_absensi($id_kelasdt,$tgl_absensi)->result();

		$isToday 	= 0;
		$date1 		= new DateTime($tgl_absensi);
		$date2 		= new DateTime($tgl_server);

		$interval 	= $date1->diff($date2);
		$interval 	= $interval->d;

		if($interval == 0){
			$isToday = 1;
		}

		$ar_data = array(
			'data' 		=> $data,
			'isToday' 	=> $isToday,
			'group' 	=> $group->group_name
		);

		echo json_encode($ar_data);
	}

	function save_absen(){

		$login_user = $this->session->userdata('logged_in')['uid'];
		$id_kelasdt	= $this->input->post('hid_id_kelasdt');
		$tgl_absen 	= $this->input->post('dtp_tgl_absensi');
		$tgl_absen 	= io_return_date('d-m-Y',$this->input->post('dtp_tgl_absensi'));
		$id_absen_h = $this->input->post('hid_id_absen_header');
		$list_siswa = $this->input->post('hid_list_siswa');
		$list_siswa = explode(",",$list_siswa);

		//delete old absensi header & detail
		$this->model->del_old_absensi($id_absen_h);

		//save header absen
		$header_absen = array(

			'id_mskelasdt'	=> $id_kelasdt,
			'tgl_absensi'	=> $tgl_absen,
			'upd_by'		=> $login_user
		);

		$id_absen_h = $this->model->save_header_absen($header_absen);

		//loop through list siswa and save absensi detail
		foreach ($list_siswa as $id_siswa) {
			
			$detail_absen = array(

				'id_absen_header' 	=> $id_absen_h,
				'noreg_santri'		=> $id_siswa,
				'absensi'			=> $this->input->post('rdo_'.$id_siswa)
			);

			$this->model->save_detail_absen($detail_absen);
		}

		echo 1; // 1 mean success
	}

	function coba(){

		$jam  = array('I','II','III','IV','V','VI');
		$hari = array('SABTU','AHAD','SENIN','SELASA','RABU','KAMIS','JUMAT');

		$table = "<table border='1'>";
		$table .= "<tr><th>JAM / HARI</th>";

		foreach($hari as $hh){ $table.= "<th>$hh</th>"; }

		$table .= "</tr>";

		foreach($jam as $j){

			$table .= "<tr><td>$j</td>";

			foreach($hari as $h){

				$sql = " SELECT * FROM tjadwal WHERE hari='$h' AND jam='$j' ";
				$table .= "<td>$sql</td>";
			}

			$table .= "</tr>";
		}

		$table .= "</table>";

		echo $table;
	}
}