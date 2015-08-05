<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminTools extends CI_Controller {
	private $homeCSS = array('statics/admin_home.css');

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
			default:
				$this->loadDataToolsView();
				break;
		}
	}
	
	public function dataScrapeTool($dataProvider) {
		$this->gamedata_model->getGameInformation($dataProvider);
	}
	
	private function loadDataToolsView() {
		$data['title'] = 'Data Tools';
		$data['css'] = $this->homeCSS;
		
		$this->load->view('templates/admin/admin_header', $data);
		// Add in a list of tools here with routes to /tools/datatools/(function: scrapeData/(:any datascrapeName)
		$this->load->view('templates/admin/admin_footer', $data);
	}
	
	public function databaseManagement($action) {

	}
	
	public function manageLogs($action) {

	}
}