<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Kegiatan extends CI_Controller {
	public function __construct()
	{
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
		$this->load->model('Jenis_kegiatan_model');
	}

	public function index(){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['jenis_kegiatan'] = $this->Jenis_kegiatan_model->get_jenis_kegiatan();
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('jenis_kegiatan/jenis_kegiatan', $data);
		$this->load->view('master_view/footer');
	}

	public function create(){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('jenis_kegiatan/jenis_kegiatan_form', $data);
		$this->load->view('master_view/footer');
	}

	public function store(){
		$this->form_validation->set_rules('nama_jenis_kegiatan', 'Jenis_kegiatan', 'trim|required|xss_clean');

		$data = array(
			'nama' => $this->input->post('nama_jenis_kegiatan'),
		);

		$result = $this->Jenis_kegiatan_model->jenis_kegiatan_insert($data);

		if ($result == TRUE) {
			$messages = 'Berhasil menambahkan jenis kegiatan '.$this->input->post('nama_jenis_kegiatan').'!';
			$this->session->set_flashdata('messages', $messages);
			redirect("jenis_kegiatan");
		}else{
			$messages = 'Jenis kegiatan '.$this->input->post('nama_jenis_kegiatan').' sudah terdaftar!';
			$this->session->set_flashdata('messages', $messages);
			redirect("jenis-kegiatan/create");
		}
	}

	public function show($id){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['jenis_kegiatan'] = $this->Jenis_kegiatan_model->get_jenis_kegiatan_id($id);
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('jenis_kegiatan/jenis_kegiatan_form_edit', $data);
		$this->load->view('master_view/footer');
	}

	public function update($id){
		$this->form_validation->set_rules('jenis_kegiatan', 'Jenis_kegiatan', 'trim|required|xss_clean');

		$data = array(
			'nama' => $this->input->post('nama_jenis_kegiatan'),
		);

		$result = $this->Jenis_kegiatan_model->jenis_kegiatan_update($data, $id);

		if ($result == TRUE) {
			$messages = 'Berhasil merubah jenis kegiatan '.$this->input->post('nama_jenis_kegiatan').'!';
			$this->session->set_flashdata('messages', $messages);
			redirect("jenis_kegiatan");
		}else{
			$messages = 'Jenis kegiatan '.$this->input->post('nama_jenis_kegiatan').' sudah terdaftar!';
			$this->session->set_flashdata('messages', $messages);
			redirect("jenis-kegiatan/show/".$id);
		}
	}

	public function delete($id){
		$data = $this->Jenis_kegiatan_model->get_jenis_kegiatan_id($id);
		$nama_jenis_kegiatan = $data[0]["nama"];
		$result = $this->Jenis_kegiatan_model->jenis_kegiatan_delete($id);
		if ($result == TRUE) {
			$messages = 'Berhasil menghapus jenis kegiatan '.$nama_jenis_kegiatan.'!';
			$this->session->set_flashdata('messages', $messages);
			redirect("jenis-kegiatan");
		}else{
			$messages = 'Gagal menghapus jenis kegiatan '.$nama_jenis_kegiatan.'!';
			$this->session->set_flashdata('messages', $messages);
			redirect("jenis-kegiatan");
		}
	}
}
