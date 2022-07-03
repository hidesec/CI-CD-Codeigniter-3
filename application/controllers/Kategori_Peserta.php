<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_Peserta extends CI_Controller
{
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
		$this->load->model('Kategori_peserta_model');
	}

	public function index(){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['kategori_peserta'] = $this->Kategori_peserta_model->get_kategori_peserta();
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('kategori_peserta/kategori_peserta', $data);
		$this->load->view('master_view/footer');
	}

	public function create(){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('kategori_peserta/kategori_peserta_form', $data);
		$this->load->view('master_view/footer');
	}

	public function store(){
		$this->form_validation->set_rules('nama_kategori_peserta', 'Nama_kategori_peserta', 'trim|required|xss_clean');

		$data = array(
			'nama' => $this->input->post('nama_kategori_peserta'),
		);

		$result = $this->Kategori_peserta_model->kategori_peserta_insert($data);

		if ($result == TRUE) {
			$messages = 'Berhasil menambahkan kategori peserta '.$this->input->post('nama_kategori_peserta').'!';
			$this->session->set_flashdata('messages', $messages);
			redirect("Kategori_Peserta");
		}else{
			$messages = 'Kategori peserta '.$this->input->post('nama_kategori_peserta').' sudah terdaftar!';
			$this->session->set_flashdata('messages', $messages);
			redirect("Kategori_Peserta/create");
		}
	}

	public function show($id){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['kategori_peserta'] = $this->Kategori_peserta_model->get_kategori_peserta_id($id);
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('kategori_peserta/kategori_peserta_form_edit', $data);
		$this->load->view('master_view/footer');
	}

	public function update($id){
		$this->form_validation->set_rules('nama_kategori_peserta', 'Nama_kategori_peserta', 'trim|required|xss_clean');

		$data = array(
			'nama' => $this->input->post('nama_kategori_peserta'),
		);

		$result = $this->Kategori_peserta_model->kategori_peserta_update($data, $id);

		$messages = 'Berhasil merubah kategori peserta '.$this->input->post('nama_kategori_peserta').'!';
		$this->session->set_flashdata('messages', $messages);
		redirect("Kategori_Peserta");
	}

	public function delete($id){
		$data = $this->Kategori_peserta_model->get_kategori_peserta_id($id);
		$nama_kategori_peserta = $data[0]["nama"];
		$result = $this->Kategori_peserta_model->kategori_peserta_delete($id);
		if($result == TRUE) {
			$messages = 'Berhasil menghapus kategori peserta '.$nama_jenis_kegiatan.'!';
		}else{
			$messages = 'Gagal menghapus kategori peserta '.$nama_jenis_kegiatan.'!';
		}
		$this->session->set_flashdata('messages', $messages);
		redirect("Kategori_Peserta");
	}
}
