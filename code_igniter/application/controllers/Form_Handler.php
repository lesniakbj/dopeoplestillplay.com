<?php
class Form_Handler extends CI_Controller {

	public function info_email()
	{
		$user_email = $this->input->post("user-email");
		// Validate the user's email here... Add their data to the database... Send genertic TY email
		// echo $user_email;
	}
}
?>