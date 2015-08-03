<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');	
	}
	
	public function index() {		
		$data['title'] = 'Login - Administration Home';
		$data['css'] = 'statics/admin_home.css';
		
		$this->load->view('templates/header', $data);
		$this->load->view('statics/admin/admin_home', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function login() {
		// Before getting the POST values, check the form to ensure that it is valid
		$this->form_validation->set_rules('admin-username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('admin-password', 'Password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login - Administration Home';
			$data['css'] = 'statics/admin_home.css';
		
			$this->load->view('templates/header', $data);
			$this->load->view('statics/admin/admin_home', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
			// The form passed validation, get the data from the form, and then check to 
			// see if the credentials are correct.
			$data['title'] = 'Welcome - Administration Home';
			$data['css'] = 'statics/admin/admin_home.css';
			
			$this->load->view('templates/header', $data);
			$this->load->view('templates/footer', $data);
			
		}
	}
}