<?php

class Mlsuratpermohonan extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}
  function get_thn_ajar(){
		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran order by id desc Limit 3 ");
		// $data = $this->db->query ("SELECT * FROM ms_tahun_ajaran where kategori='UTAMA' order by id desc Limit 2 ");
		return $data;
    }
    
  function get_kurikulum($id) {
		$this->db->where('id',$id);
		return $this->db->get('ms_tahun_ajaran')->row();
	}

	#region PRINT lsuratpermohonan
  function query_get_data_santri_aitam($no_registrasi) {
		
		$data_santri = array();
        $data_santri=$this->db->query("SELECT ms_santri.nama_lengkap, ms_santri.tempat_lahir, DATE_FORMAT(ms_santri.tgl_lahir,'%d-%m-%Y') as tgllahir, ms_santri.jalan, ms_santri.no_rumah, ms_santri.dusun, ms_santri.kecamatan, 
																				ms_santri.kabupaten, ms_santri.provinsi, ms_santri.kd_pos, ms_santri.no_tlp, ms_santri.no_hp, ms_santri.lamp_photo,ms_santri_sekolah.kelas, ms_keluarga.kategori, ms_keluarga.nama
																				FROM ms_santri
																				INNER JOIN ms_santri_sekolah ON ms_santri.no_registrasi = ms_santri_sekolah.no_registrasi
																				LEFT JOIN ms_keluarga ON ms_santri.no_registrasi = ms_keluarga.no_registrasi AND ms_keluarga.kategori='WALI' 
																				WHERE ms_santri.no_registrasi='$no_registrasi'")->row_array();

				$data_ayah=$this->db->query("SELECT ms_keluarga.kategori, ms_keluarga.nama,ms_keluarga.status
																				FROM  ms_keluarga 
																				WHERE ms_keluarga.no_registrasi='$no_registrasi' AND ms_keluarga.kategori='AYAH' ")->row_array();

				$data_ibu=$this->db->query("SELECT ms_keluarga.kategori, ms_keluarga.nama, ms_keluarga.status
																				FROM  ms_keluarga 
																				WHERE ms_keluarga.no_registrasi='$no_registrasi' AND ms_keluarga.kategori='IBU' ")->row_array();

				if ($data_santri['nama'] != null)
				{
					$wali = $data_santri['nama'];

				}elseif ($data_ayah['nama'] != null)
				{
					$wali = $data_ayah['nama'];

				}elseif ($data_ibu['nama'] != null)
				{
					$wali = $data_ibu['nama'];

				}else{
					$wali = '-';
				}

				if ($data_ibu['status'] != 'WAFAT'){
					$status = 'YATIM';
				}elseif ($data_ibu['status'] == ''){
					$status = 'YATIM';
				}else{
					$status = 'YATIM PIATU';
				}
				$output ='
					<table width="100%">
                <tr>
                    <td align="center" valign="middle">
                        <span class="title-2" style="font-size:15px"> 
                            PONDOK PESANTREN YATIM PIATU<br>
                            <span style="font-size:40px">DARUL-AITAM</span><br>
                            SINDANG SARI KERSAMANAH GARUT JAWA BARAT</span>								
                    </td>                    
                </tr>                
            </table>
            <hr>
            <table border="0" width="100%">
                <tr>
                    <td align="left" valign="middle">
                        
                    </td>
                    <td width="35%" align="center" valign="middle">
                        <span style="font-size:12" class="title-2"> 
                        SURAT PERMOHONAN<br>
                        MENDAPATKAN KAFALAH<br>
                        </span>
                    </td>
                    <td rowspan="3" align="center" valign="middle">
                        <img src="'.base_url().'assets/images/fileupload/santri/'.$data_santri['lamp_photo'].'" class="thumb-image" border="1">
                    </td>
                </tr>
                <tr>                       
                    <td align="left" valign="top">
                    </td>
                    <td align="left" valign="top">
                        <span style="font-size:12" class="title-2"> 
                        NO:</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="left" valign="middle">
                        <span style="font-size: 15px">
                            Kepada yang terhormat:<br>
                            Bapak Pimpinan Pondok Pesantren<br>
                            Yatim Piatu Darul-Aitam<br>
                            DI- TEMPAT<br>
                            <i>Bismillahirrahmaanirrahim,</i><br>
                            <i>Assalammua?alaikum Warahmatulohi Wabarokaatuh</i>
                        </span>
                    </td>
                </tr>
            </table>
            <table style="font-size: 13px" border="0" width="100%" cellpadding="1">
                <tr>
                    <td colspan="3" align="left" >
                        Saya yang bertanda tangan dibawah ini :
                    </td>                       
                    </tr>                   
                <tr>
                    <td width="35%" align="left" >
                        Nama Lengkap
                    </td>                       
                    <td width="1%" align="left" >
                        :
                    </td>                       
                    <td width="100%" align="left" >
                        '.$data_santri['nama_lengkap'].'
                    </td>
                    <tr>
                    <td align="left" >
                        Tempat/Tgl. Lahir
                    </td>                       
                    <td align="left" >
                        :
                    </td>                       
                    <td align="left" >
                        '.$data_santri['tgllahir'].'
                    </td>                       
                </tr>                   
                <tr>
                    <td align="left" >
                        Pendidikan/Kelas
                    </td>                       
                    <td align="left" >
                        :
                    </td>                       
                    <td align="left" >
                        '.$data_santri['kelas'].'
                    </td>                       
                </tr>                   
                <tr>
                    <td align="left" >
                        Status
                    </td>                       
                    <td align="left" >
                        :
                    </td>                       
                    <td align="left" >
                        '.$status.'
                    </td>                       
                </tr>                   
                <tr>
                    <td align="left" >
                        Orang Tua/Wali
                    </td>                       
                    <td align="left" >
                        :
                    </td>                       
                    <td align="left" >
                        '.$wali.'
                    </td>                       
                </tr>                   
                <tr>
                    <td align="left" >
                        Alamat Rumah
                    </td>                       
                    <td align="left" >
                        :
                    </td>                       
										<td align="left" >
                        '.$data_santri['jalan'].' '.$data_santri['no_rumah'].' '.$data_santri['dusun'].' '.$data_santri['kecamatan'].' '.$data_santri['kabupaten'].' '.$data_santri['provinsi'].'<br> Kode pos: '.$data_santri['kd_pos'].' Telp/HP: '.$data_santri['no_tlp'].'/ '.$data_santri['no_hp'].'
                    </td>                       
                </tr>                          
                </tr>                   
                                
                </table>
            <table  border="0" cellpadding="0" width="100%" style="font-size: 13px">
                <tr>
                    <td colspan="2" style="margin:0;" >
                        <div class="grid_12 rounded_corners" id="container">
                            <p>
                            Memohon kepada Bapak Pimpinan Pondok Pesantren Yatim Piatu Darul-Aitam agar diajukan untuk mendapatkan kafalah (Beasiswa Pendidikan) kepada Donatur/Muhsinin dimanapun
                            mereka berada, selanjutnya demi keberhasilan saya nanti mendapatkan kafalah saya berjanji denan setulus hati:
                            <ol type="A" style="margin:0;">
                                <li>Bersungguh-sungguh dalam menjalani pendidikan dan menuntut ilmu pengetahuan dengan niat ibadah lillahi ta&#39ala</li>
                                <li>Mentaati dan mematuhi kebijakan Bapak Pimpinan beserta segenap pembantunya dengan melaksanakan disiplin dan sunnah pondok antara lain: </li>
                                <li>Bermukim di asrama untuk mengikuti seluruh kegiatan Pondok dan tidak sering bepergian selama berlangsungnya proses pendidikan dan pelajaran.</li>
                                <li>Memperbaiki, memelihara dan meningkatkan kepribadian sebagai seorang muslim/muslimah dengan al-akhlakul karimah sehingga mencerminkan uswah hasanah.</li>
                                <li>Bersedia untuk diputus kafalah dan merelakannya untuk yatim lain bilamana saya melakukan pelanggaran disiplin yang berat.</li>
                            </ol> 
                            </p>
                        </div>
                    </td>
                </tr>
                <tr> 
                    <td colspan="2" valign="top">
                        Demikianlah surat permohonan ini saya buat semoga Allah SWT senantiasa berkenan melimpahkan taufiq, hidayah, ridho dan &#39inayah-Nya lepada kita sekalian, Aamiin
                        <br>
                        <i>Wassalamualaikum Warahmatulohi Wabarokaatuh</i>
                    </td>
                </tr>
                <tr> 
                    <td width="90%" align="right" >
                        Darul-Aitam, tgl '.date("d M Y").'
                    </td>
                    <td width="10%" align="right" >
                    </td>
                </tr>
            </table>
            <table border="0" cellpadding="25" width="100%" style="font-size: 13px">
                <tr>
                    <td align="center" valign="top">
                        Wali Yatim/Yatimah
                    </td>
                    <td>
                    
                    </td>
                    <td align="center" valign="top">
                        Pemohon<br>
                        Yatim/Yatimah
                    </td>
                </tr>                
                <tr>
                    <td align="center" valign="bottom">
                        ('.$wali.')<br>
                        Nama Lengkap dan jelas
                    </td>
                    <td>
                    
                    </td>
                    <td align="center" valign="bottom">
                         ('.$data_santri['nama_lengkap'].')<br>
                        Nama Lengkap dan jelas
                    </td>
                </tr>
                 <tr>
                    <td colspan="3" align="center" valign="top"> Mengetahui,<br>
                        Pimpinan Pondok Pesantren
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" valign="bottom">(KH. Asep Sholahudin Mut&#39thie, BA)
                    </td>
                </tr>                
            </table>
                <br>
				';
		return $output;
    }
}
