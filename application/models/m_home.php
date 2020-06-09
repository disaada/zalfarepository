<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_home extends CI_Model {

    public function GetHari(){
        $hari=date("w");
        switch ($hari){
            case 0 : $hari="Minggu";
                Break;
            case 1 : $hari="Senin";
                Break;
            case 2 : $hari="Selasa";
                Break;
            case 3 : $hari="Rabu";
                Break;
            case 4 : $hari="Kamis";
                Break;
            case 5 : $hari="Jum'at";
                Break;
            case 6 : $hari="Sabtu";
                Break;
        }
        return $hari;
    }
    
    public function GetJumlahGuser(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_group_users");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahUser(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_user");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahAlbum(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_album");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahGaleri(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_galeri");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahKvideo(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_kategori_video");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahVideo(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_video");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahKartikel(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_kategori_artikel");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahArtikel(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_artikel");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahKomentar(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_komentar");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetJumlahPesan(){
        $query=$this->db->query("SELECT COUNT(*) as total FROM t_pesan");
        foreach ($query->result() as $row){
            $total = $row->total;        
        }
        return $total;
    }

    public function GetGrafik()
    {
        $query = $this->db->query("SELECT MONTH(t_pesanan.`tgl_pesan`) AS bulan, 

                                    t_produk.`nama_produk`, 

                                    SUM(t_detail_pesan.`jumlah_pesan`) AS jumlah
                                    
                                    FROM t_detail_pesan, t_pesanan, t_produk
                                    
                                    WHERE t_detail_pesan.`id_pesan` = t_pesanan.`id`
                                    
                                    AND t_detail_pesan.`id_produk` = t_produk.`id`
                                    
                                    GROUP BY nama_produk
                                    
                                    ORDER BY nama_produk ASC");
        
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
        else{
            return "Data Kosong";
        }
    }

    public function GetPenjualanMitra($bulan, $tahun)
    {
        $query=$this->db->query("SELECT t_distributor.*, COUNT(id_distributor) AS jumlah

                                 , t_pesanan.`tgl_pesan`

                                 FROM t_distributor, t_pesanan 

                                 WHERE t_distributor.`id` = t_pesanan.`id_distributor`

                                 AND t_pesanan.`id_distributor` != 'D1' 

                                 AND MONTH(t_pesanan.`tgl_pesan`) = $bulan

                                 AND YEAR(t_pesanan.`tgl_pesan`) = $tahun

                                 GROUP BY id_distributor");

        return $query;
    }

    public function GetDetailProduk($kode, $bulan, $tahun){

        $query=$this->db->query("SELECT `t_produk`.`nama_produk`, `t_detail_pesan`.`jumlah_pesan`

                                FROM t_pesanan INNER JOIN t_detail_pesan 
        
                                ON (`t_pesanan`.`id` = `t_detail_pesan`.`id_pesan`)
    
                                INNER JOIN t_produk 
        
                                ON (`t_produk`.`id` = `t_detail_pesan`.`id_produk`)

                                WHERE (`t_pesanan`.`id_distributor` = '$kode'
    
                                AND MONTH(`t_pesanan`.`tgl_pesan`) = $bulan
    
                                AND YEAR(`t_pesanan`.`tgl_pesan`) = $tahun)

                                GROUP BY `t_produk`.`nama_produk`");

        return $query;

    }

    public function GetPenjualanProduk($bulan, $tahun)
    {
        $query=$this->db->query("SELECT `t_produk`.`nama_produk`

                                , SUM(`t_detail_pesan`.`jumlah_pesan`) AS jumlah

                                FROM `logistik-zalfa`.`t_pesanan`
    
                                INNER JOIN `t_detail_pesan` 
        
                                ON (`t_pesanan`.`id` = `t_detail_pesan`.`id_pesan`)
    
                                INNER JOIN `t_produk` 
        
                                ON (`t_produk`.`id` = `t_detail_pesan`.`id_produk`)

                                WHERE (`t_pesanan`.`id_distributor` = 'D1'
    
                                AND MONTH(`t_pesanan`.`tgl_pesan`) = $bulan
    
                                AND YEAR(`t_pesanan`.`tgl_pesan`) = $tahun)

                                GROUP BY `t_produk`.`nama_produk`;");

        return $query;
    }
}
