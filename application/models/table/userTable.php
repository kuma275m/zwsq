<?php

class UserTable extends CI_Model {
	
	public function check_user_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$query = $this->db->get('user');
		
		if ($query->num_rows() == 1) {
			return true;
		}
	}
	
	public function update_user($data = array())
	{
		$this->db->where("username",$data['username']);
		$result = array(
			'password' => $data['password'],
		);
		$this->db->update("user",$result);
		return true;	
	}
}