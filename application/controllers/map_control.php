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
		$this->load->helper('date');
	}
	public function index($locate_lat=null, $locate_lng=null)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['locate_lat'] = $locate_lat;
			$data['locate_lng'] = $locate_lng;
			$data['markers'] = $this->map_model->select_markers();
			$data['request_list']=$this->map_model->request_list($session_data['id']);
			$this->load->view('map_view', $data);
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
		$this->map_model->remove_friend_request($id, $id_user);
	}
	public function approve_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->map_model->update_approval($id, $id_user);
	}
	public function book_mission($id_mission, $id_requestor)
	{
		$session_data = $this->session->userdata('logged_in');
		$id = $session_data['id'];
		if(empty($this->map_model->mission_check($id, $id_mission, $id_requestor)))
		{
			if($id== $id_requestor)
				echo "yourself";
			else
			{
				$datetime = date('Y-m-d h:i:s', now());
				$this->map_model->add_book($id_mission, $id_requestor, $id, $datetime);
				echo "can accept";
			}
		}
		else
			echo "cannot accept";
	}
}
