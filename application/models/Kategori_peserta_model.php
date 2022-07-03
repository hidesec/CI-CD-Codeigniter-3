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
}
