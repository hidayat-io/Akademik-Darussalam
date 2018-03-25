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
		 //get Tahun Ajaran Data
			$select_thnajar= $this->mcommon->get_thn_ajar()->result();

			$vdata['kode_deskripsi'][NULL] = '';
			foreach ($select_thnajar as $b) {

				$vdata['kode_deskripsi'][$b->id]
				=$b->deskripsi;
			}
        //get komponen bulanan
        $vdata['komponen_bulanan'] = $this->model->get_komponen($tipe='B');
        //get komponen semester
        $vdata['komponen_semester'] = $this->model->get_komponen($tipe='S');
		       
       	$vdata['title'] 	= 'MASTER BIAYA';
       	$vdata['title2'] 	= 'POTONGAN SANTRI';
	    $data['content'] 	= $this->load->view('vbiaya',$vdata,TRUE);
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
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id.'\',\''.$data[$i]->tipe.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="delete_biaya(\''.$data[$i]->id.'\',\''.$data[$i]->tipe.'\')">
						<i class="fa fa-remove"></i>
					</a>';
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
            $kategori               = $data[$i]->tipe;
            $id_thn_ajar            = $data[$i]->id;
            $deskripsi              = $data[$i]->deskripsi;
            $total_nominal 			= $this->model->get_nominal($kategori,$id_thn_ajar);
            // var_dump($total_nominal);
            // exit();

			$records["data"][] = array(
				'<div align="center" style="width: 100%">'.$deskripsi.'</div>',
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

	function simpan_biaya($status) {
		
		$userid 	= $this->session->userdata('logged_in')['uid'];
		$tipe		= $this->input->post('hid_tipekomponen');	
		$select_thnajar		= $this->input->post('select_thnajar');	
		if ($tipe == 'B') {
				$data_komponen_biaya = $this->input->post('hid_table_item_bulanan');	
			}
			else {
				$data_komponen_biaya = $this->input->post('hid_table_item_semester');	
		}	

		$data_komponen_biaya  = explode(';',$data_komponen_biaya);
		
		if ($status == 'SIMPAN')
		{
			
			
			foreach ($data_komponen_biaya as $i) {
					$idetail = explode('#',$i);
					
					if(count($idetail)>1){
							$data_biaya = array(

								'id_thn_ajar'		=> $select_thnajar,
								'kategori'			=> $tipe,
								'nama_item'			=> $idetail[0],
								'nominal'			=> str_replace(array('.',','), array('',''),$idetail[1]),
								'userid' 			=> $userid
								
							);
							// var_dump($data_biaya);
							// exit();
							$this->model->simpan_biaya($data_biaya);

					}
			}
			
			
		}
		else
		{			
			$this->model->del_biaya($select_thnajar,$tipe);//hapus semua data biaya
			foreach ($data_komponen_biaya as $i) {
					$idetail = explode('#',$i);
					
					if(count($idetail)>1){
							$data_biaya = array(

								'id_thn_ajar'		=> $select_thnajar,
								'kategori'			=> $tipe,
								'nama_item'			=> $idetail[0],
								'nominal'			=> str_replace(array('.',','), array('',''),$idetail[1]),
								'userid' 			=> $userid
								
							);
							// var_dump($data_biaya);
							// exit();
							$this->model->simpan_biaya($data_biaya);

					}
			}
		}
	}

	function delete_biaya($id,$tipe){
		$id_thn_ajar	= urldecode($id);
		$kategori		= urldecode($tipe);
		$data			= $this->model->del_biaya($id_thn_ajar,$kategori);
		echo json_encode($data);
	}

	function get_data_biaya($id_thn_ajar,$tipe){
		$id_thn_ajar 	= urldecode($id_thn_ajar);
		$tipe			= urldecode($tipe);
		$data 			= $this->model->query_databiaya($id_thn_ajar,$tipe);
    	echo json_encode($data);
	}

	function get_data_biaya_edit($id_thn_ajar,$tipe){
		$id_thn_ajar 	= urldecode($id_thn_ajar);
		$tipe			= urldecode($tipe);
		$data 			= $this->model->query_databiaya_edit($id_thn_ajar,$tipe);
    	echo json_encode($data);
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