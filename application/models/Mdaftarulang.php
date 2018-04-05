<?php

class Mdaftarulang extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }
    
	#region index
	
	function get_kurikulum($id) {
		$this->db->where('id',$id);
		return $this->db->get('ms_tahun_ajaran')->row();
	}

     function get_gedung(){
		$data = $this->db->query ("SELECT * FROM ms_gedung ORDER BY kode_gedung");
		return $data;
	}

	function get_kamar(){
		$data = $this->db->query ("SELECT * FROM ms_kamar ORDER BY kode_kamar");
		return $data;
	}

	function get_kelas(){
		$data = $this->db->query ("SELECT ms_kelasHD.tingkat, ms_kelasHD.tipe_kelas, ms_kelasDT.kode_kelas, ms_kelasDT.nama, ms_kelasDT.kapasitas
				FROM ms_kelasDT
				inner join ms_kelasHD on ms_kelasDT.id_kelas = ms_kelasHD.id_kelas ORDER BY ms_kelasDT.kode_kelas");
		return $data;
	}

	function get_bagian(){
		$data = $this->db->query ("SELECT * FROM ms_bagian ORDER BY kode_bagian");
		return $data;
	}
	
	function get_potongan(){
		$data = $this->db->query ("SELECT * FROM ms_biaya_potongan ORDER BY id_potongan");
		return $data;
    }

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_thn_ajar','no_registrasi','kode_kelas','date');

        $sql = "SELECT trans_daftar_ulang.id, ms_tahun_ajaran.deskripsi, trans_daftar_ulang.no_registrasi, trans_daftar_ulang.date, ms_santri.rayon, ms_santri.bagian, ms_santri.kamar, ms_santri.kel_sekarang 
                FROM trans_daftar_ulang
                INNER JOIN ms_tahun_ajaran on trans_daftar_ulang.id_thn_ajar  = ms_tahun_ajaran.id
                INNER JOIN ms_santri on trans_daftar_ulang.no_registrasi = ms_santri.no_registrasi ";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
    }
    
    function delete_daftarulang($kode_daftarulang){
		$this->db->where('kode_daftarulang',$kode_daftarulang);
		$this->db->delete('ms_daftarulang');
	}
    #endregion index
   
    
    #region modal add daftar ulang
    function query_data_santri($no_registrasi){
        // $data = array();
		$data=$this->db->query("SELECT * from ms_santri where no_registrasi ='$no_registrasi' and no_registrasi NOT LIKE 'CT%' and no_registrasi NOT LIKE 'A%' AND no_registrasi NOT LIKE 'CA%'")->row();
		return $data;
	}  
	
    function query_data_tagihan($id_thn_ajar,$tipe_tagihan){
		$data=$this->db->query("select sum(nominal) as total_tagihan from ms_biaya where id_thn_ajar ='3' and kategori ='$tipe_tagihan'")->row();
		return $data;
	}

	function query_data_ms_semester(){
        $data = array();
		$data=$this->db->query("select distinct semester from ms_semester order by semester ASC")->result_array();
		return $data;
	}

	function query_data_ms_semester_bulanan($semester){
        $data = array();
		$data=$this->db->query("select bulan from ms_semester where semester = '$semester' order by semester ASC")->result_array();
		return $data;
	}
	
    function query_data_daftarulang($id_thn_ajar,$no_registrasi){
        $data = array();
		$data=$this->db->query("SELECT * from trans_daftar_ulang where id_thn_ajar ='$id_thn_ajar' and no_registrasi ='$no_registrasi' ")->row_array();
		return $data;
    }
	
	function simpan_data_tagihan($data_tagihan){
		// var_dump($data_tagihan);
		// exit();

		$this->db->replace('trans_tagihan',$data_tagihan);
		// $query = $this->db->last_query();
		// var_dump($query);
		// exit();
	}

    function simpan_data_daftarulang($data_daftarulang){

		$this->db->replace('trans_daftar_ulang',$data_daftarulang);
	}
	    
    function update_ms_santri($data_update_ms_santri,$no_registrasi){
        
        $this->db->where('no_registrasi',$no_registrasi);
		$this->db->update('ms_santri',$data_update_ms_santri);
	} 

    function update_data_daftarulang($kode_daftarulang,$data_daftarulang){
        
        $this->db->where('kode_daftarulang',$kode_daftarulang);
		$this->db->update('ms_daftarulang',$data_daftarulang);
	} 
    
    #endregion modal add daftar ulang
	
}