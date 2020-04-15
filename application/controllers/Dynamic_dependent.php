<?php

class Dynamic_dependent extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Dynamic_dependent_model');
	}

	public function index() {

		$datas['country'] = $this->Dynamic_dependent_model->fetch_country();
		// print_r($datas['country']); exit;
		$this->load->view('users/dynamic_dependent', $datas);
	}

	public function fetch_state() {

		if ($this->input->post('country_id')) {
		
			echo $this->Dynamic_dependent_model->fetch_states($this->input->post('country_id'));
		}
	}

	public function fetch_city() {
		
		if ($this->input->post('state_id')) {
		
			echo $this->Dynamic_dependent_model->fetch_cities($this->input->post('state_id'));
		}
	}
}


?>