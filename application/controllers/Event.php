<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//load url helper library
		$this->load->helper('url');
		// Load form helper library
		$this->load->helper('form');
		//load security helper
		$this->load->helper('security');
		// Load form validation library
		$this->load->library('form_validation');
		// Load session library
		$this->load->library('session');
		// Load database
		$this->load->model('Kegiatan_model');
		$this->load->model('Jenis_kegiatan_model');
		$this->load->model('Kategori_peserta_model');
		$this->load->model('Auth_database');
		$this->load->model('Event_model');
	}

	public function index(){
		$this->load->view('fe_master_view/header');
		$this->load->view('fe_master_view/navbar');
		$data['jenis_kegiatan'] = $this->Jenis_kegiatan_model->get_jenis_kegiatan();
		$data['kegiatan'] = $this->Kegiatan_model->get_kegiatan();
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('fe_event_view/event', $data);
		$this->load->view('fe_master_view/footer');
	}

	public function daftar($id){
		$this->load->view('fe_master_view/header');
		$this->load->view('fe_master_view/navbar');
		$data['kategori_peserta'] = $this->Kategori_peserta_model->get_kategori_peserta();
		$data['kegiatan'] = $this->Kegiatan_model->get_kegiatan_id($id);
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('fe_event_view/event_form', $data);
		$this->load->view('fe_master_view/footer');
	}

	public function create(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kategori_peserta_id', 'Kategori_peserta_id', 'trim|required|xss_clean');
		$this->form_validation->set_rules('alasan', 'Alasan', 'trim|required|xss_clean');

		$data = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'role' => 'users'
		);

		$result = $this->Auth_database->registration_insert($data);

		$last_id = $this->Auth_database->get_last_id_user();

		$data = array(
			'tanggal_daftar' => date("Y-m-d"),
			'alasan' => $this->input->post('alasan'),
			'user_id' => $last_id[0]->id,
			'kegiatan_id' => $this->input->post('kegiatan_id'),
			'kategori_peserta_id' => $this->input->post('kategori_peserta_id')
		);

		$result = $this->Event_model->event_insert($data);

		$messages = 'Berhasil mendaftar Event '.$this->input->post('judul').'!';
		$this->session->set_flashdata('messages', $messages);
		redirect("event");
	}
}
