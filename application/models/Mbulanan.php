<?php

class Mbulanan extends CI_Model {

public function __construct(){

        // Call the CI_Model constructor
        parent::__construct();
    }

	function get_list_data($param,$sortby=0,$sorttype='desc'){

        $cols = array('id','tgl_tabungan','t.no_registrasi','nama_lengkap','kel_sekarang','tipe','nominal','keterangan');

     //   $sql = "SELECT t.*,s.kel_sekarang,s.nama_lengkap
	//				FROM ms_tabungan t
	//					INNER JOIN ms_santri s
	//						ON t.no_registrasi=s.no_registrasi";

        $sql = "SELECT a.*,b.kel_sekarang,b.nama_lengkap,saldo
				FROM ms_tabungan a INNER JOIN ms_santri b
				ON a.no_registrasi=b.no_registrasi LEFT JOIN tabungan_temp c
				ON a.no_registrasi=c.no_registrasi";

		if($param!=null){

			$sql .= " WHERE ".$param;
		}


        $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

        return $this->db->query($sql)->result();
    }


	function query_data_noreg($noreg){

		//$this->db->select('no_registrasi,nama_lengkap');
		//$this->db->from('ms_santri');
		//$this->db->where('no_registrasi',$noreg);
		//$r = $this->db->get()->row();


		//$sql="SELECT a.no_registrasi,nama_lengkap,saldo
		//		FROM ms_santri a INNER JOIN tabungan_temp b
		//		ON a.no_registrasi= b.no_registrasi
		//		WHERE a.no_registrasi=$noreg";

		$sql="SELECT id,a.no_registrasi,nama_lengkap,tgl_tabungan,tipe,nominal,keterangan,saldo
				FROM ms_santri a LEFT JOIN ms_tabungan b
				ON a.no_registrasi = b.no_registrasi LEFT JOIN tabungan_temp c
				ON a.no_registrasi = c.no_registrasi
				WHERE a.no_registrasi='$noreg'";

		$r = $this->db->query($sql)->row();

		return $r;
	}

	function query_data_noregsrch($noreg){


		$sql="SELECT id,a.no_registrasi,nama_lengkap,tgl_tabungan,tipe,nominal,keterangan,saldo
				FROM ms_santri a LEFT JOIN ms_tabungan b
				ON a.no_registrasi = b.no_registrasi LEFT JOIN tabungan_temp c
				ON a.no_registrasi = c.no_registrasi
				WHERE a.no_registrasi='$noreg'";

		$r = $this->db->query($sql)->row();

		return $r;
	}

	function insert_new($data){

       $this->db->insert('ms_tabungan', $data);
    }

    function update_data($id,$data){

        $this->db->where('id',$id);
        $this->db->update('ms_tabungan',$data);
    }

    function m_hapus_data($id,$tipe,$nom,$noregis,$user,$saldo_temp){

    	// jika dapat data yang diminta //
    	// jika tipe == i maka saldo akan dikurangi //
    	// jika tipe == o maka saldo atau tabungan akan ditambahkan //

    	$operator=$tipe=='i'?'-':'+';

	    	$sql = "INSERT INTO tabungan_temp(no_registrasi,saldo,recuser)
	    				VALUES('".$noregis."',".$nom.",'".$user."')
	    					ON DUPLICATE KEY UPDATE saldo=(saldo".$operator.$nom."),recuser='".$user."'";
	    	
	    	$this->db->query($sql);


    	$this->db->where('id',$id);
    	$this->db->delete('ms_tabungan');
    }

    function update_saldo($noreg,$tipe,$nominal,$user){


    	$operator=$tipe=='i'?'+':'-';

    	$sql = "INSERT INTO tabungan_temp(no_registrasi,saldo,recuser)
    				VALUES('".$noreg."',".$nominal.",'".$user."')
    					ON DUPLICATE KEY UPDATE saldo=saldo".$operator.$nominal.",recuser='".$user."'";

    	$this->db->query($sql);
    }

	function update_saldo_updt($noreg,$tipe,$nominal,$user,$saldo_temp){


	    	$operator=$tipe=='i'?'+':'-';

	    	$sql = "INSERT INTO tabungan_temp(no_registrasi,saldo,recuser)
	    				VALUES('".$noreg."',".$nominal.",'".$user."')
	    					ON DUPLICATE KEY UPDATE saldo=(saldo-".$saldo_temp.")".$operator.$nominal.",recuser='".$user."'";

	    	$this->db->query($sql);
	    }

	function query_getdata($id){
     	

		$sql ="SELECT id,a.no_registrasi,nama_lengkap,tgl_tabungan,tipe,nominal,keterangan,saldo,DATE_FORMAT(tgl_tabungan,'%d-%m-%Y') as itgl
				FROM ms_tabungan a INNER JOIN ms_santri b
				ON a.no_registrasi = b.no_registrasi INNER JOIN tabungan_temp c
				ON a.no_registrasi = c.no_registrasi Where id=$id";

		return $this->db->query($sql)->row();
    }

    function query_getdatasaldo($nosantri){
     	
		$sql ="SELECT * from tabungan_temp Where no_registrasi='$nosantri'";

		return $this->db->query($sql)->row();
    }

    function get_list_data_santri($param,$sortby=0,$sorttype='desc'){

        $cols = array('no_registrasi','nama_lengkap','kelas_sekolah','saldo','nominal');


        $sql = "SELECT a.no_registrasi,nama_lengkap, kelas_sekolah, 		nominal, saldo 
				FROM ms_santri a INNER JOIN ms_santri_pengeluaran b
				ON a.no_registrasi=b.no_registrasi INNER JOIN tabungan_temp c
				ON a.no_registrasi = c.no_registrasi";

		if($param!=null){

			$sql .= " WHERE ".$param;
		}


        $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

        return $this->db->query($sql)->result();
    }

}
