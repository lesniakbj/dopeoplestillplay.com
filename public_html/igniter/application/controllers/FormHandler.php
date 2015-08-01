<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormHandler extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('email_model');
	}

	public function handle($formName) {
		// Check which form was submitted:
		if($formName = 'Submit Email') {	
			// Get the user input from the GET or POST request.
			$this->handleEmailRequest($this->input->post('user-email', TRUE));
		}
	}
	
	private function handleEmailRequest($requestParams) {
		// Since this is an email, the requestParams will be an email address
		$email = $requestParams;
		
		// Submit the email to MySQL database for safekeeping
		$submitted = $this->email_model->submitEmailToDatabase($email);
		
		// Did the insertion succeed?
		if($submitted) {
			// Display the confirmation page
			$this->displayConfirmationPage('Email Submission', $email, true);
			$this->sendUserEmail($email);
		} else {
			// Display the failure page
			$this->displayConfirmationPage('Email Submission', '', false);
		}
		
		// After showing the confirmation/failure page, redirect back the home page.
		$this->load->helper('url');
		$this->output->set_header('refresh:8;url=/');
	}
	
	private function sendUserEmail($emailAddress) {
		// Load the required email library
		$this->load->library('email');
		
		// Set the variables for the email to be sent
		$this->email->from('contact@dopeoplestillplay.com', 'Do People Still Play');
		$this->email->to($emailAddress); 
		
		$this->email->subject('Thank you for your interest in the future of gaming!');
		$this->email->message('Thank you for your interest in www.dopeoplestillplay.com and the future of online gaming! We will keep you informed through a series of emails and newsletters of our progress on the project. Thank you for your support!');	
		
		$this->email->send();
		return;
	}
	
	private function displayConfirmationPage($pageTitle, $emailAddress, $success) {
		// Required page data, either leave blank or add specific entries here
		$data['title'] = $pageTitle;
		$data['email'] = $emailAddress;
		
		if($success) {
			// Load the confirmation templates
			$this->load->view('templates/header', $data);
			$this->load->view('statics/email_confirmation', $data);
			$this->load->view('templates/footer', $data);
		} else {
			// Load the failure templates
			$this->load->view('templates/header', $data);
			$this->load->view('statics/email_failure', $data);
			$this->load->view('templates/footer', $data);
		}
	}
}