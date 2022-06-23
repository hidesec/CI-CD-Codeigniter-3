<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends CI_Controller {
		public function __construct()
		{
			parent::__construct();

			//load url helper library
			$this->load->helper('url');
		}
		public function index(){
			$this->load->view('master_view/header');
			$this->load->view('master_view/sidebar');
			$this->load->view('dashboard/dashboard');
			$this->load->view('master_view/footer');
		}
	}
