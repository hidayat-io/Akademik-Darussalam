<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		
		@page { margin: 25px; }

		body{

			font-family: Helvetica;
			margin: 0px 10px;
		}

        .thumb-image{
            float:right;
            width:150px;
            position:relative;
            padding:5px;
            }

		table{		
			
			font-size: 11px;
			border-collapse:collapse;			
		}

		td, th{
	    
		}

		.main-title, .main-title-small{

			font-family: Times New Roman; 
			color: red;
			font-weight: bold;
			font-size: 32px;
		}

		.main-title-small{

			font-size: 24px;
		}

		.title-2{

			font-size: 20px;
			font-weight: bold;
		}

		.title-3{

            font-size: 12px;
            font-weight: bold;			
		}

		table .tb-kepada1 td, th{

			font-size: 12px;	
            border-collapse:collapse;
            margin-top:10px;
            font-weight: bold;
            padding: 5px;	
		}
		table .tb-kepada2 td{

			font-size: 12px;	
            border-collapse:collapse;
            margin-top:10px;
            font-weight: bold;	
		}

		table .body_tengah tr{

			padding: 80px;
            font-size: 100px;
		}

		.tb-item td{

			padding: 2px;
		}

		.tb-item th{

			font-size: 12px;
		}        

		/*cell border css*/
		.border-full{
			
			border-top: 1px solid black;
			border-right: 1px solid black;
			border-bottom: 1px solid black;
			border-left: 1px solid black;
		}

		.border-rl{
			
			border-right: 1px solid black;			
			border-left: 1px solid black;
		}

		.border-rbl{
			
			border-right: 1px solid black;
			border-bottom: 1px solid black;
			border-left: 1px solid black;
		}
		
		.grid-container {
		  display: grid;
		  grid-template-columns: auto auto auto;
		  background-color: #FFFFFF;
		  padding: 1px;
		}
		.grid-item {
		  border: 1px solid rgba(0, 0, 0, 0.8);
		  padding: 2px;
		  font-size: 30px;
		  text-align: left;
		}
        p{ 
            text-indent: 30px;
            text-align: justify;
            text-justify: inter-word;
            }

	</style>
	<title>SURAT PERMOHONAN KAFALAH <?PHP echo $data_santri[0]['no_registrasi'];?> - <?php echo $data_santri[0]['nama_lengkap']; ?></title>
</head>
    <body>
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
                        <img src="<?php echo base_url();?>assets/images/fileupload/santri/1gonO4EeLr2w5DVlRld3.jpg" class="thumb-image" border="1">
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
                            <i>Assalammua'alaikum Warahmatulohi Wabarokaatuh</i>
                        </span>
                    </td>
                </tr>
            </table>
            <table style="font-size: 13px" border="0" width="100%" cellpadding="2">
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
                        
                    </td>
                    <tr>
                    <td align="left" >
                        Tempat/Tgl. Lahir
                    </td>                       
                    <td align="left" >
                        :
                    </td>                       
                    <td align="left" >
                        
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
                                <li>Bersungguh-sungguh dalam menjalani pendidikan dan menuntut ilmu pengetahuan dengan niat ibadah lillahi ta'ala</li>
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
                        Demikianlah surat permohonan ini saya buat semoga Allah SWT senantiasa berkenan melimpahkan taufiq, hidayah, ridho dan 'inayah-Nya lepada kita sekalian, Aamiin
                        <br>
                        <i>Wassalamu'alaikum Warahmatulohi Wabarokaatuh</i>
                    </td>
                </tr>
                <tr> 
                    <td width="90%" align="right" >
                        Darul-Aitam, tgl
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
                        (wali)<br>
                        Nama Lengkap dan jelas
                    </td>
                    <td>
                    
                    </td>
                    <td align="center" valign="bottom">
                         (pemohon)<br>
                        Nama Lengkap dan jelas
                    </td>
                </tr>
                 <tr>
                    <td colspan="3" align="center" valign="top"> Mengetahui,<br>
                        Pimpinan Pondok Pesantren
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center" valign="bottom">(KH. Asep Sholahudin Mut'thie, BA)
                    </td>
                </tr>                
            </table>
                <br>
            <span style="margin-left: 40px" class="title-3">
            
            </span>																
    </body>
</html>