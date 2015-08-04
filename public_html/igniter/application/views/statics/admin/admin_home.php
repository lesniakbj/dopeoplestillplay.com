<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		
?>
	<div class="container tool-area">
		<span class="tool-banner"><h4>Down here will be a banner until a new tool is chosen</h4>
	</div>
<?		
	} // End session check
?>