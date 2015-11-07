<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {
	public function __construct()
	{
	parent::__construct();
	}
	
	function login($username, $password)
	{
		$this -> db -> select('id, username, email');
		$this -> db -> from('user_info');
		$this -> db -> where('username', $username);
		$this -> db -> where('password', MD5($password));
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	function check_email($email)
	{
		$this -> db -> select('id');
		$this -> db -> from('user_info');
		$this -> db -> where('email', $email);
		$this -> db -> limit(1);
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	public function add_user()
	{
		$data=array(
			'name'=>$this->input->post('fullName'),
			'email'=>$this->input->post('eMail'),
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'country'=>$this->input->post('country'),
			'username'=>$this->input->post('fullName'),
			'password'=>md5($this->input->post('passWord'))
		);
		$this->db->insert('user_info',$data);
		return true;
	}
}