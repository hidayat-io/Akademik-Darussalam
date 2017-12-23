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