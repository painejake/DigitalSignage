<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->check_session();

		$this->load->model('settings_model');
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

	public function update() {
		$this->load->model('settings_model'); 
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('num_news_posts', 'total news posts', 'trim|required');
		$this->form_validation->set_rules('num_events_posts', 'total event posts', 'trim|required');
		$this->form_validation->set_rules('refresh_time', 'refresh time', 'trim|numeric|required');
		$this->form_validation->set_rules('facebook_pagename', 'facebook pagename', 'trim|required');
		$this->form_validation->set_rules('twitter_username', 'twitter username', 'trim|required');
		$this->form_validation->set_rules('twitter_data_id', 'twitter data id', 'trim|required');
		$this->form_validation->set_rules('show_help_link', 'help link', 'trim|required');
		$this->form_validation->set_rules('feed_channel', 'feed channel', 'trim|required');
		$this->form_validation->set_rules('time_zone', 'time zone', 'trim|required');
		$this->form_validation->set_rules('latest_news_title', 'latest news title', 'trim|required');
		$this->form_validation->set_rules('latest_events_title', 'latest events title', 'trim|required');
		$this->form_validation->set_rules('show_upcoming_event', 'show upcoming event', 'trim|required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('settings_view');
			$this->load->view('template/dashboard/footer');
		} else {

			$this->settings_model->update_settings();

			//go private area
			redirect('settings', 'refresh');
		}
	}
}