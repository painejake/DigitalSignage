<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

	// check session to see if user is authenticated
	public function check_session(){
		if(! $this->session->userdata('logged_in')){
			redirect('login');
		}
	}
}