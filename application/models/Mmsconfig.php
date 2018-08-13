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

    #region limit Pengeluaran
        function get_list_data_LimitPengeluaran(){
            // var_dump($param);
            // exit();
            
            $sql = "SELECT * FROM ms_limit_pengeluaran";
           

            return $this->db->query($sql)->result();
        }

        function query_edit_LimitPengeluaran($id){
            $data = array();
            $data=$this->db->query("SELECT * from ms_limit_pengeluaran where id ='$id'")->row_array();
            return $data;
        }

        function update_data_LimitPengeluaran($id,$data_LimitPengeluaran){
            $this->db->where('id',$id);
            $this->db->update('ms_limit_pengeluaran',$data_LimitPengeluaran);
        }
        
        function update_data_LimitPengeluaran_santri($limit_lama,$data_LimitPengeluaran_santri){
            $this->db->where('uang_jajan_perbulan',$limit_lama);
            // $this->db->and('uang_jajan_perbulan',$limit_lama);
            $this->db->update('ms_santri',$data_LimitPengeluaran_santri);
        }
        #endregion Limit Pengeluaran
        
        #region generate kurikulum
        function query_cek_generate($id_thn_ajar,$semester){
            $data = array();
            $data=$this->db->query("SELECT * from trans_rapor where id_thn_ajar='$id_thn_ajar' and semester ='$semester'")->result_array();
            return $data;
        }

        function query_del_rapor_data($id_thn_ajar,$semester){
            $this->db->where('id_thn_ajar',$id_thn_ajar);
            $this->db->where('semester',$semester);
            $this->db->delete('trans_rapor');
        }

        function query_get_all_id($id_thn_ajar,$semester){
            $data = array();
            $data=$this->db->query("SELECT id from trans_nilai_hd where id_thn_ajar='$id_thn_ajar' and semester ='$semester'")->result_array();
            return $data;
        }
        
        function query_gen_all_nilai($id_nilai){
            $data = array();
            $data=$this->db->query("SELECT trans_nilai_hd.id, trans_nilai_hd.id_thn_ajar, trans_nilai_hd.semester, trans_nilai_hd.no_registrasi, trans_nilai_hd.kode_kelas, trans_nilai_hd.id_guru, trans_nilai_hd.id_mapel,trans_nilai_dt.nilai, sum(trans_nilai_dt.nilai) as total_nilai, count(trans_nilai_hd.id) as total_record 
                                    from trans_nilai_hd
                                    inner join trans_nilai_dt on trans_nilai_hd.id = trans_nilai_dt.id_hd
                                    where trans_nilai_hd.id= '$id_nilai'")->row_array();
            return $data;
        }

        function simpan_nilai_to_rapor($data_nilai){
            // var_dump($data_nilai);
            $this->db->insert('trans_rapor',$data_nilai);
        }
        #end generate kurikulum
        
    }