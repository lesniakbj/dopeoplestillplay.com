<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		
?>
	<div class="container tool-area">
		<span class="tool-banner">Welcome to the Administrator area! Please choose your tool above to continue.</span>
	</div>
<?		
	} // End session check
?>