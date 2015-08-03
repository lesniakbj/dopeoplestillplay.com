<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function submitEmailToDatabase($email) {
		$emailData = array(
			'email_address' => $this->db->escape($email)
		);	
		$querySuccess = $this->db->insert('user_email_list', $emailData);
		
		echo($querySuccess);
		return $querySuccess;
	}
}