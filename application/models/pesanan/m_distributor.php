<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_distributor extends CI_Model {



	public function GetDistributor(){

        $query=$this->db->query("SELECT * FROM t_distributor WHERE jenis != '-' ORDER BY jenis");

        return $query;

    }

    public function GetInsert($data){

    		$this->db->insert('t_distributor',$data);

    }

    public function GetUpdate($key,$data){

    		$this->db->where('id',$key);

    		$this->db->update('t_distributor',$data);

    }

    public function GetDelete($key){

        $this->db->where('id',$key);

        $this->db->delete('t_distributor');

    }

    public function GetPesanan($key){

        $this->db->where('id_distributor',$key);

        $this->db->delete('t_pesanan');

    }

    public function GetDeleteDetailPesan($id_pesan){

        $this->db->where('id_pesan',$id_pesan);

        $this->db->delete('t_detail_pesan');

    }

    public function GetIDDetailPesan($key){

        $query=$this->db->query("SELECT id FROM t_pesanan WHERE id_distributor = ".$key);

        return $query->row();

    }

    public function GetKode(){

        $query=$this->db->query("SELECT COUNT(*) AS jumlah FROM t_distributor");

        $hasil = $query->row();

        return $hasil->jumlah;

    }

    public function CekKode($key){

        $query=$this->db->query("SELECT id FROM t_distributor WHERE id = '".$key."'");

        $hasil = $query->row();

        return $hasil->id;

    }

}

