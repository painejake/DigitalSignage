<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class ForgotPassword extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model', '', TRUE);
	}

	public function index() {
		// this method has the credentials validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('security', 'Security', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|xss_clean|min_length[6]|callback_check_database');

		if($this->form_validation->run() == FALSE) {
			// validation failed - redirect to forgotten password page
			$this->load->view('template/dashboard/header');
			$this->load->view('forgot_view');
			$this->load->view('template/dashboard/footer');
		} else {
			// continue
		}
	}

	public function check_database() {
		// validate against db
		$username = $this->input->post('username');
		$security = $this->input->post('security');
		$password = $this->input->post('password');

		$result = $this->user_model->reset($username, $security);

		if($result) {
			$this->db->query("UPDATE `users` SET `password` = SHA1( '$password' ) WHERE `username` = '$username';");

			// password change complete redirect to login
			$this->load->view('template/dashboard/header');
			$this->load->view('login_view');
			$this->load->view('template/dashboard/footer');

		} else {
			$this->form_validation->set_message('check_database', 'Cannot validate username and security key combination');
			return FALSE;
		}
	}
}