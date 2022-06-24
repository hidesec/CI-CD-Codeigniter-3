<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Register extends CI_Controller {
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
			$this->load->view('auth/register');
			$this->load->view('master_auth/footer');
		}

		// Validate and store registration data in database
		public function new_user_registration() {

			// Check validation for user input in SignUp form
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

			$this->load->view('master_auth/header');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('auth/register');
			} else {
				$data = array(
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
					'role' => 'users'
				);

				$result = $this->Auth_database->registration_insert($data);

				if ($result == TRUE) {
					$data['message_display'] = 'Registration Successfully !';
					$this->load->view('auth/login', $data);
				} else {
					$data['message_display'] = 'Username already exist!';
					$this->load->view('auth/register', $data);
				}
			}
			$this->load->view('master_auth/footer');
		}
	}
