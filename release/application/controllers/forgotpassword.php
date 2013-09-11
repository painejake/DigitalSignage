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
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|matches[confirmpassword]|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|xss_clean|min_length[6]');

		if($this->form_validation->run() == FALSE) {
			// validation failed - redirect to forgotten password page
			$this->load->view('template/dashboard/header');
			$this->load->view('forgot_view');
			$this->load->view('template/dashboard/footer');
		} else {
			//go private area
			redirect('login', 'refresh');
		}
	}
}