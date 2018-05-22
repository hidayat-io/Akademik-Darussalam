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
		
        $cols = array('id_pembayaran','no_registrasi','tanggal','tipe_pembayaran','semester','keterangan');

		$sql = "SELECT trans_pembayaranhd.id_pembayaran,trans_pembayaranhd.no_registrasi,ms_santri.nama_lengkap,trans_pembayaranhd.tanggal,trans_pembayaranhd.tipe_pembayaran,trans_pembayaranhd.semester,trans_pembayaranhd.keterangan 
				FROM trans_pembayaranhd
				INNER JOIN ms_santri ON trans_pembayaranhd.no_registrasi= ms_santri.no_registrasi";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}
	
	function query_get_data_pembayaran($no_registrasi,$tipe_pembayaran,$semester){
        $data = array();
		$data=$this->db->query("SELECT trans_tagihan.id_tagihan,trans_tagihan.id_thn_ajar,trans_tagihan.no_registrasi,ms_santri.nama_lengkap,trans_tagihan.ket_bulan,trans_tagihan.total_tagihan
								FROM trans_tagihan 
								INNER JOIN ms_santri ON trans_tagihan.no_registrasi= ms_santri.no_registrasi
								WHERE trans_tagihan.no_registrasi = '$no_registrasi' AND trans_tagihan.tipe_tagihan = '$tipe_pembayaran' AND trans_tagihan.ket_semester ='$semester' 
								order by trans_tagihan.ket_bulan ASC")->result_array();
		return $data;
		// $data = $this->db->last_query();
		// var_dump($data);
		// exit();
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

    function query_status_pembayaran_bulanan($no_registrasi,$id_tagihan){
        $data = array();
		$data=$this->db->query("SELECT trans_pembayaranhd.tanggal
								FROM trans_pembayaranhd 
								INNER JOIN trans_pembayarandt ON trans_pembayaranhd.id_pembayaran = trans_pembayarandt.id_pembayaranhd
								WHERE trans_pembayaranhd.no_registrasi='$no_registrasi' and trans_pembayarandt.id_tagihan='$id_tagihan'")->row_array();
		return $data;
        // $data = $this->db->last_query();
		// var_dump($data);
		// exit();
	}

	function simpan_pembayaranhd($data_pembayaranhd){

		$id = $this->db->insert('trans_pembayaranhd',$data_pembayaranhd);		
		return $this->db->insert_id();
	}

	function simpan_pembayarandt($data_pembayarandt){

		$this->db->insert('trans_pembayarandt',$data_pembayarandt);	
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
	





    function update_data_pembayaran($kode_pembayaran,$data_pembayaran){
        
        $this->db->where('id_pembayaran',$kode_pembayaran);
		$this->db->update('ms_bankpembayaran',$data_pembayaran);
	}



    function query_get_pembayaran($id_pembayaran){
        $data = array();
		$data=$this->db->query("SELECT * from ms_bankpembayaran where id_pembayaran ='$id_pembayaran'")->row_array();
		return $data;
        
        // return $this->db->get()->result();
	}

	
}