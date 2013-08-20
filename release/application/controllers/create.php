<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Create extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->check_session();
    }

	public function index() {		
		$this->load->view('template/dashboard/header');
		$this->load->view('create_view');
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
}