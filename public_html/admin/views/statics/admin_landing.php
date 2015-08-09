<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	}
?>
<section class="header">
	<h4 class="title">Redirecting you to the homepage!</h4>
	<p>If the page does not redirect in 5 seconds, click <a href='/home'>here</a></p>
	<img src="/images/ajax-loader.gif" alt="Redirecting...">
</section>
<?
	$this->output->set_header('refresh:2;url=/home');
?>