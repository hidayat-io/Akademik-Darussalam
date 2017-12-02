<?php

class Tabungan_model extends CI_Model {

	public function __construct(){

        parent::__construct();
    }

	function get_list_data($param,$sortby=0,$sorttype='desc'){

        $cols = array('id','tgl_tabungan','t.no_registrasi','nama_lengkap','kel_sekarang','tipe','nominal','keterangan');

        $sql = "SELECT a.*,b.kel_sekarang,b.nama_lengkap,saldo
				FROM trans_tabungan a INNER JOIN ms_santri b
				ON a.no_registrasi=b.no_registrasi LEFT JOIN santri_saldo c
				ON a.no_registrasi=c.no_registrasi";

		if($param!=null){

			$sql .= " WHERE ".$param;
		}

        $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

        return $this->db->query($sql)->result();
    }

	function query_data_noreg($noreg){

		$sql="SELECT id,a.no_registrasi,nama_lengkap,tgl_tabungan,tipe,nominal,keterangan,saldo
				FROM ms_santri a LEFT JOIN trans_tabungan b
				ON a.no_registrasi = b.no_registrasi LEFT JOIN santri_saldo c
				ON a.no_registrasi = c.no_registrasi
				WHERE a.no_registrasi='$noreg'";

		$r = $this->db->query($sql)->row();

		return $r;
	}

	function query_data_noregsrch($noreg){

		$sql="SELECT id,a.no_registrasi,nama_lengkap,tgl_tabungan,tipe,nominal,keterangan,saldo
				FROM ms_santri a LEFT JOIN trans_tabungan b
				ON a.no_registrasi = b.no_registrasi LEFT JOIN santri_saldo c
				ON a.no_registrasi = c.no_registrasi
				WHERE a.no_registrasi='$noreg'";

		$r = $this->db->query($sql)->row();

		return $r;
	}

	function insert_new($data){

       $this->db->insert('trans_tabungan', $data);
    }

    function update_data($id,$data){

        $this->db->where('id',$id);
        $this->db->update('trans_tabungan',$data);
    }

    function m_hapus_data($id,$tipe,$nom,$noregis,$user,$saldo_temp){

    	$operator=$tipe=='i'?'-':'+';

	    	$sql = "INSERT INTO santri_saldo(no_registrasi,saldo,recuser)
	    				VALUES('".$noregis."',".$nom.",'".$user."')
	    					ON DUPLICATE KEY UPDATE saldo=(saldo".$operator.$nom."),recuser='".$user."'";

	    	$this->db->query($sql);


    	$this->db->where('id',$id);
    	$this->db->delete('trans_tabungan');
    }

	function update_saldo($noreg,$tipe,$nominal,$user){

    	$operator=$tipe=='i'?'+':'-';

    	$sql = "INSERT INTO santri_saldo(no_registrasi,saldo,recuser)
    				VALUES('".$noreg."',".$nominal.",'".$user."')
    					ON DUPLICATE KEY UPDATE saldo=saldo".$operator.$nominal.",recuser='".$user."'";

    	$this->db->query($sql);
    }

	function query_getdata($id){

		$sql ="SELECT id,a.no_registrasi,nama_lengkap,tgl_tabungan,tipe,nominal,keterangan,saldo,DATE_FORMAT(tgl_tabungan,'%d-%m-%Y') as itgl
				FROM trans_tabungan a INNER JOIN ms_santri b
				ON a.no_registrasi = b.no_registrasi INNER JOIN santri_saldo c
				ON a.no_registrasi = c.no_registrasi Where id=$id";

		return $this->db->query($sql)->row();
    }

    function query_getdatasaldo($nosantri){

		$sql ="SELECT * from santri_saldo WHERE no_registrasi='$nosantri'";

		return $this->db->query($sql)->row();
    }

    function get_list_data_santri($param,$sortby=0,$sorttype='desc'){

        $cols = array('no_registrasi','nama_lengkap','kelas_sekolah','saldo','nominal');

        $sql = "SELECT a.no_registrasi,nama_lengkap, kelas_sekolah, nominal, saldo
					FROM ms_santri a
				INNER JOIN ms_santri_pengeluaran b
					ON a.no_registrasi=b.no_registrasi
				INNER JOIN santri_saldo c
					ON a.no_registrasi = c.no_registrasi";

		if($param!=null){

			$sql .= " WHERE ".$param;
		}

        $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

        return $this->db->query($sql)->result();
    }

    function update_limit_pengeluaran($data){

    	$this->db->replace('santri_limit_harian',$data);
    }

    function mget_list_limit_pengeluaran($param){

    	$sql = "SELECT s.no_registrasi,
				       s.nama_lengkap,
				       kl.nama AS kelas,
				       sl.saldo,
				       lm.limit,
				       k.nama AS kamar
				FROM   ms_santri s
				       LEFT OUTER JOIN santri_saldo sl
				                    ON s.no_registrasi = sl.no_registrasi
				       LEFT OUTER JOIN santri_limit_harian lm
				                    ON lm.no_reg = sl.no_registrasi
				       LEFT OUTER JOIN ms_kamar k
				                    ON s.kamar = k.kode_kamar
				       INNER JOIN ms_kelas kl
				       				ON s.kel_sekarang = kl.kode_kelas
				WHERE  s.no_registrasi LIKE 'T%' ".$param;

		return $this->db->query($sql);
    }
}
