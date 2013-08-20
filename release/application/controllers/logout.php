<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Logout extends CI_Controller {

	public function index() {
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();

		redirect('home','refresh');
	}
}