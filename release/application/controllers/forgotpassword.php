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
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
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
		$username 	= $this->input->post('username');
		$security 	= $this->input->post('security');
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$result = $this->user_model->reset($username, $security, $email);

		if($result) {
			$this->db->query("UPDATE `users` SET `password` = SHA1( '$password' ) WHERE `username` = '$username';");

			// send email to notify user of password change
			$this->email->from('donotreply@fairfax.bham.sch.uk', 'Digital Signage');
			$this->email->to($email);

			$this->email->subject('Password Reset');
			$this->email->message('Your password has been reset using the reset form.');

			$this->email->send();

			// password change complete redirect to login
			redirect('login','refresh');

		} else {
			$this->form_validation->set_message('check_database', 'Cannot validate username and security key combination');
			return FALSE;
		}
	}
}