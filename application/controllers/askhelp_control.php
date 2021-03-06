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
		$this->load->helper('date');
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
			$session_data = $this->session->userdata('logged_in');
			$data['request_list']=$this->askhelp_model->request_list($session_data['id']);
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
				$datetime = date('Y-m-d h:i:s', now());
				if($this->askhelp_model->add_help($username, $address, $datetime, $id))
				{
					//echo "SELAMAT ANDA BERHASIL MINTA TOLONG!!";
					//echo "<script language=\"javascript\">alert('Your Request Has been Sent Successfully');</script>";
					redirect('home_control', 'refresh');
				}
			}
		}
		else
		{
			//If no session, redirect to login page
			redirect('login_control', 'refresh');
		}
	}
	public function remove_friend_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->askhelp_model->remove_friend_request($id, $id_user);
	}
	public function approve_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->askhelp_model->update_approval($id, $id_user);
	}
}