<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Forgot extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {		
		$this->load->view('template/dashboard/header');
		$this->load->view('forgot_view');
		$this->load->view('template/dashboard/footer');
	}
}