<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_news() {
		$num_posts = $this->config->item('num_posts');

		$q = $this->db->query("SELECT * FROM news ORDER BY id DESC LIMIT $num_posts");
		return $q->result_array();
	}

	public function get_events() {
		$q = $this->db->query("SELECT * FROM dates ORDER BY id DESC LIMIT 1");
		return $q->result_array();
	}

	public function create_entry() {
		//$this->load->helper('url');

		$data = array(
			'title'			=> $this->input->post('title'),
			'content'		=> $this->input->post('content'),
			'author'		=> $this->input->post('author')
			);

		return $this->db->insert('news', $data);

		$this->db->cache_delete_all();
	}
}