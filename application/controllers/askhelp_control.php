<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class askhelp_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('My_PHPMailer');
		$this->load->model('askhelp_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['markers'] = $this->askhelp_model->select_markers();
		$this->load->view('askhelp_view',$data);
  }
}
