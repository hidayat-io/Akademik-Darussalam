<?php

class Mbiaya extends CI_Model 
{

	public function __construct() {

		// Call the CI_Model constructor
		parent::__construct();
	}
	
#region ms_biaya
	function get_list_data(){     

		$sql = "SELECT DISTINCT ms_biaya_komponen.tipe, ms_tahun_ajaran.id,ms_tahun_ajaran.deskripsi
                FROM ms_biaya_komponen
				LEFT JOIN ms_biaya ON ms_biaya_komponen.id_komponen = ms_biaya.nama_item
				INNER JOIN ms_tahun_ajaran on ms_biaya.id_thn_ajar = ms_tahun_ajaran.id
				order by id desc";

		return $this->db->query($sql)->result();
    }
    
    function get_nominal($kategori,$id_thn_ajar) {
		$data = array();
		if($kategori !='')
		{
		$data=$this->db->query("SELECT sum(nominal) AS NOMINAL
								FROM ms_biaya
								WHERE kategori = '$kategori'
								AND id_thn_ajar = '$id_thn_ajar'")->row();
		}
		else {
			$data=$this->db->query("SELECT sum(nominal) AS NOMINAL
								FROM ms_biaya")->row();
		}
		// echo $this->db->last_query();
		// exit();
		return $data;
    }
    
    function get_komponen($tipe){
		$data = array();
		$data = $this->db->query ("SELECT *
                                    FROM ms_biaya_komponen 
                                    WHERE tipe = '$tipe' and isActive ='1' ORDER BY id_komponen ASC")->result_array();
		return $data;
	}
	
	function query_databiaya($id_thn_ajar,$tipe){
		$data = array();
		$data = $this->db->query ("SELECT *
									FROM ms_biaya
									WHERE id_thn_ajar = '$id_thn_ajar' 
									AND kategori = '$tipe'")->row_array();
		return $data;
	}

	function query_databiaya_edit($id_thn_ajar,$tipe){
		$data = array();
		$data = $this->db->query ("SELECT ms_biaya.id, ms_biaya.id_thn_ajar, ms_biaya.kategori,ms_biaya.nama_item, ms_biaya.nominal, ms_biaya_komponen.nama_komponen
									FROM ms_biaya
									INNER JOIN ms_biaya_komponen on ms_biaya.nama_item= ms_biaya_komponen.id_komponen
									WHERE ms_biaya.id_thn_ajar = '$id_thn_ajar' 
									AND ms_biaya.kategori = '$tipe'")->result_array();
		return $data;
	}
	


	function simpan_biaya($data){
		$this->db->insert('ms_biaya',$data);
	}

	function del_biaya($select_thnaajar,$tipe){
		$this->db->where('id_thn_ajar',$select_thnaajar);	
		$this->db->where('kategori',$tipe);
		$this->db->delete('ms_biaya');
	}

#endregion ms_biaya

#region potongan
	function get_potongan(){
		$this->db->order_by('rec_date','desc');
		return $this->db->get('ms_biaya_potongan')->row();
	}

	function get_list_data_potongan(){     

		$sql = "SELECT *
                FROM ms_biaya_potongan
				order by id_potongan asc";
		

		return $this->db->query($sql)->result();
	}
	
	function query_potongan($id_potongan){
		$data = array();
		$data=$this->db->query("SELECT * from ms_biaya_potongan where id_potongan ='$id_potongan'")->row_array();
		return $data;
	}
	
	function _save_potongan($data_potongan)
	{
		$this->db->insert('ms_biaya_potongan',$data_potongan);
	}

	function _update_potongan($id_potongan,$data_potongan)
	{
		$this->db->where('id_potongan',$id_potongan);
		$this->db->update('ms_biaya_potongan',$data_potongan);
	}

	function _DelPotongan($id_potongan){
		$this->db->where('id_potongan',$id_potongan);
		$this->db->delete('ms_biaya_potongan');
	}
#endregion 
    

}