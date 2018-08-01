<?php

class Mnilai extends CI_Model 
{

	public function __construct() {

		// Call the CI_Model constructor
		parent::__construct();
	}

	#region LoadPage
		function get_msguru(){
			$data = $this->db->query ("SELECT * FROM ms_guru ORDER BY no_reg");
			return $data;
		}
		
		function get_kurikulum($id) {
			$this->db->where('id',$id);
			return $this->db->get('ms_tahun_ajaran')->row();
		}

		function get_list_data($param,$sortby=0,$sorttype='asc',$thn_ajar_aktif,$user_id){
			//cek admin atau bukan
			$group=	$this->db->query("SELECT a.user_id, a.nama_lengkap, b.group_id
										FROM USER a 
										INNER JOIN group_daftar_user b ON a.user_id = b.user_id
										where a.user_id = '$user_id'")->row_array();
			// $group = $this->db->last_query($group);							
			$groupid = $group['group_id'];
			// var_dump($groupid);
			// exit();
			
					
			$cols = array('trans_jadwal_pelajaran.id_thn_ajar', 'trans_jadwal_pelajaran.semester','ms_kelashd.tingkat', 'ms_kelashd.tipe_kelas',  'trans_jadwal_pelajaran.santri',  'trans_jadwal_pelajaran.kode_kelas',  'ms_kelasdt.nama',  'ms_guru.nama_lengkap',  'ms_mata_pelajaran.nama_matpal',  'trans_jadwal_pelajaran.kategori');

			$sql = "SELECT trans_jadwal_pelajaran.id_thn_ajar,ms_tahun_ajaran.deskripsi, trans_jadwal_pelajaran.semester,  ms_kelashd.tingkat, ms_kelashd.tipe_kelas, trans_jadwal_pelajaran.santri, trans_jadwal_pelajaran.kode_kelas,  ms_kelasdt.nama,
					trans_jadwal_pelajaran.id_guru,ms_guru.nama_lengkap, trans_jadwal_pelajaran.id_mapel,ms_mata_pelajaran.nama_matpal, trans_jadwal_pelajaran.kategori
					from trans_jadwal_pelajaran
					inner join ms_kelasdt on trans_jadwal_pelajaran.kode_kelas = ms_kelasdt.kode_kelas and trans_jadwal_pelajaran.id_thn_ajar = '$thn_ajar_aktif'
					inner join ms_kelashd on ms_kelasdt.id_kelas = ms_kelashd.id_kelas
					inner join ms_guru on trans_jadwal_pelajaran.id_guru = ms_guru.id_guru
					inner join ms_mata_pelajaran on trans_jadwal_pelajaran.id_mapel = ms_mata_pelajaran.id_matpal
					inner join ms_tahun_ajaran on trans_jadwal_pelajaran.id_thn_ajar = ms_tahun_ajaran.id";

						

				if($param!=null){

					$sql .= " where ".$param;
					$tipe = ' AND ';
					
				}else{
					$tipe = ' WHERE ';
				}

				if ($groupid != 1){
					$sql .= $tipe." trans_jadwal_pelajaran.id_guru = ".$user_id;

				}
			
			
			$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
			
			// echo "$sql";
			// 			exit();
			return $this->db->query($sql)->result();
		}
	#endregion LoadPage
	#region Modal ListSantri
		function get_list_data_listsantri($param,$sortby=0,$sorttype='asc',$kode_kelas){
					
			$cols = array('no_registrasi', 'nama_lengkap', 'nama_arab');

			$sql = "select ms_santri.no_registrasi, ms_santri.nama_lengkap, ms_santri.nama_arab, ms_santri.kel_sekarang 
					from ms_santri
					inner join trans_daftar_ulang on ms_santri.no_registrasi = trans_daftar_ulang.no_registrasi";

						

				if($param!=null){

					$sql .= " where ms_santri.kel_sekarang='$kode_kelas' and ".$param;
					
				}else{
					$sql.= " where ms_santri.kel_sekarang='$kode_kelas'";
				}
				// if($param!=null){

				//     $sql .= " where ms_santri.kel_sekarang='$kode_kelas' and ms_santri.kategori='TMI' and ms_santri.isnonaktif is null and ms_santri.no_registrasi not like '%CT%' and ".$param;
					
				// }else{
				// 	$sql.= " where ms_santri.kel_sekarang='$kode_kelas' and ms_santri.kategori='TMI' and ms_santri.isnonaktif is null and no_registrasi not like '%CT%'";
				// }
			

			$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
			
			// echo "$sql";
			// 			exit();
			return $this->db->query($sql)->result();
		}

		function query_get_data_nilai_by_noregistrasi($no_registrasi,$id_thn_ajar,$semester,$kode_kelas,$id_guru,$id_mapel){
			
			$data = array();
			$data=$this->db->query("select trans_nilai_hd.id, ms_santri.no_registrasi,ms_santri.nama_lengkap,ms_santri.nama_arab,trans_nilai_dt.kategori,trans_nilai_dt.nama_penilaian,trans_nilai_dt.nilai
									from ms_santri 
									left outer join trans_nilai_hd on ms_santri.no_registrasi = trans_nilai_hd.no_registrasi and trans_nilai_hd.id_thn_ajar = '$id_thn_ajar' and trans_nilai_hd.semester = '$semester' and trans_nilai_hd.kode_kelas = '$kode_kelas' and trans_nilai_hd.id_guru = '$id_guru' and trans_nilai_hd.id_mapel = '$id_mapel'
									left outer join trans_nilai_dt on trans_nilai_hd.id = trans_nilai_dt.id_hd
									where ms_santri.no_registrasi='$no_registrasi'")->result_array();
			// $data=$this->db->query("select no_registrasi,nama_lengkap,nama_arab from ms_santri where no_registrasi='$no_registrasi'")->row_array();
			// $data = $this->db->last_query();
			// var_dump($data);
			// exit();	
			return $data;
		}
	#endregion Modal ListSantri
	#region Modal AddNilai
		function query_simpan_trans_nilai_hd($trans_nilai_hd){

			$id = $this->db->insert('trans_nilai_hd',$trans_nilai_hd);		
			return $this->db->insert_id();
		}

		function query_simpan_trans_nilai_dt($trans_nilai_dt){

			$this->db->insert('trans_nilai_dt',$trans_nilai_dt);
		}

		function query_delete_trans_nilai_dt($id_hd){
			$this->db->where('id_hd',$id_hd);
			$this->db->delete('trans_nilai_dt');
		}
	#end region Modal AddNilai
	
}