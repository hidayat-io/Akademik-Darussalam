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

    function query_list_aitam(){

        $this->db->order_by('nama_lengkap');
        $this->db->like('no_registrasi','A');
        $this->db->not_like('no_registrasi','T');

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

        $this->db->select('ms_kelashd.id_kelas,ms_kelashd.tingkat, ms_kelashd.tipe_kelas, ms_kelasdt.kode_kelas, ms_kelasdt.nama, ms_kelasdt.kapasitas');
        $this->db->from('ms_kelasdt');
        $this->db->join('ms_kelashd', 'ms_kelasdt.id_kelas = ms_kelashd.id_kelas');
        $this->db->order_by('ms_kelasdt.nama');
        return $this->db->get();
    }

    function mget_list_tingkat(){

        $this->db->order_by('tingkat');
        return $this->db->get('ms_kelashd');
    }
    // function mget_list_kelas(){

    //     $this->db->order_by('nama');

    //     return $this->db->get('ms_kelas');
    // }

    function mget_list_donatur(){

        $this->db->order_by('nama_donatur');
        return $this->db->get('ms_donatur')->result();
    }

    function mget_list_pendidikan(){

        $this->db->order_by('id_pendidikan');
        return $this->db->get('ms_pendidikan');
    }

    function get_kurikulum_aktif() {

		$this->db->select('param_value');
		return $this->db->get('sys_param')->row();
    }
    
    function get_thn_ajar(){

		$data = $this->db->query ("SELECT * FROM ms_tahun_ajaran  order by id desc Limit 3 ");
		// $data = $this->db->query ("SELECT * FROM ms_tahun_ajaran where kategori='UTAMA' order by id desc Limit 2 ");
		return $data;
	}

	function get_hak_akses($user_id,$modul_id){

        $data =$this->db->query ("SELECT groupu.group_name,group_hak_akses.add,group_hak_akses.edit,group_hak_akses.delete 
                                    FROM group_hak_akses
                                    INNER JOIN groupu ON group_hak_akses.group_id = groupu.group_id
                                    INNER JOIN group_daftar_user ON groupu.group_id = group_daftar_user.group_id
                                    WHERE group_daftar_user.user_id = '$user_id' AND group_hak_akses.modul_id='$modul_id'")->row();

        return $data;
    }

    
    function mget_judul_modul($modul_id){

        $this->db->select('nama_modul');
        $this->db->where('modul_id',$modul_id);
        return $this->db->get('modul')->row()->nama_modul;
    }
}