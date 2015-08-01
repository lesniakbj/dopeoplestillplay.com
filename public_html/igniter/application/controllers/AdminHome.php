<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {
	public function index() {		
		$data['title'] = 'Login - Administration Home';
		$data['css'] = 'statics/admin_home.css';
		
		$this->load->view('templates/header', $data);
		$this->load->view('statics/admin_home', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function login() {
		$something = $this->input->post();
		
		if($something['admin-username'] == 'lesniakbj' && $something['admin-password'] == 'Fgoal1313_') {
			$data['title'] = 'Welcome - Administration Home';
			$data['css'] = 'statics/admin_home.css';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$data['title'] = 'Login - Administration Home';
			$data['css'] = 'statics/admin_home.css';
		
			$this->load->view('templates/header', $data);
			$this->load->view('statics/admin_home', $data);
			$this->load->view('templates/footer', $data);
		}
	}
}