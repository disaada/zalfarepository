<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_pelanggan extends CI_Model {



	public function GetPelanggan(){

        $query=$this->db->query("SELECT * FROM t_pelanggan ORDER BY nama");

        return $query;

    }

    public function GetInsert($data){

    		$this->db->insert('t_pelanggan',$data);

    }

    public function GetUpdate($key,$data){

    		$this->db->where('id',$key);

    		$this->db->update('t_pelanggan',$data);

    }

    public function GetDelete($key){

        $this->db->where('id',$key);

        $this->db->delete('t_pelanggan');

    }

    public function GetDeletePesanan($key){

        $this->db->where('id_pelanggan',$key);

        $this->db->delete('t_pesanan');

    }

    public function GetSearch($key){

        $this->db->like('nama', $key , 'both');
        $this->db->order_by('nama', 'ASC');
        return $this->db->get('t_pelanggan')->result();

    }

    public function GetKode(){

        $query=$this->db->query("SELECT COUNT(*) AS jumlah FROM t_pelanggan");

        $hasil = $query->row();

        return $hasil->jumlah;

    }

    public function CekKode($key){

        $query=$this->db->query("SELECT id FROM t_pelanggan WHERE id = '".$key."'");

        $hasil = $query->row();

        return $hasil->id;

    }

}

