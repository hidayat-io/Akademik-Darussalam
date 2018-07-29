<?php

class Mrapor extends CI_Model 
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

	#region PRINT RAPOR
  function get_data_byidkelas($hide_Kurikulum,$semester,$id_kelas) {
		
		$data_santri = array();
		$data_santri=$this->db->query("SELECT trans_daftar_ulang.id_thn_ajar,ms_tahun_ajaran.deskripsi, ms_santri.kel_sekarang, ms_kelasdt.nama, trans_daftar_ulang.no_registrasi,ms_santri.nama_lengkap,ms_santri.no_stambuk, trans_walikelas.id_guru, ms_guru.nama_lengkap as nama_lengkap_guru
																		from trans_daftar_ulang
																		inner join ms_tahun_ajaran on trans_daftar_ulang.id_thn_ajar = ms_tahun_ajaran.id
																		inner join ms_santri on trans_daftar_ulang.no_registrasi  = ms_santri.no_registrasi and ms_santri.kel_sekarang = '$id_kelas'
																		inner join ms_kelasdt on ms_santri.kel_sekarang = ms_kelasdt.kode_kelas
																		inner join trans_walikelas on ms_santri.kel_sekarang =  trans_walikelas.kode_kelas and trans_walikelas.id_thn_ajar='$hide_Kurikulum'
																		inner join ms_guru on trans_walikelas.id_guru = ms_guru.id_guru
																		where trans_daftar_ulang.id_thn_ajar = '$hide_Kurikulum'")->result_array();
		if($semester=='1'){
			$ujian = "UJIAN PERTENGAHAN TAHUN";
		}else{
			$ujian = "UJIAN AKHIR TAHUN";
		}
		$output ='';
		foreach ($data_santri as $row_data_santri) {;
						$output .='	
												<body>
													<table width="100%">
														<tr>
															<td align="left" valign="middle">
																<span class="title-2"> 
																	RAPORT NILAI EVALUASI MURNI<br>
																	'.$ujian.'<br>
																	TAHUN PEMBELAJARAN '.$row_data_santri['deskripsi'].'</span>														
															
															</td>
														</tr>
													</table>
														<table class="tb-kepada" width="100%">
																	<tr>
																		<td align="left">Nama	: '.$row_data_santri['nama_lengkap'].'</td>
																		<td></td>
																		<td align="left">Wali	: '.$row_data_santri['nama_lengkap_guru'].'</td>
																	</tr>
																	<tr>
																		<td align="left">NO Stambuk	: '.$row_data_santri['no_stambuk'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kelas	: '.$row_data_santri['kel_sekarang'].' - '.$row_data_santri['nama'].'</td>
																		<td align="left"></td>
																		<td align="left">Konsulat:</td>
																	</tr>
																</table>
													<table width="100%" class="tb-item">
															<tr>
																<th class="border-full" rowspan="2" style="vertical-align:middle; text-align:center"> No </th>
																<th class="border-full" rowspan="2" style="vertical-align:middle; text-align:center"> BIDANG STUDI </th>
																<th class="border-full" rowspan="2" style="vertical-align:middle; text-align:center" width="10%" wrap> BATAS MINIMAL </th>
																<th class="border-full" colspan="2" style="vertical-align:middle; text-align:center"  width="20%"> NILAI </th>
															</tr>
															<tr>
																<th class="border-full" style="vertical-align:middle; text-align:center"  width="10%"> ANGKA </th>
																<th class="border-full"  style="vertical-align:middle; text-align:center"  width="10%"> HURUF </th>
															</tr>															
					';
				$data_bidang = array();
				$data_bidang=$this->db->query("SELECT id_bidang, nama_bidang, kategori FROM ms_bidang_study 
															where id_bidang in (select id_bidang 
															from ms_mata_pelajaran 
															inner join trans_kurikulum on ms_mata_pelajaran.id_matpal = trans_kurikulum.id_mapel)
															 order by id_bidang,kategori,nama_bidang desc ")->result_array();
															// inner join trans_kurikulum on ms_mata_pelajaran.id_matpal = trans_kurikulum.id_mapel and trans_kurikulum.kategori='UTAMA')")->result_array();
				// return $data;

																$no =1; 
				foreach ($data_bidang as $row_data_bidang) {;

																$output .='
																	<tr>
																		<td class="border-rbl" colspan="5" align="center" style="font-weight:bold"> '.$row_data_bidang['nama_bidang'].'</td>
																	</tr>																	
																';

																$data_matpal = array();
																$data_matpal = $this->db->query("SELECT ms_mata_pelajaran.id_bidang,ms_mata_pelajaran.nama_matpal, trans_rapor.nilai
																																		from ms_mata_pelajaran
																																		left join trans_rapor on ms_mata_pelajaran.id_matpal = trans_rapor.id_mapel and trans_rapor.id_thn_ajar = '".$hide_Kurikulum."' and trans_rapor.semester ='".$semester."' and trans_rapor.no_registrasi='".$row_data_santri['no_registrasi']."' 
																																		where id_bidang='".$row_data_bidang['id_bidang']."'")->result_array();

																	foreach ($data_matpal as $row_data_matpal) {
																		if($row_data_matpal['nilai']==''){
																			$nilai = '0';
																		}else{
																			$nilai = $row_data_matpal['nilai'];
																		}
																		$output .=
																		'
																			<tr>
																				<td class="border-rbl" width="2" align="center" >'.$no++.'</td>
																				<td class="border-rbl">'.$row_data_matpal['nama_matpal'].'</td>
																				<td class="border-rbl" width="10%" align="center" >50</td>
																				<td class="border-rbl" width="10%" align="center" >'.$nilai.'</td>
																				<td class="border-rbl" width="10%" align="center" >'.terbilang($row_data_matpal['nilai']).'</td>
																			</tr>																	
																		';
																};
															};
															$output .='
																</table>
																<span style="margin-left: 40px" class="title-3">
																
																</span>																
														</body>
															';	
			};																	
			return $output;
	}

  function get_data_byidnoregistrasi($hide_Kurikulum,$semester,$no_registrasi) {
		
		$data_santri = array();
		$data_santri=$this->db->query("SELECT trans_daftar_ulang.id_thn_ajar,ms_tahun_ajaran.deskripsi, ms_santri.kel_sekarang, ms_kelasdt.nama, trans_daftar_ulang.no_registrasi,ms_santri.nama_lengkap,ms_santri.no_stambuk, trans_walikelas.id_guru, ms_guru.nama_lengkap as nama_lengkap_guru
																		from trans_daftar_ulang
																		inner join ms_tahun_ajaran on trans_daftar_ulang.id_thn_ajar = ms_tahun_ajaran.id
																		inner join ms_santri on trans_daftar_ulang.no_registrasi  = ms_santri.no_registrasi
																		inner join ms_kelasdt on ms_santri.kel_sekarang = ms_kelasdt.kode_kelas
																		inner join trans_walikelas on ms_santri.kel_sekarang =  trans_walikelas.kode_kelas and trans_walikelas.id_thn_ajar='$hide_Kurikulum'
																		inner join ms_guru on trans_walikelas.id_guru = ms_guru.id_guru
																		where trans_daftar_ulang.id_thn_ajar = '$hide_Kurikulum' and trans_daftar_ulang.no_registrasi='$no_registrasi'")->result_array();
		if($semester=='1'){
			$ujian = "UJIAN PERTENGAHAN TAHUN";
		}else{
			$ujian = "UJIAN AKHIR TAHUN";
		}
		$output ='';
		foreach ($data_santri as $row_data_santri) {;
						$output .='	
												<body>
													<table width="100%">
														<tr>
															<td align="left" valign="middle">
																<span class="title-2"> 
																	RAPORT NILAI EVALUASI MURNI<br>
																	'.$ujian.'<br>
																	TAHUN PEMBELAJARAN '.$row_data_santri['deskripsi'].'</span>														
															
															</td>
														</tr>
													</table>
														<table class="tb-kepada" width="100%">
																	<tr>
																		<td align="left">Nama	: '.$row_data_santri['nama_lengkap'].'</td>
																		<td></td>
																		<td align="left">Wali	: '.$row_data_santri['nama_lengkap_guru'].'</td>
																	</tr>
																	<tr>
																		<td align="left">NO Stambuk	: '.$row_data_santri['no_stambuk'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kelas	: '.$row_data_santri['kel_sekarang'].' - '.$row_data_santri['nama'].'</td>
																		<td align="left"></td>
																		<td align="left">Konsulat:</td>
																	</tr>
																</table>
													<table width="100%" class="tb-item">
															<tr>
																<th class="border-full" rowspan="2" style="vertical-align:middle; text-align:center"> No </th>
																<th class="border-full" rowspan="2" style="vertical-align:middle; text-align:center"> BIDANG STUDI </th>
																<th class="border-full" rowspan="2" style="vertical-align:middle; text-align:center" width="10%" wrap> BATAS MINIMAL </th>
																<th class="border-full" colspan="2" style="vertical-align:middle; text-align:center"  width="20%"> NILAI </th>
															</tr>
															<tr>
																<th class="border-full" style="vertical-align:middle; text-align:center"  width="10%"> ANGKA </th>
																<th class="border-full"  style="vertical-align:middle; text-align:center"  width="10%"> HURUF </th>
															</tr>															
					';
				$data_bidang = array();
				$data_bidang=$this->db->query("SELECT id_bidang, nama_bidang, kategori FROM ms_bidang_study 
															where id_bidang in (select id_bidang 
															from ms_mata_pelajaran 
															inner join trans_kurikulum on ms_mata_pelajaran.id_matpal = trans_kurikulum.id_mapel)
															 order by id_bidang,kategori,nama_bidang desc ")->result_array();
															// inner join trans_kurikulum on ms_mata_pelajaran.id_matpal = trans_kurikulum.id_mapel and trans_kurikulum.kategori='UTAMA')")->result_array();
				// return $data;

																$no =1; 
				foreach ($data_bidang as $row_data_bidang) {;

																$output .='
																	<tr>
																		<td class="border-rbl" colspan="5" align="center" style="font-weight:bold"> '.$row_data_bidang['nama_bidang'].'</td>
																	</tr>																	
																';

																$data_matpal = array();
																$data_matpal = $this->db->query("SELECT ms_mata_pelajaran.id_bidang,ms_mata_pelajaran.nama_matpal, trans_rapor.nilai
																																		from ms_mata_pelajaran
																																		left join trans_rapor on ms_mata_pelajaran.id_matpal = trans_rapor.id_mapel and trans_rapor.id_thn_ajar = '".$hide_Kurikulum."' and trans_rapor.semester ='".$semester."' and trans_rapor.no_registrasi='".$row_data_santri['no_registrasi']."' 
																																		where id_bidang='".$row_data_bidang['id_bidang']."'")->result_array();

																	foreach ($data_matpal as $row_data_matpal) {
																		if($row_data_matpal['nilai']==''){
																			$nilai = '0';
																		}else{
																			$nilai = $row_data_matpal['nilai'];
																		}
																		$output .=
																		'
																			<tr>
																				<td class="border-rbl" width="2" align="center" >'.$no++.'</td>
																				<td class="border-rbl">'.$row_data_matpal['nama_matpal'].'</td>
																				<td class="border-rbl" width="10%" align="center" >50</td>
																				<td class="border-rbl" width="10%" align="center" >'.$nilai.'</td>
																				<td class="border-rbl" width="10%" align="center" >'.terbilang($row_data_matpal['nilai']).'</td>
																			</tr>																	
																		';
																};
															};
															$output .='
																</table>
																<span style="margin-left: 40px" class="title-3">
																
																</span>																
														</body>
															';	
			};																	
			return $output;
	}

	#ENDREGION PRINT RAPOR

  
}