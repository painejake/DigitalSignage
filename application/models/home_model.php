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
}