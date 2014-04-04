<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Settings extends CI_Controller {

	function __construct(){
		parent::__construct();

		// check session to see if user is authenticated
		$this->user_model->check_session();
	}

	public function index() {
		$this->load->view('template/dashboard/header');
		$this->load->view('settings_view');
		$this->load->view('template/dashboard/footer');
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
		$this->form_validation->set_rules('slide1_url', 'Slide 1 URL', 'trim|required');
		$this->form_validation->set_rules('slide2_url', 'Slide 2 URL', 'trim|required');
		$this->form_validation->set_rules('slide3_url', 'Slide 3 URL', 'trim|required');
		$this->form_validation->set_rules('cycle_time', 'cycle time', 'trim|required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('settings_view');
			$this->load->view('template/dashboard/footer');
		} else {

			$this->settings_model->update_settings();

			$this->session->set_flashdata('msg', 'The settings were updated successfully!');
			redirect('dash', 'refresh');
		}
	}
}