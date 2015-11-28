<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class friend_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('friend_model');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
	}
	public function index($id=null)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id'];
			$data['post']=$this->friend_model->post_select($id);
			$data['friend']=$this->friend_model->friend_picture($id);
			$data['request']=$this->friend_model->check_friend($id_user, $id);
			$data['friend_request']=$this->friend_model->check_friend_request($id_user, $id);
			$data['request_list']=$this->friend_model->request_list($id_user);
			$data['id'] = $id;
			$this->load->view('friend_view', $data);
		}
		else
		{
			redirect('login_control', 'refresh');
		}
	}
	public function remove_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->friend_model->remove_request($id, $id_user);
		redirect('friend_control/index/'.$id, 'refresh');
	}
	public function remove_friend_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->friend_model->remove_friend_request($id, $id_user);
		redirect('friend_control/index/'.$id, 'refresh');
	}
	public function approve_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->friend_model->update_approval($id, $id_user);
		redirect('friend_control/index/'.$id, 'refresh');
	}
}
