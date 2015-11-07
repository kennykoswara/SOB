<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_control extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('My_PHPMailer');
		$this->load->model('login_model','',TRUE);
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_view');
		}
		else
		{
			$session_data = $this->session->userdata('logged_in');
			print_r($session_data);
		}
	}
	
	function check_database($password)
	{
		$username = $this->input->post('fullName');
		$result = $this->login_model->login($username, $password);
		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
				'id' => $row->id,
				'username' => $row->username,
				'email' => $row->email,
			);
			$this->session->set_userdata('logged_in', $sess_array);
		}
		return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
	
	public function submit()
	{
		$formSubmit = $this->input->post('submitForm');
		if( $formSubmit == 'signup' )
		{
			if($this->login_model->add_user())
			{
				$email = $this->input->post('eMail');
				$name = $this->input->post('fullName');
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->IsHTML(true);
				$mail->SMTPDebug = false;
				$mail->Debugoutput = 'html';
				$mail->SMTPAuth   = true;
				$mail->Port       = 587; 
				$mail->SMTPSecure = "tls";
				$mail->Host       = "smtp.gmail.com";            
				$mail->Username   = "nate.river134@gmail.com"; 
				$mail->Password   = "Gabung123";
				$mail->SetFrom('nate.river134@gmail.com', 'Admin');  //Who is sending the email
				$mail->AddReplyTo("nate.river134@gmail.com","Nate River");  //email address that receives the response
				$mail->Subject    = "Thank you for Your Registration";
				
				$mail->Body      = " <h1>Your account has been created.</h1>
				Thank you for registering with helpMe. Your account has been created, and a verification email has been sent
				to your registered email address. Please click on the verification link included in the email to activate your account.";
				
				//$mail->AltBody    = "Your Request has been sent with the following information: \nResident id:";
				$destino = "$email"; // Who is addressed the email to
				$mail->AddAddress($destino, "$name");

				if(!$mail->Send()) {
					$data["message"] = "Error: " . $mail->ErrorInfo;
				} else {
					$data["message"] = "Message sent correctly!";
				}
				echo "INI NANTI HOME";
			}		
		}
		/*else
			redirect($this->config->item('backend_folder').'/categories');*/
	}
}