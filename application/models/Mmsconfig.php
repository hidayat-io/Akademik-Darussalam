<?php

class Mmsconfig extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
	}

    #region data akademik
        function get_list_data(){
             $sql = "SELECT * FROM ms_config";
            

            return $this->db->query($sql)->result();
        }
        
        function simpan_data_msconfig($data_msconfig){

            $this->db->replace('ms_config',$data_msconfig);
        }
        
        function update_data_msconfig($id_config,$data_msconfig){
            // var_dump($id_config,$data_msconfig);
            // exit();
            $this->db->where('id_config',$id_config);
            $this->db->update('ms_config',$data_msconfig);
        }

        function query_msconfig($nomor_statistik){
            $data = array();
            $data=$this->db->query("SELECT * from ms_config where nomor_statistik ='$nomor_statistik'")->row_array();
            return $data;
        }
            
        function query_edit_msconfig($id_config){
            $data = array();
            $data=$this->db->query("SELECT * from ms_config where id_config ='$id_config'")->row_array();
            return $data;
        }   

    #end region data akademik

    #region kurikulum

        function get_thn_ajar(){
            $data = $this->db->query ("SELECT * FROM ms_tahun_ajaran order by id desc Limit 3 ");
            return $data;
        }
    
        function get_list_data_kurikulum(){
            // var_dump($param);
            // exit();
            
            $sql = "SELECT * FROM sys_param";
           

            return $this->db->query($sql)->result();
        }

        function get_kurikulum($id) {
            $this->db->where('id',$id);
            return $this->db->get('ms_tahun_ajaran')->row();
        }

        function query_edit_kurikulum($param_id){
            $data = array();
            $data=$this->db->query("SELECT * from sys_param where param_id ='$param_id'")->row_array();
            return $data;
        }

        function update_data_kurikulum($param_id,$data){
            $this->db->where('param_id',$param_id);
            $this->db->update('sys_param',$data);
        }
    #endregion kurikulum
    
}