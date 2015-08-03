<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function submitEmailToDatabase($email) {
		// Data is automatically escaped, no need to ensure safe escaping
		$emailData = array(
			'email_address' => $email
		);	
		$querySuccess = $this->db
							 ->insert('user_email_list', $emailData);
		
		return ($querySuccess  == 1) ? TRUE : FALSE;
	}
}