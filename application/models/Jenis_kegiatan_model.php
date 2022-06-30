<?php

Class Jenis_kegiatan_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_jenis_kegiatan(){
		$this->db->select('*');
		$this->db->from('jenis_kegiatan');
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

	public function get_jenis_kegiatan_id($id){
		$condition = "id =" . "'" . $id . "'";
		$this->db->select('*');
		$this->db->from('jenis_kegiatan');
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

	public function jenis_kegiatan_insert($data) {
		$condition = "nama =" . "'" . $data['nama'] . "'";
		$this->db->select('*');
		$this->db->from('jenis_kegiatan');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() === 0) {
			$this->db->insert('jenis_kegiatan', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function jenis_kegiatan_update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('jenis_kegiatan', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function jenis_kegiatan_delete($id){
		$this->db->delete('jenis_kegiatan', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
