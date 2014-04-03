<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		$this->load->database();

		$s_q = $this->db->query("SELECT value FROM settings WHERE `setting` = 'time_zone' LIMIT 1");

		foreach ($s_q->result() as $row) {
			$time_zone = $row->value;
		}

		date_default_timezone_set($time_zone);
	}

	public function get_news() {

		$q = $this->db->query("SELECT * FROM news ORDER BY id DESC");
		return $q->result_array();
	}

	public function get_events() {

		$curr_date = date("Y-m-d");

		$q = $this->db->query("SELECT * FROM dates WHERE `date` >= '$curr_date' ORDER BY id ASC");
		return $q->result_array();
	}

	public function create_news_entry() {

		$data = array(
			'title'			=> $this->input->post('title'),
			'content'		=> $this->input->post('content'),
			'author'		=> $this->input->post('author')
			);

		return $this->db->insert('news', $data) ? true : false;
	}

	public function create_events_entry() {

		$event_data = array(
			'event'			=> $this->input->post('event'),
			'date'			=> $this->input->post('date'),
			'time'			=> $this->input->post('time')
			);

		return $this->db->insert('dates', $event_data) ? true : false;
	}

	public function update_news_entry() {

		$data = array(
			'id'			=> $this->input->post('id'),
			'title'			=> $this->input->post('title'),
			'content'		=> $this->input->post('content'),
			'author'		=> $this->input->post('author')
			);

		$id = $data['id'];

		$this->db->where('id', $id);
		return $this->db->update('news', $data);
	}
}