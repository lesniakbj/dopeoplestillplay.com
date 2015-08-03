<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function logAttemptToDB($username, $password, $ipAddress, $success) {
		// For inserting the IPv4 Address, use PHP function inet_pton
		// as IP Addresses are stored as 4 Byte Ints.
		$loginAttemptData = array(
			'username'			=> $username,
			'password'			=> $password,
			'ip_address'		=> inet_pton($ipAddress),
			'was_successful'	=> $success
		);
		$querySuccess = $this->db
							->insert('log_admin_login', $loginAttemptData);
		
		return ($querySuccess  == 1) ? TRUE : FALSE;
	}

}