<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormHandler extends CI_Controller {

	public function handle($formName) {
		// Check which form was submitted:
		if($formName = 'construction-email') {
			// Get the user input from the GET or POST request.
			$this->handleEmailRequest($this->input->get_post('user-email', TRUE));
		}
	}
	
	private function handleEmailRequest($requestParams) {
		// Since this is an email, the requestParams will be an email address
		$email = $requestParams;
		// Required page data, either leave blank or add specific entries here
		$data['title'] = 'Email Submission';
		$data['css'] = '';
	
		// Load the templates, and echo the data we got in the middle. 
		$this->load->view('templates/header', $data);
		echo $email;
		$this->load->view('templates/footer', $data);
	}
}