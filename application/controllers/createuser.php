<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class CreateUser extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->model('user_model');
	}

	public function index() {
		// this method has the credentials validation
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('security', 'Security', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|xss_clean|min_length[6]|callback_check_database');

		if($this->form_validation->run() == FALSE) {
			// validation failed - redirect to forgotten password page
			$this->load->view('template/dashboard/header');
			$this->load->view('user_view');
			$this->load->view('template/dashboard/footer');
		} else {
			// continue
			$this->user_model->check_exist();
		}
	}

	public function check_database() {
		// validate against db
		$username 	= $this->input->post('username');
		$security 	= $this->input->post('security');
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');

		$result = $this->user_model->check_exist($username, $email);

		if($result) {
			$this->form_validation->set_message('check_database', 'Account already exists');
			return FALSE;

		} else {
			$this->db->query("INSERT INTO `users` (`id` , `username` , `password` , `email` , `security`) 
				VALUES (NULL , '$username', SHA1( '$password') , '$email', '$security');");

			// send email to notify user of password change
			$this->email->from('donotreply@fairfax.bham.sch.uk', 'Digital Signage');
			$this->email->to($email);

			$this->email->subject('User Account Created');
			$this->email->message('Your account has been created for the Digital Sigange system. \n You can login here: link');

			$this->email->send();

			// password change complete redirect to login
			redirect('create','refresh');
		}
	}
}