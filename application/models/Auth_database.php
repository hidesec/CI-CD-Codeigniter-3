<?php

Class Auth_Database extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }

	// Insert registration data in database
	public function registration_insert($data) {

		// Query to check whether username already exist or not
		$condition = "username =" . "'" . $data['username'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
//		echo $query->num_rows();
//        log_message('debug', "Err: ".$this->db->error());
//		log_message('error', "Err: ".$this->db->error());
		if ($query->num_rows() === 0) {
			// Query to insert data in database
			$this->db->insert('users', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	// Read data using username and password
	public function login($data) {
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() === 1) {
			return true;
		} else {
			return false;
		}
	}

		// Read data from database to show data in admin page
	public function read_user_information($username) {
		$condition = "username =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function get_last_id_user(){
		$this->db->select('id');
		$this->db->from('users');
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
}
