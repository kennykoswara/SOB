<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class request_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('request_model');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id= $session_data['id'];
			$data['list']=$this->request_model->request_select($id);
			$data['request_list']=$this->request_model->request_list($id);
			$this->load->view('request_view', $data);
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
		$this->request_model->remove_friend_request($id, $id_user);
	}
	public function approve_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->request_model->update_approval($id, $id_user);
	}
	public function change_status($id_marker, $new_status)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->request_model->update_status($id_user, $id_marker, $new_status);
	}
	public function score_plus($id_acceptor, $id_marker)
	{
		$this->request_model->add_score($id_acceptor);
		$this->request_model->delete_request2($id_marker);
		$this->request_model->delete_marker($id_marker);
	}
	public function delete_mission($id_acceptor, $id_marker)
	{
		$this->request_model->delete_request2($id_marker);
		$this->request_model->delete_marker($id_marker);
	}
	public function score_minus($id_acceptor, $id_marker)
	{
		$this->request_model->subtract_score($id_acceptor);
		$this->request_model->delete_request($id_acceptor, $id_marker);
	}
}