<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminTools extends CI_Controller {
	private $toolsCSS = array('statics/admin_home.css', 'statics/admin_tools.css');

	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('html');
		
		$this->load->library('session');
		
		$this->load->model('data/gamedata_model');
	}
	
	public function dataTools($toolName) {
		switch($toolName) {
			case 'home':
				$this->loadDataToolsView();
				break;
			case 'dataScrapeTool':
				$this->dataScrapeTool();
				break;
			default:
				$this->loadDataToolsView();
				break;
		}
	}
	
	public function dataScrapeTool($dataProvider) {
		$data = $this->gamedata_model->getGameInformation($dataProvider);
		
		$this->load->view('templates/header');
		echo '<pre>'.print_r($data).'</pre>';
		$this->load->view('templates/footer');
	}
	
	private function loadDataToolsView() {
		$data['title'] = 'Data Tools';
		$data['css'] = $this->toolsCSS;
		
		$this->load->view('templates/admin_header', $data);
		$this->load->view('statics/tools/admin_data_tools', $data);
		$this->load->view('templates/admin_footer', $data);
	}
	
	public function databaseManagement($action) {

	}
	
	public function manageLogs($action) {

	}
}