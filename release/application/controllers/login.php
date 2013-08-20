<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {		
		$this->load->view('template/dashboard/header');
		$this->load->view('login_view');
		$this->load->view('template/dashboard/footer');
	}
}