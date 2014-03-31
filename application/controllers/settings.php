<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_session();

		$this->load->model('home_model');
	}

	public function index() {
		$this->load->view('template/dashboard/header');
		$this->load->view('settings_view');
		$this->load->view('template/dashboard/footer');
	}

	private function check_session(){
		if(! $this->session->userdata('logged_in')){
			redirect('login');
		}
	}
}