<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Register extends CI_Controller {
		public function index()
		{
			$this->load->helper('url');
			$this->load->view('master_auth/header');
			$this->load->view('auth/register');
			$this->load->view('master_auth/footer');
		}
	}
