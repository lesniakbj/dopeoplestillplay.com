<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{		
		$page = 'home';
		if ( ! file_exists(APPPATH.'/views/statics/'.$page.'.php')) {
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['css'] = 'statics/'.$page.'.css';
	
		$this->load->view('templates/header', $data);
		$this->load->view('statics/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}