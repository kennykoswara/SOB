<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class requested_friend_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('requested_friend_model');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
	}
	public function index($id)
	{
		if($this->session->userdata('logged_in'))
		{
			$data['request_list']=$this->requested_friend_model->request_list($id);
			$data['friend_list']=$this->requested_friend_model->friend_list($id);
			$data['get_name']=$this->requested_friend_model->get_name($id);
			$data['my_id'] = $id;
			$this->load->view('requested_friend_view', $data);
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
		$this->requested_friend_model->remove_friend_request($id, $id_user);
	}
	public function approve_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->requested_friend_model->update_approval($id, $id_user);
	}
}