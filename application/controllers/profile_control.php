<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('profile_model');
		$this->load->helper('date');
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$username = $session_data['username'];
			$data['post']=$this->profile_model->post_select($username);
			$this->load->view('profile_view', $data);
		}
		else
		{
			redirect('login_control', 'refresh');
		}
	}
}
