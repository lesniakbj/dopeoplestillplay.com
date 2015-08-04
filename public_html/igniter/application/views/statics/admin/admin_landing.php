<?
	if($this->session->userdata('logged-in') == FALSE) {
		//$this->output->set_header('url=/');
	} else {
?>
	<section class="header">
		<h4 class="title">You are successfully logged in!</h4>
	</section>
<?
		$this->output->set_header('refresh:5;url=/admin/home');
	} // End session check
?>