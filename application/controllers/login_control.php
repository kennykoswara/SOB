<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('login_view.php');
	}
}