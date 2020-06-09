<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_model {

	public function getlogin($username,$password)
	{
		$user_password = md5($password);
		$this->db->where('username',$username);
		$this->db->where('password',$user_password);
		$query = $this->db->get('t_user');
		if($query->num_rows()>0){
			foreach ($query->result() as $row) {
				if($row ->status=='blokir'){
					$this->session->set_flashdata('info','Maaf hak akses anda sudah diblokir !!');
					redirect('c_login');
				}else{
					$query = $this->db->query('SELECT t_user.*, t_group_users.`level` FROM t_user, t_group_users WHERE t_user.`id_group` = t_group_users.`id` AND t_user.`username`= "'.$username.'"');
					foreach ($query->result() as $row) {
						$sess = array('id'			=> $row ->id,
									  'nama_user'	=> $row ->nama_user,
									  'level'		=> $row ->level,
									  'status'		=> $row ->status,
									  'username'	=> $row ->username,
									  'id_group'	=> $row ->id_group);
						$this->session->set_userdata($sess);	
						redirect('c_home');
					}			
				}
			}
		}else{
			$this->session->set_flashdata('info','Maaf username atau password salah !!');
			redirect('c_login');
		}

	}
}
