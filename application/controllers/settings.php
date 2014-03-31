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

	public function update_settings() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('home_model'); 

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('settings_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->update_settings();
			
			//go private area
			redirect('settings', 'refresh');
		}
	}
}