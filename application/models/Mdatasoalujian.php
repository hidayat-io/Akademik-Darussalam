<?php

class Mdatasoalujian extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }
    
    function get_thn_ajar(){
		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran where kategori='UTAMA' order by id desc Limit 2 ");
		return $data;
	}

    function get_kelas(){
		$data = $this->db->query ("SELECT * FROM ms_kelas");
		return $data;
	}

    function get_list_data($param,$sortby=0,$sorttype='desc'){
        // var_dump($param);
        // exit();
		
        $cols = array('kode_soal','kurikulum','semester','id_matpal','tingkat','user_id');

		$sql = "SELECT trans_banksoalHD.* ,ms_tahun_ajaran.deskripsi FROM trans_banksoalHD
				INNER JOIN ms_tahun_ajaran ON trans_banksoalHD.kurikulum = ms_tahun_ajaran.id";
                    

            if($param!=null){

                $sql .= " WHERE ".$param;
                
            }
		

		$sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;
		

		return $this->db->query($sql)->result();
	}

	function _delete_datasoalHD($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('trans_banksoalHD');
	}

	function _delete_datasoalDT($id_hd)
	{
		$this->db->where('id_hd',$id_hd);
		$this->db->delete('trans_banksoalDT');
	}

	function get_print_soal_header($id)
	{
		$data = array();
		$data=$this->db->query("SELECT trans_banksoalhd.id, trans_banksoalhd.kode_soal,  ms_tahun_ajaran.deskripsi , trans_banksoalhd.semester, trans_banksoalhd.tingkat, ms_mata_pelajaran.nama_matpal
								FROM trans_banksoalhd
								INNER JOIN ms_tahun_ajaran ON trans_banksoalhd.kurikulum = ms_tahun_ajaran.id
								INNER JOIN ms_mata_pelajaran ON trans_banksoalhd.id_matpal = ms_mata_pelajaran.id_matpal
								where trans_banksoalhd.id = '$id'")->row_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}

	function get_print_soal($id)
	{
		$data = array();
		$data=$this->db->query("SELECT trans_banksoalhd.id, ms_tahun_ajaran.deskripsi , trans_banksoalhd.semester, trans_banksoalhd.tingkat, ms_mata_pelajaran.nama_matpal,
								ms_banksoal.soal, ms_banksoal.jwb_a, ms_banksoal.jwb_b, ms_banksoal.jwb_c, ms_banksoal.jwb_d
								FROM trans_banksoalhd
								INNER JOIN ms_tahun_ajaran ON trans_banksoalhd.kurikulum = ms_tahun_ajaran.id
								INNER JOIN ms_mata_pelajaran ON trans_banksoalhd.id_matpal = ms_mata_pelajaran.id_matpal
								INNER JOIN trans_banksoaldt ON trans_banksoalhd.id = trans_banksoaldt.id_hd
								INNER JOIN ms_banksoal ON trans_banksoaldt.id_soal = ms_banksoal.id_soal
								where trans_banksoalhd.id = '$id'")->result_array();
								// echo $this->db->last_query();
								// exit();
		return $data;
	}
	
	#region model
	function get_banksoal($param)
	{

			$sql = "SELECT * FROM MS_banksoal
					".$param;
			

			return $this->db->query($sql);
	}

	function _insert_newHD($dataHD){

		$id = $this->db->insert('trans_banksoalhd',$dataHD);
		
		return $this->db->insert_id();
	}

	function _insert_newDT($dataDT){

		$this->db->insert('trans_banksoaldt',$dataDT);
	}
	#endregion model

	
}