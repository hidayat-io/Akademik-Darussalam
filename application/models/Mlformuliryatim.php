<?php

class Mlformuliryatim extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

	#region PRINT lformuliryatim
  function query_get_data_santri_aitam($no_registrasi) {
		
    $data_santri = array();
    $data_santri=$this->db->query("SELECT a.no_registrasi,a.nama_lengkap, a.tempat_lahir, DATE_FORMAT(a.tgl_lahir,'%d-%m-%Y') AS tgllahir, a.jenis_kelamin, a.kewarganegaraan, a.jalan, a.no_rumah, a.dusun, a.kecamatan, 
                                    a.kabupaten, a.provinsi, a.kd_pos, a.no_tlp, a.no_hp, b.id_donatur, c.nama_donatur
                                    FROM ms_santri a
                                    INNER JOIN ms_santri_donatur b ON a.no_registrasi = b.no_registrasi
                                    INNER JOIN ms_donatur c ON b.id_donatur = c.id_donatur
                                    WHERE a.no_registrasi='$no_registrasi'")->result_array();
                                    // var_dump($data_santri);
                                    // exit();


         $output ='';                                                                   
    foreach ($data_santri as $row_dsantri) {

            $data_sekolah=$this->db->query("SELECT kelas
                                        FROM  ms_santri_sekolah 
                                        WHERE no_registrasi='$no_registrasi' limit 1 ")->row_array();

            $data_ayah=$this->db->query("SELECT *
                                        FROM  ms_keluarga 
                                        WHERE ms_keluarga.no_registrasi='$no_registrasi' AND ms_keluarga.kategori='AYAH' ")->row_array();

            $data_ibu=$this->db->query("SELECT *
                                        FROM  ms_keluarga 
                                        WHERE ms_keluarga.no_registrasi='$no_registrasi' AND ms_keluarga.kategori='IBU' ")->row_array();
            if ($data_ibu['status_perkawinan'] != 'WAFAT'){
                $tgl_ibu_wafat = '-';
            }else{
                
                $tgl_ibu_wafat = $data_ibu['tgl_wafat'];
            }
        $output .='
            <body>
                <table width="100%" >
                    <tr>
                        <td align="center" valign="middle" >
                            <span class="title-2" style="font-size:12px" > 
                                KAMPUNG SOSIAL YM. SYAIKH SHABAH AL-AHMAD<br>
                                PONDOK PESANTREN DARUSSALAM - GARUT INDONESIA<br>
                                Rasulullah SAW Bersabda:<br>
                                <i>"Saya Bersama Penanggung Yatim Yatim Seperti Dua Jari Ini Di Surga"</i><br>
                                <span style="font-size:20px">FORMULIR YATIM</span><br>
                            </span>								
                        </td>                    
                    </tr>                
                </table>
                <table style="font-size: 13px" border="0" width="100%" cellpadding="5">
                        <tr>
                            <td colspan="3" align="right" >
                                No. Yatim : '.$row_dsantri['no_registrasi'].'
                            </td>                       
                            </tr>                   
                        <tr>
                            <td width="35%" align="left" >
                                Nama Kafl/Bapak Asuh
                            </td>                       
                            <td width="1%" align="left" >
                                :
                            </td>                       
                            <td width="100%" align="left" >
                                '.$row_dsantri['nama_donatur'].'
                            </td>
                            <tr>
                            <td align="left" >
                                Nama Yatim
                            </td>                       
                            <td align="left" >
                                :
                            </td>                       
                            <td align="left" >
                                '.$row_dsantri['nama_lengkap'].'
                            </td>                       
                        </tr>                   
                        <tr>
                            <td align="left" >
                                Tempat Tanggal Lahir
                            </td>                       
                            <td align="left" >
                                :
                            </td>                       
                            <td align="left" >
                                '.$row_dsantri['tgllahir'].'
                            </td>                       
                        </tr>                   
                        <tr>
                            <td align="left" >
                                Jenis Kelamin
                            </td>                       
                            <td align="left" >
                                :
                            </td>                       
                            <td align="left" >
                                '.$row_dsantri['jenis_kelamin'].'
                            </td>                       
                        </tr>                   
                        <tr>
                            <td align="left" >
                                Kewarganegaraan
                            </td>                       
                            <td align="left" >
                                :
                            </td>                       
                            <td align="left" >
                                '.$row_dsantri['kewarganegaraan'].'
                            </td>                       
                        </tr>                   
                        <tr>
                            <td align="left" >
                                Kondisi Kesehatan
                            </td>                       
                            <td align="left" >
                                :
                            </td>                       
                            <td align="left" >
                                -
                            </td>                       
                        </tr>                   
                        <tr>
                            <td align="left" >
                                Kondisi Kejiwaan
                            </td>                       
                            <td align="left" >
                                :
                            </td>                       
                            <td align="left" >
                                -
                            </td>                       
                        </tr>
                        <tr>
                            <td align="left" >
                                Kelas
                            </td>                       
                            <td align="left" >
                                :
                            </td>                       
                            <td align="left" >
                                '.$data_sekolah['kelas'].'
                            </td>                       
                        </tr>                   
                        <tr>
                            <td align="left" valign="top">
                                Alamat Rumah
                            </td>                       
                            <td align="left" >
                                :
                            </td>                       
                                                <td align="left" >
                                '.$row_dsantri['jalan'].' '.$row_dsantri['no_rumah'].' '.$row_dsantri['dusun'].' '.$row_dsantri['kecamatan'].' '.$row_dsantri['kabupaten'].' '.$row_dsantri['provinsi'].'<br> Kode pos: '.$row_dsantri['kd_pos'].' Telp/HP: '.$row_dsantri['no_tlp'].'/ '.$row_dsantri['no_hp'].'
                            </td>                       
                        </tr>                          
                        </tr>                   
                                        
                        </table>
                <br>
                <br>
                <table  border="0" cellpadding="5" width="100%" style="font-size: 13px">
                        <tr>
                            <td width="15%" align="left" >
                                Nama Ayah
                            </td>
                                
                            <td width="1%" align="left" >
                                :
                            </td>
                            <td width="25%" align="left" >
                                '.$data_ayah['nama'].'
                            </td>
                            <td width="15%" align="right" >
                                Tanggal Meninggal
                            </td>
                            <td width="1%" align="left" >
                                :
                            </td>
                            <td width="25%" align="left" >
                                '.$data_ayah['tgl_wafat'].'
                            </td>
                        </tr>
                        <tr>
                            <td width="15%" align="left" >
                                Nama Ibu
                            </td>
                                
                            <td width="1%" align="left" >
                                :
                            </td>
                            <td width="25%" align="left" >
                                 '.$data_ibu['nama'].'
                            </td>
                            <td width="15%" align="right" >
                                Pekerjaan Ibu
                            </td>
                            <td width="1%" align="left" >
                                :
                            </td>
                            <td width="25%" align="left" >
                                '.$data_ibu['pekerjaan'].'
                            </td>
                        </tr><tr>
                            <td width="15%" align="left" >
                                Status Sosial Ibu
                            </td>
                                
                            <td width="1%" align="left" >
                                :
                            </td>
                            <td width="25%" align="left" >
                                -
                            </td>
                            <td width="15%" align="right" >
                                Tanggal Meninggal Ibu <span style="font-size:8px">( Jika Tlh Meninggal)</span>
                            </td>
                            <td width="1%" align="left" >
                                :
                            </td>
                            <td width="25%" align="left" >
                                '.$tgl_ibu_wafat.'
                            </td>
                        </tr><tr>
                            <td width="15%" align="left" >
                                Jumlah Saudara Yatim
                            </td>
                                
                            <td width="1%" align="left" >
                                :
                            </td>
                            <td width="25%" align="left" >
                                -
                            </td>
                            <td width="15%" align="right" >
                                Urutan Dalam Keluarga
                            </td>
                            <td width="1%" align="left" >
                                :
                            </td>
                            <td width="25%" align="left" >
                                -
                            </td>
                        </tr><tr>
                            <td colspan="6"width="15%" align="left" >
                                <ul>
                                    <li>Seluruh Yatim Tinggal Dalam Asrama.</li>
                                    <li>Laporan Akan dilakukan 2 kali dalam setahun.</li>
                                    <li>Apabila ada yatim yang keluar, maka kafalah akan dialihkan kepada yatim yang lain,
                                    dan akan dilakukan pemberitahuan kepada kafil.</li>
                                </ul>
                            </td>                    
                        </tr>
                        <tr>
                            <td colspan="6"width="15%" align="center" >
                                <i><b>Keikhlasan Adalah Jiwa Setiap Pekerjaan</b></i>
                            </td>
                        </tr>
                    </table>
                    <table border="0" cellpadding="25" width="100%" style="font-size: 13px">
                        <tr>
                            <td align="center" valign="top">
                                
                            </td>
                            <td>
                            
                            </td>
                            <td align="center" valign="top">
                                Direktur Yayasan
                            </td>
                        </tr>                
                        <tr>
                            <td align="center" valign="bottom">

                            </td>
                            <td>
                            
                            </td>
                            <td align="center" valign="bottom">
                                    Ahmad Muhammad Yusuf Al-Houli
                            </td>
                        </tr>              
                    </table>
                    <br>															
            </body>
        ';
    }
    
    return $output;
				
    }
}
