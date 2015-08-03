<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function submitEmailToDatabase($email) {
		$sql = "INSERT INTO user_email_list (email_address) VALUES(".$this->db->escape($email).")";
		$query = $this->db->query($sql);
		
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}