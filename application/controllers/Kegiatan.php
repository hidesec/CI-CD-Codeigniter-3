<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$this->load->view('kegiatan/kegiatan');
		$this->load->view('master_view/footer');
	}
}
