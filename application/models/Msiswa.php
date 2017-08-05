<?php

class Msiswa extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

	function get_list_data($user,$menu)
	{
		$this->db->where('user',$user);
		$this->db->where('menu',$menu);
		$data = $this->db->get('query')->row();
		if($data==null)
		{ //data null = pertama kali load page

			$this->db->select('no_registrasi, thn_masuk, nama_lengkap, nama_arab, 
			nama_panggilan, uang_jajan_perbulan,no_kk, nik, tempat_lahir, tgl_lahir ');
			$this->db->from('ms_santri');
			$this->db->order_by('no_registrasi','desc');
			return $this->db->get()->result();

			//query yang akan digunakan untuk export ke excel
			$this->insert_query_report();
		}
		else
		{
			$query = $data->query;
			return $this->db->query($query)->result();
		}
	}

	
	function insert_query($param)
	{
		$sql 	= "SELECT * from ms_santri";

		if(trim($param)!='')$sql .= " WHERE ".$param;

		$sql .= " ORDER BY no_registrasi DESC";
		$ardata = array(

			'user' 	=> $this->session->userdata('logged_in')['uid'],
			'menu' 	=> 'csantri',
			'query'	=> $sql
		);

		$this->db->replace('query',$ardata);
		// print($print);
						// //query yang akan digunakan untuk export ke excel
		$this->insert_query_report($param);
	}

	function insert_query_report($param='')
	{
		$sql 	= "SELECT * from ms_santri";

		if(trim($param)!='')$sql .= " WHERE ".$param;

		$sql .= " ORDER BY no_registrasi DESC";

		$ardata = array(
			'user' 	=> $this->session->userdata('logged_in')['uid'],
			'menu' 	=> 'export-csantri',
			'query'	=> $sql
		);

	$this->db->replace('query',$ardata);
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

	function simpan_data_santri($data_santri){

		$this->db->replace('ms_santri',$data_santri);
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

	function simpan_pembiayaan_siswa($data_trans_pembiayaan_siswa){

		$this->db->replace('trans_pembiayaan_siswa',$data_trans_pembiayaan_siswa);
	}

	function simpan_ms_fisik_santri($data_ms_fisik_santri){

		$this->db->replace('ms_fisik_santri',$data_ms_fisik_santri);
	}

	function simpan_item_keluarga($detail_keluarga){

		$this->db->replace('ms_keluarga',$detail_keluarga);
	}

	function simpan_item_penyakit($detail_penyakit){

		$this->db->replace('ms_penyakit',$detail_penyakit);
	}

	function simpan_item_kckhusus($detail_kckhusus){

		$this->db->replace('ms_kecakapan_santri',$detail_kckhusus);
	}

	function query_santri($no_registrasi){
		$data = array();
		$data=$this->db->query("SELECT a.kategori, a.no_registrasi, a.no_stambuk, a.thn_masuk, a.rayon, a.kamar, a.bagian, 
		a.kel_sekarang, a.nisn, a.nisnlokal, a.nama_lengkap, a.nama_arab, a.nama_panggilan, a.hobi, 
		a.uang_jajan_perbulan, a.no_kk, a.nik, a.tempat_lahir, a.tgl_lahir, a.konsulat, 
		a.nama_sekolah, a.kelas_sekolah, a.alamat_sekolah, a.suku, a.kewarganegaraan, 
		a.jalan, a.no_rumah, a.dusun, a.desa, a.kecamatan, a.kabupaten, a.provinsi, a.kd_pos, a.no_tlp, 
		a.no_hp, a.email, a.fb, a.dibesarkan_di, a.lamp_ijazah, a.lamp_photo, a.lamp_akta_kelahiran, a.lamp_kk, a.lamp_skhun,
		 a.lamp_transkip_nilai, a.lamp_skkb, a.lamp_surat_kesehatan, b.pembiaya, b.biaya_perbulan_min, 
		b.biaya_perbulan_max, b.penghasilan, c.gol_darah, c.tinggi_badan, 
		c.berat_badan, c.khitan, c.kondisi_pendidikan, c.ekonomi_keluarga, c.situasi_rumah, 
		c.dekat_dengan, c.hidup_beragama, c.pengelihatan_mata, c.kaca_mata, c.pendengaran, c.operasi, 
		c.sebab, c.kecelakaan, c.akibat, c.alergi, c.thn_fisik, c.kelainan_fisik
		FROM ms_santri a INNER JOIN
		trans_pembiayaan_siswa b ON a.no_registrasi= b.no_registrasi INNER JOIN
		ms_fisik_santri c ON a.no_registrasi= c.no_registrasi
		WHERE a.no_registrasi = '$no_registrasi'")->row_array();
		// $data=$this->db->query("SELECT p.no_pembelian,DATE_FORMAT(p.tgl_pembelian,'%d-%m-%Y') as tgl_pembelian,p.kode_supplier,p.nama_supplier,p.kode_barang,v.nama_barang,p.jumlah,p.harga FROM
		// 			pembelian p LEFT OUTER JOIN master_barang v ON p.kode_barang=v.kode_barang where p.no_pembelian='$no_pembelian'")->row_array();
		return $data;
	}

	function query_keluarga($no_registrasi){
		$this->db->select('*');
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
        
        return $this->db->get()->result();
	}

	
	
}