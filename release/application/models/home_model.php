<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_news() {
		$num_news_posts = $this->config->item('num_news_posts');

		$q = $this->db->query("SELECT * FROM news ORDER BY id DESC LIMIT $num_news_posts");
		return $q->result_array();
	}

	public function get_events() {
		$num_events_posts = $this->config->item('num_events_posts');

		$q = $this->db->query("SELECT * FROM dates ORDER BY id DESC LIMIT $num_events_posts");
		return $q->result_array();
	}

	public function create_news_entry() {

		$data = array(
			'title'			=> $this->input->post('title'),
			'content'		=> $this->input->post('content'),
			'author'		=> $this->input->post('author')
			);

		return $this->db->insert('news', $data);

		$this->db->cache_delete_all();
	}

	public function create_events_entry() {

		$data = array(
			'event'			=> $this->input->post('event'),
			'date'			=> $this->input->post('date'),
			'time'			=> $this->input->post('time')
			);

		return $this->db->insert('dates', $data);

		$this->db->cache_delete_all();
	}
}