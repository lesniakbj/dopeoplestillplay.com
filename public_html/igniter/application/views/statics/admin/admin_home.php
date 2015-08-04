<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		
?>
	<h4>Down here will be a banner until a new tool is chosen</h4>
<?		
	} // End session check
?>