<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {
	public function index() {		
		$data['title'] = 'Administration';
		$data['css'] = 'statics/admin_home.css';
		
		$this->load->view('templates/header', $data);
		$this->load->view('statics/admin_home', $data);
		$this->load->view('templates/footer', $data);
	}
}