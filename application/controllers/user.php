<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->check_session();
	}

	public function index() {	

		$this->load->view('template/dashboard/header');
		$this->load->view('user_view');
		$this->load->view('template/dashboard/footer');
	}

    private function check_session(){
    	
        if(! $this->session->userdata('logged_in')){
            redirect('login');
        }
    }
}