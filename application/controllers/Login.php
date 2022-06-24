<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->database();

		// Load form helper library
		$this->load->helper('form');

		//load security helper
		$this->load->helper('security');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('Auth_database');

		//load url helper library
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('master_auth/header');
		$this->load->view('auth/login');
		$this->load->view('master_auth/footer');
	}

	// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				redirect('/dashboard', 'refresh');
			}else{
				redirect('/login', 'refresh');
			}
		} else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);

			$result = $this->Auth_database->login($data);
			if ($result == TRUE) {
				$username = $this->input->post('username');
				$result = $this->Auth_database->read_user_information($username);
				if ($result != false) {
					$session_data = array(
						'username' => $result[0]->username,
						'email' => $result[0]->email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					redirect('/dashboard', 'refresh');
				}
			} else {
				$data = array(
					'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('master_auth/header');
				$this->load->view('auth/login', $data);
				$this->load->view('master_auth/footer');
			}
		}
	}

	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array(
			'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
//		$this->load->view('master_auth/header');
//		$this->load->view('auth/login', $data);
//		$this->load->view('master_auth/footer');
		redirect('/login', 'refresh');
	}
}
