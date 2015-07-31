<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormHandler extends CI_Controller {

	public function handle($formName) {
		// Check which form was submitted:
		if($formName = 'Submit Email') {
			// Get the user input from the GET or POST request.
			$this->handleEmailRequest($this->input->get_post('user-email', TRUE));
		}
	}
	
	private function handleEmailRequest($requestParams) {
		// Since this is an email, the requestParams will be an email address
		$email = $requestParams;
		
		// Submit the email to MySQL database for safekeeping
		$this->submitEmailToDatabase($email);
		
		// Display the confirmation page
		$this->displayConfirmationPage('Email Submission', $email);
		
		// After showing the confirmation page, redirect back the home page.
		$this->load->helper('url');
		$this->output->set_header('refresh:8;url=/');
	}
	
	private function submitEmailToDatabase($email) {
		// TO DO - Move DB calls to the model, load the model and call it here.
		$this->load->database();
		$sql = "INSERT INTO user_email_list (email_address) VALUES(".$this->db->escape($email).")";
		$query = $this->db->query($sql);
	}
	
	private function displayConfirmationPage($pageTitle, $emailAddress) {
		// Required page data, either leave blank or add specific entries here
		$data['title'] = $pageTitle;
		$data['email'] = $emailAddress;
	
		// Load the templates, and echo the data we got in the middle. 
		$this->load->view('templates/header', $data);
		$this->load->view('statics/email_confirmation', $data);
		$this->load->view('templates/footer', $data);
	}
}