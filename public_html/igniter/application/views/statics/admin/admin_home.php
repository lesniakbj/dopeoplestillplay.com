<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		
		$navMenu = array(
			anchor('/tools/data/home', 'Data Feeds', 'title="Data Feeds"'),
			anchor('/tools/database', 'Database Tasks', 'title="Database"'),
			anchor('/tools/logs', 'Logs', 'title="Logs"'),
			anchor('/logout', 'Logout', 'title="Logout"')
		);
		
		$navAttrs = array(
			'class' => 'admin-nav-bar'
		);
	
		echo ul($navMenu, $navAttrs);
	} // End session check
?>