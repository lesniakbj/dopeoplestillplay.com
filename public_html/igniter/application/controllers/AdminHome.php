<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminHome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('form');
		$this->load->helper('url');
		
		$this->load->library('form_validation');
		$this->load->library('session');	
		
		$this->load->model('admin/admin_model');
	}
	
	public function index() {		
		$data['title'] = 'Login - Administration Home';
		$data['css'] = 'statics/admin_home.css';
		
		$this->load->view('/templates/header', $data);
		$this->load->view('/statics/admin/admin_login', $data);
		$this->load->view('/templates/footer', $data);
	}
	
	public function login() {
		// Before getting the POST values, check the form to ensure that it is valid
		$this->form_validation->set_rules('admin-username', 'Username', 'trim|required');
		$this->form_validation->set_rules('admin-password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->displayLoginPage("Form Validation Failed!", "form");
		}
		else {
			// The form passed validation, get the data from the form, and then check to 
			// see if the credentials are correct.
			$uname = $this->input->post('admin-username');
			$pw = $this->input->post('admin-password');
			$ipAddr = $_SERVER['REMOTE_ADDR'];
			
			$isAdmin = $this->checkAdminStatus($uname, $pw, $ipAddr);
			if($isAdmin == TRUE) {
				// Start a session and check that session on home page view
				$this->startAdminSession($uname, $pw, $ipAddr);
				$this->displayAdminLanding();
			} else {
				$this->displayLoginPage("Incorrect Login!", "auth");
			}
		}
	}
	
	public function logout() {
		$this->session->sess_destroy();
		$this->redirect();
	}
	
	public function home() {
		$this->displayAdminHome();
	}
	
	public function redirect($url = 'http://admin.dopeoplestillplay.com', $perm = FALSE) {
		if(!headers_sent()) {
			header('Location:'.$url, true, ($perm === TRUE) ? 301 : 302);
		}		
		die();
	}
	
	private function checkAdminStatus($uname, $pw, $logIP) {
		$isAdmin = $this->admin_model->checkIsAdmin($uname, $pw);
		$this->admin_model->logAttemptToDB($uname, $pw, $logIP, $isAdmin);
		return $isAdmin;
	}
	
	private function startAdminSession($uname, $pw, $ipAddr) {
		$adminSessionData = array(
			'admin-username' => $uname,
			'admin-pw-hash'  => md5($pw),
			'admin-ip' 		 => $ipAddr,
			'logged-in'		 => TRUE
		);
		
		$this->session->set_userdata($adminSessionData);
	}
	
	private function displayLoginPage($message = NULL, $failureType = NULL) {
		$data['title'] = 'Login - Administration Home';
		$data['css'] = 'statics/admin_home.css';
		if(isset($message)) {
			$data['failure_message'] = $message;
			$data['failure_type'] = $failureType;
		}
	
		$this->load->view('templates/header', $data);
		$this->load->view('statics/admin/admin_login', $data);
		$this->load->view('templates/footer', $data);
	}
	
	private function displayAdminLanding($message = NULL) {
		$data['title'] = 'Welcome - Administration Home';
		$data['css'] = 'statics/admin_home.css';
		if(isset($message)) {
			$data['failure_message'] = $message;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('statics/admin/admin_landing', $data);
		$this->load->view('templates/footer', $data);
	}
	
	private function displayAdminHome($message = NULL) {
		$data['title'] = 'Welcome - Administration Home';
		$data['css'] = 'statics/admin_home.css';
		if(isset($message)) {
			$data['failure_message'] = $message;
		}

		$this->load->view('templates/header', $data);
		$this->load->view('statics/admin/admin_home', $data);
		$this->load->view('templates/footer', $data);
	}
}