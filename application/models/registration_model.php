<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registration_model extends CI_Model {
	public function __construct()
	{
	parent::__construct();
	}
	public function add_user()
	{
		$data=array(
			'name'=>$this->input->post('fullname'),
			'email'=>$this->input->post('email'),
			'address'=>$this->input->post('address'),
			'city'=>$this->input->post('city'),
			'country'=>$this->input->post('country'),
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('rpassword'),
		);
		$this->db->insert('user_info',$data);
		return true;
	}
}