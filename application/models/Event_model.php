<?php
Class Event_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function event_insert($data){
		$this->db->insert('daftar', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}
}
