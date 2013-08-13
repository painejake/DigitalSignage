<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index() {
		$data['news'] = $this->news_model->get_news();

		$this->load->view('template/header');
		$this->load->view('news_view', $data);
		$this->load->view('template/footer');
	}

	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/header');
			$this->load->view('create_view');
			$this->load->view('template/footer');
		} else {
			$this->news_model->create_entry();
			$this->load->view('success');
		}
	}
}