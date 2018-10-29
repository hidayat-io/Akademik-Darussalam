<?php

class Mkelas extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

	#region kelasHD
	function get_list_dataHD($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('id_kelas','tingkat','tipe_kelas');

        $sql = "SELECT *
				FROM ms_kelashd";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		// var_dump($sql);

		return $this->db->query($sql)->result();
	}

	function query_cekkelasHD($tingkat,$tipe_kelas){
        $data = array();
		// $data=$this->db->query("SELECT * from ms_kelas where kode_kelas ='$kode_kelas'")->row_array();
		$data=$this->db->query("SELECT * FROM ms_kelashd
								where tingkat ='$tingkat' and tipe_kelas ='$tipe_kelas'")->row_array();
		return $data;
	}

	function query_kelasHD($id_kelas){
        $data = array();
		// $data=$this->db->query("SELECT * from ms_kelas where kode_kelas ='$kode_kelas'")->row_array();
		$data=$this->db->query("SELECT * FROM ms_kelashd
								where id_kelas ='$id_kelas'")->row_array();
		return $data;
	}

	function simpan_data_kelasHD($data_kelasHD){

		$this->db->replace('ms_kelashd',$data_kelasHD);
	}
    
    function update_data_kelasHD($id_kelas,$data_kelasHD){
        
        $this->db->where('id_kelas',$id_kelas);
		$this->db->update('ms_kelashd',$data_kelasHD);
	}

	function delete_kelasHD($id_kelas){
		$this->db->where('id_kelas',$id_kelas);
		$this->db->delete('ms_kelashd');
	}
	#endregion kelasHD

	#region kelasDT
	function get_kamar(){
		$data = $this->db->query ("SELECT * FROM ms_kamar where iskelas ='1' ORDER BY kode_kamar");
		return $data;
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('kode_kelas','tingkat','tipe_kelas','nama','kapasitas','nama_kamar');

        $sql = "SELECT ms_kelashd.tingkat, ms_kelashd.tipe_kelas, ms_kelasdt.kode_kelas, ms_kelasdt.nama, ms_kamar.kapasitas, ms_kamar.kode_kamar,ms_kamar.nama as nama_kamar
				FROM ms_kelasdt
				inner join ms_kelashd on ms_kelasdt.id_kelas = ms_kelashd.id_kelas
				inner join ms_kamar on ms_kelasdt.kode_kamar = ms_kamar.kode_kamar";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		// var_dump($sql);

		return $this->db->query($sql)->result();
	}
	
	function delete_kelas($kode_kelas){
		$this->db->where('kode_kelas',$kode_kelas);
		$this->db->delete('ms_kelasdt');
	}

	function simpan_data_kelas($data_kelas){

		$this->db->replace('ms_kelasdt',$data_kelas);
	}
    
    function update_data_kelas($kode_kelas,$data_kelas){
        
        $this->db->where('kode_kelas',$kode_kelas);
		$this->db->update('ms_kelasdt',$data_kelas);
	}

    function query_kelas($kode_kelas){
        $data = array();
		// $data=$this->db->query("SELECT * from ms_kelas where kode_kelas ='$kode_kelas'")->row_array();
		$data=$this->db->query("SELECT ms_kelashd.id_kelas, ms_kelashd.tingkat, ms_kelashd.tipe_kelas, ms_kelasdt.kode_kelas, ms_kelasdt.nama, ms_kamar.kapasitas, ms_kamar.kode_kamar,ms_kamar.nama as nama_kamar
				FROM ms_kelasdt
				inner join ms_kelashd on ms_kelasdt.id_kelas = ms_kelashd.id_kelas 
				inner join ms_kamar on ms_kelasdt.kode_kamar = ms_kamar.kode_kamar 
				where ms_kelasdt.kode_kelas ='$kode_kelas'")->row_array();
		return $data;
	}

    function query_kamar($kamar){
        $data = array();
		// $data=$this->db->query("SELECT * from ms_kelas where kode_kelas ='$kode_kelas'")->row_array();
		$data=$this->db->query("SELECT ms_kelashd.id_kelas, ms_kelashd.tingkat, ms_kelashd.tipe_kelas, ms_kelasdt.kode_kelas, ms_kelasdt.nama, ms_kamar.kapasitas, ms_kamar.kode_kamar,ms_kamar.nama as nama_kamar
				FROM ms_kelasdt
				inner join ms_kelashd on ms_kelasdt.id_kelas = ms_kelashd.id_kelas 
				inner join ms_kamar on ms_kelasdt.kode_kamar = ms_kamar.kode_kamar 
				where ms_kelasdt.kode_kamar ='$kamar'")->row_array();
		return $data;
	}
	#endregion KelasDT


	
}