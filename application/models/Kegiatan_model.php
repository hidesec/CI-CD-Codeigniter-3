<?php

Class Kegiatan_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_kegiatan(){
		$this->db->select('kegiatan.*,
		jenis_kegiatan.nama');
		$this->db->from('kegiatan');
		$this->db->join('jenis_kegiatan','jenis_kegiatan.id = kegiatan.jenis_id','left');
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

	public function get_kegiatan_id($id){
		$this->db->select('kegiatan.*,
		jenis_kegiatan.nama');
		$this->db->from('kegiatan');
		$this->db->join('jenis_kegiatan','jenis_kegiatan.id = kegiatan.jenis_id','left');
		$this->db->where('kegiatan.id', $id);
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

	public function kegiatan_insert($data){
		$condition = "judul =" . "'" . $data['judul'] . "'";
		$this->db->select('id');
		$this->db->from('kegiatan');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() === 0) {
			$this->db->insert('kegiatan', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function kegiatan_update($data, $id){
		$this->db->where('id', $id);
		$this->db->update('kegiatan', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function kegiatan_delete($id){
		$this->db->delete('kegiatan', array('id' => $id));
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
