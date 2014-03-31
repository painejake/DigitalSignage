<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		$this->load->database();

		$time_zone = $this->config->item('time_zone');
		date_default_timezone_set($time_zone);
	}

	public function get_news() {
		$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'num_news_posts' LIMIT 1");

		foreach ($s_q->result() as $row) {
		   $num_news_posts = $row->value;
		}

		$q = $this->db->query("SELECT * FROM news ORDER BY id DESC LIMIT $num_news_posts");
		return $q->result_array();
	}

	public function get_events() {
		$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'num_events_posts' LIMIT 1");

		foreach ($s_q->result() as $row) {
		   $num_events_posts = $row->value;
		}

		$curr_date = date("Y-m-d");

		$q = $this->db->query("SELECT * FROM dates WHERE `date` >= '$curr_date' ORDER BY id ASC LIMIT $num_events_posts");
		return $q->result_array();
	}

	public function create_news_entry() {

		$data = array(
			'title'			=> $this->input->post('title'),
			'content'		=> $this->input->post('content'),
			'author'		=> $this->input->post('author')
			);

		return $this->db->insert('news', $data);
	}

	public function create_events_entry() {

		$event_data = array(
			'event'			=> $this->input->post('event'),
			'date'			=> $this->input->post('date'),
			'time'			=> $this->input->post('time')
			);

		return $this->db->insert('dates', $event_data);
	}
}