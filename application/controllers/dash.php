<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Dash extends CI_Controller {

	function __construct(){
        parent::__construct();

		// check session to see if user is authenticated
		$this->user_model->check_session();
    }

	public function index() {
		$data = array();
		$data['news'] = $this->home_model->get_news();
		$data['events'] = $this->home_model->get_events();

		$this->load->view('template/dashboard/header');
		$this->load->view('dash_view', $data);
		$this->load->view('template/dashboard/footer');
	}
}