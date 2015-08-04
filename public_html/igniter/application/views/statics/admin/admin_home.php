<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_404();
	} else {
?>
	<section class="header">
		<h4 class="title">And on the homepage...</h4>	
	</section>
<?
	} // End session check
?>