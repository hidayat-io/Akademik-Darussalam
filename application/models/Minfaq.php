<?php

class Minfaq extends CI_Model {
	
public function __construct(){

        // Call the CI_Model constructor
        parent::__construct();
    }

    function get_list_data($param,$sortby=0,$sorttype='desc'){

        $cols = array('id_infaq','nama','alamat','tgl_infaq','tipe','nominal','keterangan');

        $sql = " SELECT id_infaq,b.id_donatur,nama_donatur,alamat,tgl_infaq,tipe,nominal,keterangan,saldo
                FROM ms_infaq a LEFT JOIN ms_donatur b
                ON a.id_donatur=b.id_donatur  LEFT JOIN infaq_temp c
                ON b.id_donatur=c.id_donatur";

        if($param!=null){

            $sql .= " WHERE ".$param;
        }

        $sql.= " ORDER BY ".$cols[$sortby]." ".$sorttype;


        return $this->db->query($sql)->result();
    }

    // Simpan Infaq //
    //Simpan data saldo dari donatur
	function insert_new($data){

       $this->db->insert('ms_infaq', $data);
    }

    // simpan infaq //
    //insert penambahan saldo kedalam 
    // donatur saldo temp
    function update_saldo($id_donatur,$tipe,$nominal,$user){


        $operator=$tipe=='i'?'+':'-';

        $sql = "INSERT INTO infaq_temp(id_donatur,saldo,recuser)
                VALUES('".$id_donatur."',".$nominal.",'".$user."')
                ON DUPLICATE KEY UPDATE saldo=saldo".$operator.$nominal.",recuser='".$user."'";

        $this->db->query($sql);
    }

    // Update Simpan Infaq //
    //update table infaq berdasarkan id
    function update_data($id,$data){

        $this->db->where('id_infaq',$id);
        $this->db->update('ms_infaq',$data);
    }

    // Update Simpan Infaq //
    //update data daldo pada table
    // table infaq temporary
    function update_saldo_updt_EDT($id_donatur,$tipe,$nominal,$user,$saldo,$nm_awl){


            $operator=$tipe=='i'?'+':'-';

            $sql = "INSERT INTO infaq_temp(id_donatur,saldo,recuser)
                    VALUES('".$id_donatur."','".$nominal."','".$user."')
                    ON DUPLICATE KEY UPDATE saldo=(saldo-$nm_awl)".$operator.$nominal.",recuser='".$user."'";

            $this->db->query($sql);
    }

    // menampilkan seleuruh transaksi data
    // baik pemasukan maupun pengeluaran
    function query_getdata($id){

       $sql = " SELECT id_infaq,b.id_donatur,nama_donatur,alamat,DATE_FORMAT(tgl_infaq,'%d-%m-%Y') as   itgl,tgl_infaq,tipe,nominal,keterangan,saldo 
                FROM ms_infaq a LEFT JOIN ms_donatur b
                ON a.id_donatur=b.id_donatur LEFT JOIN infaq_temp c
                ON a.id_donatur=c.id_donatur
                 Where id_infaq=$id";
       // var_dump($sql);
        //exit();

        return $this->db->query($sql)->row();
    }

    function quey_getdata_saldoinfaq($id){
        $sql = "SELECT * FROM infaq_temp where id_donatur='$id'";
        
        //var_dump($sql);
        //exit();
        return $this->db->query($sql)->row();

    }

    // Simpan Pengeluaran //
    // function untuk menyimpan data keluar
    function insert_new_kl($data){
        $this->db->insert('ms_infaq', $data);
    }

    // Simpan Pengeluaran //
    // Update table infaq temp //
    // untuk pengurangan saldo //
    function update_saldo_kl($id_donatur,$tipe,$nominalkl,$user){

        $operator=$tipe=='i'?'+':'-';

        $sql = "INSERT INTO infaq_temp(id_donatur,saldo,recuser)
                VALUES('".$id_donatur."',".$nominalkl.",'".$user."')
                ON DUPLICATE KEY UPDATE saldo=saldo".$operator.$nominalkl.",recuser='".$user."'";

        $this->db->query($sql);
    } 


    // Update pengeluaran //
    function update_data_kl($id,$data){

        $this->db->where('id_infaq',$id);  
        $this->db->update('ms_infaq',$data);
    }

    // update pengeluaran //
    //function update_data_saldo_kl
    function update_data_saldo_kl($id_donatur,$tipe,$nominalawal,$nominalbaru,$saldo,$user){

        $operator=$tipe=='i'?'+':'-';

        $sql = "INSERT INTO infaq_temp(id_donatur,saldo,recuser)
                VALUES('".$id_donatur."',".$saldo.",'".$user."')
                ON DUPLICATE KEY UPDATE saldo=(saldo + $nominalawal)".$operator.$nominalbaru.",recuser='".$user."'";

        var_dump($sql);
        exit();

        $this->db->query($sql);

    }

    function m_hapus_data($id,$id_donatur,$tipe,$nom,$saldo,$user){

        // jika dapat data yang diminta //
        // jika tipe == i maka saldo akan dikurangi //
        // jika tipe == o maka saldo atau tabungan akan ditambahkan //

        $operator=$tipe=='i'?'-':'+';

        $sql = "INSERT INTO infaq_temp(id_donatur,saldo,recuser)
                VALUES('".$id_donatur."',".$saldo.",'".$user."')
                ON DUPLICATE KEY UPDATE saldo=(saldo".$operator.$nom."),recuser='".$user."'";

        $this->db->query($sql);

        $this->db->where('id_infaq',$id);
        $this->db->delete('ms_infaq');
    }

}