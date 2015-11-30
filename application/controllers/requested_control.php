<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class requested_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('requested_model');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
			$data['request_list']=$this->requested_model->request_list($id);
			$data['friend_list']=$this->requested_model->friend_list($id);
			$data['my_id'] = $id;
			$this->load->view('requested_view', $data);
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
		$this->requested_model->remove_friend_request($id, $id_user);
	}
	public function approve_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->requested_model->update_approval($id, $id_user);
	}
}