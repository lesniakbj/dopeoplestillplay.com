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
	
	public function login() {
		$loginData = $this->input->post('admin-login');
		
		if($loginData['admin-username'] = 'lesniakbj' && $loginData['admin-password'] = 'Fgoal1313_') {
			$this->load->view('templates/header', $data);
			//$this->load->view('statics/admin_home', $data);
			$this->load->view('templates/footer', $data);
		}
	}
}