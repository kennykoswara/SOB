<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
ini_set('session.cache_limiter','public');
session_cache_limiter(false);

class home_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('home_model');
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->view('home_view');
		}
		else
		{
			//If no session, redirect to login page
			redirect('login_control', 'refresh');
		}
	}
	public function search()
	{
		$term = $this->input->post('search-term');
		$session_data = $this->session->userdata('logged_in');
		$data['other_user']=$this->home_model->select($term, $session_data['username']);
		$this->load->view('search_view', $data);
	}
	public function logout()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->session->unset_userdata('logged_in');
			session_destroy();
			redirect('login_control', 'refresh');
		}
	}
}
