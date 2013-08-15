<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function get_news() {
		$num_posts = $this->config->item('num_posts');

		$q = $this->db->query("SELECT * FROM news ORDER BY id DESC LIMIT $num_posts");
		return $q->result_array();
	}

	public function create_entry() {
		//$this->load->helper('url');

		$data = array(
			'title'			=> $this->input->post('title'),
			'content'		=> $this->input->post('content')
			);

		return $this->db->insert('news', $data);

		$this->db->cache_delete_all();
	}
}