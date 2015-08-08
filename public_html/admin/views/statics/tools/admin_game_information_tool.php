<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {
		
		$formAttrs = array(
			'action' => 'https://www.admin.dopeoplestillplay.com/tools/gameinfo/submit',
			'class'  => '', 
			'id' 	 => 'gameinformation-tool', 
			'name'	 => 'gameinformation-tool',
			'value'  => 'Game Information',
			'method' => 'post'
		);
		
		// Platforms is passed in from the controller
		echo form_open('tools/gameinfo', $formAttrs);
		echo form_label('Game Platform:', 'game-platform');
		echo form_dropdown('game-platform', $platforms, 'pc');
		echo form_submit('submit-scrape-info','Submit');
		echo form_close();
	} // End session check
?>