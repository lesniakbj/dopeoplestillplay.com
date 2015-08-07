<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForumsHome extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {		
		$data['title'] = 'Forums';
		$data['css'] = '';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function redirect($url = 'http://forums.dopeoplestillplay.com', $perm = TRUE) {
		if(!headers_sent()) {
			header('Location:'.$url, true, ($perm === TRUE) ? 301 : 302);
		}		
		die();
	}
	
}