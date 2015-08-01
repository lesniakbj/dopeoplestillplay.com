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
		$loginData = $this->input->post('admin-login', TRUE));
		
		if($loginData['admin-username'] = 'lesniakbj' && $loginData['admin-password'] = 'Fgoal1313_') {
			$this->load->view('templates/header', $data);
			//$this->load->view('statics/admin_home', $data);
			$this->load->view('templates/footer', $data);
			
			// If we logged in, create a session and check it in the view?... Redirect to a page?...
			$this->load->helper('url');
			$this->output->set_header('url=/');
		} else {
			
		}
	}
}