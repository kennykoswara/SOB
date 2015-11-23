<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class map_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('My_PHPMailer');
		$this->load->model('map_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$data['markers'] = $this->map_model->select_markers();
			$this->load->view('map_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login_control', 'refresh');
		}
	}
}
