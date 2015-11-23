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
		if($this->session->userdata('logged_in'))
		{
			$this->form_validation->set_rules('request', 'request', 'trim|required|xss_clean');
			$this->form_validation->set_rules('desc', 'desc', 'trim|required|xss_clean');
			$this->form_validation->set_rules('my_lat', 'my_lat', 'trim|required|xss_clean');
			$this->form_validation->set_rules('my_long', 'my_long', 'trim|required|xss_clean');
			$data['markers'] = $this->askhelp_model->select_markers();
			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('askhelp_view',$data);
			}
			else
			{
				$session_data = $this->session->userdata('logged_in');
				$username = $session_data['username'];
				$id = $session_data['id'];
				$data['get_address'] = $this->askhelp_model->get_address($id);
				foreach($data['get_address']->result_array() as $row){
					$address = $row['address'];
				}
				if($this->askhelp_model->add_help($username, $address))
				{
					echo "SELAMAT ANDA BERHASIL MINTA TOLONG!!";
				}
			}
		}
		else
		{
			//If no session, redirect to login page
			redirect('login_control', 'refresh');
		}
	}

}
