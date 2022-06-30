<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller{
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
		$this->load->model('Jenis_kegiatan_model');
		$this->load->model('Kegiatan_model');
	}

	public function index(){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['kegiatan'] = $this->Kegiatan_model->get_kegiatan();
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('kegiatan/kegiatan', $data);
		$this->load->view('master_view/footer');
	}

	public function create(){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['jenis_kegiatan'] = $this->Jenis_kegiatan_model->get_jenis_kegiatan();
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('kegiatan/kegiatan_form', $data);
		$this->load->view('master_view/footer');
	}

	public function store(){
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|xss_clean');
		$this->form_validation->set_rules('harga_tiket', 'Harga_tiket', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('narasumber', 'Narasumber', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pic', 'Pic', 'trim|required|xss_clean');
		$this->form_validation->set_rules('foto_flyer', 'Foto_flyer', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jenis_id', 'Jenis_id', 'trim|required|xss_clean');

		$config['upload_path']          = './assets/upload';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['overwrite']            = true;
		$config['max_size']             = 5024; // 1MB
		$config['max_width']            = 7080;
		$config['max_height']           = 7080;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto_flyer')) {
			$messages = $this->upload->display_errors();
			$this->session->set_flashdata('messages', $messages);
			redirect("kegiatan/create");
		} else {
			$file_upload = $this->upload->data();
			$data = array(
				'judul' => $this->input->post('judul'),
				'kapasitas' => $this->input->post('kapasitas'),
				'harga_tiket' => $this->input->post('harga_tiket'),
				'tanggal' => date("Y-m-d", strtotime($this->input->post('tanggal'))),
				'narasumber' => $this->input->post('narasumber'),
				'tempat' => $this->input->post('tempat'),
				'pic' => $this->input->post('pic'),
				'foto_flyer' => '/assets/upload/'.$file_upload["orig_name"],
				'jenis_id' => $this->input->post('jenis_id'),
			);
			$result = $this->Kegiatan_model->kegiatan_insert($data);

			if ($result == TRUE) {
				$messages = 'Berhasil menambahkan kegiatan '.$this->input->post('judul').'!';
				$this->session->set_flashdata('messages', $messages);
				redirect("kegiatan");
			}else{
				$messages = 'Kegiatan '.$this->input->post('judul').' sudah terdaftar!';
				$this->session->set_flashdata('messages', $messages);
				redirect("kegiatan/create");
			}
		}
	}

	public function show($id){
		$this->load->view('master_view/header');
		$this->load->view('master_view/sidebar');
		$data['kegiatan'] = $this->Kegiatan_model->get_kegiatan_id($id);
		$data['jenis_kegiatan'] = $this->Jenis_kegiatan_model->get_jenis_kegiatan();
		$data['message_display'] = $this->session->flashdata('messages');
		$this->load->view('kegiatan/kegiatan_form_edit', $data);
		$this->load->view('master_view/footer');
	}

	public function update($id){
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required|xss_clean');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'trim|required|xss_clean');
		$this->form_validation->set_rules('harga_tiket', 'Harga_tiket', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|xss_clean');
		$this->form_validation->set_rules('narasumber', 'Narasumber', 'trim|required|xss_clean');
		$this->form_validation->set_rules('tempat', 'Tempat', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pic', 'Pic', 'trim|required|xss_clean');
		$this->form_validation->set_rules('foto_flyer', 'Foto_flyer', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jenis_id', 'Jenis_id', 'trim|required|xss_clean');

		$config['upload_path']          = './assets/upload';
		$config['allowed_types']        = 'gif|jpg|jpeg|png';
		$config['overwrite']            = true;
		$config['max_size']             = 5024; // 1MB
		$config['max_width']            = 7080;
		$config['max_height']           = 7080;

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto_flyer')) {
			echo "masuk if";
			echo $this->input->post('foto_flyer');
			die();
			$messages = $this->upload->display_errors();
			$this->session->set_flashdata('messages', $messages);
			redirect("kegiatan/edit/".$id);
		} else {
			$file_upload = $this->upload->data();
			$data = array(
				'judul' => $this->input->post('judul'),
				'kapasitas' => $this->input->post('kapasitas'),
				'harga_tiket' => $this->input->post('harga_tiket'),
				'tanggal' => date("Y-m-d", strtotime($this->input->post('tanggal'))),
				'narasumber' => $this->input->post('narasumber'),
				'tempat' => $this->input->post('tempat'),
				'pic' => $this->input->post('pic'),
				'foto_flyer' => '/assets/upload/'.$file_upload["orig_name"],
				'jenis_id' => $this->input->post('jenis_id'),
			);
			$result = $this->Kegiatan_model->kegiatan_update($data, $id);

			if ($result == TRUE) {
				$messages = 'Berhasil menambahkan kegiatan '.$this->input->post('judul').'!';
				$this->session->set_flashdata('messages', $messages);
				redirect("kegiatan");
			}else{
				$messages = 'Kegiatan '.$this->input->post('judul').' sudah terdaftar!';
				$this->session->set_flashdata('messages', $messages);
				redirect("kegiatan/edit/".$id);
			}
		}
	}

	public function delete($id){
		$data = $this->Kegiatan_model->get_kegiatan_id($id);
		$judul_kegiatan = $data[0]["judul"];
		$result = $this->Kegiatan_model->kegiatan_delete($id);
		if ($result == TRUE) {
			$messages = 'Berhasil menghapus kegiatan '.$judul_kegiatan.'!';
			$this->session->set_flashdata('messages', $messages);
			redirect("kegiatan");
		}else{
			$messages = 'Gagal menghapus kegiatan '.$judul_kegiatan.'!';
			$this->session->set_flashdata('messages', $messages);
			redirect("kegiatan");
		}
	}
}
