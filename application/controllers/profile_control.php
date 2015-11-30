<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('session');
		$this->load->model('profile_model');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
			$data['post']=$this->profile_model->post_select($id);
			$data['user']=$this->profile_model->user_select($id);
			$data['request_list']=$this->profile_model->request_list($id);
			$data['friend_list']=$this->profile_model->friend_list($id);
			$data['my_id'] = $id;
			$this->load->view('profile_view', $data);
		}
		else
		{
			redirect('login_control', 'refresh');
		}
	}
	
	function do_upload()
	{
		$config['upload_path'] = './asset/uploads/';
		$config['allowed_types'] = 'jpg|png|bmp';
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id = $session_data['id'];
		}
		//$input_file = $this->input->get('userfile');
		//print_r($input_file);
		$file_name = $_FILES['userfile']['name'];
		$new_file_name = $id;
		$config['file_name'] = $new_file_name;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
		}
		$ext = end(explode('.',$file_name)); 
		$user_now = $id;
		$config['file_name'] = basename($id,'.'.$ext);
		$myuser = "$user_now.".$ext;
		$location = "asset/uploads/$myuser";
		
		
		$adding=$this->profile_model->add_picture($location, $user_now);
		redirect('profile_control','refresh');
	}
	public function remove_friend_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->profile_model->remove_friend_request($id, $id_user);
	}
	public function approve_request($id)
	{
		$session_data = $this->session->userdata('logged_in');
		$id_user = $session_data['id'];
		$this->profile_model->update_approval($id, $id_user);
	}
}
