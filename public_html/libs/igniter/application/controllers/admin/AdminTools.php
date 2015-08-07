<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminTools extends CI_Controller {
	private $toolsCSS = array('statics/admin_home.css', 'statics/admin_tools.css');
	private $toolsJS = array('/scripts/admin_tools.js');
	
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('form');
		
		$this->load->library('session');
		
		$this->load->model('data/gamedata_model');
	}
	
	public function index() {
		$this->loadDataToolsHome();
	}
	
	public function dataScrapeTools($dataProvider) {
		switch($dataProvider) {
			case 'gameinformation':
				$this->loadGameInformationTool();
				break;
			default:
				echo 'Tool not found!';
				break;
		}
	
		// The following will get moved to a separate function
		/*
		// ToDo: On scrape transform the data into a common data packet
		$dataObj = $this->gamedata_model->getGameInformation($dataProvider);	

		// If there is a message/the variable isn't set, it was a failure
		if(isset($dataObj) && (property_exists($dataObj, 'message') == TRUE)) {
			// Load data failure view
			return;
		}
		// Attempt to parse any JSON here
		$assocArray = json_decode($dataObj);
		
		$gameDataArray = $assocArray->result;
		$dataWebsites = $gameDataArray->websites;
		
		foreach ($dataWebsites as $name) {
			print '<div>'.$name.'</div>';
		}
		/*
		$data['dataObj'] = $assocArray;
		// Since we are running this as an AJAX call, either pass a load->view back,
		// or just echo/print the variable back to the script.
		$this->load->view('errors/view_var', $data);
		//print_r($assocArray);
		*/
	}
	
	public function gameInfoTool() {
		$dataArray = $this->input->post();
		print_r($dataArray);
	}
	
	private function loadGameInformationTool() {		
		// Load a view here with the dropdown menus for the gameinfo tool
		// Get list of platforms from databse, send to the view
		$this->load->view('statics/tools/admin_game_information_tool');
	}
	
	private function loadDataToolsHome() {
		$data['title'] = 'Data Tools';
		$data['css'] = $this->toolsCSS;
		$data['js'] = $this->toolsJS;
		
		$this->load->view('templates/admin_header', $data);
		$this->load->view('statics/tools/admin_data_tools', $data);
		$this->load->view('templates/admin_footer', $data);
	}
}