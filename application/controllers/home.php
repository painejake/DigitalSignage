<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {

		$data = array();
		$data['news'] = $this->home_model->get_news();
		$data['events'] = $this->home_model->get_events();

		$this->load->view('template/header');
		$this->load->view('home_view', $data);
		$this->load->view('template/footer');
	}

	public function create_news() {

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('content', 'content', 'required');
		$this->form_validation->set_rules('author', 'author', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('create_news_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->create_news_entry();

			//if ($this->home_model->create_news_entry() == FALSE) {
			//	redirect('dash/fail', 'refresh');
			//} else {
			//	redirect('dash/success', 'refresh');
			//}
			$this->session->set_flashdata('msg', 'The news post was added successfully!');
			redirect('dash', 'refresh');
		}
	}

	public function create_events() {

		$this->form_validation->set_rules('event', 'event', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('create_events_view');
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->create_events_entry();

			$this->session->set_flashdata('msg', 'The event was added successfully!');
			redirect('dash', 'refresh');
		}
	}

	public function delete_news($id) {

		$this->load->database();
  		$this->db->delete('news', array('id' => $id));

  		$this->session->set_flashdata('msg', 'The news post was deleted successfully!');

		redirect('dash', 'refresh');
	}

	public function delete_dates($id) {

		$this->load->database();
  		$this->db->delete('dates', array('id' => $id));

  		$this->session->set_flashdata('msg', 'The event was deleted successfully!');

  		redirect('dash', 'refresh');
	}

	public function edit_news($id) {

		$q = $this->db->query("SELECT * FROM `news` WHERE `id` = $id");
		
		foreach ($q->result_array() as $row) {
			$data['id'] = $row['id'];
			$data['title'] = $row['title'];
			$data['content'] = $row['content'];
			$data['author'] = $row['author'];
		}

		$this->load->view('template/dashboard/header');
		$this->load->view('edit_news_view', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function edit_event($id) {

		$q = $this->db->query("SELECT * FROM `dates` WHERE `id` = $id");
		
		foreach ($q->result_array() as $row) {
			$data['id'] = $row['id'];
			$data['event'] = $row['event'];
			$data['date'] = $row['date'];
			$data['time'] = $row['time'];
		}

		$this->load->view('template/dashboard/header');
		$this->load->view('edit_event_view', $data);
		$this->load->view('template/dashboard/footer');
	}

	public function update_news() {

		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('title', 'title', 'trim|required');
		$this->form_validation->set_rules('content', 'content', 'required');
		$this->form_validation->set_rules('author', 'author', 'trim|required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('edit_news_view', $data);
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->update_news_entry();

			$this->session->set_flashdata('msg', 'The news post was updated successfully!');
			redirect('dash', 'refresh');
		}	
	}

	public function update_event() {

		$this->form_validation->set_rules('id', 'id', 'trim|required');
		$this->form_validation->set_rules('event', 'event', 'trim|required');
		$this->form_validation->set_rules('date', 'date', 'required');
		$this->form_validation->set_rules('time', 'time', 'trim|required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('template/dashboard/header');
			$this->load->view('edit_news_view', $data);
			$this->load->view('template/dashboard/footer');
		} else {
			$this->home_model->update_event_entry();

			$this->session->set_flashdata('msg', 'The news post was updated successfully!');
			redirect('dash', 'refresh');
		}	
	}
}