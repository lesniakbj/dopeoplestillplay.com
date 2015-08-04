<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminHome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');	
	}
	
	public function dataTools($toolName) {
		if($toolName == 'home') {
			$this->loadDataToolView();
		}
	}
	
	private function loadDataToolView() {
		$data['title'] = 'Data Tools';
		$data['css'] = 'statics/admin_home.css';
		
		$this->load->view('templates/header', $data);
		//$this->load->view('statics/admin/admin_home', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function databaseManagement($action) {

	}
	
	public function manageLogs($action) {

	}
}