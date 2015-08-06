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
	
	public function index() {
		$this->loadDataToolsView();
	}
	
	public function dataTools($toolName) {
		switch($toolName) {
			case 'dataScrapeTool':
				$this->dataScrapeTool();
				break;
			default:
				$this->loadDataToolsView();
				break;
		}
	}
	
	public function dataScrapeTool($dataProvider) {
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
		// If there is a message, it was a failure
		if(property_exists($dataObj, 'message') == TRUE) {
			// Load data failure view
			return;
		}
		
		
		$data['dataObj'] = $dataObj;
				
		$this->load->view('templates/header');
		$this->load->view('errors/view_var', $data);
		$this->load->view('templates/footer');
	}
	
	private function loadDataToolsView() {
		$data['title'] = 'Data Tools';
		$data['css'] = $this->toolsCSS;
		
		$this->load->view('templates/admin_header', $data);
		$this->load->view('statics/tools/admin_data_tools', $data);
		$this->load->view('templates/admin_footer', $data);
	}
}