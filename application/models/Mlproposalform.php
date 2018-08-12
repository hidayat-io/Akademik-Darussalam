<?php

class Mlproposalform extends CI_Model 
{

	public function __construct()
	{

		// Call the CI_Model constructor
		parent::__construct();
    }    
    
    function get_data_fa() {
        $data = array();
		    $data = $this->db->query ("SELECT a.no_registrasi, b.nama_donatur, b.alamat, c.nama_lengkap, c.nik, c.jenis_kelamin, c.tempat_lahir, c.tgl_lahir, YEAR(CURRENT_TIMESTAMP) - YEAR(c.tgl_lahir) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(c.tgl_lahir, 5)) AS umur
                                        FROM ms_santri_donatur a
                                        INNER JOIN ms_donatur b ON a.id_donatur = b.id_donatur
                                        INNER JOIN ms_santri c ON a.no_registrasi = c.no_registrasi
                                        WHERE a.no_registrasi LIKE 'T%' OR a.no_registrasi LIKE 'A%' AND a.no_registrasi NOT LIKE 'C%'")->result();
        return $data;
				
    }

    function get_data_orgtua($no_registrasi,$kategori)
	{		
		$this->db->where('no_registrasi',$no_registrasi);
		$this->db->where('kategori',$kategori);
		return $this->db->get('ms_keluarga')->row();
	}
}
