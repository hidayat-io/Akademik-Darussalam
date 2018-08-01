<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mabsensi extends CI_Model {

	public function __construct(){

        parent::__construct();
	}
	
	function get_grid_kelas($param,$sortby=0,$sorttype='desc'){

		$cols = array('khd.tingkat','khd.tipe_kelas','kdt.kode_kelas','kdt.nama');

		$sql = "SELECT kdt.id_mskelasdt,
						khd.tingkat,
						khd.tipe_kelas,
						kdt.kode_kelas,
						kdt.nama						
				FROM   ms_kelashd khd
						INNER JOIN ms_kelasdt kdt
								ON khd.id_kelas = kdt.id_kelas
						INNER JOIN trans_kurikulum kur
								ON khd.tingkat = kur.tingkat
								AND khd.tipe_kelas = kur.tipe_kelas";

		if($param!=""){

			$sql .= " WHERE ".$param;
		}

		$sql .= "GROUP  BY
						kdt.id_mskelasdt, 
						kdt.kode_kelas,
						kdt.nama,
						khd.tingkat,
						khd.tipe_kelas
				ORDER  BY khd.tingkat,
						Field(khd.tipe_kelas, 'REGULER', 'INTENSIF'),
						kdt.nama";

		return $this->db->query($sql)->result();
	}	

	function mget_data_absensi($id_kelasdt,$tgl_absensi){

		$sql_absensi = "SELECT snt.nama_lengkap, 
								snt.no_registrasi, 
								abd.noreg_santri, 
								snt.kel_sekarang as kode_kelas, 
								abh.id_mskelasdt, 
								abd.absensi, 
								kld.nama AS nama_kelas, 
								abh.id_absen_header, 
								abh.tgl_absensi 
						FROM   ms_santri snt 
								INNER JOIN ms_kelasdt kld 
										ON kld.kode_kelas = snt.kel_sekarang 
								LEFT OUTER JOIN trans_absensi_h abh 
											ON abh.id_mskelasdt = kld.id_mskelasdt 
												AND abh.tgl_absensi = '".$tgl_absensi."' 
								LEFT OUTER JOIN trans_absensi_d abd 
											ON abd.id_absen_header = abh.id_absen_header 
												AND abd.noreg_santri = snt.no_registrasi 
						WHERE  snt.isnonaktif IS NULL 
								AND snt.kategori = 'TMI' 
								AND kld.id_mskelasdt = '".$id_kelasdt."'
 						ORDER  BY snt.nama_lengkap";

		return $this->db->query($sql_absensi);
		
	}

	function del_old_absensi($id_absen_header){

		//delete header
		$this->db->where('id_absen_header',$id_absen_header);
		$this->db->delete('trans_absensi_h');

		//delete detail
		$this->db->where('id_absen_header',$id_absen_header);
		$this->db->delete('trans_absensi_d');
	}

	function save_header_absen($data){

		$this->db->insert('trans_absensi_h',$data);
		$id = $this->db->insert_id();

		return $id;
	}

	function save_detail_absen($data){

		$this->db->insert('trans_absensi_d',$data);
	}
}