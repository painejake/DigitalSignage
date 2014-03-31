<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Settings_model extends CI_Model {

	public function update_settings() {

		$data = array(
			'num_news_posts'		=> $this->input->post('num_news_posts'),
			'num_events_posts'		=> $this->input->post('num_events_posts'),
			'refresh_time'			=> $this->input->post('author'),
			'time_zone'				=> $this->input->post('time_zone'),
			'feed_channel'			=> $this->input->post('feed_channel'),
			'facebook_pagename'		=> $this->input->post('facebook_pagename'),
			'twitter_username'		=> $this->input->post('twitter_username'),
			'twitter_data_id'		=> $this->input->post('twitter_data_id')
			);

		return $this->db->insert('settings', $data);
	}
}