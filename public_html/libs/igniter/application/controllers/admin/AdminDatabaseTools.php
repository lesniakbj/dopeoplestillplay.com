<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class AdminDatabaseTools extends CI_Controller {
	private $toolsCSS = array('statics/admin_home.css', 'statics/admin_tools.css');

	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('html');
		
		$this->load->library('session');
		
		$this->load->model('database/database_model');
	}
	
	public function index() {
		$data['title'] = 'Database Manager';
		$data['css'] = $this->toolsCSS;
		
		$tables = $this->database_model->getAllDatabaseTables();
		$data['tables'] = $this->cleanTablePrefixes($tables);
		
		$this->load->view('templates/admin_header', $data);
		$this->load->view('statics/tools/admin_database_tools', $data);
		$this->load->view('templates/admin_footer', $data);
	}
	
	public function databaseManagement($mgmtFunction) {
		$this->load->view('templates/admin_header');
		$this->load->view('templates/admin_footer');
	}
	
	private function cleanTablePrefixes($tables, $prefixToClean){
		return 1;
	}
}