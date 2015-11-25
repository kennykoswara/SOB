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
		$this->load->helper('date');
		$this->load->helper('url');
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
			$data['post']=$this->home_model->post_select($id);
			$this->load->view('home_view', $data);
		}
		else
		{
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
	public function load_map()
	{
		$this->load->library('../controllers/map_control');
		$lat = $this->input->get('var1');
		$lng = $this->input->get('var2');
		$this->map_control->index($lat,$lng);
	}
}
