<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_produk extends CI_Model {



	public function GetProduk(){

        $query=$this->db->query("SELECT * FROM t_produk ");

        return $query;

    }




}

