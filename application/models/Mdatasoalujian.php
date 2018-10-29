<?php

class Mdatasoalujian extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }
    
    function get_thn_ajar(){
		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran where kategori='UTAMA' order by id desc Limit 2 ");
		return $data;
	}

	function mget_list_mata_pelajaran($user_id){
			//cek admin atau bukan
			$group=	$this->db->query("SELECT a.user_id, a.nama_lengkap, b.group_id
										FROM user a 
										INNER JOIN group_daftar_user b ON a.user_id = b.user_id
										where a.user_id = '$user_id'")->row_array();
			// $group = $this->db->last_query($group);							
			$groupid = $group['group_id'];
			// var_dump($groupid);
			// exit();
			
					
			// $sql = "SELECT * 
			// 		from ms_mata_pelajaran
			// 		from trans_jadwal_pelajaran
			// 		inner join ms_kelasdt on trans_jadwal_pelajaran.kode_kelas = ms_kelasdt.kode_kelas and trans_jadwal_pelajaran.id_thn_ajar = '$thn_ajar_aktif'
			// 		inner join ms_kelashd on ms_kelasdt.id_kelas = ms_kelashd.id_kelas
			// 		inner join ms_guru on trans_jadwal_pelajaran.id_guru = ms_guru.id_guru
			// 		inner join ms_mata_pelajaran on trans_jadwal_pelajaran.id_mapel = ms_mata_pelajaran.id_matpal
			// 		inner join ms_tahun_ajaran on trans_jadwal_pelajaran.id_thn_ajar = ms_tahun_ajaran.id";


				if ($groupid != 1){
					$sql = "SELECT a.id_matpal, a.nama_matpal
					from ms_mata_pelajaran a
					inner join trans_jadwal_pelajaran b on a.id_matpal = b.id_mapel
					where b.id_guru = '$user_id' and a.status = 1";

				}
				else{
					$sql = "SELECT * 
					from ms_mata_pelajaran
					where status=1";

				}

			
			// echo "$sql";
			// 			exit();
			return $this->db->query($sql)->result();
		}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('kode_soal','kurikulum','semester','id_matpal','tingkat','user_id');

		$sql = "SELECT trans_banksoalhd.* ,ms_tahun_ajaran.deskripsi FROM trans_banksoalhd
				INNER JOIN ms_tahun_ajaran ON trans_banksoalhd.kurikulum = ms_tahun_ajaran.id";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}

	function _delete_datasoalHD($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('trans_banksoalhd');
	}

	function _delete_datasoalDT($id_hd)
	{
		$this->db->where('id_hd',$id_hd);
		$this->db->delete('trans_banksoaldt');
	}

	function get_print_soal_header($id)
	{
		$data = array();
		$data=$this->db->query("SELECT trans_banksoalhd.id, trans_banksoalhd.kode_soal,  ms_tahun_ajaran.deskripsi , trans_banksoalhd.semester, trans_banksoalhd.tingkat, ms_mata_pelajaran.nama_matpal
								FROM trans_banksoalhd
								INNER JOIN ms_tahun_ajaran ON trans_banksoalhd.kurikulum = ms_tahun_ajaran.id
								INNER JOIN ms_mata_pelajaran ON trans_banksoalhd.id_matpal = ms_mata_pelajaran.id_matpal
								where trans_banksoalhd.id = '$id'")->row_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}

	function get_print_soal($id)
	{
		$data = array();
		$data=$this->db->query("SELECT trans_banksoalhd.id, ms_tahun_ajaran.deskripsi , trans_banksoalhd.semester, trans_banksoalhd.tingkat, ms_mata_pelajaran.nama_matpal,
								ms_banksoal.soal, ms_banksoal.jwb_a, ms_banksoal.jwb_b, ms_banksoal.jwb_c, ms_banksoal.jwb_d
								FROM trans_banksoalhd
								INNER JOIN ms_tahun_ajaran ON trans_banksoalhd.kurikulum = ms_tahun_ajaran.id
								INNER JOIN ms_mata_pelajaran ON trans_banksoalhd.id_matpal = ms_mata_pelajaran.id_matpal
								INNER JOIN trans_banksoaldt ON trans_banksoalhd.id = trans_banksoaldt.id_hd
								INNER JOIN ms_banksoal ON trans_banksoaldt.id_soal = ms_banksoal.id_soal
								where trans_banksoalhd.id = '$id'")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}

	#region PRINT soalujian
	function query_get_data_soal_ujian($id) {
			
			$data_soalujianHD = array();
			$data_soalujianHD=$this->db->query("SELECT trans_banksoalhd.id, trans_banksoalhd.kode_soal, ms_tahun_ajaran.deskripsi , trans_banksoalhd.semester, trans_banksoalhd.tingkat, ms_mata_pelajaran.nama_matpal,
								ms_banksoal.soal, ms_banksoal.jwb_a, ms_banksoal.jwb_b, ms_banksoal.jwb_c, ms_banksoal.jwb_d
								FROM trans_banksoalhd
								INNER JOIN ms_tahun_ajaran ON trans_banksoalhd.kurikulum = ms_tahun_ajaran.id
								INNER JOIN ms_mata_pelajaran ON trans_banksoalhd.id_matpal = ms_mata_pelajaran.id_matpal
								INNER JOIN trans_banksoaldt ON trans_banksoalhd.id = trans_banksoaldt.id_hd
								INNER JOIN ms_banksoal ON trans_banksoaldt.id_soal = ms_banksoal.id_soal
								where trans_banksoalhd.id = '$id'")->result_array();
								// echo $this->db->last_query();
								// exit();

			$output ='				
				<table border="0" width="100%">
					<tr>
						<td align="left" valign="middle">
							<img src="'.base_url().'assets/images/logo.png" class="thumb-image" border="0">
						</td>
						<td width="100%" align="center" valign="center">
							<span style="font-size:16" class="title-2"> 							
                            	SOAL UJIAN '.$data_soalujianHD[0]['nama_matpal'].'								
							</span>
						</td>
						<td align="right" valign="middle">
						</td>
					</tr>
					<tr>                    
						<td colspan="3" width="100%"   align="center" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									TAHUN AJARAN '.$data_soalujianHD[0]['deskripsi'].'
								</small>
							</span>
						</td>
					</tr>
					<tr>                    
						<td colspan="3" width="100%"   align="center" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									SEMESTER '.$data_soalujianHD[0]['semester'].'
									TINGKAT '.$data_soalujianHD[0]['tingkat'].'
								</small>
							</span>
						</td>
					</tr>
					<tr>                    
						<td colspan="3" width="100%"   align="center" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>									
									KODE SOAL '.$data_soalujianHD[0]['kode_soal'].'
								</small>
							</span>
						</td>
					</tr>
				</table>
				<hr>
				<br>
				<table border="0" width="100%">
					<tr>                    
						<td colspan="3" width="10%"   align="left" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									NAMA
								</small>
							</span>
						</td>
						<td colspan="3" width="100%"   align="left" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									:_______________________
								</small>
							</span>
						</td>
					</tr>
					<tr>                    
						<td colspan="3" width="10%"   align="left" valign="center">
							<span style="font-size:10" class="title-3"> 	
								<small>
									KELAS
								</small>
							</span>
						</td>
						<td colspan="3" width="100%"   align="left" valign="center">
							<span style="font-size:10" class="title-3"> 	
								<small>
									:_______________________
								</small>
							</span>
						</td>
					</tr>
				</table>
				<br>';
				$no=1;
			foreach ($data_soalujianHD as $row) {;
				$output .='<table border="0" width="100%">
					<tr>                    
						<td colspan="3" width="3%"   align="left" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									'.$no.'.
								</small>
							</span>
						</td>
						<td colspan="3" width="100%"   align="left" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									'.$row['soal'].'
								</small>
							</span>
						</td>
					</tr>
				</table>
				<table border="0" width="100%">
					<tr>                    
						<td colspan="3" width="5%"   align="left" valign="center">
						
						</td>
						<td colspan="3" width="50%"   align="left" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									A.'.$row['jwb_a'].'
								</small>
							</span>
						</td>
						<td colspan="3" width="50%"   align="left" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									B.'.$row['jwb_b'].'
								</small>
							</span>
						</td>
					</tr>
					<tr>                    
						<td colspan="3" width="5%"   align="left" valign="center">
						
						</td>
						<td colspan="3" width="50%"   align="left" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									C.'.$row['jwb_c'].'
								</small>
							</span>
						</td>
						<td colspan="3" width="50%"   align="left" valign="center">
						<span style="font-size:10" class="title-3"> 	
								<small>
									D.'.$row['jwb_d'].'
								</small>
							</span>
						</td>
					</tr>
				</table>
				<br>
				';
				$no++;
			};

					// <br>

			return $output;
		}


	
	#region model
	function get_banksoal($param)
	{

			$sql = "SELECT * FROM ms_banksoal
					".$param;
			

			return $this->db->query($sql);
	}

	function _insert_newHD($dataHD){

		$id = $this->db->insert('trans_banksoalhd',$dataHD);
		
		return $this->db->insert_id();
	}

	function _insert_newDT($dataDT){

		$this->db->insert('trans_banksoaldt',$dataDT);
	}
	#endregion model

	
}