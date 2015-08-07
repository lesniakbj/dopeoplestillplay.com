<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminTools extends CI_Controller {
	private $toolsCSS = array('statics/admin_home.css', 'statics/admin_tools.css');
	private $toolsJS = array('/scripts/admin_tools.js');
	
	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
		$this->load->helper('html');
		
		$this->load->library('session');
		
		$this->load->model('data/gamedata_model');
	}
	
	public function index() {
		$this->loadDataToolsHome();
	}
	
	public function dataScrapeTool($dataProvider) {
		// ToDo: On scrape transform the data into a common data packet
		$dataObj = $this->gamedata_model->getGameInformation($dataProvider);	
		/*
		|	On "Error":
		|	stdClass Object
		|	(
		|		[message] => result not found
		|		[possibleChoices] => Array
		|			(
		|				[0] => call of duty black ops iii
		|				[1] => call of duty black ops
		|				[2] => call of duty black ops declassified
		|				[3] => call of duty black ops ii
		|				[4] => call of duty black ops zombies
		|				[5] => call of duty black ops -- call of the dead
		|				[6] => shadow ops red mercury
		|				[7] => spec ops the line
		|				[8] => black & white
		|				[9] => call of duty heroes
		|			)
		|
		|	)
		|
		|	On "Success":
		|	stdClass Object
		|	(
		|		[result] => stdClass Object
		|			(
		|				[websites] => Array
		|					(
		|						[0] => gamesradar
		|						[1] => ign
		|						[2] => metacritic
		|						[3] => gamespot
		|					)
		*/
		// If there is a message/the variable isn't set, it was a failure
		if(isset($dataObj) && (property_exists($dataObj, 'message') == TRUE)) {
			// Load data failure view
			return;
		}
		// Attempt to parse any JSON here
		$assocArray = json_decode($dataObj, true);
		
		print_r($assocArray);
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