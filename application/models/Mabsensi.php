<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mabsensi extends CI_Model {

	public function __construct(){

        parent::__construct();
    }
	
	function get_grid_kelas($param,$sortby=0,$sorttype='desc'){

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
							jp.hari, 
							jp.jam,
							absh.tgl_absensi,
							snt.no_registrasi,
							snt.nama_lengkap,
							absd.absensi
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
								ON absh.id_jadwal = absd.header_id
									AND absd.noreg_santri = snt.no_registrasi
						WHERE jp.id_jadwal = $id_jadwal and snt.kategori='TMI'
							ORDER BY absd.noreg_santri";

		return $this->db->query($sql_absensi);
	}
}