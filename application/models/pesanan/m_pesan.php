<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_pesan extends CI_Model {



	public function GetPesan(){

        $query=$this->db->query("SELECT t_pesanan.*, t_pelanggan.`nama` AS pemesan, 

                                t_distributor.`nama` AS pengirim, t_distributor.`jenis` FROM 

                                t_pesanan, t_pelanggan, t_distributor WHERE 

                                t_pesanan.`id_pelanggan` = t_pelanggan.`id` AND 

                                t_pesanan.`id_distributor` = t_distributor.`id` 

                                ORDER BY tgl_pesan DESC");

        return $query;

    }

    public function GetPesan2(){

        $query=$this->db->query("SELECT t_pesanan.*, t_distributor.`nama` AS pemesan, 

                                t_distributor.`jenis` FROM 

                                t_pesanan, t_distributor WHERE 

                                t_pesanan.`id_pelanggan` = t_distributor.`id` AND 

                                t_pesanan.`id_pelanggan` LIKE 'D%' 

                                ORDER BY tgl_pesan DESC");

        return $query;

    }    

    public function GetDetailPesan($key){

        $query=$this->db->query("SELECT t_detail_pesan.`id_pesan`, t_produk.`nama_produk`, t_detail_pesan.`jumlah_pesan`

								 FROM t_detail_pesan, t_produk

								 WHERE t_detail_pesan.`id_produk` = t_produk.`id`

								 AND t_detail_pesan.`id_pesan` = ".$key);

        return $query;

    }

    public function GetInsert($data){

            $this->db->insert('t_pesanan',$data);

    }

    public function GetInsertDetail($data){

            $this->db->insert('t_detail_pesan',$data);

    }

    public function GetDeleteDetail($key){

        $this->db->where('id_pesan',$key);

        $this->db->delete('t_detail_pesan');

    }

    public function GetDelete($key){

        $this->db->where('id',$key);

        $this->db->delete('t_pesanan');

    }

    public function GetStruk($key){

        $query=$this->db->query("SELECT t_pesanan.*, 

                                t_pelanggan.`nama` AS untuk, t_pelanggan.`alamat`, 

                                t_pelanggan.`no_hp`, 

                                t_distributor.`nama` AS dari, t_distributor.`no_hp` AS no_mitra

                                 FROM t_pesanan, t_pelanggan, 

                                t_distributor

                                WHERE t_pesanan.`id_pelanggan` = t_pelanggan.`id` AND t_pesanan.`id_distributor` = 

                                t_distributor.`id` AND t_pesanan.`id` = ".$key);

        return $query->row();

    }

    public function GetStrukMitra($key){

        $query=$this->db->query("SELECT t_pesanan.*, nama AS untuk , alamat, no_hp FROM 

                                t_pesanan, t_distributor 

                                WHERE t_pesanan.`id_pelanggan` = t_distributor.`id` 

                                AND t_pesanan.`id` = ".$key);

        return $query->row();

    }

    public function GetKodeKurir($ekspedisi){

        $tanggal = date('Y-m-d');

        $admin = $this->session->userdata('id');

        $query=$this->db->query("SELECT COUNT(*) AS jumlah FROM t_pesanan WHERE t_pesanan.`ekspedisi` = '".$ekspedisi."' AND tgl_pesan = '".$tanggal."' AND id_user='".$admin."'");

        $hasil = $query->row();

        return $hasil->jumlah;

    }

}

