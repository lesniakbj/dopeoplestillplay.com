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
		$data['title'] = 'Database Manager';
		$data['css'] = $this->toolsCSS;
		
		$this->load->view('templates/admin_header', $data);
		$this->load->view('statics/tools/admin_home', $data);
		$this->load->view('templates/admin_footer', $data);
	}
	
	public function databaseManagement($mgmtFunction) {
		$this->load->view('templates/admin_header');
		$this->load->view('templates/admin_footer');
	}
}