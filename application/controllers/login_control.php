<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('My_PHPMailer');
		$this->load->model('registration_model');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('login_view.php');
	}
	public function submit()
	{
		$formSubmit = $this->input->post('submitForm');
		if( $formSubmit == 'RegistForm' )
		{
			if($this->registration_model->add_user())
			{
				echo "INI NANTI HOME";
			}		
		}
		/*else
			redirect($this->config->item('backend_folder').'/categories');*/
	}
}