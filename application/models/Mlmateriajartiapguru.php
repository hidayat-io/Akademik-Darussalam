<?php

class Mlmateriajartiapguru extends CI_Model 
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


	function get_data_all($hide_Kurikulum,$semester) {
			
			$dtguru = array();
			$dtguru=$this->db->query("select  id_guru, no_reg,nama_lengkap,jns_kelamin from ms_guru where is_pengajar = '1' order by id_guru asc")->result_array();

			$output ='';
			$noguru =1;
			foreach ($dtguru as $row_dtguru) {;
				if($row_dtguru['jns_kelamin'] =='l'){
					$panggilan = 'Al-Ustadz';
				}else{
					$panggilan = 'Al-Ustadzah';

				}
				$id_guru = $row_dtguru['id_guru'];
							$output .='	
								<body>
									<table width="50%" style="font-size: 15px;">
										<tr>
											<td align="left" valign="right">
												
													<b>NO  '.$noguru. '</b><br>
																										
											
											</td>
											<td align="left" valign="left">
												
													<b>'.$panggilan.'</b><br>
																										
											
											</td>
											<td align="left" valign="left">
												
													<b>'.$row_dtguru['nama_lengkap'].'</b><br>
																										
											
											</td>
										</tr>
									</table>														
							';
				//muallimin
					$dtmuallimin = array();
					$dtmuallimin=$this->db->query("select distinct a.kode_kelas, e.nama, a.id_mapel, nama_matpal
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' and a.santri='PUTRA' and c.kategori='UTAMA'")->result_array();
					$no_dtmuallimin =1; 
								$output .='
										<!-- table MUALLIMIN start -->
											<table width="100%">
												<tr>
													<td align="left" valign="middle">
															<h2><i>MUALLIMIN</i></h2> <br>
															</span>												
													</td>
												</tr>
											</table>
											<table width="100%" class="tb-item">
													<tr>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="10%"> NO </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="50%"> MATA PELAJARAN </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="20%"> KELAS </th>
														<th class="border-full" style="vertical-align:middle; text-align:center"  width="20%"> HISSOH </th>
													</tr>
								';
					$th_muallimin =0;
					foreach ($dtmuallimin as $row_dtmuallimin) {;
						$id_kelas = $row_dtmuallimin['kode_kelas'];
						$id_mapel = $row_dtmuallimin['id_mapel'];
						
						//gethissoh
						$dtmuallimin=$this->db->query("select count(a.id_jadwal) as hissoh
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' 
													and a.kode_kelas='$id_kelas' and a.id_mapel='$id_mapel' and a.santri='PUTRA'")->row();	
						$hissoh = $dtmuallimin->hissoh;

								$output .='
										
													<tr>
														<td class="border-rbl" width="10%" align="center" >'.$no_dtmuallimin.'</td>
														<td class="border-rbl" width="50%" >'.$row_dtmuallimin['nama_matpal'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$row_dtmuallimin['nama'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$hissoh.'</td>
													</tr>	
																											
								';
						$no_dtmuallimin++;
						$th_muallimin = $th_muallimin + $hissoh;			
					};																	
							$output .='
													<tr>																
														<td class="border-rbl" width="20%" align="right" colspan="3"  style="border: none;">JUMLAH</td>
														<td class="border-rbl" width="20%" align="center" style="border: none;" >'.$th_muallimin.'</td>
													</tr>	
											</table>
											<span style="margin-left: 40px" class="title-3">
											</span>																
										<!-- table MUALLIMIN start -->	
							';	
				//end muallimin
				
				//muallimat
					$dtmuallimat = array();
					$dtmuallimat=$this->db->query("select distinct a.kode_kelas, e.nama, a.id_mapel, nama_matpal
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' and a.santri='PUTRI' and c.kategori='UTAMA'")->result_array();
					$no_dtmuallimat =1; 
								$output .='
										<!-- table muallimat start -->
											<table width="100%">
												<tr>
													<td align="left" valign="middle">
															<h2><i>MUALLIMAT</i></h2>  <br>
															</span>												
													</td>
												</tr>
											</table>
											<table width="100%" class="tb-item">
													<tr>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="10%"> NO </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="50%"> MATA PELAJARAN </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="20%"> KELAS </th>
														<th class="border-full" style="vertical-align:middle; text-align:center"  width="20%"> HISSOH </th>
													</tr>
								';
					$th_muallimat =0;
					foreach ($dtmuallimat as $row_dtmuallimat) {;
						$id_kelas = $row_dtmuallimat['kode_kelas'];
						$id_mapel = $row_dtmuallimat['id_mapel'];
						
						//gethissoh
						$dtmuallimat=$this->db->query("select count(a.id_jadwal) as hissoh
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' 
													and a.kode_kelas='$id_kelas' and a.id_mapel='$id_mapel' and a.santri='PUTRI'")->row();	
						$hissoh = $dtmuallimat->hissoh;

								$output .='
										
													<tr>
														<td class="border-rbl" width="10%" align="center" >'.$no_dtmuallimat.'</td>
														<td class="border-rbl" width="50%" >'.$row_dtmuallimat['nama_matpal'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$row_dtmuallimat['nama'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$hissoh.'</td>
													</tr>	
																											
								';
						$no_dtmuallimat++;
						$th_muallimat = $th_muallimat + $hissoh;			
					};																	
							$output .='
													<tr>																
														<td class="border-rbl" width="20%" align="right" colspan="3"  style="border: none;">JUMLAH</td>
														<td class="border-rbl" width="20%" align="center" style="border: none;" >'.$th_muallimat.'</td>
													</tr>	
											</table>
											<span style="margin-left: 40px" class="title-3">
											</span>																
										<!-- table muallimat start -->	
							';	
				//end muallimat
				
				//sore
					$dtsore = array();
					$dtsore=$this->db->query("select distinct a.kode_kelas, e.nama, a.id_mapel, nama_matpal
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' and a.santri='PUTRI' and c.kategori='SORE'")->result_array();
					$no_dtsore =1; 
								$output .='
										<!-- table sore start -->
											<table width="100%">
												<tr>
													<td align="left" valign="middle">
															<h2><i>PELAJARAN SORE</i></h2>  <br>
															</span>												
													</td>
												</tr>
											</table>
											<table width="100%" class="tb-item">
													<tr>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="10%"> NO </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="50%"> MATA PELAJARAN </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="20%"> KELAS </th>
														<th class="border-full" style="vertical-align:middle; text-align:center"  width="20%"> HISSOH </th>
													</tr>
								';
					$th_sore =0;
					foreach ($dtsore as $row_dtsore) {;
						$id_kelas = $row_dtsore['kode_kelas'];
						$id_mapel = $row_dtsore['id_mapel'];
						
						//gethissoh
						$dtsore=$this->db->query("select count(a.id_jadwal) as hissoh
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' 
													and a.kode_kelas='$id_kelas' and a.id_mapel='$id_mapel' and a.santri='PUTRI'")->row();	
						$hissoh = $dtsore->hissoh;

								$output .='
										
													<tr>
														<td class="border-rbl" width="10%" align="center" >'.$no_dtsore.'</td>
														<td class="border-rbl" width="50%" >'.$row_dtsore['nama_matpal'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$row_dtsore['nama'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$hissoh.'</td>
													</tr>	
																											
								';
						$no_dtsore++;
						$th_sore = $th_sore + $hissoh;			
					};																	
							$output .='
													<tr>																
														<td class="border-rbl" width="20%" align="right" colspan="3"  style="border: none;">JUMLAH</td>
														<td class="border-rbl" width="20%" align="center"  style="border: none;">'.$th_sore.'</td>
													</tr>	
											</table>
											<span style="margin-left: 40px" class="title-3">
											</span>																
										<!-- table sore start -->	
							';	
				//end sore

				//kitab
					$dtkitab = array();
					$dtkitab=$this->db->query("select distinct a.kode_kelas, e.nama, a.id_mapel, nama_matpal
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' and a.santri='PUTRI' and c.kategori='KITAB'")->result_array();
					$no_dtkitab =1; 
								$output .='
										<!-- table kitab start -->
											<table width="100%">
												<tr>
													<td align="left" valign="middle">
															<h2><i>PELAJARAN KITAB</i></h2>  <br>
															</span>												
													</td>
												</tr>
											</table>
											<table width="100%" class="tb-item">
													<tr>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="10%"> NO </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="50%"> MATA PELAJARAN </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="20%"> KELAS </th>
														<th class="border-full" style="vertical-align:middle; text-align:center"  width="20%"> HISSOH </th>
													</tr>
								';
					$th_kitab =0;
					foreach ($dtkitab as $row_dtkitab) {;
						$id_kelas = $row_dtkitab['kode_kelas'];
						$id_mapel = $row_dtkitab['id_mapel'];
						
						//gethissoh
						$dtkitab=$this->db->query("select count(a.id_jadwal) as hissoh
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' 
													and a.kode_kelas='$id_kelas' and a.id_mapel='$id_mapel' and a.santri='PUTRI'")->row();	
						$hissoh = $dtkitab->hissoh;

								$output .='
										
													<tr>
														<td class="border-rbl" width="10%" align="center" >'.$no_dtkitab.'</td>
														<td class="border-rbl" width="50%" >'.$row_dtkitab['nama_matpal'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$row_dtkitab['nama'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$hissoh.'</td>
													</tr>	
																											
								';
						$no_dtkitab++;
						$th_kitab = $th_kitab + $hissoh;			
					};																	
							$output .='
													<tr>																
														<td class="border-rbl" width="20%" align="right" colspan="3"  style="border: none;">JUMLAH</td>
														<td class="border-rbl" width="20%" align="center"  style="border: none;">'.$th_kitab.'</td>
													</tr>	
											</table>
											<span style="margin-left: 40px" class="title-3">
											</span>																
										<!-- table kitab start -->	
							';	
				//end kitab

				//total
				$th_pagi = $th_muallimat + $th_muallimin;
				$total_hissoh = $th_pagi + $th_sore + $th_kitab;
							$output .='
								<!-- table TOTAL start -->
									<table width="100%" class="tb-item">
											
											<tr>
												<td class="border-full" width="10%" align="center">1</td>
												<td class="border-full" width="70%" colspan="2">PELAJARAN PAGI</td>
												<td class="border-full" width="20%" align="center" >'.$th_pagi.'</td>
											</tr>	
											<tr>
												<td class="border-rbl" width="10%" align="center">2</td>
												<td class="border-rbl" width="70%" colspan="2">PELAJARAN SORE</td>
												<td class="border-rbl" width="20%" align="center" >'.$th_sore.'</td>
											</tr>	
											<tr>
												<td class="border-rbl" width="10%" align="center">3</td>
												<td class="border-rbl" width="70%" colspan="2" >KITAB SALAF </td>
												<td class="border-rbl" width="20%" align="center" >'.$th_kitab.'</td>
											</tr>	
											<tr>																
												<td class="border-rbl" width="20%" align="right" colspan="3" style="border: none;">JUMLAH</td>
												<td class="border-rbl" width="20%" align="center" style="border: none;">'.$total_hissoh.'</td>
											</tr>	
									</table>
									<span style="margin-left: 40px" class="title-3">
									</span>																
								<!-- table TOTAL  start -->
							';
				//end total
				
							$output .='
									</table>
									<span style="margin-left: 40px" class="title-3">
									
									</span>																
								</body>
							';	
			$noguru++;
		}
		return $output;
	}


	function get_data_byidguru($hide_Kurikulum,$semester,$id_guru) {
			
			$dtguru = array();
			$dtguru=$this->db->query("select  id_guru, no_reg,nama_lengkap,jns_kelamin from ms_guru where id_guru='$id_guru' and is_pengajar = '1' order by id_guru asc")->result_array();

			$output ='';
			$noguru =1;
			foreach ($dtguru as $row_dtguru) {;
				if($row_dtguru['jns_kelamin'] =='l'){
					$panggilan = 'Al-Ustadz';
				}else{
					$panggilan = 'Al-Ustadzah';

				}
				$id_guru = $row_dtguru['id_guru'];
							$output .='	
								<body>
									<table width="50%" style="font-size: 15px;">
										<tr>
											<td align="left" valign="right">
												
													<b>NO  '.$noguru. '</b><br>
																										
											
											</td>
											<td align="left" valign="left">
												
													<b>'.$panggilan.'</b><br>
																										
											
											</td>
											<td align="left" valign="left">
												
													<b>'.$row_dtguru['nama_lengkap'].'</b><br>
																										
											
											</td>
										</tr>
									</table>														
							';
				//muallimin
					$dtmuallimin = array();
					$dtmuallimin=$this->db->query("select distinct a.kode_kelas, e.nama, a.id_mapel, nama_matpal
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' and a.santri='PUTRA' and c.kategori='UTAMA'")->result_array();
					$no_dtmuallimin =1; 
								$output .='
										<!-- table MUALLIMIN start -->
											<table width="100%">
												<tr>
													<td align="left" valign="middle">
															<h2><i>MUALLIMIN</i></h2> <br>
															</span>												
													</td>
												</tr>
											</table>
											<table width="100%" class="tb-item">
													<tr>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="10%"> NO </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="50%"> MATA PELAJARAN </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="20%"> KELAS </th>
														<th class="border-full" style="vertical-align:middle; text-align:center"  width="20%"> HISSOH </th>
													</tr>
								';
					$th_muallimin =0;
					foreach ($dtmuallimin as $row_dtmuallimin) {;
						$id_kelas = $row_dtmuallimin['kode_kelas'];
						$id_mapel = $row_dtmuallimin['id_mapel'];
						
						//gethissoh
						$dtmuallimin=$this->db->query("select count(a.id_jadwal) as hissoh
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' 
													and a.kode_kelas='$id_kelas' and a.id_mapel='$id_mapel' and a.santri='PUTRA'")->row();	
						$hissoh = $dtmuallimin->hissoh;

								$output .='
										
													<tr>
														<td class="border-rbl" width="10%" align="center" >'.$no_dtmuallimin.'</td>
														<td class="border-rbl" width="50%" >'.$row_dtmuallimin['nama_matpal'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$row_dtmuallimin['nama'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$hissoh.'</td>
													</tr>	
																											
								';
						$no_dtmuallimin++;
						$th_muallimin = $th_muallimin + $hissoh;			
					};																	
							$output .='
													<tr>																
														<td class="border-rbl" width="20%" align="right" colspan="3"  style="border: none;">JUMLAH</td>
														<td class="border-rbl" width="20%" align="center" style="border: none;" >'.$th_muallimin.'</td>
													</tr>	
											</table>
											<span style="margin-left: 40px" class="title-3">
											</span>																
										<!-- table MUALLIMIN start -->	
							';	
				//end muallimin
				
				//muallimat
					$dtmuallimat = array();
					$dtmuallimat=$this->db->query("select distinct a.kode_kelas, e.nama, a.id_mapel, nama_matpal
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' and a.santri='PUTRI' and c.kategori='UTAMA'")->result_array();
					$no_dtmuallimat =1; 
								$output .='
										<!-- table muallimat start -->
											<table width="100%">
												<tr>
													<td align="left" valign="middle">
															<h2><i>MUALLIMAT</i></h2>  <br>
															</span>												
													</td>
												</tr>
											</table>
											<table width="100%" class="tb-item">
													<tr>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="10%"> NO </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="50%"> MATA PELAJARAN </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="20%"> KELAS </th>
														<th class="border-full" style="vertical-align:middle; text-align:center"  width="20%"> HISSOH </th>
													</tr>
								';
					$th_muallimat =0;
					foreach ($dtmuallimat as $row_dtmuallimat) {;
						$id_kelas = $row_dtmuallimat['kode_kelas'];
						$id_mapel = $row_dtmuallimat['id_mapel'];
						
						//gethissoh
						$dtmuallimat=$this->db->query("select count(a.id_jadwal) as hissoh
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' 
													and a.kode_kelas='$id_kelas' and a.id_mapel='$id_mapel' and a.santri='PUTRI'")->row();	
						$hissoh = $dtmuallimat->hissoh;

								$output .='
										
													<tr>
														<td class="border-rbl" width="10%" align="center" >'.$no_dtmuallimat.'</td>
														<td class="border-rbl" width="50%" >'.$row_dtmuallimat['nama_matpal'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$row_dtmuallimat['nama'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$hissoh.'</td>
													</tr>	
																											
								';
						$no_dtmuallimat++;
						$th_muallimat = $th_muallimat + $hissoh;			
					};																	
							$output .='
													<tr>																
														<td class="border-rbl" width="20%" align="right" colspan="3"  style="border: none;">JUMLAH</td>
														<td class="border-rbl" width="20%" align="center" style="border: none;" >'.$th_muallimat.'</td>
													</tr>	
											</table>
											<span style="margin-left: 40px" class="title-3">
											</span>																
										<!-- table muallimat start -->	
							';	
				//end muallimat
				
				//sore
					$dtsore = array();
					$dtsore=$this->db->query("select distinct a.kode_kelas, e.nama, a.id_mapel, nama_matpal
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' and a.santri='PUTRI' and c.kategori='SORE'")->result_array();
					$no_dtsore =1; 
								$output .='
										<!-- table sore start -->
											<table width="100%">
												<tr>
													<td align="left" valign="middle">
															<h2><i>PELAJARAN SORE</i></h2>  <br>
															</span>												
													</td>
												</tr>
											</table>
											<table width="100%" class="tb-item">
													<tr>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="10%"> NO </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="50%"> MATA PELAJARAN </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="20%"> KELAS </th>
														<th class="border-full" style="vertical-align:middle; text-align:center"  width="20%"> HISSOH </th>
													</tr>
								';
					$th_sore =0;
					foreach ($dtsore as $row_dtsore) {;
						$id_kelas = $row_dtsore['kode_kelas'];
						$id_mapel = $row_dtsore['id_mapel'];
						
						//gethissoh
						$dtsore=$this->db->query("select count(a.id_jadwal) as hissoh
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' 
													and a.kode_kelas='$id_kelas' and a.id_mapel='$id_mapel' and a.santri='PUTRI'")->row();	
						$hissoh = $dtsore->hissoh;

								$output .='
										
													<tr>
														<td class="border-rbl" width="10%" align="center" >'.$no_dtsore.'</td>
														<td class="border-rbl" width="50%" >'.$row_dtsore['nama_matpal'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$row_dtsore['nama'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$hissoh.'</td>
													</tr>	
																											
								';
						$no_dtsore++;
						$th_sore = $th_sore + $hissoh;			
					};																	
							$output .='
													<tr>																
														<td class="border-rbl" width="20%" align="right" colspan="3"  style="border: none;">JUMLAH</td>
														<td class="border-rbl" width="20%" align="center"  style="border: none;">'.$th_sore.'</td>
													</tr>	
											</table>
											<span style="margin-left: 40px" class="title-3">
											</span>																
										<!-- table sore start -->	
							';	
				//end sore

				//kitab
					$dtkitab = array();
					$dtkitab=$this->db->query("select distinct a.kode_kelas, e.nama, a.id_mapel, nama_matpal
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' and a.santri='PUTRI' and c.kategori='KITAB'")->result_array();
					$no_dtkitab =1; 
								$output .='
										<!-- table kitab start -->
											<table width="100%">
												<tr>
													<td align="left" valign="middle">
															<h2><i>PELAJARAN KITAB</i></h2>  <br>
															</span>												
													</td>
												</tr>
											</table>
											<table width="100%" class="tb-item">
													<tr>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="10%"> NO </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="50%"> MATA PELAJARAN </th>
														<th class="border-full" style="vertical-align:middle; text-align:center" width="20%"> KELAS </th>
														<th class="border-full" style="vertical-align:middle; text-align:center"  width="20%"> HISSOH </th>
													</tr>
								';
					$th_kitab =0;
					foreach ($dtkitab as $row_dtkitab) {;
						$id_kelas = $row_dtkitab['kode_kelas'];
						$id_mapel = $row_dtkitab['id_mapel'];
						
						//gethissoh
						$dtkitab=$this->db->query("select count(a.id_jadwal) as hissoh
													from trans_jadwal_pelajaran a
													inner join ms_mata_pelajaran b on a.id_mapel = b.id_matpal
													inner join ms_bidang_study c on b.id_bidang =  c.id_bidang
													inner join ms_kelasdt e on a.kode_kelas = e.kode_kelas
													where a.id_guru = '$id_guru ' and a.id_thn_ajar='$hide_Kurikulum' and a.semester='$semester' 
													and a.kode_kelas='$id_kelas' and a.id_mapel='$id_mapel' and a.santri='PUTRI'")->row();	
						$hissoh = $dtkitab->hissoh;

								$output .='
										
													<tr>
														<td class="border-rbl" width="10%" align="center" >'.$no_dtkitab.'</td>
														<td class="border-rbl" width="50%" >'.$row_dtkitab['nama_matpal'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$row_dtkitab['nama'].'</td>
														<td class="border-rbl" width="20%" align="center" >'.$hissoh.'</td>
													</tr>	
																											
								';
						$no_dtkitab++;
						$th_kitab = $th_kitab + $hissoh;			
					};																	
							$output .='
													<tr>																
														<td class="border-rbl" width="20%" align="right" colspan="3"  style="border: none;">JUMLAH</td>
														<td class="border-rbl" width="20%" align="center"  style="border: none;">'.$th_kitab.'</td>
													</tr>	
											</table>
											<span style="margin-left: 40px" class="title-3">
											</span>																
										<!-- table kitab start -->	
							';	
				//end kitab

				//total
				$th_pagi = $th_muallimat + $th_muallimin;
				$total_hissoh = $th_pagi + $th_sore + $th_kitab;
							$output .='
								<!-- table TOTAL start -->
									<table width="100%" class="tb-item">
											
											<tr>
												<td class="border-full" width="10%" align="center">1</td>
												<td class="border-full" width="70%" colspan="2">PELAJARAN PAGI</td>
												<td class="border-full" width="20%" align="center" >'.$th_pagi.'</td>
											</tr>	
											<tr>
												<td class="border-rbl" width="10%" align="center">2</td>
												<td class="border-rbl" width="70%" colspan="2">PELAJARAN SORE</td>
												<td class="border-rbl" width="20%" align="center" >'.$th_sore.'</td>
											</tr>	
											<tr>
												<td class="border-rbl" width="10%" align="center">3</td>
												<td class="border-rbl" width="70%" colspan="2" >KITAB SALAF </td>
												<td class="border-rbl" width="20%" align="center" >'.$th_kitab.'</td>
											</tr>	
											<tr>																
												<td class="border-rbl" width="20%" align="right" colspan="3" style="border: none;">JUMLAH</td>
												<td class="border-rbl" width="20%" align="center" style="border: none;">'.$total_hissoh.'</td>
											</tr>	
									</table>
									<span style="margin-left: 40px" class="title-3">
									</span>																
								<!-- table TOTAL  start -->
							';
				//end total
				
							$output .='
									</table>
									<span style="margin-left: 40px" class="title-3">
									
									</span>																
								</body>
							';	
			$noguru++;
		}
		return $output;
	}




  
}