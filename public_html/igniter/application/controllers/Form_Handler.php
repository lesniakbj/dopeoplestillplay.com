<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_Handler extends CI_Controller {

	public function email_form() {
		$data['title'] = 'Email Submission';
		$data['css'] = '';
	
		$this->load->view('templates/header', $data);
		$this->load->view('templates/footer', $data);
	}
}