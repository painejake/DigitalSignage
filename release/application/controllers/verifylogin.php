<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class VerifyLogin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model', '', TRUE);
	}

	public function index() {
		// this method has the credentials validation
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE) {
			// validation failed - redirect to login
			$this->load->view('template/header');
			$this->load->view('login_view');
			$this->load->view('template/footer');
		} else {
			//go private area
			redirect('create', 'refresh');
		}
	}

	public function check_database($password) {
		// validate against db
		$username = $this->input->post('username');

		$result = $this->user_model->login($username, $password);

		if($result) {
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'username'  => $username,
					'logged_in' => TRUE
                   );
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
}