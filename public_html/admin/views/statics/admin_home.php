<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	}	
?>
<div class="container tool-area">
	<h4 class="tool-banner">Welcome to the Administrator area! Please choose your tool above to continue.</h4>
</div>
