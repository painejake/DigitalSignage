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

		$this->form_validation->set_rules('num_news_posts', 'num_news_posts', 'required');
		$this->form_validation->set_rules('num_events_posts', 'num_events_posts', 'required');
		$this->form_validation->set_rules('refresh_time', 'refresh_time', 'required');
		$this->form_validation->set_rules('facebook_pagename', 'facebook_pagename', 'required');
		$this->form_validation->set_rules('twitter_username', 'twitter_username', 'required');
		$this->form_validation->set_rules('twitter_data_id', 'twitter_data_id', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('settings_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$num_news_posts			= $this->input->post('num_news_posts');
			$num_events_posts		= $this->input->post('num_events_posts');
			$refresh_time			= $this->input->post('refresh_time');
			$facebook_pagename		= $this->input->post('facebook_pagename');
			$twitter_username		= $this->input->post('twitter_username');
			$twitter_data_id		= $this->input->post('twitter_data_id');

			// this->home_model->update_settings();
			$this->db->query("UPDATE `settings` SET `value` = '$num_news_posts' WHERE `setting` = 'num_news_posts';");
			$this->db->query("UPDATE `settings` SET `value` = '$num_events_posts' WHERE `setting` = 'num_events_posts';");
			$this->db->query("UPDATE `settings` SET `value` = '$refresh_time' WHERE `setting` = 'refresh_time';");
			$this->db->query("UPDATE `settings` SET `value` = '$facebook_pagename' WHERE `setting` = 'facebook_pagename';");
			$this->db->query("UPDATE `settings` SET `value` = '$twitter_username' WHERE `setting` = 'twitter_username';");
			$this->db->query("UPDATE `settings` SET `value` = '$twitter_data_id' WHERE `setting` = 'twitter_data_id';");

			//go private area
			redirect('settings', 'refresh');
		}
	}
}