<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Dash extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_session();
        
        $this->load->model('home_model');
    }

	public function index() {
		$data = array();
		$data['news'] = $this->home_model->get_news();
		$data['events'] = $this->home_model->get_events();

		$this->load->view('template/dashboard/header');
		$this->load->view('dash_view', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function success() {
		$this->load->view('template/dashboard/header');
		$this->load->view('success_view');
		$this->load->view('template/dashboard/footer');
	}

    private function check_session(){
        if(! $this->session->userdata('logged_in')){
            redirect('login');
        }
    }

	public function logout() {
		$this->session->sess_destroy();
        redirect('login');
	}

	public function create_news() {

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('create_news_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->create_news_entry();
			
			//go private area
			redirect('dash/success', 'refresh');
		}
	}

	public function create_events() {

		$this->form_validation->set_rules('event', 'event', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('create_events_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->create_events_entry();

			//go private area
			redirect('dash/success', 'refresh');
		}
	}
}