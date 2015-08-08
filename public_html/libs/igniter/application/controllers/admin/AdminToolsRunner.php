<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminToolsRunner extends CI_Controller {
	private $toolsCSS = array('statics/admin_home.css', 'statics/admin_tools.css');
	private $toolsJS = array('/scripts/admin_tools.js');
	
	public function __construct() {
		parent::__construct();
	}
	
	public function runGameInformationTool() {
		$postedData = $this->input->post();
		print_r($postedData);
	}
}