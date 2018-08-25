<?php
// <!-- بسم الله الرحمن الرحیم -->

defined('BASEPATH') OR exit('No direct script access allowed');

class lproposalform extends IO_Controller
{

	public function __construct()
	{
			$this->modul = 57;
			parent::__construct($this->modul);
			 $this->load->model('mlproposalform','model');
			 $this->load->library("pdf");
	}

	function index()
	{
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
		$vdata['title']                 = 'PROPOSAL FORM';
	    $data['content']                = $this->load->view('vlproposalform',$vdata,TRUE);
	    $this->load->view('main',$data);
	}



	function export_form_a(){
        //load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('FORM A');
        
        #reggion header
            $this->excel->getActiveSheet()->setCellValue('A1', "KOP SURAT LEMBAGA KESEJAHTERAAN SOSIAL ANAK (LKSA)");
            $this->excel->getActiveSheet()->mergeCells('A1:W1');
            $this->excel->getActiveSheet()->getStyle('A1:W1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('G2', "PROPOSAL");
            $this->excel->getActiveSheet()->setCellValue('G3', "FORM A");

            $this->excel->getActiveSheet()->getStyle('A1:W1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getRowDimension('7')->setRowHeight(105);
            $this->excel->getActiveSheet()->setCellValue('A4', "KETERANGAN ANAK BINAAN LKSA");
                $this->excel->getActiveSheet()->mergeCells('A4:W4');
                $this->excel->getActiveSheet()->getStyle('A4:W4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A4:W4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            $this->excel->getActiveSheet()->setCellValue('A6', "NO");
                $this->excel->getActiveSheet()->mergeCells('A6:A7');
                $this->excel->getActiveSheet()->getStyle('A6:A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A6:A7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('B6', "Provinsi");
                        $this->excel->getActiveSheet()->mergeCells('B6:B7');
                $this->excel->getActiveSheet()->getStyle('B6:B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B6:B7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);         
            $this->excel->getActiveSheet()->setCellValue('C6', "Kab/ Kota");
                        $this->excel->getActiveSheet()->mergeCells('C6:C7');
                $this->excel->getActiveSheet()->getStyle('C6:C7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C6:C7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('C6:C7')->getAlignment()->setWrapText(true); 
            $this->excel->getActiveSheet()->setCellValue('D6', "Kecamatan");
                        $this->excel->getActiveSheet()->mergeCells('D6:D7');
                $this->excel->getActiveSheet()->getStyle('D6:D7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D6:D7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(12); 
            $this->excel->getActiveSheet()->setCellValue('E6', "Desa/ Kelurahan");
                        $this->excel->getActiveSheet()->mergeCells('E6:E7');
                $this->excel->getActiveSheet()->getStyle('E6:E7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E6:E7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('E6:E7')->getAlignment()->setWrapText(true); 
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
            $this->excel->getActiveSheet()->setCellValue('F6', "Alamat LKSA");
                        $this->excel->getActiveSheet()->mergeCells('F6:F7');
                $this->excel->getActiveSheet()->getStyle('F6:F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F6:F7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F6:F7')->getAlignment()->setWrapText(true); 
            $this->excel->getActiveSheet()->setCellValue('G6', "Nama LKSA");
                        $this->excel->getActiveSheet()->mergeCells('G6:G7');
                $this->excel->getActiveSheet()->getStyle('G6:G7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G6:G7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G6:G7')->getAlignment()->setWrapText(true); 
            $this->excel->getActiveSheet()->setCellValue('H6', "Identitas Anak");
                    $this->excel->getActiveSheet()->mergeCells('H6:Y6');
                $this->excel->getActiveSheet()->getStyle('H6:H6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H6:H6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
            $this->excel->getActiveSheet()->setCellValue('H7', "Nama Anak");
                    $this->excel->getActiveSheet()->mergeCells('H7:H7');
                $this->excel->getActiveSheet()->getStyle('H7:H7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H7:H7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('H7:H7')->getAlignment()->setWrapText(true);            
            $this->excel->getActiveSheet()->setCellValue('I7', "No Induk Kependudukan");
                        $this->excel->getActiveSheet()->mergeCells('I7:I7');
                $this->excel->getActiveSheet()->getStyle('I7:I7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('I7:I7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('I7:I7')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('J7', "jenis Kelamin");
                        $this->excel->getActiveSheet()->mergeCells('J7:J7');
                $this->excel->getActiveSheet()->getStyle('J7:J7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('J7:J7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('J7:J7')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('K7', "Tempat Lahir");
                        $this->excel->getActiveSheet()->mergeCells('K7:K7');
                $this->excel->getActiveSheet()->getStyle('K7:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('K7:K7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('K7:K7')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('L7', "Tangal Lahir \n \n \n Tgl/Bln/Thn");
                        $this->excel->getActiveSheet()->mergeCells('L7:L7');
                $this->excel->getActiveSheet()->getStyle('L7:L7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('L7:L7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('L7:L7')->getAlignment()->setWrapText(true);
                $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
            $this->excel->getActiveSheet()->setCellValue('M7', "Umur");
                        $this->excel->getActiveSheet()->mergeCells('M7:M7');
                $this->excel->getActiveSheet()->getStyle('M7:M7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('M7:M7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
            $this->excel->getActiveSheet()->setCellValue('N7', "Jenis Masalah");
                        $this->excel->getActiveSheet()->mergeCells('N7:N7');
                $this->excel->getActiveSheet()->getStyle('N7:N7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('N7:N7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('N7:N7')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('O7', "Keadaan Orang Tua");
                        $this->excel->getActiveSheet()->mergeCells('O7:O7');
                $this->excel->getActiveSheet()->getStyle('O7:O7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('O7:O7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('O7:O7')->getAlignment()->setWrapText(true); 
            $this->excel->getActiveSheet()->setCellValue('P7', "Apakah Anak Memiliki Akte Kelahiran Dari Kantor Catatan Sipil? Apakah Saya Bisa Melihatnya?");
                        $this->excel->getActiveSheet()->mergeCells('P7:P7');
                $this->excel->getActiveSheet()->getStyle('P7:P7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('P7:P7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('P7:P7')->getAlignment()->setWrapText(true);
                $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
            $this->excel->getActiveSheet()->setCellValue('Q7', "Dimanakah Anak Tinggal?\n \n \n (1.Panti) (2.Keluarga)");
                        $this->excel->getActiveSheet()->mergeCells('Q7:Q7');
                $this->excel->getActiveSheet()->getStyle('Q7:Q7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('Q7:Q7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('Q7:Q7')->getAlignment()->setWrapText(true);
                $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
            $this->excel->getActiveSheet()->setCellValue('R7', "Siapa Yang Mengasuh Anak Sebelum Masuk Panti");
                        $this->excel->getActiveSheet()->mergeCells('R7:R7');
                $this->excel->getActiveSheet()->getStyle('R7:R7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('R7:R7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('R7:R7')->getAlignment()->setWrapText(true);
                $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);           
            $this->excel->getActiveSheet()->setCellValue('S7', "Alasan Masuk Panti");
                        $this->excel->getActiveSheet()->mergeCells('S7:S7');
                $this->excel->getActiveSheet()->getStyle('S7:S7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('S7:S7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('S7:S7')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('T7', "Pendidikan Saat Ini");
                        $this->excel->getActiveSheet()->mergeCells('T7:T7');
                $this->excel->getActiveSheet()->getStyle('T7:T7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('T7:T7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('T7:T7')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('U7', "Nama Bapak");
                        $this->excel->getActiveSheet()->mergeCells('U7:U7');
                $this->excel->getActiveSheet()->getStyle('U7:U7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('U7:U7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('U7:U7')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('V7', "Nama Ibu");
                        $this->excel->getActiveSheet()->mergeCells('V7:V7');
                $this->excel->getActiveSheet()->getStyle('V7:V7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('V7:V7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('V7:V7')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('W7', "Alamat Orang Tua");
                    $this->excel->getActiveSheet()->mergeCells('W7:W7');
            $this->excel->getActiveSheet()->getStyle('W7:W7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('W7:W7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('W7:W7')->getAlignment()->setWrapText(true); 
        #endreggion header
        #region rowdata
            $data       =$this->model->get_data_fa();
            $i  	    = 8;
            $tdk_ada    ='-';
            if($data != null){
                $jk =array("L"=>"1","P"=>"2");
                foreach($data as $row){
                    $no_registrasi_santri = $row->no_registrasi;
                    
                    //get data orangTua
                        $ayah_kandung	= $this->model->get_data_orgtua($no_registrasi_santri,'ayah');
                        if ($ayah_kandung!=null) {
                            $ayah           =   $ayah_kandung->nama;
                        }else{                    
                            $ayah           =   "Tidak Diketahui";
                        }
                        $ibu_kandung			= $this->model->get_data_orgtua($no_registrasi_santri,'ibu');
                        if ($ibu_kandung!=null) {
                            $ibu           =   $ibu_kandung->nama;
                        }else{                    
                            $ibu           =    "Tidak Diketahui";
                        }

                    $this->excel->getActiveSheet()->setCellValue('A'.$i, $i-7);
                    $this->excel->getActiveSheet()->setCellValue('B'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('C'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('D'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('E'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('F'.$i, $row->alamat);
                    $this->excel->getActiveSheet()->setCellValue('G'.$i, $row->nama_donatur);
                    $this->excel->getActiveSheet()->setCellValue('H'.$i, $row->nama_lengkap);
                    $this->excel->getActiveSheet()->setCellValue('I'.$i, $row->nik);
                    $this->excel->getActiveSheet()->setCellValue('J'.$i, $jk[$row->jenis_kelamin]);
                    $this->excel->getActiveSheet()->setCellValue('K'.$i, $row->tempat_lahir);
                    $this->excel->getActiveSheet()->setCellValue('L'.$i, $row->tgl_lahir);
                    $this->excel->getActiveSheet()->setCellValue('M'.$i, $row->umur);
                    $this->excel->getActiveSheet()->setCellValue('N'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('O'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('P'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('Q'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('R'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('S'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('T'.$i, $tdk_ada);
                    $this->excel->getActiveSheet()->setCellValue('U'.$i, $ayah);
                    $this->excel->getActiveSheet()->setCellValue('V'.$i, $ibu);
                    $this->excel->getActiveSheet()->setCellValue('W'.$i, $tdk_ada);
                    
                    $i++;
                }
            }
        #endregion rowdata

		// for($col = 'A'; $col !== 'Y'; $col++) {

		//     $this->excel->getActiveSheet()
		//         ->getColumnDimension($col)
		//         ->setAutoSize(true);
		// }

		$styleArray = array(
		  'borders' => array(
		    'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THIN
		    )
		  )
		);
		$styleArray2 = array(
		  'borders' => array(
		    'allborders' => array(
		      'style' => PHPExcel_Style_Border::BORDER_THICK
		    )
		  )
		);
		$i = $i-1;
		$cell_to = "W".$i;
		$this->excel->getActiveSheet()->getStyle('A6:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('G2:G3')->applyFromArray($styleArray2);
		$this->excel->getActiveSheet()->getStyle('A1:W4')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('A4:W4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$this->excel->getActiveSheet()->getStyle('A4:W4')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='FORM A.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0');//no cache

		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
    }
    
    function export_form_b(){
        //load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('FORM A');
        
        #reggion header
		$this->excel->getActiveSheet()->setCellValue('D1', "KOP SURAT LEMBAGA KESEJAHTERAAN SOSIAL ANAK (LKSA)");
		$this->excel->getActiveSheet()->mergeCells('D1:K1');
		$this->excel->getActiveSheet()->getStyle('D1:K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('D2', "DATA PEGAWAI LEMBAGA KESEJAHTERAAN SOSIAL ANAK (LKSA)");
		$this->excel->getActiveSheet()->mergeCells('D2:K2');
		$this->excel->getActiveSheet()->getStyle('D2:K2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->setCellValue('B1', "PROPOSAL");
		$this->excel->getActiveSheet()->setCellValue('B2', "FORM B");
        $this->excel->getActiveSheet()->setCellValue('B3', "Daftar Pegawai LKSA");

            $this->excel->getActiveSheet()->getRowDimension('5')->setRowHeight(45);

            $this->excel->getActiveSheet()->setCellValue('A5', "NO");
                $this->excel->getActiveSheet()->mergeCells('A5:A5');
                $this->excel->getActiveSheet()->getStyle('A5:A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('A5:A5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->setCellValue('B5', "Nama");
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(27);
                $this->excel->getActiveSheet()->getStyle('B5:B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B5:B5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);         
            $this->excel->getActiveSheet()->setCellValue('C5', "Nomor Induk Kependudukan");
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(27);
                $this->excel->getActiveSheet()->getStyle('C5:C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C5:C5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('C5:C5')->getAlignment()->setWrapText(true); 
            $this->excel->getActiveSheet()->setCellValue('D5', "Jenis Kelamin");
                $this->excel->getActiveSheet()->getStyle('D5:D5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D5:D5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D5:D5')->getAlignment()->setWrapText(true); 
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(10); 
            $this->excel->getActiveSheet()->setCellValue('E5', "Tempat Lahir");
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getStyle('E5:E5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E5:E5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('E5:E5')->getAlignment()->setWrapText(true); 
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(11);
            $this->excel->getActiveSheet()->setCellValue('F5', "Tanggal Lahir");
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
                $this->excel->getActiveSheet()->getStyle('F5:F5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F5:F5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F5:F5')->getAlignment()->setWrapText(true); 
            $this->excel->getActiveSheet()->setCellValue('G5', "Mulai Bekerja Di Panti");
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
                $this->excel->getActiveSheet()->getStyle('G5:G5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G5:G5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G5:G5')->getAlignment()->setWrapText(true); 
            $this->excel->getActiveSheet()->setCellValue('H5', "Jabatan");
                $this->excel->getActiveSheet()->getStyle('H5:H5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('H5:H5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);          
            $this->excel->getActiveSheet()->setCellValue('I5', "Status Kepegawaian");
                $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(13);
                $this->excel->getActiveSheet()->getStyle('I5:I5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('I5:I5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('I5:I5')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('J5', "Latar Belakang Pendidikan Terakhir");
                $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
                $this->excel->getActiveSheet()->getStyle('J5:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('J5:J5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('J5:J5')->getAlignment()->setWrapText(true);
            $this->excel->getActiveSheet()->setCellValue('K5', "Pelatihan Yang Pernah Diikuti");
                $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(27);
                $this->excel->getActiveSheet()->getStyle('K5:K5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('K5:K5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                $this->excel->getActiveSheet()->getStyle('K5:K5')->getAlignment()->setWrapText(true);
        #endreggion header
        #region rowdata
            // $data       =$this->model->get_data_fa();
            // $i  	    = 8;
            // $tdk_ada    ='-';
            // if($data != null){
            //     $jk =array("L"=>"1","P"=>"2");
            //     foreach($data as $row){
            //         $no_registrasi_santri = $row->no_registrasi;
                    
            //         //get data orangTua
            //             $ayah_kandung	= $this->model->get_data_orgtua($no_registrasi_santri,'ayah');
            //             if ($ayah_kandung!=null) {
            //                 $ayah           =   $ayah_kandung->nama;
            //             }else{                    
            //                 $ayah           =   "Tidak Diketahui";
            //             }
            //             $ibu_kandung			= $this->model->get_data_orgtua($no_registrasi_santri,'ibu');
            //             if ($ibu_kandung!=null) {
            //                 $ibu           =   $ibu_kandung->nama;
            //             }else{                    
            //                 $ibu           =    "Tidak Diketahui";
            //             }

            //         $this->excel->getActiveSheet()->setCellValue('A'.$i, $i-7);
            //         $this->excel->getActiveSheet()->setCellValue('B'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('C'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('D'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('E'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('F'.$i, $row->alamat);
            //         $this->excel->getActiveSheet()->setCellValue('G'.$i, $row->nama_donatur);
            //         $this->excel->getActiveSheet()->setCellValue('H'.$i, $row->nama_lengkap);
            //         $this->excel->getActiveSheet()->setCellValue('I'.$i, $row->nik);
            //         $this->excel->getActiveSheet()->setCellValue('J'.$i, $jk[$row->jenis_kelamin]);
            //         $this->excel->getActiveSheet()->setCellValue('K'.$i, $row->tempat_lahir);
            //         $this->excel->getActiveSheet()->setCellValue('L'.$i, $row->tgl_lahir);
            //         $this->excel->getActiveSheet()->setCellValue('M'.$i, $row->umur);
            //         $this->excel->getActiveSheet()->setCellValue('N'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('O'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('P'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('Q'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('R'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('S'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('T'.$i, $tdk_ada);
            //         $this->excel->getActiveSheet()->setCellValue('U'.$i, $ayah);
            //         $this->excel->getActiveSheet()->setCellValue('V'.$i, $ibu);
            //         $this->excel->getActiveSheet()->setCellValue('W'.$i, $tdk_ada);
                    
            //         $i++;
            //     }
            // }
            #endregion rowdata
         $i = 7;  
         $ittd = $i+4; 
            $this->excel->getActiveSheet()->setCellValue('J'.$ittd, "TANDA TANGAN KEPALA LKSA");
                $this->excel->getActiveSheet()->mergeCells('J'.$ittd.':K'.$ittd);
                $this->excel->getActiveSheet()->getStyle('J'.$ittd.':K'.$ittd)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('J'.$ittd.':K'.$ittd)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $ictt = $i;
            $this->excel->getActiveSheet()->setCellValue('B'.$ictt, "Catatan:");
                $this->excel->getActiveSheet()->mergeCells('B'.$ictt.':C'.$ictt);
                $this->excel->getActiveSheet()->getStyle('B'.$ictt.':C'.$ictt)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                $this->excel->getActiveSheet()->getStyle('B'.$ictt.':C'.$ictt)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $istt = $i+2;
            $this->excel->getActiveSheet()->setCellValue('B'.$istt, "*)Status Kepegawaian: 1.Tetap; 2.Kontrak; 3.Relawan");
                $this->excel->getActiveSheet()->mergeCells('B'.$istt.':D'.$istt);
                $this->excel->getActiveSheet()->getStyle('B'.$istt.':D'.$istt)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B'.$istt.':D'.$istt)->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            
                // for($col = 'A'; $col !== 'Y'; $col++) {
                
                //     $this->excel->getActiveSheet()
                //         ->getColumnDimension($col)
            //         ->setAutoSize(true);
            // }
            
            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                        )
                        )
                    );
                    $styleArray2 = array(
                        'borders' => array(
                            'allborders' => array(
                                'style' => PHPExcel_Style_Border::BORDER_THICK
                                )
                                )
                            );
                            
		$i = $i-1;
		$cell_to = "K".$i;
		$this->excel->getActiveSheet()->getStyle('A5:'.$cell_to)->applyFromArray($styleArray);
		$this->excel->getActiveSheet()->getStyle('B1:B2')->applyFromArray($styleArray2);
		$this->excel->getActiveSheet()->getStyle('D1:K1')->getFont()->setBold(true);
		// $this->excel->getActiveSheet()->getStyle('A4:Y4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		// $this->excel->getActiveSheet()->getStyle('A4:Y4')->getFill()->getStartColor()->setRGB('2CC30B');

		$filename='FORM B.xls'; //save our workbook as this file name
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

	

	