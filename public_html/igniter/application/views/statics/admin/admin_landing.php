<?
	if($this->session->userdata('logged-in') == FALSE) {
		//$this->output->set_header('url=/');
	} else {
?>
	<section class="header">
		<h4 class="title">Redirecting you to the homepage!</h4>
		<img src="/images/ajax-loader.gif" alt="Redirecting...">
	</section>
<?
		$this->output->set_header('refresh:2;url=/admin/home');
	} // End session check
?>