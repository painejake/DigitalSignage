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
		$this->load->model('settings_model'); 

		$this->form_validation->set_rules('num_news_posts', 'num_news_posts', 'required');
		$this->form_validation->set_rules('num_events_posts', 'num_events_posts', 'required');
		$this->form_validation->set_rules('refresh_time', 'refresh_time', 'required');
		$this->form_validation->set_rules('time_zone', 'time_zone', 'required');
		$this->form_validation->set_rules('feed_channel', 'feed_channel', 'required');
		$this->form_validation->set_rules('facebook_pagename', 'facebook_pagename', 'required');
		$this->form_validation->set_rules('twitter_username', 'twitter_username', 'required');
		$this->form_validation->set_rules('twitter_data_id', 'twitter_data_id', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('settings_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->update_settings_db();
			
			//go private area
			redirect('settings', 'refresh');
		}
	}
}