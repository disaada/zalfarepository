<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_users extends CI_Model {



	public function GetUsers(){

        $query=$this->db->query("SELECT t_user.`id`,t_user.`nama_user`,

                                        t_user.`username`, t_user.`id_group`,

                                        t_group_users.`level`,t_user.`status` 

                                 FROM t_user INNER JOIN t_group_users 

                                 ON t_user.`id_group`=t_group_users.`id`

                                 WHERE t_group_users.`level` <> 'Agen' 

                                ");

        return $query;

    }



    public function GetDataUsers(){

        $query=$this->db->query("SELECT id,level FROM t_group_users ORDER BY level");

        return $query;

    }



    public function CheckUsers($key=NULL){

        $query=$this->db->query("SELECT t_user.`id`,t_user.`nama_user`,

                                        t_user.`username`,t_user.`id_group`,

                                        t_group_users.`level`,t_user.`status` 

                                 FROM t_user INNER JOIN t_group_users 

                                 ON t_user.`id_group`=t_group_users.`id`

                                 WHERE t_user.`id`=".$key);

        return $query;

    }



    public function GetData($key){

        $this->db->where('id',$key);

        $hasil = $this->db->get('t_group_users');

        return $hasil;

    }

    

    public function GetUpdate($key,$data){

    		$this->db->where('id',$key);

    		$this->db->update('t_user',$data);

    }



    public function GetInsert($data){

    		$this->db->insert('t_user',$data);

    }



    public function GetDelete($key){

        $this->db->where('id',$key);

        $this->db->delete('t_user');

    }



    public function GetReset($key,$data){

            $this->db->where('id',$key);

            $this->db->update('t_user',$data);

    }



    //new add access

    public function GetAccessUsers($username){

        $this->db->where('username', $username);

        $query = $this->db->get('t_user');



        if($query->num_rows() > 0){

            $data = $query->row();

            $query->free_result();

        }

        else{

            $data = NULL;

        }

        return $data;

    }

}

