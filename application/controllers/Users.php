<?php

class Users extends MY_Controller {

	public function index() {

		$this->load->view('users/articlelist');
	}

	public function dropdown() {

		$this->load->view('users/homepage');
	}

}

?>