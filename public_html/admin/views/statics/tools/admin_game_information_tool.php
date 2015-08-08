<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {

		print_r($platforms);
	
		$formAttrs = array(
			'action' => 'https://www.admin.dopeoplestillplay.com/tools/gameinfo/submit',
			'class'  => '', 
			'id' 	 => 'gameinformation-tool', 
			'name'	 => 'gameinformation-tool',
			'value'  => 'Game Information',
			'method' => 'post'
		);
		
		echo form_open('tools/gameinfo', $formAttrs);
		echo form_label('Game Platform:', 'game-platform');
	
		// TODO: Change this from static array to list of platforms retrieved from database...
		$platOptions = array(
			'pc'  		=> 'PC',
			'ps3'		=> 'Playstation 3',
			'ps4'		=> 'Playstation 4',
			'xbox360' 	=> 'Xbox 360',
			'xboxone'	=> 'Xbox One'		
		);

		echo form_dropdown('game-platform', $platOptions, 'pc');
		echo form_submit('submit-scrape-info','Submit');
		echo form_close();
	} // End session check
?>