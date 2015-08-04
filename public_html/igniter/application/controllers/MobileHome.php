<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MobileHome extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {		
		$data['title'] = 'Mobile Home';
		$data['css'] = '';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function redirect($url = 'http://m.dopeoplestillplay.com', $perm = TRUE) {
		if(!headers_sent()) {
			header('Location:'.$url, true, ($perm === TRUE) ? 301 : 302);
		}		
		die();
	}
	
}