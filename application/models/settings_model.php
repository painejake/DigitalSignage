<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Settings_model extends CI_Model {

	public function update_settings() {

		$num_news_posts			= $this->input->post('num_news_posts');
		$num_events_posts		= $this->input->post('num_events_posts');
		$refresh_time			= $this->input->post('refresh_time');
		$show_help_link			= $this->input->post('show_help_link');
		$feed_channel			= $this->input->post('feed_channel');
		$time_zone				= $this->input->post('time_zone');
		
		$facebook_pagename		= $this->input->post('facebook_pagename');
		$twitter_username		= $this->input->post('twitter_username');
		$twitter_data_id		= $this->input->post('twitter_data_id');

		$latest_news_title		= $this->input->post('latest_news_title');
		$latest_events_title	= $this->input->post('latest_events_title');
		$show_upcoming_event	= $this->input->post('show_upcoming_event');

		$slide1_url				= $this->input->post('slide1_url');
		$slide2_url				= $this->input->post('slide2_url');
		$slide3_url				= $this->input->post('slide3_url');
		$cycle_time				= $this->input->post('cycle_time');

		$this->db->query("UPDATE `settings` SET `value` = '$num_news_posts' WHERE `setting` = 'num_news_posts';");
		$this->db->query("UPDATE `settings` SET `value` = '$num_events_posts' WHERE `setting` = 'num_events_posts';");
		$this->db->query("UPDATE `settings` SET `value` = '$refresh_time' WHERE `setting` = 'refresh_time';");
		$this->db->query("UPDATE `settings` SET `value` = '$show_help_link' WHERE `setting` = 'show_help_link';");
		$this->db->query("UPDATE `settings` SET `value` = '$feed_channel' WHERE `setting` = 'feed_channel';");
		$this->db->query("UPDATE `settings` SET `value` = '$time_zone' WHERE `setting` = 'time_zone';");

		$this->db->query("UPDATE `settings` SET `value` = '$facebook_pagename' WHERE `setting` = 'facebook_pagename';");
		$this->db->query("UPDATE `settings` SET `value` = '$twitter_username' WHERE `setting` = 'twitter_username';");
		$this->db->query("UPDATE `settings` SET `value` = '$twitter_data_id' WHERE `setting` = 'twitter_data_id';");

		$this->db->query("UPDATE `settings` SET `value` = '$latest_news_title' WHERE `setting` = 'latest_news_title';");
		$this->db->query("UPDATE `settings` SET `value` = '$latest_events_title' WHERE `setting` = 'latest_events_title';");
		$this->db->query("UPDATE `settings` SET `value` = '$show_upcoming_event' WHERE `setting` = 'show_upcoming_event';");

		$this->db->query("UPDATE `settings` SET `value` = '$slide1_url' WHERE `setting` = 'slide1_url';");
		$this->db->query("UPDATE `settings` SET `value` = '$slide2_url' WHERE `setting` = 'slide2_url';");
		$this->db->query("UPDATE `settings` SET `value` = '$slide3_url' WHERE `setting` = 'slide3_url';");
		$this->db->query("UPDATE `settings` SET `value` = '$cycle_time' WHERE `setting` = 'cycle_time';");
	}
}