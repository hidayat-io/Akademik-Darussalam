<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mreport_absen extends CI_Model{

	public function __construct(){
	
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

	function get_list_kelas($kode_kelas=""){

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
							AND khd.tipe_kelas = kur.tipe_kelas
						INNER JOIN ms_santri snt
							ON snt.kel_sekarang = kdt.kode_kelas 
							AND snt.isnonaktif IS NULL	
							AND snt.kategori = 'TMI' ";

		if($kode_kelas!=""){

			$sql .= " WHERE kdt.kode_kelas = '".$kode_kelas."' ";
		}

		$sql .= " GROUP  BY
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

	
	function mget_data_absensi($noreg_santri,$tgl){

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
							INNER JOIN trans_absensi_h abh 
								ON abh.id_mskelasdt = kld.id_mskelasdt
								".$tgl."
							INNER JOIN trans_absensi_d abd 
								ON abd.id_absen_header = abh.id_absen_header 
									AND abd.noreg_santri = snt.no_registrasi 
						WHERE  snt.isnonaktif IS NULL 
							AND snt.kategori = 'TMI' 
							AND snt.no_registrasi = '$noreg_santri'
						ORDER BY
 							snt.nama_lengkap,
 							abh.tgl_absensi";

		return $this->db->query($sql_absensi);		
	}

	function get_list_santri($kode_kelas){

		$sql = "SELECT
					nama_lengkap,
					no_registrasi
				FROM
					ms_santri
				WHERE
					kel_sekarang = '$kode_kelas'
				ORDER BY
					nama_lengkap";

		return $this->db->query($sql);
	}
}