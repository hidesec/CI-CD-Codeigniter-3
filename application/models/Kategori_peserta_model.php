<?php

Class Kategori_peserta_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_kategori_peserta(){
		$this->db->select('*');
		$this->db->from('kategori_peserta');
		$query = $this->db->get();

		if($query->num_rows() !== 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function get_kategori_peserta_id($id){
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('kategori_peserta');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() !== 0)
		{
			return $query->result_array();
		}
		else
		{
			return false;
		}
	}

	public function kategori_peserta_insert($data){
		$condition = "nama =" . "'" . $data['nama'] . "'";
		$this->db->select('*');
		$this->db->from('kategori_peserta');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() === 0) {
			$this->db->insert('kategori_peserta', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function kategori_peserta_update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('kategori_peserta', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function kategori_peserta_delete($id){
		$this->db->delete('kategori_peserta', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
