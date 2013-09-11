<?php

Class User_model extends CI_Model {

	public function login($username, $password) {
		$this->db->select('id', 'username', 'password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('password', sha1($password));
		$this->db->limit(1);

		$q = $this->db->get();

		if ($q->num_rows() == 1) {
			return $q->result();
		} else {
			return FALSE;
		}
	}

	public function reset($username, $security) {
		$this->db->select('id', 'username', 'security');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('security', $security);
		$this->db->limit(1);

		$q = $this->db->get();

		if ($q->num_rows() == 1) {
			return $q->result();
		} else {
			return FALSE;
		}
	}
}