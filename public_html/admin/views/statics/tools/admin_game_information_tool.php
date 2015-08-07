<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		
	
		$formAttrs = array(
			'action' => 'https://www.admin.dopeoplestillplay.com/login',
			'class'  => '', 
			'id' 	 => 'gameinformation-tool', 
			'name'	 => 'gameinformation-tool',
			'value'  => 'Game Information',
			'method' => 'post'
		);
		
		echo form_open('tools/gameinfo', $formAttrs);
		echo form_close();
	} // End session check
?>