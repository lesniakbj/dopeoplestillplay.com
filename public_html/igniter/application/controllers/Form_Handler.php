<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_Handler extends CI_Controller {

	public function email_form {
		$this->load->view('templates/header.php', $data);
			echo <h1>HELLO!</h1>
		$this->load->view('templates/footer.php', $data);
	}
}