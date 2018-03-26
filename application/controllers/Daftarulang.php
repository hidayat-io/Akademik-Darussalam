<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class daftarulang extends IO_Controller
{

	public function __construct()
	{
			$modul = 28;
			parent::__construct($modul);
		 	$this->load->model('mdaftarulang','model');
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
            
		$vdata['title'] = 'DATA DAFTAR ULANG';
	    $data['content'] = $this->load->view('vdaftarulang',$vdata,TRUE);
	    $this->load->view('main',$data);
	}

    #region index daftar ulang
    function build_param($param){        
		// merubah hasil json menjadi parameter Query //
		$string_param = NULL;

		if($param!=null){

			if(isset($param->kode_daftarulang)) $string_param .= " noregistrasi LIKE '%".$param->noregistrasi."%' ";
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

		for($i = $iDisplayStart; $i < $end; $i++) {
			$act = '<a href="#" class="btn btn-icon-only blue" title="UBAH DATA" onclick="edit(\''.$data[$i]->id.'\')">
						<i class="fa fa-edit"></i>
					</a>
					<a href="#" class="btn btn-icon-only red" title="HAPUS DATA" onclick="hapus(\''.$data[$i]->id.'\')">
						<i class="fa fa-remove"></i>
					</a>';
			
			$records["data"][] = array(

                '<div align="center" style="width: 100%">'.$data[$i]->deskripsi.'</div>',
                '<div align="center" style="width: 100%">'.$data[$i]->no_registrasi.'</div>',
                '<div align="center" style="width: 100%">'.$data[$i]->rayon.'</div>',
                '<div align="center" style="width: 100%">'.$data[$i]->bagian.'</div>',
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
		$this->model->delete_daftarulang($kode_daftarulang);
	}
    #endregion index daftar ulang
	
    
    #region modal add daftar ulang
    function get_data_santri($no_registrasi)
	{
        $no_registrasi      = urldecode($no_registrasi);
		$data               = $this->model->query_data_santri($no_registrasi);
    	echo json_encode($data);
    }
    
    function simpan_daftarulang($status)
	{
		$kode_daftarulang 		= $this->input->post('kode_daftarulang');
		$nama  		        = $this->input->post('nama');
        $recdate            = date('y-m-d');
	    $userid 			= $this->session->userdata('logged_in')['uid'];

		$data_daftarulang = array(
			'kode_daftarulang' 			=> $kode_daftarulang,
			'nama' 		            => $nama,
            'recdate'               => $recdate,
			'userid' 				=> $userid
		);
        
		if($status=='SAVE')	
		{// cek apakah add new atau editdata
			
		// save data daftarulang
         	$this->model->simpan_data_daftarulang($data_daftarulang);

		}
        else //update data
		{		
			// save data daftarulang
         	$this->model->update_data_daftarulang($kode_daftarulang,$data_daftarulang);
        }	    

			echo "true";
	}	
    #endregion modal add daftar ulang

	function exportexcel(){
		// hasil decode // 
		$str = base64_decode($this->uri->segment(3));

		// merubah hasil decode dari string ke json //
		$str = json_decode($str);

		// memasukan data json kedalam builparam //
		// agar json menjadi parameter query //
		$str = $this->build_param($str);

		$data= $this->model->get_list_data($str);

		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Master_daftarulang');
		$this->excel->getActiveSheet()->setCellValue('A1', "Master daftarulang");
		$this->excel->getActiveSheet()->mergeCells('A1:C1');
		$this->excel->getActiveSheet()->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		//header
		$this->excel->getActiveSheet()->setCellValue('A3', "No.");
		$this->excel->getActiveSheet()->setCellValue('B3', "Kode daftarulang");
		$this->excel->getActiveSheet()->setCellValue('C3', "Nama daftarulang");

		$fdate 	= "d-m-Y";
		$i  	= 4;

		if($data != null){

			foreach($data as $row){

				$this->excel->getActiveSheet()->setCellValue('A'.$i, $i-3);
				$this->excel->getActiveSheet()->setCellValue('B'.$i, $row->kode_daftarulang);
				$this->excel->getActiveSheet()->setCellValue('C'.$i, $row->nama);
				
				$i++;
			}
		}

		for($col = 'A'; $col !== 'G'; $col++) {

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
		$cell_to = "C".$i;
		$this->excel->getActiveSheet()->getStyle('A3:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('A1:C3')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A3:C3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A3:C3')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='Master-daftarulang.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');

	}

	

	


}

	

	