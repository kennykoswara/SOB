<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mission_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('mission_model');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id= $session_data['id'];
			$data['list']=$this->mission_model->mission_select($id);
			$data['request_list']=$this->mission_model->request_list($id);
			$this->load->view('mission_view', $data);
		}
		else
		{
			redirect('login_control', 'refresh');
		}
	}
	public function remove_friend_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->mission_model->remove_friend_request($id, $id_user);
	}
	public function approve_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->mission_model->update_approval($id, $id_user);
	}
	public function change_status($id_marker, $new_status)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->mission_model->update_status($id_user, $id_marker, $new_status);
	}
}