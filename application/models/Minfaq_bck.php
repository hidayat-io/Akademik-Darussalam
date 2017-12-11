<?php

class Minfaq extends CI_Model {
	
public function __construct(){

        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_list_data($param,$sortby=0,$sorttype='desc'){

        $cols = array('id_infaq','nama','alamat','tgl_infaq','tipe','nominal','keterangan');

        $sql = " SELECT id_infaq,b.id_donatur,nama_donatur,alamat,tgl_infaq,tipe,nominal,keterangan
                 FROM ms_infaq a LEFT JOIN ms_donatur b
                 ON a.id_donatur=b.id_donatur";

        if($param!=null){

            $sql .= " WHERE ".$param;
        }


        $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;

        return $this->db->query($sql)->result();
    }

    //simpan data saldo dari donatur
	function insert_new($data){

       $this->db->insert('ms_infaq', $data);
    }

    // insert penambahan saldo kedalam 
    // donatur saldo temp
    function update_saldo($id_donatur,$tipe,$nominal,$user){


        $operator=$tipe=='in'?'+':'-';

        $sql = "INSERT INTO donatur_temp(id_donatur,saldo,recuser)
                VALUES('".$id_donatur."',".$nominal.",'".$user."')
                ON DUPLICATE KEY UPDATE saldo=saldo".$operator.$nominal.",recuser='".$user."'";

        $this->db->query($sql);
    }



    function update_data($id,$data){

        $this->db->where('id_infaq',$id);
        $this->db->update('ms_infaq',$data);
    }


    function update_saldo_updt($id_donatur,$tipe,$nominal,$user,$saldo){


            $operator=$tipe=='i'?'+':'-';

            $sql = "INSERT INTO infaq_temp(id_donatur,saldo,recuser)
                    VALUES('".$id_donatur."',".$nominal.",'".$user."')
                    ON DUPLICATE KEY UPDATE saldo=saldo".$operator.$nominal.",recuser='".$user."'";

            $this->db->query($sql);
    }

    function query_getdata($id){


        $sql = " SELECT id_infaq,b.id_donatur,nama_donatur,alamat,DATE_FORMAT(tgl_infaq,'%d-%m-%Y') as itgl,        tgl_infaq,tipe,nominal,keterangan,saldo 
                 FROM ms_infaq a LEFT JOIN ms_donatur b
                 ON a.id_donatur=b.id_donatur LEFT JOIN donatur_temp c
                 ON a.id_donatur=c.id_donatur 
                 Where id_infaq=$id";

        return $this->db->query($sql)->row();
    }

    function m_hapus_data($id,$tipe,$nom,$user){

        // jika dapat data yang diminta //
        // jika tipe == i maka saldo akan dikurangi //
        // jika tipe == o maka saldo atau tabungan akan ditambahkan //

        $operator=$tipe=='i'?'-':'+';

            $sql = "INSERT INTO infaq_temp(keytrans,saldo,recuser)
                        VALUES('S',".$nom.",'".$user."')
                            ON DUPLICATE KEY UPDATE saldo=(saldo".$operator.$nom."),recuser='".$user."'";
            
            $this->db->query($sql);


        $this->db->where('id_infaq',$id);
        $this->db->delete('ms_infaq');
    }

}