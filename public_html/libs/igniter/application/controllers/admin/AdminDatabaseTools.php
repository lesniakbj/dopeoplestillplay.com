<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminDatabaseTools extends CI_Controller {
	private $toolsCSS = array('statics/admin_home.css', 'statics/admin_tools.css');

	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('html');
		
		$this->load->library('session');
	}
	
	public function index() {
		$this->load->view('templates/admin_header');
		$this->load->view('templates/admin_footer');
	}
	
	public function databaseManagement($mgmtFunction) {
		$this->load->view('templates/admin_header');
		$this->load->view('templates/admin_footer');
	}
}