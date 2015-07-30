<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_Handler extends CI_Controller {

	public function email_form() {
		// Get the user input from the GET or POST request.
		$email = $this->input->get_post('user-email', TRUE);
		
		// Required page data, either leave blank or add specific entries here
		$data['title'] = 'Email Submission';
		$data['css'] = '';
	
		// Load the templates, and echo the data we got in the middle. 
		$this->load->view('templates/header', $data);
		echo $email;
		$this->load->view('templates/footer', $data);
	}
}