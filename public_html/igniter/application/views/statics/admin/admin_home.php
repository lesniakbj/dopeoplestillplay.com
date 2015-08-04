<?
	if($this->session->userdata('logged-in') == FALSE) {
		$this->output->set_header('url=/');
	} else {
?>
	<div class="button-primary">Refresh ALL Data Feeds</div>
	<section class="header">
		<h4 class="title">And on the homepage...</h4>
		
	</section>
<?
	} // End session check
?>