<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class askhelp_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('askhelp_view');
  }
}