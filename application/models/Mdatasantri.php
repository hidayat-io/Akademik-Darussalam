<?php

class Mdatasantri extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

	function get_list_data($param,$sortby=0,$sorttype='desc',$kategori_santri,$page)
	{
		

		$cols = array('no_registrasi','thn_masuk','nama_lengkap','nama_arab','nama_panggilan','uang_jajan_perbulan','no_kk','nik','tempat_lahir','tgl_lahir');
		if ($page == 'DAFTAR')
		{
			if ($kategori_santri == 'TMI')
			{
				$sql = "SELECT * FROM ms_santri where no_registrasi not like 'T%' and no_registrasi not like 'A%' and no_registrasi not like 'CA%'";
			}
			else
			{
				$sql = "SELECT * FROM ms_santri where no_registrasi not like 'T%' and no_registrasi not like 'A%' and no_registrasi not like 'CT%'";
			}
		}
		else {
				if ($kategori_santri == 'TMI')
			{
				$sql = "SELECT * FROM ms_santri where no_registrasi like 'T%' and no_registrasi not like 'A%' and no_registrasi not like 'CA%'";
			}
			else
			{
				$sql = "SELECT * FROM ms_santri where no_registrasi not like 'T%' and no_registrasi like 'A%' and no_registrasi not like 'CT%'";
			}
		}
		
		
				

		if($param!=null){

			$sql .= $param;
			
		}
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

		// echo $sql;
		// exit();
		
		return $this->db->query($sql)->result();
	}

	function get_eksport_list_data($param,$kategori_santri,$page)
	{
		// var_dump($param,$kategori_santri,$page);
		// exit();

		if ($page == 'DAFTAR')
		{
			if ($kategori_santri == 'TMI')
			{
				$sql = "SELECT * FROM ms_santri where no_registrasi not like 'T%' and no_registrasi not like 'A%' and no_registrasi not like 'CA%'";
			}
			else
			{
				$sql = "SELECT * FROM ms_santri where no_registrasi not like 'T%' and no_registrasi not like 'A%' and no_registrasi not like 'CT%'";
			}
		}
		else {
				if ($kategori_santri == 'TMI')
			{
				$sql = "SELECT * FROM ms_santri where no_registrasi like 'T%' and no_registrasi not like 'A%' and no_registrasi not like 'CA%'";
			}
			else
			{
				$sql = "SELECT * FROM ms_santri where no_registrasi not like 'T%' and no_registrasi like 'A%' and no_registrasi not like 'CT%'";
			}
		}
		
		
				

		if($param!=null){

			$sql .= $param;
			
		}
		

		//$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

		// echo $sql;
		// exit();
		
		return $this->db->query($sql)->result();
	}
	
	function get_sequence_noreg_TMI()
	{

		$this->db->where('nama_field','noreg_CalonTMI');
		return $this->db->get('sequence')->row();
	}

	function update_sequence_TMI($last_no)
	{
		$data = array(
		'nama_field'  		=> 'noreg_CalonTMI',
		'nomor_terakhir' 	=> $last_no
		);

		$this->db->replace('sequence',$data);
	}

	function new_get_sequence_noreg_TMI()
	{

		$this->db->where('nama_field','noreg_TMI');
		return $this->db->get('sequence')->row();
	}

	function new_update_sequence_TMI($last_no)
	{
		$data = array(
		'nama_field'  		=> 'noreg_TMI',
		'nomor_terakhir' 	=> $last_no
		);

		$this->db->replace('sequence',$data);
	}

	function update_sequence_SantriTMI($last_no)
	{
		$data = array(
		'nama_field'  		=> 'Stambuk_TMI',
		'nomor_terakhir' 	=> $last_no
		);

		$this->db->replace('sequence',$data);
	}

	function get_sequence_noStambukTMI()
	{

		$this->db->where('nama_field','Stambuk_TMI');
		return $this->db->get('sequence')->row();
	}

	function get_sequence_noreg_AITAM()
	{

		$this->db->where('nama_field','noreg_CalonAITAM');
		return $this->db->get('sequence')->row();
	}

	function update_sequence_AITAM($last_no)
	{
		$data = array(
		'nama_field'  		=> 'noreg_CalonAITAM',
		'nomor_terakhir' 	=> $last_no
		);

		$this->db->replace('sequence',$data);
	}

	function new_get_sequence_noreg_AITAM()
	{

		$this->db->where('nama_field','noreg_AITAM');
		return $this->db->get('sequence')->row();
	}

	function get_noSTATISTIK()
	{		
		return $this->db->get('ms_config')->row();
	}

	function new_update_sequence_AITAM($last_no)
	{
		$data = array(
		'nama_field'  		=> 'noreg_AITAM',
		'nomor_terakhir' 	=> $last_no
		);

		$this->db->replace('sequence',$data);
	}

	function simpan_data_santri($data_santri){

		$this->db->replace('ms_santri',$data_santri);
	}

	function update_data_santri($no_registrasi,$data_santri){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri',$data_santri);
	}

	function simpan_pembiayaan_siswa($data_trans_pembiayaan_siswa){

		$this->db->replace('trans_pembiayaan_siswa',$data_trans_pembiayaan_siswa);
	}

	function update_pembiayaan_siswa($no_registrasi,$data_trans_pembiayaan_siswa){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('trans_pembiayaan_siswa',$data_trans_pembiayaan_siswa);
	}

	function simpan_ms_fisik_santri($data_ms_fisik_santri){

		$this->db->replace('ms_fisik_santri',$data_ms_fisik_santri);
	}

	function update_ms_fisik_santri($no_registrasi,$data_ms_fisik_santri){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_fisik_santri',$data_ms_fisik_santri);
	}

	function delete_item_sekolahAitam($no_registrasi){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_santri_sekolah');
	}

	function simpan_item_sekolahAitam($detail_sekolahAitam){

		$this->db->replace('ms_santri_sekolah',$detail_sekolahAitam);
	}

	function delete_item_keluarga($no_registrasi){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_keluarga');
	}

	function simpan_item_keluarga($detail_keluarga){

		$this->db->replace('ms_keluarga',$detail_keluarga);
	}

	function delete_item_penyakit($no_registrasi){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_penyakit');
	}

	function simpan_item_penyakit($detail_penyakit){

		$this->db->replace('ms_penyakit',$detail_penyakit);
	}
	
	function delete_item_kckhusus($no_registrasi){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_kecakapan_santri');
	}

	function simpan_item_kckhusus($detail_kckhusus){

		$this->db->replace('ms_kecakapan_santri',$detail_kckhusus);
	}

    function update_photo($no_registrasi,$str){

        $this->db->set('lamp_photo',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
    }

	function update_photo_ijazah($no_registrasi,$str){

        $this->db->set('lamp_ijazah',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
    }

	function update_photo_akte_kelahiran($no_registrasi,$str){

        $this->db->set('lamp_akta_kelahiran',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
    }

	function update_photo_kartukeluarga($no_registrasi,$str){

        $this->db->set('lamp_kk',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
    }

	function update_photo_skhun($no_registrasi,$str){

        $this->db->set('lamp_skhun',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
	}
	
	function update_photo_nisn($no_registrasi,$str){

        $this->db->set('lamp_nisn',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
    }

	function update_photo_trasnkip_nilai($no_registrasi,$str){

        $this->db->set('lamp_transkip_nilai',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
    }

	function update_photo_skb($no_registrasi,$str){

        $this->db->set('lamp_skkb',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
    }

	function update_photo_surat_kesehatan($no_registrasi,$str){

        $this->db->set('lamp_surat_kesehatan',$str);
        $this->db->where('no_registrasi',$no_registrasi);
        $this->db->update('ms_santri');   
	}
	
	function delete_item_donatur($no_registrasi){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_santri_donatur');
	}

	function simpan_item_donatur($detail_donatur){

		$this->db->replace('ms_santri_donatur',$detail_donatur);
	}

	function query_santri($no_registrasi){
		$data = array();
		$data=$this->db->query("SELECT a.kategori, a.no_registrasi, a.no_stambuk,DATE_FORMAT(a.thn_daftar,'%d-%m-%Y') AS thn_daftar,  DATE_FORMAT(a.thn_masuk,'%d-%m-%Y') as thn_masuk, a.rayon, a.kamar, a.bagian, 
		a.kel_sekarang, a.nisn, a.nisnlokal, a.nama_lengkap, a.nama_arab, a.nama_panggilan, a.hobi, 
		a.uang_jajan_perbulan, a.no_kk, a.nik, a.tempat_lahir, DATE_FORMAT(a.tgl_lahir,'%d-%m-%Y') as tgl_lahir, a.konsulat, 
		a.nama_sekolah,  DATE_FORMAT(a.thn_lulus,'%d-%m-%Y') as thn_lulus, a.alamat_sekolah, a.suku, a.kewarganegaraan, 
		a.jalan, a.no_rumah, a.dusun, a.desa, a.kecamatan, a.kabupaten, a.provinsi, a.kd_pos, a.no_tlp, 
		a.no_hp, a.email, a.fb, a.dibesarkan_di, a.lamp_ijazah, a.lamp_photo, a.lamp_akta_kelahiran, a.lamp_kk, a.lamp_skhun,a.lamp_nisn,
		 a.lamp_transkip_nilai, a.lamp_skkb, a.lamp_surat_kesehatan, b.pembiaya, b.biaya_perbulan_min, 
		b.biaya_perbulan_max, b.penghasilan, c.gol_darah, c.tinggi_badan, 
		c.berat_badan, c.khitan, c.kondisi_pendidikan, c.ekonomi_keluarga, c.situasi_rumah, 
		c.dekat_dengan, c.hidup_beragama, c.pengelihatan_mata, c.kaca_mata, c.pendengaran, c.operasi, 
		c.sebab, c.kecelakaan, c.akibat, c.alergi, c.thn_fisik, c.kelainan_fisik, a.aitam
		FROM ms_santri a LEFT JOIN
		trans_pembiayaan_siswa b ON a.no_registrasi= b.no_registrasi LEFT JOIN
		ms_fisik_santri c ON a.no_registrasi= c.no_registrasi
		WHERE a.no_registrasi = '$no_registrasi'")->row_array();
		return $data;
	}

	function query_sekolahAitam($no_registrasi){
		$this->db->select('*');
        $this->db->from('ms_santri_sekolah');
        $this->db->where('no_registrasi',$no_registrasi);
        
        return $this->db->get()->result();
	}

	function query_keluarga($no_registrasi){
		$this->db->select('kategori,nama,nik,binbinti,jenis_kelamin,status,tgl_wafat,umur,hari,sebab_wafat,status_perkawinan,pendapatan_ibu,sebab_tdk_bekerja,keahlian,status_rumah,kondisi_rumah,jml_asuh,pekerjaan,pend_terakhir,agama,suku,kewarganegaraan,ormas,orpol,kedukmas,thn_lulus,no_stambuk_alumni,tempat_lahir,hub_kel,keterangan,ktp');
		$this->db->select("DATE_FORMAT(tgl_lahir_keluarga,'%d-%m-%Y') as tgl_lahir_keluarga",false);
		$this->db->select("DATE_FORMAT(tgl_wafat,'%d-%m-%Y') as tgl_wafat",false);
        $this->db->from('ms_keluarga');
        $this->db->where('no_registrasi',$no_registrasi);
        
        return $this->db->get()->result();
	}

	function query_penyakit($no_registrasi){
		$this->db->select('*');
        $this->db->from('ms_penyakit');
        $this->db->where('no_registrasi',$no_registrasi);
        
        return $this->db->get()->result();
	}

	function query_kecakapankhusus($no_registrasi){
		$this->db->select('no_registrasi, bid_studi, olahraga, kesenian,keterampilan, lain_lain');
        $this->db->from('ms_kecakapan_santri');
        $this->db->where('no_registrasi',$no_registrasi);
        
        return $this->db->get()->row_array();
	}

	function query_donatur($no_registrasi){
		$this->db->select('ms_santri_donatur.no_registrasi, ms_santri_donatur.id_donatur, ms_donatur.nama_donatur, ms_donatur.kategori');
		$this->db->from('ms_santri_donatur');
		$this->db->join('ms_donatur', 'ms_donatur.id_donatur = ms_santri_donatur.id_donatur');
		$this->db->where('no_registrasi',$no_registrasi);
        
        return $this->db->get()->result();
	}
	
	function addto_data_santri($no_registrasi,$data_santri){
		// var_dump($data_santri);
		// exit();
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri',$data_santri);

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('trans_pembiayaan_siswa');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_fisik_santri');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri_sekolah');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_keluarga');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_penyakit');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_kecakapan_santri');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri_donatur');
	}

	function addto_data_toTMI($no_registrasi,$data_santri){
		// var_dump($data_santri);
		// exit();
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri',$data_santri);

		// $this->db->set('no_registrasi',$data_santri['no_registrasi']);
		// $this->db->where('no_registrasi',$no_registrasi);
		// $this->db->update('trans_pembiayaan_siswa');

		// $this->db->set('no_registrasi',$data_santri['no_registrasi']);
		// $this->db->where('no_registrasi',$no_registrasi);
		// $this->db->update('ms_fisik_santri');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri_sekolah');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_keluarga');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_penyakit');

		// $this->db->set('no_registrasi',$data_santri['no_registrasi']);
		// $this->db->where('no_registrasi',$no_registrasi);
		// $this->db->update('ms_kecakapan_santri');

		$this->db->set('no_registrasi',$data_santri['no_registrasi']);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri_donatur');
	}
	
	function nonaktif_santri($no_registrasi,$keterangan){
		
		$this->db->set('isnonaktif','1');
		$this->db->set('keterangan',$keterangan);
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri');
	}

	function delete_all_data_santri($no_registrasi){
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_santri');

		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_santri_sekolah');
		
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('trans_pembiayaan_siswa');
		
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_fisik_santri');

		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_santri_sekolah');

		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_keluarga');

		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_penyakit');

		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_kecakapan_santri');

		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->delete('ms_santri_donatur');
	}



	function get_gedung(){
		$data = $this->db->query ("SELECT * FROM ms_gedung ORDER BY kode_gedung");
		return $data;
	}

	function get_kamar(){
		$data = $this->db->query ("SELECT ms_kamar.kode_kamar, ms_kamar.nama, ms_kamar.kapasitas, ms_kamar.kode_gedung, ms_gedung.nama AS nama_gedung
									FROM ms_kamar
									INNER JOIN ms_gedung ON ms_kamar.kode_gedung = ms_gedung.kode_gedung WHERE iskelas ='0'");
		return $data;
	}

	function get_kelas(){
		$data = $this->db->query ("SELECT ms_kelashd.tingkat, ms_kelashd.tipe_kelas, ms_kelasdt.kode_kelas, ms_kelasdt.nama, ms_kelasdt.kapasitas
				FROM ms_kelasdt
				inner join ms_kelashd on ms_kelasdt.id_kelas = ms_kelashd.id_kelas ORDER BY ms_kelasdt.kode_kelas");
		return $data;
	}

	function get_bagian(){
		$data = $this->db->query ("SELECT * FROM ms_bagian ORDER BY kode_bagian");
		return $data;
	}

	function get_donatur(){
		$data = $this->db->query ("SELECT * FROM ms_donatur ORDER BY id_donatur");
		return $data;
	}

	function get_pengeluaran_global(){
		$data = array();
		$data = $this->db->query ("SELECT * FROM ms_limit_pengeluaran")->row_array();
		return $data;
	}
	
	
}