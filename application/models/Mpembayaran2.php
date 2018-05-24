<?php

class Mpembayaran extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

	function get_kurikulum($id) {
		$this->db->where('id',$id);
		return $this->db->get('ms_tahun_ajaran')->row();
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('trans_pembayaranhd.id_pembayaran','ms_tahun_ajaran.deskripsi','trans_pembayaranhd.tanggal','trans_pembayaranhd.no_registrasi','ms_santri.nama_lengkap','trans_pembayaranhd.tipe_pembayaran','trans_pembayaranhd.semester','trans_pembayaranhd.keterangan');

		$sql = "SELECT trans_pembayaranhd.id_pembayaran,trans_pembayaranhd.no_registrasi,ms_tahun_ajaran.deskripsi,ms_santri.nama_lengkap,DATE_FORMAT(trans_pembayaranhd.tanggal,'%d-%m-%Y') AS tanggal,trans_pembayaranhd.tipe_pembayaran,trans_pembayaranhd.semester,trans_pembayaranhd.keterangan 
				FROM trans_pembayaranhd
				INNER JOIN ms_santri ON trans_pembayaranhd.no_registrasi= ms_santri.no_registrasi
				INNER JOIN ms_tahun_ajaran on trans_pembayaranhd.id_thn_ajar = ms_tahun_ajaran.id";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function query_get_data_tagihan($no_registrasi,$tipe_pembayaran,$semester,$id_thn_ajar){
        $data = array();
		$data=$this->db->query("SELECT trans_tagihan.*, ms_santri.nama_lengkap 
								FROM trans_tagihan 
								INNER JOIN ms_santri ON trans_tagihan.no_registrasi = ms_santri.no_registrasi 
								WHERE trans_tagihan.no_registrasi = 'T39180002' 
								AND trans_tagihan.id_thn_ajar = '3' 
								AND trans_tagihan.tipe_tagihan = 'B' 
								AND trans_tagihan.ket_semester ='SEMESTER1'
								ORDER BY trans_tagihan.ket_bulan ASC")->result_array();
		// $data = $this->db->last_query();
		// var_dump($data);
		// exit();
		return $data;
	}

    function query_get_sisa_potongan($no_registrasi,$id_tagihan){
        $data = array();
		$data=$this->db->query("SELECT SUM(trans_pembayarandt.nominal) AS total_pembayaran
								FROM trans_pembayaranhd 
								INNER JOIN trans_pembayarandt ON trans_pembayaranhd.id_pembayaran = trans_pembayarandt.id_pembayaranhd
								WHERE trans_pembayaranhd.no_registrasi='$no_registrasi' and trans_pembayarandt.id_tagihan='$id_tagihan'")->row_array();
		return $data;
		// $data = $this->db->last_query();
		// var_dump($data);
		// exit();
        
	}

    function query_status_pembayaran_bulanan($no_registrasi,$id_thn_ajar,$id_tagihan){
        $data = array();
		$data=$this->db->query("SELECT trans_pembayaranhd.tanggal,trans_pembayaranhd.id_pembayaran,trans_pembayarandt.id_tagihan,trans_pembayarandt.nominal
								FROM trans_pembayaranhd 
								INNER JOIN trans_pembayarandt ON trans_pembayaranhd.id_pembayaran = trans_pembayarandt.id_pembayaranhd 
								WHERE trans_pembayaranhd.no_registrasi='$no_registrasi' and trans_pembayaranhd.id_thn_ajar ='$id_thn_ajar' 
								and trans_pembayarandt.id_tagihan='$id_tagihan'")->row_array();
        // $data = $this->db->last_query();
		// var_dump($data);
		// exit();
		return $data;
	}

	function simpan_pembayaranhd($data_pembayaranhd){

		$id = $this->db->insert('trans_pembayaranhd',$data_pembayaranhd);		
		return $this->db->insert_id();
	}

	function simpan_pembayarandt($data_pembayarandt){

		$this->db->insert('trans_pembayarandt',$data_pembayarandt);	
	}

	function update_pembayaranhd($data_pembayaranhd,$id_pembayaran){
		$this->db->where('id_pembayaran',$id_pembayaran);		
		$this->db->update('trans_pembayaranhd',$data_pembayaranhd);
	}

	function update_pembayarandt($data_pembayarandt,$id_pembayaran){
		$this->db->where('id_pembayaranhd',$id_pembayaran);
		$this->db->update('trans_pembayarandt',$data_pembayarandt);	
	}
	
	function delete_pembayaranhd($id_pembayaran){
		$this->db->where('id_pembayaran',$id_pembayaran);
		$this->db->delete('trans_pembayaranhd');
	}

	function delete_pembayarandt($id_pembayaran){
		$this->db->where('id_pembayaranhd',$id_pembayaran);
		$this->db->delete('trans_pembayarandt');
	}

	function get_print_pembayaran_header($id_pembayaran)
	{
		$data = array();
		$data=$this->db->query("SELECT trans_pembayaranhd.`id_pembayaran`,trans_pembayaranhd.`no_registrasi`,ms_santri.`nama_lengkap`,trans_pembayaranhd.`tanggal`,trans_pembayaranhd.`tipe_pembayaran`,trans_pembayaranhd.`semester`,trans_pembayaranhd.`keterangan`
								FROM trans_pembayaranhd
								inner join ms_santri on trans_pembayaranhd.`no_registrasi`= ms_santri.`no_registrasi`
								WHERE trans_pembayaranhd.`id_pembayaran` = '$id_pembayaran'")->row_array();
		return $data;
	}

	function get_print_pembayaran($id_pembayaran)
	{
		$data = array();
		$data=$this->db->query("SELECT trans_pembayarandt.`id_pembayaranhd`,trans_pembayarandt.`id_tagihan`,trans_tagihan.`ket_bulan`,trans_tagihan.`tipe_tagihan`,trans_tagihan.`ket_semester`,trans_pembayarandt.`nominal`
								FROM trans_pembayarandt
								INNER JOIN trans_tagihan ON trans_pembayarandt.`id_tagihan` = trans_tagihan.`id_tagihan`
								where trans_pembayarandt.id_pembayaranhd = '$id_pembayaran'")->result_array();
		return $data;
	}
	
    // function query_get_pembayaran($id_pembayaran,$no_registrasi,$tipe_pembayaran,$semester){
    //     $data = array();

	// 	$data=$this->db->query("SELECT trans_tagihan.id_tagihan,trans_tagihan.id_thn_ajar,trans_tagihan.no_registrasi,ms_santri.nama_lengkap,trans_tagihan.ket_bulan,trans_tagihan.tipe_tagihan as tipe_pembayaran,trans_tagihan.ket_semester,trans_tagihan.total_tagihan
	// 							FROM trans_tagihan 
	// 							INNER JOIN ms_santri ON trans_tagihan.no_registrasi= ms_santri.no_registrasi
	// 							WHERE trans_tagihan.no_registrasi = '$no_registrasi' AND trans_tagihan.tipe_tagihan = '$tipe_pembayaran' AND trans_tagihan.ket_semester ='$semester' 
	// 							order by trans_tagihan.ket_bulan ASC")->result_array();
	// 	// $data = $this->db->last_query();
	// 	// var_dump($data);
	// 	// exit();
	// 	return $data;
	// }
    function query_get_pembayaran($id_pembayaran){
        $data = array();
		$data=$this->db->query("SELECT trans_pembayaranhd.id_pembayaran,trans_pembayaranhd.no_registrasi,trans_pembayaranhd.id_thn_ajar,ms_santri.nama_lengkap,DATE_FORMAT(trans_pembayaranhd.tanggal,'%d-%m-%Y') AS tanggal,
										trans_pembayaranhd.tipe_pembayaran,trans_pembayaranhd.semester,trans_pembayaranhd.keterangan,trans_pembayarandt.nominal, trans_tagihan.total_tagihan,trans_tagihan.id_tagihan,trans_tagihan.ket_bulan
								FROM trans_pembayaranhd 
								INNER JOIN trans_pembayarandt on trans_pembayaranhd.id_pembayaran = trans_pembayarandt.id_pembayaranhd
								INNER JOIN trans_tagihan on trans_pembayaranhd.no_registrasi = trans_tagihan.no_registrasi 
														AND trans_pembayaranhd.id_thn_ajar = trans_tagihan.id_thn_ajar 
														AND trans_pembayaranhd.tipe_pembayaran = trans_tagihan.tipe_tagihan 
														AND trans_pembayaranhd.semester = trans_tagihan.ket_semester
								INNER JOIN ms_santri on trans_pembayaranhd.no_registrasi = ms_santri.no_registrasi
								WHERE trans_pembayaranhd.`id_pembayaran`= '$id_pembayaran'")->result_array();
		// $data = $this->db->last_query();
		// var_dump($data);
		// exit();
		return $data;
		
        
        // return $this->db->get()->result();
	}




    function update_data_pembayaran($kode_pembayaran,$data_pembayaran){
        
        $this->db->where('id_pembayaran',$kode_pembayaran);
		$this->db->update('ms_bankpembayaran',$data_pembayaran);
	}





	
}