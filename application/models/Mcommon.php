<?php

class Mcommon extends CI_Model {

	function mcek_hak_akses($user,$modul){

		$this->db->select('gdu.user_id');
		$this->db->from('group_daftar_user gdu');
		$this->db->join('group_hak_akses gha','gdu.group_id=gha.group_id');
		$this->db->where('gdu.user_id',$user);
		$this->db->where('gha.modul_id',$modul);

		return $this->db->get()->row();
	}

	function query_list_santri(){

        $this->db->order_by('nama_lengkap');
		$this->db->like('no_registrasi','T');
		$this->db->not_like('no_registrasi','C');

        return $this->db->get('ms_santri')->result();
    }

    function mget_list_jabatan_guru(){

    	$this->db->order_by('nama_jabatan');
    	
    	return $this->db->get('ms_guru_jabatan');
    }

    function mget_list_master_guru($type=null){

        $this->db->order_by('id_guru','desc');
        if($type != null)
        {
            $this->db->where('is_pengajar','1');
        }
    	return $this->db->get('ms_guru');
    }

    function mget_list_mata_pelajaran(){

		$this->db->order_by('nama_matpal');
		$this->db->where('status','1');
        return $this->db->get('ms_mata_pelajaran');
    }

    function mget_config_lembaga(){

        return $this->db->get('ms_config');
    }

    function mget_list_santri($type='TMI'){

        $this->db->where('kategori',$type);
        $this->db->not_like('no_registrasi','C','after');
        $this->db->order_by('nama_lengkap');

        return $this->db->get('ms_santri');
    }

    function mget_list_kamar(){

        $this->db->order_by('nama');

        return $this->db->get('ms_kamar');
    }

    function mget_list_kelas(){
        $this->db->select('ms_kelasHD.id_kelas,ms_kelasHD.tingkat, ms_kelasHD.tipe_kelas, ms_kelasDT.kode_kelas, ms_kelasDT.nama, ms_kelasDT.kapasitas');
        $this->db->from('ms_kelasDT');
        $this->db->join('ms_kelasHD', 'ms_kelasDT.id_kelas = ms_kelasHD.id_kelas');
        $this->db->order_by('ms_kelasDT.nama');
        return $this->db->get();
    }

    function mget_list_tingkat(){
        $this->db->order_by('tingkat');

        return $this->db->get('ms_kelasHD');
    }
    // function mget_list_kelas(){

    //     $this->db->order_by('nama');

    //     return $this->db->get('ms_kelas');
    // }

    function mget_list_donatur(){
        $this->db->order_by('nama_donatur');
        return $this->db->get('ms_donatur')->result();
    }

    function get_kurikulum_aktif() {
		$this->db->select('param_value');
		return $this->db->get('sys_param')->row();
	}
    
}