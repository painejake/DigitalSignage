<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Create extends CI_Controller {

	function __construct(){
        parent::__construct();

		// check session to see if user is authenticated
		$this->user_model->check_session();
    }

	public function news() {
		$data = array();
		$data['news'] = $this->home_model->get_news();

		$this->load->view('template/dashboard/header');
		$this->load->view('create_news_view', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function events() {
		$data = array();
		$data['events'] = $this->home_model->get_events();

		$this->load->view('template/dashboard/header');
		$this->load->view('create_events_view', $data);
		$this->load->view('template/dashboard/footer');
	}
}