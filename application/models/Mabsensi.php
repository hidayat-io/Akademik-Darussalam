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
	
	function get_grid_kelas_old($param,$sortby=0,$sorttype='desc'){

        $cols = array('kld.kode_kelas','kld.nama','klh.tingkat','klh.tipe_kelas','jp.hari','jp.jam','pl.nama_matpal','gr.nama_lengkap');

        $sql = "SELECT jp.id_jadwal,
					kld.nama, 
					kld.kode_kelas, 
					klh.tingkat, 
					klh.tipe_kelas, 
					pl.nama_matpal, 
					gr.nama_lengkap, 
				jp.hari, 
					jp.jam 
				FROM   ms_kelasdt kld 
					INNER JOIN ms_kelashd klh
						on kld.id_kelas = klh.id_kelas
					INNER JOIN trans_jadwal_pelajaran jp 
							ON kld.kode_kelas = jp.kode_kelas 
					INNER JOIN ms_guru gr 
							ON jp.id_guru = gr.id_guru 
					INNER JOIN ms_mata_pelajaran pl 
							ON jp.id_mapel = pl.id_matpal ";

		if($param!=null){

			$sql .= " WHERE ".$param;
		}

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype." ,
						klh.tingkat, 
						kld.kode_kelas, 
						Field(jp.hari, 'SENIN', 'SELASA', 'RABU', 'KAMIS', 'JUMAT', 'AHAD'), 
						jp.jam, 
						pl.nama_matpal, 
						gr.nama_lengkap";

        return $this->db->query($sql)->result();
	}

	function mget_data_absensi($id_jadwal,$tgl_absensi){

		$sql_absensi = "SELECT jp.id_jadwal,
							kld.nama as nama_kelas, 
							kld.kode_kelas, 
							klh.tingkat, 
							klh.tipe_kelas, 
							pl.nama_matpal, 
							gr.nama_lengkap as nama_guru, 
							gr.id_guru,
							jp.hari, 
							jp.jam,
							absh.tgl_absensi,
							snt.no_registrasi,
							snt.nama_lengkap,
							absd.absensi,
							absh.id_absen_header
						FROM   ms_kelasdt kld 
							INNER JOIN ms_kelashd klh
								on kld.id_kelas = klh.id_kelas
							INNER JOIN trans_jadwal_pelajaran jp 
									ON kld.kode_kelas = jp.kode_kelas 
							INNER JOIN ms_guru gr 
									ON jp.id_guru = gr.id_guru 
							INNER JOIN ms_mata_pelajaran pl 
									ON jp.id_mapel = pl.id_matpal
							INNER JOIN ms_santri snt
								ON jp.kode_kelas = snt.kel_sekarang
							LEFT OUTER JOIN trans_absensi_h absh
								ON absh.id_jadwal = jp.id_jadwal
									AND absh.tgl_absensi = '$tgl_absensi'
							LEFT JOIN trans_absensi_d absd
								ON absh.id_absen_header = absd.id_absen_header
									AND absd.noreg_santri = snt.no_registrasi
						WHERE jp.id_jadwal = $id_jadwal and snt.kategori='TMI' and snt.isnonaktif is null
							ORDER BY absd.noreg_santri";

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