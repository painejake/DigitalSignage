<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index() {
		$data = array();
		$data['news'] = $this->home_model->get_news();
		$data['events'] = $this->home_model->get_events();

		$this->load->view('template/header');
		$this->load->view('home_view', $data);
		$this->load->view('template/footer');
	}

	public function create_news() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('error_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->create_news_entry();
			$this->load->view('template/dashboard/header');
			$this->load->view('success');
			$this->load->view('template/dashboard/footer');
		}
	}

	public function create_events() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('event', 'event', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('error_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$this->load->view('template/dashboard/header');
			$this->load->view('success');
			$this->load->view('template/dashboard/footer');
		}
	}
}