<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	private $homeCss = array('statics/home.css');

	public function __construct() {
		parent::__construct();
		
		$this->load->helper('url');
	}
	
	public function index() {		
		$data['title'] = 'Home';
		$data['css'] = $this->homeCss;
	
		$this->load->view('templates/header', $data);
		$this->load->view('statics/home', $data);
		$this->load->view('templates/footer', $data);
	}
}