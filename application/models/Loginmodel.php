<?php

class Loginmodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function valid_login( $username,$password )
	{
		$password = md5($password);
		$query = $this->db->where(['uname' => $username,'pword' => $password])
							->from('users')
							->get();

		if($query->num_rows())
		{
			return $query->row()->id;
		}else{

		}	return false;					
	}
}