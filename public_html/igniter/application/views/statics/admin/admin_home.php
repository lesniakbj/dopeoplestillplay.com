<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {
?>
	<section class="header">
		<h4 class="title">And on the homepage...</h4>
		<a href="/admin/logout">Logout</a>
	</section>
<?
	} // End session check
?>